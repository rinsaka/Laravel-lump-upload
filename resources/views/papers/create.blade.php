@extends('layouts.default')

@section('title', 'Register New Papers')

@section('content')

<h1>Register New Papers</h1>



<form method="post" action="{{ url('papers') }}" enctype='multipart/form-data'>
  {{ csrf_field() }}
  @include('papers.createform')
</form>


@endsection

@section('javascript')
<script src="{{ asset('/assets/js/get_fileinfo.js') }}"></script>
@endsection
