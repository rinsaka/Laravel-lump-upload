@extends('layouts.default')

@section('title', 'Register New Papers')

@section('content')

<h1>Register New Papers</h1>



<form method="post" action="{{ url('papers') }}">
  {{ csrf_field() }}
  @include('papers.createform')
</form>


@endsection
