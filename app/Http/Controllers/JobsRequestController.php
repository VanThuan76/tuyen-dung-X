<?php

namespace App\Http\Controllers;

use App\Mail\ApplyMail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use DB;

class JobsRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $jobs = Job::where('user_id', $user->id)->get();
        $jobIds = $jobs->pluck('id')->toArray();
        $jobsResponse = JobRequest::whereIn('job_id', $jobIds)->get();
        $jobIdsResponse = $jobsResponse->pluck('job_id')->toArray();
        $jobsResponseCategory = Job::whereIn('id', $jobIdsResponse)->pluck('category_id')->unique();
        $categories = Category::whereIn('id', $jobsResponseCategory)->get();

        $languageUsers = DB::table('language_user')
            ->join('languages', 'language_user.language_id', '=', 'languages.id')
            ->select('language_user.level', 'languages.name', 'languages.slug', 'language_user.user_id')
            ->get();

        $uniqueLanguageUsers = collect($languageUsers)->unique(function ($item) {
            return $item->level . $item->name;
        })->values()->all();

        return view('job.response', compact('jobsResponse', 'categories', 'uniqueLanguageUsers'));
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
