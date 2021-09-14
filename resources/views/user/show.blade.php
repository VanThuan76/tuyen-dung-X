@extends('layouts.index')
@section('title')
    <title>
        {{$user->name . " " .  $user->surname . ' - EmployingX'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
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
                           {{$user->name. " ". $user->surname}}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                          {{$user->category->name}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{route('user.edit')}}">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ndrysho profilin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <hr class="horizontal gray-light my-1">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;{{$user->name. " " . $user->surname}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> <a href="mailto:{{$user->email}}"> {{$user->email}}</a> </li>
                            @if ($user->category)
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Category:</strong> &nbsp;{{$user->category->name}}</li>@endif
                            @if ($user->cv)
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">CV:</strong> &nbsp; <a href="/files/{{$user->cv}}"><img src="{{asset('/assets/img/pdf.webp')}}" style="width: 20px"></a> </li>@endif
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-facebook fa-lg"></i>
                                </a>
                                <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </a>
                                <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                    <i class="fab fa-instagram fa-lg"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-8  mt-md-0 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="card-body p-3">
                        @if ($user->about)
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">About You</h6>
                    <p class="text-sm">
                        {{$user->about}}
                    </p>
                            @endif
                    </div>
                </div>
            </div>


        </div>


@endsection
