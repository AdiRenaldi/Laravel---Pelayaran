<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalKriteriaAspekMesin extends Model
{
    use HasFactory;

    protected $table = 'total_kriteria_aspek_mesin';
    protected $fillable =[
        'kapal_id', 
        'cf', 
        'sf',
        'niam',
    ];
}
