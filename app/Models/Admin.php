<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Модель админов
class Admin extends Model
{
    protected $table = "admins";
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
