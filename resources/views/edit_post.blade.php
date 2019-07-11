@extends('layouts.app')

@section('content')
    <div class='container'>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value='{{ $post->title }}' aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
    <label for="exampleFormControlTextarea1">Body</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ str_limit($post->body, $limit = 150, $end = '...') }}" placeholder="Tell your story" rows="10">{{ str_limit($post->body, $limit = 150, $end = '...') }}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Change Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
    </div>
@endsection
