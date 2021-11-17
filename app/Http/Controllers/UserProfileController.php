<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangeProfileRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
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
        if ($user->role->name == 'company'){
            return redirect()->route('home');//redirekto nese nuk eshte perdorues
        }
        return view('user.show',compact('user'));
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
        $categories = Category::all();
        $languages = Language::all();
        if ($user->role->name == 'company'){
            return redirect()->route('home');//redirekto nese nuk eshte perdorues
        }
        return view('user.edit',compact('user', 'categories','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function addLanguages(array $data,$user){

       foreach ($user->language as $language){

               $user->language()->detach($language);


           }

        $count = count($data['language_id']);
        $added_languages = [];
        for($i=0;$i<$count;$i++) {
            if (!in_array($data['language_id'][$i], $added_languages)) {
                $user->language()->attach($data['language_id'][$i], array('level' => $data['level'][$i]));
                array_push($added_languages, $data['language_id'][$i]);
            }

        }

    }

    public function update(UserEditRequest $request)
    {
    $user = auth()->user();
        $category = Category::find($request->category_id);
        if (!$category){
            session()->flash('category_error', 'Oops ... Category not found.');
            return back();
        }
    $input = $request->all();
        if($file = $request->file('cv')) {

            $file_name = time() . $file->getClientOriginalName();
            $file->move('files',$file_name);
            if ($user->cv) {
                if (file_exists(public_path() . '/files/' . $user->cv)) {//kontrollo nese ekziston cv ne storage para se te fshihet
                    unlink(public_path() . '/files/' . $user->cv);
                }
            }
            $input['cv'] = $file_name;
        }
        $this->addLanguages($input, $user);
        $user->update($input);
        session()->flash('profile_updated','Profile changed successfully.');
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
