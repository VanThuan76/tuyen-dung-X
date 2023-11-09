<?php 
    use App\Models\Job;
    use App\Models\JobRequest;
?>

@extends('layouts.staticIndex')
<?php
 $jobs = Job::all();
 $jobsRequest = JobRequest::all();
?>
@section('title')
    <title>
    Jobs EmployingX
    </title>
@endsection
@section('content')
<div class="container-fluid py-4">
    @foreach($jobs as $job)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: grid; grid-template-columns: 1fr 2fr 1fr;">
                            <div class="text-center">
                                <img class="w-50 border-radius-lg shadow-lg mx-auto" src="/images/{{$job->user->photo->name}}" alt="{{$job->title}}">
                            </div>
                            <div class="col-lg-6 mx-auto">
                                <div class="row" style="flex-direction:column; min-height: 30vh;">
                                    <div class="row" style="display: flex; gap: 20px; justify-content: start; align-items: center;">
                                        <h3 class="mt-lg-0 mt-4">{{$job->title}}</h3>
                                        <div style="display: flex; gap: 5px; justify-content: start; align-items: start;">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                            <span>{{$job->category->name}}</span>
                                        </div>
                                        <div style="display: flex; gap: 5px; justify-content: start; align-items: start;">
                                            <i class="fas fa-address-card"></i> 
                                            <span>{{$job->address}}</span>
                                        </div>
                                        <div style="display: flex; gap: 5px; justify-content: start; align-items: start;">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>{{$job->startingDate}} | {{$job->endingDate ? $job->endingDate : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="flex-direction:column">
                                        <div style="display: flex; gap: 5px; justify-content: start; align-items: center;">
                                            <h4>Price ({{$job->price_type}}):</h4>
                                            <h5>${{$job->price}}</h5>
                                        </div>
                                        <div style="display: flex; gap: 5px; justify-content: start; align-items: center;">
                                            <h4>Address:</h4>
                                            <h5>{{$job->address}}</h5>
                                        </div>
                                        <div style="display: flex; gap: 5px; justify-content: start; align-items: center;">
                                            <h4>Experience</h4>
                                            <h5>{{$job->experience}}</h5>
                                        </div>
                                        <div style="display: flex; gap: 5px; justify-content: start; align-items: center;">
                                            <h4>Job Type:</h4>
                                            <h5>{{$job->job_type}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 mx-auto">
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
                                    <form action="{{ route('jobRequest.create', ['userId' => auth()->user()->id, 'jobId' => $job->id]) }}" method="POST" style="display: inline;">
                                        @method("PATCH")
                                        @csrf
                                        <button type="submit" name="remove_jobRequest" style="text-decoration: none; color:green!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Apply</button>
                                    </form>
                                @else
                                    <button type="button" name="remove_jobRequest" style="text-decoration: none; color:red!important; padding: 0; margin:0!important;text-transform: none;" class="btn btn-link">Applied</button>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endforeach
@endsection
