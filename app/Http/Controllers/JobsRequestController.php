<?php

namespace App\Http\Controllers;

use App\Mail\ApplyMail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class JobsRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $languageLevels = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2', 'N1', 'N2', 'N3', 'N4', 'N5'];

    public function index()
    {
        //
    }
    public function request()
    {
        $user = auth()->user();
        $jobsRequest = JobRequest::where("user_id", $user->id)->get();
        return view('job.request', compact('jobsRequest'));
    }
    public function response()
    {
        $user = auth()->user();
        $jobs = Job::where('user_id', $user->id)
            ->withCount('jobRequests')
            ->get();

        return view('job.response', compact('jobs'));
    }

    public function calculatePriority($jobsResponse, $job)
    {
        foreach ($jobsResponse as $response) {
            $priority = 0;
            $user = $response->user;
            $userAge = Carbon::parse($user->birthday)->age;

            if ($userAge > $job->startingAge && $userAge < $job->endingAge) {
                $priority += 2;
            }

            if ($user->gender == $response->job->gender) {
                $priority += 3;
            }

            if ($user->province_id == $response->job->province_id) {
                $priority += 7;
            }

            if ($user->category_id == $response->job->category_id) {
                $priority += 2;
            }

            if ($user->category_id == $response->job->category_id) {
                $priority += 2;
            }

            foreach ($user->language as $language) {
                if ($language->id == $response->job->language_id) {
                    $findLanguageLevel = array_search($response->job->language_level, $this->languageLevels) ?? 8;
                    $priority += count($this->languageLevels) - $findLanguageLevel;
                }
            }

            $response->priority = $priority;
        }

        return $jobsResponse;
    }

    public function jobsResponse(Request $request, string $id)
    {
        $jobsResponse = JobRequest::where('job_id', $id)
            ->when($request->name, function ($query) use ($request) {
                $query->whereHas('user', function ($subQuery) use ($request) {
                    $subQuery->where('name', 'Like', '%'.$request->name.'%');
                });
            })
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('user.category', function ($subQuery) use ($request) {
                    $subQuery->where('slug', $request->category);
                });
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->whereHas('user', function ($subQuery) use ($request) {
                    $subQuery->where('gender', $request->gender);
                });
            })
            ->when($request->age, function ($query) use ($request) {
                $query->whereHas('user', function ($subQuery) use ($request) {
                    $subQuery->where('birthday', '<=', Carbon::now()->subYears($request->age)->format('Y-m-d 00:00'));
                });
            })
            ->get();
        $job = Job::findOrFail($id);
        
        $categories = Category::all();

        $languageUsers = DB::table('language_user')
            ->join('languages', 'language_user.language_id', '=', 'languages.id')
            ->select('language_user.level', 'languages.name', 'languages.slug', 'language_user.user_id')
            ->get();

        $uniqueLanguageUsers = collect($languageUsers)->unique(function ($item) {
            return $item->level . $item->name;
        })->values()->all();

        $jobsResponse = $this->calculatePriority($jobsResponse , $job);
        $jobsResponse = $jobsResponse->sortBy([
            ['priority', 'desc'],
            ['user.birthday', 'desc'],
            ['user.gender', 'desc'],
        ]);

        return view('job.response-detail', compact('jobsResponse', 'job', 'categories', 'uniqueLanguageUsers'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $userId
     * @param  int  $jobId
     * @return \Illuminate\Http\Response
     */
    public function create($userId, $jobId)
    {
        $jobRequet = new JobRequest();
        $jobRequet->user_id = $userId;
        $jobRequet->job_id = $jobId;
        $jobRequet->save();
        session()->flash('added_jobRequest', 'Job request added successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $jobRequest = JobRequest::where('id', $id);
        $jobRequest->delete();
        session()->flash('deleted_jobRequest', 'Job Request deleted successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {
        $jobRequest = JobRequest::where('id', $id)->first();
        if ($jobRequest) {
            $jobRequest->status = $status;
            $jobRequest->save();
            $email = User::where("id", $jobRequest->user_id)->first()->email;
            Mail::to($email)->send(new ApplyMail($jobRequest));
        }
        session()->flash('updated_jobRequest', 'Job Request updated successfully.');
        return back();
    }

}
