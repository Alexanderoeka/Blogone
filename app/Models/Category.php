<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Модель категорий
class Category extends Model
{
    public $timestamps = false;
    protected $table='categories';
    protected $fillable=[
        'title',
        'description'

    ];
}
