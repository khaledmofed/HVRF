<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $settings['meta_title'] ?? 'HVRF — Human Value Reserve Foundation')</title>
    <meta name="description" content="{{ $settings['meta_description'] ?? '' }}">
    <link rel="icon" type="image/jpeg" href="/images/logo.jpeg">
    <link rel="apple-touch-icon" href="/images/logo.jpeg">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --hvrf-navy:      #0D1B2A;
            --hvrf-navy-2:    #0A1420;
            --hvrf-navy-soft: #162235;
            --hvrf-teal:      #4ECDC4;
            --hvrf-teal-dark: #2AA39B;
            --hvrf-teal-glow: rgba(78,205,196,0.25);
            --hvrf-gold:      #C9A96E;
            --hvrf-gold-soft: rgba(201,169,110,0.15);
            --hvrf-white:     #FFFFFF;
            --hvrf-light:     #F5F7FA;
            --hvrf-light-2:   #EEF1F5;
            --hvrf-gray:      #6B7280;
            --hvrf-dark-text: #111827;
            --hvrf-border:    rgba(0,0,0,0.07);
            --radius-card:    18px;
            --shadow-sm:      0 2px 12px rgba(0,0,0,0.06);
            --shadow-md:      0 8px 32px rgba(0,0,0,0.10);
            --shadow-lg:      0 20px 60px rgba(0,0,0,0.14);
            --transition:     all 0.35s cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; overflow-x: hidden; }
        body {
            font-family: 'Inter', sans-serif;
            color: var(--hvrf-dark-text);
            overflow-x: hidden;
            background: #fff;
            line-height: 1.7;
        }
        h1, h2, h3, h4, h5 { font-family: 'Playfair Display', serif; line-height: 1.25; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--hvrf-navy-2); }
        ::-webkit-scrollbar-thumb { background: var(--hvrf-teal); border-radius: 3px; }

        /* ── SELECTION ── */
        ::selection { background: var(--hvrf-teal); color: #fff; }

        /* ── NAVBAR ── */
        #mainNavbar {
            transition: var(--transition);
            padding: 1.1rem 0;
            z-index: 1050;
        }
        #mainNavbar.scrolled {
            background: rgba(255,255,255,0.94) !important;
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 2px 24px rgba(0,0,0,0.09);
            padding: 0.65rem 0;
        }
        #mainNavbar.scrolled .nav-link { color: var(--hvrf-navy) !important; }
        #mainNavbar.scrolled .navbar-brand { color: var(--hvrf-navy) !important; }
        #mainNavbar.scrolled .nav-cta { background: var(--hvrf-gold) !important; color: var(--hvrf-navy) !important; }
        /* Fix: toggler icon goes dark when navbar is white (scrolled) */
        #mainNavbar.scrolled .navbar-toggler { color: var(--hvrf-navy) !important; }

        /* Mobile: solid dark background when menu is open */
        @media (max-width: 991.98px) {
            #mainNavbar:has(#navMenu.show),
            #mainNavbar:has(#navMenu.collapsing) {
                background: rgba(10, 20, 32, 0.97) !important;
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }
            #mainNavbar:has(#navMenu.show) .nav-link,
            #mainNavbar:has(#navMenu.collapsing) .nav-link {
                color: rgba(255,255,255,0.85) !important;
            }
            #mainNavbar:has(#navMenu.show) .navbar-brand,
            #mainNavbar:has(#navMenu.collapsing) .navbar-brand {
                color: #fff !important;
            }
            #mainNavbar:has(#navMenu.show) .navbar-toggler,
            #mainNavbar:has(#navMenu.collapsing) .navbar-toggler {
                color: rgba(255,255,255,0.8) !important;
            }
        }

        .navbar-brand img {
            height: 42px; width: 42px;
            object-fit: contain;
        }
        .nav-link {
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 0.2px;
            position: relative;
            padding-bottom: 4px !important;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 0; height: 2px;
            background: var(--hvrf-teal);
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        .nav-link:hover::after { width: 100%; }
        .nav-cta {
            background: var(--hvrf-gold) !important;
            color: var(--hvrf-navy) !important;
            border: none !important;
            border-radius: 2rem !important;
            padding: 0.5rem 1.4rem !important;
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            letter-spacing: .08em !important;
            text-transform: uppercase !important;
            transition: var(--transition) !important;
        }
        .nav-cta:hover {
            background: #b8924a !important;
            color: #fff !important;
            box-shadow: 0 4px 18px rgba(201,169,110,0.45) !important;
            transform: translateY(-1px);
        }
        .nav-cta::after { display: none !important; }

        /* ── NAV ACTIVE STATE ── */
        .nav-link.nav-active {
            color: var(--hvrf-teal) !important;
        }
        .nav-link.nav-active::after { width: 100% !important; }
        #mainNavbar.scrolled .nav-link.nav-active { color: var(--hvrf-teal) !important; }

        /* ── BUTTONS ── */
        .btn-hvrf-primary {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: var(--hvrf-teal);
            color: #fff;
            border: 2px solid var(--hvrf-teal);
            border-radius: 10px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
            text-decoration: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .btn-hvrf-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .btn-hvrf-primary:hover {
            background: var(--hvrf-teal-dark);
            border-color: var(--hvrf-teal-dark);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px var(--hvrf-teal-glow);
        }
        .btn-hvrf-primary:hover::before { opacity: 1; }

        .btn-hvrf-outline {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: transparent;
            color: rgba(255,255,255,0.9);
            border: 2px solid rgba(255,255,255,0.35);
            border-radius: 10px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
            text-decoration: none;
            cursor: pointer;
        }
        .btn-hvrf-outline:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.7);
            color: #fff;
            transform: translateY(-3px);
        }

        /* ── SECTION HELPERS ── */
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--hvrf-teal);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        .section-label::before {
            content: '';
            display: inline-block;
            width: 24px; height: 2px;
            background: var(--hvrf-teal);
            border-radius: 2px;
        }
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.9rem, 3.5vw, 2.75rem);
            color: var(--hvrf-dark-text);
            font-weight: 700;
            margin-bottom: 0;
        }
        .section-title.light { color: #fff; }
        .section-subtitle {
            color: var(--hvrf-gray);
            font-size: 1rem;
            max-width: 580px;
            margin: 0 auto;
            line-height: 1.75;
        }

        /* ── HERO ── */
        .hero-section {
            min-height: 100vh;
            background: var(--hvrf-navy-2);
            background-image:
                radial-gradient(ellipse 900px 700px at 10% 60%, rgba(78,205,196,0.07) 0%, transparent 70%),
                radial-gradient(ellipse 600px 500px at 90% 10%, rgba(201,169,110,0.06) 0%, transparent 60%),
                radial-gradient(ellipse 400px 400px at 70% 90%, rgba(78,205,196,0.04) 0%, transparent 60%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(78,205,196,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78,205,196,0.025) 1px, transparent 1px);
            background-size: 64px 64px;
            pointer-events: none;
        }
        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            pointer-events: none;
            will-change: transform;
        }
        .hero-orb-1 {
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(78,205,196,0.1), transparent 70%);
            top: -120px; right: -80px;
        }
        .hero-orb-2 {
            width: 480px; height: 480px;
            background: radial-gradient(circle, rgba(201,169,110,0.08), transparent 70%);
            bottom: -100px; left: -60px;
        }
        .hero-orb-3 {
            width: 350px; height: 350px;
            background: radial-gradient(circle, rgba(78,205,196,0.06), transparent 70%);
            top: 30%; left: 20%;
        }

        /* decorative rings */
        .hero-ring {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            will-change: transform;
        }
        .hero-ring-1 {
            width: 700px; height: 700px;
            border: 1px solid rgba(78,205,196,0.07);
            top: 50%; right: -200px;
            transform: translateY(-50%);
        }
        .hero-ring-2 {
            width: 480px; height: 480px;
            border: 1px dashed rgba(201,169,110,0.06);
            top: 50%; right: -60px;
            transform: translateY(-50%);
        }

        /* word split */
        .hw-wrap {
            display: inline-block;
            overflow: hidden;
            vertical-align: bottom;
            line-height: 1.2;
        }
        .hw-inner {
            display: inline-block;
            will-change: transform, opacity;
        }

        /* typewriter cursor blink */
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0; }
        }

        /* scroll bob */
        @keyframes scrollBob {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(6px); }
        }
        .hero-watermark {
            position: absolute;
            right: -60px; top: 50%;
            transform: translateY(-50%);
            width: 520px; height: 520px;
            object-fit: contain;
            opacity: 0.035;
            pointer-events: none;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(78,205,196,0.1);
            border: 1px solid rgba(78,205,196,0.3);
            border-radius: 50px;
            padding: 0.45rem 1.1rem;
            color: var(--hvrf-teal);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 1.75rem;
        }
        .hero-badge .badge-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--hvrf-teal);
            animation: pulse-dot 2s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.75); }
        }
        .hero-title {
            font-size: clamp(2.4rem, 5.5vw, 4rem);
            font-weight: 800;
            color: #fff;
            line-height: 1.15;
            letter-spacing: -0.5px;
            margin-bottom: 1.25rem;
        }
        .hero-title .teal-word {
            color: var(--hvrf-teal);
            position: relative;
        }
        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.15rem);
            color: rgba(255,255,255,0.7);
            max-width: 640px;
            margin: 0 auto 2.25rem;
            font-weight: 300;
            line-height: 1.75;
        }
        .hero-stats-bar {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 2rem;
            margin-top: 0.5rem;
        }
        .stat-item .stat-value {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--hvrf-gold);
            font-family: 'Playfair Display', serif;
            line-height: 1;
            display: block;
        }
        .stat-item .stat-label {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.55);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 0.25rem;
            display: block;
        }
        .stat-sep {
            width: 1px;
            height: 40px;
            background: rgba(255,255,255,0.12);
        }

        /* ── WAVE DIVIDERS ── */
        .wave-top, .wave-bottom {
            display: block;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        /* ── ABOUT ── */
        .glass-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(78,205,196,0.2);
            border-left: 4px solid var(--hvrf-teal);
            border-radius: var(--radius-card);
            padding: 2rem 2.25rem;
            backdrop-filter: blur(10px);
        }
        .glass-card blockquote {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.15rem;
            color: rgba(255,255,255,0.92);
            line-height: 1.6;
            margin: 0 0 0.75rem;
        }
        /* ── ABOUT CARDS (Wise-style) ── */
        .about-card {
            border-radius: 18px;
            padding: 2rem 1.75rem;
            transition: transform 0.35s cubic-bezier(0.4,0,0.2,1),
                        box-shadow 0.35s cubic-bezier(0.4,0,0.2,1),
                        background 0.5s ease,
                        border-color 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        .about-card::after {
            content: '';
            position: absolute; inset: 0;
            opacity: 0;
            transition: opacity 0.45s ease;
            border-radius: inherit;
            pointer-events: none;
        }
        .about-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); }
        .about-card:hover::after { opacity: 1; }

        .about-card--dark  { background: var(--hvrf-navy); border: 1px solid rgba(78,205,196,0.18); }
        .about-card--dark::after  { background: linear-gradient(135deg, rgba(78,205,196,0.08) 0%, rgba(78,205,196,0.02) 100%); }
        .about-card--dark:hover   { border-color: rgba(78,205,196,0.45); }

        .about-card--teal  { background: rgba(78,205,196,0.09); border: 1px solid rgba(78,205,196,0.22); }
        .about-card--teal::after  { background: linear-gradient(135deg, rgba(78,205,196,0.22) 0%, rgba(78,205,196,0.06) 100%); }
        .about-card--teal:hover   { background: rgba(78,205,196,0.09); border-color: rgba(78,205,196,0.5); }

        .about-card--white { background: #fff; border: 1px solid rgba(0,0,0,0.07); box-shadow: var(--shadow-sm); }
        .about-card--white::after { background: linear-gradient(135deg, rgba(78,205,196,0.07) 0%, rgba(78,205,196,0.02) 100%); }
        .about-card--white:hover  { border-color: rgba(78,205,196,0.3); }

        .about-card--gold  { background: rgba(201,169,110,0.09); border: 1px solid rgba(201,169,110,0.22); }
        .about-card--gold::after  { background: linear-gradient(135deg, rgba(201,169,110,0.22) 0%, rgba(201,169,110,0.06) 100%); }
        .about-card--gold:hover   { background: rgba(201,169,110,0.09); border-color: rgba(201,169,110,0.5); }
        .about-card-label {
            display: inline-block;
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .15em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .about-card--dark  .about-card-label { color: rgba(78,205,196,0.75);  }
        .about-card--teal  .about-card-label { color: var(--hvrf-teal-dark);  }
        .about-card--white .about-card-label { color: var(--hvrf-teal-dark);  }
        .about-card--gold  .about-card-label { color: #9a7840;                }
        .about-card-quote {
            font-size: 3.5rem;
            line-height: .8;
            color: var(--hvrf-gold);
            margin-bottom: .5rem;
            font-family: 'Playfair Display', serif;
        }
        .about-card-icon {
            width: 48px; height: 48px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1.1rem;
            transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), background 0.4s ease;
        }
        .about-card:hover .about-card-icon { transform: scale(1.18) rotate(-5deg); }
        .about-card--teal  .about-card-icon { background: rgba(78,205,196,0.18);   color: var(--hvrf-teal-dark); }
        .about-card--white .about-card-icon { background: rgba(78,205,196,0.12);   color: var(--hvrf-teal);      }
        .about-card--gold  .about-card-icon { background: rgba(201,169,110,0.18);  color: #9a7840;               }
        .about-card--teal:hover  .about-card-icon { background: rgba(78,205,196,0.32);  }
        .about-card--white:hover .about-card-icon { background: rgba(78,205,196,0.22);  }
        .about-card--gold:hover  .about-card-icon { background: rgba(201,169,110,0.32); }
        .about-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: .75rem;
        }
        .about-card--dark  .about-card-title { color: #fff;             }
        .about-card--teal  .about-card-title { color: var(--hvrf-navy); }
        .about-card--white .about-card-title { color: var(--hvrf-navy); }
        .about-card--gold  .about-card-title { color: var(--hvrf-navy); }
        .about-card-body {
            font-size: .9rem;
            line-height: 1.72;
            margin-bottom: 0;
        }
        .about-card--dark  .about-card-body { color: rgba(255,255,255,0.68); }
        .about-card--teal  .about-card-body { color: var(--hvrf-gray);       }
        .about-card--white .about-card-body { color: var(--hvrf-gray);       }
        .about-card--gold  .about-card-body { color: var(--hvrf-gray);       }
        .about-card-attr { font-size: .75rem; color: rgba(255,255,255,0.38); margin-top: 1rem; display: block; }

        .mini-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid var(--hvrf-border);
            padding: 1.5rem;
            height: 100%;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .mini-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--hvrf-teal), var(--hvrf-gold));
            transform: scaleX(0);
            transition: transform 0.35s ease;
            transform-origin: left;
        }
        .mini-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); }
        .mini-card:hover::after { transform: scaleX(1); }
        .mini-card-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: rgba(78,205,196,0.1);
            display: flex; align-items: center; justify-content: center;
            color: var(--hvrf-teal);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        /* ── CARD WATERMARK ICON ── */
        .card-watermark {
            position: absolute;
            bottom: -14px;
            right: -10px;
            font-size: 7.5rem;
            line-height: 1;
            color: var(--hvrf-teal);
            opacity: 0.055;
            pointer-events: none;
            transition: transform 0.45s cubic-bezier(.34,1.56,.64,1), opacity 0.35s ease;
            transform-origin: bottom right;
        }
        .mini-card:hover .card-watermark,
        .focus-card:hover .card-watermark,
        .program-card:hover .card-watermark {
            transform: scale(1.12) rotate(-8deg);
            opacity: 0.1;
        }
        /* focus-card: large number watermark */
        .focus-num-watermark {
            position: absolute;
            bottom: -20px;
            right: 8px;
            font-size: 9rem;
            font-weight: 900;
            font-family: 'Playfair Display', serif;
            line-height: 1;
            color: var(--hvrf-gold);
            opacity: 0.07;
            pointer-events: none;
            transition: transform 0.45s cubic-bezier(.34,1.56,.64,1), opacity 0.35s ease;
            transform-origin: bottom right;
            letter-spacing: -4px;
        }
        .focus-card:hover .focus-num-watermark {
            transform: scale(1.1);
            opacity: 0.12;
        }
        .about-img-frame {
            position: relative;
            display: inline-block;
        }
        .about-img-ring {
            width: 340px; height: 340px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--hvrf-teal);
            box-shadow: 0 0 0 12px rgba(78,205,196,0.07), var(--shadow-lg);
        }
        .about-img-ring img { width: 100%; height: 100%; object-fit: cover; }
        .about-float-badge {
            position: absolute;
            bottom: 16px; right: -16px;
            background: var(--hvrf-navy);
            border: 1px solid rgba(78,205,196,0.25);
            border-radius: 14px;
            padding: 1rem 1.5rem;
            box-shadow: var(--shadow-md);
        }

        /* ── VISION SLIDER ── */
        .vision-section {
            background: var(--hvrf-navy);
            position: relative;
            overflow: hidden;
            height: 540px;
        }
        .vslide {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4rem;
            padding: 3rem 2rem;
            opacity: 0;
            pointer-events: none;
            will-change: opacity, transform;
        }
        .vslide.vs-active { opacity: 1; pointer-events: auto; }

        .vs-visual {
            flex: 0 0 460px;
            max-width: 460px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .vs-visual svg { width: 100%; max-width: 460px; height: auto; }

        .vs-caption {
            flex: 0 0 380px;
            max-width: 380px;
        }
        .vs-num {
            font-family: 'Playfair Display', serif;
            font-size: 5rem;
            font-weight: 900;
            line-height: 1;
            color: rgba(78,205,196,0.12);
            margin-bottom: -0.5rem;
            letter-spacing: -4px;
        }
        .vs-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: var(--hvrf-teal);
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            margin-bottom: 0.75rem;
        }
        .vs-tag::before {
            content: '';
            display: inline-block;
            width: 20px; height: 1px;
            background: var(--hvrf-teal);
        }
        .vs-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.25;
            margin-bottom: 1rem;
        }
        .vs-desc {
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        .vs-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1.1rem;
            background: rgba(78,205,196,0.08);
            border: 1px solid rgba(78,205,196,0.2);
            border-radius: 99px;
            color: var(--hvrf-teal);
            font-size: 0.78rem;
            font-weight: 600;
        }

        /* Nav */
        .vs-nav {
            position: absolute;
            bottom: 1.5rem;
            right: 5rem;
            display: flex;
            align-items: center;
            gap: 0.45rem;
            z-index: 10;
        }
        .vs-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            border: none;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(.4,0,.2,1);
            padding: 0;
        }
        .vs-dot.active {
            width: 26px;
            border-radius: 3.5px;
            background: var(--hvrf-teal);
        }

        /* Progress bar */
        .vs-progress {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: rgba(255,255,255,0.05);
        }
        .vs-bar {
            display: block;
            height: 100%;
            background: linear-gradient(90deg, var(--hvrf-teal), var(--hvrf-gold));
            width: 0;
        }

        /* SVG animation classes */
        @keyframes vs-pulse { 0%,100%{opacity:.9;transform:scale(1)} 50%{opacity:.5;transform:scale(1.25)} }
        @keyframes vs-pulse-slow { 0%,100%{opacity:.8;transform:scale(1)} 50%{opacity:.4;transform:scale(1.18)} }
        @keyframes vs-drift-a { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }
        @keyframes vs-drift-b { 0%,100%{transform:translateY(0)} 50%{transform:translateY(9px)} }
        @keyframes vs-drift-c { 0%,100%{transform:translateY(0) translateX(0)} 50%{transform:translateY(-7px) translateX(5px)} }
        @keyframes vs-dash { to { stroke-dashoffset: -24; } }
        @keyframes vs-twinkle { 0%,100%{opacity:.7} 50%{opacity:.2} }
        @keyframes vs-twinkle2 { 0%,100%{opacity:.5} 50%{opacity:.9} }
        @keyframes vs-cross { 0%{transform:translateX(-18px);opacity:0} 30%{opacity:1} 70%{opacity:1} 100%{transform:translateX(18px);opacity:0} }
        @keyframes vs-cross2 { 0%{transform:translateX(18px);opacity:0} 30%{opacity:1} 70%{opacity:1} 100%{transform:translateX(-18px);opacity:0} }
        @keyframes vs-hex { 0%,100%{fill:rgba(78,205,196,0.06)} 50%{fill:rgba(78,205,196,0.14)} }

        .vs-node-pulse      { animation: vs-pulse 2.4s ease-in-out infinite; }
        .vs-node-pulse-slow { animation: vs-pulse-slow 3.5s ease-in-out infinite; }
        .vs-drift-1 { animation: vs-drift-a 4s ease-in-out infinite; }
        .vs-drift-2 { animation: vs-drift-b 5.5s ease-in-out infinite; }
        .vs-drift-3 { animation: vs-drift-c 4.8s ease-in-out infinite; }
        .vs-star-twinkle  { animation: vs-twinkle 2.8s ease-in-out infinite; }
        .vs-star-twinkle2 { animation: vs-twinkle2 3.6s ease-in-out infinite; }
        .vs-cross-1 { animation: vs-cross 3s ease-in-out infinite; }
        .vs-cross-2 { animation: vs-cross2 3.8s ease-in-out infinite 0.9s; }
        .vs-hex     { animation: vs-hex 4s ease-in-out infinite; }
        .vs-dash    { animation: vs-dash 2s linear infinite; }

        @media (max-width: 767.98px) {
            .vision-section { height: auto; min-height: auto; padding-bottom: 3.5rem; }
            .vslide {
                position: relative;
                inset: auto;
                flex-direction: column;
                padding: 2rem 1.25rem 2.5rem;
                gap: 1rem;
                align-items: center;
                text-align: center;
            }
            .vslide:not(.vs-active) { display: none; }
            .vslide.vs-active { display: flex; opacity: 1; pointer-events: auto; }
            .vs-visual {
                flex: 0 0 auto;
                width: 100%;
                max-width: 260px;
                max-height: 220px;
                overflow: hidden;
            }
            .vs-visual svg { max-height: 220px; width: 100%; }
            .vs-caption { flex: none; max-width: 100%; text-align: left; }
            .vs-num { font-size: 2.8rem; }
            .vs-title { font-size: 1.45rem; }
            .vs-desc { font-size: 0.85rem; line-height: 1.7; margin-bottom: 1rem; }
            .vs-nav { right: 1.25rem; bottom: 1rem; }
        }

        /* ── FOCUS AREAS ── */
        .focus-card {
            background: #fff;
            border-radius: var(--radius-card);
            padding: 2rem 1.75rem;
            height: 100%;
            border: 1px solid var(--hvrf-border);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .focus-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--hvrf-teal), var(--hvrf-teal-dark));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .focus-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(0,0,0,0.11);
            border-color: rgba(78,205,196,0.2);
        }
        .focus-card:hover::before { transform: scaleX(1); }
        /* num badge — only shown on no-image cards */
        .focus-num-badge {
            position: absolute;
            top: 1.25rem; right: 1.25rem;
            width: 32px; height: 32px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--hvrf-gold), #b8935a);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 0.78rem;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            box-shadow: 0 4px 12px rgba(201,169,110,0.35);
        }
        .focus-icon-wrap {
            width: 56px; height: 56px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(78,205,196,0.12), rgba(78,205,196,0.06));
            display: flex; align-items: center; justify-content: center;
            color: var(--hvrf-teal);
            font-size: 1.6rem;
            margin-bottom: 1.25rem;
            transition: var(--transition);
        }
        .focus-card:hover .focus-icon-wrap {
            background: linear-gradient(135deg, rgba(78,205,196,0.2), rgba(78,205,196,0.1));
            transform: scale(1.08);
        }
        .focus-examples {
            list-style: none; padding: 0; margin: 0;
        }
        .focus-examples li {
            padding: 0.22rem 0;
            font-size: 0.83rem;
            color: var(--hvrf-gray);
            display: flex; align-items: flex-start; gap: 0.4rem;
        }
        .focus-examples li::before {
            content: '→';
            color: var(--hvrf-teal);
            font-size: 0.75rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* ── PROGRAMS ── */
        .pill-tabs {
            display: inline-flex;
            background: rgba(0,0,0,0.04);
            border-radius: 50px;
            padding: 5px;
            gap: 4px;
            border: 1px solid var(--hvrf-border);
        }
        .pill-tabs .nav-link {
            border-radius: 50px;
            padding: 0.55rem 1.75rem;
            font-weight: 600;
            font-size: 0.88rem;
            color: var(--hvrf-gray);
            border: none;
            background: transparent;
            transition: var(--transition);
        }
        .pill-tabs .nav-link::after { display: none; }
        .pill-tabs .nav-link.active {
            background: var(--hvrf-navy);
            color: #fff;
            box-shadow: var(--shadow-sm);
        }
        .pill-tabs .nav-link:hover:not(.active) {
            background: rgba(0,0,0,0.06);
            color: var(--hvrf-navy);
        }
        .program-card {
            background: #fff;
            border-radius: var(--radius-card);
            padding: 2rem;
            border: 1px solid var(--hvrf-border);
            height: 100%;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .program-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-4px);
            border-color: rgba(78,205,196,0.2);
        }
        .program-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            background: rgba(78,205,196,0.1);
            display: flex; align-items: center; justify-content: center;
            color: var(--hvrf-teal);
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        .feature-item {
            border-left: 3px solid rgba(78,205,196,0.4);
            padding-left: 1rem;
            margin-bottom: 1rem;
        }
        .feature-item h6 {
            color: var(--hvrf-navy);
            font-weight: 600;
            font-size: 0.88rem;
            margin-bottom: 0.25rem;
        }
        .feature-items-list { list-style: none; padding: 0; margin: 0.5rem 0 0; }
        .feature-items-list li {
            font-size: 0.8rem;
            color: var(--hvrf-gray);
            padding: 0.12rem 0;
            display: flex; align-items: flex-start; gap: 0.35rem;
        }
        .feature-items-list li::before {
            content: '·';
            color: var(--hvrf-teal);
            font-size: 1rem;
            line-height: 1.1;
            flex-shrink: 0;
        }
        .involved-box {
            background: var(--hvrf-navy);
            border-radius: var(--radius-card);
            padding: 2rem 2.5rem;
        }
        .involved-item {
            display: flex; align-items: flex-start; gap: 0.75rem;
            padding: 0.5rem 0;
        }
        .involved-check {
            width: 22px; height: 22px; flex-shrink: 0;
            border-radius: 50%;
            background: rgba(78,205,196,0.15);
            border: 1px solid rgba(78,205,196,0.3);
            display: flex; align-items: center; justify-content: center;
            color: var(--hvrf-teal);
            font-size: 0.7rem;
            margin-top: 2px;
        }

        /* ── ROADMAP ── */
        .roadmap-timeline {
            position: relative;
            padding-left: 2rem;
        }
        .roadmap-timeline::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--hvrf-teal), rgba(78,205,196,0.15));
            border-radius: 2px;
        }
        .roadmap-item {
            position: relative;
            margin-bottom: 2rem;
            padding-bottom: 0;
        }
        .roadmap-item::before {
            content: '';
            position: absolute;
            left: -2.37rem; top: 0.85rem;
            width: 12px; height: 12px;
            border-radius: 50%;
            background: var(--hvrf-teal);
            border: 2px solid #fff;
            box-shadow: 0 0 0 3px rgba(78,205,196,0.2);
        }
        .roadmap-card {
            background: #fff;
            border-radius: 14px;
            padding: 1.5rem 1.75rem;
            border: 1px solid var(--hvrf-border);
            transition: transform 0.35s cubic-bezier(0.4,0,0.2,1),
                        box-shadow 0.35s ease, background 0.4s ease, border-color 0.35s ease;
            box-shadow: var(--shadow-sm);
            position: relative; overflow: hidden;
        }
        .roadmap-card::after {
            content: ''; position: absolute; inset: 0;
            opacity: 0; border-radius: inherit; pointer-events: none;
            transition: opacity 0.4s ease;
        }
        .roadmap-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); }
        .roadmap-card:hover::after { opacity: 1; }

        /* Card color variants */
        .roadmap-card--teal  {
            background: rgba(78,205,196,0.06);
            border-color: rgba(78,205,196,0.2);
        }
        .roadmap-card--teal::after  { background: linear-gradient(135deg, rgba(78,205,196,0.18) 0%, rgba(78,205,196,0.04) 100%); }
        .roadmap-card--teal:hover   { border-color: rgba(78,205,196,0.45); background: rgba(78,205,196,0.06); }

        .roadmap-card--white {
            background: #fff;
            border-color: rgba(0,0,0,0.07);
        }
        .roadmap-card--white::after { background: linear-gradient(135deg, rgba(78,205,196,0.08) 0%, transparent 100%); }
        .roadmap-card--white:hover  { border-color: rgba(78,205,196,0.3); }

        .roadmap-card--gold  {
            background: rgba(201,169,110,0.07);
            border-color: rgba(201,169,110,0.2);
        }
        .roadmap-card--gold::after  { background: linear-gradient(135deg, rgba(201,169,110,0.2) 0%, rgba(201,169,110,0.04) 100%); }
        .roadmap-card--gold:hover   { border-color: rgba(201,169,110,0.45); background: rgba(201,169,110,0.07); }
        .roadmap-year-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: var(--hvrf-gold-soft);
            border: 1px solid rgba(201,169,110,0.25);
            border-radius: 50px;
            padding: 0.25rem 0.85rem;
            color: var(--hvrf-gold);
            font-size: 0.78rem;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            margin-bottom: 0.75rem;
        }
        .roadmap-list { list-style: none; padding: 0; margin: 0.5rem 0 0; }
        .roadmap-list li {
            font-size: 0.83rem;
            padding: 0.2rem 0;
            display: flex; align-items: flex-start; gap: 0.4rem;
            color: var(--hvrf-gray);
        }
        .roadmap-list li::before {
            content: '→';
            color: var(--hvrf-teal);
            font-size: 0.75rem;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .kpi-list li { color: var(--hvrf-navy); font-weight: 500; }
        .kpi-list li::before { content: '✓'; color: var(--hvrf-gold); }
        .roadmap-section-head {
            display: flex; align-items: center; gap: 0.75rem;
            margin-bottom: 1.75rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--hvrf-border);
        }
        .roadmap-section-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: rgba(78,205,196,0.1);
            display: flex; align-items: center; justify-content: center;
            color: var(--hvrf-teal);
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        /* ── ROADMAP TABS ── */
        .roadmap-tabs {
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 2.5rem;
            flex-wrap: wrap; gap: 0;
        }
        .roadmap-tab {
            display: flex; flex-direction: column; align-items: center;
            padding: 1rem 2.25rem;
            border: 2px solid var(--hvrf-border);
            border-radius: 1rem;
            background: #fff;
            cursor: pointer;
            transition: var(--transition);
            gap: 0.15rem;
        }
        .roadmap-tab:hover { border-color: var(--hvrf-teal); background: rgba(78,205,196,0.04); }
        .roadmap-tab.active {
            border-color: var(--hvrf-teal);
            background: rgba(78,205,196,0.08);
            box-shadow: 0 4px 16px rgba(78,205,196,0.15);
        }
        .rm-tab-num {
            font-size: 0.68rem; font-weight: 700;
            letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--hvrf-teal);
        }
        .roadmap-tab.active .rm-tab-num { color: var(--hvrf-teal-dark); }
        .rm-tab-name {
            font-size: 1rem; font-weight: 700;
            color: var(--hvrf-navy);
        }
        .rm-tab-years {
            font-size: 0.72rem; color: var(--hvrf-gray);
        }
        .rm-connector {
            flex: 1; height: 2px;
            background: linear-gradient(90deg, var(--hvrf-border), var(--hvrf-teal), var(--hvrf-border));
            min-width: 1.5rem; max-width: 5rem;
        }
        .roadmap-phase-header {
            display: flex; align-items: center; gap: 0.75rem;
            margin-bottom: 1.75rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--hvrf-border);
        }
        .roadmap-phase { animation: fadeSlideUp 0.35s ease; }
        .rm-col-label {
            font-size: 0.72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.35rem;
        }
        .rm-col-label.teal { color: var(--hvrf-teal); }
        .rm-col-label.gold { color: var(--hvrf-gold); }
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 576px) {
            .roadmap-tab { padding: 0.75rem 1.25rem; }
            .rm-tab-name { font-size: 0.85rem; }
            .rm-connector { max-width: 2rem; }
        }

        /* ── TEAM ── */
        .team-card {
            text-align: center;
            padding: 2rem 1.5rem;
            background: #fff;
            border-radius: var(--radius-card);
            border: 1px solid var(--hvrf-border);
            height: 100%;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .team-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 80px;
            background: linear-gradient(180deg, rgba(13,27,42,0.03), transparent);
        }
        .team-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); border-color: rgba(78,205,196,0.15); }
        .team-photo-wrap {
            position: relative;
            width: 88px; height: 88px;
            margin: 0 auto 1.25rem;
        }
        .team-photo {
            width: 88px; height: 88px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--hvrf-teal);
            display: block;
        }
        .team-photo-placeholder {
            width: 88px; height: 88px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--hvrf-teal), var(--hvrf-teal-dark));
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.75rem;
        }
        .team-ring {
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 2px dashed rgba(78,205,196,0.3);
            animation: spin-slow 20s linear infinite;
        }
        @keyframes spin-slow { to { transform: rotate(360deg); } }

        /* ── CTA / JOIN ── */
        .join-section {
            background: var(--hvrf-navy);
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0%, 100% 0, 100% 100%, 0 100%);
            padding: 7rem 0 5rem;
        }
        .join-bg-line {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(78,205,196,0.02) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(78,205,196,0.02) 1px, transparent 1px);
            background-size: 48px 48px;
        }
        .join-glow {
            position: absolute;
            width: 600px; height: 400px;
            background: radial-gradient(ellipse, rgba(78,205,196,0.07), transparent 70%);
            left: 50%; top: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        /* ── CONTACT ── */
        .contact-section { background: var(--hvrf-light); padding: 5rem 0; }
        .contact-info-panel {
            background: var(--hvrf-navy);
            border-radius: var(--radius-card);
            padding: 2.5rem;
            height: 100%;
        }
        .contact-info-item {
            display: flex; align-items: flex-start; gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .contact-icon {
            width: 42px; height: 42px; flex-shrink: 0;
            border-radius: 10px;
            background: rgba(78,205,196,0.12);
            border: 1px solid rgba(78,205,196,0.2);
            display: flex; align-items: center; justify-content: center;
            color: var(--hvrf-teal);
            font-size: 1.1rem;
        }
        .contact-form-panel {
            background: #fff;
            border-radius: var(--radius-card);
            padding: 2.5rem;
            box-shadow: var(--shadow-md);
        }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid rgba(0,0,0,0.1);
            padding: 0.7rem 1rem;
            font-size: 0.9rem;
            transition: var(--transition);
        }
        .form-control:focus {
            border-color: var(--hvrf-teal);
            box-shadow: 0 0 0 3px rgba(78,205,196,0.15);
        }
        .form-label { font-size: 0.83rem; font-weight: 600; color: var(--hvrf-navy); margin-bottom: 0.4rem; }
        .btn-hvrf-submit {
            background: var(--hvrf-teal);
            color: #fff;
            border: none;
            padding: 0.8rem 2.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.93rem;
            transition: var(--transition);
            cursor: pointer;
        }
        .btn-hvrf-submit:hover {
            background: var(--hvrf-teal-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px var(--hvrf-teal-glow);
            color: #fff;
        }

        /* ── FOOTER ── */
        .footer-dark {
            background: var(--hvrf-navy-2);
            color: rgba(255,255,255,0.65);
            padding-top: 4rem;
            padding-bottom: 2rem;
        }
        .footer-dark a {
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            transition: color 0.25s;
            font-size: 0.88rem;
        }
        .footer-dark a:hover { color: var(--hvrf-teal); }
        .footer-dark h6 { color: rgba(255,255,255,0.9); font-size: 0.85rem; font-weight: 700; letter-spacing: 0.5px; margin-bottom: 1.1rem; }
        .footer-border { border-top: 1px solid rgba(255,255,255,0.07); padding-top: 1.25rem; margin-top: 2.5rem; }
        .footer-social a {
            display: inline-flex; align-items: center; justify-content: center;
            width: 36px; height: 36px;
            border-radius: 8px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.55) !important;
            font-size: 1rem;
            transition: var(--transition);
        }
        .footer-social a:hover {
            background: rgba(78,205,196,0.15);
            border-color: rgba(78,205,196,0.3);
            color: var(--hvrf-teal) !important;
        }

        /* ── UTILS ── */
        .teal { color: var(--hvrf-teal); }
        .gold { color: var(--hvrf-gold); }
        .text-navy { color: var(--hvrf-navy); }
        .bg-navy { background: var(--hvrf-navy); }

        /* ── GSAP INIT STATES (hero only — reveal handled by fromTo) ── */
        .gsap-hero-badge, .gsap-hero-title, .gsap-hero-sub, .gsap-hero-btns, .gsap-hero-stats {
            opacity: 0;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 991.98px) {
            .hero-title { font-size: 2.2rem; }
            .about-img-ring { width: 260px; height: 260px; }
            .about-float-badge { right: 0; }
            .join-section { clip-path: none; padding: 4rem 0; }
            .contact-info-panel { margin-bottom: 1.5rem; }
        }
        @media (max-width: 767.98px) {
            /* Hero */
            .hero-section { min-height: 100svh; padding: 5rem 0 4rem; }
            .hero-title { font-size: 1.85rem; }
            .hero-subtitle { font-size: 1rem; }
            .hero-badge { font-size: 0.78rem; padding: 0.55rem 1rem; max-width: 90%; white-space: normal; word-break: break-word; }
            .hero-stats-bar { gap: 1.25rem !important; flex-wrap: wrap; }
            .stat-sep { display: none !important; }
            .stat-value { font-size: 1.6rem; }

            /* Section headings */
            .section-tag { font-size: 0.65rem; }
            h2.display-5, .section-title { font-size: 1.75rem !important; }

            /* About */
            .about-img-ring { width: 200px; height: 200px; }
            .about-float-badge { display: none; }

            /* Focus cards */
            .focus-card { padding: 1.5rem; }
            .focus-card .card-watermark { font-size: 5rem; }

            /* Mini cards */
            .mini-card { padding: 1.5rem 1.25rem; }

            /* Programs tabs */
            .pill-tabs { flex-wrap: nowrap; overflow-x: auto; border-radius: 14px; gap: 0; }
            .pill-tabs .nav-link { border-radius: 10px; white-space: nowrap; font-size: 0.82rem; padding: 0.5rem 1rem; }
            .program-card { padding: 1.25rem; }

            /* Roadmap */
            .roadmap-year-badge { font-size: 0.9rem; padding: 0.3rem 0.9rem; }
            .roadmap-card { padding: 1.25rem; }

            /* Team */
            .team-photo { width: 72px; height: 72px; }

            /* Contact */
            .contact-info-panel { margin-bottom: 1.5rem; }

            /* Join section */
            .join-section { clip-path: none; padding: 3.5rem 0; }
            .join-section h2 { font-size: 1.75rem; }

            /* Footer */
            .footer-brand-name { font-size: 1rem; }
        }

        @media (max-width: 575.98px) {
            .hero-title { font-size: 1.6rem; }
            .vs-title { font-size: 1.3rem; }
            h2.display-5, .section-title { font-size: 1.5rem !important; }
            .hero-badge { max-width: 90vw; text-align: center; }
        }
    </style>
</head>
<body>

@include('partials.navbar')

@yield('content')

@include('partials.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<script>
gsap.registerPlugin(ScrollTrigger);

/* ── HERO ENTRANCE ── */
window.addEventListener('load', function () {
    gsap.set('.gsap-hero-badge', { y: -24, opacity: 0 });
    gsap.set(['.gsap-hero-title', '.gsap-hero-sub', '.gsap-hero-btns', '.gsap-hero-stats'], { y: 36, opacity: 0 });

    var tl = gsap.timeline({ delay: 0.15, defaults: { ease: 'power3.out' } });
    tl
        .to('.gsap-hero-badge', { opacity: 1, y: 0, duration: 0.65 })
        .to('.gsap-hero-title', { opacity: 1, y: 0, duration: 0.85 }, '-=0.35')
        .to('.gsap-hero-sub',   { opacity: 1, y: 0, duration: 0.7  }, '-=0.45')
        .to('.gsap-hero-btns',  { opacity: 1, y: 0, duration: 0.6  }, '-=0.35')
        .to('.gsap-hero-stats', { opacity: 1, y: 0, duration: 0.6  }, '-=0.25');
});

/* ── SCROLL REVEALS ── */
gsap.utils.toArray('.gsap-reveal').forEach(function (el) {
    var dir   = el.dataset.dir || 'up';
    var delay = parseFloat(el.dataset.delay || 0);
    var from  = { opacity: 0 };
    var to    = { opacity: 1, duration: 0.85, delay: delay, ease: 'power3.out',
                  scrollTrigger: { trigger: el, start: 'top 88%', toggleActions: 'play none none none' } };
    if (dir === 'up')    { from.y = 50;  to.y = 0; }
    if (dir === 'left')  { from.x = -50; to.x = 0; }
    if (dir === 'right') { from.x = 50;  to.x = 0; }
    gsap.fromTo(el, from, to);
});

/* ── STAGGERED CARD GROUPS ── */
gsap.utils.toArray('.gsap-stagger').forEach(function (container) {
    var children = container.querySelectorAll('.gsap-stagger-child');
    if (!children.length) return;
    gsap.fromTo(children,
        { opacity: 0, y: 55 },
        { opacity: 1, y: 0, duration: 0.75, stagger: 0.13, ease: 'power3.out',
          scrollTrigger: { trigger: container, start: 'top 82%', toggleActions: 'play none none none' } }
    );
});

/* ── NAVBAR SCROLL ── */
window.addEventListener('scroll', function () {
    const nb = document.getElementById('mainNavbar');
    if (!nb) return;
    if (window.scrollY > 60) nb.classList.add('scrolled');
    else nb.classList.remove('scrolled');
});

/* ── SCROLLSPY — active nav link ── */
(function () {
    var navLinks = document.querySelectorAll('#navMenu .nav-link[href*="#"]');
    var sections = Array.from(document.querySelectorAll('section[id]'));
    if (!sections.length || !navLinks.length) return;

    function updateActive() {
        var scrollY = window.scrollY + 120;
        var current = '';
        sections.forEach(function (sec) {
            if (scrollY >= sec.offsetTop) current = sec.id;
        });
        navLinks.forEach(function (link) {
            var hash = (link.getAttribute('href') || '').split('#')[1] || '';
            if (hash && hash === current) {
                link.classList.add('nav-active');
            } else {
                link.classList.remove('nav-active');
            }
        });
    }

    window.addEventListener('scroll', updateActive, { passive: true });
    updateActive();
})();

/* ── ROADMAP TABS ── */
(function () {
    var tabs   = document.querySelectorAll('.roadmap-tab');
    var phases = document.querySelectorAll('.roadmap-phase');
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var phase = this.dataset.phase;
            tabs.forEach(function (t) { t.classList.remove('active'); });
            phases.forEach(function (p) { p.classList.add('d-none'); });
            this.classList.add('active');
            var target = document.getElementById('roadmap-phase-' + phase);
            if (target) target.classList.remove('d-none');
        });
    });
})();

