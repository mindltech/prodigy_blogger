@extends('layouts.app')

@section('content')
    <div class='container'>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
            
            <div class="form-group">
    <label for="exampleFormControlTextarea1">Body</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Tell your story" rows="10"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Add an Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
    </div>
@endsection