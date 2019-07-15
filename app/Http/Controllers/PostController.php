<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
    public function create()
    {
        return view('create_post');
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
        Post::create([
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
    public function destroy($id)
    {
         $delete = Post::where('id', $id)->first();
         $delete->delete();
         return redirect('/')->with('response', 'post deleted');
    }
}
