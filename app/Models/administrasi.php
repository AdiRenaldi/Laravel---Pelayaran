<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrasi extends Model
{
    use HasFactory;

    protected $table = 'administrasi';
    protected $fillable =[
        'kapal_id', 
        'laporanKedatangan', 
        'daftarAwak',
        'suratPernyataan',
        'bukuKesehatan',
        'menifesPenumpang',
    ];
}
