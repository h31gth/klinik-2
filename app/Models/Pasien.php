<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'HP',
        'tgl_lahir',
        'jk'
    ];
}
