@extends('layouts.app')
@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary"  >
   {{session('alert')}}
</div>
@endif
<div class="container">
   <div class="card cardAppointment">
    <div class="card-header cardAppointmentheader">
       <h1 class="tittle_form">Quiz: </h1>
    </div>
    <div class="card-body">
        <form class="needs-validation formm" method="POST" action="{{route('new.quiz')}}" enctype="multipart/form-data"  autocomplete="off" novalidate >
            @csrf
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('For Class :') }}</label>
                <div class="col-md-4 form-option">
                    <select class=" form-control" id="class" name="class" id="class"  required>
                        @foreach ($c_t as $cl)
                             <option value="{{$cl->class->id}}" class="" >{{$cl->class->name}}</option>
                        @endforeach


                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Subject :') }}</label>
                <div class="col-md-4 form-option">
                    <select id="subject" name="subject" class="form-control" required>
                        @foreach ($c_t as $su)
                        <option value="{{$su->subject->id}}" >{{$su->subject->name}}</option>
                   @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Date:') }}</label>
                <div class="col-md-4 form-option">
                   <input type="date" id="inputState" name="date" class="form-control" required>
                </div>
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
                <div class="col-md-8 offset-md-4 button-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>

        </form>

          <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
          </script>
    </div>
   </div>
</div>
@endsection
