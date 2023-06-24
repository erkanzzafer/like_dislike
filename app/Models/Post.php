<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function likes()
    {
        return $this->hasMany(LikeDislike::class, 'post_id')->sum('like');
    }

    public function dislikes()
    {
        return $this->hasMany(LikeDislike::class, 'post_id')->sum('dislike');
    }
}
