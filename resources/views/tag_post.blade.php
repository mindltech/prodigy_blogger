@extends('layouts.app')

@section('content')


@if(count($posts) > 0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                @if($post->image)
                  <img class="card-img-top" src="{{ Storage::url($post->image) }}" alt="Card image cap">
                @endif

                  <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ str_limit($post->body, $limit = 350, $end = '...') }}</p>
                    @foreach($post->tags as $tag)
                    <a href="" class="badge badge-dark">{{ $tag->name }}</a>
                       @endforeach
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
@endsection