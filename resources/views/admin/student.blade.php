@extends('layouts.app')
@section('content')
@php
      $user=Auth::id();
        $class_te=\App\Models\Class_Teacher::where('user_id',$user)->get();
@endphp
{{-- <div class="container-fluid">
    @if (Auth::user()->role=='admin')
         <a href="{{route('blade.for.add.new.user')}}" class="btn btn-primary my-4" target="_blank" rel="noopener noreferrer">
           Add new Student
         </a>
    @elseif(Auth::user()->role=='manager')
     @foreach ($class_te as $class)
          <a href="{{route('show.all.student.for.teacher',$class->class->id)}}" class="btn btn-primary my-4"  rel="noopener noreferrer">
        {{$class->class->name}}
      </a>
     @endforeach

    @endif

</div> --}}
<div class="container tablle">
    <table class="table ">
        <thead class="thead-dark">
          <tr  style="" class="trrr">
            <th scope="col"></th>
            <th class="trrr" scope="col" >Name</th>
            <th scope="col">Email</th>
            <th scope="col">Class</th>
            <th scope="col">Birth</th>
            <th scope="col">Gender</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr class="trrr">
                <th scope="col"></th>
                <th scope="row">{{$student->user->name}}</th>
                <th scope="row">{{$student->user->email}}</th>
                <th scope="row">{{$student->class->name}}</th>
                <th scope="row">{{$student->birth}}</th>
                @if($student->gender == 1)
                <th scope="row">famale</th>
                @elseif($student->gender == 0)
                <th scope="row">male</th>
                @endif
            </tr>
            @endforeach

        </tbody>
    </table>



</div>
@endsection
