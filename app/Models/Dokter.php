<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'poli_id',
        'name',
        'alamat',
        'HP',
        'jk',
        'image'
    ];

    public function poliklinik(){
        return $this->belongsTo(Poliklinik::class);
    }
}
