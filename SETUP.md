# Setup Instructions

## Langkah-langkah Setup

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Setup Environment**
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```

3. **Konfigurasi Database**
   Edit file `.env` dan sesuaikan konfigurasi database:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=food_blog
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Jalankan Migrations**
   ```bash
   php artisan migrate
   ```

5. **Jalankan Seeder untuk Admin**
   ```bash
   php artisan db:seed --class=AdminSeeder
   ```

6. **Buat Storage Link**
   ```bash
   php artisan storage:link
   ```

7. **Copy Assets**
   Salin semua file dari folder `../assets` ke `public/assets`:
   
   **Windows PowerShell:**
   ```powershell
   New-Item -ItemType Directory -Force -Path "public\assets"
   Copy-Item -Path "..\assets\*" -Destination "public\assets\" -Recurse -Force
   ```
   
   **Windows CMD:**
   ```cmd
   mkdir public\assets
   xcopy /E /I /Y ..\assets public\assets
   ```
   
   **Linux/Mac:**
   ```bash
   mkdir -p public/assets
   cp -r ../assets/* public/assets/
   ```

8. **Jalankan Server**
   ```bash
   php artisan serve
   ```

9. **Akses Aplikasi**
   - Buka browser: http://localhost:8000
   - Login sebagai admin:
     - Email: admin@foodblog.com
     - Password: admin123

## Struktur Folder Assets

Pastikan folder `public/assets` berisi:
- bg_aboutus.jpg
- bg_acc_profile.png
- bg_daftar_akun.jpg
- bg_mainmenu.jpg
- icon_forzenfood.png
- icon_jajanan.png
- icon_makananberat.png
- icon_minuman.png
- ref.jpg

## Troubleshooting

### Error: Storage link tidak berfungsi
Pastikan folder `storage/app/public` ada dan memiliki permission yang sesuai.

### Error: Assets tidak muncul
Pastikan semua file assets sudah di-copy ke folder `public/assets`.

### Error: Database connection failed
Pastikan MySQL service berjalan dan konfigurasi database di `.env` sudah benar.

