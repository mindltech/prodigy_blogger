@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Welcome to Prodigy Blogger</h1>
          <p class="lead my-3">This platform allows you to make post and read articles. Now go ahead and fill readers efficiently with the most interesting and exciting posts.</p>
          <!-- <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p> -->
          
        </div>
      </div>
      
        @if (session('posts'))
            <div class="alert alert-succes alert-dismissible fade show">
                <strong>Success!</strong> Result found.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if (session('noposts'))
            <div class="alert alert-succes alert-dismissible fade show">
                <strong>Success!</strong> No result found.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

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
        @if(count ($tags) > 0)
         @foreach($tags as $tag)
            <a href="{{ url('tag/'.$tag->id.'/tag_post') }}" class="p-2 text-muted">{{ $tag->name }}</a>
         @endforeach
        @endif

        @if(count($posts) > 0)
            <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4">
                <div class="card m-1 shadow">
                    @if($post->image)
                        <img class="card-img-top p-3 mb-5 bg-white rounded"  src="{{ Storage::url($post->image) }}" alt="">
                    @endif

                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{!! str_limit($post->body, $limit = 150, $end = '...') !!}</p>

                    @foreach($post->tags as $tag)
                    <a href="{{ url('tag/'.$tag->id.'/tag_post') }}" class="badge badge-dark">{{ $tag->name }}</a>
                    @endforeach
                    </div>
                    <ul class='nav nav-pills card-body'>
                        <li role='presentation'>
                              <div class="btn-group">
                                <button class="navbar-toggler toggler-example purple darken-3" type="button" data-toggle="dropdown"
                                    data-target="#navbarSupportedContent41" aria-controls="navbarSupportedContent41" aria-expanded="false"
                                    aria-label="Toggle navigation"><span class="white-text"><i class="fa fa-ellipsis-v"></i></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                  <a class="dropdown-item" href="{{url('post/'.$post->id.'/show')}}" style="color: black">View</a>
                                  @if(auth()->check() && auth()->id() === $post->user->id)
                                  <a class="dropdown-item" href="{{url('post/'.$post->id.'/edit')}}" style="color: black">Edit</a>
                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal-{{ $post->id }}" style="color: black">Delete</a>
                                  @endif
                                </div>
                              </div>
                            @if(auth()->check() && auth()->id() === $post->user->id)
                                <!-- Modal -->

                            <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
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
    <hr>
    <footer class="blog-footer text-center">
      <p>Blog app built by Dimola and Segun .</p>
      <p>
        <a href="{{ url('/') }}"><i class="fa fa-chevron-up"></i></a>
      </p>
    </footer>
    </div>
@endsection
