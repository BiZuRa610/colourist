<?php
/**
 * Workshop Page — Colourist
 * Redesign sesuai acuan workshop_1.jpg:
 * 1. Hero Kolase Foto 5+4 (full-bleed, fade ke putih, header transparan, judul & subjudul)
 * 2. Video Tengah 9:16 (autoplay muted loop playsinline, mute toggle)
 * 3. Section Beige (#f5f3f1): Why join? + foto grup, What you get (4 kolom / mobile 2x2)
 * 4. Colourist Student: Carousel foto 9:16 (lebar ±185px, drag/swipe, loop tanpa ujung, panah < >, fade kiri-kanan) + stats teks
 * 5. CTA dengan Foto Background: workshop_cta_bg.jpg (full-bleed, fade bawah + overlay putih 55%, tombol outline hitam)
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Workshop & Certification — Professional Korean & Japanese Method';
$page_description = 'Professional Colour Analyst Certification - Korean and Japanese Method by Colourist\'s Experts. International Certification, Real Client Practice, and Direct Mentorship.';

// List of student graduation photos
$student_photos = [];
for ($i = 1; $i <= 17; $i++) {
    $student_photos[] = "assets/media/students/student_{$i}.jpg";
}

$student_sets = [
    ['type' => 'prev', 'is_clone' => true],
    ['type' => 'none', 'is_clone' => false],
    ['type' => 'next', 'is_clone' => true],
];

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Kolase Foto (full-bleed, tanpa padding) -->
<section class="wk-hero-full-sec" aria-labelledby="wkHeroTitle">
  <div class="wk-hero-collage-wrap">
    <img src="<?= e($media['workshop.hero'] ?? 'assets/media/workshop/workshop_hero_collage.jpg') ?>" 
         alt="Colourist Workshop Session Collage" 
         class="wk-hero-collage-img" 
         width="916" height="345">
    <div class="wk-hero-collage-fade" aria-hidden="true"></div>
  </div>

  <div class="wk-hero-title-wrap">
    <h1 id="wkHeroTitle" class="wk-hero-main-title">Workshop</h1>
    <p class="wk-hero-main-sub">
      Professional Colour Analyst Certification - Korean and Japanese Method by Colourist's Expert
    </p>
  </div>
</section>

<!-- 2. Video Tengah (9:16, lebar ±270px desktop, 62% mobile, jarak 60px atas-bawah) -->
<section class="sec wk-video-sec" aria-label="Workshop Overview Video">
  <div class="wk-video-wrap">
    <div class="wk-autoplay-player" data-workshop-autoplay>
      <video autoplay muted loop playsinline preload="auto" poster="<?= e($media['workshop.video_poster'] ?? 'assets/media/workshop/workshop_video_poster.jpg') ?>" class="wk-autoplay-video">
        <source src="<?= e($media['workshop.video'] ?? 'assets/media/workshop_video.mp4') ?>" type="video/mp4">
        Your browser does not support HTML5 video.
      </video>

      <!-- Small Mute/Unmute Toggle in bottom right -->
      <button type="button" class="wk-mute-btn" aria-label="Mute or unmute">
        <svg class="icon-muted" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
          <line x1="23" y1="9" x2="17" y2="15"></line>
          <line x1="17" y1="9" x2="23" y2="15"></line>
        </svg>
        <svg class="icon-unmuted" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
          <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
          <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
          <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
        </svg>
      </button>
    </div>
  </div>
</section>

<!-- 3. Section Beige (#f5f3f1, full-bleed, padding 60px 8vw) -->
<section class="wk-beige-sec" aria-label="Why Join and What You Get">
  <div class="wk-beige-inner">
    <!-- Baris Atas 2 Kolom: Why join? + Foto Grup -->
    <div class="wk-why-grid">
      <div class="wk-why-text">
        <h2 class="wk-why-title">Why join?</h2>
        <p class="wk-why-p">
          The beauty and fashion world is shifting— personalization is the new luxury.
        </p>
        <p class="wk-why-p">
          Searches for “personal color” in Asia are up 350%. Top pros are using color analysis, and 70% of clients will pay more for it.
        </p>
      </div>
      <div class="wk-why-media">
        <img src="<?= e($media['workshop.group'] ?? 'assets/media/workshop/workshop_group.jpg') ?>" 
             alt="Colourist Workshop Certification Alumni Group" 
             class="wk-why-img" 
             loading="lazy">
      </div>
    </div>

    <!-- What You Get: Judul + 4 Kolom -->
    <div class="wk-what-block">
      <h2 class="wk-what-title">What you get</h2>
      <div class="wk-what-grid">
        <div class="wk-what-col">
          <h3 class="wk-what-heading">International Certification</h3>
          <p class="wk-what-desc">
            Get international certificate by Japanese mentor for Japanese Color Analysis Method
          </p>
        </div>

        <div class="wk-what-col">
          <h3 class="wk-what-heading">Real Client Practice</h3>
          <p class="wk-what-desc">
            Learn exactly how to turn theory into results through real client practice.
          </p>
        </div>

        <div class="wk-what-col">
          <h3 class="wk-what-heading">Direct Mentorship</h3>
          <p class="wk-what-desc">
            Get personal feedback from Ms. Zerlinda. Ask anything. Level up fast.
          </p>
        </div>

        <div class="wk-what-col">
          <h3 class="wk-what-heading">Exclusive Workshop &amp; Hands-On Training</h3>
          <p class="wk-what-desc">
            Train with Japanese color expert. Learn to drape, analyze, and classify tones with expert guidance.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 4. Colourist Student Section -->
<section class="sec wk-student-sec" aria-labelledby="studentHeading">
  <h2 id="studentHeading" class="wk-student-main-title">Colourist Student</h2>

  <!-- Carousel Foto Student 9:16 (Infinite Loop & Draggable) -->
  <div class="wk-student-carousel-wrap">
    <button type="button" class="wk-student-arrow arrow-prev" id="studentPrev" aria-label="Previous student photo">&lt;</button>

    <div class="wk-student-track-container">
      <div class="wk-student-fade fade-left" aria-hidden="true"></div>
      <div class="wk-student-track" id="studentTrack" tabindex="0" role="region" aria-label="Colourist Student Carousel">
        <?php foreach ($student_sets as $s_set): ?>
          <?php foreach ($student_photos as $idx => $photo): ?>
            <div class="wk-student-card" data-student-card data-index="<?= $idx ?>" data-clone="<?= $s_set['type'] ?>"<?= $s_set['is_clone'] ? ' aria-hidden="true"' : '' ?>>
              <img src="<?= e($photo) ?>" alt="Colourist Student Graduate <?= $idx + 1 ?>" loading="lazy" class="wk-student-img">
            </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>
      <div class="wk-student-fade fade-right" aria-hidden="true"></div>
    </div>

    <button type="button" class="wk-student-arrow arrow-next" id="studentNext" aria-label="Next student photo">&gt;</button>
  </div>

  <p class="wk-student-stats">
    Trained 60+ Colour Analysts from Indonesia, Brunei, Malaysia, Singapore, Australia, and Thailand through professional Korean and Japanese colour analysis certification programmes.
  </p>
</section>

<!-- 5. CTA dengan Foto Background (full-bleed, tinggi ±520px desktop / 360px mobile) -->
<section class="wk-cta-sec" aria-label="Become a Certified Colour Analyst">
  <div class="wk-cta-bg-wrap">
    <img src="<?= e($media['workshop.cta_bg'] ?? 'assets/media/workshop/workshop_cta_bg.jpg') ?>" 
         alt="" 
         class="wk-cta-bg-img" 
         loading="lazy">
    <div class="wk-cta-overlay"></div>
    <div class="wk-cta-fade"></div>
  </div>

  <div class="wk-cta-content">
    <a href="book?type=workshop" class="btn-wk-cta">
      BECOME A CERTIFIED<br>COLOUR ANALYST
    </a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
