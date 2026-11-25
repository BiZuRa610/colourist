<?php
/**
 * Footer Template — Colourist
 * Clean minimalist footer with site links, location details, and script inclusions
 */
if (!defined('APP_INIT')) {
    require_once __DIR__ . '/data.php';
}
?>
  </main>

  <footer class="site-footer">
    <div class="footer-logo"><img src="<?= e($media['brand.logo_black'] ?? 'assets/media/logos/logo_colourist.png') ?>" alt="Colourist" height="20" style="display:inline-block;"></div>
    <p style="margin: 0 auto 8px; max-width: 500px;">
      Asia &amp; Indonesia's No. 1 Color Expert.<br>
      <?= e($site['studio_address']) ?>
    </p>
    <p style="margin: 0 auto 12px; font-size: 11px;">
      <a href="https://wa.me/<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener" style="color: var(--mut); text-decoration: underline;">
        WhatsApp Concierge: <?= e($site['whatsapp_display']) ?>
      </a>
    </p>

    <div class="footer-links">
      <a href="about">What is it?</a>
      <a href="experiences">Experiences</a>
      <a href="transformation">Transformation</a>
      <a href="workshop">Workshop</a>
      <a href="collaboration">Collaboration</a>
      <a href="partners">Partners</a>
      <a href="book">Book Now</a>
    </div>

    <p style="margin-top: 16px; font-size: 10px; color: var(--mut);">
      &copy; <?= date('Y') ?> <?= e($site['name']) ?>. All rights reserved.
    </p>
  </footer>

  <!-- Main JavaScript File -->
  <script src="assets/js/main.js"></script>
</body>
</html>

