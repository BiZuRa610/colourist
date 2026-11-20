<?php
/**
 * Transformation Page — Colourist by Zerlinda
 * 5 Real Client Stories with Category Filter (Real Clients, Experts, Celebrities)
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Transformation — Authentic Stories & Confidence';
$page_description = 'Every person deserves to feel confident in their own skin. Discover authentic transformations from thousands of clients across Asia.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Page Header -->
<section class="sec" style="padding-bottom: 24px;">
  <h1 style="font-size: 34px; margin-bottom: 24px;">Colourist Transformation</h1>

  <!-- 3 Solid Black Category Filter Buttons -->
  <div class="filter-btn-group" role="tablist" aria-label="Filter Kategori Transformasi">
    <button type="button" class="trans-filter-btn active" data-category="real-clients">
      REAL CLIENTS
    </button>
    <button type="button" class="trans-filter-btn" data-category="experts">
      EXPERTS
    </button>
    <button type="button" class="trans-filter-btn" data-category="celebrities">
      CELEBRITIES
    </button>
  </div>
</section>

<!-- 2. Stories Zigzag-Sejajar Listing (5 items) -->
<section class="trans-stories-sec" aria-label="Daftar Cerita Transformasi">
  <div class="trans-stories-list" id="transStoriesList">
    <?php foreach ($stories as $st): ?>
      <article class="trans-story-row" data-category="<?= e($st['category']) ?>">
        <div class="trans-story-media">
          <a href="transformation/<?= e($st['slug']) ?>" aria-label="<?= e($st['title']) ?>">
            <?php if (!empty($st['media_slot']) && !empty($media[$st['media_slot']])): ?>
              <?= media($st['media_slot'], [
                  'aspect' => '16/9',
                  'alt'    => $st['title'],
                  'class'  => 'trans-row-img'
              ]) ?>
            <?php else: ?>
              <div class="ph" style="aspect-ratio: 16/9; width: 100%; min-height: 220px;" role="img" aria-label="<?= e($st['title']) ?>">
                <span><?= e($st['title']) ?></span>
              </div>
            <?php endif; ?>
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
