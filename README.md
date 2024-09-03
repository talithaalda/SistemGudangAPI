# Sistem Gudang

**Sistem Gudang** adalah proyek API berbasis Laravel (minimal versi 10) untuk mengelola data user, barang, dan mutasi dengan fitur autentikasi dan operasi CRUD. API ini dirancang untuk mengelola data sistem gudang dan mutasi gudang.

## 📋 Fitur Utama

1. **Manajemen User**: Menyimpan data user yang mencakup nama, email, password, posisi, status, dan gender.
2. **Manajemen Barang**: Menyimpan informasi barang seperti nama_barang, kode, kategori, jumlah, kondisi, merk, lokasi.
3. **Manajemen Mutasi**: Mencatat mutasi barang dengan informasi seperti tanggal, jenis_mutasi, jumlah.
4. **Relasi**: Mutasi memiliki relasi dengan tabel User dan Barang.
5. **Autentikasi**: Menggunakan Bearer Token untuk mengamankan semua endpoint API.
6. **Operasi CRUD**: Mendukung operasi CRUD untuk User, Barang, dan Mutasi.
7. **History Mutasi**: Menampilkan riwayat mutasi untuk setiap Barang dan User.
8. **Output Data**: Semua data di-output dalam format JSON.

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
   git clone https://github.com/username-anda/sistem-gudang.git
   cd sistem-gudang
