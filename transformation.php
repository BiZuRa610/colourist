<?php
/**
 * Transformation Page — Colourist by Zerlinda
 * Real client transformations, video carousel, and "Why Colourist?"
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Transformation — Inspiring Beauty & Confidence';
$page_description = 'Every person deserves to feel confident in their own skin. Discover authentic transformations from thousands of clients across Asia.';

// Load transformation videos
$trans_items = [
    [
        'slot'  => 'transformation.1',
        'label' => 'trans_1'
    ],
    [
        'slot'  => 'transformation.2',
        'label' => 'trans_2'
    ],
    [
        'slot'  => 'transformation.3',
        'label' => 'trans_3'
    ],
    [
        'slot'  => 'transformation.4',
        'label' => 'trans_4'
    ],
];

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Transformation Split + Horizontal Video Carousel -->
<section class="trans" aria-labelledby="transTitle">
  <div>
    <span class="eyebrow accent">Transformation</span>
    <h1 id="transTitle">Colourist Transformation</h1>
    <p>
      Every person deserves to feel confident in their own skin. From discovering the colours that complement you to seeing yourself in a whole new light, sometimes the smallest discovery can inspire the most beautiful transformation.
    </p>
    <div style="margin-top: 20px;">
      <a href="book" class="btn btn-solid">Reserve Your Session</a>
    </div>
  </div>

  <div class="strip" aria-label="Transformation Videos Carousel">
    <?php foreach ($trans_items as $item): ?>
      <div class="strip-item">
        <?= media($item['slot'], [
            'aspect' => '9/16',
            'alt'    => 'Colourist Transformation Video',
            'label'  => $item['label']
        ]) ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- 2. Why Colourist? Section -->
<section class="sec why" style="border-top: 1px solid var(--line); margin-top: 20px;" aria-labelledby="whyTitle">
  <span class="eyebrow">The Standard</span>
  <h2 id="whyTitle">Why Colourist?</h2>
  
  <p>Colourist is Asia's Leading &amp; No.1 Color Expert.</p>
  <p>Located in ASHTA &amp; Kuala Lumpur, we are dedicated to make Indonesians feel confident in their unique color.</p>
  <p>Trusted by thousands of clients, brands, and publications globally and locally, we deliver real transformations through the power of color.</p>

  <!-- Talent Image with Gradient Mask Fade -->
  <div class="faces-container">
    <?= media('why.image', [
        'alt'    => 'Miss Indonesia & Miss World delegates and Colourist clients',
        'label'  => 'why_faces.png'
    ]) ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

