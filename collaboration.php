<?php
/**
 * Collaboration Page — Colourist by Zerlinda
 * Partnerships with Brands, Media, and Public Figures
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Collaboration — Brands, Media & Talent with Colourist';
$page_description = 'Work with Asia\'s No.1 Color Expert on brand activations, editorial features, corporate workshops, and red carpet talent styling.';

// Handle Form Submission fallback (if executed in PHP environment)
$form_status = null;
$form_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_collab'])) {
    $honeypot = trim($_POST['website'] ?? '');
    
    if (!empty($honeypot)) {
        $form_status = 'success';
        $form_message = 'Terima kasih atas pesan Anda! Tim kami akan segera menghubungi Anda.';
    } else {
        $name    = trim($_POST['name'] ?? '');
        $company = trim($_POST['company'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $msg     = trim($_POST['message'] ?? '');

        if (empty($name) || empty($email) || empty($msg)) {
            $form_status = 'error';
            $form_message = 'Mohon lengkapi Nama, Email, dan Pesan Anda.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $form_status = 'error';
            $form_message = 'Format alamat email tidak valid.';
        } else {
            $to = $site['email'];
            $subject = "Inquiry Kolaborasi: {$company} ({$name})";
            $body = "Nama: {$name}\nPerusahaan / Brand: {$company}\nEmail: {$email}\n\nPesan:\n{$msg}\n";
            $headers = "From: noreply@" . ($_SERVER['SERVER_NAME'] ?? 'colourist.id') . "\r\n" .
                       "Reply-To: {$email}\r\n" .
                       "X-Mailer: PHP/" . phpversion();

            @mail($to, $subject, $body, $headers);
            $form_status = 'success';
            $form_message = 'Terima kasih! Pesan kerja sama Anda telah terkirim. Tim kemitraan Colourist akan segera menghubungi Anda.';
        }
    }
}

$formspree_action = !empty($site['formspree_id']) && $site['formspree_id'] !== 'XXXX' 
    ? "https://formspree.io/f/" . urlencode($site['formspree_id'])
    : "https://formspree.io/f/XXXX";

include __DIR__ . '/includes/header.php';
?>

<!-- 1. Short Hero Section -->
<section class="hero-wrapper" style="height: 260px;" aria-label="Collaboration Hero">
  <?= media('collab.hero', [
      'class'    => 'hero-video-bg',
      'aspect'   => '16/9',
      'alt'      => 'Colourist Collaboration',
      'label'    => 'collab.hero'
  ]) ?>
  <div class="hero-overlay">
    <h1>Collaboration</h1>
    <p>BRANDS &middot; MEDIA &middot; TALENT</p>
  </div>
</section>

<!-- 2. Three Pillars Section -->
<section class="sec" aria-labelledby="collabHeading">
  <span class="eyebrow">Let's create together</span>
  <h2 id="collabHeading">Work with Colourist</h2>
  <p>From brand activations to editorial and talent styling, we bring colour expertise to every partnership.</p>

  <div class="three">
    <?php foreach ($collab_pillars as $pillar): ?>
      <div>
        <h3><?= e($pillar['title']) ?></h3>
        <p><?= e($pillar['description']) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- 3. Collaboration Inquiry Form -->
<section class="sec pt-0" aria-labelledby="formHeading">
  <h2 id="formHeading" style="font-size: 24px; margin-bottom: 24px;">Send an Inquiry</h2>

  <?php if ($form_status === 'success'): ?>
    <div class="alert alert-success" style="max-width: 520px; margin: 0 auto 24px;">
      <?= e($form_message) ?>
    </div>
  <?php elseif ($form_status === 'error'): ?>
    <div class="alert alert-danger" style="max-width: 520px; margin: 0 auto 24px;">
      <?= e($form_message) ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?= e($formspree_action) ?>" class="form-box" id="collabForm">
    <!-- Formspree subject & reply-to configuration -->
    <input type="hidden" name="_subject" value="New Collaboration Inquiry — Colourist">
    
    <!-- Honeypot anti-spam field -->
    <div style="display: none;" aria-hidden="true">
      <input type="text" name="_gotcha" tabindex="-1" autocomplete="off">
      <input type="text" name="website" tabindex="-1" autocomplete="off">
    </div>

    <div class="form-group">
      <label for="collabName">Name *</label>
      <input type="text" id="collabName" name="name" required placeholder="Nama Lengkap">
    </div>

    <div class="form-group">
      <label for="collabCompany">Brand / Company *</label>
      <input type="text" id="collabCompany" name="company" required placeholder="Nama Perusahaan atau Instansi">
    </div>

    <div class="form-group">
      <label for="collabEmail">Email *</label>
      <input type="email" id="collabEmail" name="email" required placeholder="nama@perusahaan.com">
    </div>

    <div class="form-group">
      <label for="collabMessage">Message *</label>
      <textarea id="collabMessage" name="message" required placeholder="Ceritakan konsep atau rencana kolaborasi Anda..."></textarea>
    </div>

    <div style="text-align: center; margin-top: 10px;">
      <button type="submit" name="submit_collab" class="btn btn-solid" style="padding: 10px 32px;">
        Send Inquiry
      </button>
    </div>
  </form>

  <p style="margin-top: 24px; font-size: 11px; color: var(--mut);">
    Atau hubungi kami langsung via email: 
    <a href="mailto:<?= e($site['email']) ?>?subject=Collaboration%20Inquiry" style="text-decoration: underline;">
      <?= e($site['email']) ?>
    </a>
  </p>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

