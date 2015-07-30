<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'email',
        'message',
        'post_id',
        'status',
    ];

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function scopePublished($query, $id=null){
        if(is_null($id))
            return $query->where('status','=','publish');
        return $query->whereRaw('status=? AND id=?', ['publish', (int)$id]);
    }
}
