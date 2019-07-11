@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to WeBlog</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="http://127.0.0.1:8000/create/post" role="button">Add post</a>
        </div>

        @if(count($posts) > 0)
            <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4">
                <div class="card m-1">
                    <img class="card-img-top" src="{{ Storage::url($post->image) }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ str_limit($post->body, $limit = 150, $end = '...') }}</p>
                    
                    </div>
                    <ul class='nav nav-pills card-body'>
                        <li role='presentation'>
                            <a href="{{url('post/'.$post->id.'/show')}}">
                                <span>VIEW</span>
                            </a>
                        </li>
                        <!-- <li role='presentation'>
                            <a href="#">
                                <span> EDIT</span>
                            </a>
                        </li>
                        <li role='presentation'>
                            <a href="#">
                                <span> DELETE</span>
                            </a>
                        </li> -->
                    </ul>
                    <div class="card-footer">
                    <small class="text-muted">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        @else
        <div class="alert alert-info" role="alert">
            There are no posts yet.
        </div>
        @endif
    </div>
@endsection