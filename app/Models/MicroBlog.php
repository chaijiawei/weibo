<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];

    public static $rules = [
        'content' => 'required|string|min:1|max:255'
    ];

    public static $rulesAttributes = [
        'content' => '微博内容'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
