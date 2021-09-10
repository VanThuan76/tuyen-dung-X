@extends('layouts.index')
@section('content')
    <div class="container-fluid py-4">
<div class="row">
    <div class="col-lg-9 col-12 mx-auto">

    <form action="{{route('job.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="card card-body mt-4">
            <h6 class="mb-0">Punë e re</h6>
            <p class="text-sm mb-0">Krijo punë të re</p>
            @if (session('job_created'))
                <span style="color:green;">
           {{ session('job_created') }}
            </span>
            @endif
            <hr class="horizontal dark my-3">
            <label for="jobName" class="form-label">Emri i projektit</label>
            <input type="text" class="form-control" name="title" id="jobName" autocomplete="off" value="{{ old('title') }}">
            @error('title')
            <span style="color:red;">{{ $message }}</span>
            @enderror
            <label class="mt-4">Përshkrimi i punës</label>
            <p class="form-text text-muted text-xs ms-1">
                Kështu do të mësojnë të tjerët për punën, kështu që bëjeni mirë!
            </p>


                <textarea id="body" name="body" class="form-control" rows="5">{{old('body')}}</textarea>

            @error('body')
            <span style="color:red;">{{ $message }}</span>
            @enderror
            <div class="row mt-2">
                <div class="col-6">
                    <label class="form-label">Adresa</label>
                    <input class="form-control address" type="text" name="address" autocomplete="off" placeholder="Shkruani adresen" value="{{old('address')}}">

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
                            <input class="form-check-input" type="checkbox" name="remote" id="remoteFlexSwitchCheckDefault" onclick="notify(this)" >
                            <label class="form-check-label" for="remoteFlexSwitchCheckDefault">Puna është remote</label>
                        </div>
                    </div>
                    @error('remote')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <label class="form-label">Përvoja</label>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <option value="" selected>Zgjedhni kategorinë</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}} >{{$category->name}}</option>
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
                    <label class="form-label">Përgjegjësitë</label>
                    <input class="form-control" type="text" name="duties" autocomplete="off" placeholder="Shkruani përgjegjësitë e punëtorit" value="{{old('duties')}}">
                    @error('duties')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-6">
                    <label class="form-label">Data e fillimit</label>
                    <input class="form-control datetimepicker startingDate" type="text" style="cursor: pointer" name="startingDate" placeholder="Zgjedhni datën e fillimit të punës" autocomplete="off" data-input value="{{old('startingDate')}}">
                    @error('startingDate')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label">Data e mbarimit</label>
                    <input class="form-control datetimepicker endingDate" type="text" style="cursor: pointer" name="endingDate" placeholder="Zgjedhni datën e mbarimit të punës" autocomplete="off" data-input value="{{old('endingDate')}}">
                    @error('endingDate')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                    @if (session('error_endDate'))
                    <span style="color:red;">{{session('error_endDate')}}</span>
                    @endif
                </div>
            </div>

                <div class="row mt-2">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Pa afat
                            </label>
                            <p class="form-text text-muted text-xs ms-1">
                                Kjo pozitë është afatgjate.
                            </p>
                            <div class="form-check form-switch ms-1">
                                <input class="form-check-input" type="checkbox" name="has_endDate" id="flexSwitchCheckDefault" onclick="notify(this)" >
                                <label class="form-check-label" for="flexSwitchCheckDefault">Puna është afatgjate</label>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="row mt-2">
                <div class="col-6">
                    <label class="form-label">Pagesa</label>
                    <select class="form-select" name="price_type" aria-label="Default select example">
                        <option value="" selected>Zgjedhni pagesën</option>
                        <option value="1" @if (old('price_type')==1) selected @endif>Fikse</option>
                        <option value="2" @if (old('price_type')==2) selected @endif>Me ore</option>
                    </select>
                    @error('price_type')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label">Çmimi</label>
                    <input class="form-control" type="number" name="price" autocomplete="off" placeholder="Shkruani çmimin" value="{{old('price')}}">
                    @error('price')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            <div class="d-flex justify-content-end mt-4">
                <button type="button" name="button" class="btn btn-light m-0">Anulo</button>
                <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Krijo shpalljen e punës</button>
            </div>
        </div>
    </form>
    </div>
</div>    </div>

    </div>
@endsection
@section('scripts')
<script>
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
            document.querySelector('.endingDate').disabled = true;
        }
        else{
            document.querySelector('.endingDate').disabled = false;

        }
    });
    remoteSwitch.addEventListener('click',function(){
        if (this.checked == true){
           address.disabled = true;
        }
        else{
            address.disabled = false;

        }
    });

</script>
    @endsection

