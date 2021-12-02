<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {


        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'is_business' => ['required','numeric', 'min:0', 'max:1'],
            'username' => ['required', 'string','min:3', 'max:255', 'unique:users','regex:/^[A-Za-z0-9]+$/'],
            'about' => ['nullable', 'string','min:3', 'max:2000'],

//            'gender' => ['required', 'numeric', 'max:1', 'min:0'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'category_id' => ['required_if:is_business,0','nullable','numeric'],
            'business_name' => ['required_if:is_business,1','nullable','string', 'min:2', 'max:255'],
            'industry' => ['nullable','string', 'min:2', 'max:255'],
            'capacity' => ['nullable','string', 'min:2', 'max:255'],
            'address' => ['nullable','string', 'min:2', 'max:255'],
            'tel' => ['nullable','string', 'min:2','numeric','digits_between:7,12'],
            'website' => ['nullable','string', 'min:2', 'max:255'],
            'cv'=>['required_if:is_business,0','mimes:pdf','max:10240'],
            'language_id.*' => ['required_if:is_business,0','nullable','numeric'],
            'level.*' => ['required_if:is_business,0','nullable'],


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    protected function addLanguages(array $data,$user){

        $count = count($data['language_id']);
        $added_languages = [];
        for($i=0;$i<$count;$i++) {
            if (!in_array($data['language_id'][$i], $added_languages)) {
                $user->language()->attach($data['language_id'][$i], array('level' => $data['level'][$i]));
                array_push($added_languages, $data['language_id'][$i]);
            }

        }


    }

    protected function create(array $data)
    {
        $role = 1;
        if ($data['is_business']==1){
            $role = 2;
            unset($data['category_id']);
            unset($data['cv']);

        }
        if (isset($data['cv']) && $role = 1){
        if($file = $data['cv']) {

            $file_name = time() . $file->getClientOriginalName();
            $file->move('files',$file_name);

            $data['cv'] = $file_name;
        }}


        $data['password'] = Hash::make($data['password']);
        $data['role_id'] = $role;
         $user = User::create(
//             [
//            'name' => $data['name'],
//            'surname' => $data['surname'],
//            'username' => $data['username'],
//            'slug'=>$data['username'],
//            'about'=>$data['about'],
////            'gender' => $data['gender'],
//            'email' => $data['email'],
//            'role_id'=>$role,
//            'category_id'=>$data['category_id'],
//            'password' => Hash::make($data['password']),
//             'cv'=>$data['cv']
//        ]
             $data
         );
         if ($data['is_business']==1){
        Company::create(['user_id'=>$user->id,'name'=>$data['business_name'],'industry'=>$data['industry']
            ,'capacity'=>$data['capacity'],'address'=>$data['address'],'tel'=>$data['tel'],'website'=>$data['website']]);

            }
        if ($data['is_business']==0) {
            $this->addLanguages($data, $user);
        }

        return $user;
    }
}
