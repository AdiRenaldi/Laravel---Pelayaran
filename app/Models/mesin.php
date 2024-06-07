<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesin extends Model
{
    use HasFactory;

    protected $table = 'mesin';
    protected $fillable =[
        'kapal_id', 
        'mesinUtama', 
        'mesinBantu',
        'teganganListrik',
        'bahanBakar',
        'menifesPenumpang',
    ];
}
