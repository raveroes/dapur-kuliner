<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\TempatMakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        
        if ($request->has('tempat') && $request->tempat) {
            $query->where('idTempat', $request->tempat);
        }

        $makanan = $query->paginate(4);
        
        // Get list of restaurants for this category
        $tempatMakanList = TempatMakan::whereHas('makanan', function($q) {
            $q->where('kategori', 'makananberat');
        })->withCount(['makanan' => function($q) {
            $q->where('kategori', 'makananberat');
        }])->get();
        
        return view('home.makanan-berat', compact('makanan', 'tempatMakanList'));
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
        
        if ($request->has('tempat') && $request->tempat) {
            $query->where('idTempat', $request->tempat);
        }

        $makanan = $query->paginate(4);
        
        // Get list of restaurants for this category
        $tempatMakanList = TempatMakan::whereHas('makanan', function($q) {
            $q->where('kategori', 'jajanan');
        })->withCount(['makanan' => function($q) {
            $q->where('kategori', 'jajanan');
        }])->get();
        
        return view('home.jajanan', compact('makanan', 'tempatMakanList'));
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
        
        if ($request->has('tempat') && $request->tempat) {
            $query->where('idTempat', $request->tempat);
        }

        $makanan = $query->paginate(4);
        
        // Get list of restaurants for this category
        $tempatMakanList = TempatMakan::whereHas('makanan', function($q) {
            $q->where('kategori', 'minuman');
        })->withCount(['makanan' => function($q) {
            $q->where('kategori', 'minuman');
        }])->get();
        
        return view('home.minuman', compact('makanan', 'tempatMakanList'));
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
        
        if ($request->has('tempat') && $request->tempat) {
            $query->where('idTempat', $request->tempat);
        }

        $makanan = $query->paginate(4);
        
        // Get list of restaurants for this category
        $tempatMakanList = TempatMakan::whereHas('makanan', function($q) {
            $q->where('kategori', 'frozen_food');
        })->withCount(['makanan' => function($q) {
            $q->where('kategori', 'frozen_food');
        }])->get();
        
        return view('home.frozen-food', compact('makanan', 'tempatMakanList'));
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
    
    /**
     * Handle profile update
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Check password if trying to change it
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->route('profile')->with('error', 'Password lama tidak sesuai.');
            }
            $user->password = Hash::make($request->new_password);
        }
        
        // Update user data
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        
        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            
            // Store new profile picture
            $user->profile_picture = $request->file('profile_picture')->store('profile-pictures', 'public');
        }
        
        $user->save();
        
        return redirect()->route('profile')->with('success', 'Data profil berhasil diperbarui.');
    }
}

