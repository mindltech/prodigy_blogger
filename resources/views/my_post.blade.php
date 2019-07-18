@extends('layouts.app')

@section('content')

<div class="container">
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
                    	  <ul class='nav nav-pills card-body'>
                    	      <li role='presentation'>
                    	          <a href="{{url('post/'.$post->id.'/show')}}">
                    	              <span>VIEW</span>
                    	          </a>
                    	          <a href="{{url('post/'.$post->id.'/edit')}}">
                    	              <span>EDIT</span>
                    	          </a>
                    	          <a href="{{url('post/'.$post->id.'/delete')}}">
                    	              <span>DELETE</span>
                    	          </a>
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
