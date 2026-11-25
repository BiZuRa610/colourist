<?php
/**
 * What is it? (About Page) — Colourist
 * Redesign sesuai Canva Page 11:
 * - Diagram 4 Kuadran (Crosshair) 4 Cincin Donat Musim: Spring, Summer, Autumn, Winter
 * - Section Personal Colour Analysis (PCA) dengan penjelasan & foto
 * - Catatan: butuh export penuh Page 11 untuk bagian bawah
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'What is it? — Colourist — Asia\'s Leading & No. 1 Color Expert';
$page_description = 'Discover Personal Colour Analysis (PCA): finding colours that harmonize with your natural complexion, features, skin, hair, and eyes.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. What is Colour Analysis? Section with 4 Quadrants Diagram -->
<section class="sec about-pca-sec" aria-labelledby="aboutPcaHeading">
  <h1 id="aboutPcaHeading" class="about-pca-title">What is Colour Analysis?</h1>

  <div class="pca-diagram-container">
    <div class="pca-crosshair-v" aria-hidden="true"></div>
    <div class="pca-crosshair-h" aria-hidden="true"></div>

    <div class="pca-quadrants-grid">
      <!-- Top-Left: SPRING -->
      <div class="pca-quadrant q-spring">
        <div class="season-donut donut-spring" role="img" aria-label="Spring Color Palette 12 Shades">
          <div class="donut-hole"></div>
        </div>
        <span class="season-label">SPRING</span>
      </div>

      <!-- Top-Right: SUMMER -->
      <div class="pca-quadrant q-summer">
        <div class="season-donut donut-summer" role="img" aria-label="Summer Color Palette 12 Shades">
          <div class="donut-hole"></div>
        </div>
        <span class="season-label">SUMMER</span>
      </div>

      <!-- Bottom-Left: AUTUMN -->
      <div class="pca-quadrant q-autumn">
        <div class="season-donut donut-autumn" role="img" aria-label="Autumn Color Palette 12 Shades">
          <div class="donut-hole"></div>
        </div>
        <span class="season-label">AUTUMN</span>
      </div>

      <!-- Bottom-Right: WINTER -->
      <div class="pca-quadrant q-winter">
        <div class="season-donut donut-winter" role="img" aria-label="Winter Color Palette 12 Shades">
          <div class="donut-hole"></div>
        </div>
        <span class="season-label">WINTER</span>
      </div>
    </div>
  </div>
</section>

<!-- 2. Personal Colour Analysis Explanation Section (Light Grey) -->
<section class="pca-explanation-sec" aria-labelledby="pcaExpHeading">
  <div class="pca-explanation-inner">
    <div class="pca-exp-text">
      <h2 id="pcaExpHeading" class="pca-exp-title">Personal Colour Analysis</h2>
      <div class="pca-exp-divider" aria-hidden="true"></div>
      
      <p class="pca-exp-p">
        Personal Colour Analysis (PCA) helps you find colours that <strong>harmonize</strong> with your natural color, features, your skin, hair, and eyes, so you can look your best effortlessly.
      </p>

      <div class="pca-harmony-badge-wrap">
        <span class="pca-harmony-badge">COLOUR ANALYSIS = HARMONY</span>
      </div>

      <p class="pca-exp-p">
        This analysis provides valuable insights into the colours that suit you best and how to mix and match them to achieve a harmonious look.
      </p>

      <div style="margin-top: 28px;">
        <a href="book" class="btn btn-solid" style="padding: 12px 32px; font-size: 10px;">
          Book Now
        </a>
      </div>
    </div>

    <div class="pca-exp-media">
      <img src="assets/media/pca_explanation.jpg" 
           alt="Personal Colour Analysis consultation at Colourist Studio" 
           class="pca-exp-img" 
           loading="lazy">
    </div>
  </div>
</section>

<!-- Catatan: butuh export penuh Page 11 untuk bagian bawah -->
<?php include __DIR__ . '/includes/footer.php'; ?>
