<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('create_post', ['user' => auth()->user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $data = $request->validate([
            'title' => 'required|unique:posts|max:100',
            'body' => 'required|max:5000',
            'image' => 'nullable'
        ]);

        if($request->hasFile('image')) {
            // $image_url = $data['image']->store('images/posts');
            $image_url = $request->file('image')->store('public/images/post');
        } else {
            $image_url = null;
        }

        // ssave to db
        Post::create([
            'user_id' => auth()->user()->id,
            'username' => auth()->user()->username,
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $image_url
        ]);

        return redirect('/')->with(['success' => 'Article was published!']);

        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('show_post', ['post'=>$post]);
    }

    public function getpost()
    {

        $user_posts = auth()->user()->post;
        // Post::all();

        return view('my_post', ['posts' => $user_posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user->id === auth()->id()) {
            $user_posts = $post;
            return view('edit_post', ['post'=>$user_posts]);
        } else return abort(403, 'this is not your post!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Post::create([
        //     'image' => $image_url
        // ]);
        // $post->update($request->all());
        // dd($request->all());

        if($request->hasFile('image')) {
            // $image_url = $data['image']->store('images/posts');
            $image_url = $request->file('image')->store('public/images/post');
        } else {
            $image_url = $post->image;
        }

        // ssave to db
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image_url
        ]);

        // $post->update($request->image_url());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function destroy(Post $post)
    {

        Storage::delete($post->image);
        $post->delete();
        // dd($delete = Post::where('id', $id)->first());
        //  $delete = Post::where('id', $id)->first();
        //  $delete->delete();
         return redirect('/')->with('response', 'post deleted');
    }
}
