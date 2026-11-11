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
  <span class="eyebrow" id="experiencesHeading">Experiences</span>

  <div class="cards">
    <?php 
    // Filter to exactly the 4 distinct services
    $distinct_services = [
      $services['personal-color-analysis'],
      $services['private-styling'],
      $services['makeup-masterclass'],
      $services['custom-lipstick']
    ];
    foreach ($distinct_services as $srv): 
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
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

