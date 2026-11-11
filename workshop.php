<?php
/**
 * Workshop Page — Colourist by Zerlinda
 * Small-group masterclasses, upcoming dates, and waitlists
 */
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$page_title = 'Colourist Workshops — Learn the Language of Colour';
$page_description = 'Small-group sessions to master colour, styling and makeup with our expert Colour Analysts. Book your seat or join the waitlist.';

include __DIR__ . '/includes/header.php';
?>

<!-- Workshop Header -->
<section class="sec" aria-labelledby="workshopHeading">
  <span class="eyebrow">Workshop</span>
  <h1 id="workshopHeading" style="font-size: 34px; margin: 6px 0 12px;">Learn the language of colour</h1>
  <p>Small-group sessions to master colour, styling and makeup with our expert Colour Analysts.</p>
</section>

<!-- Workshop Cards Grid (3 Columns) -->
<section style="padding: 0 28px 44px;" aria-label="Available Workshops">
  <div class="cards-wk">
    <?php foreach ($workshops as $wk): ?>
      <article class="wk">
        <div class="wk-media">
          <?= media($wk['media_slot'], [
              'aspect' => '4/3',
              'alt'    => $wk['title'],
              'label'  => 'foto/video'
          ]) ?>
        </div>

        <div class="tag <?= $wk['sold_out'] ? 'sold' : '' ?>">
          <?= e($wk['tag']) ?>
        </div>

        <h3><?= e($wk['title']) ?></h3>

        <div class="m">
          <?= e($wk['date']) ?> &middot; <?= e($wk['duration']) ?>
          <?php if (!$wk['sold_out']): ?>
            &middot; Kuota <?= e($wk['quota']) ?>
          <?php endif; ?>
        </div>

        <div class="p">
          <span><?= e($wk['price']) ?></span>
          <?php if ($wk['sold_out']): ?>
            <a href="book?type=waitlist&workshop=<?= urlencode($wk['title']) ?>" class="btn" style="margin: 0; padding: 6px 14px; font-size: 8px; color: var(--mut); border-color: var(--line);">
              Waitlist
            </a>
          <?php else: ?>
            <a href="book?type=workshop&workshop=<?= urlencode($wk['title']) ?>" class="btn btn-solid" style="margin: 0; padding: 6px 14px; font-size: 8px;">
              Daftar
            </a>
          <?php endif; ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

