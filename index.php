<?php
/**
 * Home Page — Colourist
 * Asia & Indonesia's No. 1 Color Expert
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist — Asia & Indonesia\'s No.1 Color Expert';
$page_description = 'Helping people feel confident through best colors. Discover your true seasonal palette, private styling, makeup masterclass, and custom lipstick at ASHTA District 8 SCBD.';

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Fullpage 100svh Section (Hermes Style) -->
<section class="hero-wrapper hero-fullpage" aria-label="Hero Video">
  <?= media('hero.home', [
    'class' => 'hero-video-bg',
    'aspect' => '',
    'alt' => 'Colourist Studio Experience',
    'label' => 'video: hero_portrait.mp4'
  ]) ?>
  <div class="hero-overlay-hermes">
    <h1 class="hero-title">Helping people feel <b>confident</b> through best colors.</h1>
    <p class="hero-subtitle">ASIA &amp; INDONESIA'S NO.1 COLOR EXPERT</p>
  </div>
  <a href="#journeySection" class="hero-scroll-indicator" aria-label="Scroll to Colourist Journey">
    <span class="scroll-text">SCROLL</span>
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="M6 9l6 6 6-6" />
    </svg>
  </a>
</section>

<!-- 2. The Colourist Journey Section -->
<section class="sec journey-sec" id="journeySection" aria-labelledby="journeyHeading">
  <span class="eyebrow" style="letter-spacing: .4em;">WELCOME TO THE</span>
  <h2 id="journeyHeading" class="journey-main-title"><img src="<?= e($media['brand.logo_black'] ?? 'assets/media/logos/logo_colourist.png') ?>" alt="Colourist" height="28" style="display:inline-block;vertical-align:middle;"></h2>
  <span class="journey-subtitle">JOURNEY</span>

  <div class="journey">
    <?php foreach ($journey_steps as $step): ?>
      <a href="experiences#<?= e($step['slug']) ?>" class="step" aria-label="<?= e($step['alt']) ?>">
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
          <img src="<?= e($step['seal']) ?>" alt="<?= e($step['alt']) ?> Stamp" class="step-seal-img" width="58"
            height="58" loading="lazy">
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<!-- 3. Experiences Cards Section (Olaplex-Style Horizontal Video Carousel) -->
<section class="sec pt-0 home-exp-sec" aria-labelledby="experiencesHeading">
  <h2 id="experiencesHeading" style="font-size: 32px; margin-bottom: 24px;">Colourist Experience</h2>

  <!-- Full-bleed Carousel Wrapper -->
  <div class="exp-carousel-wrapper">
    <button type="button" class="exp-carousel-arrow arrow-prev" id="expCarouselPrev" aria-label="Previous experience">&lt;</button>

    <div class="exp-carousel-track" id="expCarouselTrack" tabindex="0" role="region" aria-label="Experiences Carousel">
      <?php
      // Home carousel: 4 services (exclude signature-experience)
      $home_carousel_slugs = ['personal-color-analysis', 'private-styling', 'makeup-masterclass', 'custom-lipstick'];
      $home_carousel_services = [];
      foreach ($home_carousel_slugs as $cs) {
          if (isset($services[$cs])) $home_carousel_services[] = $services[$cs];
      }
      $carousel_sets = [
        ['type' => 'prev', 'is_clone' => true],
        ['type' => 'none', 'is_clone' => false],
        ['type' => 'next', 'is_clone' => true],
      ];
      ?>
      <?php foreach ($carousel_sets as $c_set): ?>
        <?php foreach ($home_carousel_services as $idx => $srv): ?>
          <?php
            $video_src = $media[$srv['media_slot']] ?? '';
            $poster_src = $media[$srv['media_slot'] . '_poster'] ?? '';
            $is_clone = $c_set['is_clone'];
          ?>
          <div class="exp-carousel-card" data-exp-card data-slug="<?= e($srv['slug']) ?>" data-index="<?= $idx ?>" data-clone="<?= $c_set['type'] ?>"<?= $is_clone ? ' aria-hidden="true"' : '' ?>>
            <div class="exp-card-media-wrap">
              <video playsinline preload="<?= $is_clone ? 'none' : 'metadata' ?>" poster="<?= e($poster_src) ?>" class="exp-card-video" src="<?= e($video_src) ?>">
                <source src="<?= e($video_src) ?>" type="video/mp4">
                Your browser does not support HTML5 video.
              </video>

              <!-- Center Big Play Button (±72px desktop / 56px mobile) -->
              <button type="button" class="exp-center-play-btn" aria-label="Play <?= e($srv['title']) ?>"<?= $is_clone ? ' tabindex="-1"' : '' ?>>
                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                  <polygon points="7,4 20,12 7,20"/>
                </svg>
              </button>

              <!-- Bottom Gradient Overlay -->
              <div class="exp-card-gradient"></div>

              <!-- Bottom Controls Bar (Mute left, Explore right) -->
              <div class="exp-card-controls">
                <!-- Mute Toggle -->
                <button type="button" class="exp-ctrl-btn exp-ctrl-mute" aria-label="Mute or unmute"<?= $is_clone ? ' tabindex="-1"' : '' ?>>
                  <svg class="icon-muted" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                    <line x1="23" y1="9" x2="17" y2="15"></line>
                    <line x1="17" y1="9" x2="23" y2="15"></line>
                  </svg>
                  <svg class="icon-unmuted" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                    <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
                  </svg>
                </button>

                <!-- Explore Pill Button -->
                <a href="experiences#<?= e($srv['slug']) ?>" class="exp-ctrl-pill" aria-label="Explore <?= e($srv['title']) ?>"<?= $is_clone ? ' tabindex="-1"' : '' ?>>
                  <span>EXPLORE</span>
                  <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                  </svg>
                </a>
              </div>
            </div>

            <!-- Title below card (serif, centered) -->
            <h3 class="exp-carousel-title">
              <a href="experiences#<?= e($srv['slug']) ?>"<?= $is_clone ? ' tabindex="-1"' : '' ?>>
                <?= e($srv['title']) ?>
              </a>
            </h3>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>

    <button type="button" class="exp-carousel-arrow arrow-next" id="expCarouselNext" aria-label="Next experience">&gt;</button>
  </div>

  <div style="margin-top: 36px; text-align: center;">
    <a href="experiences" class="btn" style="padding: 11px 28px; font-size: 9px; letter-spacing: .2em;">
      Explore Experiences
    </a>
  </div>
</section>

<!-- 4. Asia's Leading Color Expert Hero Banner (Full-Bleed with Video) -->
<section class="home-leader-banner-sec" aria-labelledby="leaderHeading" style="background-image: url('<?= e($media['home.leader_bg'] ?? 'assets/media/leader_bg.jpg') ?>');">
  <video autoplay muted loop playsinline preload="auto" poster="<?= e($media['home.leader_bg'] ?? 'assets/media/leader_bg.jpg') ?>" class="leader-banner-video">
    <source src="assets/media/leader_banner_video.mp4" type="video/mp4">
  </video>
  <div class="home-leader-banner-overlay"></div>
  <div class="home-leader-banner-content">
    <h2 id="leaderHeading" class="home-leader-title">Asia's Leading Color Expert</h2>
    <p class="home-leader-subtitle">The expert in Personal Color Analysis, Styling, and Beauty Transformation</p>
  </div>
</section>

<!-- 5. Transformations Section (Collage + 3 Columns) -->
<section class="sec home-trans-sec" aria-labelledby="homeTransHeading">
  <h2 id="homeTransHeading" class="home-trans-main-title">Transformations</h2>
  <p class="home-trans-subtitle">
    Every transformation begins with color.
  </p>

  <!-- Centered Collage Image -->
  <div class="home-trans-collage-wrap">
    <img src="<?= e($media['home.transformations_collage'] ?? 'assets/media/transformations_collage.jpg') ?>" 
         alt="" 
         class="home-trans-collage-img" 
         loading="lazy">
  </div>

  <!-- 3 Text Columns (no photo) -->
  <div class="home-trans-cols">
    <article class="home-trans-col">
      <h3 class="home-trans-title">
        <a href="transformation/she-spent-12-years">She Spent 12 Years Feeling Insecure. When Did She Start Feeling Confident?</a>
      </h3>
      <p class="home-trans-quote">
        &ldquo;12 years of feeling insecure about my appearance, I never imagined that discovering the right colours could help me see myself differently.&rdquo;
      </p>
      <div>
        <a href="transformation/she-spent-12-years" class="home-trans-link">
          Read the full story
        </a>
      </div>
    </article>

    <article class="home-trans-col">
      <h3 class="home-trans-title">
        <a href="transformation/six-years-in-black">Six Years in Black</a>
      </h3>
      <p class="home-trans-quote">
        &ldquo;After six years of struggling with acne, I thought wearing black was the only way to feel comfortable in my own skin&rdquo;
      </p>
      <div>
        <a href="transformation/six-years-in-black" class="home-trans-link">
          Read the full story
        </a>
      </div>
    </article>

    <article class="home-trans-col">
      <h3 class="home-trans-title">
        <a href="transformation/rediscovering-herself">Rediscovering Herself After Motherhood</a>
      </h3>
      <p class="home-trans-quote">
        &ldquo;After becoming a mother, so much of my attention went to my baby. Somewhere along the way, I stopped prioritising myself. I wanted to feel beautiful and confident again, not just as a mother, but as a woman.&rdquo;
      </p>
      <div>
        <a href="transformation/rediscovering-herself" class="home-trans-link">
          Read the full story
        </a>
      </div>
    </article>
  </div>
</section>

<!-- 6 & 7. Why Colourist + CTA (Combined Seamless Block) -->
<div class="home-why-cta-combined">
  <section class="sec why-sec" aria-labelledby="homeWhyHeading">
    <h2 id="homeWhyHeading" style="font-size: 34px; margin-bottom: 24px;">Why Colourist?</h2>
    <div class="why-text-block">
      <p class="why-line">Colourist is Asia's Leading &amp; No.1 Color Expert.</p>
      <p class="why-line">Located in ASHTA &amp; Kuala Lumpur, we are dedicated to make Indonesians feel confident in their unique color.</p>
      <p class="why-line">Trusted by thousands of clients, brands, and publications globally and locally, we deliver real transformations through the power of color.</p>
    </div>
    <div class="faces-fade-wrap">
      <img src="assets/media/why_faces.png" alt="" class="why-faces-img" loading="lazy">
    </div>
  </section>

  <!-- Fullwidth CTA Section -->
  <section class="home-cta-sec" aria-labelledby="ctaHeading">
    <div class="home-cta-content">
      <h2 id="ctaHeading" class="home-cta-title">
        Your Transformation Journey<br>Begins Here
      </h2>
      <div>
        <a href="book" class="btn btn-cta-outline">
          BOOK NOW
        </a>
      </div>
    </div>
  </section>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>