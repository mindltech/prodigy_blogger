<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    public $with = ['user','likes', 'tags'];

    protected $fillable = [
      'user_id', 'title', 'body', 'image',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function profile()
    {
    	return $this->belongsTo('App\Profile');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id');
      
    }

    // public function likes()
    // {
    //     return $this->belongsToMany(Like::class, 'likes');

    // }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimeStamps();


    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
