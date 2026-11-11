<?php
/**
 * Header Template — Colourist by Zerlinda
 * Accessible burger navigation, 2-column mega panel with Aman-inspired submenus, dynamic SEO metadata
 */

if (!defined('APP_INIT')) {
  require_once __DIR__ . '/data.php';
  require_once __DIR__ . '/media.php';
}

// Current page identifier for active link state
$current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$clean_current = str_replace('.php', '', $current_page);
$current_service = $_GET['service'] ?? '';

// Page SEO metadata defaults
$page_title = $page_title ?? $site['title_default'];
$page_description = $page_description ?? $site['description'];
$og_image = $og_image ?? ($site['url'] . '/' . $media['brand.logo']);
$canonical_url = $site['url'] . '/' . ($current_page === 'index.php' ? '' : str_replace('.php', '', $current_page));
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title><?= e($page_title) ?></title>
  <meta name="description" content="<?= e($page_description) ?>">
  <link rel="canonical" href="<?= e($canonical_url) ?>">

  <!-- Base tag so relative links resolve cleanly when on /experience/slug -->
  <base href="/makeup/">

  <!-- Open Graph / Meta -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= e($page_title) ?>">
  <meta property="og:description" content="<?= e($page_description) ?>">
  <meta property="og:url" content="<?= e($canonical_url) ?>">
  <meta property="og:image" content="<?= e($og_image) ?>">
  <meta name="twitter:card" content="summary_large_image">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= e($media['brand.logo']) ?>">
  <link rel="apple-touch-icon" href="<?= e($media['brand.logo']) ?>">

  <!-- Google Fonts: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
    rel="stylesheet">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <!-- Backdrop overlay for mega menu -->
  <div class="nav-backdrop" id="navBackdrop" aria-hidden="true"></div>

  <!-- Header Section -->
  <header class="site-header">
    <div class="nav">
      <!-- Left: Burger Toggle -->
      <button class="burger-btn" id="burgerBtn" aria-label="Buka Navigasi" aria-expanded="false"
        aria-controls="megaNavPanel">
        <span class="burger-icon" aria-hidden="true">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>

      <!-- Center: Logo -->
      <a href="" class="logo" aria-label="Colourist by Zerlinda Home">
        COLOURIST
        <small>BY ZERLINDA</small>
      </a>

      <!-- Right: Balance Spacer -->
      <div class="nav-spacer" aria-hidden="true"></div>
    </div>

    <!-- Mega Menu Panel (Aman-inspired) -->
    <nav class="mega-panel" id="megaNavPanel" aria-label="Menu Utama">
      <div class="mega-panel-inner">
        <!-- Left Column: Primary Navigation Items -->
        <div class="mega-col-left">
          <?php
          $exp_children = [];
          foreach ($nav_menu as $item):
            $is_active_page = ($clean_current === $item['url'] || $current_page === ($item['url'] . '.php'));
            $has_submenu = !empty($item['children']);
            if ($has_submenu) {
              $exp_children = $item['children'];
            }
            ?>
            <?php if ($has_submenu): ?>
              <div class="menu-item-group">
                <button type="button"
                  class="menu-item-btn <?= ($is_active_page || $clean_current === 'experience' || $current_page === 'experience.php') ? 'current-page' : '' ?>"
                  id="expNavBtn" aria-expanded="false" aria-controls="desktopSubmenuCol expMobileSubmenu">
                  <span class="txt"><?= e($item['label']) ?></span>
                  <span class="chevron-arrow" id="expChevron" aria-hidden="true">&rsaquo;</span>
                </button>

                <!-- Mobile Accordion Submenu -->
                <div class="mobile-accordion" id="expMobileSubmenu" aria-label="Submenu Experiences">
                  <?php foreach ($item['children'] as $child): ?>
                    <?php 
                      $is_active_child = ($current_page === 'experience.php' && ($current_service === $child['slug'] || ($current_service === 'color-analysis' && $child['slug'] === 'personal-color-analysis'))); 
                    ?>
                    <a href="<?= e($child['url']) ?>" class="menu-link <?= $is_active_child ? 'active-link' : '' ?>">
                      <?= e($child['label']) ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php else: ?>
              <div>
                <a href="<?= e($item['url']) ?>" class="menu-link <?= $is_active_page ? 'active-link' : '' ?>">
                  <?= e($item['label']) ?>
                </a>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>

        <!-- Right Column: Submenu (Desktop, shown ONLY when Experiences is clicked) -->
        <div class="mega-col-right" id="desktopSubmenuCol" aria-label="Detail Experiences">
          <span class="sub-eyebrow">EXPERIENCES</span>
          <?php foreach ($exp_children as $child): ?>
            <?php 
              $is_active_child = ($current_page === 'experience.php' && ($current_service === $child['slug'] || ($current_service === 'color-analysis' && $child['slug'] === 'personal-color-analysis'))); 
            ?>
            <a href="<?= e($child['url']) ?>" class="menu-link <?= $is_active_child ? 'active-link' : '' ?>">
              <?= e($child['label']) ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Wrapper Container -->
  <main class="site-wrapper" id="mainContent">