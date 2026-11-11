<?php
/**
 * 404 Not Found — Colourist by Zerlinda
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

http_response_code(404);

$page_title = '404 Page Not Found — Colourist by Zerlinda';
$page_description = 'Halaman yang Anda cari tidak ditemukan.';

include __DIR__ . '/includes/header.php';
?>

<section class="sec" style="padding: 100px 28px;">
  <span class="eyebrow accent">404 Error</span>
  <h1 style="font-size: 38px; margin: 12px 0 16px;">Page Not Found</h1>
  <p style="max-width: 480px; margin: 0 auto 28px; color: var(--mut);">
    Halaman atau layanan yang Anda cari tidak tersedia atau tautan telah berpindah.
  </p>
  <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
    <a href="" class="btn btn-solid">Return Home</a>
    <a href="experiences" class="btn">Explore Experiences</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

