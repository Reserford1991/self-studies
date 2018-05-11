<?php

namespace App;
use Carbon\Carbon;

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

    public function scopeFilter($query, $filters) {

        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives() {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
          ->groupBy('year', 'month')
          ->orderByRaw('min(created_at) desc')
          ->get()
          ->toArray();
    }
}
