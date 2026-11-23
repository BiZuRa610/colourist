<?php
/**
 * Partners & Celebrities Page — Colourist
 * Tab 5: Partners Carousel, Celebrities 4:5 Carousel, and Collaboration Form
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Our Partners & Celebrities — Colourist';
$page_description = 'Colourist partners with leading luxury brands, celebrities, and creative institutions across Asia.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Partners Logo Carousel Section -->
<section class="sec partners-logo-sec" aria-labelledby="partnersHeading">
  <h1 id="partnersHeading" style="font-size: 32px; margin-bottom: 28px;">Partners</h1>

  <div class="partners-carousel-container">
    <button type="button" class="partner-arrow arrow-prev" id="partnerPrev" aria-label="Previous partner logo">&lt;</button>
    <div class="partners-carousel-wrapper">
      <div class="carousel-fade fade-left" id="partnersFadeLeft" aria-hidden="true"></div>
      <div class="partners-track" id="partnersTrack">
        <?php foreach ($partner_brands as $brand): ?>
          <div class="partner-logo-item">
            <?php if (!empty($brand['logo'])): ?>
              <img src="<?= e($brand['logo']) ?>" alt="<?= e($brand['name']) ?>" class="partner-img" height="36">
            <?php else: ?>
              <span class="partner-wordmark"><?= e($brand['name']) ?></span>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="carousel-fade fade-right" id="partnersFadeRight" aria-hidden="true"></div>
    </div>
    <button type="button" class="partner-arrow arrow-next" id="partnerNext" aria-label="Next partner logo">&gt;</button>
  </div>
</section>

<!-- 2. Trusted by Celebrities Section (4:5 Cards Carousel) -->
<section class="sec celebs-sec" aria-labelledby="celebsHeading">
  <h2 id="celebsHeading" style="font-size: 32px; margin-bottom: 28px;">Trusted by Celebrities</h2>

  <div class="celebs-carousel-container">
    <button type="button" class="celeb-arrow arrow-prev" id="celebPrev" aria-label="Previous celebrity">&lt;</button>

    <div class="celebs-track-wrap">
      <div class="celebs-track" id="celebsTrack">
        <?php foreach ($celebrity_cards as $celeb): ?>
          <div class="celeb-card">
            <?php if (!empty($celeb['slot']) && !empty($media[$celeb['slot']])): ?>
              <?= media($celeb['slot'], ['aspect' => '4/5', 'alt' => $celeb['name']]) ?>
            <?php else: ?>
              <div class="ph celeb-ph" style="aspect-ratio: 4/5; width: 100%;">
                <span><?= e($celeb['name']) ?></span>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="carousel-fade fade-right" id="celebsFadeRight" aria-hidden="true"></div>
    </div>

    <button type="button" class="celeb-arrow arrow-next" id="celebNext" aria-label="Next celebrity">&gt;</button>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>