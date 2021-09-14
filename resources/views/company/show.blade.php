@extends('layouts.index')
@section('title')
    <title>
        {{$user->company->name . ' - EmployingX'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('{{asset('/assets/img/curved-images/curved0.jpg')}}'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/images/{{$user->photo->name}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$user->company->name}}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{$user->name . " ". $user->surname}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-xl-4 ">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Overall Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{route('company.edit')}}">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ndrysho profilin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <hr class="horizontal gray-light my-1">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{$user->name . " ". $user->surname}}</li>
                            @if ($user->email)
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong><a href="mailto:{{$user->email}}"> {{$user->email}}</a> </li>@endif
                            @if($user->company->name)  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Company Name:</strong> &nbsp;{{$user->company->name}}</li>@endif
                            @if($user->company->industry)   <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Industry:</strong> &nbsp;{{$user->company->industry}}</li>@endif
                            @if($user->company->capacity)  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Capacity:</strong> &nbsp;{{$user->company->capacity}}</li>@endif
                            @if($user->company->address)  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address:</strong> &nbsp;{{$user->company->address}}</li>@endif
                            @if($user->company->tel)  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile Number:</strong> &nbsp;&nbsp;{{$user->company->tel}}</li>@endif
                            @if($user->company->website)  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Website:</strong> &nbsp;{{$user->company->website}}</li>@endif

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-8 mt-md-0 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="card-body p-3">
                        @if ($user->about)
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">About</h6>
                            <p class="text-sm">
                                {{$user->about}}
                            </p>
                        @endif
                    </div>
                </div>
            </div>


        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Jobs</h6>
                        <p class="text-sm">All posted jobs</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-5" style="margin-bottom: 50px;">
                                <div class="card h-100 card-plain border">
                                    <div class="card-body d-flex flex-column justify-content-center text-center">
                                        <a href="{{route('job.create')}}">
                                            <i class="fa fa-plus text-secondary mb-3"></i>
                                            <h5 class=" text-secondary"> Krijo punë </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @foreach($jobs as $job)
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-5">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="/images/{{$user->photo->name}}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0">
                                        <p class="text-gradient text-dark mb-2 text-sm">{{$job->category->name}}</p>
                                        <a href="{{route('job.show',$job->slug)}}">
                                            <h5>
                                                {{Str::limit($job->title,50)}}
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            {{Str::limit($job->body,100)}}
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="{{route('job.show',$job->slug)}}" class="btn btn-outline-primary btn-sm mb-0">Shikoni shpalljen</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>

                    </div>
                    <div class="d-flex justify-content-center mt-3">
                    {{$jobs->links()}}
                    </div>
                </div>
            </div>
        </div>

@endsection
