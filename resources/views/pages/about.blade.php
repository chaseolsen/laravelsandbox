{{-- getting the layout form layouts/app.blade.php --}}
@extends('layouts.app')

{{-- This will place the content in 'content' in app.blade.php --}}
@section('content')
  <h1>{{$title}}</h1>
  <p>This is the about page</p>
@endsection
