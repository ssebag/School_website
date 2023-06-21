@extends('layouts.app')
@section('content')
@if (session('alert'))
<div class="container text-center  alert alert-primary alert-style"  >
   {{session('alert')}}
</div>
@endif

<div class="container-fluid mx-4 button-btn  order-quiz ">
    <a href="{{route('table.for.show.quiz')}}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
        Quiz
     </a>
</div>
<div class="container ">
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
            @foreach($orders as $order)
            <tr class="trrr">
                <th scope="col"></th>
                <th scope="row">{{$order->class_teacher->class->name}}</th>
                <th scope="row">{{$order->class_teacher->subject->name}}</th>
                <th scope="row">{{$order->class_teacher->user->name}}</th>
                <th scope="row">{{$order->date}}</th>
                <th scope="row">
                    <div class="button-btn">
                          <a class="btn btn-warning " href="{{route('add.quiz',$order->id)}}">Add</a>
                        <form method="POST" action="{{route('delete.order',$order->id)}}" style="display: inline"  >
                            @method('Delete')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete" id="delete"  href="#"  >
                        </form>
                    </div>

                </th>
                         </tr>
            @endforeach

        </tbody>
      </table>

</div>
@endsection
