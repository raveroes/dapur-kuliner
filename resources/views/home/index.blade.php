@extends('layouts.app')

@section('title', 'Home - DAPUR KULINER')

@section('styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        background: #0a0a0a;
        color: #ffffff;
        overflow-x: hidden;
    }
    
    /* Hero Section */
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background: url('/assets/bg_mainmenu.jpg') center/cover no-repeat;
        padding: 2rem 0;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 0;
    }
    
    .hero-content {
        position: relative;
        z-index: 1;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 2rem;
    }
    
    .hero-text {
        max-width: 600px;
        margin-left: 5%;
    }
    
    .hero-heading {
        font-family: 'Nomark', sans-serif;
        font-size: 4.5rem;
        color: #D4AF37;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
        color: #ffffff;
        margin-bottom: 2rem;
        line-height: 1.6;
    }
    
    .btn-contact {
        background: transparent;
        border: 2px solid #D4AF37;
        color: #ffffff;
        padding: 1rem 2.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }
    
    .btn-contact:hover {
        background: #D4AF37;
        color: #0a0a0a;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
    }
    
    /* Decorative Leaves */
    .leaf-decoration {
        position: absolute;
        z-index: 1;
        pointer-events: none;
    }
    
    .leaf-decoration img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    
    .leaf-bottom-left {
        bottom: -80px;
        left: -80px;
        width: 400px;
        height: 400px;
    }
    
    .leaf-bottom-right {
        bottom: -80px;
        right: -80px;
        width: 400px;
        height: 400px;
        transform: scaleX(-1);
    }
    
    /* Category Section */
    .category-section {
        background: #0a0a0a;
        padding: 6rem 2rem;
        position: relative;
    }
    
    .category-title {
        font-family: 'Nomark', sans-serif;
        font-size: 3rem;
        color: #ffffff;
        text-align: center;
        margin-bottom: 4rem;
    }
    
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .category-card {
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .category-card:hover {
        transform: translateY(-10px);
        border-color: #D4AF37;
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.2);
        text-decoration: none;
        color: #ffffff;
    }
    
    .category-icon {
        width: 120px;
        height: 120px;
        margin: 0 auto 1.5rem;
        display: block;
        object-fit: contain;
    }
    
    .category-name {
        font-size: 1.3rem;
        font-weight: 600;
        color: #ffffff;
    }
    
    .leaf-top-left {
        top: -80px;
        left: -80px;
        width: 400px;
        height: 400px;
        transform: rotate(180deg);
    }
    
    .leaf-top-right {
        top: -80px;
        right: -80px;
        width: 400px;
        height: 400px;
        transform: rotate(180deg) scaleX(-1);
    }
    
    /* Follow Along Section */
    .follow-section {
        background: #0a0a0a;
        padding: 6rem 2rem;
        text-align: center;
    }
    
    .follow-title {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 0.5rem;
        text-transform: lowercase;
    }
    
    .follow-handle {
        font-family: 'Nomark', sans-serif;
        font-size: 3rem;
        color: #D4AF37;
        margin-bottom: 3rem;
    }
    
    .follow-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .follow-image {
        width: 100%;
        aspect-ratio: 1;
        object-fit: cover;
        border-radius: 15px;
        transition: transform 0.3s ease;
    }
    
    .follow-image:hover {
        transform: scale(1.05);
    }
    
    /* Footer */
    .footer-section {
        background: #0a0a0a;
        padding: 4rem 2rem 2rem;
        position: relative;
    }
    
    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
        margin-bottom: 2rem;
    }
    
    .footer-logo {
        font-family: 'Nomark', sans-serif;
        font-size: 1.8rem;
        line-height: 1.2;
    }
    
    .footer-links {
        list-style: none;
        padding: 0;
    }
    
    .footer-links li {
        margin-bottom: 0.8rem;
    }
    
    .footer-links a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
        font-size: 0.95rem;
    }
    
    .footer-links a:hover {
        color: #D4AF37;
    }
    
    .footer-social {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .social-icon:hover {
        color: #D4AF37;
        transform: scale(1.2);
    }
    
    .footer-copyright {
        text-align: right;
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.85rem;
    }
    
    .leaf-footer-left {
        bottom: -80px;
        left: -105px;
        width: 400px;
        height: 400px;
        transform: rotate(95deg);
    }
    
    @media (max-width: 768px) {
        .hero-heading {
            font-size: 2.5rem;
        }
        
        .hero-text {
            margin-left: 0;
        }
        
        .category-title {
            font-size: 2rem;
        }
        
        .follow-handle {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="leaf-decoration leaf-bottom-left">
        <img src="{{ asset('assets/daun.png') }}" alt="Leaf decoration">
    </div>
    <div class="leaf-decoration leaf-bottom-right">
        <img src="{{ asset('assets/daun.png') }}" alt="Leaf decoration">
    </div>
    
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-heading">Bingung Mau Makan Apa?</h1>
            <p class="hero-subtitle">
                Intip daftar menu dan harga Dapur Kuliner di sini. Dijamin bikin lapar!
            </p>
            <a href="{{ route('contact') }}" class="btn-contact">CONTACT US</a>
        </div>
    </div>
</section>

<!-- Category Section -->
<section class="category-section">
    <div class="leaf-decoration leaf-top-left">
        <img src="{{ asset('assets/daun.png') }}" alt="Leaf decoration">
    </div>
    <div class="leaf-decoration leaf-top-right">
        <img src="{{ asset('assets/daun.png') }}" alt="Leaf decoration">
    </div>
    
    <h2 class="category-title">Jelajahi Berdasarkan Kategori</h2>
    
    <div class="category-grid">
        <a href="{{ route('makanan-berat') }}" class="category-card">
            <img src="{{ asset('assets/icon_makananberat.png') }}" alt="Makanan Berat" class="category-icon">
            <h3 class="category-name">Makanan Berat</h3>
        </a>
        
        <a href="{{ route('jajanan') }}" class="category-card">
            <img src="{{ asset('assets/icon_jajanan.png') }}" alt="Jajanan" class="category-icon">
            <h3 class="category-name">Jajanan</h3>
        </a>
        
        <a href="{{ route('minuman') }}" class="category-card">
            <img src="{{ asset('assets/icon_minuman.png') }}" alt="Minuman" class="category-icon">
            <h3 class="category-name">Minuman</h3>
        </a>
        
        <a href="{{ route('frozen-food') }}" class="category-card">
            <img src="{{ asset('assets/icon_forzenfood.png') }}" alt="Frozen Food" class="category-icon">
            <h3 class="category-name">Frozen Food</h3>
        </a>
    </div>
</section>

<!-- Follow Along Section -->
<section class="follow-section">
    <p class="follow-title">follow along</p>
    <h2 class="follow-handle">@DAPURKULINER</h2>
    
    <div class="follow-grid">
        <img src="{{ asset('assets/1.jpg') }}" alt="Food 1" class="follow-image">
        <img src="{{ asset('assets/2.jpg') }}" alt="Food 2" class="follow-image">
        <img src="{{ asset('assets/3.jpg') }}" alt="Food 3" class="follow-image">
    </div>
</section>

<!-- Footer -->
<footer class="footer-section">
    <div class="leaf-decoration leaf-footer-left">
        <img src="{{ asset('assets/daun.png') }}" alt="Leaf decoration">
    </div>
    
    <div class="footer-content">
        <div>
            <div class="footer-logo">
                <span class="logo-dapur">DAPUR</span><br>
                <span class="logo-kuliner">KULINER</span>
            </div>
        </div>
        
        <div>
            <ul class="footer-links">
                <li><a href="{{ route('makanan-berat') }}">OUR LIST</a></li>
                <li><a href="{{ route('about') }}">ABOUT US</a></li>
                <li><a href="{{ route('contact') }}">CONTACT</a></li>
            </ul>
        </div>
        
        <div>
            <div class="footer-social">
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="social-icon"><i class="fas fa-globe"></i></a>
            </div>
        </div>
        
        <div>
            <p class="footer-copyright">
                Copyright Dapurkuliner All Right Reserved<br>
                Terms of Use
            </p>
        </div>
    </div>
</footer>
@endsection
