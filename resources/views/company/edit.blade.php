@extends('layouts.index')
@section('content')
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
            @include('includes.accountSidebar')

            <div class="col-lg-9 mt-lg-0 mt-4">
                <!-- Card Profile -->
                @include('includes.cardProfile')
                <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <!-- Card Basic Info -->
                    <div class="card mt-4" id="basic-info">
                        <div class="card-header">
                            <h5>Basic Information</h5>
                            @if (session('profile_updated'))
                                <span style="color:green">{{session('profile_updated')}}</span>
                                @endif
                        </div>

                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">Name</label>
                                    <div class="input-group">
                                        <input id="name" name="name" class="form-control" type="text" placeholder="{{$user->name}}" required="required" autocomplete="off" value="{{$user->name}}">
                                    </div>
                                    @error('name')
                                    <span style="color:red; ">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-6">
                                    <label class="form-label">Surname</label>
                                    <div class="input-group">
                                        <input id="surname" name="surname" class="form-control" type="text" placeholder="{{$user->surname}}" required="required" autocomplete="off" value="{{$user->surname}}">
                                    </div>
                                    @error('surname')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label mt-4">About</label>
                                    <div class="input-group">
                                        <textarea id="about" name="about" class="form-control" rows="5">{{$user->about}}</textarea>

                                    </div>
                                    @error('about')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Email</label>
                                    <div class="input-group">
                                        <input id="email" name="email" class="form-control" type="email" placeholder="{{$user->email}}" value="{{$user->email}}">
                                    </div>
                                    @error('email')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Industry</label>
                                    <div class="input-group">
                                        <input id="industry" name="industry" class="form-control" type="text" placeholder="{{$user->company->industry}}" value="{{$user->company->industry}}">
                                    </div>
                                    @error('industry')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Capacity</label>
                                    <div class="input-group">
                                        <input id="capacity" name="capacity" class="form-control" type="text" placeholder="{{$user->company->capacity}}" value="{{$user->company->capacity}}">
                                    </div>
                                    @error('capacity')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Address</label>
                                    <div class="input-group">
                                        <input id="address" name="address" class="form-control" type="text" placeholder="{{$user->company->address}}" value="{{$user->company->address}}">
                                    </div>
                                    @error('address')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Mobile Number</label>
                                    <div class="input-group">
                                        <input id="tel" name="tel" class="form-control" type="text" placeholder="{{$user->company->tel}}" value="{{$user->company->tel}}">
                                    </div>
                                    @error('tel')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Website</label>
                                    <div class="input-group">
                                        <input id="website" name="website" class="form-control" type="text" placeholder="{{$user->company->website}}" value="{{$user->company->website}}">
                                    </div>
                                    @error('website')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update Profile</button>
                        </div>
                    </div>
                </form>

            </div>


        </div></div>

@endsection
