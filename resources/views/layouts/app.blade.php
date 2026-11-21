<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Blog') — Pasak Blog</title>

    <!-- Google Fonts & Material Symbols (Material Design 3) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    @php
        $customFavicon = config("pasax.dashboard.favicon");
        $defaultFavicon = "data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>📰</text></svg>";
        $faviconUrl = $customFavicon ?: $defaultFavicon;
    @endphp
    @hasSection("favicon")
        @yield("favicon")
    @else
        <link rel="icon" type="image/svg+xml" href="{{ $faviconUrl }}">
    @endif

    <!-- Prevent Theme Flash -->
    <script>
        (function() {
            try {
                var stored = localStorage.getItem('app-theme') || 'auto';
                var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var isDark = stored === 'dark' || (stored === 'auto' && prefersDark);
                if (isDark) {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>

    <style>
        /* ==========================================================================
           Material Design 3 (M3) Design System Tokens & Base Styles
           ========================================================================== */
        :root {
            --md-font-sans: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --md-font-display: 'Outfit', 'Plus Jakarta Sans', sans-serif;
            --md-font-mono: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;

            /* Light Theme Tokens */
            --md-sys-color-surface: #f8fafc;
            --md-sys-color-surface-container-lowest: #ffffff;
            --md-sys-color-surface-container-low: #f8fafc;
            --md-sys-color-surface-container: #ffffff;
            --md-sys-color-surface-container-high: #f1f5f9;
            --md-sys-color-surface-container-highest: #e2e8f0;
            --md-sys-color-on-surface: #0f172a;
            --md-sys-color-on-surface-variant: #475569;
            --md-sys-color-outline: #cbd5e1;
            --md-sys-color-outline-variant: #e2e8f0;

            --md-sys-color-primary: #4f46e5;
            --md-sys-color-primary-hover: #4338ca;
            --md-sys-color-on-primary: #ffffff;
            --md-sys-color-primary-container: #eef2ff;
            --md-sys-color-on-primary-container: #3730a3;

            --md-sys-color-secondary: #0284c7;
            --md-sys-color-secondary-container: #e0f2fe;
            --md-sys-color-on-secondary-container: #0369a1;

            --md-sys-color-tertiary: #059669;
            --md-sys-color-tertiary-container: #d1fae5;
            --md-sys-color-on-tertiary-container: #065f46;

            --md-sys-color-error: #dc2626;
            --md-sys-color-error-container: #fef2f2;
            --md-sys-color-on-error-container: #991b1b;

            --md-sys-color-success: #16a34a;
            --md-sys-color-success-container: #f0fdf4;
            --md-sys-color-on-success-container: #166534;

            --md-elevation-1: 0 1px 3px 0 rgba(15, 23, 42, 0.06), 0 1px 2px -1px rgba(15, 23, 42, 0.04);
            --md-elevation-2: 0 4px 6px -1px rgba(15, 23, 42, 0.07), 0 2px 4px -2px rgba(15, 23, 42, 0.04);
            --md-elevation-3: 0 10px 15px -3px rgba(15, 23, 42, 0.08), 0 4px 6px -4px rgba(15, 23, 42, 0.04);
            --md-elevation-hover: 0 14px 24px -4px rgba(15, 23, 42, 0.12), 0 6px 10px -4px rgba(15, 23, 42, 0.06);

            --md-radius-sm: 8px;
            --md-radius-md: 12px;
            --md-radius-lg: 16px;
            --md-radius-xl: 24px;
            --md-radius-full: 9999px;

            --nav-bg: rgba(255, 255, 255, 0.85);
            --nav-border: rgba(226, 232, 240, 0.8);
            color-scheme: light;
        }

        /* Dark Theme Tokens */
        [data-theme="dark"],
        html.dark {
            --md-sys-color-surface: #0a0e17;
            --md-sys-color-surface-container-lowest: #0d131f;
            --md-sys-color-surface-container-low: #111827;
            --md-sys-color-surface-container: #151e2e;
            --md-sys-color-surface-container-high: #1e293b;
            --md-sys-color-surface-container-highest: #293548;
            --md-sys-color-on-surface: #f8fafc;
            --md-sys-color-on-surface-variant: #94a3b8;
            --md-sys-color-outline: #2d3748;
            --md-sys-color-outline-variant: #1e293b;

            --md-sys-color-primary: #818cf8;
            --md-sys-color-primary-hover: #a5b4fc;
            --md-sys-color-on-primary: #0f172a;
            --md-sys-color-primary-container: #312e81;
            --md-sys-color-on-primary-container: #e0e7ff;

            --md-sys-color-secondary: #38bdf8;
            --md-sys-color-secondary-container: #0369a1;
            --md-sys-color-on-secondary-container: #e0f2fe;

            --md-sys-color-tertiary: #34d399;
            --md-sys-color-tertiary-container: #064e3b;
            --md-sys-color-on-tertiary-container: #a7f3d0;

            --md-sys-color-error: #f87171;
            --md-sys-color-error-container: #450a0a;
            --md-sys-color-on-error-container: #fecaca;

            --md-sys-color-success: #4ade80;
            --md-sys-color-success-container: #052e16;
            --md-sys-color-on-success-container: #bbf7d0;

            --md-elevation-1: 0 1px 3px 0 rgba(0, 0, 0, 0.4), 0 1px 2px -1px rgba(0, 0, 0, 0.3);
            --md-elevation-2: 0 4px 8px -1px rgba(0, 0, 0, 0.5), 0 2px 4px -2px rgba(0, 0, 0, 0.3);
            --md-elevation-3: 0 10px 20px -3px rgba(0, 0, 0, 0.6), 0 4px 6px -4px rgba(0, 0, 0, 0.3);
            --md-elevation-hover: 0 16px 28px -4px rgba(0, 0, 0, 0.7), 0 6px 12px -4px rgba(0, 0, 0, 0.4);

            --nav-bg: rgba(13, 19, 31, 0.85);
            --nav-border: rgba(30, 41, 59, 0.8);
            color-scheme: dark;
        }

        /* Reset & Global */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--md-font-sans);
            background-color: var(--md-sys-color-surface);
            color: var(--md-sys-color-on-surface);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.25s ease, color 0.25s ease;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--md-font-display);
            color: var(--md-sys-color-on-surface);
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        a {
            color: var(--md-sys-color-primary);
            text-decoration: none;
            transition: color 0.15s ease, opacity 0.15s ease;
        }

        a:hover {
            color: var(--md-sys-color-primary-hover);
        }

        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 20px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            vertical-align: middle;
        }

        /* ==========================================================================
           M3 Top App Bar (Navbar)
           ========================================================================== */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: var(--nav-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--nav-border);
            transition: background-color 0.25s ease, border-color 0.25s ease;
        }

        .navbar .inner {
            max-width: 76rem;
            margin: 0 auto;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            font-family: var(--md-font-display);
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--md-sys-color-on-surface);
            letter-spacing: -0.03em;
        }

        .brand:hover {
            color: var(--md-sys-color-primary);
        }

        .brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: var(--md-radius-md);
            background: linear-gradient(135deg, var(--md-sys-color-primary) 0%, #3b82f6 100%);
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);
        }

        .brand-icon .material-symbols-outlined {
            font-size: 22px;
        }

        .navlinks {
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .navlinks a.nav-item {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 0.9rem;
            border-radius: var(--md-radius-full);
            color: var(--md-sys-color-on-surface-variant);
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.15s ease;
        }

        .navlinks a.nav-item:hover {
            color: var(--md-sys-color-on-surface);
            background: var(--md-sys-color-surface-container-high);
        }

        .navlinks a.nav-item.active {
            color: var(--md-sys-color-on-primary-container);
            background: var(--md-sys-color-primary-container);
            font-weight: 700;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        /* Theme Toggle Button */
        .theme-toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: var(--md-radius-full);
            border: 1px solid var(--md-sys-color-outline-variant);
            background: var(--md-sys-color-surface-container);
            color: var(--md-sys-color-on-surface);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .theme-toggle-btn:hover {
            background: var(--md-sys-color-surface-container-high);
            border-color: var(--md-sys-color-outline);
            transform: scale(1.04);
        }

        .user-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 0.75rem 0.35rem 0.45rem;
            border-radius: var(--md-radius-full);
            background: var(--md-sys-color-surface-container-high);
            border: 1px solid var(--md-sys-color-outline-variant);
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--md-sys-color-on-surface);
        }

        .user-avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--md-sys-color-primary);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .hamburger {
            display: none;
            background: var(--md-sys-color-surface-container);
            border: 1px solid var(--md-sys-color-outline-variant);
            color: var(--md-sys-color-on-surface);
            border-radius: var(--md-radius-md);
            padding: 0.5rem;
            cursor: pointer;
            font-size: 1.25rem;
            align-items: center;
            justify-content: center;
        }

        /* ==========================================================================
           Layout Container
           ========================================================================== */
        .container {
            max-width: 76rem;
            width: 100%;
            margin: 0 auto;
            padding: 2.5rem 1.5rem 5rem;
            flex: 1;
        }

        /* Hero Banner */
        .hero {
            position: relative;
            background: linear-gradient(135deg, var(--md-sys-color-surface-container) 0%, var(--md-sys-color-surface-container-high) 100%);
            border: 1px solid var(--md-sys-color-outline-variant);
            border-radius: var(--md-radius-xl);
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: var(--md-elevation-1);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero h1 {
            font-size: 2.25rem;
            line-height: 1.2;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .hero p {
            color: var(--md-sys-color-on-surface-variant);
            font-size: 1.05rem;
            max-width: 42rem;
            margin: 0;
        }

        /* ==========================================================================
           M3 Cards & Post Grid
           ========================================================================== */
        .card {
            background: var(--md-sys-color-surface-container);
            border: 1px solid var(--md-sys-color-outline-variant);
            border-radius: var(--md-radius-lg);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--md-elevation-1);
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        .card:hover {
            box-shadow: var(--md-elevation-2);
        }

        .grid-posts {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .post-card {
            background: var(--md-sys-color-surface-container);
            border: 1px solid var(--md-sys-color-outline-variant);
            border-radius: var(--md-radius-lg);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: var(--md-elevation-1);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .post-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--md-elevation-hover);
            border-color: var(--md-sys-color-outline);
        }

        .post-card img.cover {
            width: 100%;
            height: 190px;
            object-fit: cover;
            background: var(--md-sys-color-surface-container-high);
            transition: transform 0.3s ease;
        }

        .post-card:hover img.cover {
            transform: scale(1.02);
        }

        .post-card .body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
            flex: 1;
        }

        .post-card h2 {
            font-size: 1.15rem;
            line-height: 1.35;
            margin: 0;
        }

        .post-card h2 a {
            color: var(--md-sys-color-on-surface);
        }

        .post-card h2 a:hover {
            color: var(--md-sys-color-primary);
        }

        .post-card p.ex {
            font-size: 0.9rem;
            color: var(--md-sys-color-on-surface-variant);
            line-height: 1.5;
            flex: 1;
        }

        .meta {
            font-size: 0.8rem;
            color: var(--md-sys-color-on-surface-variant);
            display: flex;
            align-items: center;
            gap: 0.4rem;
            flex-wrap: wrap;
        }

        /* ==========================================================================
           M3 Chips & Badges
           ========================================================================== */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.75rem;
            font-weight: 600;
            background: var(--md-sys-color-surface-container-high);
            border: 1px solid var(--md-sys-color-outline-variant);
            border-radius: var(--md-radius-full);
            padding: 0.2rem 0.65rem;
            color: var(--md-sys-color-on-surface);
            transition: all 0.15s ease;
        }

        .badge.cat {
            background: var(--md-sys-color-tertiary-container);
            border-color: transparent;
            color: var(--md-sys-color-on-tertiary-container);
            font-weight: 700;
        }

        .badge.cat:hover {
            opacity: 0.9;
        }

        /* ==========================================================================
           M3 Buttons
           ========================================================================== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            border: 1px solid var(--md-sys-color-outline);
            background: var(--md-sys-color-surface-container-low);
            color: var(--md-sys-color-on-surface);
            border-radius: var(--md-radius-full);
            padding: 0.55rem 1.15rem;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: var(--md-font-sans);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--md-elevation-1);
        }

        .btn:hover {
            background: var(--md-sys-color-surface-container-high);
            border-color: var(--md-sys-color-outline);
            color: var(--md-sys-color-on-surface);
            text-decoration: none;
            box-shadow: var(--md-elevation-2);
            transform: translateY(-1px);
        }

        .btn.primary {
            background: var(--md-sys-color-primary);
            border-color: var(--md-sys-color-primary);
            color: var(--md-sys-color-on-primary);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }

        .btn.primary:hover {
            background: var(--md-sys-color-primary-hover);
            border-color: var(--md-sys-color-primary-hover);
            color: var(--md-sys-color-on-primary);
            box-shadow: 0 6px 16px rgba(79, 70, 229, 0.35);
        }

        .btn.danger {
            background: var(--md-sys-color-error);
            border-color: var(--md-sys-color-error);
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.25);
        }

        .btn.danger:hover {
            opacity: 0.92;
            color: #ffffff;
        }

        .btn.tonal {
            background: var(--md-sys-color-primary-container);
            border-color: transparent;
            color: var(--md-sys-color-on-primary-container);
        }

        .btn.tonal:hover {
            background: var(--md-sys-color-primary);
            color: var(--md-sys-color-on-primary);
        }

        /* ==========================================================================
           M3 Form Inputs & Controls
           ========================================================================== */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            background: var(--md-sys-color-surface-container-low);
            border: 1.5px solid var(--md-sys-color-outline-variant);
            color: var(--md-sys-color-on-surface);
            border-radius: var(--md-radius-md);
            padding: 0.7rem 0.95rem;
            font-size: 0.92rem;
            font-family: var(--md-font-sans);
            transition: all 0.2s ease;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--md-sys-color-primary);
            background: var(--md-sys-color-surface-container);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
        }

        input[type="file"] {
            padding: 0.5rem;
            cursor: pointer;
        }

        label {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--md-sys-color-on-surface);
            display: block;
            margin-bottom: 0.85rem;
        }

        label > input,
        label > select,
        label > textarea {
            margin-top: 0.4rem;
        }

        .checks {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.4rem;
        }

        .checks label {
            background: var(--md-sys-color-surface-container);
            border: 1.5px solid var(--md-sys-color-outline-variant);
            border-radius: var(--md-radius-full);
            padding: 0.4rem 0.85rem;
            display: inline-flex;
            gap: 0.5rem;
            align-items: center;
            width: auto;
            margin-bottom: 0.4rem;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.15s ease;
        }

        .checks label:hover {
            border-color: var(--md-sys-color-primary);
            background: var(--md-sys-color-primary-container);
            color: var(--md-sys-color-on-primary-container);
        }

        .checks input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--md-sys-color-primary);
            cursor: pointer;
        }

        /* ==========================================================================
           M3 Tables
           ========================================================================== */
        table {
            width: 100%;
            font-size: 0.88rem;
            border-collapse: separate;
            border-spacing: 0;
        }

        th {
            padding: 0.85rem 1rem;
            background: var(--md-sys-color-surface-container-high);
            color: var(--md-sys-color-on-surface-variant);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            text-align: left;
            border-bottom: 1.5px solid var(--md-sys-color-outline-variant);
        }

        th:first-child {
            border-top-left-radius: var(--md-radius-md);
        }

        th:last-child {
            border-top-right-radius: var(--md-radius-md);
        }

        td {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid var(--md-sys-color-outline-variant);
            text-align: left;
            vertical-align: middle;
            color: var(--md-sys-color-on-surface);
        }

        tr:hover td {
            background: var(--md-sys-color-surface-container-high);
        }

        tr:last-child td {
            border-bottom: none;
        }

        code {
            background: var(--md-sys-color-surface-container-high);
            color: var(--md-sys-color-primary);
            padding: 0.15rem 0.45rem;
            border-radius: var(--md-radius-sm);
            font-size: 0.82rem;
            font-family: var(--md-font-mono);
            border: 1px solid var(--md-sys-color-outline-variant);
        }

        /* ==========================================================================
           Alerts / Status Messages
           ========================================================================== */
        .card.ok {
            background: var(--md-sys-color-success-container);
            border-color: var(--md-sys-color-success);
            color: var(--md-sys-color-on-success-container);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
        }

        .card.err {
            background: var(--md-sys-color-error-container);
            border-color: var(--md-sys-color-error);
            color: var(--md-sys-color-on-error-container);
            font-weight: 500;
            padding: 1rem 1.25rem;
        }

        .card.err ul {
            margin-left: 1.5rem;
        }

        /* ==========================================================================
           Article / Detail Styling
           ========================================================================== */
        .article {
            max-width: 48rem;
            margin: 0 auto;
        }

        .article h1 {
            font-size: 2.35rem;
            line-height: 1.25;
            margin: 0.75rem 0;
            letter-spacing: -0.03em;
        }

        .article .lead {
            font-size: 1.15rem;
            color: var(--md-sys-color-on-surface-variant);
            border-left: 4px solid var(--md-sys-color-primary);
            padding-left: 1.25rem;
            margin: 1.5rem 0;
            line-height: 1.6;
        }

        .article .content {
            font-size: 1.05rem;
            line-height: 1.85;
            color: var(--md-sys-color-on-surface);
            margin: 1.5rem 0;
        }

        .article img.hero-img {
            width: 100%;
            border-radius: var(--md-radius-xl);
            margin: 1.5rem 0;
            box-shadow: var(--md-elevation-2);
        }

        /* Dashboard Stat Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .stat {
            background: var(--md-sys-color-surface-container);
            border: 1px solid var(--md-sys-color-outline-variant);
            border-radius: var(--md-radius-lg);
            padding: 1.25rem;
            box-shadow: var(--md-elevation-1);
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            transition: all 0.2s ease;
        }

        .stat:hover {
            box-shadow: var(--md-elevation-2);
            transform: translateY(-2px);
        }

        .stat b {
            font-size: 2rem;
            font-family: var(--md-font-display);
            color: var(--md-sys-color-primary);
            line-height: 1.1;
        }

        .stat .muted {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--md-sys-color-on-surface-variant);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Footer */
        .footer {
            border-top: 1px solid var(--md-sys-color-outline-variant);
            background: var(--md-sys-color-surface-container-low);
            padding: 2.5rem 1.5rem;
            text-align: center;
            color: var(--md-sys-color-on-surface-variant);
            font-size: 0.9rem;
            margin-top: auto;
        }

        .footer .footer-inner {
            max-width: 76rem;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }

        .footer a {
            color: var(--md-sys-color-on-surface-variant);
            font-weight: 500;
        }

        .footer a:hover {
            color: var(--md-sys-color-primary);
        }

        /* Responsive Mobile Styles */
        @media (max-width: 868px) {
            .navbar .inner {
                padding: 0.75rem 1rem;
            }

            .hamburger {
                display: inline-flex;
            }

            .navlinks {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--md-sys-color-surface-container);
                border-bottom: 1px solid var(--md-sys-color-outline-variant);
                box-shadow: var(--md-elevation-3);
                flex-direction: column;
                align-items: stretch;
                padding: 1rem 1.25rem;
                gap: 0.4rem;
            }

            .navlinks.open {
                display: flex;
            }

            .navlinks a.nav-item {
                border-radius: var(--md-radius-md);
                padding: 0.75rem 1rem;
            }

            .container {
                padding: 1.5rem 1rem 4rem;
            }

            .hero {
                padding: 1.5rem;
                border-radius: var(--md-radius-lg);
            }

            .hero h1 {
                font-size: 1.65rem;
            }

            .grid-posts {
                grid-template-columns: 1fr;
            }

            .article h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <!-- M3 Top App Bar -->
    <header class="navbar">
        <div class="inner">
            <a class="brand" href="{{ route('posts.index') }}">
                <span class="brand-icon">
                    <span class="material-symbols-outlined">auto_stories</span>
                </span>
                <span>Pasak Blog</span>
            </a>

            <!-- Navigation Links -->
            <nav class="navlinks" id="navLinks">
                <a href="{{ url('/') }}" class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">home</span>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('posts.index') }}" class="nav-item {{ request()->routeIs('posts.*') && !request()->is('/') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">article</span>
                    <span>Semua Post</span>
                </a>
                @auth
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('pasax') }}" class="nav-item {{ request()->routeIs('pasax.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">shield</span>
                    <span>Pasax WAF</span>
                </a>
                @endauth
                <a href="{{ route('categories.index') }}" class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">folder</span>
                    <span>Kategori</span>
                </a>
                <a href="{{ route('tags.index') }}" class="nav-item {{ request()->routeIs('tags.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">label</span>
                    <span>Tags</span>
                </a>
                <a href="{{ route('contacts.index') }}" class="nav-item {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">contact_phone</span>
                    <span>Kontak</span>
                </a>
            </nav>

            <!-- Actions (Theme Toggle & Auth) -->
            <div class="nav-actions">
                <!-- Theme Toggle Button -->
                <button type="button" class="theme-toggle-btn" id="themeToggleBtn" aria-label="Ganti Tema">
                    <span class="material-symbols-outlined" id="themeIcon">light_mode</span>
                </button>

                @auth
                <div class="user-chip">
                    <span class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    <span>{{ auth()->user()->name }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;display:inline">
                    @csrf
                    <button class="btn" type="submit" title="Keluar">
                        <span class="material-symbols-outlined">logout</span>
                        <span>Keluar</span>
                    </button>
                </form>
                @else
                <a class="btn" href="{{ route('login') }}">Masuk</a>
                <a class="btn primary" href="{{ route('register') }}">Daftar</a>
                @endauth

                <!-- Mobile Menu Button -->
                <button class="hamburger" id="navToggle" type="button" aria-label="Menu Navigasi">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Theme & Mobile Navigation Logic -->
    <script>
        (function() {
            // Mobile Menu Toggle
            var toggle = document.getElementById('navToggle');
            var menu = document.getElementById('navLinks');
            if (toggle && menu) {
                toggle.addEventListener('click', function() {
                    menu.classList.toggle('open');
                    var icon = toggle.querySelector('.material-symbols-outlined');
                    if (icon) {
                        icon.textContent = menu.classList.contains('open') ? 'close' : 'menu';
                    }
                });
            }

            // Theme Switcher Logic
            var themeBtn = document.getElementById('themeToggleBtn');
            var themeIcon = document.getElementById('themeIcon');

            function updateThemeIcon() {
                var isDark = document.documentElement.classList.contains('dark') || document.documentElement.getAttribute('data-theme') === 'dark';
                if (themeIcon) {
                    themeIcon.textContent = isDark ? 'light_mode' : 'dark_mode';
                    themeIcon.title = isDark ? 'Beralih ke mode terang' : 'Beralih ke mode gelap';
                }
            }

            updateThemeIcon();

            if (themeBtn) {
                themeBtn.addEventListener('click', function() {
                    var currentIsDark = document.documentElement.classList.contains('dark') || document.documentElement.getAttribute('data-theme') === 'dark';
                    var newTheme = currentIsDark ? 'light' : 'dark';

                    if (newTheme === 'dark') {
                        document.documentElement.setAttribute('data-theme', 'dark');
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.setAttribute('data-theme', 'light');
                        document.documentElement.classList.remove('dark');
                    }
                    localStorage.setItem('app-theme', newTheme);
                    updateThemeIcon();
                });
            }
        })();
    </script>

    <!-- Main Content Container -->
    <main class="container">
        @if(session('status'))
        <div class="card ok">
            <span class="material-symbols-outlined" style="font-size:24px">check_circle</span>
            <div>{{ session('status') }}</div>
        </div>
        @endif

        @if(isset($errors) && $errors->any())
        <div class="card err">
            <div style="display:flex;align-items:center;gap:.5rem;margin-bottom:.5rem;font-weight:700">
                <span class="material-symbols-outlined" style="font-size:22px">error</span>
                <span>Terjadi kesalahan:</span>
            </div>
            <ul>
                @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </main>

    <!-- M3 Footer -->
    <footer class="footer">
        <div class="footer-inner">
            <div style="display:flex;align-items:center;gap:.5rem;font-weight:700;font-family:var(--md-font-display);color:var(--md-sys-color-on-surface)">
                <span class="material-symbols-outlined" style="color:var(--md-sys-color-primary)">auto_stories</span>
                <span>Pasak Blog</span>
            </div>
            <p>Sistem Blog & Lab Keamanan Web Modern dengan Material Design 3.</p>
            <p style="font-size:0.8rem;opacity:0.75">&copy; {{ date('Y') }} Pasak Blog. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>

</html>
