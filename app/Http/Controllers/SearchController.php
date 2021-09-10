<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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
    public function jobs(Request $request)
    {

        $categories = Category::all();
        $input = $request->q;
        $user = auth()->user();
        $category = $request->category;
        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);
        if ($category != ''){
            $category = Category::findBySlugOrFail($category);
            $category = $category->id;
        }
        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Ju lutem jepni nje fjale me te gjate");
                return redirect()->route('admin.jobs');
            }

            //Metoda tani duke i ndare fjalet e fjalise edhe duke kerkuar bazuar ne ato fjale
            $jobs_from_sentence = Job::Where(DB::raw('title'), 'like', '%' . $input . '%')->orderBy('title', 'ASC');//kerko me fjali
            $jobs_by_word = Job::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('title', 'like', "%{$input}%")
                        ->orWhere('body', 'like', "%{$input}%")
                        ->orWhere('duties', 'like', "%{$input}%")
                        ->orWhere('address', 'like', "%{$input}%")
                        ->orWhere('price_type', 'like', "%{$input}%")
                        ->orWhere('price', 'like', "%{$input}%")->orderBy('title', 'ASC');
                }
            });
            if ($category != ''){
                $jobs = $jobs_from_sentence->where('category_id', $category)->union($jobs_by_word->where('category_id', $category))->paginate(10)->appends(request()->query());
            }
            else {
                $jobs = $jobs_from_sentence->union($jobs_by_word)->paginate(10)->appends(request()->query());
            }
            $jobs_count = $jobs->count();

            //Kjo appends per te marrur edhe get requestat tjere ne get metoden
            return view('admin.search.jobs', compact('jobs', 'jobs_count', 'user', 'categories'));

        }
        else{
            if ($category != ''){
                $jobs = Job::where('category_id',$category)->paginate(10);
                $jobs_count = $jobs->count();
                return view('admin.search.jobs', compact('jobs', 'jobs_count', 'user', 'categories'));

            }
            else{
                return redirect()->route('admin.jobs');
            }
        }

    }
    public function users(Request $request)
    {
        $categories = Category::all();
        $user = auth()->user();
        $input = $request->q;
        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);

        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Ju lutem jepni nje fjale me te gjate");
                return redirect()->route('admin.users');
            }

            //Metoda tani duke i ndare fjalet e fjalise edhe duke kerkuar bazuar ne ato fjale
            $users_by_sentence = User::Where(DB::raw('CONCAT(name, " ", surname)'), 'like', '%' . $input . '%')->orderBy('name', 'ASC');//kerko me fjali
            $users_by_word = User::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('name', 'like', "%{$input}%")
                        ->orWhere('surname', 'like', "%{$input}%")
                        ->orWhere('username', 'like', "%{$input}%")
                        ->orWhere('slug', 'like', "%{$input}%")
                        ->orWhere('email', 'like', "%{$input}%")->orderBy('name', 'ASC');
                }
            });


            $users = $users_by_sentence->union($users_by_word)->paginate(10)->appends(request()->query());
            $users_count = $users->count();

            //Kjo appends per te marrur edhe get requestat tjere ne get metoden
            return view('admin.search.users', compact('users','user', 'categories', 'users_count'));
        }
        else{

            return redirect()->route('admin.users');
        }
    }
    public function companies(Request $request){
        $categories = Category::all();
        $user = auth()->user();
        $input = $request->q;
        $separated_input = preg_split('/(?<=\w)\b\s*[!?.]*/', $input, -1, PREG_SPLIT_NO_EMPTY);

        if ($input != '') {
            if (strlen($input) <= 2) {
                session()->flash('min_length_input', "Ju lutem jepni nje fjale me te gjate");
                return redirect()->route('admin.users');
            }

            //Metoda tani duke i ndare fjalet e fjalise edhe duke kerkuar bazuar ne ato fjale
            $users_by_sentence = Company::Where(DB::raw('name'), 'like', '%' . $input . '%')->orderBy('name', 'ASC');//kerko me fjali
            $users_by_word = Company::where(function ($q) use ($separated_input) {
                foreach ($separated_input as $input) {
                    if (strlen($input) < 2) {
                        continue;
                    }
                    $q->orWhere('name', 'like', "%{$input}%")
                        ->orWhere('industry', 'like', "%{$input}%")
                        ->orWhere('capacity', 'like', "%{$input}%")
                        ->orWhere('address', 'like', "%{$input}%")
                        ->orWhere('tel', 'like', "%{$input}%")
                        ->orWhere('website','like', "%{$input}%")->orderBy('name', 'ASC');
                }
            });


            $users = $users_by_sentence->union($users_by_word)->paginate(10)->appends(request()->query());
            $users_count = $users->count();

            //Kjo appends per te marrur edhe get requestat tjere ne get metoden
            return view('admin.search.companies', compact('users','user', 'categories', 'users_count'));
        }
        else{

            return redirect()->route('admin.companies');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
