<?php
/**
 * What is it? (About Page) — Colourist
 * Full Design from Canva Page 11:
 * 1. What is Colour Analysis? (4 Quadrants Donut Diagram)
 * 2. Personal Colour Analysis (PCA Definition & Benefits)
 * 3. Introducing Colours (Warm vs Cool, 3 Factors, 4 Seasons)
 * 4. Our Stand on Personal Colour at Colourist Indonesia (Philosophy & Our Approach)
 * 5. Concepts to Personal Colour Around the World (Timeline, Systems & Lifetime Investment)
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

<!-- 2. Personal Colour Analysis Explanation & Benefits Section -->
<section class="pca-explanation-sec" aria-labelledby="pcaExpHeading">
  <div class="pca-explanation-inner">
    <div class="pca-exp-text">
      <h2 id="pcaExpHeading" class="pca-exp-title">Personal Colour Analysis</h2>
      <div class="pca-exp-divider" aria-hidden="true"></div>

      <p class="pca-exp-p">
        Personal Colour Analysis (PCA) helps you find colours that <strong>harmonize</strong> with your natural color,
        features, your skin, hair, and eyes, so you can look your best effortlessly.
      </p>

      <div class="pca-harmony-badge-wrap">
        <span class="pca-harmony-badge">COLOUR ANALYSIS = HARMONY</span>
      </div>

      <p class="pca-exp-p">
        This analysis provides valuable insights into the colours that suit you best and how to mix and match them to
        achieve a harmonious look.
      </p>

      <!-- Benefits Sub-section -->
      <div class="pca-benefits-block">
        <div class="pca-sub-badge">What are the Benefits ?</div>
        <ul class="pca-checklist">
          <li>
            <span class="chk-icon">&#10003;</span>
            <div><strong>Boost confidence.</strong> Look and feel more put together with colours that truly complement
              you.</div>
          </li>
          <li>
            <span class="chk-icon">&#10003;</span>
            <div><strong>Strengthen your personal brand.</strong> Whether in your career or on social media, the right
              colours help you stand out effortlessly.</div>
          </li>
          <li>
            <span class="chk-icon">&#10003;</span>
            <div><strong>Make smarter fashion &amp; makeup choices.</strong> No more guessing or wasting money on
              colours that don't flatter you.</div>
          </li>
          <li>
            <span class="chk-icon">&#10003;</span>
            <div><strong>Enhance your natural beauty.</strong> Wear shades that make your skin look radiant and fresh.
            </div>
          </li>
        </ul>
      </div>

      <div style="margin-top: 28px;">
        <a href="book" class="btn btn-solid" style="padding: 12px 32px; font-size: 10px;">
          Book Now
        </a>
      </div>
    </div>

    <div class="pca-exp-media">
      <img src="assets/media/what_is_it_pca.jpg" alt="Personal Colour Analysis session at Colourist" class="pca-exp-img"
        loading="lazy">
    </div>
  </div>
</section>

<!-- 3. Introducing Colours Section (Warm vs Cool, Factors & 4 Seasons) -->
<section class="sec pca-intro-colours-sec" aria-labelledby="introColoursHeading">
  <div class="about-container">
    <h2 id="introColoursHeading" class="about-sec-title">Introducing Colours</h2>
    <p class="about-sec-subtitle">
      In colour theory, colours are divided into two main categories based on undertone:
    </p>

    <!-- Warm vs Cool Comparison -->
    <div class="pca-warm-cool-grid">
      <div class="pca-tone-card tone-warm">
        <div class="tone-card-header">
          <div class="tone-swatch-circle warm-circle"></div>
          <h3 class="tone-heading">Warm</h3>
        </div>
        <p class="tone-desc">All colours with a <strong>warm</strong> temperature.</p>
        <p class="tone-sub">Warm-toned colours have a yellow or golden base. People with warm undertones have yellow or
          golden undertones.</p>
      </div>

      <div class="pca-tone-divider">
        <span>and</span>
      </div>

      <div class="pca-tone-card tone-cool">
        <div class="tone-card-header">
          <div class="tone-swatch-circle cool-circle"></div>
          <h3 class="tone-heading">Cool</h3>
        </div>
        <p class="tone-desc">All colours with a <strong>cool</strong> temperature.</p>
        <p class="tone-sub">Cool-toned colours have a blue or pink base. People with cool undertones have blue or pink
          undertones.</p>
      </div>
    </div>

    <!-- 3 Key Factors -->
    <div class="pca-factors-block">
      <p class="factors-intro">
        From this warm and cool undertone concept, the <strong>4 Season Colour Analysis is developed.</strong> Each
        season is categorized based on three key factors:
      </p>
      <div class="factors-pills">
        <span class="factor-pill">&bull; Temperature (Warm vs. Cool)</span>
        <span class="factor-pill">&bull; Clarity (Bright vs. Muted)</span>
        <span class="factor-pill">&bull; Depth (Light vs. Deep)</span>
      </div>
    </div>

    <!-- 4 Season Characteristics Grid -->
    <div class="pca-seasons-char-grid">
      <div class="season-char-card">
        <div class="season-donut donut-spring mini-donut"></div>
        <h4>SPRING</h4>
        <ul>
          <li>&bull; Warm</li>
          <li>&bull; Bright</li>
          <li>&bull; Light</li>
        </ul>
      </div>

      <div class="season-char-card">
        <div class="season-donut donut-summer mini-donut"></div>
        <h4>SUMMER</h4>
        <ul>
          <li>&bull; Cool</li>
          <li>&bull; Muted</li>
          <li>&bull; Light</li>
        </ul>
      </div>

      <div class="season-char-card">
        <div class="season-donut donut-autumn mini-donut"></div>
        <h4>AUTUMN</h4>
        <ul>
          <li>&bull; Warm</li>
          <li>&bull; Muted</li>
          <li>&bull; Deep</li>
        </ul>
      </div>

      <div class="season-char-card">
        <div class="season-donut donut-winter mini-donut"></div>
        <h4>WINTER</h4>
        <ul>
          <li>&bull; Cool</li>
          <li>&bull; Bright</li>
          <li>&bull; Deep</li>
        </ul>
      </div>
    </div>

    <p class="factors-footnote">
      These factors determine which season a colour belongs to based on the natural undertones of an individual.
    </p>
  </div>
</section>

<!-- 4. Our Stand on Personal Colour at Colourist Indonesia -->
<section class="pca-stand-sec" aria-labelledby="ourStandHeading">
  <div class="about-container">
    <div class="stand-header-wrap">
      <h2 id="ourStandHeading" class="about-sec-title">Our Stand on Personal Colour at Colourist Indonesia</h2>
      <p class="stand-italic-lead">We believe that Colour unlocks Confidence</p>
    </div>

    <div class="stand-two-col">
      <div class="stand-text-col">
        <blockquote class="stand-quote">
          &ldquo;Indonesians have one of the most beautiful and diverse natural tones. Coupled with our rich culture of
          batik and hijab; my mission is to help Indonesians become the best versions of themselves by leveraging their
          best colour.&rdquo;
        </blockquote>

        <p class="stand-p">
          Learning and working with various experts around the world, we have seen various techniques.
        </p>
        <p class="stand-p">
          Colourist aims to take the learning from global experts from Japan, Korea, Hong Kong, Thailand, and Australia,
          to create the <strong>highest benchmark</strong> that is the most relevant for Indonesians.
        </p>
        <p class="stand-p">
          Going beyond by adapting these systems to suit the diverse skin tones and unique beauty of Indonesians, we
          believe every individual's beauty should be celebrated.
        </p>

        <!-- Our Approach Checkpoints -->
        <div class="stand-approach-wrap">
          <h3 class="approach-heading">Our Approach :</h3>
          <ul class="pca-checklist approach-list">
            <li>
              <span class="chk-icon">&#10003;</span>
              <div><strong>Personal Colour should empower</strong> by helping people find what suits them, not limiting
                beauty or exclusivity.</div>
            </li>
            <li>
              <span class="chk-icon">&#10003;</span>
              <div><strong>Leveraging our international experience</strong>, we're creating the highest benchmark for
                Indonesians by understanding Indonesian skin tones and characteristics.</div>
            </li>
            <li>
              <span class="chk-icon">&#10003;</span>
              <div><strong>Education &gt; Trends.</strong> Personal Colour is about understanding the science of colour
                harmony and how it interacts with individual skin tones.</div>
            </li>
          </ul>
        </div>
      </div>

      <div class="stand-media-col">
        <div class="stand-photo-card">
          <img src="assets/media/ashta_studio_tour.jpg" alt="Colourist Studio consultation" class="stand-photo"
            loading="lazy">
        </div>
        <div class="stand-photo-card" style="margin-top: 18px;">
          <img src="assets/media/partners_celeb_1.jpg" alt="Clients discovering color harmony" class="stand-photo"
            loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 5. Concepts to Personal Colour Around the World -->
<section class="sec pca-world-sec" aria-labelledby="worldConceptHeading">
  <div class="about-container">
    <h2 id="worldConceptHeading" class="about-sec-title">Concepts to Personal Colour Around the World</h2>
    <p class="about-sec-subtitle">
      The evolution of colour harmony theory across centuries and continents:
    </p>

    <!-- Timeline Grid -->
    <div class="pca-timeline-grid">
      <div class="timeline-step">
        <div class="t-era">Renaissance</div>
        <div class="t-desc">Leonardo da Vinci's Colour Theory — Focus on harmony and contrast</div>
      </div>
      <div class="timeline-step">
        <div class="t-era">17th Century</div>
        <div class="t-desc">Newton's prism experiments — creation of the colour wheel</div>
      </div>
      <div class="timeline-step">
        <div class="t-era">Early 19th</div>
        <div class="t-desc">Goethe &amp; Chevreul's principle of colour harmony</div>
      </div>
      <div class="timeline-step">
        <div class="t-era">1920</div>
        <div class="t-desc">Itten's seasonal colour — Caygill's Personal Color System</div>
      </div>
      <div class="timeline-step">
        <div class="t-era">1980</div>
        <div class="t-desc">Color Me Beautiful — Popularizes seasonal colour analysis in the West</div>
      </div>
      <div class="timeline-step">
        <div class="t-era">1990s–2000s</div>
        <div class="t-desc">East Asian systems introduce detailed tone-based analysis</div>
      </div>
    </div>

    <p class="timeline-roots">
      The roots of Colour analysis method have been around since <strong>1920</strong> coined by <strong>Johannes
        Itten</strong>. Since then, experts have adapted methods to local beauty standards and created various colour
      systems.
    </p>

    <!-- Systems Cards Grid -->
    <div class="pca-systems-grid">
      <div class="system-card">
        <h3>4-Season Colour Analysis</h3>
        <div class="system-meta">1970s by Carole Jackson</div>
        <p>Popular in the US, based on Johannes Itten's color theory. Divides individuals into Spring, Summer, Autumn,
          and Winter based on warm/cool and light/dark characteristics.</p>
      </div>

      <div class="system-card">
        <h3>12-Season Colour Analysis</h3>
        <div class="system-meta">1980s by Suzanne Caygill &amp; Sci \ ART</div>
        <p>Popular worldwide, an extension of the 4-season system. Introduces subcategories like Light Spring, Soft
          Autumn, Cool Summer, and Bright Winter for more precise colour matching.</p>
      </div>

      <div class="system-card">
        <h3>Japanese PCCS</h3>
        <div class="system-meta">1960s by Japan Color Research Institute</div>
        <p>Developed in Japan, used in design, fashion, and beauty. Classifies colors into tonal families of 4 seasons
          with 3 sub-seasons each (Cool, Soft, Light, Warm, Deep, Muted, and Bright tones).</p>
      </div>

      <div class="system-card">
        <h3>Korean Personal Colour Systems</h3>
        <div class="system-meta">2010s by Major Fashion-Beauty Experts</div>
        <p>Introduces micro-tonal grading: Pale, Light, Clear Bright, Strong Vivid, Muted Soft, Dull, Middle, Deep, and
          Dark tones tailored for Asian skin depth.</p>
      </div>

      <div class="system-card">
        <h3>Tonal Colour System</h3>
        <div class="system-meta">1990s by David Zyla</div>
        <p>Popular in the UK, based on the Colour Theory of Albert Munsell. Uses 6 dominant colouring types: Light,
          Deep, Warm, Cool, Clear, and Soft.</p>
      </div>
    </div>

    <!-- Philosophy & Lifetime Investment Callout Box -->
    <div class="pca-philosophy-box">
      <p class="philosophy-p">
        In Korea alone, leading trending centers offer different methods — some even give different seasons for
        different parts of a client's body (hair, makeup, clothes) which can disrupt harmony.
      </p>
      <p class="philosophy-p">
        These interpretations have deviated from the core principle of <strong>HARMONY</strong> and from achieving a
        lifetime result. Such techniques favor frequent visits, whereas <strong>Personal Colour should be a single
          lifetime investment</strong> based on your natural undertones that you are born with.
      </p>

      <div class="philosophy-highlight">
        <h4>Color Analysis and what we believe in is about HARMONY.</h4>
        <p>
          Embracing our rich spectrum of skintone diversity in Indonesia, Colourist synthesizes the finest global
          methodologies from Japan, Korea, Hong Kong, Bangkok, and Australia to establish the <strong>highest
            benchmark</strong> that is most empowering and relevant for Indonesians.
        </p>
      </div>

      <div style="margin-top: 24px; text-align: center;">
        <a href="book" class="btn btn-solid" style="padding: 12px 36px; font-size: 10px; letter-spacing: .2em;">
          BOOK YOUR TRANSFORMATION
        </a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>