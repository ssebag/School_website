@extends('layouts.app')

@section('content')
<div class="container-fluid">
 {{--    <a href="{{route('blade.for.add.mark',$quiz->id)}}" class="btn btn-primary my-4" target="_blank" rel="noopener noreferrer">
        Add new Mark
     </a> --}}
</div>
<div class="container-fluid">
    <div class="card cardAppointment">
        <div class="card-header cardAppointmentheader">
           <h4 style="width:max-content"><span> {{$quiz->class_teacher->class->name}}</span>
             quiz marks for
             <span style="font-weight:bold;"> {{$quiz->class_teacher->subject->name}}</span> subject
              in date <span style="font-weight:bold">{{$quiz->date}}</span> : </h4>
        </div>
        <div class="card-body tablle ">
            <table class="table ">
                <thead class="thead-dark">
                  <tr  style="" class="trrr">
                    <th class="trrr" scope="col" >Student Name</th>
                    <th scope="col">Full Mark</th>
                    <th scope="col">Deserved Mark</th>
                    <th scope="col">
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($marks as $mark)
                    <tr class="trrr">
                        <th scope="row">{{$mark->student->user->name}}</th>
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
                                 <a class="btn btn-primary" href="{{route('blade.for.edit.mark',$mark->id)}}">Update</a>
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
