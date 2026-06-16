# 🛒 Sistem Informasi Penjualan Online

Aplikasi penjualan online berbasis **PHP Native** dan **MySQL** yang dikembangkan sebagai proyek akhir mata kuliah **Praktikum Pemrograman Web**.

Sistem ini mengimplementasikan fitur autentikasi menggunakan **Session** dan **Cookies**, manajemen produk, keranjang belanja, checkout, serta dashboard admin untuk pengelolaan data.

> **Status:** 🚧 In Development (Academic Project)

---

## 📖 About This Project

Proyek ini dibuat untuk mengimplementasikan berbagai konsep pengembangan aplikasi web yang telah dipelajari selama perkuliahan, antara lain:

* PHP Native
* MySQL Database
* CRUD (Create, Read, Update, Delete)
* Session Management
* Cookies Management
* Authentication & Authorization
* Form Validation
* Relational Database Design
* Git & GitHub Collaboration

Sistem memungkinkan pengguna melakukan pembelian produk secara online, sementara admin dapat mengelola produk, kategori, dan pesanan melalui dashboard admin.

---

## ✨ Features

### User Features

* Registrasi akun
* Login & Logout
* Remember Me menggunakan Cookies
* Melihat daftar produk
* Melihat detail produk
* Menambahkan produk ke keranjang
* Checkout pesanan
* Melihat riwayat pesanan

### Admin Features

* Dashboard Admin
* CRUD Produk
* CRUD Kategori
* Manajemen Pesanan
* Monitoring Transaksi

### Security Features

* Session-Based Authentication
* Role-Based Authorization
* Cookie Implementation
* Input Validation
* Session Protection

---

## 🛠 Tech Stack

### Backend

* PHP Native

### Frontend

* HTML5
* CSS3
* JavaScript
* Bootstrap 5

### Database

* MySQL / MariaDB

### Development Tools

* Visual Studio Code
* Git
* GitHub
* XAMPP / Laragon
* phpMyAdmin

---

## 📂 Project Structure

```text
penjualan-online/
│
├── index.php
├── login.php
├── register.php
├── logout.php
├── detail_produk.php
├── cart.php
├── checkout.php
├── riwayat_pesanan.php
│
├── config/
├── admin/
├── proses/
├── includes/
├── assets/
└── database/
```

---

## 🗄 Database Structure

Database yang digunakan:

```sql
penjualan_online
```

Tabel utama:

* users
* kategori
* produk
* pesanan
* detail_pesanan

Relasi sederhana:

```text
users
 └── pesanan
      └── detail_pesanan
            └── produk
                  └── kategori
```

---

## 🚀 Installation

### 1. Clone Repository

```bash
git clone https://github.com/Kristt15/Ecommerce.git
cd Ecommerce
```

### 2. Jalankan Web Server

Gunakan salah satu:

* XAMPP
* Laragon

Pastikan:

* Apache aktif
* MySQL aktif

### 3. Buat Database

```sql
CREATE DATABASE penjualan_online;
```

### 4. Import Database

Import file:

```text
database/penjualan_online.sql
```

### 5. Konfigurasi Database

```env
APP_BASE_PATH=/penjualan-online

DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=penjualan_online
DB_USER=root
DB_PASS=
```

### 6. Jalankan Aplikasi

Buka browser:

```text
http://localhost/penjualan-online
```

---

## 📷 Screenshots

### Login Page

*Coming Soon*

### Product List

*Coming Soon*

### Shopping Cart

*Coming Soon*

### Checkout

*Coming Soon*

### Admin Dashboard

*Coming Soon*

---

## 📋 Usage

### User

1. Registrasi akun
2. Login ke sistem
3. Jelajahi produk
4. Tambahkan produk ke keranjang
5. Checkout pesanan
6. Lihat riwayat transaksi

### Admin

1. Login sebagai admin
2. Kelola kategori
3. Kelola produk
4. Kelola pesanan
5. Monitoring transaksi

---

## 🔐 Session & Cookies Implementation

### Session

Digunakan untuk:

* Menyimpan status login
* Menyimpan data pengguna aktif
* Menyimpan keranjang belanja
* Flash message

Contoh:

```php
$_SESSION['user_id'];
$_SESSION['username'];
$_SESSION['role'];
$_SESSION['cart'];
```

### Cookies

Digunakan untuk:

* Remember Me
* Menyimpan preferensi pengguna

Contoh:

```php
setcookie(
    "remember_user",
    $user_id,
    time() + (86400 * 7),
    "/"
);
```

---

## 🗺 Roadmap

### Version 1.0

* [x] Struktur proyek
* [x] Perancangan database
* [x] Login & Register
* [x] Session Management
* [x] Cookies Implementation
* [x] CRUD Produk
* [x] CRUD Kategori
* [x] Shopping Cart
* [x] Checkout
* [x] Riwayat Pesanan

### Version 1.1

* [ ] Pencarian Produk
* [ ] Filter Kategori
* [ ] Upload Gambar Produk
* [ ] Dashboard Statistik

### Version 1.2

* [ ] Pagination Produk
* [ ] Export Laporan
* [ ] Notifikasi Transaksi

---

## 📚 What I Learned

Melalui proyek ini, tim mempelajari:

* Implementasi PHP Native dalam aplikasi nyata
* Manajemen Session dan Cookies
* Perancangan Database Relasional MySQL
* Penerapan CRUD pada aplikasi web
* Kolaborasi menggunakan Git & GitHub
* Penggunaan Pull Request dan Code Review
* Pengelolaan proyek menggunakan GitHub Issues

---

## 👨‍💻 Authors

### Shevanka Bagus D. K

**Role:** Backend Authentication, Session, Cookies, Database

### Kristian Utama Putra

**Role:** Product Management, Admin Panel, Testing

---

## 📄 License

Project ini dibuat untuk tujuan akademik dan pembelajaran.

© 2026 Tim Pengembang Sistem Informasi Penjualan Online
