# Dapur Kuliner - Food Blog Application

Aplikasi web food blog yang dibangun menggunakan **Laravel 12** dengan database **SQL (MySQL/MariaDB)**. Aplikasi ini dihosting di **InfinityFree** dan menyediakan platform untuk berbagi informasi tentang tempat makan dan menu makanan dengan sistem rating.

## 🚀 Teknologi yang Digunakan

- **Framework**: Laravel 12
- **Database**: SQL (MySQL/MariaDB)
- **Hosting**: InfinityFree
- **PHP**: >= 8.2
- **Frontend**: Blade Templates dengan CSS custom

## ✨ Fitur Utama

### Untuk Pengguna (User)
- **Autentikasi**: Login dan registrasi akun
- **Profil Pengguna**: 
  - Update profil pengguna
  - Upload foto profil
- **Browse Makanan**: 
  - Lihat daftar makanan berdasarkan kategori
  - Detail makanan lengkap dengan informasi tempat makan
  - Pencarian makanan
- **Sistem Rating**: 
  - Berikan rating untuk makanan (1-5 bintang)
  - Lihat rating rata-rata dari pengguna lain
- **Kategori Makanan**:
  - Makanan Berat
  - Jajanan
  - Minuman
  - Frozen Food

### Untuk Admin
- **Dashboard Admin**: Panel kontrol untuk mengelola konten
- **CRUD Tempat Makan**:
  - Tambah tempat makan baru
  - Edit informasi tempat makan
  - Hapus tempat makan
  - Upload gambar tempat makan
- **CRUD Menu Makanan**:
  - Tambah menu makanan baru
  - Edit informasi menu makanan
  - Hapus menu makanan
  - Upload gambar makanan
  - Atur harga dan kategori
- **Manajemen Konten**: Kelola semua konten aplikasi dari satu tempat

## 📋 Requirements

- PHP >= 8.2
- Composer
- SQL Database (MySQL/MariaDB)
- Node.js & NPM (untuk asset compilation, opsional)
- Web Server (Apache/Nginx) - untuk production di InfinityFree

## 🔧 Installation

### 1. Clone Repository
```bash
git clone https://github.com/raveroes/dapur-kuliner.git
cd dapur-kuliner
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
```bash
copy .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 5. Jalankan Migrations
```bash
php artisan migrate
```

### 6. Seed Database (Admin User)
```bash
php artisan db:seed --class=AdminSeeder
```

### 7. Setup Storage Link
```bash
php artisan storage:link
```

### 8. Jalankan Development Server
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 🔐 Default Admin Credentials

- **Email**: admin@foodblog.com
- **Password**: admin123

> ⚠️ **Penting**: Ganti password default setelah login pertama kali!

## 📊 Struktur Database

### Tabel Users
- `id` (primary key)
- `username` (unique)
- `name`
- `email` (unique)
- `password`
- `role` (user/admin)
- `profile_picture` (nullable)
- `timestamps`

### Tabel Tempat Makan (tempat_makan)
- `idTempat` (primary key)
- `namaTempat`
- `alamat`
- `kategori`
- `deskripsi`
- `gambar`
- `timestamps`

### Tabel Makanan
- `idMakanan` (primary key)
- `idTempat` (foreign key ke tempat_makan)
- `namaMenu`
- `harga` (decimal)
- `deskripsi`
- `kategori`
- `gambar`
- `timestamps`

### Tabel Ratings
- `id` (primary key)
- `user_id` (foreign key ke users)
- `makanan_id` (foreign key ke makanan)
- `rating` (integer, 1-5)
- `timestamps`

## 🛣️ Routes

### Public Routes
- `/` - Halaman beranda
- `/about` - Halaman tentang kami
- `/contact` - Halaman kontak
- `/login` - Halaman login
- `/register` - Halaman registrasi
- `/makanan-berat` - Kategori makanan berat
- `/jajanan` - Kategori jajanan
- `/minuman` - Kategori minuman
- `/frozen-food` - Kategori frozen food
- `/makanan/{id}` - Detail makanan

### Authenticated Routes (User)
- `/profile` - Profil pengguna
- `/profile/update` - Update profil
- `/makanan/{id}/rating` - Berikan rating untuk makanan

### Admin Routes
- `/admin/dashboard` - Dashboard admin
- `/admin/tempat-makan` - Daftar tempat makan
- `/admin/tempat-makan/create` - Tambah tempat makan
- `/admin/tempat-makan/{id}/edit` - Edit tempat makan
- `/admin/makanan` - Daftar makanan
- `/admin/makanan/create` - Tambah makanan
- `/admin/makanan/{id}/edit` - Edit makanan

## 🌐 Deployment di InfinityFree

### Persiapan
1. Pastikan semua file sudah di-commit dan di-push ke GitHub
2. Buat database di InfinityFree Control Panel
3. Catat informasi database (host, username, password, database name)

### Upload ke InfinityFree
1. Login ke InfinityFree Control Panel
2. Upload semua file proyek ke folder `htdocs` atau folder public_html
3. Pastikan struktur folder Laravel tetap utuh

### Konfigurasi di InfinityFree
1. Edit file `.env` di server dengan konfigurasi database InfinityFree:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.infinityfreeapp.com

DB_CONNECTION=mysql
DB_HOST=sqlXXX.epizy.com
DB_PORT=3306
DB_DATABASE=epiz_XXXXXX_db
DB_USERNAME=epiz_XXXXXX
DB_PASSWORD=your_password
```

2. Set permission untuk folder storage:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

3. Jalankan migrations di server:
```bash
php artisan migrate --force
```

4. Buat symbolic link untuk storage:
```bash
php artisan storage:link
```

### Catatan Penting untuk InfinityFree
- Pastikan `APP_DEBUG=false` di production
- File `.env` harus dikonfigurasi dengan benar
- Folder `storage` dan `bootstrap/cache` harus writable
- Pastikan PHP version >= 8.2 di InfinityFree

## 📁 Struktur Proyek

```
dapur-kuliner/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── HomeController.php
│   │   │   ├── RatingController.php
│   │   │   └── Admin/
│   │   │       └── AdminController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── TempatMakan.php
│   │   ├── Makanan.php
│   │   └── Rating.php
│   └── Providers/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── AdminSeeder.php
├── public/
│   ├── assets/
│   └── storage/
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   ├── auth/
│   │   ├── home/
│   │   └── layouts/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
└── storage/
```

## 🛠️ Development

### Menjalankan Tests
```bash
php artisan test
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

## 📝 Notes

- Pastikan folder `storage/app/public` memiliki permission yang sesuai
- Pastikan folder `public/assets` berisi semua file assets (gambar, font, dll)
- Untuk production, selalu set `APP_DEBUG=false` di file `.env`
- Backup database secara berkala
- Gunakan HTTPS di production (InfinityFree menyediakan SSL gratis)

## 📄 License

Proyek ini menggunakan [MIT License](https://opensource.org/licenses/MIT).

## 👤 Author

**Raveroes**
- GitHub: [@raveroes](https://github.com/raveroes)

## 🙏 Acknowledgments

- Laravel Framework
- InfinityFree untuk hosting gratis
- Semua kontributor dan pengguna aplikasi ini

---

**Dibuat dengan ❤️ menggunakan Laravel**
