<?php
/**
 * Media Helper — Colourist by Zerlinda
 * Resolves media slots, renders responsive images and lazy-load videos with fallback placeholders.
 */

if (!defined('APP_INIT')) {
    require_once __DIR__ . '/data.php';
}

/**
 * Escape HTML output securely.
 */
function e($string) {
    return htmlspecialchars((string)$string, ENT_QUOTES, 'UTF-8');
}

/**
 * Render media (video or image) from a slot or path.
 *
 * @param string $slot Slot name from $media array, or direct relative path.
 * @param array $opts Options:
 *   - 'aspect'      => '16/9', '9/16', '4/5', '4/3', '1/1', etc.
 *   - 'class'       => Additional CSS class(es)
 *   - 'alt'         => Descriptive alt text
 *   - 'poster'      => Poster image path for videos
 *   - 'label'       => Custom text inside fallback placeholder
 *   - 'autoplay'    => Whether video should autoplay when visible (default true)
 *   - 'width'       => Intended width attribute
 *   - 'height'      => Intended height attribute
 *   - 'style'       => Inline styles
 * @return string HTML output
 */
function media($slot, $opts = []) {
    global $media;

    // Resolve slot to file path
    $src = '';
    if (isset($media[$slot])) {
        $src = $media[$slot];
    } elseif (!empty($slot)) {
        $src = $slot;
    }

    $aspect     = $opts['aspect'] ?? '';
    $class      = $opts['class'] ?? '';
    $alt        = $opts['alt'] ?? ($opts['label'] ?? 'Colourist Media');
    $poster     = $opts['poster'] ?? '';
    $label      = $opts['label'] ?? ($slot ? $slot : 'Media Placeholder');
    $styleExtra = $opts['style'] ?? '';

    $aspectStyle = '';
    if ($aspect) {
        $aspectStyle = "aspect-ratio: {$aspect};";
    }

    // If source is empty, render graceful gradient placeholder as in mockups
    if (empty($src)) {
        $classes = trim('ph ' . $class);
        $inlineStyle = trim($aspectStyle . ' ' . $styleExtra);
        $styleAttr = $inlineStyle ? ' style="' . e($inlineStyle) . '"' : '';
        return '<div class="' . e($classes) . '"' . $styleAttr . ' role="img" aria-label="' . e($alt) . '"><span>' . e($label) . '</span></div>';
    }

    // Determine file extension
    $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));

    // Video types
    $videoExtensions = ['mp4', 'webm', 'mov', 'ogg'];
    if (in_array($ext, $videoExtensions)) {
        $videoClasses = trim('lazy-video ' . $class);
        $inlineStyle = trim($aspectStyle . ' object-fit: cover; ' . $styleExtra);
        $posterAttr = $poster ? ' poster="' . e($poster) . '"' : '';
        
        return sprintf(
            '<video muted loop playsinline preload="metadata"%s class="%s" data-src="%s" src="%s" style="%s" aria-label="%s"><source src="%s" type="video/%s">Your browser does not support HTML5 video.</video>',
            $posterAttr,
            e($videoClasses),
            e($src),
            e($src),
            e($inlineStyle),
            e($alt),
            e($src),
            e($ext === 'mov' ? 'mp4' : $ext)
        );
    }

    // Image types (and default fallback)
    $imageClasses = trim('media-img ' . $class);
    $inlineStyle = trim($aspectStyle . ' object-fit: cover; ' . $styleExtra);
    $widthAttr = !empty($opts['width']) ? ' width="' . intval($opts['width']) . '"' : '';
    $heightAttr = !empty($opts['height']) ? ' height="' . intval($opts['height']) . '"' : '';

    return sprintf(
        '<img src="%s" alt="%s" loading="lazy" class="%s" style="%s"%s%s onerror="this.onerror=null;this.classList.add(\'img-err\');">',
        e($src),
        e($alt),
        e($imageClasses),
        e($inlineStyle),
        $widthAttr,
        $heightAttr
    );
}

/**
 * Generate formatted WhatsApp link with prefilled booking message.
 */
function wa_link($phone, $message) {
    return 'https://wa.me/' . preg_replace('/[^0-9]/', '', $phone) . '?text=' . rawurlencode($message);
}

