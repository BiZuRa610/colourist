<?php
/**
 * Admin Panel — Colourist by Zerlinda
 * Manage Transformation Portfolio, backed by data/transformation.json
 */
session_start();
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/media.php';

$json_file = __DIR__ . '/data/transformation.json';

// Helper to load transformations
function get_transformations($file) {
    if (!file_exists($file)) {
        return [];
    }
    $content = file_get_contents($file);
    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}

// Helper to save transformations
function save_transformations($file, $data) {
    return file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), LOCK_EX);
}

// Handle Login
$login_error = '';
if (isset($_POST['admin_login'])) {
    $password = $_POST['password'] ?? '';
    if (password_verify($password, $site['admin_password_hash']) || $password === $site['admin_default_pass']) {
        $_SESSION['colourist_admin'] = true;
        header('Location: ' . (defined('VERCEL_ROUTER') ? '/admin' : 'admin.php'));
        exit;
    } else {
        $login_error = 'Password salah. Silakan coba lagi.';
    }
}

// Handle Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['colourist_admin']);
    header('Location: admin.php');
    exit;
}

$is_logged_in = !empty($_SESSION['colourist_admin']);

// Process Admin Actions if logged in
$toast_message = '';
if ($is_logged_in && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $items = get_transformations($json_file);
    $action = $_POST['item_action'] ?? '';

    if ($action === 'save') {
        $index = intval($_POST['edit_index'] ?? -1);
        $type = $_POST['media_type'] ?? 'image';
        $url = trim($_POST['media_url'] ?? '');
        $category = trim($_POST['category'] ?? 'Atelier');
        $caption = trim($_POST['caption'] ?? '');
        $alt = trim($_POST['alt'] ?? '');

        $new_item = [
            'media' => [
                'type' => $type,
                'url' => $url,
                'alt' => $alt,
                'position' => '50% 50%'
            ],
            'category' => $category,
            'caption' => $caption
        ];

        if ($index >= 0 && isset($items[$index])) {
            $items[$index] = $new_item;
            $toast_message = 'Item berhasil diperbarui!';
        } else {
            array_unshift($items, $new_item);
            $toast_message = 'Item baru berhasil ditambahkan!';
        }
        save_transformations($json_file, $items);
    } elseif ($action === 'delete') {
        $index = intval($_POST['item_index'] ?? -1);
        if ($index >= 0 && isset($items[$index])) {
            array_splice($items, $index, 1);
            save_transformations($json_file, $items);
            $toast_message = 'Item berhasil dihapus!';
        }
    } elseif ($action === 'move') {
        $index = intval($_POST['item_index'] ?? -1);
        $direction = intval($_POST['direction'] ?? 0); // -1 up, +1 down
        $target = $index + $direction;
        if ($index >= 0 && $target >= 0 && $target < count($items)) {
            $temp = $items[$index];
            $items[$index] = $items[$target];
            $items[$target] = $temp;
            save_transformations($json_file, $items);
            $toast_message = 'Urutan berhasil diubah!';
        }
    }
}

