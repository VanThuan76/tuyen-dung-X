<?php

namespace App\Http\Controllers;

use App\Mail\ApplyMail;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
        return view('job.request',compact('jobsRequest'));
    }
    public function response()
    {
        $user = auth()->user();
            $job = Job::where('user_id', $user->id)->first();
            $jobsResponse = JobRequest::where("job_id", $job->id)->get();
            return view('job.response',compact('jobsResponse'));
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
        session()->flash('added_jobRequest', 'Job request added sucessfully');
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
        session()->flash('deleted_job', 'Job offer deleted sucessfully');
        if (auth()->user()->role->name == 'administrator') {
            return back();
        }
        else{
            return redirect()->route('jobs.request');
        }
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
        if (auth()->user()->role->name == 'administrator') {
            return back();
        } else {
            return redirect()->route('home');
        }
    }
    
}
