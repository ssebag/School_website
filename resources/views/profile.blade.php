@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card cardAppointment dro-item">
        <div class="card-header cardAppointmentheader">
           <h1 class="tittle_form" style="color:rgb(92, 27, 92)">Information: </h1>
        </div>
        <div class="card-body">
        @if (Auth::check())
        @if (Auth::user()->role=='user')
            <div class="BigClass">
                <div class="style-text-2"><span class="style-text">Name: </span>{{$student->user->name}} </div>
                <div class="style-text-2"><span class="style-text">Email:</span> {{$student->user->email}} </div>
                <div class="style-text-2"><span class="style-text">Phone:</span> {{$student->user->phone}} </div>
              </div>
            <div class="BigClass">
                <div class="style-text-2"><span class="style-text">Class: </span> {{$student->class->name}}</div>
                <div class="style-text-2"><span class="style-text">Birth:  </span>{{$student->birth}}</div>
                <div class="style-text-2"><span class="style-text">Gender: </span>
                   @if ($student->gender == 1)
                       Famile
                   @else
                       Male
                   @endif
                </div>
            </div>
            @elseif(Auth::user()->role=='manager')
            <div class="BigClass">
                <div class="style-text-2"><span class="style-text">Name: </span>{{$teacher->name}} </div>
                <div class="style-text-2"><span class="style-text">Email:</span> {{$teacher->email}} </div>
                <div class="style-text-2"><span class="style-text">Phone:</span> {{$teacher->phone}} </div>
              </div>
            <div class="BigClass">
                <span>Class: </span>

            </div>
            @endif

          @endif

        </div>
       </div>

</div>
@endsection
