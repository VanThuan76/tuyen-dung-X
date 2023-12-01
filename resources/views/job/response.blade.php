<?php
    use App\Models\Job;
    use App\Models\User;
?>
@extends('layouts.index')
@section('title')
    <title>
        {{ 'Jobs Response - EmployingX' }}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Jobs Response</h6>
                    </div>
                    <div class="card-header">  
                        @if (session('updated_jobRequest'))
                            <span style="color:green!important">{{session('updated_jobRequest')}}</span>
                        @endif                 
                    </div>
                    <div class="card-body px-0 pb-2 pt-0">
                        <div class="table-responsive p-0">
                            <table class="align-items-center mb-0 table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Address</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Price</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Created</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Link</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Options</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobsResponse as $jobResponse)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $jobResponse->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ Job::where('id', $jobResponse->job_id)->first()->title }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ Job::where('id', $jobResponse->job_id)->first()->address }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">
                                                    {{ Job::where('id', $jobResponse->job_id)->first()->price }} $</h6>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <h6 class="mb-0 text-sm">{{ $jobResponse->created_at->diffForHumans() }}
                                                </h6>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <a class="nav-link"
                                                        href="{{ route('candidate.show', User::where('id', $jobResponse->user_id)->first()->slug) }}">Detail
                                                        Candidate</a>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <h6 class="mb-0 text-sm">
                                                        @if($jobResponse->status == '1')
                                                            Agree
                                                        @elseif($jobResponse->status == '2')
                                                            Disagree
                                                        @else
                                                            Not Response
                                                        @endif
                                                    </h6>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                            @if ($jobResponse->status === null)
                                            <span class="text-secondary font-weight-bold text-xs">
                                            <form action="{{ route('job.response.update', ['id' => $jobResponse->id, 'status' => 2]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                    <button type="submit" name="disAgree_jobResponse" style="text-decoration: none; color:rgb(201, 201, 63)!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Disagree</button>
                                            </form>
                                            <form action="{{ route('job.response.update', ['id' => $jobResponse->id, 'status' => 1]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                    <button type="submit" name="agree_jobResponse" style="text-decoration: none; color:green!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Agree</button>
                                            </form>
                                            </span>
                                                @endif
                                            </td>
                                                    </tr>
                                            @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
