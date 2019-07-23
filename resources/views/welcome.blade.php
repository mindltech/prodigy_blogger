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
            <h1 class="display-4">Welcome to Prodigy Blogger</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="{{ url('create/post') }}" role="button">Add post</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your post has been deleted successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if(session('good'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your post has been published successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if(session('update'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your post has been updated successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @if(count($posts) > 0)
            <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4">
                <div class="card m-1 shadow">
                    @if($post->image)
                        <img class="card-img-top p-3 mb-5 bg-white rounded" src="{{ Storage::url($post->image) }}" alt="">
                    @endif

                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ str_limit($post->body, $limit = 150, $end = '...') }}</p>

                    </div>
                    <ul class='nav nav-pills card-body'>
                        <li role='presentation'>
                            <a href="{{url('post/'.$post->id.'/show')}}">
                                <span><i class="fa fa-eye"></i> View </span>
                            </a>
                            @if(auth()->check() && auth()->id() === $post->user->id)
                            <a href="{{url('post/'.$post->id.'/edit')}}">
                                <span> <i class="fa fa-edit"></i> Edit </span>
                            </a>
                            <!-- <a href="{{url('post/'.$post->id.'/delete')}}">
                                <span> <i class="fa fa-trash"></i> Delete</span>
                            </a> -->
                            <a href="#" data-toggle="modal" data-target="#exampleModal-{{ $post->id }}">
                                <span> <i class="fa fa-trash"></i> Delete</span>
                            </a>
                                <!-- Modal -->

                            <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                    <!-- <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this post - {{ $post->title }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <a href="{{url('post/'.$post->id.'/delete')}}"><button type="button" class="btn btn-danger">Yes</button></a>
                                </div>
                                </div>
                            </div>
                            </div>

                            @endif
                        </li>
                    </ul>


                    <div class="card-footer">
                        <span class="pull-right">
                            <a href="{{url('users/'.$post->user->id.'/@'.$post->user->username.'/')}}">
                                {{ $post->user->name }}
                                <!-- the post model is associated with user and a user has a name -->
                            </a>
                        </span>
                    <small class="text-muted">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        @else
        <div class="alert alert-info" role="alert">
            There are no posts.
        </div>
        @endif
    </div>
@endsection
