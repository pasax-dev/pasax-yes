@php
// Sampul post: gambar asli bila ada, SVG placeholder bila tidak (Material Design 3 Style).
// Variabel: $url, $title, $class, $style, $loading.
$coverSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 450" width="100%" height="100%">'
    .'<defs>'
    .'<linearGradient id="m3grad" x1="0%" y1="0%" x2="100%" y2="100%">'
    .'<stop offset="0%" stop-color="#312e81"/>'
    .'<stop offset="50%" stop-color="#1e1b4b"/>'
    .'<stop offset="100%" stop-color="#0f172a"/>'
    .'</linearGradient>'
    .'<radialGradient id="m3accent" cx="70%" cy="30%" r="60%">'
    .'<stop offset="0%" stop-color="#6366f1" stop-opacity="0.35"/>'
    .'<stop offset="100%" stop-color="#6366f1" stop-opacity="0"/>'
    .'</radialGradient>'
    .'</defs>'
    .'<rect width="800" height="450" fill="url(#m3grad)"/>'
    .'<rect width="800" height="450" fill="url(#m3accent)"/>'
    .'<g transform="translate(400, 200)">'
    .'<circle r="52" fill="#4f46e5" fill-opacity="0.25"/>'
    .'<circle r="40" fill="#6366f1" fill-opacity="0.3"/>'
    .'<path d="M-18 -12 L18 -12 C20 -12 22 -10 22 -8 L22 16 C22 18 20 20 18 20 L-18 20 C-20 20 -22 18 -22 16 L-22 -8 C-22 -10 -20 -12 -18 -12 Z" fill="none" stroke="#a5b4fc" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>'
    .'<circle cx="-10" cy="-2" r="3.5" fill="#a5b4fc"/>'
    .'<path d="M-22 14 L-8 0 L4 12 L12 4 L22 14" fill="none" stroke="#a5b4fc" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>'
    .'</g>'
    .'<text x="400" y="295" text-anchor="middle" font-family="Plus Jakarta Sans, sans-serif" font-weight="600" font-size="20" fill="#94a3b8" letter-spacing="1">PASAK BLOG</text>'
    .'</svg>';
$coverSrc = ($url ?? null) ?: 'data:image/svg+xml;utf8,'.rawurlencode($coverSvg);
$coverAttrs = 'src="'.$coverSrc.'" alt="'.e($title ?? '').'"';
$coverAttrs .= ! empty($class) ? ' class="'.e($class).'\"' : '';
$coverAttrs .= ! empty($style) ? ' style="'.e($style).'\"' : '';
$coverAttrs .= ' loading="'.e($loading ?? 'lazy').'"';
@endphp
<img {!! $coverAttrs !!}>
