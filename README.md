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

## 5. Panduan Deploy ke Vercel (Static Export)

Deployment ke Vercel menggunakan strategi **Static Export** (`/dist`), sehingga Vercel tidak perlu menjalankan PHP runtime serverless (zero-maintenance, performa CDN tercepat, aman, dan tanpa batasan durasi/memori fungsi).

### Alur Kerja & Deploy

1. Lakukan perubahan teks, kontak, atau konfigurasi di `includes/data.php` (atau file PHP lainnya).
2. **Setelah edit data.php, jalankan php build.php, lalu commit dan push.**
   ```bash
   php build.php
   git add .
   git commit -m "build: update static export"
   git push
   ```
3. Vercel akan otomatis menyajikan folder `dist` secara statis dengan clean URL aktif (`vercel.json` outputDirectory: "dist").

### Fitur Interaktif pada Static Export
- **Booking**: Berjalan 100% via client-side JavaScript yang langsung menyusun format pesan dan mengarahkan ke WhatsApp resmi Colourist.
- **Form Inquiry Kolaborasi**: Menggunakan Formspree (`action="https://formspree.io/f/XXXX"`) dengan fallback `mailto:` langsung ke email resmi, sehingga pengiriman pesan tidak membutuhkan backend PHP. Form ID dapat diedit di `includes/data.php` (`$site['formspree_id']`).
- **Admin Panel**: Hanya dijalankan pada environment PHP lokal (Laragon). File `admin.php` sengaja tidak di-export ke dalam folder `/dist`.

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

