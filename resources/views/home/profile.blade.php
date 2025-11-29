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
    }
    
    .btn-ubah-data:hover {
        background: rgba(52, 52, 52, 0.9);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .role-badge {
        display: inline-block;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .role-admin {
        background: rgba(220, 53, 69, 0.3);
        color: #ff6b6b;
        border: 1px solid rgba(220, 53, 69, 0.5);
    }
    
    .role-user {
        background: rgba(0, 123, 255, 0.3);
        color: #6bc2ff;
        border: 1px solid rgba(0, 123, 255, 0.5);
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
                    <div class="profile-placeholder">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <button class="btn-ubah-profil">
                    Ubah Profil
                </button>
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
                
                <div class="data-field">
                    <div class="data-label">Role</div>
                    <div class="data-value">
                        <span class="role-badge {{ auth()->user()->isAdmin() ? 'role-admin' : 'role-user' }}">
                                {{ auth()->user()->isAdmin() ? 'Admin' : 'User' }}
                            </span>
                    </div>
                </div>
                
                <button class="btn-ubah-data">
                    Ubah Data
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
