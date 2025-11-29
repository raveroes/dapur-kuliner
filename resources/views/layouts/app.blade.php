<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DAPUR KULINER')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #0a0a0a;
            color: #ffffff;
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
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .category-card {
            cursor: pointer;
            text-align: center;
            padding: 2rem;
        }
        .category-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
    </style>
    @yield('styles')
</head>
<body>
    @if(!in_array(request()->route()->getName(), ['login', 'register', 'profile']))
    @php
        $isListPage = in_array(request()->route()->getName(), ['makanan-berat', 'jajanan', 'minuman', 'frozen-food', 'makanan.show']);
        $isHomePage = request()->route()->getName() == 'home';
    @endphp
    <nav class="navbar navbar-expand-lg navbar-dark {{ $isListPage ? 'navbar-list' : '' }}" 
         style="{{ $isHomePage ? 'background: transparent; position: absolute; top: 0; left: 0; right: 0; z-index: 1000;' : 'background: #0a0a0a; position: relative;' }} padding: 1.5rem 0; z-index: 1000;">
        <div class="container">
            <a class="navbar-brand logo-text" href="{{ route('home') }}" style="font-size: 1.8rem; text-decoration: none; line-height: 1.2;">
                <span class="logo-dapur">DAPUR</span><br>
                <span class="logo-kuliner">KULINER</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border-color: rgba(255,255,255,0.5);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" style="color: #ffffff; font-weight: 500;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}" style="color: #ffffff; font-weight: 500;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('makanan-berat') }}" style="color: #ffffff; font-weight: 500;">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}" style="color: #ffffff; font-weight: 500;">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ route('profile') }}" class="btn" style="border: 2px solid #D4AF37; color: #ffffff; padding: 0.5rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; margin-right: 1rem;">Profile</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn" style="border: 2px solid #D4AF37; color: #ffffff; padding: 0.5rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; margin-right: 1rem;">Admin</a>
                        @endif
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                            <button type="submit" class="btn" style="border: 2px solid #D4AF37; color: #ffffff; padding: 0.5rem 1.5rem; border-radius: 8px; background: transparent; font-weight: 600;">Logout</button>
                            </form>
                    @else
                        <a href="{{ route('login') }}" class="btn" style="border: 2px solid #D4AF37; color: #ffffff; padding: 0.5rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600;">Daftar/Masuk</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    @endif

    <main>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>

