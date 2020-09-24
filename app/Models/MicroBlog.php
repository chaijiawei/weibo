<?php

namespace App\Models;

class MicroBlog extends Model
{
    protected $fillable = [
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
