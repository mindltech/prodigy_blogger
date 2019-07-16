<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
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
            'body' => 'required|min:5',
            'image' => 'nullable'
        ]);

        if($request->hasFile('image')) {
            // $image_url = $data['image']->store('images/posts');
            $image_url = $request->file('image')->store('public/images/posts');
        } else {
            $image_url = null;
        }

        // ssave to db
        Post::user()->create([
            // 'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $image_url
        ]);

        return redirect('/')->with(['success', 'Post published successfully!']);

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
        $posts = Post::all();
        
        return view('my_post', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('edit_post', ['post'=>$post]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
