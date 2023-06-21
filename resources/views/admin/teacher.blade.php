@extends('layouts.app')
@section('content')
<div class="container-fluid button-btn">
    <a href="{{route('addUser')}}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
        Add new Teacher
     </a>
</div>
<div class="container">
    <table class="table my-1">
        <thead class="thead-dark">
          <tr  style="" class="trrr">
            <th scope="col"></th>
            <th class="trrr" scope="col" >Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col" colspan="2">Subject</th>
          </tr>
        </thead>
        <tbody>
            @foreach($class_subjectt as $teacher)
            <tr class="trrr">
                <th scope="col"></th>
                <th scope="row">{{$teacher->user->name}}</th>
                <th scope="row">{{$teacher->user->email}}</th>
                <th scope="row">{{$teacher->user->phone}}</th>
                <th scope="row">{{$teacher->subject->name}} / {{$teacher->class->name}}</th>
            </tr>
            @endforeach

        </tbody>
      </table>

</div>
@endsection
