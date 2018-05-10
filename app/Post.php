<?php

namespace App;

class Post extends Model
{
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function addComment($body) {

        // long way to do it
//        Comment::create([
//          'body' => request('body'),
//          'post_id' => $this->id,
//          'user_id' => 0
//        ]);

        // short way to do it
        $user_id = 1;
        $this->comments()->create(compact('body', 'user_id'));
    }
}
