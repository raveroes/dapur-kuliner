@extends('layouts.app')

@section('title', 'Tambah Tempat Makan - DAPUR KULINER')

@section('styles')
<style>
    body {
        background: #0a0a0a;
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
    }
    
    .navbar {
        background: #0a0a0a !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .form-container {
        min-height: 100vh;
        padding: 6rem 2rem 4rem;
        background: #0a0a0a;
    }
    
    .form-content {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .form-title {
        font-family: 'Nomark', sans-serif;
        font-size: 3rem;
        color: #D4AF37;
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .form-card {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 3rem;
    }
    
    .form-group {
        margin-bottom: 2rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.75rem;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.95rem;
    }
    
    .form-control,
    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        background: rgba(20, 20, 20, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus,
    .form-select:focus {
        outline: none;
        border-color: #D4AF37;
        background: rgba(30, 30, 30, 0.9);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }
    
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }
    
    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #dc3545;
    }
    
    .invalid-feedback {
        display: block;
        margin-top: 0.5rem;
        color: #dc3545;
        font-size: 0.85rem;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%);
        color: #0a0a0a;
        border: none;
        padding: 0.75rem 2.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
    }
    
    .btn-cancel {
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
        padding: 0.75rem 2.5rem;
        border-radius: 12px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
        margin-left: 1rem;
    }
    
    .btn-cancel:hover {
        background: rgba(212, 175, 55, 0.2);
        border-color: #D4AF37;
        color: #D4AF37;
    }
    
    .form-actions {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }
    
    @media (max-width: 768px) {
        .form-title {
            font-size: 2rem;
        }
        
        .form-card {
            padding: 2rem 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn-cancel {
            margin-left: 0;
            margin-top: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="form-container">
    <div class="form-content">
        <h1 class="form-title">Tambah Tempat Makan</h1>

        <div class="form-card">
            <form method="POST" action="{{ route('admin.tempat-makan.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="namaTempat" class="form-label">Nama Tempat</label>
                    <input type="text" class="form-control @error('namaTempat') is-invalid @enderror" id="namaTempat" name="namaTempat" value="{{ old('namaTempat') }}" required placeholder="Masukkan nama tempat">
                    @error('namaTempat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4" required placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="makananberat" {{ old('kategori') == 'makananberat' ? 'selected' : '' }}>Makanan Berat</option>
                        <option value="jajanan" {{ old('kategori') == 'jajanan' ? 'selected' : '' }}>Jajanan</option>
                        <option value="minuman" {{ old('kategori') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="frozen_food" {{ old('kategori') == 'frozen_food' ? 'selected' : '' }}>Frozen Food</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi tempat (opsional)">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                    <small style="color: rgba(255, 255, 255, 0.6); margin-top: 0.5rem; display: block;">Format: JPG, PNG, GIF (Max: 2MB)</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.tempat-makan') }}" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
