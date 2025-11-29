# Food Blog - Laravel Application

Aplikasi web food blog yang dibangun menggunakan Laravel dengan fitur CRUD untuk admin.

## Fitur

- **User Authentication**: Login dan registrasi untuk user
- **Role-based Access**: Admin dan User dengan akses berbeda
- **CRUD Operations**: Admin dapat melakukan Create, Read, Update, Delete untuk:
  - Tempat Makan
  - Menu Makanan
- **Kategori Makanan**: 
  - Makanan Berat
  - Jajanan
  - Minuman
  - Frozen Food
- **Search Functionality**: Pencarian makanan berdasarkan nama

## Requirements

- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM (untuk asset compilation)

## Installation

1. Clone atau extract project ke folder yang diinginkan

2. Install dependencies:
```bash
composer install
```

3. Copy file `.env.example` menjadi `.env`:
```bash
copy .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=food_blog
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan migrations:
```bash
php artisan migrate
```

7. Jalankan seeder untuk membuat admin user:
```bash
php artisan db:seed --class=AdminSeeder
```

8. Buat symbolic link untuk storage:
```bash
php artisan storage:link
```

9. Copy assets dari folder `../assets` ke `public/assets`:
   - Salin semua file dari folder `assets` ke `public/assets`

10. Jalankan development server:
```bash
php artisan serve
```

## Default Admin Credentials

- **Email**: admin@foodblog.com
- **Password**: admin123

## Struktur Database

### Users
- id (primary key)
- username (unique)
- name
- email (unique)
- password
- role (user/admin)
- timestamps

### Tempat Makan
- idTempat (primary key)
- namaTempat
- alamat
- kategori
- deskripsi
- gambar
- timestamps

### Makanan
- idMakanan (primary key)
- idTempat (foreign key)
- namaMenu
- harga
- deskripsi
- kategori
- gambar
- timestamps

## Routes

### Public Routes
- `/` - Home page
- `/about` - About us page
- `/login` - Login page
- `/register` - Registration page
- `/makanan-berat` - Makanan berat category
- `/jajanan` - Jajanan category
- `/minuman` - Minuman category
- `/frozen-food` - Frozen food category
- `/makanan/{id}` - Detail makanan

### Authenticated Routes
- `/profile` - User profile

### Admin Routes
- `/admin/dashboard` - Admin dashboard
- `/admin/tempat-makan` - List tempat makan
- `/admin/tempat-makan/create` - Create tempat makan
- `/admin/tempat-makan/{id}/edit` - Edit tempat makan
- `/admin/makanan` - List makanan
- `/admin/makanan/create` - Create makanan
- `/admin/makanan/{id}/edit` - Edit makanan

## Notes

- Pastikan folder `storage/app/public` memiliki permission yang sesuai
- Pastikan folder `public/assets` berisi semua file assets
- Untuk production, pastikan `APP_DEBUG=false` di file `.env`
