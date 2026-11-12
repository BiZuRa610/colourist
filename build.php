<?php
/**
 * Static Build Generator — Colourist by Zerlinda
 * 
 * Renders all PHP pages using output buffering into static HTML files
 * formatted for cleanUrls: true on Vercel or any static CDN.
 * 
 * Usage: php build.php
 */

define('STATIC_EXPORT', true);

echo "==> [1/4] Cleaning and preparing dist directory...\n";

$dist_dir = __DIR__ . '/dist';

// Helper to remove directory recursively
function remove_directory($dir) {
    if (!is_dir($dir)) return;
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            remove_directory($path);
        } else {
            @unlink($path);
        }
    }
    @rmdir($dir);
}

remove_directory($dist_dir);
mkdir($dist_dir, 0755, true);

// Helper to copy directory recursively
function copy_directory($src, $dst) {
    if (!is_dir($src)) return;
    @mkdir($dst, 0755, true);
    $dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file === '.' || $file === '..') continue;
        $src_file = $src . DIRECTORY_SEPARATOR . $file;
        $dst_file = $dst . DIRECTORY_SEPARATOR . $file;
        if (is_dir($src_file)) {
            copy_directory($src_file, $dst_file);
        } else {
            copy($src_file, $dst_file);
        }
    }
    closedir($dir);
}

echo "==> [2/4] Copying static assets (css, js, media, fonts)...\n";
copy_directory(__DIR__ . '/assets', $dist_dir . '/assets');

echo "==> [3/4] Rendering pages via output buffering...\n";

// Load configuration & services
require_once __DIR__ . '/includes/data.php';

// Helper to write file ensuring directory exists
function write_dist_html($dest_path, $content) {
    $dir = dirname($dest_path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    file_put_contents($dest_path, $content);
}

// 1. Root & Standard pages
$pages = [
    '/'               => ['file' => 'index.php',          'dest' => $dist_dir . '/index.html'],
    '/about'          => ['file' => 'about.php',          'dest' => $dist_dir . '/about/index.html'],
    '/experiences'    => ['file' => 'experiences.php',    'dest' => $dist_dir . '/experiences/index.html'],
    '/transformation' => ['file' => 'transformation.php', 'dest' => $dist_dir . '/transformation/index.html'],
    '/workshop'       => ['file' => 'workshop.php',       'dest' => $dist_dir . '/workshop/index.html'],
    '/collaboration'  => ['file' => 'collaboration.php',  'dest' => $dist_dir . '/collaboration/index.html'],
    '/partners'       => ['file' => 'partners.php',       'dest' => $dist_dir . '/partners/index.html'],
    '/book'           => ['file' => 'book.php',           'dest' => $dist_dir . '/book/index.html'],
    '/404'            => ['file' => '404.php',            'dest' => $dist_dir . '/404.html'],
];

foreach ($pages as $route => $config) {
    echo "  -> Rendering {$route} ({$config['file']})...\n";
    $_GET = [];
    $_SERVER['PHP_SELF'] = '/' . $config['file'];
    $_SERVER['REQUEST_URI'] = $route;

    ob_start();
    include __DIR__ . '/' . $config['file'];
    $html = ob_get_clean();

    write_dist_html($config['dest'], $html);
}

// 2. The 4 Service Detail Pages: /experience/{slug}
$distinct_slugs = [
    'personal-color-analysis',
    'private-styling',
    'makeup-masterclass',
    'custom-lipstick'
];

foreach ($distinct_slugs as $slug) {
    $route = "/experience/{$slug}";
    $dest = $dist_dir . "/experience/{$slug}/index.html";
    echo "  -> Rendering {$route}...\n";

    $_GET = ['service' => $slug];
    $_SERVER['PHP_SELF'] = '/experience.php';
    $_SERVER['REQUEST_URI'] = $route;

    ob_start();
    include __DIR__ . '/experience.php';
    $html = ob_get_clean();

    write_dist_html($dest, $html);
}

// Backward compatibility alias for color-analysis -> personal-color-analysis
echo "  -> Creating redirect for legacy /experience/color-analysis...\n";
$alias_dest = $dist_dir . "/experience/color-analysis/index.html";
$alias_html = <<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="0; url=/experience/personal-color-analysis">
  <link rel="canonical" href="/experience/personal-color-analysis">
  <script>window.location.replace('/experience/personal-color-analysis');</script>
</head>
<body><p>Redirecting to <a href="/experience/personal-color-analysis">Personal Color Analysis</a>...</p></body>
</html>
HTML;
write_dist_html($alias_dest, $alias_html);

echo "==> [4/4] Static export completed successfully!\n";
echo "Output files ready in /dist.\n";
