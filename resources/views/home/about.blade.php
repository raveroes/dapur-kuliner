@extends('layouts.app')

@section('title', 'About Us - DAPUR KULINER')

@section('styles')
<style>
    body {
        background: #0a0a0a;
        color: #ffffff;
        overflow-x: hidden;
    }
    
    .about-container {
        min-height: 100vh;
        padding: 6rem 2rem 4rem;
        position: relative;
    }
    
    .about-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/assets/bg_aboutus.jpg') center/cover;
        filter: blur(8px) brightness(0.3);
        z-index: 0;
    }
    
    .about-content-wrapper {
        position: relative;
        z-index: 1;
    }
    
    .about-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .about-greeting {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 1rem;
        font-family: 'Poppins', sans-serif;
    }
    
    .about-logo {
        font-family: 'Nomark', sans-serif;
        font-size: 3.5rem;
        line-height: 1.2;
        margin-bottom: 2rem;
    }
    
    .about-intro {
        max-width: 800px;
        margin: 0 auto 2rem;
        text-align: center;
        color: #ffffff;
        font-size: 1.1rem;
        line-height: 1.8;
        font-family: 'Poppins', sans-serif;
    }
    
    .divider {
        width: 200px;
        height: 2px;
        background: #D4AF37;
        margin: 2rem auto;
    }
    
    .content-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-top: 3rem;
    }
    
    @media (max-width: 968px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .content-left {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }
    
    .content-box {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 2.5rem;
        color: #ffffff;
    }
    
    .content-box-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
    }
    
    .content-box-text {
        font-size: 1rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.9);
        font-family: 'Poppins', sans-serif;
    }
    
    .content-right {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 2.5rem;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    
    .team-text {
        font-size: 1rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.9);
        font-family: 'Poppins', sans-serif;
    }
    
    .btn-back {
        text-align: center;
        margin-top: 4rem;
    }
    
    .btn-back-link {
        background: rgba(30, 30, 30, 0.8);
        border: 2px solid #D4AF37;
        color: #ffffff;
        padding: 1rem 2.5rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-block;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }
    
    .btn-back-link:hover {
        background: #D4AF37;
        color: #0a0a0a;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
    }
</style>
@endsection

@section('content')
<div class="about-container">
    <div class="about-background"></div>
    
    <div class="about-content-wrapper">
        <div class="about-header">
            <p class="about-greeting">Halo!, kami dari</p>
            <div class="about-logo">
                <span class="logo-dapur">DAPUR</span><br>
                <span class="logo-kuliner">KULINER</span>
            </div>
            <p class="about-intro">
                Kami menghadirkan informasi menarik seputar UMKM makanan untuk mengenalkan beragam cita rasa dan kelezatan kuliner lokal.
            </p>
            <div class="divider"></div>
        </div>
        
        <div class="content-grid">
            <div class="content-left">
                <div class="content-box">
                    <h3 class="content-box-title">Latar Belakang</h3>
                    <p class="content-box-text">
                        Website ini kami buat bertujuan untuk mempermudah masyarakat mengenal berbagai UMKM makanan lokal yang ada di Indonesia. Melalui website ini, pengunjung dapat mengetahui informasi seputar produk kuliner yang dijual oleh pelaku UMKM. Tujuannya agar usaha kecil di bidang makanan dapat lebih dikenal luas dan mendapat dukungan dari masyarakat melalui promosi digital yang sederhana namun efektif.
                    </p>
                </div>
                
                <div class="content-box">
                    <h3 class="content-box-title">Visi Misi</h3>
                    <p class="content-box-text">
                        Tujuan kami membuat Website informasi ini yaitu untuk membantu pelaku UMKM memperluas promosi secara digital dan memudahkan masyarakat menemukan kuliner khas daerah.
                    </p>
                </div>
            </div>
            
            <div class="content-right">
                <p class="team-text">
                    Website ini dikembangkan oleh tim EVO LECI sebagai bagian dari project tugas kuliah.
                </p>
            </div>
        </div>
        
        <div class="btn-back">
            <a href="{{ route('home') }}" class="btn-back-link">yuk, lihat lagi</a>
        </div>
    </div>
</div>
@endsection
