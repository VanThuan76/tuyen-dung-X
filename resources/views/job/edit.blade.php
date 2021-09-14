@extends('layouts.index')
@section('title')
    <title>
        {{$job->title.' - EmployingX'}}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">

                <form action="{{route('job.update',$job->slug)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card card-body mt-4">
                        <h6 class="mb-0">{{$job->title}}</h6>
                        <p class="text-sm mb-0">Update job</p>
                        @if (session('job_updated'))
                            <span style="color:green;">
           {{ session('job_updated') }}
            </span>
                        @endif
                        <hr class="horizontal dark my-3">
                        <label for="jobName" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="jobName" autocomplete="off" value="{{ $job->title }}">
                        @error('title')
                        <span style="color:red;">{{ $message }}</span>
                        @enderror
                        <label class="mt-4">Description</label>
                        <p class="form-text text-muted text-xs ms-1">
                            This is how others will learn about the project, so make it good!
                        </p>


                        <textarea id="body" name="body" class="form-control" rows="5">{{$job->body}}</textarea>

                        @error('body')
                        <span style="color:red;">{{ $message }}</span>
                        @enderror
                        <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label">Address</label>
                                <input class="form-control address" type="text" name="address" autocomplete="off" placeholder="Address" value="{{$job->address}}">

                                @if (session('error_address'))
                                    <span style="color:red;">{{ session('error_address') }}</span>
                                @endif
                                @error('address')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label class="form-label">Remote</label>

                                    <div class="form-check form-switch ms-1">
                                        <input class="form-check-input" type="checkbox" {{ $job->remote == 1 ? 'checked' : ''}} name="remote" id="remoteFlexSwitchCheckDefault" onclick="notify(this)" >
                                        <label class="form-check-label" for="remoteFlexSwitchCheckDefault">Work is remote</label>
                                    </div>
                                </div>
                                @error('remote')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                    <option value="" selected>Choose Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $job->category_id == $category->id ? 'selected' : ''}} >{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror

                                @if (session('category_error'))
                                    <span style="color:red;">{{ session('category_error') }}</span>
                                @endif
                            </div>
                            <div class="col-6">
                                <label class="form-label">Experience</label>
                                <select class="form-select" name="experience" aria-label="Default select example">
                                    <option value="" selected>Choose Experience</option>
                                    <option value="0" @if ($job->experience=='0') selected @endif>0 years</option>
                                    <option value="1" @if ($job->experience=='1-3') selected @endif >1 - 3 years</option>
                                    <option value="2" @if ($job->experience=='4-7') selected @endif>4 - 7 years</option>
                                    <option value="3" @if ($job->experience=='+7') selected @endif>+7 years</option>
                                </select>

                                @error('experience')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                        <div class="row mt-2">

                            <div class="col-12">
                                <label class="form-label">Responsibilities</label>
                                <textarea id="duties" name="duties" class="form-control" rows="5">{{$job->duties}}</textarea>
                                @error('duties')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label">Starting Date</label>
                                <input class="form-control datetimepicker startingDate" type="text" style="cursor: pointer" name="startingDate" placeholder="Start date of the work" autocomplete="off" data-input value="{{$job->startingDate}}">
                                @error('startingDate')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Ending Date</label>
                                <input class="form-control datetimepicker endingDate" type="text" style="cursor: pointer" name="endingDate" placeholder="End date of the work" autocomplete="off" data-input value="{{$job->endingDate}}">
                                @error('endingDate')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                                @if (session('error_endDate'))
                                    <span style="color:red;">{{session('error_endDate')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>
                                        Long-term
                                    </label>
                                    <p class="form-text text-muted text-xs ms-1">
                                        This position is long-term.
                                    </p>
                                    <div class="form-check form-switch ms-1">
                                        <input class="form-check-input" type="checkbox" {{ old('has_endDate') == 'on' ? 'checked' : ''}} name="has_endDate" id="flexSwitchCheckDefault" onclick="notify(this)" >
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Work is long-term</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Job Type</label>
                                    <select class="form-select" name="job_type" aria-label="Default select example">
                                        <option value="" selected>Select Payment</option>
                                        <option value="1" @if ($job->job_type=='Part Time') selected @endif>Part Time</option>
                                        <option value="2" @if ($job->job_type=='Full Time') selected @endif>Full Time</option>
                                    </select>
                                    @error('job_type')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label">Payment</label>
                                <select class="form-select" name="price_type" aria-label="Default select example">
                                    <option value="" selected>Select Payment</option>
                                    <option value="1" @if ($job->price_type=='Fixed') selected @endif>Fixed</option>
                                    <option value="2" @if ($job->price_type=='Hourly') selected @endif>Hourly</option>
                                </select>
                                @error('price_type')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Price</label>
                                <div class="input-group mb-3">

                                    <span class="input-group-text">€</span>

                                    <input type="number" name="price" style="outline: none !important;" value="{{$job->price}}" class="form-control" aria-label="Amount (to the nearest dollar)">

                                </div>
                                @error('price')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" name="button" class="btn btn-light m-0">Cancel</button>
                            <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Create Job offer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



@endsection
@section('scripts')
    <script>

        const endingDate= document.querySelector('.endingDate');
        const dateSwitch = document.querySelector('#flexSwitchCheckDefault');
        const remoteSwitch = document.querySelector('#remoteFlexSwitchCheckDefault');
        const address = document.querySelector('.address');
        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }

        dateSwitch.addEventListener('click',function(){
            if (this.checked == true){
                endingDate.disabled = true;
            }
            else{
                endingDate.disabled = false;

            }
        });

        if (address.value == ''){
            remoteSwitch.checked = true;
            address.disabled = true;
        }
        if (endingDate.value == ''){
            dateSwitch.checked = true;
            endingDate.disabled = true;
        }

    </script>
@endsection

