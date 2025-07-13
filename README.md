# E-Procurement API

RESTful API sederhana untuk sistem E-Procurement menggunakan Laravel 12 dan MySQL.  
Fitur utama meliputi autentikasi user, registrasi vendor, manajemen katalog produk, serta import data massal.

## 🔧 Tech Stack
- Laravel 12
- MySQL
- Laravel Sanctum (untuk autentikasi API)
- Laravel Queue (untuk import besar - konsep)
- Postman (untuk testing)

---

## 🚀 Fitur Utama

### ✅ Autentikasi
- `POST /api/register` – Register user
- `POST /api/login` – Login dan dapatkan token

### ✅ Vendor
- `POST /api/vendors` – Tambah vendor (by user login)
- `POST /api/vendors/bulk` – Tambah banyak vendor sekaligus

### ✅ Produk
- `GET /api/products` – List produk milik user login
- `POST /api/products` – Tambah produk
- `PUT /api/products/{id}` – Edit produk
- `DELETE /api/products/{id}` – Hapus produk
- `POST /api/products/bulk` – Import produk massal

---

## 📦 Instalasi & Setup

```bash
git clone https://github.com/username/eproc-api.git
cd eproc-api
composer install
cp .env.example .env
php artisan key:generate
