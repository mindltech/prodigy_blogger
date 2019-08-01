@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn btn-primary btn-lg" style="float:right" href="{{ url('create/post') }}" role="button">Add post</a>
      @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your post has been deleted successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
	  <h1>My posts</h1>
	  <div class="row justify-content-center">
	  	<div class="col-md-12">
	  		<div class="card">
	  			<div class="card-header">My posts</div>

	  			<div class="card-body">
	  				@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                	 @if(count($posts) > 0)
                    <div class="row">
                    	@foreach($posts as $post)
                    	<div class="col-md-4">
                        @if($post->image)
    					  <img class="card-img-top" src="{{ Storage::url($post->image) }}" alt="Card image cap">
                        @endif

                    	  <div class="card-body">
                    	  	<h5 class="card-title">{{ $post->title }}</h5>
                    	  	<p class="card-text">{{ str_limit($post->body, $limit = 1500, $end = '...') }}</p>
                    	  </div>
                          <ul class='nav nav-pills card-body' >
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
                    	  	<small class="text-muted">{{Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
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
	  		</div>
	  	</div>
	  </div>
</div>


@endsection
