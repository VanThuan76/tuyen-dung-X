@extends('layouts.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Shpalljet</h6>
                        @if (session('deleted_job'))
                            <span style="color:red">{{session('deleted_job')}}</span>
                            @endif
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if (count($jobs)>0)
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titulli</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategoria</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data e Fillimit</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data e Mbarimit</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data e Mbarimit</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($jobs as $job)

                                    <tr>
                                        <td>
                                            <a href="{{route('company.show',$job->slug)}}">
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
                                            <p class="text-xs text-secondary mb-0">Organization</p>
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
                                                    <button type="submit" name="remove_job" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Fshij</button> </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            @else
                                <span style="color:red; margin-left: 25px;">Nuk ka shpallje të postuara.</span>
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
