<?php
/**
 * Home Page — Colourist by Zerlinda
 * Asia & Indonesia's No. 1 Color Expert
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist by Zerlinda — Asia & Indonesia\'s No.1 Color Expert';
$page_description = 'Helping people feel confident through best colors. Discover your true seasonal palette, private styling, makeup masterclass, and custom lipstick at ASHTA District 8 SCBD.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Video Section -->
<section class="hero-wrapper" aria-label="Hero Video">
  <?= media('hero.home', [
      'class'    => 'hero-video-bg',
      'aspect'   => '16/9',
      'alt'      => 'Colourist by Zerlinda Studio Experience',
      'label'    => 'video: hero_portrait.mp4'
  ]) ?>
  <div class="hero-overlay">
    <h2>Helping people feel <b>confident</b> through best colors.</h2>
    <p>ASIA &amp; INDONESIA'S NO.1 COLOR EXPERT</p>
  </div>
</section>

<!-- 2. The Colourist Journey Section -->
<section class="sec journey-sec" aria-labelledby="journeyHeading">
  <span class="eyebrow" style="letter-spacing: .3em;">WELCOME TO THE</span>
  <h2 id="journeyHeading" class="journey-main-title">COLOURIST</h2>
  <span class="journey-subtitle">JOURNEY</span>

  <div class="journey">
    <?php foreach ($journey_steps as $step): ?>
      <a href="experience/<?= e($step['slug']) ?>" class="step" aria-label="<?= e($step['alt']) ?>">
        <div class="step-icon-wrap">
          <img src="<?= e($step['icon']) ?>" alt="" class="step-icon" width="36" height="36" loading="lazy">
        </div>
        <div class="step-divider">
          <i></i>
        </div>
        <div class="step-label">
          <span class="step-title-line"><?= e($step['title_line1']) ?></span>
          <span class="step-title-line"><?= e($step['title_line2']) ?></span>
          <?php if (!empty($step['sublabel'])): ?>
            <span class="step-sublabel"><?= e($step['sublabel']) ?></span>
          <?php endif; ?>
        </div>
        <div class="step-seal-wrap">
          <img src="<?= e($step['seal']) ?>" alt="<?= e($step['alt']) ?> Stamp" class="step-seal-img" width="58" height="58" loading="lazy">
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<!-- 3. Experiences Cards Section (9:16 Video Cards) -->
<section class="sec pt-0" aria-labelledby="experiencesHeading">
  <h2 id="experiencesHeading" style="font-size: 32px; margin-bottom: 24px;">Colourist Experience</h2>

  <div class="cards" style="grid-template-columns: repeat(4, 1fr);">
    <?php 
    // Show 4 representative service cards on home
    $home_services = [
      $services['personal-color-analysis'],
      $services['private-styling'],
      $services['makeup-masterclass'],
      $services['custom-lipstick']
    ];
    foreach ($home_services as $srv): 
    ?>
      <a href="experience/<?= e($srv['slug']) ?>" class="card">
        <div class="card-media">
          <?= media($srv['media_slot'], [
              'aspect' => '9/16',
              'alt'    => $srv['title'] . ' Video Experience',
              'label'  => 'video 9:16'
          ]) ?>
        </div>
        <p><?= e($srv['title']) ?></p>
      </a>
    <?php endforeach; ?>
  </div>

  <div style="margin-top: 36px; text-align: center;">
    <a href="experiences" class="btn" style="padding: 11px 28px; font-size: 9px; letter-spacing: .2em;">
      Explore Experiences
    </a>
  </div>
</section>

<!-- 4. Asia's Leading Color Expert Section -->
<section class="sec" style="padding-top: 30px; padding-bottom: 40px;" aria-labelledby="leaderHeading">
  <h2 id="leaderHeading" style="font-size: 32px; margin-bottom: 8px;">Asia's Leading Color Expert</h2>
  <p style="color: var(--fg); font-size: 13px; max-width: 600px; margin: 0 auto 32px; letter-spacing: .02em;">
    The expert in Personal Color Analysis, Styling, and Beauty Transformation
  </p>

  <!-- Centered 9:16 video / poster -->
  <div class="home-leader-video-wrap">
    <video muted loop playsinline preload="metadata" 
           class="lazy-video home-leader-video" 
           poster="<?= e($media['home.leader_video_poster']) ?>"
           data-src="<?= e($media['home.leader_video']) ?>" 
           src="<?= e($media['home.leader_video']) ?>" 
           aria-label="Asia's Leading Color Expert Experience">
      <source src="<?= e($media['home.leader_video']) ?>" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
  </div>
</section>

<!-- 5. Transformations Section (3 Before/After Cards) -->
<section class="sec" style="padding-top: 30px; padding-bottom: 50px;" aria-labelledby="homeTransHeading">
  <h2 id="homeTransHeading" style="font-size: 32px; margin-bottom: 6px;">Transformations</h2>
  <p style="color: var(--mut); font-size: 13px; margin: 0 auto 36px;">
    Every transformation begins with color.
  </p>

  <?php
  // Take first 3 stories
  $home_stories = array_slice($stories, 0, 3, true);
  ?>
  <div class="home-trans-cards">
    <?php foreach ($home_stories as $st): ?>
      <article class="home-trans-card">
        <!-- Before / After Side-by-Side (3:4 ratio each) -->
        <div class="ba-pair">
          <div class="ba-item">
            <?php if (!empty($st['before_slot']) && !empty($media[$st['before_slot']])): ?>
              <?= media($st['before_slot'], ['aspect' => '3/4', 'alt' => $st['title'] . ' Before']) ?>
            <?php else: ?>
              <div class="ph" style="aspect-ratio: 3/4; width: 100%;"><span style="font-size: 9px;">before</span></div>
            <?php endif; ?>
          </div>
          <div class="ba-item">
            <?php if (!empty($st['after_slot']) && !empty($media[$st['after_slot']])): ?>
              <?= media($st['after_slot'], ['aspect' => '3/4', 'alt' => $st['title'] . ' After']) ?>
            <?php else: ?>
              <div class="ph" style="aspect-ratio: 3/4; width: 100%;"><span style="font-size: 9px;">after</span></div>
            <?php endif; ?>
          </div>
        </div>

        <h3 class="home-trans-title">
          <a href="transformation/<?= e($st['slug']) ?>">
            <?= e($st['title']) ?>
          </a>
        </h3>

        <p class="home-trans-quote">
          &ldquo;<?= e($st['quote']) ?>&rdquo;
        </p>

        <a href="transformation/<?= e($st['slug']) ?>" class="home-trans-link">
          Read the full story
        </a>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- 6. Why Colourist? Section (3 Italic Lines Centered) -->
<section class="sec why-sec" aria-labelledby="homeWhyHeading">
  <h2 id="homeWhyHeading" style="font-size: 32px; margin-bottom: 28px;">Why Colourist?</h2>
  <div class="why-text-block">
    <p class="why-line">Colourist is Asia's Leading &amp; No.1 Color Expert.</p>
    <p class="why-line">Located in ASHTA &amp; Kuala Lumpur, we are dedicated to make Indonesians feel confident in their unique color.</p>
    <p class="why-line">Trusted by thousands of clients, brands, and publications globally and locally, we deliver real transformations through the power of color.</p>
  </div>
</section>

<!-- 7. Fullwidth CTA Section -->
<section class="home-cta-sec" aria-labelledby="ctaHeading">
  <div class="home-cta-bg-wrap">
    <?= media('home.cta_bg', [
        'class' => 'home-cta-bg-img',
        'alt'   => 'Colourist Atelier Ambience'
    ]) ?>
  </div>
  <div class="home-cta-overlay">
    <h2 id="ctaHeading" class="home-cta-title">Your Transformation Journey Begins Here</h2>
    <div>
      <a href="book" class="btn btn-outline-cta">
        BOOK NOW
      </a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
