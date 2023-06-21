@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card cardAppointment">
        <div class="card-header cardAppointmentheader">
            <h4 style="font-weight:bold"><span style="color: purple;"> {{$mark->quiz->class_teacher->class->name}}</span>
              quiz marks for
              <span style="color: purple; font-weight:bold"> {{$mark->quiz->class_teacher->subject->name}}</span> subject
               in date <span style="color: purple; font-weight:bold">{{$mark->quiz->date}}</span> : </h4>
         </div>

        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{route('update.mark',$mark->id)}}" enctype="multipart/form-data"  autocomplete="off" novalidate >
                @csrf
            <table class="table">
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
                    <tr class="trrr">
                        <th scope="row">{{$mark->student->user->name}}</th>
                        <th scope="row">{{$mark->full_mark}}</th>
                        <th scope="row">
                            <input style="" type="text" class="input-style  " value="{{$mark->deserved_mark}}" id="validationTooltip01" name="deserved_mark" value="" autocomplete="off" required>
                        </th>
                        <th scope="" class="button-btn">
                            <a type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </a>
                        </th>
                    </tr>
                </tbody>
            </table>
            </form>



        </div>
       </div>

</div>
@endsection
