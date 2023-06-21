@extends('layouts.app')
@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary">
   {{session('alert')}}
</div>
@endif
<div class="container-fluid containerQuiz button-btn" >
    <a href="{{route('show.quiz',$quiz->id)}}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
        Show the Result
     </a>
</div>
<div class="container containerQuiz" >
   <div class="card cardAppointment">
    <div class="card-header cardAppointmentheader">
       <h3 class="tittle_form">Edit question for {{$quiz->class_teacher->subject->name}} class {{$quiz->class_teacher->class->name}}
       on date {{$quiz->date}}: </h3>
    </div>
    <div class="card-body">
        <form  class="needs-validation" method="POST" action="{{route('update.question',$question->id)}}" enctype="multipart/form-data"  autocomplete="off" novalidate >
            @csrf
            <div class="row mb-3" >
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Quistion:') }}</label>
                <div class="col-md-4">
                   <textarea name="question" id="question" cols="35" rows="2" required>{{$question->question}}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Answers :') }}</label>
                <div class="col-md-4">
                    <div class="form-check">
                        <input  class="form-check-input" type="radio" name="right_answer" id="option1" required value="answer_1" >
                        <textarea for="option1" name="answer_1" id="answer_1" cols="32" rows="1" required>{{$question->answer_1}}</textarea>
                   </div>
                   <div class="form-check">
                        <input  class="form-check-input" type="radio" name="right_answer" id="option2" required value="answer_2" >
                        <textarea for="option2" name="answer_2" id="answer_2" cols="32" rows="1" required>{{$question->answer_2}}</textarea>
                   </div>
                    <div class="form-check">
                        <input  class="form-check-input" type="radio" name="right_answer" id="option3" required value="answer_3" >
                        <textarea for="option3" name="answer_3" id="answer_3" cols="32" rows="1" required>{{$question->answer_3}}</textarea>
                   </div>

            </div>
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Mark:') }}</label>
                <div class="col-md-4">
                   <select name="mark" id="mark">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
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
