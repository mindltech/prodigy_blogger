@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Welcome to Prodigy Blogger</h1>
          <p class="lead my-3">This platform allows you to make post and read articles. Now go ahead and fill readers efficiently with the most interesting and exciting posts.</p>
          <!-- <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p> -->
          
        </div>
      </div>
      
        @if (session('posts'))
            <div class="alert alert-succes alert-dismissible fade show">
                <strong>Success!</strong> Result found.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if (session('noposts'))
            <div class="alert alert-succes alert-dismissible fade show">
                <strong>Success!</strong> No result found.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your post has been deleted successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if(session('good'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your post has been published successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if(session('update'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> Your post has been updated successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if(count ($tags) > 0)
         @foreach($tags as $tag)
            <a href="{{ url('tag/'.$tag->id.'/tag_post') }}" class="p-2 text-muted">{{ $tag->name }}</a>
         @endforeach
        @endif
        <div class="cust-grid">
            <Tags :tags="{{ $tags }}"></Tags>
            <Posts :posts="{{ $posts }}"></Posts>
        </div>

        
    <hr>
    <footer class="blog-footer text-center">
      <p>Blog app built by Dimola and Segun .</p>
      <p>
        <a href="{{ url('/') }}"><i class="fa fa-chevron-up"></i></a>
      </p>
    </footer>
    </div>
@endsection
