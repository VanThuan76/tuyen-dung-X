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
    <div class="row">
        @foreach($jobs as $job)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="w-100 border-radius-lg shadow-lg" src="/images/{{$job->user->photo->name}}" alt="{{$job->title}}">
                        </div>
                        <div class="col-md-8">
                            <h3 class="mt-1" style="white-space: nowrap;">{{$job->title}}</h3>
                            <p style="font-weight: bold; color: red; font-size: 24px;">{{$job->user->company->name}}</p>
                            <p><i class="fa fa-list-alt" aria-hidden="true"></i> <span>{{$job->category->name}}</span></p>
                            <p><i class="fas fa-address-card"></i> <span>{{$job->address}}</span></p>
                            <p><i class="fas fa-calendar-alt"></i> <span>{{$job->startingDate}} | {{$job->endingDate ? $job->endingDate : ''}}</span></p>
                            <p><strong>Price ({{$job->price_type}}):</strong> <span>${{$job->price}}</span></p>
                            <p><strong>Address:</strong> <span>{{$job->address}}</span></p>
                            <p><strong>Experience:</strong> <span>{{$job->experience}}</span></p>
                            <p><strong>Job Type:</strong> <span>{{$job->job_type}}</span></p>
                            <div class="mt-3 d-flex justify-between">
                            <a href="{{ route('job.show', $job->slug) }}" class="btn btn-primary mr-2">See job</a>
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
                                    <form action="{{ route('jobRequest.create', ['userId' => auth()->user()->id, 'jobId' => $job->id]) }}" method="POST">
                                    @Method("PATCH")    
                                    @csrf
                                        <button type="submit" name="remove_jobRequest" class="btn btn-primary">Apply</button>
                                    </form>
                                @else
                                    <button type="button" name="remove_jobRequest" class="btn btn-success">Applied</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
