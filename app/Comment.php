<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'email',
        'message',
        'post_id',
    ];

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