/* ── STATS COUNTER ── */
const counters = document.querySelectorAll('[data-count]');
if (counters.length) {
    const cObs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const target = parseFloat(el.dataset.count);
            const suffix = el.dataset.suffix || '';
            const duration = 1800;
            const step = target / (duration / 16);
            let current = 0;
            const timer = setInterval(function () {
                current += step;
                if (current >= target) { current = target; clearInterval(timer); }
                el.textContent = (Number.isInteger(target) ? Math.floor(current) : current.toFixed(0)).toLocaleString() + suffix;
            }, 16);
            cObs.unobserve(el);
        });
    }, { threshold: 0.5 });
    counters.forEach(function (el) { cObs.observe(el); });
}

/* ── NEWSLETTER AJAX ── */
document.querySelectorAll('.newsletter-ajax-form').forEach(function (form) {
    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        const msgEl = form.querySelector('.newsletter-msg');
        const btn   = form.querySelector('button[type=submit]');
        btn.disabled = true;
        try {
            const res  = await fetch('{{ route("newsletter.store") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
                body: JSON.stringify({ email: form.querySelector('[name=email]').value, name: form.querySelector('[name=name]')?.value || '' }),
            });
            const data = await res.json();
            if (msgEl) { msgEl.textContent = data.message; msgEl.className = 'newsletter-msg small mt-2' + (res.ok ? ' text-success' : ' text-danger'); }
            form.reset();
        } catch (err) {
            if (msgEl) { msgEl.textContent = 'Something went wrong. Please try again.'; msgEl.className = 'newsletter-msg text-danger small mt-2'; }
        }
        btn.disabled = false;
    });
});
</script>

@yield('scripts')
</body>
</html>
