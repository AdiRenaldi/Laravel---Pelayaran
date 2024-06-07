<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rengking extends Model
{
    use HasFactory;

    protected $table = 'rengking';
    protected $fillable =[
        'kapal_id', 
        'niaa', 
        'niam',
        'nianp',
        'hasilAkhir',
    ];

    public function kapal()
    {
        return $this->belongsTo(Kapal::class);
    }
}
