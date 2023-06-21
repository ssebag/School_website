@extends('layouts.app')
@section('css')
  @livewireStyles
@endsection
@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary"  >
   {{session('alert')}}
</div>
@endif
@livewireStyles
@livewire('add-user')
@livewireScripts
@endsection


{{-- @extends('layouts.app')
@section('content')
@if (session('alert'))
<div class="container text-md-center alert alert-primary"  >
   {{session('alert')}}
</div>
@endif
@endsection --}}
