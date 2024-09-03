# Sistem Gudang

**Sistem Gudang** adalah proyek API berbasis Laravel (minimal versi 10) untuk mengelola data user, barang, dan mutasi dengan fitur autentikasi dan operasi CRUD. API ini dirancang untuk mengelola data sistem gudang dan mutasi gudang.

## 📋 Fitur Utama

1. **Manajemen User**: Menyimpan data user yang mencakup nama, email, password, posisi, status, dan gender.
2. **Manajemen Barang**: Menyimpan informasi barang seperti nama_barang, kode, kategori, jumlah, kondisi, merk, lokasi.
3. **Manajemen Mutasi**: Mencatat mutasi barang dengan informasi seperti tanggal, jenis_mutasi, jumlah.
7. **History Mutasi**: Menampilkan riwayat mutasi untuk setiap Barang dan User.

## 🚀 Instalasi dan Menjalankan Proyek

### Prasyarat

Pastikan Anda telah menginstal alat-alat berikut di mesin Anda:

- **PHP** (Versi 8.0 atau lebih tinggi)
- **Composer**
- **Docker** dan **Docker Compose**

### Langkah-Langkah Instalasi

1. **Clone Repository**

   Clone repository ini ke mesin lokal Anda:

   ```bash
   git clone https://github.com/talithaalda/SistemGudangAPI.git
   cd SistemGudangAPI
   ```
2. **Install Dependensi**

   Jalankan perintah berikut untuk menginstal dependensi PHP menggunakan Composer:

   ```bash
   composer install
   ```
3. **Salin File Environment**

   Buat salinan dari file .env.example dan ubah namanya menjadi .env:

   ```bash
   cp .env.example .env
   ```
   Perbarui file .env dengan konfigurasi database berikut:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=sistemgudang
   DB_USERNAME=root
   DB_PASSWORD=
   ```
4. **Generate Application Key**

   Jalankan perintah berikut untuk menghasilkan application key:

   ```bash
   php artisan key:generate
   ```

5. **Setup Database**

   Jalankan migrasi database untuk membuat tabel yang diperlukan:

   ```bash
   php artisan migrate
   ```
6. **Seed Database**

   Jalankan perintah berikut untuk mengisi database dengan data awal:

   ```bash
   php artisan db:seed
   ```
7. **Jalankan Proyek Menggunakan Docker**

   Bangun dan jalankan kontainer Docker menggunakan Docker Compose:

   ```bash
   docker-compose up -d --build
   ```
   
 ## Akses Aplikasi

Setelah Anda berhasil menjalankan proyek menggunakan Docker, Anda dapat mengakses API dan phpMyAdmin melalui browser dengan informasi berikut:

### Akses API

- **URL API**: [http://localhost:8000](http://localhost:8000/)

### phpMyAdmin

- **URL phpMyAdmin**: [http://localhost:8081](http://localhost:8081)

Untuk mengakses phpMyAdmin, gunakan kredensial berikut:

- **Server**: `db`
- **Username**: `root`
- **Password**: (Kosongkan)

## 📜 Dokumentasi API

- **Link Postman** : `https://api.postman.com/collections/27175259-d84a65bd-1787-45cc-8cf7-b4b468025701?access_key=PMAT-01J6SN4163SS81Y8XPT0T2WV2T`
> **Note**: Lakukan endpoint register untuk membuat akun terlebih dahulu setelah itu login dan salin token ke Bearer token untuk dapat mengakses endpoint lainnya
