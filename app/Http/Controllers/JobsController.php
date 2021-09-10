<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

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
        return view('job.create',compact('user','categories'));
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
        if (!$category){
            session()->flash('category_error', 'Oops... Kategoria nuk u gjet.');
            return back()->withInput();
        }
        if ($request->has_endDate == 'on'){
            $request->request->remove('endDate');
        }
        if ($request->remote == 'on'){
            $request->request->remove('address');
        }
        if ($request->price_type == 1){
            $request['price_type'] = 'Fixed';
        }
        else{
            $request['price_type'] = 'Hourly';
        }
        if (!$request->has_endDate && empty($request->endingDate)){
            session()->flash('error_endDate', 'Ju lutem plotësoni datën.');
            return back()->withInput();
        }
        if (!$request->remote && empty($request->address)){
            session()->flash('error_address', 'Ju lutem plotësoni adresen.');
            return back()->withInput();
        }
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Job::create($input);
        session()->flash('job_created', 'Shpallja e punës u krijua me sukses.');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view ('job.edit',compact('user','categories','job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $user = auth()->user();
        $job = Job::findBySlugOrFail($slug);
        $category = Category::find($request->category_id);
        if (!$category){
            session()->flash('category_error', 'Oops... Kategoria nuk u gjet.');
            return back()->withInput();
        }
        if ($request->has_endDate == 'on'){
            $request->request->remove('endDate');
        }
        if ($request->remote == 'on'){
            $request->request->remove('address');
        }
        if ($request->price_type == 1){
            $request['price_type'] = 'Fixed';
        }
        else{
            $request['price_type'] = 'Hourly';
        }
        if (!$request->has_endDate && empty($request->endingDate)){
            session()->flash('error_endDate', 'Ju lutem plotësoni datën.');
            return back()->withInput();
        }
        if (!$request->remote && empty($request->address)){
            session()->flash('error_address', 'Ju lutem plotësoni adresen.');
            return back()->withInput();
        }
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $job->update($input);
        session()->flash('job_updated', 'Shpallja e punës u ndryshua me sukses.');
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
        $job->delete();
        session()->flash('deleted_job', 'Shpallja u fshi me sukses.');
        return back();
    }
}
