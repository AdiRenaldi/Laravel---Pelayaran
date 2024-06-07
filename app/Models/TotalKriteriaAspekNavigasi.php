<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalKriteriaAspekNavigasi extends Model
{
    use HasFactory;

    protected $table = 'total_kriteria_aspek_navigasi';
    protected $fillable =[
        'kapal_id', 
        'cf', 
        'sf',
        'nianp',
    ];
}
