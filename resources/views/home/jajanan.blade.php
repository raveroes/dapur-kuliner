@extends('layouts.app')

@section('title', 'Jajanan - DAPUR KULINER')

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
    
    .list-container {
        min-height: 100vh;
        padding: 2rem 0 4rem;
        background: #0a0a0a;
        padding-top: 6rem;
    }
    
    .list-header {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        margin-bottom: 3rem;
    }
    
    .list-title {
        font-family: 'Nomark', sans-serif;
        font-size: 3rem;
        color: #D4AF37;
        margin-bottom: 1rem;
    }
    
    .list-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 4rem;
        position: relative;
    }
    
    .food-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 3rem;
        margin-bottom: 3rem;
    }
    
    @media (max-width: 968px) {
        .food-grid {
            grid-template-columns: 1fr;
        }
        
        .nav-arrows {
            display: none;
        }
        
        .list-content {
            padding: 0 2rem;
        }
    }
    
    .food-card {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        padding: 2.5rem;
        display: flex;
        gap: 2rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        text-decoration: none;
        color: inherit;
    }
    
    .food-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: #D4AF37;
        box-shadow: 0 20px 40px rgba(212, 175, 55, 0.3);
        background: rgba(40, 40, 40, 0.8);
    }
    
    .food-image-wrapper {
        flex-shrink: 0;
        width: 200px;
        height: 200px;
    }
    
    .food-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(212, 175, 55, 0.3);
        transition: all 0.4s ease;
    }
    
    .food-card:hover .food-image {
        border-color: #D4AF37;
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
    }
    
    .food-image-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 3rem;
        border: 3px solid rgba(212, 175, 55, 0.3);
    }
    
    .food-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .food-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 1rem;
        font-family: 'Poppins', sans-serif;
        line-height: 1.3;
    }
    
    .food-description {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
    }
    
    .food-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .star {
        color: #D4AF37;
        font-size: 1.2rem;
    }
    
    .star-empty {
        color: rgba(255, 255, 255, 0.2);
    }
    
    .nav-arrows {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .nav-arrows:hover {
        background: rgba(212, 175, 55, 0.2);
        border-color: #D4AF37;
        transform: translateY(-50%) scale(1.1);
    }
    
    .nav-arrow-left {
        left: -25px;
    }
    
    .nav-arrow-right {
        right: -25px;
    }
    
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 3rem;
    }
    
    .pagination-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .pagination-dot.active {
        background: #D4AF37;
        border-color: #D4AF37;
        width: 30px;
        border-radius: 6px;
    }
    
    .pagination-dot:hover {
        background: rgba(212, 175, 55, 0.5);
        border-color: #D4AF37;
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .tempat-makan-section {
        margin-top: 4rem;
        padding-top: 3rem;
        border-top: 2px solid rgba(212, 175, 55, 0.3);
    }
    
    .tempat-makan-section h2 {
        font-family: 'Nomark', sans-serif;
        font-size: 2.5rem;
        color: #D4AF37;
        margin-bottom: 2rem;
        text-align: center;
    }
    
    .tempat-makan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    
    .tempat-makan-card {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 2rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
    }
    
    .tempat-makan-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: #D4AF37;
        box-shadow: 0 20px 40px rgba(212, 175, 55, 0.3);
        background: rgba(40, 40, 40, 0.8);
    }
    
    .tempat-makan-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    
    .tempat-makan-icon {
        width: 50px;
        height: 50px;
        background: rgba(212, 175, 55, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #D4AF37;
        font-size: 1.5rem;
    }
    
    .tempat-makan-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: #ffffff;
    }
    
    .tempat-makan-address {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
    }
    
    .tempat-makan-address i {
        color: #D4AF37;
    }
    
    .tempat-makan-menu-count {
        font-size: 0.9rem;
        color: rgba(212, 175, 55, 0.8);
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="list-container">
    <div class="list-header">
        <h1 class="list-title">Jajanan</h1>
    </div>
    
    <div class="list-content">
        @if($makanan->count() > 0)
            @if($makanan->hasPages() && $makanan->currentPage() > 1)
            <button class="nav-arrows nav-arrow-left" onclick="window.location.href='{{ $makanan->previousPageUrl() }}'">
                <i class="fas fa-chevron-left"></i>
            </button>
            @else
            <button class="nav-arrows nav-arrow-left" style="opacity: 0.3; cursor: not-allowed;" disabled>
                <i class="fas fa-chevron-left"></i>
            </button>
            @endif
            
            <div class="food-grid">
                @foreach($makanan as $item)
                    <a href="{{ route('makanan.show', $item->idMakanan) }}" class="food-card">
                        <div class="food-image-wrapper">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->namaMenu }}" class="food-image">
                            @else
                                <div class="food-image-placeholder">
                                    <i class="fas fa-cookie"></i>
                                </div>
                            @endif
                        </div>
                        
                        <div class="food-info">
                            <div>
                                <h3 class="food-title">{{ $item->namaMenu }}</h3>
                                <p class="food-description">
                                    {{ $item->deskripsi }} {{ $item->tempatMakan->alamat ?? '' }}
                                </p>
                            </div>
                            
                            <div class="food-rating">
                                @php
                                    $avgRating = round($item->getAverageRating());
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star star {{ $i <= $avgRating ? '' : 'star-empty' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            
            @if($makanan->hasPages() && $makanan->hasMorePages())
            <button class="nav-arrows nav-arrow-right" onclick="window.location.href='{{ $makanan->nextPageUrl() }}'">
                <i class="fas fa-chevron-right"></i>
            </button>
            @else
            <button class="nav-arrows nav-arrow-right" style="opacity: 0.3; cursor: not-allowed;" disabled>
                <i class="fas fa-chevron-right"></i>
            </button>
            @endif
            
            <div class="pagination-container">
                @for($i = 1; $i <= $makanan->lastPage(); $i++)
                    <div class="pagination-dot {{ $i == $makanan->currentPage() ? 'active' : '' }}" 
                         onclick="window.location.href='{{ $makanan->url($i) }}'"></div>
                @endfor
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-cookie"></i>
                </div>
                <p>Tidak ada jajanan yang ditemukan.</p>
            </div>
        @endif
        
        @if(isset($tempatMakanList) && $tempatMakanList->count() > 0)
        <div class="tempat-makan-section">
            <h2>Daftar Tempat Makan</h2>
            <div class="tempat-makan-grid">
                @foreach($tempatMakanList as $tempat)
                    <div class="tempat-makan-card" onclick="filterByTempat({{ $tempat->idTempat }})">
                        <div class="tempat-makan-header">
                            <div class="tempat-makan-icon">
                                <i class="fas fa-store"></i>
                            </div>
                            <div class="tempat-makan-name">{{ $tempat->namaTempat }}</div>
                        </div>
                        <div class="tempat-makan-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $tempat->alamat }}</span>
                        </div>
                        @if($tempat->makanan_count > 0)
                        <div class="tempat-makan-menu-count">
                            {{ $tempat->makanan_count }} menu tersedia
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    function filterByTempat(idTempat) {
        const url = new URL(window.location.href);
        url.searchParams.set('tempat', idTempat);
        window.location.href = url.toString();
    }
</script>

@endsection
