<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\User;

class JobsController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $categories = Category::all();
        return view('job.create', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobStoreRequest $request)
    {
        $user = auth()->user();

        $category = Category::find($request->category_id);
        if (!$category) {
            session()->flash('category_error', 'Oops... Kategoria nuk u gjet.');
            return back()->withInput();
        }
        if (!$request->has_endDate && empty($request->endingDate)) {
            session()->flash('error_endDate', 'Please fill in the date.');
            return back()->withInput();
        }
        if (!$request->remote && empty($request->address)) {
            session()->flash('error_address', 'Please fill in the address.');
            return back()->withInput();
        }
        if ($request->has_endDate == 'on') {
            $request->request->remove('endDate');
        }
        if ($request->remote == 'on') {
            $request['remote'] = 1;
        } else {
            $request['remote'] = 0;
        }
        if ($request->price_type == 1) {
            $request['price_type'] = 'Fixed';
        } else {
            $request['price_type'] = 'Hourly';
        }
        if ($request->experience == 1) {
            $request['experience'] = '1-3';
        } else if ($request->experience == 2) {
            $request['experience'] = '4-7';
        } else if ($request->experience == 3) {
            $request['experience'] = '+7';
        }
        if ($request->job_type == 1) {
            $request['job_type'] = 'Part Time';
        } else {
            $request['job_type'] = 'Full Time';
        }

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Job::create($input);
        session()->flash('job_created', 'Job offer successfully created.');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = auth()->user();
        $job = Job::findBySlugOrFail($slug);

        //other jobs by same company
        $company = User::find($job->user_id);
        $jobs = $company->job->where('id', '<>', $job->id);
        return view('job.show', compact('user', 'job', 'jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByUser($slug)
    {
        $user = auth()->user();
        $job = Job::findBySlugOrFail($slug);

        //other jobs by same company
        $company = User::find($job->user_id);
        $jobs = $company->job->where('id', '<>', $job->id);
        return view('job.show', compact('user', 'job', 'jobs'));
    }
    public function list()
    {
        $user = auth()->user();
        $jobs = Job::all();
        $categories = Category::all();
        $jobsRequest = JobRequest::all();
        return view('job.list', compact('user', 'jobs', 'categories', 'jobsRequest'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = auth()->user();
        $categories = Category::all();
        $job = Job::findBySlugOrFail($slug);
        return view('job.edit', compact('user', 'categories', 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobStoreRequest $request, $slug)
    {

        $user = auth()->user();

        $job = Job::findBySlugOrFail($slug);
        if (auth()->user()->id != $job->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $category = Category::find($request->category_id);
        if (!$category) {
            session()->flash('category_error', 'Oops... Kategoria nuk u gjet.');
            return back()->withInput();
        }
        if (!$request->has_endDate && empty($request->endingDate)) {
            session()->flash('error_endDate', 'Please fill in the date.');
            return back()->withInput();
        }
        if (!$request->remote && empty($request->address)) {
            session()->flash('error_address', 'Please fill in the address.');
            return back()->withInput();
        }
        if ($request->has_endDate == 'on') {
            $request['endingDate'] = '';
        }
        if ($request->remote == 'on') {
            $request['remote'] = 1;
        } else {
            $request['remote'] = 0;
        }
        if ($request->price_type == 1) {
            $request['price_type'] = 'Fixed';
        } else {
            $request['price_type'] = 'Hourly';
        }
        if ($request->experience == 1) {
            $request['experience'] = '1-3';
        } else if ($request->experience == 2) {
            $request['experience'] = '4-7';
        } else if ($request->experience == 3) {
            $request['experience'] = '+7';
        }
        if ($request->job_type == 1) {
            $request['job_type'] = 'Part Time';
        } else {
            $request['job_type'] = 'Full Time';
        }

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $job->update($input);
        session()->flash('job_updated', 'Job offer updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $job = Job::findBySlugOrFail($slug);

        if (auth()->user()->id != $job->user_id && auth()->user()->role->name != 'administrator') {
            abort(403, 'Unauthorized action.');
        }
        $job->delete();
        session()->flash('deleted_job', 'Job offer deleted successfully');
        if (auth()->user()->role->name == 'administrator') {
            return back();
        } else {
            return redirect()->route('jobs.request');
        }
    }
}