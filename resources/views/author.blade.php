@extends('layouts.app')

@section('content')
<style>
	.border-none{
		border: none;
	}
	.mg-auto{
		margin: 0 auto;
	}
	.mg-top{
		margin-top: 15px;
	}
	.mg-bottom-6{
		margin-bottom: 6em;
	}
	.mg-bottom{
		margin-bottom: 15px;
	}
	.grid-item-ct{
		display: grid;
		
	}
	.flex-item{
		display: flex;
		justify-content: space-evenly;
	}
	.font-bd{
		font-weight: 600;
	}
	.padding-auto-12{
		padding: 0 12em;
	}
	.pd-top{
		padding-top: 25px;
	}
</style>

<div class="container padding-auto-12 mg-bottom">
	 @if (session('status'))
         <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
     @endif
     @if($author)
     	<div class="card grid-item-ct border-none">
     		<div class="mg-auto">
            	<img class="rounded-circle mg-top" src="{{ Storage::url($author->profile->avatar) }}" alt="Card image cap" style="height: 80px; width: 80px;">
            </div> 
            <div class="mg-auto pd-top">
                <h5 class="font-bd">{{ $author->name }}</h5>
                <p class="">{{ str_limit($author->profile->bio, $limit = 1500, $end = '...') }}</p>
                <hr>
                <p>Published posts: {{ count($author->post) }}</p>
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
		<div class="card">
			<div class="card-header" style="">
				<img class="rounded-circle mg-top" src="{{ Storage::url($author->profile->avatar) }}" alt="Card image cap" style="height: 40px; width: 40px;">
				<h5 class="font-bd">{{ $author->name }}</h5>
			</div>
			<h1 class="font-bd ">{{ $post->title }}</h1>
			<p>{{ $post->body }}</p>
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
