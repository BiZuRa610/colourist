<?php
/**
 * Partners & Collaboration Page — Colourist by Zerlinda
 * Tab 5: Partners Carousel, Celebrities 4:5 Carousel, and Collaboration Form
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Our Partners, Celebrities & Collaboration — Colourist by Zerlinda';
$page_description = 'Colourist partners with leading luxury brands, celebrities, and creative institutions across Asia.';

$formspree_action = !empty($site['formspree_id']) && $site['formspree_id'] !== 'XXXX' 
    ? "https://formspree.io/f/" . urlencode($site['formspree_id'])
    : "https://formspree.io/f/XXXX";

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Partners Logo Carousel Section -->
<section class="sec partners-logo-sec" aria-labelledby="partnersHeading">
  <h1 id="partnersHeading" style="font-size: 32px; margin-bottom: 28px;">Partners</h1>

  <div class="partners-carousel-wrapper">
    <div class="carousel-fade fade-left" id="partnersFadeLeft" aria-hidden="true"></div>
    <div class="partners-track" id="partnersTrack">
      <?php foreach ($partner_brands as $brand): ?>
        <div class="partner-logo-item">
          <?php if (!empty($brand['logo'])): ?>
            <img src="<?= e($brand['logo']) ?>" alt="<?= e($brand['name']) ?>" class="partner-img">
          <?php else: ?>
            <span class="partner-wordmark"><?= e($brand['name']) ?></span>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="carousel-fade fade-right" id="partnersFadeRight" aria-hidden="true"></div>
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

<!-- 3. Collaboration Inquiry Form Section -->
<section class="sec pt-0 collab-form-sec" aria-labelledby="collabHeading">
  <h2 id="collabHeading" style="font-size: 32px; margin-bottom: 32px;">Collaboration</h2>

  <form method="POST" action="<?= e($formspree_action) ?>" class="form-box" id="partnersCollabForm">
    <!-- Formspree subject & anti-spam honeypot -->
    <input type="hidden" name="_subject" value="New Collaboration Inquiry via Partners Page">
    <div style="display: none;" aria-hidden="true">
      <input type="text" name="_gotcha" tabindex="-1" autocomplete="off">
      <input type="text" name="website" tabindex="-1" autocomplete="off">
    </div>

    <div class="form-group">
      <label for="collabName">Name *</label>
      <input type="text" id="collabName" name="name" required placeholder="Nama Lengkap">
    </div>

    <div class="form-group">
      <label for="collabCompany">Brand / Company *</label>
      <input type="text" id="collabCompany" name="company" required placeholder="Nama Perusahaan atau Instansi">
    </div>

    <div class="form-group">
      <label for="collabEmail">Email *</label>
      <input type="email" id="collabEmail" name="email" required placeholder="nama@perusahaan.com">
    </div>

    <div class="form-group">
      <label for="collabMessage">Message *</label>
      <textarea id="collabMessage" name="message" required placeholder="Ceritakan konsep atau rencana kolaborasi Anda..."></textarea>
    </div>

    <div style="text-align: center; margin-top: 14px;">
      <button type="submit" name="submit_collab" class="btn btn-solid" style="padding: 11px 36px; font-size: 9px; letter-spacing: .2em;">
        Send Inquiry
      </button>
    </div>
  </form>

  <p style="margin-top: 24px; font-size: 11px; color: var(--mut); text-align: center;">
    Atau hubungi kami langsung via email: 
    <a href="mailto:<?= e($site['email']) ?>?subject=Collaboration%20Inquiry" style="text-decoration: underline;">
      <?= e($site['email']) ?>
    </a>
  </p>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
