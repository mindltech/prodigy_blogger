<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Post $post)
    {
        // like button
        $post->likes()->sync(auth()->user());
        return response([200, 'you liked post with ID of: ' . $post->id]);

    }
}
