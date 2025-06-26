# SEA Catering - Premium Meal Subscription Service

## 🧾 Project Overview

**SEA Catering** adalah layanan pengiriman makanan sehat yang dapat disesuaikan, beroperasi di seluruh Indonesia. Aplikasi web ini memungkinkan pelanggan untuk dengan mudah berlangganan paket makanan, mengelola langganan mereka, dan mengakses informasi nutrisi. Platform ini juga mencakup dashboard admin untuk kebutuhan manajemen bisnis.

---

## ⚙️ Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP, Laravel
- **Database**: MySQL
- **Authentication**: Laravel Breeze

---

## 🚀 Installation Guide

### 📌 Prerequisites
- PHP 8.0+
- Composer
- MySQL 5.7+
- Node.js

### 📦 Setup Instructions

1. Clone repository:
   ```bash
   git clone https://github.com/Gentahal/SEA-CATERING.git
   cd SEA-CATERING

2. Install Depedencies:
   ```bash
   composer install
   npm install

3. Buat file .env dan konfigurasi:
    ```bash
   cp .env.example .env
    
   *Sesuaikan ENV anda.*

4. Generate application key:
    ```bash
   php artisan key:generate

5. Jalankan migration dan seeder:
    ```bash
    php artisan migrate --seed

---

## ⚙️ Akun Admin (dari seed)

- **Name**: Admin
- **Email**: admin@gmail.com
- **Password**: adminPassword123



