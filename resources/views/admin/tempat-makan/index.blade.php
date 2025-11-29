@extends('layouts.app')

@section('title', 'Kelola Tempat Makan - DAPUR KULINER')

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
    
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .admin-title {
        font-family: 'Nomark', sans-serif;
        font-size: 3rem;
        color: #D4AF37;
        margin: 0;
    }
    
    .btn-add {
        background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
        color: #ffffff;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(74, 144, 226, 0.3);
        color: #ffffff;
    }
    
    .table-container {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 2rem;
        overflow-x: auto;
    }
    
    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        color: #ffffff;
    }
    
    .custom-table thead {
        background: rgba(212, 175, 55, 0.1);
    }
    
    .custom-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #D4AF37;
        border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .custom-table td {
        padding: 1.25rem 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .custom-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .custom-table tbody tr:hover {
        background: rgba(212, 175, 55, 0.05);
    }
    
    .custom-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .badge-category {
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }
    
    .badge-makananberat {
        background: rgba(74, 144, 226, 0.2);
        color: #4A90E2;
        border: 1px solid rgba(74, 144, 226, 0.3);
    }
    
    .badge-jajanan {
        background: rgba(255, 193, 7, 0.2);
        color: #FFC107;
        border: 1px solid rgba(255, 193, 7, 0.3);
    }
    
    .badge-minuman {
        background: rgba(80, 200, 120, 0.2);
        color: #50C878;
        border: 1px solid rgba(80, 200, 120, 0.3);
    }
    
    .badge-frozen_food {
        background: rgba(147, 112, 219, 0.2);
        color: #9370DB;
        border: 1px solid rgba(147, 112, 219, 0.3);
    }
    
    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
    }
    
    .btn-edit {
        background: rgba(212, 175, 55, 0.2);
        color: #D4AF37;
        border: 1px solid rgba(212, 175, 55, 0.3);
    }
    
    .btn-edit:hover {
        background: rgba(212, 175, 55, 0.3);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.2);
        color: #D4AF37;
    }
    
    .btn-delete {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.3);
    }
    
    .btn-delete:hover {
        background: rgba(220, 53, 69, 0.3);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
        color: #dc3545;
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
    
    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }
    
    .pagination {
        display: flex;
        gap: 0.5rem;
        list-style: none;
        padding: 0;
    }
    
    .pagination li a,
    .pagination li span {
        padding: 0.5rem 1rem;
        background: rgba(30, 30, 30, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .pagination li.active span {
        background: #D4AF37;
        border-color: #D4AF37;
        color: #0a0a0a;
    }
    
    .pagination li a:hover {
        background: rgba(212, 175, 55, 0.2);
        border-color: #D4AF37;
        color: #D4AF37;
    }
    
    .btn-back {
        margin-top: 2rem;
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
        padding: 0.75rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }
    
    .btn-back:hover {
        background: rgba(212, 175, 55, 0.2);
        border-color: #D4AF37;
        color: #D4AF37;
    }
    
    @media (max-width: 768px) {
        .admin-title {
            font-size: 2rem;
        }
        
        .admin-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .table-container {
            padding: 1rem;
        }
        
        .custom-table {
            font-size: 0.85rem;
        }
        
        .custom-table th,
        .custom-table td {
            padding: 0.75rem 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="admin-container">
    <div class="admin-content">
        <div class="admin-header">
            <h1 class="admin-title">Kelola Tempat Makan</h1>
            <a href="{{ route('admin.tempat-makan.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Tempat Makan
            </a>
        </div>

        <div class="table-container">
            @if($tempatMakan->count() > 0)
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Tempat</th>
                            <th>Alamat</th>
                            <th>Kategori</th>
                            <th>Jumlah Menu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tempatMakan as $tempat)
                            <tr>
                                <td>{{ $tempat->idTempat }}</td>
                                <td><strong>{{ $tempat->namaTempat }}</strong></td>
                                <td>{{ \Illuminate\Support\Str::limit($tempat->alamat, 50) }}</td>
                                <td>
                                    <span class="badge-category badge-{{ $tempat->kategori }}">
                                        {{ ucfirst(str_replace('_', ' ', $tempat->kategori)) }}
                                    </span>
                                </td>
                                <td>{{ $tempat->makanan_count }}</td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                        <a href="{{ route('admin.tempat-makan.edit', $tempat->idTempat) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.tempat-makan.destroy', $tempat->idTempat) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tempat makan ini?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($tempatMakan->hasPages())
                    <div class="pagination-wrapper">
                        {{ $tempatMakan->links() }}
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <p>Tidak ada data tempat makan</p>
                </div>
            @endif
        </div>

        <a href="{{ route('admin.dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
