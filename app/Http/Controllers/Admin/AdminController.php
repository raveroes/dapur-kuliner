<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Makanan;
use App\Models\TempatMakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        $tempatMakanCount = TempatMakan::count();
        $makananCount = Makanan::count();
        return view('admin.dashboard', compact('tempatMakanCount', 'makananCount'));
    }

    /**
     * Show list of tempat makan
     */
    public function tempatMakan()
    {
        $tempatMakan = TempatMakan::withCount('makanan')->paginate(10);
        return view('admin.tempat-makan.index', compact('tempatMakan'));
    }

    /**
     * Show create tempat makan form
     */
    public function createTempatMakan()
    {
        return view('admin.tempat-makan.create');
    }

    /**
     * Store new tempat makan
     */
    public function storeTempatMakan(Request $request)
    {
        $request->validate([
            'namaTempat' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kategori' => 'required|in:makananberat,jajanan,minuman,frozen_food',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('tempat-makan', 'public');
        }

        TempatMakan::create($data);

        return redirect()->route('admin.tempat-makan')->with('success', 'Tempat makan berhasil ditambahkan');
    }

    /**
     * Show edit tempat makan form
     */
    public function editTempatMakan($id)
    {
        $tempatMakan = TempatMakan::findOrFail($id);
        return view('admin.tempat-makan.edit', compact('tempatMakan'));
    }

    /**
     * Update tempat makan
     */
    public function updateTempatMakan(Request $request, $id)
    {
        $request->validate([
            'namaTempat' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kategori' => 'required|in:makananberat,jajanan,minuman,frozen_food',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tempatMakan = TempatMakan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($tempatMakan->gambar) {
                Storage::disk('public')->delete($tempatMakan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('tempat-makan', 'public');
        }

        $tempatMakan->update($data);

        return redirect()->route('admin.tempat-makan')->with('success', 'Tempat makan berhasil diperbarui');
    }

    /**
     * Delete tempat makan
     */
    public function destroyTempatMakan($id)
    {
        $tempatMakan = TempatMakan::findOrFail($id);
        
        if ($tempatMakan->gambar) {
            Storage::disk('public')->delete($tempatMakan->gambar);
        }
        
        $tempatMakan->delete();

        return redirect()->route('admin.tempat-makan')->with('success', 'Tempat makan berhasil dihapus');
    }

    /**
     * Show list of makanan
     */
    public function makanan()
    {
        $makanan = Makanan::with('tempatMakan')->paginate(10);
        return view('admin.makanan.index', compact('makanan'));
    }

    /**
     * Show create makanan form
     */
    public function createMakanan()
    {
        $tempatMakan = TempatMakan::all();
        return view('admin.makanan.create', compact('tempatMakan'));
    }

    /**
     * Store new makanan
     */
    public function storeMakanan(Request $request)
    {
        $request->validate([
            'idTempat' => 'required|exists:tempat_makan,idTempat',
            'namaMenu' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0|max:99999999.99',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:makananberat,jajanan,minuman,frozen_food',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('makanan', 'public');
        }

        Makanan::create($data);

        return redirect()->route('admin.makanan')->with('success', 'Menu makanan berhasil ditambahkan');
    }

    /**
     * Show edit makanan form
     */
    public function editMakanan($id)
    {
        $makanan = Makanan::findOrFail($id);
        $tempatMakan = TempatMakan::all();
        return view('admin.makanan.edit', compact('makanan', 'tempatMakan'));
    }

    /**
     * Update makanan
     */
    public function updateMakanan(Request $request, $id)
    {
        $request->validate([
            'idTempat' => 'required|exists:tempat_makan,idTempat',
            'namaMenu' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0|max:99999999.99',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:makananberat,jajanan,minuman,frozen_food',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $makanan = Makanan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($makanan->gambar) {
                Storage::disk('public')->delete($makanan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('makanan', 'public');
        }

        $makanan->update($data);

        return redirect()->route('admin.makanan')->with('success', 'Menu makanan berhasil diperbarui');
    }

    /**
     * Delete makanan
     */
    public function destroyMakanan($id)
    {
        $makanan = Makanan::findOrFail($id);
        
        if ($makanan->gambar) {
            Storage::disk('public')->delete($makanan->gambar);
        }
        
        $makanan->delete();

        return redirect()->route('admin.makanan')->with('success', 'Menu makanan berhasil dihapus');
    }
}

