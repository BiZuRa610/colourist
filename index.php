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
  <span class="eyebrow" style="letter-spacing: .3em;">WELCOME TO THE</span>
  <h2 id="journeyHeading" class="journey-main-title">COLOURIST</h2>
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
      $carousel_sets = [
        ['type' => 'prev', 'is_clone' => true],
        ['type' => 'none', 'is_clone' => false],
        ['type' => 'next', 'is_clone' => true],
      ];
      ?>
      <?php foreach ($carousel_sets as $c_set): ?>
        <?php foreach (array_values($services) as $idx => $srv): ?>
          <?php
            $video_src = $media[$srv['media_slot']] ?? '';
            $poster_src = $media[$srv['media_slot'] . '_poster'] ?? '';
            $is_clone = $c_set['is_clone'];
          ?>
          <div class="exp-carousel-card" data-exp-card data-slug="<?= e($srv['slug']) ?>" data-index="<?= $idx ?>" data-clone="<?= $c_set['type'] ?>"<?= $is_clone ? ' aria-hidden="true"' : '' ?>>
            <div class="exp-card-media-wrap">
              <?php if ($is_clone): ?>
                <video playsinline preload="none" poster="<?= e($poster_src) ?>" class="exp-card-video" data-src="<?= e($video_src) ?>">
                  <source data-src="<?= e($video_src) ?>" type="video/mp4">
                  Your browser does not support HTML5 video.
                </video>
              <?php else: ?>
                <video playsinline preload="metadata" poster="<?= e($poster_src) ?>" class="exp-card-video">
                  <source src="<?= e($video_src) ?>" type="video/mp4">
                  Your browser does not support HTML5 video.
                </video>
              <?php endif; ?>

              <!-- Bottom Gradient Overlay -->
              <div class="exp-card-gradient"></div>

              <!-- Bottom Controls Bar -->
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

                <!-- Play / Pause Button -->
                <button type="button" class="exp-ctrl-btn exp-ctrl-play" aria-label="Play or pause <?= e($srv['title']) ?>"<?= $is_clone ? ' tabindex="-1"' : '' ?>>
                  <svg class="icon-play" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                    <polygon points="6,4 20,12 6,20"/>
                  </svg>
                  <svg class="icon-pause" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="display:none;">
                    <rect x="6" y="4" width="4" height="16"/>
                    <rect x="14" y="4" width="4" height="16"/>
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

<!-- 4. Asia's Leading Color Expert Hero Banner (Full-Bleed) -->
<section class="home-leader-banner-sec" aria-labelledby="leaderHeading" style="background-image: url('<?= e($media['home.leader_bg'] ?? 'assets/media/leader_bg.jpg') ?>');">
  <div class="home-leader-banner-overlay"></div>
  <div class="home-leader-banner-content">
    <h2 id="leaderHeading" class="home-leader-title">Asia's Leading Color Expert</h2>
    <p class="home-leader-subtitle">The expert in Personal Color Analysis, Styling, and Beauty Transformation</p>
  </div>
</section>

<!-- 5. Transformations Section (3 Before/After Cards) -->
<section class="sec" style="padding-top: 50px; padding-bottom: 50px;" aria-labelledby="homeTransHeading">
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
        <!-- Before / After Side-by-Side (1:1 ratio each, grid 2 col, gap 8px) -->
        <div class="ba-pair">
          <div class="ba-item">
            <?php if (!empty($st['before_slot']) && !empty($media[$st['before_slot']])): ?>
              <img src="<?= e($media[$st['before_slot']]) ?>" alt="<?= e($st['title']) ?> Before" loading="lazy">
            <?php else: ?>
              <span class="ba-empty-label">before</span>
            <?php endif; ?>
          </div>
          <div class="ba-item">
            <?php if (!empty($st['after_slot']) && !empty($media[$st['after_slot']])): ?>
              <img src="<?= e($media[$st['after_slot']]) ?>" alt="<?= e($st['title']) ?> After" loading="lazy">
            <?php else: ?>
              <span class="ba-empty-label">after</span>
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

        <div>
          <a href="transformation/<?= e($st['slug']) ?>" class="home-trans-link">
            Read the full story
          </a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- 6. Why Colourist? Section (3 Italic Lines Centered) -->
<section class="sec why-sec" aria-labelledby="homeWhyHeading">
  <h2 id="homeWhyHeading" style="font-size: 32px; margin-bottom: 28px;">Why Colourist?</h2>
  <div class="why-text-block">
    <p class="why-line">Colourist is Asia's Leading &amp; No.1 Color Expert.</p>
    <p class="why-line">Located in ASHTA &amp; Kuala Lumpur, we are dedicated to make Indonesians feel confident in
      their unique color.</p>
    <p class="why-line">Trusted by thousands of clients, brands, and publications globally and locally, we deliver real
      transformations through the power of color.</p>
  </div>
</section>

<!-- 7. Fullwidth CTA Section -->
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

<?php include __DIR__ . '/includes/footer.php'; ?>