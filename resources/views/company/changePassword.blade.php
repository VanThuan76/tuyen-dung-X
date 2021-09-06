@extends('layouts.index')
@section('content')
    <div class="container-fluid my-3 py-3">



        <div class="row mb-5">
            @include('includes.accountSidebar')
            <div class="col-lg-9 mt-lg-0 mt-4">
                <!-- Card Profile -->
                @include('includes.cardProfile')
                <form action="{{route('user.password.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <!-- Card Change Password -->
                    <div class="card mt-4" id="password">
                        <div class="card-header">
                            <h5>Ndrysho fjalëkalimin</h5>
                            @if(session('password_changed'))
                                <span style="color:green; ">{{session('password_changed')}}</span>
                            @endif
                        </div>




                        <div class="card-body pt-0">
                            <label class="form-label">Fjalëkalimi aktual</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="current_password" placeholder="Fjalëkalimi aktual">
                                @if(session('invalid-current-password'))
                                    <span style="color:red; ">{{session('invalid-current-password')}}</span>
                                @endif
                                @error('current_password')
                                <span style="color:red; ">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="form-label">Fjalëkalimi i ri</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password"  placeholder="Fjalëkalimi i ri">
                                @error('password')
                                <span style="color:red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            <label class="form-label">Ri-shkruaj fjalëkalimin e ri</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Ri-shkruaj fjalëkalimin e ri">
                                @error('password_confirmation')
                                <span style="color:red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            <h5 class="mt-5">Kërkesat për fjalëkalim</h5>
                            <p class="text-muted mb-2">
                                Ndiqni këtë udhëzues për një fjalëkalim të fortë:
                            </p>
                            <ul class="text-muted ps-4 mb-0 float-start">
                                <li>
                                    <span class="text-sm">Një karakter special</span>
                                </li>
                                <li>
                                    <span class="text-sm">Minimum 8 karaktere</span>
                                </li>
                                <li>
                                    <span class="text-sm">Një numër (2 rekomandohen)</span>
                                </li>
                                <li>
                                    <span class="text-sm">Ndërroni shpesh</span>
                                </li>
                            </ul>
                            <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
                        </div>
                    </div>
                    <!-- Card Change Password -->
                </form>
            </div>
        </div>
    </div>

@endsection
