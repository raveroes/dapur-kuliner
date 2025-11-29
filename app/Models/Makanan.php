<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanan';
    protected $primaryKey = 'idMakanan';

    protected $fillable = [
        'idTempat',
        'namaMenu',
        'harga',
        'deskripsi',
        'kategori',
        'gambar',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    /**
     * Get the tempat makan that provides this makanan
     */
    public function tempatMakan()
    {
        return $this->belongsTo(TempatMakan::class, 'idTempat', 'idTempat');
    }

    /**
     * Get all ratings for this makanan
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'makanan_id', 'idMakanan');
    }

    /**
     * Get average rating for this makanan
     */
    public function getAverageRating()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    /**
     * Get user's rating for this makanan
     */
    public function getUserRating($userId)
    {
        $rating = $this->ratings()->where('user_id', $userId)->first();
        return $rating ? $rating->rating : null;
    }

    /**
     * Get info about the food item
     */
    public function getInfo()
    {
        return [
            'id' => $this->idMakanan,
            'nama' => $this->namaMenu,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'tempat' => $this->tempatMakan->namaTempat ?? null,
        ];
    }

    /**
     * Set the price of the food item
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
        $this->save();
    }
}

