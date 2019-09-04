@extends('layouts.app')

@section('content')
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

    <div class='container'>
        <form action="{{url('/store/post')}}" enctype='multipart/form-data' method = "POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Body</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="body" placeholder="Tell your story" rows="10"></textarea>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="city_tag">Please write a tag</label>
                    <input type="text"  name = "tags" data-role="tagsinput" class="form-control cl-blue" />
                </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1">Add an Image</label>
              <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
    
@endsection
