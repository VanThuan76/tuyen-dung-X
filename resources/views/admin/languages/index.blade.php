@extends('layouts.index')
@section('title')
    <title>
        {{ 'Languages - EmployingX'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form action="{{route('admin.language.store')}}" method="POST">
        @csrf
        @method('POST')
        <!-- Card Basic Info -->
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Create Language</h5>
                    @if (session('added_language'))
                        <span style="color:green">{{session('added_language')}}</span>
                    @endif
                    @if (session('deleted_language'))
                        <span style="color:red">{{session('deleted_language')}}</span>
                    @endif
                    @if (session('updated_language'))
                        <span style="color:green">{{session('updated_language')}}</span>
                    @endif

                </div>
                <div class="card-body pt-0">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-6 col-12">
                            <label class="form-label">Language</label>
                            <div class="input-group">
                                <input id="name" name="name" class="form-control" type="text" placeholder="Language" required="required" autofocus autocomplete="off">
                            </div>
                            @error('name')
                            <span style="color:red; ">{{ $message }}</span>
                            @enderror
                            <button class="btn bg-gradient-dark btn-sm float-end mt-2 mb-0">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Languages</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Options</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($languages as $language)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$language->id}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{$language->name}}</h6>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <h6 class="mb-0 text-sm">{{$language->created_at->diffForHumans()}}</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><a href="{{route('admin.language.edit',$language->slug)}}">Change</a>/
                                                <form action="{{route('admin.language.destroy',$language->slug)}}" method="POST" style="display: inline; ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="remove_language" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Delete</button> </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{$languages->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
