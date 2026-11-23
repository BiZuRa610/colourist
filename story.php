<?php
/**
 * Story Detail Page — Colourist
 * Template for /transformation/{slug}
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$slug = trim($_GET['story'] ?? '');

// If slug is missing or not found in $stories, trigger 404
if (empty($slug) || !isset($stories[$slug])) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}

$story = $stories[$slug];

// Prev and Next stories in order
$story_slugs = array_keys($stories);
$current_idx = array_search($slug, $story_slugs);
$prev_slug = ($current_idx > 0) ? $story_slugs[$current_idx - 1] : null;
$next_slug = ($current_idx < count($story_slugs) - 1) ? $story_slugs[$current_idx + 1] : null;

$page_title = $story['title'] . ' — Colourist Transformation Story';
$page_description = $story['quote'] ?? 'Read the full transformation story at Colourist.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Image / Media -->
<div class="story-hero-wrapper" aria-label="Transformation Hero">
  <?php if (!empty($story['media_slot']) && !empty($media[$story['media_slot']])): ?>
    <?= media($story['media_slot'], [
        'aspect' => '16/9',
        'alt'    => $story['title'],
        'class'  => 'story-hero-img'
    ]) ?>
  <?php else: ?>
    <div class="ph story-hero-ph" role="img" aria-label="Transformation Story Photo">
      <span><?= e($story['title']) ?></span>
    </div>
  <?php endif; ?>
</div>

<!-- 2. Story Article Content -->
<article class="story-article-container">
  <header class="story-header text-center">
    <h1 class="story-title"><?= e($story['title']) ?></h1>
    <?php if (!empty($story['subtitle'])): ?>
      <p class="story-subtitle"><em><?= e($story['subtitle']) ?></em></p>
    <?php endif; ?>
  </header>

  <div class="story-body">
    <?php if (!empty($story['has_content']) && !empty($story['content'])): ?>
      <?php foreach ($story['content'] as $section): ?>
        <section class="story-section">
          <?php if (!empty($section['heading'])): ?>
            <h2 class="story-section-heading"><?= e($section['heading']) ?></h2>
          <?php endif; ?>

          <?php if (!empty($section['paragraphs'])): ?>
            <?php foreach ($section['paragraphs'] as $p): ?>
              <p class="story-p"><?= e($p) ?></p>
            <?php endforeach; ?>
          <?php endif; ?>

          <?php if (!empty($section['bullets'])): ?>
            <ul class="story-bullets">
              <?php foreach ($section['bullets'] as $b): ?>
                <li><?= e($b) ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <?php if (!empty($section['after_bullets'])): ?>
            <?php foreach ($section['after_bullets'] as $ap): ?>
              <p class="story-p"><?= e($ap) ?></p>
            <?php endforeach; ?>
          <?php endif; ?>
        </section>
      <?php endforeach; ?>
    <?php else: ?>
      <!-- Placeholder for upcoming stories -->
      <div style="text-align: center; padding: 60px 20px; color: var(--mut);">
        <p style="font-size: 16px; margin-bottom: 12px; font-style: italic;">Coming soon</p>
        <p style="font-size: 13px;">Cerita lengkap untuk transformasi ini sedang dalam proses penyusunan.</p>
      </div>
    <?php endif; ?>
  </div>

  <!-- End of Article Actions -->
  <footer class="story-footer">
    <div class="story-cta-wrap">
      <a href="book" class="btn btn-solid" style="padding: 12px 36px; font-size: 10px;">Book Now</a>
    </div>

    <div class="story-nav-links">
      <div class="story-nav-prev">
        <?php if ($prev_slug): ?>
          <a href="transformation/<?= e($prev_slug) ?>" class="story-arrow-link">&larr; <?= e($stories[$prev_slug]['title']) ?></a>
        <?php endif; ?>
      </div>
      <div class="story-nav-center">
        <a href="transformation" class="story-all-link">&larr; All transformations</a>
      </div>
      <div class="story-nav-next">
        <?php if ($next_slug): ?>
          <a href="transformation/<?= e($next_slug) ?>" class="story-arrow-link"><?= e($stories[$next_slug]['title']) ?> &rarr;</a>
        <?php endif; ?>
      </div>
    </div>
  </footer>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
