<?php
/**
 * Workshop Page — Colourist
 * Redesign sesuai Tab 6:
 * - Hero 2 kolom: kiri teks judul besar, kanan foto workshop.hero (4:3)
 * - Video 9:16 tengah
 * - Section beige (#f5f3f1): Why join? + foto grup, What you get (4 kolom)
 * - Colourist Student: carousel 9:16 + teks stats + CTA button
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Workshop & Certification — Professional Korean & Japanese Method';
$page_description = 'Professional Colour Analyst Certification - Korean and Japanese Method by Colourist\'s Experts. International Certification, Real Client Practice, and Direct Mentorship.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Workshop Hero Section (2 Columns) -->
<section class="wk-hero-sec" aria-labelledby="wkHeroTitle">
  <div class="wk-hero-inner">
    <div class="wk-hero-text">
      <h1 id="wkHeroTitle" class="wk-hero-title">Workshop</h1>
      <p class="wk-hero-sub">
        Professional Colour Analyst Certification - Korean and Japanese Method by Colourist's Expert
      </p>
    </div>
    <div class="wk-hero-media">
      <?= media('workshop.hero', [
        'aspect' => '4/3',
        'alt' => 'Colourist Workshop Certification Ceremony',
        'class' => 'wk-hero-img'
      ]) ?>
    </div>
  </div>
</section>

<!-- 2. Centered Video Section (9:16) -->
<section class="sec wk-video-sec" aria-label="Workshop Overview Video">
  <div class="wk-video-wrap">
    <?= video_player('workshop.video', [
      'aspect' => '9/16',
      'alt' => 'Colourist Workshop Training Atmosphere',
      'class' => 'wk-video-media'
    ]) ?>
  </div>
</section>

<!-- 3. Beige Fullwidth Section (#f5f3f1) -->
<section class="wk-beige-sec" aria-label="Why Join and What You Get">
  <div class="wk-beige-inner">
    <!-- Why Join? (2 Columns) -->
    <div class="why-join-grid">
      <div class="why-join-text">
        <h2 class="why-join-title">Why join?</h2>
        <p class="why-join-p">The beauty and fashion world is shifting— personalization is the new luxury.</p>
        <p class="why-join-p">Searches for “personal color” in Asia are up 350%. Top pros are using color analysis, and
          70% of clients will pay more for it.</p>
      </div>
      <div class="why-join-media">
        <?= media('workshop.group', [
          'alt' => 'Colourist Workshop Group Alumni',
          'class' => 'why-join-img'
        ]) ?>
      </div>
    </div>

    <!-- What You Get (4 Columns) -->
    <div class="what-get-block">
      <h2 class="what-get-main-title">What you get</h2>
      <div class="what-get-grid">
        <div class="what-get-item">
          <h3 class="what-get-heading">International Certification</h3>
          <p class="what-get-desc">Get international certificate by Japanese mentor for Japanese Color Analysis Method
          </p>
        </div>
        <div class="what-get-item">
          <h3 class="what-get-heading">Real Client Practice</h3>
          <p class="what-get-desc">Learn exactly how to turn theory into results through real client practice.</p>
        </div>
        <div class="what-get-item">
          <h3 class="what-get-heading">Direct Mentorship</h3>
          <p class="what-get-desc">Get personal feedback from Ms. Zerlinda. Ask anything. Level up fast.</p>
        </div>
        <div class="what-get-item">
          <h3 class="what-get-heading">Exclusive Workshop &amp; Hands-On Training</h3>
          <p class="what-get-desc">Train with Japanese color expert. Learn to drape, analyze, and classify tones with
            expert guidance.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 4. Colourist Student Section -->
<section class="sec student-sec" aria-labelledby="studentHeading">
  <h2 id="studentHeading" style="font-size: 32px; margin-bottom: 28px;">Colourist Student</h2>

  <!-- 9:16 Video / Foto Carousel -->
  <div class="student-carousel-container">
    <button type="button" class="student-arrow arrow-prev" id="studentPrev"
      aria-label="Previous student video">&lt;</button>
    <div class="student-track-wrap">
      <div class="student-track" id="studentTrack">
        <?php for ($i = 1; $i <= 8; $i++): ?>
          <div class="student-card">
            <img src="assets/media/students/student_<?= $i ?>.jpg" alt="Colourist Student <?= $i ?>" loading="lazy" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <button type="button" class="student-arrow arrow-next" id="studentNext"
      aria-label="Next student video">&gt;</button>
  </div>

  <p class="student-stats-text">
    Trained 60+ Colour Analysts from Indonesia, Brunei, Malaysia, Singapore, Australia, and Thailand through
    professional Korean and Japanese colour analysis certification programmes.
  </p>

  <div style="margin-top: 32px;">
    <a href="book?type=workshop" class="btn btn-student-cta">
      BECOME A CERTIFIED COLOUR ANALYST
    </a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>