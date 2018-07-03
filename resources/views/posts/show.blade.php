@extends('layouts.app')

@section('content')
  <a href="http://localhost/laravelsandbox/public/posts" class="btn btn-default">Go Back</a>
  <h1>{{$post->title}}</h1>
  <div>
    {{$post->body}}
  </div>
  <hr>
  <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
  <hr>
  {{-- If the user is NOT a guest, they will be able to see these buttons --}}
  @if(!Auth::guest())
    {{-- If the logged in user MATCHES the post user, then let them view the buttons --}}
    @if(Auth::user()->id == $post->user_id)
  <a href="http://localhost/laravelsandbox/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

  {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
  {!!Form::close()!!}
    @endif
  @endif
@endsection
