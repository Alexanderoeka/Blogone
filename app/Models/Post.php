<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "user_id",
        "description",
        "content",
        'category_id'
    ];
}
