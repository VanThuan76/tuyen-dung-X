@extends('layouts.staticIndex')
@foreach($jobs as $job)
@section('title')
    <title>
    Jobs EmployingX
    </title>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 text-center">
                            <img class="w-50 border-radius-lg shadow-lg mx-auto" src="/images/{{$job->user->photo->name}}" alt="{{$job->title}}">
                        </div>
                        <div class="col-lg-5 mx-auto">
                            <div class="row">
                                <div class="row">
                                    <h3 class="mt-lg-0 mt-4">{{$job->title}}</h3>
                                    <i class="fa fa-list-alt" aria-hidden="true"></i> {{$job->category->name}}
                                    <br>
                                    <i class="fas fa-address-card"></i> {{$job->address}}<br>
                                    <i class="fas fa-calendar-alt"></i> {{$job->startingDate}} | {{$job->endingDate ? $job->endingDate : '/'}}<br>
                                </div>
                                <h6 class="mb-0 mt-3">Price ({{$job->price_type}})</h6>
                            </div>
                            <h5>€{{$job->price}}</h5>
                            <label class="mt-1">Address</label><br>
                            <span>
                                {{$job->address}}
                              </span>
                                  <br>
                                  <label class="mt-1">Experience</label><br>
                            <span>
                                {{$job->experience}}
                              </span>
                                  <br>
                            <label class="mt-1">Job Type</label>
                                  <br>
                            <span>
                                {{$job->job_type}}
                              </span>
                            @if (auth()->user()->id == $job->user_id)
                            <div class="row mt-4">
                                <div class="col-lg-5">
                                    <a href="{{route('job.edit',$job->slug)}}" class="btn bg-gradient-dark mb-0 mt-lg-auto mt-2 w-100" type="button">Edit job</a>
                                </div>

                                @endif
                            @if (auth()->user()->id == $job->user_id)
                                    <div class="col-lg-5">
                                        <form action="{{route('job.destroy',$job->slug)}}" method="POST">@csrf @method('DELETE')
                                        <button class="btn bg-gradient-danger mb-0 mt-lg-auto mt-2 w-100" type="submit">Delete job</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
