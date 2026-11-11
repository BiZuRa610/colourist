<?php
/**
 * Vercel Serverless Router — Colourist by Zerlinda
 *
 * Single entry-point for all pages on Vercel.
 * Maps clean URLs to the corresponding PHP page files in the project root.
 *
 * Locally (Laragon), Apache .htaccess handles routing directly.
 * This file is used ONLY by Vercel's vercel-php runtime.
 */

// Tell the rest of the app we are running inside Vercel's serverless router
define('VERCEL_ROUTER', true);

// ── Resolve the requested path ──────────────────────────────────────────────
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path       = parse_url($requestUri, PHP_URL_PATH);
$path       = '/' . trim($path, '/');          // normalise to /foo

// ── Path-traversal protection ───────────────────────────────────────────────
// Reject anything containing "..", NUL bytes, or non-printable chars.
if (preg_match('/\.\.|[\x00-\x1f]/', $path)) {
    http_response_code(400);
    echo 'Bad request';
    exit;
}

// ── Project root (one directory above /api) ─────────────────────────────────
$root = dirname(__DIR__);

// ── Route map ───────────────────────────────────────────────────────────────
// Static pages: clean URL → PHP file (relative to $root)
$routes = [
    '/'               => 'index.php',
    '/about'          => 'about.php',
    '/experiences'    => 'experiences.php',
    '/transformation' => 'transformation.php',
    '/workshop'       => 'workshop.php',
    '/collaboration'  => 'collaboration.php',
    '/partners'       => 'partners.php',
    '/book'           => 'book.php',
    '/admin'          => 'admin.php',
    '/admin.php'      => 'admin.php',     // direct hit fallback
];

// ── Match static route ─────────────────────────────────────────────────────
if (isset($routes[$path])) {
    $file = $root . '/' . $routes[$path];
    if (is_file($file)) {
        require $file;
        exit;
    }
}

// ── Dynamic route: /experience/{slug} ───────────────────────────────────────
if (preg_match('#^/experience/([a-z0-9\-]+)$#', $path, $m)) {
    $_GET['service'] = $m[1];
    $file = $root . '/experience.php';
    if (is_file($file)) {
        require $file;
        exit;
    }
}

// ── Fallback: 404 ──────────────────────────────────────────────────────────
http_response_code(404);
$notFound = $root . '/404.php';
if (is_file($notFound)) {
    require $notFound;
} else {
    echo '404 — Page not found';
}
exit;
