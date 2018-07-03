{{-- getting the layout form layouts/app.blade.php --}}
@extends('layouts.app')

{{-- This will place the content in 'content' in app.blade.php --}}
@section('content')
  <div class="jumbotron text-center">
    <h1>Welcome to my Laravel Sandbox</h1>
    <p>This is a text application for testing things in Laravel</p>
    <p><a class="btn btn-primary btn-lg" href="http://localhost/laravelsandbox/public/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="http://localhost/laravelsandbox/public/register" role="button">Register</a></p>
  </div>
@endsection
