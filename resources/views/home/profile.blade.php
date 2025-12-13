@extends('layouts.app')

@section('title', 'Profile - DAPUR KULINER')

@section('styles')
<style>
    body {
        background: #0a0a0a;
        overflow-x: hidden;
    }
    
    .profile-container {
        min-height: 100vh;
        position: relative;
        padding: 2rem;
    }
    
    .profile-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/assets/bg_acc_profile.png') center/cover;
        filter: blur(8px) brightness(0.4);
        z-index: 0;
    }
    
    .profile-content {
        position: relative;
        z-index: 1;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .back-button {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        color: #ffffff;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
    }
    
    .back-button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateX(-5px);
    }
    
    .profile-wrapper {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 2rem;
        margin-top: 2rem;
    }
    
    @media (max-width: 768px) {
        .profile-wrapper {
            grid-template-columns: 1fr;
        }
    }
    
    .profile-picture-section {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .profile-picture-container {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        aspect-ratio: 1;
    }
    
    .profile-picture {
        width: 100%;
        max-width: 300px;
        height: auto;
        border-radius: 15px;
        object-fit: cover;
    }
    
    .profile-placeholder {
        width: 100%;
        aspect-ratio: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: #ffffff;
    }
    
    .btn-ubah-profil {
        background: rgba(42, 42, 42, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        color: #ffffff;
        padding: 0.85rem;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .btn-ubah-profil:hover {
        background: rgba(52, 52, 52, 0.9);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .profile-data-section {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .data-field {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 1.2rem 1.5rem;
        color: #ffffff;
        font-size: 1rem;
    }
    
    .data-label {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .data-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: #ffffff;
    }
    
    .btn-ubah-data {
        background: rgba(42, 42, 42, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        color: #ffffff;
        padding: 0.85rem;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s ease;
        margin-top: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-ubah-data:hover {
        background: rgba(52, 52, 52, 0.9);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        backdrop-filter: blur(5px);
    }
    
    .modal-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .modal-content {
        background: rgba(30, 30, 30, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2.5rem;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
    }
    
    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: none;
        border: none;
        color: #ffffff;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .modal-close:hover {
        color: #D4AF37;
        transform: rotate(90deg);
    }
    
    .modal-title {
        font-family: 'Nomark', sans-serif;
        font-size: 2rem;
        color: #D4AF37;
        margin-bottom: 1.5rem;
    }
    
    .form-group-modal {
        margin-bottom: 1.5rem;
    }
    
    .form-label-modal {
        display: block;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    
    .form-control-modal {
        width: 100%;
        padding: 0.75rem;
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        color: #ffffff;
        font-size: 1rem;
    }
    
    .form-control-modal:focus {
        outline: none;
        border-color: #D4AF37;
    }
    
    .btn-submit-data {
        background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%);
        color: #0a0a0a;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        font-size: 1rem;
    }
    
    .btn-submit-data:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
    }
    
    .profile-picture-preview {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(212, 175, 55, 0.3);
        margin: 0 auto 1rem;
        display: block;
    }
    
    .file-input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    
    .file-input-label {
        display: block;
        padding: 0.75rem;
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        color: #ffffff;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .file-input-label:hover {
        background: rgba(212, 175, 55, 0.2);
        border-color: #D4AF37;
    }
    
    .file-input-wrapper input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    
    .alert {
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
    }
    
    .alert-success {
        background: rgba(80, 200, 120, 0.2);
        border: 1px solid rgba(80, 200, 120, 0.5);
        color: #50C878;
    }
    
    .alert-danger {
        background: rgba(220, 53, 69, 0.2);
        border: 1px solid rgba(220, 53, 69, 0.5);
        color: #ff6b6b;
    }
</style>
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-background"></div>
    <div class="profile-content">
        <button class="back-button" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i>
        </button>
        
        <div class="profile-wrapper">
            <div class="profile-picture-section">
                <div class="profile-picture-container">
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" class="profile-picture">
                    @else
                        <div class="profile-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="profile-data-section">
                <div class="data-field">
                    <div class="data-label">Nama</div>
                    <div class="data-value">{{ auth()->user()->name }}</div>
                </div>
                
                <div class="data-field">
                    <div class="data-label">E-Mail</div>
                    <div class="data-value">{{ auth()->user()->email }}</div>
                    </div>
                
                <div class="data-field">
                    <div class="data-label">Username</div>
                    <div class="data-value">{{ auth()->user()->username }}</div>
                    </div>
                
                <button class="btn-ubah-data" onclick="showEditModal()">
                    <i class="fas fa-edit"></i> Ubah Data
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Data Modal -->
<div id="editModal" class="modal-overlay" onclick="if(event.target === this) closeEditModal()">
    <div class="modal-content" onclick="event.stopPropagation()">
        <button class="modal-close" onclick="closeEditModal()">&times;</button>
        <h2 class="modal-title">Ubah Data</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group-modal">
                <label class="form-label-modal">Foto Profil</label>
                <div id="profile-preview-container">
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Preview" class="profile-picture-preview" id="profile-preview">
                    @else
                        <div class="profile-picture-preview" id="profile-preview" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 3rem;">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                </div>
                <div class="file-input-wrapper">
                    <label for="profile_picture" class="file-input-label">
                        <i class="fas fa-upload"></i> Pilih Foto Profil
                    </label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewProfilePicture(this)">
                </div>
                @error('profile_picture')
                    <div style="color: #ff6b6b; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group-modal">
                <label for="name" class="form-label-modal">Nama</label>
                <input type="text" class="form-control-modal @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                    <div style="color: #ff6b6b; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group-modal">
                <label for="username" class="form-label-modal">Username</label>
                <input type="text" class="form-control-modal @error('username') is-invalid @enderror" 
                       id="username" name="username" value="{{ old('username', auth()->user()->username) }}" required>
                @error('username')
                    <div style="color: #ff6b6b; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group-modal">
                <label for="email" class="form-label-modal">E-Mail</label>
                <input type="email" class="form-control-modal @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <div style="color: #ff6b6b; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group-modal">
                <label class="form-label-modal">Ubah Password (Opsional)</label>
                <small style="color: rgba(255, 255, 255, 0.6); display: block; margin-bottom: 0.5rem;">Kosongkan jika tidak ingin mengubah password</small>
            </div>
            
            <div class="form-group-modal">
                <label for="current_password" class="form-label-modal">Password Lama</label>
                <input type="password" class="form-control-modal @error('current_password') is-invalid @enderror" 
                       id="current_password" name="current_password">
                @error('current_password')
                    <div style="color: #ff6b6b; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group-modal">
                <label for="new_password" class="form-label-modal">Password Baru</label>
                <input type="password" class="form-control-modal @error('new_password') is-invalid @enderror" 
                       id="new_password" name="new_password">
                @error('new_password')
                    <div style="color: #ff6b6b; font-size: 0.85rem; margin-top: 0.5rem;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group-modal">
                <label for="new_password_confirmation" class="form-label-modal">Konfirmasi Password Baru</label>
                <input type="password" class="form-control-modal" 
                       id="new_password_confirmation" name="new_password_confirmation">
            </div>
            
            <button type="submit" class="btn-submit-data">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
    function showEditModal() {
        document.getElementById('editModal').classList.add('active');
    }
    
    function closeEditModal() {
        document.getElementById('editModal').classList.remove('active');
    }
    
    function previewProfilePicture(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('profile-preview');
                if (preview.tagName === 'IMG') {
                    preview.src = e.target.result;
                } else {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'profile-picture-preview';
                    img.id = 'profile-preview';
                    preview.parentNode.replaceChild(img, preview);
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEditModal();
        }
    });
</script>
@endsection
