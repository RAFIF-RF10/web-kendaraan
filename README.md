<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Berikut adalah struktur README.md untuk aplikasi pemesanan kendaraan dengan persetujuan bertingkat, dashboard pemakaian, dan laporan periodik yang dapat diekspor dalam format Excel.

---

# Aplikasi Pemesanan Kendaraan

 Deskripsi
Aplikasi ini dirancang untuk pemesanan kendaraan dengan dua peran pengguna:
- **Admin**: Mengelola pemesanan, menentukan pengemudi, dan menetapkan pihak yang menyetujui.
- **Penyetuju**: Meninjau dan menyetujui pemesanan melalui proses persetujuan bertingkat (minimal 2 level).

Fitur Utama:
- Admin dapat membuat pemesanan dan menentukan penyetuju.
- Persetujuan bertingkat minimal 2 level.
- Pihak penyetuju dapat melakukan persetujuan melalui aplikasi.
- Dashboard menampilkan statistik pemakaian kendaraan.
- Laporan periodik pemesanan dapat diekspor ke format Excel.

---

## Kredensial Pengguna
Berikut adalah daftar nama pengguna dan kata sandi default untuk pengujian aplikasi:

### Admin
- **Username**: admin
- **Password**: admin123

### Penyetuju Level 1
- **Username**: approver1
- **Password**: approver123

### Penyetuju Level 2
- **Username**: approver2
- **Password**: approver123

---

## Persyaratan Sistem
- **Versi PHP**: 8.2 
- **Basis Data**: MySQL 8.0 
- **Framework**: Laravel 11
- **Versi Node.js**: 18.x
- **Tailwind CSS**: 3.x 

---

## Panduan Instalasi

1. Clone Repositori
```bash
git clone https://github.com/your-repository/vehicle-booking-app.git
cd vehicle-booking-app
```

## 2. Instalasi Dependensi
Pastikan untuk menginstal dependensi PHP dan Node.js.
```bash
composer install
npm install
```

### 3. Atur Variabel Lingkungan
Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi yang diperlukan:
```bash
cp .env.example .env
```
- Atur kredensial **database** Anda di file `.env` (MySQL atau PostgreSQL):
  ```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=db_sekawan
  DB_USERNAME=root
  DB_PASSWORD=
  ```

 4. Generate Application Key

php artisan key:generate
```

 5. Migrasi Database
Jalankan migrasi dan seed database dengan data contoh.
```bash
php artisan migrate --seed
```

 6. Build Aset Frontend
Kompilasi aset Tailwind CSS menggunakan Laravel Mix:
```bash
npm run dev
```

 7. Jalankan Aplikasi
Jalankan aplikasi secara lokal:
```bash
php artisan serve
```

Aplikasi sekarang akan tersedia di `http://localhost:8000`.

---

 Panduan Penggunaan

 1. Dashboard Admin
- Login sebagai admin menggunakan kredensial yang telah diberikan.
- Masuk ke bagian Pemesanan untuk membuat pemesanan baru.
- Tentukan pengemudi dan pilih pihak penyetuju untuk pemesanan tersebut.

 2. Proses Persetujuan
- Login sebagai Penyetuju Level 1 untuk meninjau dan menyetujui pemesanan yang tertunda.
- Setelah persetujuan di level pertama, **Penyetuju Level 2 dapat melihat dan menyetujui pemesanan.

 3. Dashboard Pemakaian Kendaraan
- Bagian **dashboard** menampilkan grafik yang merangkum statistik pemakaian kendaraan.

 4. Ekspor Laporan
- Pergi ke bagian Laporan untuk melihat riwayat pemesanan.
- Klik Ekspor ke Excel untuk mengunduh laporan dalam format `.xlsx`.

---

## Informasi Tambahan

### Menjalankan Tes
Untuk menjalankan tes otomatis, gunakan perintah:
```bash
php artisan test
```

### Kompilasi Aset untuk Produksi
Untuk membangun aset frontend yang dioptimalkan untuk produksi:
```bash
npm run build
```

---

## Pemecahan Masalah

- Pastikan semua variabel lingkungan di `.env` sudah dikonfigurasi dengan benar.
- Untuk masalah terkait database, periksa apakah driver database (MySQL atau PostgreSQL) sudah terpasang dan berjalan dengan baik.
