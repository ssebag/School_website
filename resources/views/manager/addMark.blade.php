@extends('layouts.app')

@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary" >
   {{session('alert')}}

</div>
@endif
<div class="container-fluid">
    <div class="card cardAppointment">
        <div class="card-header cardAppointmentheader">
            <h4 style="font-weight:bold"><span style="color: purple;"> {{$mark->quiz->class_teacher->class->name}}</span>
              quiz marks for
              <span style="color: purple; font-weight:bold"> {{$mark->quiz->class_teacher->subject->name}}</span> subject
               in date <span style="color: purple; font-weight:bold">{{$mark->quiz->date}}</span> : </h4>
         </div>

        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{route('add.mark',$mark->quiz->id)}}" enctype="multipart/form-data"  autocomplete="off" novalidate >
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
                        <th scope="row">
                                <select  style="text-align:center"  id="student" name="student" class="form-control" required>
                                    @foreach ($student as $stu)
                                          <option value="{{$stu->id}}">{{$stu->user->name}}</option>
                                    @endforeach

                                </select>

                        </th>
                        <th scope="row">
                            {{$mark->full_mark}}
                        </th>
                        <th scope="row">
                            <input style="text-align: center; color:purple;font-weight:bold" type="text" class="form-control"  id="validationTooltip01" name="deserved_mark" value="" autocomplete="off" required>
                        </th>
                        <th scope="row">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </th>
                    </tr>
                </tbody>
            </table>
            </form>



        </div>
       </div>

</div>
@endsection
