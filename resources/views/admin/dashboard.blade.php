@extends('layouts.app')

@section('title', 'Admin Dashboard - DAPUR KULINER')

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
    
    .admin-container {
        min-height: 100vh;
        padding: 6rem 2rem 4rem;
        background: #0a0a0a;
    }
    
    .admin-content {
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .admin-title {
        font-family: 'Nomark', sans-serif;
        font-size: 3rem;
        color: #D4AF37;
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .stat-card {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        padding: 2.5rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, transparent, currentColor, transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: currentColor;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        background: rgba(40, 40, 40, 0.8);
    }
    
    .stat-card:hover::before {
        opacity: 1;
    }
    
    .stat-card.blue {
        color: #4A90E2;
    }
    
    .stat-card.green {
        color: #50C878;
    }
    
    .stat-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }
    
    .stat-card-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #ffffff;
        margin: 0;
    }
    
    .stat-card-icon {
        font-size: 2.5rem;
        opacity: 0.8;
    }
    
    .stat-card-value {
        font-size: 4rem;
        font-weight: 700;
        color: currentColor;
        margin: 1rem 0;
        line-height: 1;
    }
    
    .stat-card-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: currentColor;
        text-decoration: none;
        font-weight: 600;
        margin-top: 1rem;
        transition: all 0.3s ease;
        border-bottom: 2px solid transparent;
    }
    
    .stat-card-link:hover {
        border-bottom-color: currentColor;
        transform: translateX(5px);
    }
    
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    
    .action-btn {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 2rem;
        text-decoration: none;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        font-size: 1.2rem;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }
    
    .action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }
    
    .action-btn:hover::before {
        left: 100%;
    }
    
    .action-btn:hover {
        transform: translateY(-5px) scale(1.02);
        border-color: currentColor;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }
    
    .action-btn.blue {
        color: #4A90E2;
        border-color: rgba(74, 144, 226, 0.3);
    }
    
    .action-btn.blue:hover {
        background: rgba(74, 144, 226, 0.1);
        box-shadow: 0 15px 30px rgba(74, 144, 226, 0.2);
    }
    
    .action-btn.green {
        color: #50C878;
        border-color: rgba(80, 200, 120, 0.3);
    }
    
    .action-btn.green:hover {
        background: rgba(80, 200, 120, 0.1);
        box-shadow: 0 15px 30px rgba(80, 200, 120, 0.2);
    }
    
    .action-btn-icon {
        font-size: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .admin-title {
            font-size: 2rem;
        }
        
        .stats-grid,
        .actions-grid {
            grid-template-columns: 1fr;
        }
        
        .stat-card-value {
            font-size: 3rem;
        }
    }
</style>
@endsection

@section('content')
<div class="admin-container">
    <div class="admin-content">
        <h1 class="admin-title">Admin Dashboard</h1>
        
        <div class="stats-grid">
            <div class="stat-card blue">
                <div class="stat-card-header">
                    <h3 class="stat-card-title">Tempat Makan</h3>
                    <i class="fas fa-store stat-card-icon"></i>
                </div>
                <div class="stat-card-value">{{ $tempatMakanCount }}</div>
                <a href="{{ route('admin.tempat-makan') }}" class="stat-card-link">
                    Lihat Semua <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="stat-card green">
                <div class="stat-card-header">
                    <h3 class="stat-card-title">Menu Makanan</h3>
                    <i class="fas fa-utensils stat-card-icon"></i>
                </div>
                <div class="stat-card-value">{{ $makananCount }}</div>
                <a href="{{ route('admin.makanan') }}" class="stat-card-link">
                    Lihat Semua <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        
        <div class="actions-grid">
            <a href="{{ route('admin.tempat-makan.create') }}" class="action-btn blue">
                <i class="fas fa-plus action-btn-icon"></i>
                <span>Tambah Tempat Makan</span>
            </a>
            
            <a href="{{ route('admin.makanan.create') }}" class="action-btn green">
                <i class="fas fa-plus action-btn-icon"></i>
                <span>Tambah Menu Makanan</span>
            </a>
        </div>
    </div>
</div>
@endsection
