<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyEditRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::findBySlugOrFail($slug);
        if ($user->role->name == 'administrator' || $user->role->name == 'user'){
            return redirect()->route('home');//redirekto nese nuk eshte kompani
        }
        return view('company.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        if ($user->role->name == 'administrator' || $user->role->name == 'user'){
            return redirect()->route('home');//redirekto nese nuk eshte kompani
        }
        return view('company.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyEditRequest $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        $input['industry'] = $request['industry'];
        $input['capacity']=$request['capacity'];
        $input['address']=$request['address'];
        $input['tel']=$request['tel'];
        $input['website']=$request['website'];
        $user->company()->update($input);
        session()->flash('profile_updated','Profili u ndryshua me sukses.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
