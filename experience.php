<?php
/**
 * Service Detail Page — Colourist by Zerlinda
 * Reusable dynamic template for the 4 core experiences (/experience/{slug} or ?service=slug)
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$slug = trim($_GET['service'] ?? '');

// If slug is missing or not found in $services, trigger 404
if (empty($slug) || !isset($services[$slug])) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}

$srv = $services[$slug];

$page_title = $srv['title'] . ' — Colourist by Zerlinda';
$page_description = $srv['description'];

// Determine other 3 unique services
$unique_slugs = ['personal-color-analysis', 'private-styling', 'makeup-masterclass', 'custom-lipstick'];
$canonical_slug = ($slug === 'color-analysis') ? 'personal-color-analysis' : $slug;
$other_services = [];
foreach ($unique_slugs as $u_slug) {
    if ($u_slug !== $canonical_slug && isset($services[$u_slug])) {
        $other_services[] = $services[$u_slug];
    }
}

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Detail Split Section (Media 4:5 | Details) -->
<article class="split" aria-labelledby="serviceTitle">
  <div class="split-media">
    <?= media($srv['media_slot'], [
        'aspect' => '4/5',
        'alt'    => $srv['title'] . ' at Colourist by Zerlinda',
        'label'  => 'video / foto layanan'
    ]) ?>
  </div>

  <div>
    <span class="eyebrow"><?= e($srv['eyebrow']) ?></span>
    <h1 id="serviceTitle"><?= e($srv['title']) ?></h1>
    
    <p style="font-size: 14px; font-weight: 400; color: var(--fg); margin-bottom: 14px; line-height: 1.7;">
      <?= e($srv['description']) ?>
    </p>

    <p style="font-size: 13px; color: var(--mut); line-height: 1.8; margin-bottom: 20px;">
      <?= e($srv['full_text']) ?>
    </p>

    <?php if (!empty($srv['what_to_expect'])): ?>
      <div class="what-to-expect" style="margin-bottom: 22px; padding: 18px 20px; background: var(--card-bg); border: 1px solid var(--line);">
        <span class="eyebrow" style="color: var(--acc); margin-bottom: 8px;">What to Expect</span>
        <ul style="margin: 0; padding-left: 18px; color: var(--fg); font-size: 12px; line-height: 1.9;">
          <?php foreach ($srv['what_to_expect'] as $point): ?>
            <li><?= e($point) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="split-meta" style="font-size: 12px; line-height: 1.8; color: var(--fg); border-top: 1px solid var(--line); padding-top: 14px;">
      <div><strong>Duration:</strong> <?= e($srv['duration']) ?></div>
      <div><strong>Location:</strong> <?= e($srv['location']) ?></div>
      <div><strong>Investment:</strong> <?= e($srv['price']) ?></div>
    </div>

    <div style="margin-top: 24px; display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
      <a href="book?service=<?= e($canonical_slug) ?>" class="btn btn-solid" style="margin-top: 0;">
        Book Now
      </a>
      <a href="experiences" class="btn" style="margin-top: 0;">
        All Experiences
      </a>
    </div>
  </div>
</article>

<!-- 2. Other Experiences Section -->
<section class="sec pt-0" style="border-top: 1px solid var(--line); margin-top: 20px; padding-top: 40px;" aria-labelledby="otherExpHeading">
  <span class="eyebrow" id="otherExpHeading">Discover More</span>
  <h2 style="font-size: 24px; margin: 6px 0 20px;">Other Experiences</h2>

  <div class="cards" style="grid-template-columns: repeat(3, 1fr);">
    <?php foreach ($other_services as $other): ?>
      <a href="experience/<?= e($other['slug']) ?>" class="card">
        <div class="card-media">
          <?= media($other['media_slot'], [
              'aspect' => '9/16',
              'alt'    => $other['title'],
              'label'  => 'video 9:16'
          ]) ?>
        </div>
        <p><?= e($other['title']) ?></p>
        <span class="eyebrow" style="margin-top: 4px;"><?= e($other['eyebrow']) ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
