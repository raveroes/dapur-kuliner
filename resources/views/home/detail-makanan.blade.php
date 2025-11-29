@extends('layouts.app')

@section('title', $makanan->namaMenu . ' - DAPUR KULINER')

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
    
    .detail-container {
        min-height: 100vh;
        padding: 4rem 2rem;
        background: #0a0a0a;
        padding-top: 6rem;
    }
    
    .detail-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: start;
    }
    
    @media (max-width: 968px) {
        .detail-content {
            grid-template-columns: 1fr;
        }
    }
    
    .detail-image-wrapper {
        position: relative;
        border-radius: 25px;
        overflow: hidden;
    }
    
    .detail-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border: 3px solid rgba(212, 175, 55, 0.3);
        border-radius: 25px;
    }
    
    .detail-image-placeholder {
        width: 100%;
        height: 500px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 5rem;
        border: 3px solid rgba(212, 175, 55, 0.3);
        border-radius: 25px;
    }
    
    .detail-info {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        padding: 3rem;
    }
    
    .detail-title {
        font-family: 'Nomark', sans-serif;
        font-size: 2.5rem;
        color: #D4AF37;
        margin-bottom: 1.5rem;
    }
    
    .detail-meta {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
        color: rgba(255, 255, 255, 0.8);
    }
    
    .detail-meta-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .detail-meta-item i {
        color: #D4AF37;
        width: 20px;
    }
    
    .detail-price {
        font-size: 2rem;
        font-weight: 700;
        color: #D4AF37;
        margin-bottom: 2rem;
    }
    
    .detail-description {
        margin-bottom: 2rem;
    }
    
    .detail-description h5 {
        font-size: 1.3rem;
        color: #D4AF37;
        margin-bottom: 1rem;
    }
    
    .detail-description p {
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.8;
    }
    
    .rating-section {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .rating-section h5 {
        font-size: 1.3rem;
        color: #D4AF37;
        margin-bottom: 1rem;
    }
    
    .rating-display {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .rating-stars {
        display: flex;
        gap: 0.5rem;
    }
    
    .rating-stars .star {
        color: #D4AF37;
        font-size: 1.5rem;
    }
    
    .rating-stars .star-empty {
        color: rgba(255, 255, 255, 0.2);
    }
    
    .rating-average {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
    }
    
    .rating-count {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .rating-form {
        margin-top: 1.5rem;
    }
    
    .rating-form h6 {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 1rem;
    }
    
    .star-input-group {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .star-input {
        display: none;
    }
    
    .star-label {
        font-size: 2rem;
        color: rgba(255, 255, 255, 0.2);
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .star-label:hover,
    .star-label.active {
        color: #D4AF37;
        transform: scale(1.1);
    }
    
    .rating-submit-btn {
        background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%);
        color: #0a0a0a;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }
    
    .rating-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
    }
    
    .back-btn {
        display: inline-block;
        margin-top: 2rem;
        padding: 0.75rem 2rem;
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .back-btn:hover {
        background: rgba(212, 175, 55, 0.2);
        border-color: #D4AF37;
        color: #D4AF37;
    }
    
    .login-prompt {
        background: rgba(212, 175, 55, 0.1);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 10px;
        padding: 1rem;
        margin-top: 1.5rem;
        text-align: center;
    }
    
    .login-prompt a {
        color: #D4AF37;
        text-decoration: none;
        font-weight: 600;
    }
    
    .login-prompt a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="detail-container">
    <div class="detail-content">
        <div class="detail-image-wrapper">
            @if($makanan->gambar)
                <img src="{{ asset('storage/' . $makanan->gambar) }}" alt="{{ $makanan->namaMenu }}" class="detail-image">
            @else
                <div class="detail-image-placeholder">
                    <i class="fas fa-utensils"></i>
                </div>
            @endif
        </div>
        
        <div class="detail-info">
            <h1 class="detail-title">{{ $makanan->namaMenu }}</h1>
            
            <div class="detail-meta">
                <div class="detail-meta-item">
                    <i class="fas fa-store"></i>
                    <span>{{ $makanan->tempatMakan->namaTempat ?? 'N/A' }}</span>
                </div>
                <div class="detail-meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $makanan->tempatMakan->alamat ?? 'N/A' }}</span>
                </div>
            </div>
            
            <div class="detail-price">
                Rp {{ number_format($makanan->harga, 0, ',', '.') }}
            </div>
            
            <div class="detail-description">
                <h5>Deskripsi</h5>
                <p>{{ $makanan->deskripsi }}</p>
            </div>
            
            <div class="rating-section">
                <h5>Rating</h5>
                @php
                    $avgRating = round($makanan->getAverageRating());
                    $ratingCount = $makanan->ratings()->count();
                @endphp
                
                <div class="rating-display">
                    <div class="rating-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star star {{ $i <= $avgRating ? '' : 'star-empty' }}"></i>
                        @endfor
                    </div>
                    <div>
                        <div class="rating-average">{{ number_format($makanan->getAverageRating(), 1) }}/5.0</div>
                        <div class="rating-count">({{ $ratingCount }} {{ $ratingCount == 1 ? 'rating' : 'ratings' }})</div>
                    </div>
                </div>
                
                @auth
                    <div class="rating-form">
                        <h6>Berikan Rating Anda:</h6>
                        <form action="{{ route('makanan.rating', $makanan->idMakanan) }}" method="POST">
                            @csrf
                            <div class="star-input-group">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" class="star-input" 
                                           {{ $userRating == $i ? 'checked' : '' }}>
                                    <label for="star{{ $i }}" class="star-label {{ $userRating && $userRating >= $i ? 'active' : '' }}">
                                        <i class="fas fa-star"></i>
                                    </label>
                                @endfor
                            </div>
                            <button type="submit" class="rating-submit-btn">
                                {{ $userRating ? 'Update Rating' : 'Kirim Rating' }}
                            </button>
                        </form>
                    </div>
                @else
                    <div class="login-prompt">
                        <p>Silakan <a href="{{ route('login') }}">login</a> untuk memberikan rating</p>
                    </div>
                @endauth
            </div>
            
            <a href="{{ url()->previous() }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

@if(auth()->check())
<script>
    // Star hover effect
    document.querySelectorAll('.star-label').forEach(label => {
        label.addEventListener('mouseenter', function() {
            const value = parseInt(this.getAttribute('for').replace('star', ''));
            document.querySelectorAll('.star-label').forEach((l, index) => {
                const labelValue = 5 - index;
                if (labelValue <= value) {
                    l.classList.add('active');
                } else {
                    l.classList.remove('active');
                }
            });
        });
    });
    
    document.querySelector('.star-input-group').addEventListener('mouseleave', function() {
        const checked = document.querySelector('.star-input:checked');
        if (checked) {
            const value = parseInt(checked.value);
            document.querySelectorAll('.star-label').forEach((l, index) => {
                const labelValue = 5 - index;
                l.classList.toggle('active', labelValue <= value);
            });
        } else {
            document.querySelectorAll('.star-label').forEach(l => l.classList.remove('active'));
        }
    });
    
    document.querySelectorAll('.star-input').forEach(input => {
        input.addEventListener('change', function() {
            const value = parseInt(this.value);
            document.querySelectorAll('.star-label').forEach((l, index) => {
                const labelValue = 5 - index;
                l.classList.toggle('active', labelValue <= value);
            });
        });
    });
</script>
@endif
@endsection
