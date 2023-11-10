<?php 
    use App\Models\Job;
    use App\Models\JobRequest;
?>

@extends('layouts.index')
<?php
 $jobs = Job::all();
 $jobsRequest = JobRequest::all();
?>
@section('title')
    <title>
    {{$job->title .' - EmployingX'}}
    </title>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Job details</h5>
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-center">
                            <img class="w-100 border-radius-lg shadow-lg mx-auto" src="/images/{{$job->user->photo->name}}" alt="{{$job->title}}">
                            <!-- Root element of PhotoSwipe. Must have class pswp. -->
                        </div>
                        <div class="col-lg-5 mx-auto">
                            <h3 class="mt-lg-0 mt-4">{{$job->title}}</h3>


                            <i class="fa fa-list-alt" aria-hidden="true"></i> {{$job->category->name}}
                            <br>
                            <i class="fas fa-address-card"></i> {{$job->address}}<br>
                            <i class="fas fa-calendar-alt"></i> {{$job->startingDate}} | {{$job->endingDate ? $job->endingDate : '/'}}<br>
                            <h6 class="mb-0 mt-3">Price ({{$job->price_type}})</h6>
                            <h5>€{{$job->price}}</h5>

                            <br>
                            <label>Description</label>
                            <br>
                            <span>
                              {!! nl2br($job->body) !!}
                            </span>
                            <br>
                            <label class="mt-1">Responsibilities</label><br>
                            <span>
                               {!! nl2br($job->duties) !!}
                            </span>
                            <br>
                            <label class="mt-1">Address</label><br>
                            <span>
                                {{$job->address}}
                              </span>
                                  <br>
                                  <label class="mt-1">Experience</label><br>
                            <span>
                                {{$job->experience}}
                              </span>
                                  <br>
                            <label class="mt-1">Job Type</label>
                                  <br>
                            <span>
                                {{$job->job_type}}
                              </span>
                             <br>
                             @if (auth()->user()->role->name == 'user')
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
                                        <button type="submit" name="remove_jobRequest" class="btn btn-primary mt-4 btn-lg">Apply</button>
                                    </form>
                                @else
                                    <button type="button" name="remove_jobRequest" class="btn btn-success mt-4 btn-lg">Applied</button>
                                @endif
                            @endif
                            @if (auth()->user()->id == $job->user_id)
                            <div class="row mt-4">
                                <div class="col-lg-5">
                                    <a href="{{route('job.edit',$job->slug)}}" class="btn bg-gradient-dark mb-0 mt-lg-auto mt-2 w-100" type="button">Edit job</a>
                            </div>
                            @endif
                            @if (auth()->user()->id == $job->user_id)
                                <div class="col-lg-5">
                                    <button class="btn bg-gradient-danger mb-0 mt-lg-auto mt-2 w-100" data-toggle="modal" data-target="#confirmDeleteJobModal">Delete job</button>
                                </div>
                            @endif
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <h5 class="ms-3">Related Jobs</h5>
                            <div class="table table-responsive">
                                @if (count($jobs)>0)
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Job</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Job type</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Experience</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($jobs as $job)

                                    <tr>

                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <a href="{{route('job.show',$job->slug)}}">
                                                    <img src="/images/{{$job->user->photo->name}}" class="avatar avatar-md me-3" alt="table image">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="{{route('job.show',$job->slug)}}"><h6 class="mb-0 text-sm">{{$job->title}}</h6></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <p class="text-sm text-secondary mb-0">{{$job->price}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-secondary mb-0">{{$job->address}}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm text-secondary  mb-0">{{$job->job_type}}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary  text-sm">{{$job->experience}}</span>
                                        </td>
                                    </tr>

                                    @endforeach

                                    </tbody>

                                </table>
                                @else
                                    <span style="color:red; margin-left: 25px;">No jobs found.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal cửa sổ xác nhận xóa công việc -->
<div class="modal fade" id="confirmDeleteJobModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteJobModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteJobModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this job?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{route('job.destroy',$job->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
