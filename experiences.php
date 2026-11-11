<?php
/**
 * Experiences Page — Colourist by Zerlinda
 * Zigzag listing of 4 core bespoke services
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Experience — Personal Color, Styling, Masterclass & Custom Lipstick';
$page_description = 'Explore our private consultations at ASHTA District 8, SCBD: 60-minute Personal Color Analysis, 90-minute Private Styling, Makeup Masterclass, and Custom Lipstick formulation.';

// Distinct 4 services in intended order
$distinct_services = [
    $services['personal-color-analysis'],
    $services['private-styling'],
    $services['makeup-masterclass'],
    $services['custom-lipstick']
];

include __DIR__ . '/includes/header.php';
?>

<!-- Experiences Header -->
<section class="sec" style="padding-bottom: 20px;">
  <span class="eyebrow">Our Services</span>
  <h1 style="font-size: 34px; margin-top: 6px;">Colourist Experience</h1>
  <p style="color: var(--mut); max-width: 540px; margin: 12px auto 0; font-size: 13px;">
    Every private consultation is curated to help you discover the shades, silhouettes, and beauty formulations that reflect your true self.
  </p>
</section>

<!-- Zigzag Services Listing -->
<section class="exlist" aria-label="Services List">
  <?php foreach ($distinct_services as $srv): ?>
    <div class="row" id="<?= e($srv['slug']) ?>">
      <div class="row-media">
        <a href="experience/<?= e($srv['slug']) ?>" aria-label="View <?= e($srv['title']) ?> details">
          <?= media($srv['media_slot'], [
              'aspect' => '1/1',
              'alt'    => $srv['title'] . ' Session',
              'label'  => $srv['media_slot']
          ]) ?>
        </a>
      </div>
      <div class="txt">
        <span class="eyebrow"><?= e($srv['eyebrow']) ?></span>
        <h2>
          <a href="experience/<?= e($srv['slug']) ?>">
            <?= e($srv['title']) ?>
          </a>
        </h2>
        <p><?= e($srv['description']) ?></p>
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
          <a href="book?service=<?= e($srv['slug']) ?>" class="btn btn-solid" style="margin-top: 0;">
            Book Now
          </a>
          <a href="experience/<?= e($srv['slug']) ?>" class="btn" style="margin-top: 0;">
            View Details
          </a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
