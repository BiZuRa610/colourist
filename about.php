<?php
/**
 * About Page — Colourist by Zerlinda
 * Our Story, Studio Atelier, Key Stats, and Press Coverage
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'About Colourist — Asia\'s Leading & No. 1 Color Expert';
$page_description = 'Founded by Zerlinda, Colourist is Asia\'s leading color consulting house based in ASHTA District 8, SCBD and Kuala Lumpur, dedicated to making clients feel confident in their unique color.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Image Section -->
<section class="hero-wrapper" aria-label="About Hero">
  <?= media('about.hero', [
      'class'    => 'hero-video-bg',
      'aspect'   => '16/9',
      'alt'      => 'Official Colourist Session',
      'label'    => 'colourist_official.jpg'
  ]) ?>
  <div class="hero-overlay">
    <h1>About Colourist</h1>
    <p>ASIA'S LEADING &amp; NO.1 COLOR EXPERT</p>
  </div>
</section>

<!-- 2. Our Story Split Section -->
<section class="split" aria-labelledby="storyHeading">
  <div class="split-media">
    <?= media('about.story', [
        'aspect' => '4/5',
        'alt'    => 'Zerlinda Master Consultation',
        'label'  => '76c60e282c78588fbb41bba6c9e69e4c.jpg'
    ]) ?>
  </div>

  <div>
    <span class="eyebrow">Our Story</span>
    <h2 id="storyHeading">Colour, made personal.</h2>
    <p>
      Founded by Zerlinda, Colourist was born from a singular mission: to empower individuals to feel radiant and effortlessly confident through the scientific precision of colour analysis.
    </p>
    <p>
      Too often, shopping and styling feel like expensive guesswork. By combining advanced draping science, face architecture, and personalized pigment formulation, we provide a definitive roadmap for your wardrobe, makeup, and lifestyle choices.
    </p>
    <p style="font-weight: 500; color: var(--fg);">
      Based in ASHTA District 8, SCBD, Jakarta and Kuala Lumpur.
    </p>
    <div style="margin-top: 20px;">
      <a href="book" class="btn btn-solid">Book Now</a>
    </div>
  </div>
</section>

<!-- 3. Stats Section (3 Columns) -->
<section class="stats" aria-label="Key Milestones">
  <?php foreach ($stats as $stat): ?>
    <div>
      <b><?= e($stat['number']) ?></b>
      <span><?= e($stat['label']) ?></span>
    </div>
  <?php endforeach; ?>
</section>

<!-- 4. Studio Gallery (ASHTA Atelier) -->
<section class="sec" aria-labelledby="studioHeading">
  <span class="eyebrow">The Studio</span>
  <h2 id="studioHeading" style="font-size: 28px;">ASHTA Atelier</h2>
  <p style="color: var(--mut); max-width: 500px; margin: 8px auto 0; font-size: 12px;">
    An intimate sanctuary bathed in calibrated daylight lighting, designed for private discovery in the heart of SCBD Jakarta.
  </p>

  <div class="gal">
    <div class="gal-item">
      <?= media('about.studio.1', ['aspect' => '1/1', 'alt' => 'ASHTA Studio Tour', 'label' => 'ashta_studio_tour.jpg']) ?>
    </div>
    <div class="gal-item">
      <?= media('about.studio.2', ['aspect' => '1/1', 'alt' => 'Atelier Draping Station', 'label' => 'foto studio']) ?>
    </div>
    <div class="gal-item">
      <?= media('about.studio.3', ['aspect' => '1/1', 'alt' => 'Atelier Studio Space', 'label' => 'foto studio']) ?>
    </div>
    <div class="gal-item">
      <?= media('about.studio.4', ['aspect' => '1/1', 'alt' => 'Consultation Lounge', 'label' => 'foto studio']) ?>
    </div>
  </div>
</section>

<!-- 5. Press Coverage Horizontal Strip ("As seen in") -->
<section class="sec pt-0" aria-labelledby="pressHeading">
  <span class="eyebrow" id="pressHeading">As seen in</span>

  <div class="press">
    <?php foreach ($press as $item): ?>
      <div class="press-item">
        <?= media($item['media'], [
            'aspect' => '4/3',
            'alt'    => $item['title'],
            'label'  => $item['outlet']
        ]) ?>
        <div class="press-label"><?= e($item['outlet']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <div style="margin-top: 36px;">
    <a href="book" class="btn btn-solid">Experience Colourist</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

