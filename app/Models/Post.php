<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Модель постов
class Post extends Model
{
    protected $fillable = [
        "title",
        "user_id",
        "description",
        "content",
        'category_id'
    ];
    //Отношения hasOne
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Отношения hasOne
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
