# Colourist by Zerlinda — Website Official

Website native PHP untuk **Colourist by Zerlinda** (Asia & Indonesia's No. 1 Color Expert, studio di ASHTA District 8 SCBD, Jakarta & Kuala Lumpur). Dibangun secara native tanpa framework dan tanpa build tool, mengusung estetika minimalis luxury dengan tipografi Black Mango & Poppins, aksen `#b5654f`, responsive mobile-first, dan dark mode otomatis (`prefers-color-scheme`).

---

## 1. Menjalankan Website (Lokal)

Jalankan built-in web server PHP dari root direktori proyek:

```bash
php -S localhost:8000
```

Buka peramban di `http://localhost:8000`. Jika menggunakan Laragon / Apache, clean URL langsung aktif via `.htaccess` (misal `http://makeup.test/experiences` atau `http://localhost/makeup/experiences.php`).

---

## 2. Mengedit Konten & Konfigurasi (`includes/data.php`)

Semua data teks, nomor kontak, jadwal, layanan, workshop, dan testimoni dipusatkan di `includes/data.php`:
- **Informasi Kontak & Studio**: Ubah nomor WhatsApp (`$site['whatsapp']`), alamat, jam operasional, dan email.
- **Menu Navigasi**: Kelola item menu dan submenu di array `$nav_menu`.
- **Layanan (4 Layanan Utama)**: Edit durasi, harga, dan deskripsi di array `$services`.
- **Workshop**: Tambah jadwal workshop, kuota, harga, dan status di array `$workshops`.
- **Testimoni & Mitra**: Kelola quote klien dan nama mitra di array `$testimonials` dan `$partners`.

---

## 3. Mengganti & Menambah Media

Semua media dipetakan melalui slot di array `$media` (`includes/data.php`). Jangan melakukan hardcode path di file template:
1. Simpan foto atau video baru di folder `assets/media/`.
2. Buka `includes/data.php` dan arahkan slot yang sesuai ke file baru:
   ```php
   $media = [
       'hero.home' => 'assets/media/nama_video_baru.mp4',
       'about.hero' => 'assets/media/foto_studio_baru.jpg',
   ];
   ```
3. Helper `media($slot, $opts)` di `includes/media.php` secara otomatis mendeteksi ekstensi file dan me-render tag `<video>` atau `<img>` lengkap dengan aspek rasio, lazy loading, dan fallback placeholder abu-abu jika media belum diisi.
4. **Optimasi Video**: Telah disediakan script `tools/optimize.sh` (ffmpeg) untuk kompresi video ke 720p tanpa audio (`-an`) dan membuat thumbnail poster frame pertama. Jalankan manual jika diperlukan:
   ```bash
   bash tools/optimize.sh assets/media/video.mp4
   ```

---

## 4. Admin Panel & Portfolio Transformasi (`admin.php`)

Kelola daftar transformasi klien dan studio secara visual melalui `http://localhost:8000/admin.php`:
- **Password Default**: `colourist2026` (dapat diganti di `includes/data.php`).
- **Penyimpanan**: Data tersimpan langsung di `data/transformation.json`.
- **Fitur**: Tambah media baru, edit caption & kategori, hapus item, dan atur urutan naik/turun (&uarr; / &darr;).

---

## 5. Panduan Deploy ke Vercel

### Arsitektur Serverless

Semua request di-route melalui **`api/index.php`** (single entry-point):
- Clean URL → dipetakan ke file halaman PHP di root (`/about` → `about.php`, dll.)
- `/experience/{slug}` → `experience.php` dengan `$_GET['service'] = slug`
- Path tidak dikenal → `404.php` dengan status 404

Konfigurasi `vercel.json` menggunakan runtime `vercel-php@0.7.3`. File media besar (video, gambar) disajikan sebagai static assets dan **tidak** masuk ke fungsi serverless untuk menjaga ukuran di bawah limit.

> **⚠️ Catatan: `data/` bersifat read-only di Vercel.**
> Admin panel (`/admin`) dapat membaca `data/transformation.json` di Vercel, tetapi **tidak bisa menulis** karena filesystem serverless bersifat read-only. Fitur tulis (tambah/edit/hapus item transformasi) hanya berfungsi di lokal (Laragon/Apache). Untuk production, pertimbangkan migrasi ke database eksternal atau Vercel KV/Blob.

### Deploy

1. Pastikan ukuran video di bawah limit Git/Vercel (gunakan `tools/optimize.sh` jika perlu).
2. Deploy langsung melalui Vercel CLI:
   ```bash
   vercel
   ```

### Opsi Alternatif: Static Build Generator (`/dist`)
Jika ingin hosting sepenuhnya statis (zero-server / CDN statis):
1. Jalankan generator build lokal:
   ```bash
   php build.php
   ```
2. Seluruh halaman PHP akan di-render menjadi HTML statis di dalam folder `/dist` beserta seluruh aset dan data JSON.
3. Deploy folder `/dist` ke Vercel atau platform hosting statis apa pun:
   ```bash
   vercel ./dist
   ```

---

## Struktur Berkas Proyek

```
/
├── index.php              # Halaman Home (Hero video, Journey seals, Cards 9:16)
├── about.php              # Halaman About (Our story, Stats, Studio atelier, Press)
├── experiences.php        # Halaman Layanan (Zigzag list 4 layanan)
├── experience.php         # Detail Layanan (?service=slug + Other Experiences)
├── transformation.php     # Halaman Transformasi (Video carousel + Why Colourist)
├── workshop.php           # Halaman Workshop (Upcoming & Sold out cards)
├── collaboration.php      # Halaman Kolaborasi (Brand, Media, Talent + Form)
├── partners.php           # Halaman Partners (Grid logo + Quote slider)
├── book.php               # Halaman Book Now (Studio info + WhatsApp booking)
├── admin.php              # Admin Dashboard (Kelola data/transformation.json)
├── 404.php                # Halaman 404 Not Found
├── build.php              # Static Site Generator ke /dist
├── api/
│   └── index.php          # Vercel serverless router (single entry-point)
├── vercel.json            # Konfigurasi routing & PHP runtime Vercel
├── .htaccess              # Rewrite rule clean URL untuk Apache/Laragon
├── .gitignore             # Ignore reference, dist, bak, and doc_extracted
├── includes/
│   ├── data.php           # Konfigurasi pusat: teks, kontak, slot media, layanan
│   ├── media.php          # Helper responsif media() dan escape e()
│   ├── header.php         # Header navigasi & mega menu Aman-inspired
│   └── footer.php         # Footer minimalis & script inclusion
├── assets/
│   ├── css/style.css      # CSS styling, tokens, Black Mango & Poppins, dark mode
│   ├── js/main.js         # Mega menu, mobile accordion, video autoplay, booking WA
│   ├── fonts/             # BlackMango.woff & BlackMango.woff2
│   └── media/             # Foto, video, dan logo Colourist
├── data/
│   └── transformation.json# Database JSON portfolio transformasi
├── tools/
│   └── optimize.sh        # Script optimasi ffmpeg
└── reference/             # Wireframe mockup acuan visual
```

