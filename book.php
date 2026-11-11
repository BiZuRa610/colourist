<?php
/**
 * Booking Page — Colourist by Zerlinda
 * 2-column layout with studio details and WhatsApp booking flow
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Reserve Your Experience — Colourist by Zerlinda';
$page_description = 'Book your private Personal Color Analysis, Private Styling, or Masterclass at ASHTA District 8 SCBD. Instant confirmation via WhatsApp.';

// Check if a service was passed in query parameter
$prefill_service = trim($_GET['service'] ?? '');
$prefill_workshop = trim($_GET['workshop'] ?? '');

// Match default selected service
$selected_service_name = 'Personal Color Analysis';
if (!empty($prefill_service) && isset($services[$prefill_service])) {
    $selected_service_name = $services[$prefill_service]['title'];
} elseif (!empty($prefill_workshop)) {
    $selected_service_name = 'Workshop: ' . $prefill_workshop;
}

include __DIR__ . '/includes/header.php';
?>

<div class="split" style="align-items: flex-start; padding-top: 48px; padding-bottom: 60px;">
  <!-- Left Column: Studio Information -->
  <div>
    <span class="eyebrow">Book Now</span>
    <h1 style="font-size: 32px; margin: 6px 0 14px;">Reserve your experience</h1>
    <p style="color: var(--mut); line-height: 1.8;">
      Pilih layanan dan jadwal yang diinginkan. Tim concierge kami akan melanjutkan konfirmasi ketersediaan slot melalui WhatsApp resmi Colourist.
    </p>

    <div class="info-box">
      <b>Colourist Atelier Jakarta</b><br>
      <?= e($site['studio_address']) ?><br><br>
      <b>Operational Hours:</b><br>
      <?= e($site['operating_hours']) ?><br><br>
      <b>WhatsApp Concierge:</b><br>
      <a href="https://wa.me/<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener" style="text-decoration: underline; color: var(--fg);">
        <?= e($site['whatsapp_display']) ?>
      </a>
    </div>
  </div>

  <!-- Right Column: Interactive Booking Form -->
  <div>
    <form id="bookingForm" data-wa="<?= e($site['whatsapp']) ?>" class="form-box" style="max-width: none; margin: 0;">
      <span class="eyebrow">Experience</span>

      <!-- Service Selection Buttons -->
      <div class="opts" role="radiogroup" aria-label="Select Experience">
        <?php foreach ($services as $key => $srv): ?>
          <?php $is_on = ($selected_service_name === $srv['title'] || $prefill_service === $key); ?>
          <button type="button" 
                  class="opt-btn <?= $is_on ? 'on' : '' ?>" 
                  data-service="<?= e($srv['title']) ?>"
                  role="radio"
                  aria-checked="<?= $is_on ? 'true' : 'false' ?>">
            <?= e($srv['short_title']) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <input type="hidden" name="service" id="selectedService" value="<?= e($selected_service_name) ?>">

      <!-- Date and Time -->
      <div class="form-row-2">
        <div class="form-group">
          <label for="bookDate">Preferred Date *</label>
          <input type="date" id="bookDate" name="date" required value="<?= date('Y-m-d', strtotime('+2 days')) ?>">
        </div>

        <div class="form-group">
          <label for="bookTime">Preferred Time *</label>
          <select id="bookTime" name="time" required>
            <option value="11:00 WIB">11:00 WIB</option>
            <option value="13:30 WIB">13:30 WIB</option>
            <option value="15:30 WIB">15:30 WIB</option>
            <option value="17:30 WIB">17:30 WIB</option>
            <option value="19:00 WIB">19:00 WIB</option>
          </select>
        </div>
      </div>

      <!-- Client Name -->
      <div class="form-group">
        <label for="bookName">Full Name *</label>
        <input type="text" id="bookName" name="name" required placeholder="Nama Lengkap Anda">
      </div>

      <!-- WhatsApp Number -->
      <div class="form-group">
        <label for="bookWa">WhatsApp Number *</label>
        <input type="tel" id="bookWa" name="whatsapp" required placeholder="0812xxxxxxxx atau +62812...">
      </div>

      <!-- Notes -->
      <div class="form-group">
        <label for="bookNotes">Notes (optional)</label>
        <textarea id="bookNotes" name="notes" placeholder="Contoh: Reservasi untuk 2 orang, sesi ulang tahun, atau request analyst tertentu..."></textarea>
      </div>

      <!-- Submit Button -->
      <div style="margin-top: 10px;">
        <button type="submit" class="btn btn-solid" style="width: 100%; padding: 12px; font-size: 10px;">
          Continue on WhatsApp &rarr;
        </button>
      </div>

      <p style="font-size: 10px; color: var(--mut); text-align: center; margin-top: 10px;">
        Konfirmasi jadwal resmi akan diproses langsung oleh tim Colourist melalui WhatsApp.
      </p>
    </form>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

