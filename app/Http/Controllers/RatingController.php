<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Store or update rating
     */
    public function store(Request $request, $makananId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $makanan = Makanan::findOrFail($makananId);
        $userId = Auth::id();

        // Check if user already rated this makanan
        $existingRating = Rating::where('user_id', $userId)
            ->where('makanan_id', $makananId)
            ->first();

        if ($existingRating) {
            // Update existing rating
            $existingRating->update(['rating' => $request->rating]);
            $message = 'Rating berhasil diperbarui!';
        } else {
            // Create new rating
            Rating::create([
                'user_id' => $userId,
                'makanan_id' => $makananId,
                'rating' => $request->rating,
            ]);
            $message = 'Rating berhasil ditambahkan!';
        }

        return back()->with('success', $message);
    }
}
