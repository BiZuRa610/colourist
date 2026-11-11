<?php
/**
 * Footer Template — Colourist by Zerlinda
 * Clean minimalist footer with site links, location details, and script inclusions
 */
if (!defined('APP_INIT')) {
    require_once __DIR__ . '/data.php';
}
?>
  </main>

  <footer class="site-footer">
    <div class="footer-logo">COLOURIST</div>
    <p style="margin: 0 auto 12px; max-width: 500px;">
      Asia &amp; Indonesia's No. 1 Color Expert.<br>
      <?= e($site['studio_address']) ?>
    </p>

    <div class="footer-links">
      <a href="about">About</a>
      <a href="experiences">Experiences</a>
      <a href="transformation">Transformation</a>
      <a href="workshop">Workshop</a>
      <a href="collaboration">Collaboration</a>
      <a href="partners">Partners</a>
      <a href="book">Book Now</a>
      <a href="admin.php">Admin</a>
    </div>

    <p style="margin-top: 16px; font-size: 10px; color: var(--mut);">
      &copy; <?= date('Y') ?> <?= e($site['name']) ?>. All rights reserved.
    </p>
  </footer>

  <!-- Main JavaScript File -->
  <script src="assets/js/main.js"></script>
</body>
</html>

