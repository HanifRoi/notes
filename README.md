# 📝 Notes Diary App

Aplikasi web pencatatan harian (Diary/Notes) yang dibangun menggunakan framework Laravel. Aplikasi ini memungkinkan pengguna untuk mendaftar, login, dan mengelola catatan pribadi mereka dengan aman.

## Tujuan & Kegunaan Project
Project ini dibuat sebagai bahan pembelajaran pribadi. Aplikasi ini berfokus pada keamanan data (setiap pengguna hanya bisa melihat dan mengedit catatan miliknya sendiri) serta antarmuka pengguna yang bersih dan modern.

## Fitur Utama
- **Autentikasi Pengguna:** Fitur Register, Login, dan Logout yang dibangun secara kustom dengan enkripsi password yang aman.
- **CRUD Catatan (Create, Read, Update, Delete):** Pengguna dapat membuat, membaca, mengedit, dan menghapus catatan harian mereka.
- **Otorisasi Keamanan:** Middleware dan pengecekan otorisasi memastikan pengguna tidak dapat mengakses atau memodifikasi catatan milik pengguna lain.
- **Validasi Form:** Menggunakan Laravel Form Requests untuk memastikan input dari pengguna valid sebelum masuk ke database.
- **Automated Testing:** Dilengkapi dengan *Feature Tests* untuk menguji fungsionalitas Autentikasi dan CRUD menggunakan PHPUnit.
- **Desain Responsif:** Menggunakan Tailwind CSS untuk antarmuka yang modern dan responsif di berbagai ukuran layar.

## Teknologi yang Digunakan (Tech Stack)
- **Backend:** [Laravel 10](https://laravel.com/) (PHP 8.1)
- **Database:** MySQL
- **Frontend:** [Tailwind CSS v4](https://tailwindcss.com/)
- **Bundler:** Vite
- **Testing:** PHPUnit

## Cara Menjalankan Project Secara Lokal

Jika kamu ingin menjalankan project ini di komputermu sendiri, ikuti langkah-langkah berikut:

1. **Clone repository dan masuk ke direktori:**
   ```bash
   git clone https://github.com/HanifRoi/notes.git
   cd notes
   ```

2. **Install dependensi PHP dan Node.js:**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment file:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Jangan lupa untuk menyesuaikan konfigurasi database di dalam file `.env` kamu.*

4. **Jalankan migrasi database beserta seeder:**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan aplikasi:**
   * **Terminal 1 (Frontend):**
     ```bash
     npm run dev
     ```
   * **Terminal 2 (Backend):**
     ```bash
     php artisan serve
     ```

### Menjalankan Pengujian (Testing)
Untuk memastikan semua fitur berjalan dengan baik dan lulus uji otorisasi, kamu bisa menjalankan perintah:
```bash
php artisan test
```
