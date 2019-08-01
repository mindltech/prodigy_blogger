@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-1">
        <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        @if($post->image)
            <img class="card-img-top p-3 mb-5 bg-white rounded" src="{{ Storage::url($post->image) }}" alt="">
        @endif
        <p class="card-text">{{ str_limit($post->body, $limit = 3500, $end = '...') }}</p>
    </div>
    <main class="py-4">
    <!-- @if(auth()->check())
            @yield('content')

            <like></like> -->
            <!-- @php
                $liked = ((bool) \App\Like::where('user_id', auth()->id())->where('post_id', $post->id)->first());
            @endphp -->
     <div id="like">
        <Like :likes="{{ $post->likes->count() }}" :post="{{ $post }}" :userliked="{{ json_encode(((bool) \App\Like::where('user_id', auth()->id())->where('post_id', $post->id)->first())) }}"></Like>
     </div>
     <!-- <script src="{{mix('js/app.js')}}"></script> -->
    <!-- @endif -->
        </main>
    <div class="card-footer">
        <small class="text-muted">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
    </div>
</div>

@endsection



