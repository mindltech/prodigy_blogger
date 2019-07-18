@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}

            <div class="input-group mb-3">
                <input name="search" type="text" class="form-control" placeholder="what are you searching for?" aria-label="Search keyword" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
            <!-- <div class="input-group">
            <input type="text" class="form-control" name="search"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div> -->
        </form>
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
