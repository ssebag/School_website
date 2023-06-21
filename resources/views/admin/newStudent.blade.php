@extends('layouts.app')
@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary" >
   {{session('alert')}}

</div>
@endif
<div class="container">
   <div class="card cardAppointment">
    <div class="card-header cardAppointmentheader">
       <h1 class="tittle_form">Complete information for student <span style="color: purple; font-weight:bold"></span> : </h1>
    </div>
    <div class="card-body">
        <form class="needs-validation" method="POST" action="" enctype="multipart/form-data"  autocomplete="off" novalidate >
            @csrf
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Class :') }}</label>
                <div class="col-md-4">
                    <select id="class" name="class" class="form-control" required>
                        @foreach ($classes as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Date:') }}</label>
                <div class="col-md-4">
                   <input type="date" id="inputState" name="date" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3 col-md-6 text-md-end ">
                <fieldset class="form-group">
                  <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                          <div class="form-check mx-3 ">
                              <input class="form-check-input" type="radio" name="gender" id="male" required value="male" >
                            <label class="form-check-label" for="male">
                            Male
                            </label>
                            <div class="invalid-feedback">
                              You must agree before submitting.
                            </div>
                          </div>
                          <div class="form-check ">
                              <input class="form-check-input" type="radio" name="gender" id="famale" required value="famale" >
                            <label class="form-check-label" for="famale">
                             Famale
                            </label>
                            <div class="invalid-feedback">
                              You must agree before submitting.
                            </div>
                          </div>
                        </div>

                    </div>
                  </div>
                 </fieldset>
            </div>


            <div class="row mb-3" style="display: none">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
   </div>
</div>
@endsection
