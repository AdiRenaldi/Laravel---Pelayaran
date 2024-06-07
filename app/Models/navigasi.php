<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class navigasi extends Model
{
    use HasFactory;

    protected $table = 'navigasi';
    protected $fillable =[
        'kapal_id', 
        'perlengkapanNavigasi', 
        'perangkatRadio',
        'izinKomunikasiRadio',
        'dayaApungPenolong',
        'labelKapal',
    ];
}
