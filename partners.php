<?php
/**
 * Partners Page — Colourist by Zerlinda
 * Partner Brands and Client Testimonials
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Our Partners & Clients — Colourist by Zerlinda';
$page_description = 'Colourist is trusted by leading beauty brands, lifestyle labels, and celebrity clients across Indonesia and Asia.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Partner Brands Section -->
<section class="sec" aria-labelledby="partnersHeading">
  <span class="eyebrow">Partners</span>
  <h1 id="partnersHeading" style="font-size: 34px; margin: 6px 0 12px;">Trusted by brands we love</h1>
  <p>Colourist partners with leading beauty, fashion and lifestyle names.</p>

  <!-- 4-Column Partner Grid -->
  <div class="logos" aria-label="Brand Partners">
    <?php foreach ($partners as $partner): ?>
      <div class="logo-card">
        <div>
          <b style="display: block; font-size: 11px;"><?= e($partner['name']) ?></b>
          <span style="font-size: 8px; color: var(--mut);"><?= e($partner['category']) ?></span>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- 2. Client Testimonials Section (Auto-sliding Serif Quote) -->
<section class="sec" style="border-top: 1px solid var(--line);" aria-labelledby="testimonialsHeading">
  <span class="eyebrow" id="testimonialsHeading">Words from clients</span>

  <div class="quote-slider" style="margin-top: 24px;">
    <?php foreach ($testimonials as $idx => $item): ?>
      <div class="quote-slide <?= $idx === 0 ? 'active' : '' ?>" data-index="<?= $idx ?>">
        <blockquote class="quote">
          &ldquo;<?= e($item['quote']) ?>&rdquo;
          <small><?= e($item['author']) ?> &mdash; <?= e($item['role']) ?></small>
        </blockquote>
      </div>
    <?php endforeach; ?>

    <!-- Interactive Navigation Dots -->
    <div class="quote-nav">
      <?php foreach ($testimonials as $idx => $item): ?>
        <button class="quote-dot <?= $idx === 0 ? 'active' : '' ?>" data-index="<?= $idx ?>" aria-label="Slide <?= $idx + 1 ?>"></button>
      <?php endforeach; ?>
    </div>
  </div>

  <div style="margin-top: 36px;">
    <a href="book" class="btn btn-solid">Book an Appointment</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

