<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kapal extends Model
{
    use HasFactory,sluggable;

    protected $table = 'kapal';
    protected $fillable =[
        'nama_kapal', 
        'pemilik',
        'gt',
        'tahun',
        'jenis_kapal',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_kapal'
            ]
        ];
    }

    public function rengking()
    {
        return $this->belongsTo(Rengking::class, 'kapal_id', 'id');
    }
}
