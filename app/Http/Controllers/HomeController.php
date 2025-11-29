<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\TempatMakan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show main menu page
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Show about us page
     */
    public function about()
    {
        return view('home.about');
    }

    /**
     * Show contact us page
     */
    public function contact()
    {
        return view('home.contact');
    }

    /**
     * Show profile page
     */
    public function profile()
    {
        return view('home.profile');
    }

    /**
     * Show makanan berat page
     */
    public function makananBerat(Request $request)
    {
        $query = Makanan::where('kategori', 'makananberat')
            ->with(['tempatMakan', 'ratings'])
            ->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search) {
            $query->where('namaMenu', 'like', '%' . $request->search . '%');
        }

        $makanan = $query->paginate(4);
        return view('home.makanan-berat', compact('makanan'));
    }

    /**
     * Show jajanan page
     */
    public function jajanan(Request $request)
    {
        $query = Makanan::where('kategori', 'jajanan')
            ->with(['tempatMakan', 'ratings'])
            ->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search) {
            $query->where('namaMenu', 'like', '%' . $request->search . '%');
        }

        $makanan = $query->paginate(4);
        return view('home.jajanan', compact('makanan'));
    }

    /**
     * Show minuman page
     */
    public function minuman(Request $request)
    {
        $query = Makanan::where('kategori', 'minuman')
            ->with(['tempatMakan', 'ratings'])
            ->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search) {
            $query->where('namaMenu', 'like', '%' . $request->search . '%');
        }

        $makanan = $query->paginate(4);
        return view('home.minuman', compact('makanan'));
    }

    /**
     * Show frozen food page
     */
    public function frozenFood(Request $request)
    {
        $query = Makanan::where('kategori', 'frozen_food')
            ->with(['tempatMakan', 'ratings'])
            ->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search) {
            $query->where('namaMenu', 'like', '%' . $request->search . '%');
        }

        $makanan = $query->paginate(4);
        return view('home.frozen-food', compact('makanan'));
    }

    /**
     * Show detail makanan
     */
    public function showMakanan($id)
    {
        $makanan = Makanan::with(['tempatMakan', 'ratings'])->findOrFail($id);
        $userRating = null;
        if (auth()->check()) {
            $userRating = $makanan->getUserRating(auth()->id());
        }
        return view('home.detail-makanan', compact('makanan', 'userRating'));
    }
}

