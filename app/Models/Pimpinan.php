<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    use HasFactory;
    protected $table = 'pimpinan';

    protected $fillable =[
        'nama', 
        'username',
        'password',
    ];

    protected $attributes = [
        'role_id' => 2,
    ];
}
