
# 🏬 Toko Indonesia

**Toko Indonesia** adalah aplikasi e‑commerce sederhana untuk bisnis retail online di Indonesia. Proyek ini memungkinkan pengguna menjual dan membeli produk secara mudah dengan antarmuka ramah pengguna dan sistem manajemen toko dasar.

## 🚀 Fitur Utama

- 📦 Kelola produk: tambah, edit, hapus
- 🛒 Keranjang belanja dan checkout sederhana
- 👤 Otentikasi pengguna (register, login, logout)
- 📝 Halaman profil dan riwayat pesanan
- 📊 Dashboard admin: kelola produk dan pesanan

## 💻 Teknologi

- Backend: Laravel (PHP)  
- Frontend: Blade + Tailwind CSS  
- Database: MySQL atau PostgreSQL  
- Bundler: Vite  
- Otentikasi: Laravel Breeze / Sanctum (jika diterapkan)  
- Testing: PHPUnit

## 📥 Instalasi

1. Clone repository:  
   ```bash
   git clone https://github.com/Gapraaa/toko_indonesia.git
   cd toko_indonesia
   ```
2. Install dependencies PHP dan JS:  
   ```bash
   composer install
   npm install
   npm run dev
   ```
3. Siapkan environment:  
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Edit `.env` untuk pengaturan database:
   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=toko_indonesia
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Migrasi dan seed (opsional):
   ```bash
   php artisan migrate --seed
   ```
6. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
   Akses: `http://localhost:8000`

## 📚 Struktur Direktori

```
├── app/             > Controller, Model, Middleware
├── database/        > Migration & Seeder
├── public/          > Aset publik (gambar, CSS, js)
├── resources/
│   ├── views/       > Template Blade
│   └── css/js/      > Asset styling & script
└── routes/          > Definisi route
```

## 🧪 Testing

- Jalankan unit/feature test:
  ```bash
  php artisan test
  ```

## 🛠 Kontribusi

Kontribusi sangat disambut! Untuk berpartisipasi:
1. Fork repo ini  
2. Buat branch baru (`feature/namaFitur`)  
3. Commit perubahan dan push  
4. Ajukan Pull Request

## 📄 Lisensi

Dilindungi di bawah lisensi [MIT](LICENSE). Bebas digunakan dan modifikasi.
