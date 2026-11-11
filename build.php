<?php
/**
 * Static Build Generator — Colourist by Zerlinda
 * Renders all PHP templates into a standalone /dist directory for static deployment on Vercel, Netlify, or GitHub Pages.
 * 
 * Usage: php build.php
 */

echo "==> Building static distribution in /dist...\n";

$dist_dir = __DIR__ . '/dist';

// Remove existing dist if any
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . "/" . $object) && !is_link($dir . "/" . $object))
                    rrmdir($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

rrmdir($dist_dir);
mkdir($dist_dir, 0755, true);

// Recursive directory copy
function rcopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0755, true);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                rcopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

// Copy assets and data
echo "--> Copying assets...\n";
rcopy(__DIR__ . '/assets', $dist_dir . '/assets');

if (is_dir(__DIR__ . '/data')) {
    rcopy(__DIR__ . '/data', $dist_dir . '/data');
}

// List of pages to render
$pages = [
    'index.html'          => 'index.php',
    'about.html'          => 'about.php',
    'experiences.html'    => 'experiences.php',
    'transformation.html' => 'transformation.php',
    'workshop.html'       => 'workshop.php',
    'collaboration.html'  => 'collaboration.php',
    'partners.html'       => 'partners.php',
    'book.html'           => 'book.php',
    '404.html'            => '404.php',
];

// Include services for detail pages
require_once __DIR__ . '/includes/data.php';

// Render static pages
foreach ($pages as $output_file => $source_script) {
    echo "--> Rendering {$output_file} from {$source_script}...\n";
    $_GET = [];
    $_SERVER['PHP_SELF'] = '/' . $source_script;
    
    ob_start();
    include __DIR__ . '/' . $source_script;
    $html = ob_get_clean();

    file_put_contents($dist_dir . '/' . $output_file, $html);
}

// Render dynamic service detail pages
foreach ($services as $slug => $sdata) {
    $out = "experience-{$slug}.html";
    echo "--> Rendering detail page {$out} for {$slug}...\n";
    $_GET = ['service' => $slug];
    $_SERVER['PHP_SELF'] = '/experience.php';

    ob_start();
    include __DIR__ . '/experience.php';
    $html = ob_get_clean();

    file_put_contents($dist_dir . '/' . $out, $html);
}

// Generate a clean index router for static experience.php if query param is used
$router_html = <<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script>
    const params = new URLSearchParams(window.location.search);
    const service = params.get('service') || 'color-analysis';
    window.location.replace('experience-' + service + '.html');
  </script>
</head>
<body><p>Redirecting to experience...</p></body>
</html>
HTML;
file_put_contents($dist_dir . '/experience.html', $router_html);

echo "==> Build complete! Output located at /dist\n";

