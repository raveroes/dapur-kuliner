@extends('layouts.app')

@section('title', 'Contact Us - DAPUR KULINER')

@section('styles')
<style>
    body {
        background: #0a0a0a;
        color: #ffffff;
        overflow-x: hidden;
    }
    
    .contact-container {
        min-height: 100vh;
        padding: 6rem 2rem 4rem;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .contact-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/assets/bg_aboutus.jpg') center/cover;
        filter: blur(8px) brightness(0.3);
        z-index: 0;
    }
    
    .contact-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
        width: 100%;
        text-align: center;
    }
    
    .contact-header {
        margin-bottom: 3rem;
    }
    
    .contact-greeting {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 1rem;
        font-family: 'Poppins', sans-serif;
    }
    
    .contact-logo {
        font-family: 'Nomark', sans-serif;
        font-size: 3.5rem;
        line-height: 1.2;
        margin-bottom: 2rem;
    }
    
    .contact-message {
        max-width: 600px;
        margin: 0 auto 3rem;
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
    
    .contact-details-container {
        background: rgba(30, 30, 30, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 3rem;
        margin-bottom: 3rem;
    }
    
    .contact-item {
        background: rgba(20, 20, 20, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 1.5rem 2rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .contact-item:last-child {
        margin-bottom: 0;
    }
    
    .contact-item:hover {
        border-color: #D4AF37;
        transform: translateX(5px);
    }
    
    .contact-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(212, 175, 55, 0.2);
        border-radius: 12px;
        color: #D4AF37;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    
    .contact-info {
        flex: 1;
        text-align: left;
    }
    
    .contact-label {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 0.3rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: 'Poppins', sans-serif;
    }
    
    .contact-value {
        font-size: 1.1rem;
        color: #ffffff;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
    }
    
    .contact-link {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .contact-link:hover {
        color: #D4AF37;
    }
    
    .btn-back {
        text-align: center;
        margin-top: 2rem;
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
<div class="contact-container">
    <div class="contact-background"></div>
    
    <div class="contact-content">
        <div class="contact-header">
            <p class="contact-greeting">Halo!, kami dari</p>
            <div class="contact-logo">
                <span class="logo-dapur">DAPUR</span><br>
                <span class="logo-kuliner">KULINER</span>
            </div>
            <div class="divider"></div>
            <p class="contact-message">
                Kamu bisa menghubungi kontak di bawah ini ya jika ada kendala, pertanyaan, dan sebagainya.
            </p>
        </div>
        
        <div class="contact-details-container">
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div class="contact-info">
                    <div class="contact-label">WhatsApp</div>
                    <a href="https://wa.me/6282385630712" target="_blank" class="contact-value contact-link">
                        082385630712
                    </a>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-info">
                    <div class="contact-label">Email</div>
                    <a href="mailto:dapurkuliner.id@gmail.com" class="contact-value contact-link">
                        dapurkuliner.id@gmail.com
                    </a>
                </div>
            </div>
        </div>
        
        <div class="btn-back">
            <a href="{{ route('home') }}" class="btn-back-link">yuk, lihat lagi</a>
        </div>
    </div>
</div>
@endsection

