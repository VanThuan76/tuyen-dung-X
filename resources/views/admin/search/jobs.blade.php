@extends('layouts.index')
@section('styles')
    <style>
        @media screen and (max-width: 1000px) {
            .btn {
                border-radius: 0.5rem !important;


                margin-top: 20px;
                width: 100%;
            }
        }
    </style>
@endsection
@section('title')
    <title>
        {{ 'Search Jobs - EmployingX'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">

        <form action="{{route('admin.search.jobs')}}" method="GET">
            <div class="row g-0">
                <div class="col-lg-4 col-6">
                    <input id="q" name="q" class="form-control" value="@if(isset($_GET['q'])){{$_GET['q']}}@endif" type="text" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px" placeholder="Search jobs" autocomplete="off">
                </div>
                <div class="col-lg-4 col-6">
                    <select class="form-select" name="category" id="category" style="border-radius: 0px;" aria-label="Default select example">
                        <option value ="" selected>Categories</option>
                        @foreach($categories as $category)
                            <option value="{{$category->slug}}" @if(isset($_GET['category'])) @if($_GET['category'] == $category->slug) {{'selected'}} @endif @endif>{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-lg-4 col-12"><button type="submit" class="btn btn-dark search" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">Search</button></div>
            </div>
        </form>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">

                        <h6>Jobs</h6>
                        @if (session('deleted_job'))
                            <span style="color:red">{{session('deleted_job')}}</span>
                        @endif
                        @if (session('min_length_input'))
                            <span style="color:red">{{session('min_length_input')}}</span>
                        @endif

                    </div>
                    @if (isset($_GET['q']))
                        <span style="color:grey; margin-left: 25px;">Search results for <span style="color:red">{{$_GET['q']}}</span></span>
                        <span style="color:grey; margin-left: 25px;">{{$jobs_count}} job found</span>
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if (count($jobs)>0)
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category/Address</th>
                                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Price type</th>
                                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Price</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Start date</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">End date</th>
                                        <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Options</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($jobs as $job)

                                        <tr>
                                            <td>
                                                <a href="{{route('job.show',$job->slug)}}">
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="/images/{{$job->user->photo->name}}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$job->title}}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{$job->user->company->name}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$job->category->name}}</p>
                                                <p class="text-xs text-secondary mb-0">{{$job->address}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{$job->price_type}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{$job->price}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{$job->startingDate}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{($job->endingDate) ? $job->endingDate : '/' }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <form action="{{route('job.destroy',$job->slug)}}" method="POST" style="display: inline; ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="remove_job" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Delete</button> </form>
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            @else
                                <span style="color:red; margin-left: 25px;">No jobs found.</span>
                            @endif
                            <div class="d-flex justify-content-center mt-3">
                                {{$jobs->links()}}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

@endsection
@section('scripts')
            <script>
                const searchBtn = document.querySelector('.search');
                searchBtn.addEventListener('click',function(){

                    const searchField = document.querySelector('#q');
                    const categoriesBtn = document.getElementById('category');
                    const categoryValue = categoriesBtn.options[categoriesBtn.selectedIndex].text;
                    if (searchField.value == ''){
                        searchField.disabled = true;
                    }
                    if (categoryValue == 'Categories'){
                        categoriesBtn.disabled = true;
                    }

                });
            </script>

@endsection
