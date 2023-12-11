@extends('layouts.staticIndex')
@section('styles')
<style>
    @media screen and (max-width: 1000px) {
        .btn {
            border-radius: 0.5rem !important;


            margin-top: 20px;
            width: 100%;
        }
        #q{
            border-radius: 0px;
        }
    }
</style>
@endsection
@section('title')
    <title>
        {{ 'Jobs - EmployingX'}}
    </title>
@endsection
@section('content')
<div class="container-fluid py-4">
    <form action="{{ route('user.search.jobs') }}" method="GET" style="margin: 0 auto; max-width: 800px;">
        <div class="row g-0">
            <div class="col-lg-3 col-6">
                <input id="q" name="q" class="form-control" value="@if(isset($_GET['q'])){{$_GET['q']}}@endif" type="text" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px; border: 1px solid #ced4da; padding: 10px;" placeholder="Search jobs" autocomplete="off">
            </div>
            <div class="col-lg-2 col-6" style="padding: 10px;">
                <select class="form-select" name="category" id="category" style="border-radius: 10px; height: 100%;" aria-label="Default select example">
                    <option value="" selected>Categories</option>
                    @foreach($categories as $category)
                        <option value="{{$category->slug}}">{{$category->name}}</option>
                     @endforeach
                </select>
            </div>
            <div class="col-lg-2 col-6" style="padding: 10px;">
                <select class="form-select" name="job_type" id="job_type" style="border-radius: 10px; height: 100%;" aria-label="Default select example">
                    <option value="" selected>Job Type</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Full Time">Full Time</option>
                </select>
            </div>
            <div class="col-lg-2 col-6" style="padding: 10px;">
                <select class="form-select" name="price_type" id="price_type" style="border-radius: 10px; height: 100%;" aria-label="Default select example">
                    <option value="" selected>Payment</option>
                    <option value="Fixed">Fixed</option>
                    <option value="Hourly">Hourly</option>
                </select>
            </div>
            <div class="col-lg-3 col-12" style="padding: 10px; display: flex; align-items: center; justify-content: center;">
                <button type="submit" class="btn btn-dark search" style="border-radius: 0px;">Search</button>
            </div>
        </div>
    </form>
    <div class="card-header pb-0">                  
        @if (session('added_jobRequest'))
            <span style="color:green!important">{{session('added_jobRequest')}}</span>
        @endif
    </div>
    <div class="row">
    @if (count($jobs)>0)
        @foreach($jobs as $job)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="w-100 border-radius-lg shadow-lg" src="/images/{{$job->user->photo->name}}" alt="{{$job->title}}">
                        </div>
                        <div class="col-md-8">
                            <h3 class="mt-1">{{$job->title}}</h3>
                            <p style="font-weight: bold; color: red; font-size: 24px;">{{$job->user->company->name}}</p>
                            <p><i class="fa fa-list-alt" aria-hidden="true"></i> <span>{{$job->category->name}}</span></p>
                            <p><i class="fas fa-address-card"></i> <span>{{$job->address}}</span></p>
                            <p><i class="fas fa-calendar-alt"></i> <span>{{$job->startingDate}} | {{$job->endingDate ? $job->endingDate : ''}}</span></p>
                            <p><strong>Price ({{$job->price_type}}):</strong> <span>${{$job->price}}</span></p>
                            <p><strong>Address:</strong> <span>{{$job->address}}</span></p>
                            <p><strong>Experience:</strong> <span>{{$job->experience}}</span></p>
                            <p><strong>Job Type:</strong> <span>{{$job->job_type}}</span></p>
                            <div class="mt-3 d-flex justify-between">
                            <a href="{{ route('job.showByUser', $job->slug) }}" class="btn btn-primary mr-2">See job</a>
                                @php
                                $applied = false;
                                @endphp
                                @foreach($jobsRequest as $jobRequest)
                                    @if ($jobRequest->user_id == auth()->user()->id && $jobRequest->job_id == $job->id)
                                        @php
                                            $applied = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if (!$applied)
                                    @if(auth()->user()->email_verified_at != null)
                                    <form action="{{ route('jobRequest.create', ['userId' => auth()->user()->id, 'jobId' => $job->id]) }}" method="POST">
                                        @Method("PATCH")    
                                        @csrf
                                            <button type="submit" name="remove_jobRequest" class="btn btn-primary">Apply</button>
                                        </form>
                                    @endif
                                @else
                                    <button type="button" name="remove_jobRequest" class="btn btn-success">Applied</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <div class="col-12">
                <p class="text-center" style="color: red; font-size: 18px; font-weight: bold;">No jobs found</p>
            </div>
    @endif
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

            const jobtypeBtn = document.getElementById('job_type');
            const jobtypeValue = jobtypeBtn.options[jobtypeBtn.selectedIndex].text;

            const pricetypeBtn = document.getElementById('price_type');
            const pricetypeValue = pricetypeBtn.options[pricetypeBtn.selectedIndex].text;

            if (searchField.value == ''){
                searchField.disabled = true;
            }
            if (categoryValue == 'Categories'){
                categoriesBtn.disabled = true;
            }
            if (jobtypeValue == 'Job Type'){
                jobtypeBtn.disabled = true;
            }
            if (pricetypeValue == 'Price Type'){
                pricetypeBtn.disabled = true;
            }

        });
    </script>

@endsection
