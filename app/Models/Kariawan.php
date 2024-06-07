<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Database\Eloquent\Model;

class Kariawan extends Model
{
    use HasFactory;
    protected $table = 'kariawan';

    protected $fillable =[
        'nama', 
        'username',
        'password',
    ];

    protected $attributes = [
        'role_id' => 3,
    ];
}
