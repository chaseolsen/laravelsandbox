{{-- getting the layout form layouts/app.blade.php --}}
@extends('layouts.app')

{{-- This will place the content in 'content' in app.blade.php --}}
@section('content')

  <h1>{{$title}}</h1>
  {{-- Check to see if $services array (in PagesController.phps) is greater that 0 --}}
  @if(count($services) > 0)
    <ul class="list-group">
      {{-- Loop through services array --}}
      @foreach($services as $service)
        <li class="list-group-item">{{$service}}</li>
      @endforeach
    </ul>
  @endif


@endsection
