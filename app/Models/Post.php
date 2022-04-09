<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_uz',
        'title_en',
        'body_uz',
        'body_en',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments(){

        return $this->hasMany(Comment::class)->latest();
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
