@extends('layouts.app')

@section('content')
    <div class='container'>
        <form action="/post/{{ $post->id }}" enctype='multipart/form-data' method = "POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='{{ $post->title }}' aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
    <label for="exampleFormControlTextarea1">Body</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="body"  value="{{ str_limit($post->body, $limit = 150, $end = '...') }}" placeholder="Tell your story" rows="10">{{ str_limit($post->body, $limit = 150, $end = '...') }}</textarea>
  </div>
  <img src="{{ Storage::url($post->image) }}" style='max-width:20%' alt="">
  <div class="form-group">
    <label for="exampleFormControlFile1">Change Image</label>
    <input type="file" class="form-control-file" name="image" src="{{ Storage::url($post->image) }}" id="exampleFormControlFile1">

  </div>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
    </div>
@endsection
