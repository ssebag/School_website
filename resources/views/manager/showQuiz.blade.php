@extends('layouts.app')
@section('css')
  @livewireStyles
@endsection
@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary">
   {{session('alert')}}
</div>
@endif
@php
    $i=1;
    $user=Auth::user()->role;
    $quiz=App\Models\Quiz::findorfail($id);
    $class_teacher=$quiz->class_teacher_id;
    $class_teacher_id=App\Models\Class_Teacher::findorfail($class_teacher);
    $manager=$class_teacher_id->user_id;
    $student=App\Models\Student::where('user_id',Auth::id())->first();
    if($student != null){
    $if_pass_quiz=App\Models\Mark::where('quiz_id',$quiz->id)->where('student_id',$student->id)->first();}
@endphp
@if (Auth::id() == $manager )
  <div class="container" style="direction:rtl;display: flex;flex-direction: column;align-items: center;">
       @if($questions->isEmpty())
       <h3 class="font7">يوجد أسئلة بعد</h3>
       <div class="button-btn" style="">
        <a class="btn btn-primary" href="{{route('blade.add.question.for.quiz',$id)}}">  اضغط لإضافة أسئلة  </a>
       </div>
       @endif
  </div>
@endif
<div class="containerQuiz" style="direction:rtl">
@if(Auth::id() == $manager || Auth::user()->role=='admin' || $if_pass_quiz != null)
   @foreach ($questions as $question )
   <div class="card cardAppointment">

    <div class="card-header  cardAppointmentheader" style="display:grid; grid-template-columns:9fr 0.8fr 0.8fr">
       <div class="button-btn card-headerQuiz">
        <h5 class="tittle_form" style="display:inline-block">{{$i++}}- {{$question->question}}</h5>
        <span class="" style="color:blueviolet;opacity:50%">{{$question->mark}} درجات</span>
       </div>
        @if (Auth::id() == $manager)
           <div class="button-btn">
            <a href="{{route('blade.for.edit.question',$question->id)}}" class="btn btn-success" style="width:fit-content">update</a>
            <form method="POST" action="{{route('delete.question',$question->id)}}" style="display: inline"  >
                @method('Delete')
                @csrf
                <input type="submit" class="btn btn-danger" value="Delete" id="delete"  href="#"  >
            </form>
           </div>
       @endif
      </div>

      <div class="card-body">
          <div class="form-check" >
            @if ($question->right_answer == 'answer_1')
                 <label for="option1" class="mx-4 answer" style="color:blueviolet; font-weight:650">- {{$question->answer_1}}</label>
            @else
            <label for="option1" class="mx-4 answer" >- {{$question->answer_1}}</label>
            @endif

          </div>
          <div class="form-check" >
            @if ( $question->right_answer == 'answer_2')
              <label for="option2" class="mx-4 answer" style="color:blueviolet; font-weight:650">- {{$question->answer_2}}</label>
              @else
              <label for="option2" class="mx-4 answer">- {{$question->answer_2}}</label>
            @endif

          </div>
          <div class="form-check" >
            @if ($question->right_answer == 'answer_3')
              <label for="option3" class="mx-4 answer" style="color:blueviolet; font-weight:650">- {{$question->answer_3}}</label>
            @else
            <label for="option3" class="mx-4 answer">- {{$question->answer_3}}</label>
            @endif


          </div>
      </div>
     </div>
     <br>
   @endforeach
</div>
@else
  @livewire('show-questions',['quiz_id'=>$quiz->id,'student_id'=>Auth::id()])
@endif

@livewireStyles
@livewireScripts
@endsection
