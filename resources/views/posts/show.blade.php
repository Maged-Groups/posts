@extends('layouts.main')

@section('content')

<div class="card card-compact w-96 bg-base-100 shadow-xl">
  <figure><img src="{{$post->thumbnail}}" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">{{$post->title}}</h2>
    <p>{{$post->body}}</p>
    <div class="card-actions justify-end">
      <button class="btn btn-primary">Buy Now</button>
    </div>
  </div>
  <div class="card-footer">
    <p>BY: {{$post->user_name}}</p>
  </div>
</div>

@endsection