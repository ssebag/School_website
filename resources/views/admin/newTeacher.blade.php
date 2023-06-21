@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-primary my-2" href="/home">Back</a>
   <div class="card cardAppointment my-3">
    <div class="card-header cardAppointmentheader">
       <h1 class="tittle_form">Complete information for Teacher <span style="color: purple; font-weight:bold">{{$user->name}}</span>: </h1>
    </div>
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{route('add.new.teacher',$user->id)}}" enctype="multipart/form-data"  autocomplete="off" novalidate >
            @csrf
            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject :') }}</label>
                <div class="col-md-4">
                    <select id="subject" name="subject" class="form-control" required>
                        @foreach ($subjects as $subject )
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                       @endforeach
                    </select>
                </div>
            </div>
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
