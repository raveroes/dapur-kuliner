@extends('layouts.app')

@section('title', 'Login - DAPUR KULINER')

@section('styles')
<style>
    body {
        background: #0a0a0a;
        overflow-x: hidden;
    }
    
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 2rem;
    }
    
    .login-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/assets/bg_daftar_akun.jpg') center/cover;
        filter: blur(8px) brightness(0.3);
        z-index: 0;
    }
    
    .login-content {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 450px;
        margin-top: 100px;
    }
    
    .logo-text {
        font-family: 'Nomark', sans-serif;
    }
    
    .logo-dapur {
        color: #ffffff;
    }
    
    .logo-kuliner {
        color: #D4AF37;
    }
    
    .login-form {
        background: rgba(30, 30, 30, 0.7);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 3rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .form-label {
        color: #ffffff;
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }
    
    .form-control {
        background: rgba(20, 20, 20, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        color: #ffffff;
        padding: 0.85rem 1.2rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        background: rgba(20, 20, 20, 0.8);
        border-color: #D4AF37;
        color: #ffffff;
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }
    
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .btn-login {
        background: #2a2a2a;
        border: none;
        border-radius: 12px;
        color: #ffffff;
        padding: 0.85rem;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }
    
    .btn-login:hover {
        background: #3a3a3a;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .register-link {
        text-align: center;
        margin-top: 1.5rem;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
    }
    
    .register-link a {
        color: #D4AF37;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    
    .register-link a:hover {
        color: #F4CF47;
    }
    
    .alert-danger {
        background: rgba(220, 53, 69, 0.2);
        border: 1px solid rgba(220, 53, 69, 0.5);
        border-radius: 12px;
        color: #ff6b6b;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 1.2rem;
    }
</style>
@endsection

@section('content')
<div class="login-container">
    <div class="login-background"></div>
    <div class="login-content" style="position: relative; z-index: 2;">
        <div style="position: absolute; top: -80px; left: 0; z-index: 3;">
            <a href="{{ route('home') }}" class="logo-text" style="font-size: 1.8rem; text-decoration: none; display: block;">
                <span class="logo-dapur">DAPUR</span><br>
                <span class="logo-kuliner">KULINER</span>
            </a>
        </div>
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            <div class="mb-4">
                <label for="email" class="form-label">Nama / E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan nama atau email" required autofocus>
                        </div>
            
            <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
            
            <button type="submit" class="btn btn-login">Masuk</button>
            
            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </div>
        </form>
    </div>
</div>
@endsection
