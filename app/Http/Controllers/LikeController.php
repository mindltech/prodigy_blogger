<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
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
    
        if ((bool) Like::where('user_id', auth()->id())->where('post_id', $post->id)->first()) {
            $post->likes()->detach(auth()->user());

            return response()->json(['likes' => count($post->likes)], 201);
        }
        $post->likes()->attach(auth()->user());

        return response()->json(['likes' => count($post->likes)], 201);  


    }
}
// public function like(Post $post)
//     {
//         // like button
//         if ((bool) Like::where('user_id', auth()->id())->where('post_id', $post->id)->first()) {
//             $post->likes()->detach(auth()->user());

//             return response()->json(['likes' => count($post->likes), 'status' => false], 201);
//         }

//         $post->likes()->attach(auth()->user());

//         return response()->json(['likes' => count($post->likes), 'status' => true], 201);

//     }
