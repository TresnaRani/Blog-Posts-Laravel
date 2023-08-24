<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//model for user
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected  $fillable = [
        'title',
        'content',
        'image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}