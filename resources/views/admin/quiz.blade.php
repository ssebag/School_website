@extends('layouts.app')

@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary alert-style"  >
   {{session('alert')}}
</div>
@endif
@if (Auth::user()->role == 'manager')
    <div class="container-fluid button-btn">
      <a class="btn btn-primary" target="_blank" rel="noopener noreferrer" href="{{route('blade.for.new.quiz')}}">Add new Quiz</a>
    </div>
@endif
<div class="container">
    <table class="table my-1">
        <thead class="thead-dark">
          <tr  style="" class="trrr">
            <th scope="col"></th>
            <th scope="col">Class</th>
            <th scope="col">Subject</th>
            <th scope="col">Teacher</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($quizzes as $quiz)
            <tr class="trrr">
                <th scope="col"></th>
                <th scope="row">{{$quiz->class_teacher->class->name}}</th>
                <th scope="row">{{$quiz->class_teacher->subject->name}}</th>
                <th scope="row">{{$quiz->class_teacher->user->name}}</th>
                <th scope="row">{{$quiz->date}}</th>
                <th scope="row">
                    <div class="button-btn">

                        @if (Auth::user()->role == 'manager')
                        @if ($quiz->done == 0)
                            <a class="btn btn-warning" href="{{route('publish.quiz',$quiz->id)}}">publish</a>
                            <a class="btn  btn-success" href="{{route('blade.add.question.for.quiz',$quiz->id)}}">Add</a>
                            <a class="btn btn-primary" href="{{route('blade.for.edit.quiz',$quiz->id)}}">Update</a>
                            <form method="POST" action="{{route('delete.quiz',$quiz->id)}}" style="display: inline"  >
                                @method('Delete')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete" id="delete"  href="#"  >
                            </form>
                        @else
                            <a class="btn" style="color: white; background:purple" href="{{route('show.marks',$quiz->id)}}">Show Marks</a>
                        @endif
                        @elseif (Auth::user()->role == 'admin')
                        <form method="POST" action="{{route('delete.quiz',$quiz->id)}}" style="display: inline"  >
                            @method('Delete')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete" id="delete"  href="#"  >
                        </form>
                        <a class="btn" style="color: white; background:purple" href="{{route('show.marks',$quiz->id)}}">Show Marks</a>

                    @endif
                    <a class="btn btn-info" style="color: white" href="{{route('show.quiz',$quiz->id)}}">Show</a>

                    </div>

                </th>
                         </tr>
            @endforeach

        </tbody>
      </table>

</div>
@endsection
