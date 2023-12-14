@extends('layouts.index')
@section('title')
    <title>
        {{ 'Create job - EmployingX' }}
    </title>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">

                <form action="{{ route('job.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card card-body mt-4">
                        <h6 class="mb-0">New job</h6>
                        <p class="mb-0 text-sm">Create new job</p>
                        @if (session('job_created'))
                            <span style="color:green;">
                                {{ session('job_created') }}
                            </span>
                        @endif
                        <hr class="horizontal dark my-3">
                        <label for="jobName" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="jobName" autocomplete="off"
                            value="{{ old('title') }}">
                        @error('title')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                        <label class="mt-4">Description</label>
                        <p class="form-text text-muted ms-1 text-xs">
                            This is how others will learn about the project, so make it good!
                        </p>
                        <textarea id="body" name="body" class="form-control" rows="5">{{ old('body') }}</textarea>
                        @error('body')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                        <div class="row mt-2">
                            <div class="col-sm-6 col-12">
                                <label class="form-label mt-4">Address</label>
                                <input class="form-control address" type="text" name="address" autocomplete="off"
                                    placeholder="Address" value="{{ old('address') }}">
                                @if (session('error_address'))
                                    <span style="color:red;">{{ session('error_address') }}</span>
                                @endif
                                @error('address')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-12">

                                <div class="form-group">
                                    <label class="form-label mt-4">Remote</label>

                                    <div class="form-check form-switch ms-1">
                                        <input class="form-check-input" type="checkbox"
                                            {{ old('remote') == 'on' ? 'checked' : '' }} name="remote"
                                            id="remoteFlexSwitchCheckDefault">
                                        {{--                            <input class="form-check-input" type="checkbox" {{ old('remote') == 'on' ? 'checked' : ''}} name="remote" id="remoteFlexSwitchCheckDefault" onclick="notify(this)" > --}}
                                        <label class="form-check-label" for="remoteFlexSwitchCheckDefault">Work is
                                            remote</label>
                                    </div>
                                </div>
                                @error('remote')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <label class="form-label mt-4">Category</label>
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                    <option value="" selected>Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror

                                @if (session('category_error'))
                                    <span style="color:red;">{{ session('category_error') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-12">
                                <label class="form-label mt-4">Experience</label>
                                <select class="form-select" name="experience" aria-label="Default select example">
                                    <option value="" selected>Choose Experience</option>
                                    <option value="0" @if (old('experience') == 0) selected @endif>0 years
                                    </option>
                                    <option value="1" @if (old('experience') == 1) selected @endif>1 - 3 years
                                    </option>
                                    <option value="2" @if (old('experience') == 2) selected @endif>4 - 7 years
                                    </option>
                                    <option value="3" @if (old('experience') == 3) selected @endif>+7 years
                                    </option>
                                </select>

                                @error('experience')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                        <div class="row mt-2">

                            <div class="col-12">
                                <label class="form-label mt-4">Responsibilities</label>
                                <textarea id="duties" name="duties" class="form-control" rows="5">{{ old('duties') }}</textarea>
                                @error('duties')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label mt-4">Starting Date</label>
                                <input class="form-control datetimepicker startingDate" type="text"
                                    style="cursor: pointer" name="startingDate" placeholder="Start date of the work"
                                    autocomplete="off" data-input value="{{ old('startingDate') }}">
                                @error('startingDate')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Ending Date</label>
                                <input class="form-control datetimepicker endingDate" type="text" style="cursor: pointer"
                                    name="endingDate" placeholder="End date of the work" autocomplete="off" data-input
                                    value="{{ old('endingDate') }}">
                                @error('endingDate')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                @if (session('error_endDate'))
                                    <span style="color:red;">{{ session('error_endDate') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label mt-4">Age From</label>
                                <input class="form-control ageFrom" type="number" style="cursor: pointer"
                                    name="ageFrom" placeholder="Age From" autocomplete="off" data-input
                                    value="{{ old('ageFrom') }}">
                                @error('ageFrom')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Age To</label>
                                <input class="form-control ageTo" type="number" style="cursor: pointer" name="ageTo"
                                    placeholder="Age To" autocomplete="off" data-input value="{{ old('ageTo') }}">
                                @error('ageTo')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-6 col-12">
                                <div class="form-group mt-4">
                                    <label>
                                        Long-term
                                    </label>
                                    <p class="form-text text-muted ms-1 text-xs">
                                        This position is long-term.
                                    </p>
                                    <div class="form-check form-switch ms-1">
                                        <input class="form-check-input" type="checkbox"
                                            {{ old('has_endDate') == 'on' ? 'checked' : '' }} name="has_endDate"
                                            id="flexSwitchCheckDefault">
                                        {{--                                <input class="form-check-input" type="checkbox" {{ old('has_endDate') == 'on' ? 'checked' : ''}} name="has_endDate" id="flexSwitchCheckDefault" onclick="notify(this)" > --}}
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Work is
                                            long-term</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="form-label mt-4">Job Type</label>
                                    <select class="form-select" name="job_type" aria-label="Default select example">
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="1" @if (old('job_type') == 1) selected @endif>Part Time
                                        </option>
                                        <option value="2" @if (old('job_type') == 2) selected @endif>Full Time
                                        </option>
                                    </select>
                                    @error('job_type')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label">Payment Type</label>
                                <select class="form-select" name="price_type" aria-label="Default select example">
                                    <option value="" selected disabled>Select Payment Type</option>
                                    <option value="1" @if (old('price_type') == 1) selected @endif>Fixed
                                    </option>
                                    <option value="2" @if (old('price_type') == 2) selected @endif>Hourly
                                    </option>
                                </select>
                                @error('price_type')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Salary</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">€</span>
                                    <input type="number" name="price" value="{{ old('price') }}"
                                        style="outline: none !important;" class="form-control"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                                @error('price')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row mt-2">
                            <div class="col-6">
                                <label class="form-label">Language Level</label>
                                <select class="form-select" name="language_level[]" id="language_level"
                                    style="border-radius: 0px;" aria-label="Default select example">
                                    <option value = "" selected>Choose Level</option>
                                    <option value="English-A1">English-A1</option>
                                    <option value="English-A2">English-A2</option>
                                    <option value="English-B1">English-B1</option>
                                    <option value="English-B2">English-B2</option>
                                    <option value="English-C1">English-C1</option>
                                    <option value="English-C2">English-C2</option>
                                    <option value="Japanese-N1">Japanese-N1</option>
                                    <option value="Japanese-N2">Japanese-N2</option>
                                    <option value="Japanese-N3">Japanese-N3</option>
                                    <option value="Japanese-N4">Japanese-N4</option>
                                    <option value="Japanese-N5">Japanese-N5</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('company.show', auth()->user()->slug) }}"
                                class="btn btn-light m-0">Cancel</a>
                            <button type="submit" class="btn bg-gradient-dark m-0 ms-2">Create Job offer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            const dateSwitch = document.querySelector('#flexSwitchCheckDefault');
            const remoteSwitch = document.querySelector('#remoteFlexSwitchCheckDefault');
            const address = document.querySelector('.address');
            if (document.querySelector('.datetimepicker')) {
                flatpickr('.datetimepicker', {
                    allowInput: true,
                    disableMobile: true
                });
            }
            dateSwitch.addEventListener('click', function() {
                if (this.checked == true) {
                    document.querySelector('.endingDate').disabled = true;
                } else {
                    document.querySelector('.endingDate').disabled = false;

                }
            });
            if (dateSwitch.checked == true) {
                document.querySelector('.endingDate').disabled = true;
            } else {
                document.querySelector('.endingDate').disabled = false;

            }
        </script>
    @endsection