$items = get_transformations($json_file);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title>Colourist Admin — Manage Transformations</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    @font-face {
      font-family: 'Black Mango';
      src: url('assets/fonts/BlackMango.woff2') format('woff2'),
           url('assets/fonts/BlackMango.woff') format('woff');
      font-weight: normal;
      font-style: normal;
      font-display: swap;
    }

    :root {
      --font-title: 'Black Mango', Georgia, serif;
      --font-body: 'Poppins', system-ui, sans-serif;
      --color-primary: #111111;
      --color-bg: #f8f9fa;
      --color-card: #ffffff;
      --color-border: #e5e7eb;
      --color-danger: #ef4444;
      --color-success: #10b981;
      --acc: #b5654f;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: var(--font-body);
      background: var(--color-bg);
      color: var(--color-primary);
      line-height: 1.5;
      padding-bottom: 5rem;
    }

    header {
      position: sticky;
      top: 0;
      z-index: 50;
      background: #ffffff;
      border-bottom: 1px solid var(--color-border);
      padding: 0.9rem 1.4rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    }

    .admin-logo {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      font-family: var(--font-title);
      font-size: 16px;
      letter-spacing: .1em;
    }

    .badge {
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      background: #111111;
      color: #ffffff;
      padding: 0.2rem 0.5rem;
      border-radius: 4px;
      font-family: var(--font-body);
    }

    .container {
      max-width: 860px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.4rem;
      padding: 0.65rem 1.2rem;
      font-family: var(--font-body);
      font-size: 0.82rem;
      font-weight: 600;
      letter-spacing: 0.05em;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s;
      border: 1px solid transparent;
      text-decoration: none;
    }

    .btn-primary { background: #000000; color: #ffffff; }
    .btn-primary:hover { background: #262626; }
    .btn-secondary { background: #ffffff; color: #111111; border-color: var(--color-border); }
    .btn-secondary:hover { background: #f3f4f6; }
    .btn-danger { background: #fee2e2; color: #b91c1c; }
    .btn-danger:hover { background: #fecaca; }
    .btn-sm { padding: 0.35rem 0.65rem; font-size: 0.75rem; }

    .item-card {
      background: var(--color-card);
      border: 1px solid var(--color-border);
      border-radius: 10px;
      padding: 1rem;
      display: flex;
      gap: 1.2rem;
      align-items: center;
      margin-bottom: 1rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }

    .item-preview {
      width: 85px;
      height: 85px;
      border-radius: 6px;
      background: #111111;
      overflow: hidden;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .item-preview img, .item-preview video {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .item-info { flex: 1; min-width: 0; }
    .item-category { font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--acc); font-weight: 600; }
    .item-caption { font-size: 0.95rem; font-weight: 600; margin: 2px 0 4px; }
    .item-url { font-size: 0.72rem; color: #888888; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

    /* Modal Form */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.5);
      z-index: 100;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    .modal-overlay.open { display: flex; }

    .modal-box {
      background: #ffffff;
      border-radius: 12px;
      max-width: 500px;
      width: 100%;
      padding: 1.8rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .form-group { margin-bottom: 1rem; }
    .form-group label { display: block; font-size: 0.75rem; font-weight: 600; margin-bottom: 0.3rem; text-transform: uppercase; letter-spacing: 0.05em; }
    .form-group input, .form-group select { width: 100%; padding: 0.6rem 0.8rem; font-family: inherit; font-size: 0.85rem; border: 1px solid var(--color-border); border-radius: 6px; outline: none; }
    .form-group input:focus, .form-group select:focus { border-color: #000000; }

    .toast {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      background: #111111;
      color: #ffffff;
      padding: 0.8rem 1.4rem;
      border-radius: 8px;
      font-size: 0.85rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      z-index: 200;
    }
  </style>
</head>
<body>

  <header>
    <div class="admin-logo">
      <span>COLOURIST</span>
      <span class="badge">ADMIN PANEL</span>
    </div>
    <div style="display: flex; gap: 0.8rem; align-items: center;">
      <a href="index.php" class="btn btn-secondary btn-sm" target="_blank">&larr; Lihat Website</a>
      <?php if ($is_logged_in): ?>
        <a href="admin.php?action=logout" class="btn btn-danger btn-sm">Keluar</a>
      <?php endif; ?>
    </div>
  </header>

  <div class="container">
    <?php if (!$is_logged_in): ?>
      <!-- Login Box -->
      <div style="max-width: 400px; margin: 4rem auto; background: #ffffff; padding: 2.2rem; border-radius: 12px; border: 1px solid var(--color-border); text-align: center;">
        <h1 style="font-family: var(--font-title); font-size: 26px; margin-bottom: 8px;">Masuk ke Admin</h1>
        <p style="font-size: 12px; color: #666; margin-bottom: 1.5rem;">Masukkan password administrator untuk mengelola portfolio transformasi.</p>
        
        <?php if (!empty($login_error)): ?>
          <div style="background: #fee2e2; color: #b91c1c; padding: 8px; border-radius: 6px; font-size: 12px; margin-bottom: 1rem;">
            <?= e($login_error) ?>
          </div>
        <?php endif; ?>

        <form method="POST" action="admin.php">
          <div class="form-group" style="text-align: left;">
            <label for="adminPass">Password</label>
            <input type="password" id="adminPass" name="password" required placeholder="Default: colourist2026">
          </div>
          <button type="submit" name="admin_login" class="btn btn-primary" style="width: 100%;">Masuk</button>
        </form>
      </div>
    <?php else: ?>
      <!-- Admin Dashboard -->
      <?php if (!empty($toast_message)): ?>
        <div class="toast" id="adminToast"><?= e($toast_message) ?></div>
        <script>setTimeout(() => { const t = document.getElementById('adminToast'); if(t) t.remove(); }, 3500);</script>
      <?php endif; ?>

      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
        <div>
          <h1 style="font-family: var(--font-title); font-size: 28px;">Portfolio Transformation</h1>
          <p style="font-size: 12px; color: #666;">Data tersimpan secara real-time di <code>data/transformation.json</code></p>
        </div>
        <button class="btn btn-primary btn-sm" onclick="openAddModal()">+ Tambah Media Baru</button>
      </div>

      <div class="items-count" style="font-size: 12px; color: #666; margin-bottom: 1rem;">
        Total: <?= count($items) ?> item terdaftar
      </div>

      <div id="itemsList">
        <?php foreach ($items as $idx => $it): ?>
          <?php
            $is_video = (!empty($it['media']['type']) && $it['media']['type'] === 'video');
            $url = $it['media']['url'] ?? '';
            $category = $it['category'] ?? 'Transformation';
            $caption = $it['caption'] ?? 'Tanpa Judul';
            $alt = $it['media']['alt'] ?? '';
          ?>
          <div class="item-card">
            <!-- Reorder Controls -->
            <div style="display: flex; flex-direction: column; gap: 4px;">
              <form method="POST" action="admin.php" style="display:inline;">
                <input type="hidden" name="item_action" value="move">
                <input type="hidden" name="item_index" value="<?= $idx ?>">
                <input type="hidden" name="direction" value="-1">
                <button type="submit" class="btn btn-secondary btn-sm" <?= $idx === 0 ? 'disabled style="opacity:0.3"' : '' ?> title="Naik">&uarr;</button>
              </form>
              <form method="POST" action="admin.php" style="display:inline;">
                <input type="hidden" name="item_action" value="move">
                <input type="hidden" name="item_index" value="<?= $idx ?>">
                <input type="hidden" name="direction" value="1">
                <button type="submit" class="btn btn-secondary btn-sm" <?= $idx === count($items) - 1 ? 'disabled style="opacity:0.3"' : '' ?> title="Turun">&darr;</button>
              </form>
            </div>

            <!-- Preview Thumbnail -->
            <div class="item-preview">
              <?php if ($is_video): ?>
                <video src="<?= e($url) ?>" muted playsinline></video>
              <?php else: ?>
                <img src="<?= e($url) ?>" alt="<?= e($alt) ?>" onerror="this.src='assets/media/logo.png'">
              <?php endif; ?>
              <span style="position: absolute; bottom: 2px; right: 2px; background: rgba(0,0,0,0.7); color: #fff; font-size: 7px; padding: 1px 4px; border-radius: 2px;">
                <?= $is_video ? 'VIDEO' : 'FOTO' ?>
              </span>
            </div>

            <!-- Item Info -->
            <div class="item-info">
              <span class="item-category"><?= e($category) ?></span>
              <h2 class="item-caption"><?= e($caption) ?></h2>
              <p class="item-url"><?= e($url) ?></p>
            </div>

            <!-- Actions -->
            <div style="display: flex; gap: 0.5rem;">
              <button type="button" class="btn btn-secondary btn-sm" onclick='openEditModal(<?= json_encode($idx) ?>, <?= json_encode($it) ?>)'>Edit</button>
              <form method="POST" action="admin.php" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');" style="display:inline;">
                <input type="hidden" name="item_action" value="delete">
                <input type="hidden" name="item_index" value="<?= $idx ?>">
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Modal Add/Edit Item -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-box">
      <h2 id="modalTitle" style="font-family: var(--font-title); font-size: 20px; margin-bottom: 1rem;">Tambah Item Baru</h2>
      <form method="POST" action="admin.php">
        <input type="hidden" name="item_action" value="save">
        <input type="hidden" name="edit_index" id="editIndex" value="-1">

        <div class="form-group">
          <label for="mediaType">Tipe Media</label>
          <select id="mediaType" name="media_type" required>
            <option value="image">Foto (Image)</option>
            <option value="video">Video (MP4)</option>
          </select>
        </div>

        <div class="form-group">
          <label for="mediaUrl">Path / URL File Media *</label>
          <input type="text" id="mediaUrl" name="media_url" required placeholder="assets/media/nama_file.jpg atau .mp4">
        </div>

        <div class="form-group">
          <label for="categoryInput">Kategori</label>
          <input type="text" id="categoryInput" name="category" placeholder="Contoh: Transformation, Atelier, Public Figure, Media">
        </div>

        <div class="form-group">
          <label for="captionInput">Judul / Caption *</label>
          <input type="text" id="captionInput" name="caption" required placeholder="Contoh: Client Personal Color Session">
        </div>

        <div class="form-group">
          <label for="altInput">Alt Text (Aksesibilitas)</label>
          <input type="text" id="altInput" name="alt" placeholder="Deskripsi gambar atau video">
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 0.6rem; margin-top: 1.5rem;">
          <button type="button" class="btn btn-secondary btn-sm" onclick="closeModal()">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openAddModal() {
      document.getElementById('modalTitle').textContent = 'Tambah Item Baru';
      document.getElementById('editIndex').value = '-1';
      document.getElementById('mediaType').value = 'image';
      document.getElementById('mediaUrl').value = '';
      document.getElementById('categoryInput').value = 'Transformation';
      document.getElementById('captionInput').value = '';
      document.getElementById('altInput').value = '';
      document.getElementById('modalOverlay').classList.add('open');
    }

    function openEditModal(index, item) {
      document.getElementById('modalTitle').textContent = 'Edit Item Portfolio';
      document.getElementById('editIndex').value = index;
      document.getElementById('mediaType').value = (item.media && item.media.type === 'video') ? 'video' : 'image';
      document.getElementById('mediaUrl').value = item.media ? item.media.url : '';
      document.getElementById('categoryInput').value = item.category || '';
      document.getElementById('captionInput').value = item.caption || '';
      document.getElementById('altInput').value = item.media ? (item.media.alt || '') : '';
      document.getElementById('modalOverlay').classList.add('open');
    }

    function closeModal() {
      document.getElementById('modalOverlay').classList.remove('open');
    }
  </script>
</body>
</html>

