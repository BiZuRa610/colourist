<?php
/**
 * Experiences Page — Colourist
 * 5 Rows Zigzag: 9:16 media (±220px) and centered text
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Experience — 5 Bespoke Services';
$page_description = 'Explore our private consultations at ASHTA District 8, SCBD: Personal Color Analysis, Signature Experience, Private Styling, Makeup Masterclass, and Custom Lipstick formulation.';

// 5 services in intended order
$ordered_services = [
    $services['personal-color-analysis'],
    $services['signature-experience'],
    $services['private-styling'],
    $services['makeup-masterclass'],
    $services['custom-lipstick']
];

include __DIR__ . '/includes/header.php';
?>

<!-- Zigzag 5 Services Listing -->
<section class="exp-zigzag-sec" aria-label="Experiences List">
  <?php foreach ($ordered_services as $idx => $srv): ?>
    <?php $is_even = ($idx % 2 === 1); ?>
    <div class="exp-zigzag-row <?= $is_even ? 'row-reverse' : '' ?>" id="<?= e($srv['slug']) ?>">
      <!-- Media Column (9:16 approx 220px width) -->
      <div class="exp-media-col">
        <?= video_player($srv['media_slot'], [
            'aspect' => '9/16',
            'alt'    => $srv['title'],
            'class'  => 'exp-card-media'
        ]) ?>
      </div>

      <!-- Text Column (Centered content) -->
      <div class="exp-text-col">
        <h2 class="exp-title">
          <?= e($srv['title']) ?>
        </h2>
        <p class="exp-desc">
          <?= e($srv['description']) ?>
        </p>
        <div>
          <a href="book?service=<?= e($srv['slug']) ?>" class="btn btn-exp-outline">
            BOOK NOW
          </a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
