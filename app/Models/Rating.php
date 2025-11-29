<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id',
        'makanan_id',
        'rating',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * Get the user that gave this rating
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the makanan that was rated
     */
    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'makanan_id', 'idMakanan');
    }
}
