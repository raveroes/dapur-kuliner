<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatMakan extends Model
{
    use HasFactory;

    protected $table = 'tempat_makan';
    protected $primaryKey = 'idTempat';

    protected $fillable = [
        'namaTempat',
        'alamat',
        'kategori',
        'deskripsi',
        'gambar',
    ];

    /**
     * Get all makanan from this tempat makan
     */
    public function makanan()
    {
        return $this->hasMany(Makanan::class, 'idTempat', 'idTempat');
    }
}

