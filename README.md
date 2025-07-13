# 🛒 E-Procurement API

[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-blue.svg)](https://www.mysql.com/)
[![API Status](https://img.shields.io/badge/API-Available-green)](https://monitor.adaquran.com)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Sistem RESTful API sederhana untuk kebutuhan **E-Procurement** berbasis Laravel 12.  
Fokus pada manajemen vendor, produk, dan fitur import data massal yang mudah digunakan.

> 🖥️ **Live Endpoint (Demo/Test):** [monitor.adaquran.com](https://monitor.adaquran.com)

---

## 🔧 Tech Stack

- Laravel 12
- MySQL
- Laravel Sanctum (Autentikasi API)
- Laravel Queue (Konsep untuk import besar)
- Postman (Untuk pengujian API)

---

## 🚀 Fitur Utama

### 🔐 Autentikasi
- `POST /api/register` – Register user
- `POST /api/login` – Login dan dapatkan token akses

### 🧾 Vendor
- `POST /api/vendors` – Tambah vendor (dengan autentikasi user)
- `POST /api/vendors/bulk` – Tambah banyak vendor sekaligus (bulk)

### 📦 Produk
- `GET /api/products` – List produk berdasarkan user login
- `POST /api/products` – Tambah produk baru
- `PUT /api/products/{id}` – Edit produk tertentu
- `DELETE /api/products/{id}` – Hapus produk tertentu
- `POST /api/products/bulk` – Import produk massal (CSV)

---

## ⚙️ Instalasi & Setup Lokal

```bash
git clone https://github.com/username/eproc-api.git
cd eproc-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
