# Colourist — Website Official

Website native PHP untuk **Colourist** (Asia & Indonesia's No. 1 Color Expert, studio di ASHTA District 8 SCBD, Jakarta). Dibangun secara native tanpa framework dan tanpa build tool, mengusung estetika minimalis luxury dengan tipografi Cormorant Garamond, Black Mango & Poppins, aksen `#b5654f`, video interaktif portrait (9:16) bersuara gaya Olaplex, hero full-page 100svh bergaya Hermes, responsive mobile-first, dan dark mode otomatis (`prefers-color-scheme`).

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
- **Layanan (5 Layanan Utama)**: Kelola 5 layanan utama di array `$services`:
  - `personal-color-analysis`
  - `signature-experience`
  - `private-styling`
  - `makeup-masterclass`
  - `custom-lipstick`
- **Cerita Transformasi (Transformation Stories)**:
  - Dikelola di array `$stories` di `includes/data.php`.
  - Untuk menambah cerita baru:
    1. Tambahkan slug baru sebagai key di `$stories` (misal: `'my-new-story'`).
    2. Isi `title`, `quote`, `category` (`'real-clients'`, `'experts'`, atau `'celebrities'`), `category_label`, `subtitle`, `media_slot`, `has_content` (`true`), dan `content` (array section berisi `heading`, `paragraphs`, serta `bullets` opsional).
    3. Tambahkan slot gambar di `$media` (misal: `'story.my-new-story' => 'assets/media/my_story.jpg'`).
    4. Jalankan `php build.php` untuk merender static export `dist/transformation/my-new-story/index.html`.
- **Mitra / Partner Brands**:
  - Dikelola di array `$partner_brands` di `includes/data.php`.
  - Untuk menambah logo partner:
    1. Tambahkan item di `$partner_brands`, contoh: `['name' => 'Brand Name', 'logo' => 'assets/media/brands/logo.png']`.
    2. Jika path `logo` dikosongkan (`''`), sistem otomatis merender wordmark tipografi luxury dengan filter monokrom.
    3. Jalankan `php build.php` setelah selesai.
- **Testimoni & Mitra**: Kelola quote klien dan mitra di array `$testimonials` dan `$partners`.

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
├── index.php              # Halaman Home (Hero 100svh Hermes, Journey seals, Cards 9:16 Olaplex)
├── about.php              # Halaman "What is it?" (Story, Stats, Studio atelier, Press)
├── experiences.php        # Halaman Layanan (Zigzag 5 layanan dengan video interaktif)
├── transformation.php     # Halaman Transformasi (Video carousel + Stories)
├── workshop.php           # Halaman Workshop (Sertifikasi, video suara, alumni carousel)
├── collaboration.php      # Halaman Kolaborasi (Inquiry form & email)
├── partners.php           # Halaman Partners (Carousel logo SVG + Trusted Celebrities)
├── book.php               # Halaman Book Now (5 layanan, WhatsApp booking)
├── admin.php              # Admin Dashboard lokal (Kelola data/transformation.json)
├── 404.php                # Halaman 404 Not Found
├── build.php              # Static Site Generator ke /dist
├── vercel.json            # Konfigurasi deployment statis Vercel
├── .htaccess              # Rewrite rule clean URL untuk Apache/Laragon
├── includes/
│   ├── data.php           # Konfigurasi pusat: teks, kontak, slot media, layanan
│   ├── media.php          # Helper responsif media(), video_player(), escape e()
│   ├── header.php         # Header navigasi & mega menu Aman-inspired
│   └── footer.php         # Footer minimalis & script inclusion
├── assets/
│   ├── css/style.css      # CSS styling, tokens, Cormorant Garamond, Poppins, responsive
│   ├── js/main.js         # Mega menu, Olaplex video controller, carousels, booking WA
│   ├── fonts/             # BlackMango.woff & BlackMango.woff2
│   └── media/             # Foto, video, logo, dan SVG partners
├── data/
│   └── transformation.json# Database JSON portfolio transformasi
└── reference/             # Wireframe mockup dan aset acuan visual
```

