<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaAspekAdministrasi extends Model
{
    use HasFactory;
    protected $table = 'kriteria_aspek_administrasi';
    protected $fillable =[
        'kapal_id', 
        'kriteria_1', 
        'kriteria_2',
        'kriteria_3',
        'kriteria_4',
        'kriteria_5',
        'cf',
        'sf',
    ];
}
