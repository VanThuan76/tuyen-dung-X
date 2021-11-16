@extends('layouts.index')
@section('title')
    <title>
        {{ 'Sucessful Users - EmployingX'}}
    </title>
@endsection
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
@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Sucessful Users</h6>
                    </div>
                    @if (session('deleted_user'))
                        <span style="color:red; margin-left:25px ">{{session('deleted_user')}}</span>
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if (count($users)>0)
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Comment</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                        <th class="text-secondary opacity-7">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)

                                        <tr>
                                            <td>
                                                <a href="{{route('user.show',$user->user->slug)}}">
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="/images/{{$user->user->photo->name}}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$user->user->name. " ". $user->user->surname}}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{$user->user->email}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$user->user->category ? $user->user->category->name : "/"}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{$user->user->username ? $user->user->username : "/"}}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{$user->comment}}</p>

                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{$user->created_at->diffForHumans()}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <form action="{{route('admin.sucessful.users.destroy',$user->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                         <button type="submit" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Delete</button>
                                                    </form>
                                                </span>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            @else
                                <span style="color:red; margin-left: 25px;">Users not found.</span>
                            @endif
                            <div class="d-flex justify-content-center mt-3">
                                {{$users->links()}}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

@endsection
