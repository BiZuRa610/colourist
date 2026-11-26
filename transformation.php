<?php
/**
 * Transformation Page — Colourist
 * Acuan canva_transformation_list_ref.png:
 * - 4 Real Client Stories in exact order
 * - Foto kiri (~40% landscape 16:9), kanan judul serif + kutipan italic + "Read the full story" underline
 * - Baris dipisah bg abu sangat muda bergantian
 * - Filter kategori disembunyikan
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Transformation — Authentic Stories & Confidence';
$page_description = 'Every person deserves to feel confident in their own skin. Discover authentic transformations from thousands of clients across Asia.';

$ordered_story_slugs = [
    'she-spent-12-years',
    'six-years-in-black',
    'finding-confidence',
    'rediscovering-herself'
];

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Page Header -->
<section class="sec" style="padding-bottom: 24px;">
  <h1 style="font-size: 34px; margin-bottom: 12px; font-family: var(--font-serif); text-align: center;">Colourist Transformation</h1>
  <p style="color: var(--mut); font-size: 13px; text-align: center; margin: 0 auto;">Every transformation begins with color.</p>
</section>

<!-- 2. Stories Listing (4 items, alternating rows) -->
<section class="trans-stories-sec" aria-label="Daftar Cerita Transformasi">
  <div class="trans-stories-list" id="transStoriesList">
    <?php foreach ($ordered_story_slugs as $idx => $s_slug): ?>
      <?php 
        $st = $stories[$s_slug] ?? null;
        if (!$st) continue;
        $is_alt = ($idx % 2 === 1);
        $story_slot = $st['image_slot'] ?? ($st['media_slot'] ?? "story.{$s_slug}.image");
      ?>
      <article class="trans-story-row <?= $is_alt ? 'is-alt-bg' : '' ?>">
        <div class="trans-story-media">
          <a href="transformation/<?= e($st['slug']) ?>" aria-label="<?= e($st['title']) ?>">
            <?= media($story_slot, [
                'alt'    => $st['title'] . ' — Colourist Transformation Story',
                'class'  => 'trans-row-img',
                'aspect' => '16/9',
                'width'  => 484,
                'height' => 281
            ]) ?>
          </a>
        </div>

        <div class="trans-story-content">
          <h2 class="trans-story-title">
            <a href="transformation/<?= e($st['slug']) ?>">
              <?= e($st['title']) ?>
            </a>
          </h2>
          <p class="trans-story-quote">
            &ldquo;<?= e($st['quote']) ?>&rdquo;
          </p>
          <div>
            <a href="transformation/<?= e($st['slug']) ?>" class="trans-story-link">
              Read the full story
            </a>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
