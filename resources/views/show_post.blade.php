@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-1">
        <img class="card-img-top" src="{{ Storage::url($post->image) }}" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ str_limit($post->body, $limit = 150, $end = '...') }}</p>
    </div>
    <div class="card-footer">
        <small class="text-muted">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
    </div>
</div>

@endsection
