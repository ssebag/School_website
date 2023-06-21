@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body tablle" >
            <table class="table " >
                <thead class="thead-dark">
                  <tr  style="" class="trrr">
                    <th scope="col">Quiz</th>
                    <th scope="col">Date</th>
                    <th scope="col">Full Mark</th>
                    <th scope="col">Deserved Mark</th>
                    <th scope="col">
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allMarks as $mark)
                    <tr class="trrr">
                        <th scope="row">{{$mark->quiz->class_teacher->subject->name}}</th>
                        <th scope="row">{{$mark->quiz->date}}</th>
                        <th scope="row">{{$mark->full_mark}}</th>
                        @if ($mark->deserved_mark == $mark->full_mark)
                             <th scope="row" style="color:blueviolet">{{$mark->deserved_mark}}</th>
                        @elseif($mark->deserved_mark >= $mark->full_mark/4)
                             <th scope="row" style="color:blue">{{$mark->deserved_mark}}</th>
                        @elseif($mark->deserved_mark < $mark->full_mark/4)
                             <th scope="row" style="color:red">{{$mark->deserved_mark}}</th>
                        @endif
                        <th scope="row">
                            <div class="button-btn">
                               <a class="btn btn-primary" href="{{route('show.quiz',$mark->quiz_id)}}">Show Question & Answer</a>
                            </div>

                        </th>
                    </tr>
                    @endforeach

                </tbody>
              </table>



        </div>
       </div>

</div>
@endsection
