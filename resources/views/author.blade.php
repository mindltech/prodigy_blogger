@extends('layouts.app')


@section('content')

<div class="container padding-auto-12 mg-bottom">
	 @if (session('status'))
         <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
     @endif
     @if($author)
     	<div class="card grid-item-ct border-none">
     		<div class="mg-0-175">
            	<img class="rounded-circle mg-top-15px" src="{{ Storage::url($author->profile->avatar) }}" alt="Card image cap" style="height: 100px; width: 100px;">
            </div> 
            <div class="mg-0-175 pd-top">
                <h5 class="font-bd">{{ $author->name }}</h5>
            	<div class="flex-around">
                	<p class="">{{ str_limit($author->profile->bio, $limit = 1500, $end = '...') }}</p>
            	</div>
                <hr>
            	<div class="flex-around">
                	<p>Joined: {{\Carbon\Carbon::parse($author->profile->created_at)->diffForHumans()}}</p>
                	<p>Published posts: {{ count($author->post) }}</p>
            	</div>
            </div>     	 
    	</div>
	  @else
      <div class="alert alert-info" role="alert">
         This author does not exist
      </div>
      @endif
</div>

<div class="container padding-auto-12 mg-bottom">
	@if(count($author->post)>0)
	<div>
		@foreach($author->post as $post)
		<div class="card mg-bottom">
			<div class="card-header bg-clr-white" style="">
				<div class="flex-item-start">
					<img class="rounded-circle mg-top-15px" src="{{ Storage::url($author->profile->avatar) }}" alt="Card image cap" style="height: 40px; width: 40px;">
					<div class="">
						<h5 class="font-bd mgn-btm-sl mg-top-1 mg-left-15px">{{ $author->name }}</h5>
						<p class="mg-left-15px"> Published: {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}  | <i>Reading time</i>: <span id="read_time"></span></p>
					</div>
				</div>
			</div>
			<h1 class="font-sm padding-4 mg-top-15px">{{ $post->title }}</h1>
			<p class="padding-auto-3">{{ str_limit($post->body, $limit = 250, $end = '...') }}</p>
			<p style="opacity: 0; height: 0px;" id="post_body">{{ $post->body }}</p>
			<ul class='nav nav-pills card-body'>
                <li role='presentation'>
                    <a href="{{url('post/'.$post->id.'/show')}}">
                        <span><i class="fa fa-eye"></i> View </span>
                    </a>
                    @if(auth()->check() && auth()->id() === $post->user->id)
                    <a href="{{url('post/'.$post->id.'/edit')}}">
                        <span> <i class="fa fa-edit"></i> Edit </span>
                    </a>
                    <a href="{{url('post/'.$post->id.'/delete')}}">
                        <span> <i class="fa fa-trash"></i> Delete</span>
                    </a>
                    @endif
                </li>
            </ul>
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
