@extends('layouts.app')
@section('title', $settings['meta_title'] ?? 'HVRF — Human Value Reserve Foundation')

@section('content')

@if(session('contact_success'))
<div class="alert alert-success alert-dismissible fade show position-fixed mt-5 z-3 shadow-lg"
     style="top: 0; left: 50%; transform: translateX(-50%); min-width: 340px; max-width: 520px; border-radius: 12px; border: none; background: #fff; color: #1a7a1a; box-shadow: 0 12px 40px rgba(0,0,0,0.15);">
    <i class="bi bi-check-circle-fill me-2 text-success"></i>{{ session('contact_success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- ═══════════════════════════════════════════
     HERO
═══════════════════════════════════════════ --}}
<section id="home" class="hero-section">

    {{-- Canvas constellation --}}
    <canvas id="heroCanvas" style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:1;"></canvas>

    {{-- Animated background grid --}}
    <div class="hero-grid" style="z-index:1;"></div>

    {{-- Floating orbs --}}
    <div class="hero-orb hero-orb-1" style="z-index:1;"></div>
    <div class="hero-orb hero-orb-2" style="z-index:1;"></div>
    <div class="hero-orb hero-orb-3" style="z-index:1;"></div>

    {{-- Decorative rings --}}
    <div class="hero-ring hero-ring-1" aria-hidden="true" style="z-index:1;"></div>
    <div class="hero-ring hero-ring-2" aria-hidden="true" style="z-index:1;"></div>

    {{-- Watermark --}}
    <img src="/images/logo-hvrf.png" alt="" class="hero-watermark" aria-hidden="true" style="z-index:1; zoom:0.6;">

    {{-- Content --}}
    <div class="container position-relative" style="z-index:3;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-8">
                @if($hero)

                {{-- Badge --}}
                <div class="gsap-hero-badge d-flex justify-content-center mb-4">
                    <span class="hero-badge">
                        <span class="badge-dot"></span>
                        <span data-i18n="hero.quote" data-db-ja="{{ $hero->quote_text_ja }}" data-db-ko="{{ $hero->quote_text_ko }}" data-db-es="{{ $hero->quote_text_es }}" data-db-zh-tw="{{ $hero->quote_text_zh_tw }}" data-db-vi="{{ $hero->quote_text_vi }}">{{ $hero->quote_text }}</span>
                    </span>
                </div>

                {{-- Title — words split by JS --}}
                <h1 class="hero-title gsap-hero-title mb-4" data-title="{{ e($hero->headline) }}"
                    data-title-ja="{{ e($hero->headline_ja) }}"
                    data-title-ko="{{ e($hero->headline_ko) }}"
                    data-title-es="{{ e($hero->headline_es) }}"
                    data-title-zh-tw="{{ e($hero->headline_zh_tw) }}"
                    data-title-vi="{{ e($hero->headline_vi) }}">
                    {{ $hero->headline }}
                </h1>

                {{-- Subtitle — typed by JS --}}
                <p class="hero-subtitle gsap-hero-sub" style="min-height:3.5rem;"
                   data-subtitle="{{ e($hero->subheadline) }}"
                   data-subtitle-ja="{{ e($hero->subheadline_ja) }}"
                   data-subtitle-ko="{{ e($hero->subheadline_ko) }}"
                   data-subtitle-es="{{ e($hero->subheadline_es) }}"
                   data-subtitle-zh-tw="{{ e($hero->subheadline_zh_tw) }}"
                   data-subtitle-vi="{{ e($hero->subheadline_vi) }}"></p>

                {{-- CTAs --}}
                <div class="d-flex gap-3 justify-content-center flex-wrap mb-5 gsap-hero-btns">
                    <a href="{{ $hero->cta_primary_url }}" class="btn-hvrf-primary">
                        <span data-i18n="hero.cta-primary" data-db-ja="{{ $hero->cta_primary_label_ja }}" data-db-ko="{{ $hero->cta_primary_label_ko }}" data-db-es="{{ $hero->cta_primary_label_es }}" data-db-zh-tw="{{ $hero->cta_primary_label_zh_tw }}" data-db-vi="{{ $hero->cta_primary_label_vi }}">{{ $hero->cta_primary_label }}</span>
                        <i class="bi bi-arrow-right-short fs-5"></i>
                    </a>
                    <a href="{{ $hero->cta_secondary_url }}" class="btn-hvrf-outline">
                        <span data-i18n="hero.cta-secondary" data-db-ja="{{ $hero->cta_secondary_label_ja }}" data-db-ko="{{ $hero->cta_secondary_label_ko }}" data-db-es="{{ $hero->cta_secondary_label_es }}" data-db-zh-tw="{{ $hero->cta_secondary_label_zh_tw }}" data-db-vi="{{ $hero->cta_secondary_label_vi }}">{{ $hero->cta_secondary_label }}</span>
                    </a>
                </div>
                @endif

                {{-- Stats --}}
                <div class="hero-stats-bar d-flex justify-content-center align-items-center gap-4 flex-wrap gsap-hero-stats">
                    <div class="stat-item">
                        <span class="stat-value" data-count="5000" data-suffix="+">5,000+</span>
                        <span class="stat-label" data-i18n="hero.stat1">First Year Participants Target</span>
                    </div>
                    <div class="stat-sep d-none d-sm-block"></div>
                    <div class="stat-item">
                        <span class="stat-value" data-count="100000" data-suffix="+">100,000+</span>
                        <span class="stat-label" data-i18n="hero.stat2">Users by Year 2 Goal</span>
                    </div>
                    <div class="stat-sep d-none d-sm-block"></div>
                    <div class="stat-item">
                        <span class="stat-value" data-count="5" data-suffix="">5</span>
                        <span class="stat-label" data-i18n="hero.stat3">Core Pillars of Focus</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="position-absolute bottom-0 start-50 translate-middle-x pb-4 d-none d-md-block" style="z-index:4;">
        <div style="display:flex;flex-direction:column;align-items:center;gap:6px;animation:scrollBob 2s ease-in-out infinite;">
            <span style="font-size:0.68rem;color:rgba(255,255,255,0.4);letter-spacing:3px;text-transform:uppercase;" data-i18n="hero.scroll">Scroll</span>
            <div style="width:1px;height:36px;background:linear-gradient(to bottom,rgba(78,205,196,0.7),transparent);"></div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════
     HOW HVRF OPERATES — ECOSYSTEM WHEEL
═══════════════════════════════════════════ --}}
<section id="hvrf-operates" style="padding:6rem 0 5rem; background:var(--hvrf-navy); position:relative; overflow:hidden;">

    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 110% 60% at 50% -5%, rgba(32,178,170,0.08) 0%,transparent 65%);pointer-events:none;"></div>

    <div class="container" style="position:relative;z-index:1;">

        {{-- Header --}}
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label" data-i18n="ops.label">Our Model</span>
            <h2 class="section-title" style="color:#fff; margin-top:.5rem;" data-i18n="ops.heading">How HVRF Operates</h2>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.55); max-width:560px; margin:.75rem auto 0;" data-i18n="ops.subtitle">
                A coordinated ecosystem bridging global stakeholders to protect and amplify human value in the age of AI.
            </p>
        </div>

        {{-- Ecosystem Wheel --}}
        <div id="ecoWrap" style="position:relative; max-width:720px; width:100%; margin:0 auto 3.5rem; aspect-ratio:1/1;">
            <canvas id="ecoCanvas" style="position:absolute;inset:0;width:100%;height:100%;display:block;"></canvas>
            <div id="ecoLbls" style="position:absolute;inset:0;pointer-events:none;"></div>
        </div>

        {{-- Flow Chain --}}
        <div class="text-center">
            <p style="font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:1.25rem;" data-i18n="ops.flow-label">Value Flow</p>
            <div class="eco-flow-row">
                <div class="eco-fn" data-i18n="ops.flow-1">Funding</div>
                <div class="eco-fc"><span></span><span></span><span></span><span></span><span></span></div>
                <div class="eco-fn" data-i18n="ops.flow-2">Research</div>
                <div class="eco-fc"><span></span><span></span><span></span><span></span><span></span></div>
                <div class="eco-fn" data-i18n="ops.flow-3">Communities</div>
                <div class="eco-fc"><span></span><span></span><span></span><span></span><span></span></div>
                <div class="eco-fn" data-i18n="ops.flow-4">Human Impact</div>
            </div>
        </div>

    </div>

    <style>
    .eco-flow-row {
        display: inline-flex;
        align-items: center;
        gap: .35rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    .eco-fn {
        font-size: .68rem;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: rgb(32,178,170);
        border: 1px solid rgba(32,178,170,.32);
        border-radius: 2rem;
        padding: .5rem 1.1rem;
        white-space: nowrap;
    }
    .eco-fc {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 0 4px;
    }
    .eco-fc span {
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: rgba(32,178,170,.75);
        opacity: 0;
        animation: ecoDot 1.6s ease-in-out infinite;
    }
    .eco-fc span:nth-child(1){ animation-delay: 0s; }
    .eco-fc span:nth-child(2){ animation-delay: .18s; }
    .eco-fc span:nth-child(3){ animation-delay: .36s; }
    .eco-fc span:nth-child(4){ animation-delay: .54s; }
    .eco-fc span:nth-child(5){ animation-delay: .72s; }
    @keyframes ecoDot {
        0%,100%{ opacity:0; transform:scale(.5); }
        50%    { opacity:1; transform:scale(1.1); }
    }
    </style>

    <script>
    (function () {
        var canvas = document.getElementById('ecoCanvas');
        if (!canvas) return;
        var ctx = canvas.getContext('2d');

        var SZ = 720;
        canvas.width = canvas.height = SZ;

        var cx = SZ / 2, cy = SZ / 2;
        var ORBIT = 268;   /* orbit radius for outer nodes */
        var CR    = 105;   /* center circle radius         */
        var NR    = 62;    /* outer node radius            */
        var T     = '32,178,170';   /* teal */

        var NODE_DEFS = [
            'Governments',
            'Healthcare\nSystems',
            'Universities',
            'Communities',
            'AI\nCompanies',
            'Foundations',
            'Volunteers',
        ];

        /* compute node positions */
        var nodes = NODE_DEFS.map(function (lbl, i) {
            var a = (i / NODE_DEFS.length) * Math.PI * 2 - Math.PI / 2;
            return {
                lbl  : lbl,
                x    : cx + ORBIT * Math.cos(a),
                y    : cy + ORBIT * Math.sin(a),
                ph   : i * 0.85,
            };
        });

        /* ── HTML labels ── */
        var lblDiv = document.getElementById('ecoLbls');
        nodes.forEach(function (n, i) {
            var el = document.createElement('div');
            el.style.cssText = 'position:absolute;transform:translate(-50%,-50%);text-align:center;width:112px;';
            el.style.left = (n.x / SZ * 100).toFixed(2) + '%';
            el.style.top  = (n.y / SZ * 100).toFixed(2) + '%';
            el.innerHTML  = n.lbl.split('\n').map(function (p) {
                return '<span style="display:block;font-size:.82rem;font-weight:700;letter-spacing:.07em;color:rgba(255,255,255,.92);text-transform:uppercase;line-height:1.45;">' + p + '</span>';
            }).join('');
            lblDiv.appendChild(el);
        });

        /* center label */
        var cEl = document.createElement('div');
        cEl.style.cssText = 'position:absolute;left:50%;transform:translateX(-50%);text-align:center;white-space:nowrap;';
        cEl.style.top = ((cy + 36) / SZ * 100).toFixed(2) + '%';
        cEl.dataset.ecoCenter = '1';
        cEl.innerHTML = '<span style="display:block;font-size:.72rem;font-weight:700;letter-spacing:.14em;color:rgba(32,178,170,.92);text-transform:uppercase;line-height:1.8;">HVRF</span>'
                      + '<span style="display:block;font-size:.62rem;font-weight:600;letter-spacing:.1em;color:rgba(255,255,255,.65);text-transform:uppercase;line-height:1.4;">Foundation Core</span>';
        lblDiv.appendChild(cEl);

        /* ── logo (original colours) ── */
        var logoReady = false, logoImg = null;
        var raw = new Image();
        raw.crossOrigin = 'anonymous';
        raw.onload = function () { logoImg = raw; logoReady = true; };
        raw.src = '/images/logo-hvrf.png';

        /* ── animation loop ── */
        function tick(ts) {
            ctx.clearRect(0, 0, SZ, SZ);

            var dash = (ts * 0.022) % 16;

            /* orbit glow ring */
            ctx.beginPath();
            ctx.arc(cx, cy, ORBIT, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(' + T + ',.07)';
            ctx.lineWidth = 1;
            ctx.stroke();

            /* connection lines + traveling dots */
            nodes.forEach(function (n, i) {
                ctx.beginPath();
                ctx.moveTo(cx, cy);
                ctx.lineTo(n.x, n.y);
                ctx.strokeStyle = 'rgba(' + T + ',.20)';
                ctx.lineWidth = 1.2;
                ctx.setLineDash([5, 9]);
                ctx.lineDashOffset = -(dash + i * 2.3);
                ctx.stroke();
                ctx.setLineDash([]);

                var t = ((ts * 0.00032 + n.ph) % 1 + 1) % 1;
                var px = cx + (n.x - cx) * t;
                var py = cy + (n.y - cy) * t;
                var pulse = 0.5 + 0.5 * Math.sin(ts * 0.004 + n.ph);
                ctx.beginPath();
                ctx.arc(px, py, 2.5 + pulse * 1, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(' + T + ',' + (0.6 + pulse * 0.4) + ')';
                ctx.fill();
            });

            /* outer node circles */
            nodes.forEach(function (n) {
                var g = ctx.createRadialGradient(n.x, n.y, 0, n.x, n.y, NR + 16);
                g.addColorStop(0, 'rgba(' + T + ',.16)');
                g.addColorStop(1, 'transparent');
                ctx.beginPath(); ctx.arc(n.x, n.y, NR + 16, 0, Math.PI * 2);
                ctx.fillStyle = g; ctx.fill();

                ctx.beginPath(); ctx.arc(n.x, n.y, NR, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(8,22,42,.93)'; ctx.fill();
                ctx.strokeStyle = 'rgba(' + T + ',.5)';
                ctx.lineWidth = 1.4; ctx.stroke();
            });

            /* center glow */
            var cg = ctx.createRadialGradient(cx, cy, 0, cx, cy, CR + 36);
            cg.addColorStop(0, 'rgba(' + T + ',.25)');
            cg.addColorStop(1, 'transparent');
            ctx.beginPath(); ctx.arc(cx, cy, CR + 36, 0, Math.PI * 2);
            ctx.fillStyle = cg; ctx.fill();

            /* center circle */
            ctx.beginPath(); ctx.arc(cx, cy, CR, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(6,18,36,.97)'; ctx.fill();
            ctx.strokeStyle = 'rgba(' + T + ',.72)';
            ctx.lineWidth = 2; ctx.stroke();

            /* center inner ring */
            ctx.beginPath(); ctx.arc(cx, cy, CR + 9, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(' + T + ',.15)';
            ctx.lineWidth = 1; ctx.stroke();

            /* logo */
            if (logoReady && logoImg) {
                var ls = 88;
                ctx.drawImage(logoImg, cx - ls / 2, cy - ls / 2 - 14, ls, ls);
            }

            requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    })();
    </script>
</section>

{{-- ═══════════════════════════════════════════
     VISION SLIDER
═══════════════════════════════════════════ --}}
<section class="vision-section gsap-reveal" data-dir="up">
 {{-- Progress bar --}}
    <div class="vs-progress"><span class="vs-bar" id="vsBar"></span></div>
    @foreach($visionSlides as $slide)
    <div class="vslide {{ $loop->first ? 'vs-active' : '' }}" data-slide="{{ $loop->index }}">
        <div class="vs-visual">

            @if($loop->index === 0)
            {{-- SVG 1: Human at the Center --}}
            <svg viewBox="0 0 520 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="rg1" cx="50%" cy="46%" r="52%">
                        <stop offset="0%" stop-color="#4ECDC4" stop-opacity="0.18"/>
                        <stop offset="100%" stop-color="#0a1628" stop-opacity="0"/>
                    </radialGradient>
                    <filter id="sf1"><feGaussianBlur stdDeviation="2.5"/></filter>
                </defs>
                <ellipse cx="260" cy="185" rx="185" ry="170" fill="url(#rg1)"/>
                <ellipse cx="260" cy="185" rx="158" ry="148" stroke="#4ECDC4" stroke-opacity="0.1" stroke-width="1" stroke-dasharray="5 10"/>
                <ellipse cx="260" cy="185" rx="112" ry="105" stroke="rgba(201,169,110,0.16)" stroke-width="1" stroke-dasharray="3 8"/>
                <ellipse cx="260" cy="185" rx="70" ry="66" stroke="#4ECDC4" stroke-opacity="0.18" stroke-width="1"/>
                <circle cx="260" cy="92" r="28" stroke="#4ECDC4" stroke-width="1.5" fill="rgba(78,205,196,0.07)"/>
                <circle cx="260" cy="92" r="28" stroke="#4ECDC4" stroke-width="4" stroke-opacity="0.12" filter="url(#sf1)"/>
                <circle cx="252" cy="90" r="3" fill="#4ECDC4"/>
                <circle cx="268" cy="90" r="3" fill="#4ECDC4"/>
                <path d="M253 100 Q260 106 267 100" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="260" y1="120" x2="260" y2="135" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M212 150 Q260 134 308 150" stroke="#4ECDC4" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                <path d="M212 150 L190 202" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M308 150 L330 202" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M232 150 L226 246" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M288 150 L294 246" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M226 246 L294 246" stroke="#4ECDC4" stroke-opacity="0.4" stroke-width="1" stroke-dasharray="4 3"/>
                <path d="M240 246 L224 316" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M280 246 L296 316" stroke="#4ECDC4" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="260" cy="193" r="9" fill="#4ECDC4" opacity="0.28" class="vs-node-pulse-slow"/>
                <circle cx="260" cy="193" r="4.5" fill="#4ECDC4" opacity="0.75" class="vs-node-pulse"/>
                <circle cx="260" cy="28" r="7.5" fill="#4ECDC4" opacity="0.9" class="vs-node-pulse"/>
                <line x1="260" y1="36" x2="260" y2="64" stroke="#4ECDC4" stroke-opacity="0.35" stroke-dasharray="4 3" stroke-width="1" class="vs-dash"/>
                <circle cx="405" cy="82" r="6.5" fill="#C9A96E" opacity="0.85" class="vs-node-pulse-slow"/>
                <line x1="397" y1="86" x2="305" y2="152" stroke="#C9A96E" stroke-opacity="0.3" stroke-dasharray="4 3" stroke-width="1" class="vs-dash"/>
                <circle cx="435" cy="205" r="5.5" fill="#4ECDC4" opacity="0.8" class="vs-node-pulse"/>
                <line x1="429" y1="205" x2="328" y2="200" stroke="#4ECDC4" stroke-opacity="0.28" stroke-dasharray="4 3" stroke-width="1" class="vs-dash"/>
                <circle cx="388" cy="308" r="6" fill="#C9A96E" opacity="0.75" class="vs-node-pulse-slow"/>
                <line x1="381" y1="303" x2="295" y2="250" stroke="#C9A96E" stroke-opacity="0.28" stroke-dasharray="4 3" stroke-width="1"/>
                <circle cx="132" cy="308" r="6" fill="#4ECDC4" opacity="0.75" class="vs-node-pulse"/>
                <line x1="139" y1="303" x2="225" y2="250" stroke="#4ECDC4" stroke-opacity="0.28" stroke-dasharray="4 3" stroke-width="1"/>
                <circle cx="85" cy="205" r="5.5" fill="#C9A96E" opacity="0.8" class="vs-node-pulse-slow"/>
                <line x1="91" y1="205" x2="192" y2="200" stroke="#C9A96E" stroke-opacity="0.28" stroke-dasharray="4 3" stroke-width="1" class="vs-dash"/>
                <circle cx="115" cy="82" r="6.5" fill="#4ECDC4" opacity="0.85" class="vs-node-pulse"/>
                <line x1="123" y1="86" x2="215" y2="152" stroke="#4ECDC4" stroke-opacity="0.3" stroke-dasharray="4 3" stroke-width="1" class="vs-dash"/>
                <circle cx="325" cy="108" r="4" fill="#4ECDC4" opacity="0.55" class="vs-drift-1"/>
                <circle cx="195" cy="108" r="4" fill="#C9A96E" opacity="0.5" class="vs-drift-2"/>
                <circle cx="195" cy="268" r="4" fill="#4ECDC4" opacity="0.48" class="vs-drift-3"/>
                <circle cx="325" cy="268" r="4" fill="#C9A96E" opacity="0.48" class="vs-drift-1"/>
                <circle cx="155" cy="48" r="2" fill="#4ECDC4" opacity="0.4" class="vs-drift-1"/>
                <circle cx="378" cy="38" r="1.5" fill="#C9A96E" opacity="0.45" class="vs-drift-2"/>
                <circle cx="68" cy="138" r="2" fill="#4ECDC4" opacity="0.3" class="vs-drift-3"/>
                <circle cx="462" cy="128" r="1.5" fill="#C9A96E" opacity="0.38" class="vs-drift-1"/>
                <circle cx="478" cy="282" r="2" fill="#4ECDC4" opacity="0.32" class="vs-drift-2"/>
                <circle cx="48" cy="300" r="1.5" fill="#4ECDC4" opacity="0.28" class="vs-drift-3"/>
            </svg>

            @elseif($loop->index === 1)
            {{-- SVG 2: Human & Robot Side by Side --}}
            <svg viewBox="0 0 520 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="s2eyeL" cx="40%" cy="40%" r="60%">
                        <stop offset="0%" stop-color="#a0f0ec" stop-opacity="0.9"/>
                        <stop offset="100%" stop-color="#4ECDC4" stop-opacity="0.5"/>
                    </radialGradient>
                    <radialGradient id="s2eyeR" cx="40%" cy="40%" r="60%">
                        <stop offset="0%" stop-color="#a0f0ec" stop-opacity="0.9"/>
                        <stop offset="100%" stop-color="#4ECDC4" stop-opacity="0.5"/>
                    </radialGradient>
                </defs>

                <!-- Background auras -->
                <ellipse cx="140" cy="210" rx="90" ry="115" fill="rgba(78,205,196,0.05)"/>
                <ellipse cx="375" cy="215" rx="100" ry="115" fill="rgba(78,205,196,0.05)"/>

                <!-- ══ CONNECTION BRIDGE (centre) ══ -->
                <line x1="213" y1="195" x2="288" y2="195"
                      stroke="#4ECDC4" stroke-opacity="0.28" stroke-width="1.4" stroke-dasharray="5,4"/>
                <!-- heart badge -->
                <rect x="228" y="178" width="56" height="34" rx="11"
                      fill="rgba(8,22,42,0.72)" stroke="rgba(78,205,196,0.32)" stroke-width="1"/>
                <path d="M246 195 Q252 188 256 195 Q260 188 266 195 Q266 203 256 209 Q246 203 246 195Z"
                      fill="rgba(78,205,196,0.38)" stroke="#4ECDC4" stroke-opacity="0.55" stroke-width="0.9"/>

                <!-- ══ HUMAN FIGURE (left, cx≈140) ══ -->
                <!-- head -->
                <circle cx="140" cy="72" r="30" fill="rgba(78,205,196,0.13)"
                        stroke="#4ECDC4" stroke-opacity="0.55" stroke-width="1.5"/>
                <circle cx="131" cy="69" r="3.5" fill="#4ECDC4" opacity="0.68"/>
                <circle cx="149" cy="69" r="3.5" fill="#4ECDC4" opacity="0.68"/>
                <path d="M132 83 Q140 90 148 83" stroke="#4ECDC4" stroke-opacity="0.5"
                      stroke-width="1.4" stroke-linecap="round" fill="none"/>
                <!-- neck -->
                <rect x="134" y="102" width="12" height="16" rx="5" fill="rgba(78,205,196,0.18)"/>
                <!-- shoulders -->
                <path d="M96 128 Q118 116 140 116 Q162 116 184 128"
                      stroke="#4ECDC4" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" fill="none"/>
                <!-- torso -->
                <path d="M100 132 L180 132 L172 240 L108 240 Z"
                      fill="rgba(78,205,196,0.12)" stroke="#4ECDC4" stroke-opacity="0.34"
                      stroke-width="1.2" stroke-linejoin="round"/>
                <!-- left arm (relaxed) -->
                <path d="M100 148 Q78 178 74 214"
                      stroke="#4ECDC4" stroke-opacity="0.35" stroke-width="2" stroke-linecap="round" fill="none"/>
                <!-- right arm (reaching toward robot) -->
                <path d="M180 148 Q208 168 222 190"
                      stroke="#4ECDC4" stroke-opacity="0.6" stroke-width="2.2" stroke-linecap="round" fill="none"/>
                <circle cx="224" cy="193" r="5.5" fill="rgba(78,205,196,0.28)"
                        stroke="#4ECDC4" stroke-opacity="0.7" stroke-width="1.3" class="vs-node-pulse"/>
                <!-- legs -->
                <path d="M108 240 L98 340 L128 340 L140 278 L152 340 L182 340 L172 240 Z"
                      fill="rgba(78,205,196,0.09)" stroke="#4ECDC4" stroke-opacity="0.27"
                      stroke-width="1.1" stroke-linejoin="round"/>
                <!-- feet -->
                <rect x="90"  y="337" width="36" height="9" rx="4.5" fill="rgba(78,205,196,0.22)"/>
                <rect x="147" y="337" width="36" height="9" rx="4.5" fill="rgba(78,205,196,0.22)"/>
                <!-- floating tag -->
                <rect x="32" y="96"  width="48" height="24" rx="7"
                      fill="rgba(78,205,196,0.09)" stroke="#4ECDC4" stroke-opacity="0.3" stroke-width="1"/>
                <line x1="42" y1="106" x2="70" y2="106" stroke="#4ECDC4" stroke-opacity="0.5" stroke-width="1.5"/>
                <line x1="42" y1="112" x2="60" y2="112" stroke="#4ECDC4" stroke-opacity="0.3" stroke-width="1"/>
                <rect x="30" y="244" width="52" height="24" rx="7"
                      fill="rgba(201,169,110,0.09)" stroke="#C9A96E" stroke-opacity="0.3" stroke-width="1"/>
                <line x1="40" y1="254" x2="72" y2="254" stroke="#C9A96E" stroke-opacity="0.5" stroke-width="1.5"/>
                <line x1="40" y1="260" x2="58" y2="260" stroke="#C9A96E" stroke-opacity="0.3" stroke-width="1"/>

                <!-- ══ ROBOT FIGURE (right, cx≈375, Eilik-style) ══ -->
                <!-- base shadow -->
                <ellipse cx="375" cy="340" rx="60" ry="13"
                         fill="rgba(78,205,196,0.1)" stroke="#4ECDC4" stroke-opacity="0.22" stroke-width="1"/>
                <!-- body (egg) -->
                <ellipse cx="375" cy="242" rx="64" ry="78"
                         fill="rgba(8,22,42,0.88)" stroke="#4ECDC4" stroke-opacity="0.45" stroke-width="1.5"/>
                <!-- teal drip accent (like Eilik) -->
                <path d="M354 175 Q363 196 375 200 Q387 196 396 175 Q388 167 375 164 Q362 167 354 175Z"
                      fill="rgba(78,205,196,0.24)" stroke="rgba(78,205,196,0.38)" stroke-width="1"/>
                <!-- body dot (like Eilik button) -->
                <circle cx="365" cy="252" r="3.5" fill="rgba(255,255,255,0.1)"
                        stroke="rgba(78,205,196,0.28)" stroke-width="0.8"/>
                <!-- left arm (reaching toward human) -->
                <path d="M313 215 Q295 210 287 200"
                      stroke="#4ECDC4" stroke-opacity="0.52" stroke-width="13"
                      stroke-linecap="round" fill="none"/>
                <path d="M313 215 Q295 210 287 200"
                      stroke="rgba(8,22,42,0.85)" stroke-opacity="1" stroke-width="9"
                      stroke-linecap="round" fill="none"/>
                <path d="M313 215 Q295 210 287 200"
                      stroke="#4ECDC4" stroke-opacity="0.38" stroke-width="1.5"
                      stroke-linecap="round" fill="none"/>
                <circle cx="285" cy="199" r="5.5" fill="rgba(78,205,196,0.28)"
                        stroke="#4ECDC4" stroke-opacity="0.7" stroke-width="1.3" class="vs-node-pulse"/>
                <!-- right arm (raised, waving) -->
                <path d="M437 210 Q455 190 462 164"
                      stroke="#4ECDC4" stroke-opacity="0.5" stroke-width="13"
                      stroke-linecap="round" fill="none"/>
                <path d="M437 210 Q455 190 462 164"
                      stroke="rgba(8,22,42,0.85)" stroke-opacity="1" stroke-width="9"
                      stroke-linecap="round" fill="none"/>
                <path d="M437 210 Q455 190 462 164"
                      stroke="#4ECDC4" stroke-opacity="0.38" stroke-width="1.5"
                      stroke-linecap="round" fill="none"/>
                <!-- waving hand -->
                <circle cx="463" cy="162" r="11" fill="rgba(8,22,42,0.88)"
                        stroke="#4ECDC4" stroke-opacity="0.45" stroke-width="1.3"/>
                <!-- head (large round) -->
                <circle cx="375" cy="128" r="56"
                        fill="rgba(8,22,42,0.92)" stroke="#4ECDC4" stroke-opacity="0.5" stroke-width="1.5"/>
                <!-- dome highlight -->
                <ellipse cx="364" cy="107" rx="23" ry="12" fill="rgba(78,205,196,0.09)"/>
                <!-- top teal bump (like Eilik) -->
                <ellipse cx="375" cy="72" rx="24" ry="11"
                         fill="rgba(78,205,196,0.48)" stroke="#4ECDC4" stroke-opacity="0.6" stroke-width="1"/>
                <!-- ear nubs -->
                <rect x="319" y="120" width="11" height="9" rx="4.5"
                      fill="rgba(78,205,196,0.42)" stroke="#4ECDC4" stroke-opacity="0.5" stroke-width="0.8"/>
                <rect x="414" y="120" width="11" height="9" rx="4.5"
                      fill="rgba(78,205,196,0.42)" stroke="#4ECDC4" stroke-opacity="0.5" stroke-width="0.8"/>
                <!-- eye sockets (dark like Eilik visor) -->
                <rect x="343" y="110" width="26" height="20" rx="10"
                      fill="rgba(0,0,0,0.65)" stroke="rgba(78,205,196,0.25)" stroke-width="0.8"/>
                <rect x="377" y="110" width="26" height="20" rx="10"
                      fill="rgba(0,0,0,0.65)" stroke="rgba(78,205,196,0.25)" stroke-width="0.8"/>
                <!-- glowing eyes (teal, like Eilik) -->
                <ellipse cx="356" cy="120" rx="10" ry="8" fill="url(#s2eyeL)"
                         opacity="0.9" class="vs-node-pulse-slow"/>
                <ellipse cx="390" cy="120" rx="10" ry="8" fill="url(#s2eyeR)"
                         opacity="0.9" class="vs-node-pulse-slow"/>
                <!-- eye highlight spot -->
                <ellipse cx="352" cy="116" rx="4" ry="3" fill="rgba(220,250,248,0.65)"/>
                <ellipse cx="386" cy="116" rx="4" ry="3" fill="rgba(220,250,248,0.65)"/>
                <!-- floating tag (robot side) -->
                <rect x="437" y="280" width="52" height="24" rx="7"
                      fill="rgba(78,205,196,0.09)" stroke="#4ECDC4" stroke-opacity="0.3" stroke-width="1"/>
                <line x1="447" y1="290" x2="479" y2="290" stroke="#4ECDC4" stroke-opacity="0.5" stroke-width="1.5"/>
                <line x1="447" y1="296" x2="465" y2="296" stroke="#4ECDC4" stroke-opacity="0.3" stroke-width="1"/>

                <!-- decorative particles -->
                <circle cx="52"  cy="48"  r="2.5" fill="#4ECDC4" opacity="0.34" class="vs-drift-1"/>
                <circle cx="228" cy="36"  r="2"   fill="#4ECDC4" opacity="0.28" class="vs-drift-2"/>
                <circle cx="492" cy="74"  r="2"   fill="#C9A96E" opacity="0.32" class="vs-drift-3"/>
                <circle cx="488" cy="318" r="2.5" fill="#C9A96E" opacity="0.35" class="vs-drift-1"/>
                <circle cx="40"  cy="350" r="2"   fill="#4ECDC4" opacity="0.27" class="vs-drift-2"/>
                <circle cx="240" cy="356" r="1.5" fill="#4ECDC4" opacity="0.25" class="vs-drift-3"/>
                <circle cx="180" cy="42"  r="2"   fill="#C9A96E" opacity="0.30" class="vs-drift-1"/>
            </svg>

            @else
            {{-- SVG 3: A Future Worth Building --}}
            <svg viewBox="0 0 520 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="sunG" cx="50%" cy="82%" r="55%">
                        <stop offset="0%" stop-color="#C9A96E" stop-opacity="0.4"/>
                        <stop offset="100%" stop-color="#0a1628" stop-opacity="0"/>
                    </radialGradient>
                    <filter id="gf3"><feGaussianBlur stdDeviation="5"/></filter>
                </defs>
                <ellipse cx="260" cy="330" rx="210" ry="105" fill="url(#sunG)"/>
                <ellipse cx="260" cy="342" rx="110" ry="54" fill="rgba(201,169,110,0.18)" filter="url(#gf3)"/>
                <line x1="260" y1="325" x2="195" y2="55" stroke="#C9A96E" stroke-opacity="0.055" stroke-width="42"/>
                <line x1="260" y1="325" x2="260" y2="42" stroke="#C9A96E" stroke-opacity="0.08" stroke-width="32"/>
                <line x1="260" y1="325" x2="325" y2="55" stroke="#C9A96E" stroke-opacity="0.055" stroke-width="42"/>
                <line x1="260" y1="325" x2="145" y2="75" stroke="#C9A96E" stroke-opacity="0.035" stroke-width="28"/>
                <line x1="260" y1="325" x2="375" y2="75" stroke="#C9A96E" stroke-opacity="0.035" stroke-width="28"/>
                <path d="M0 305 Q62 262 122 242 Q162 230 202 220 Q232 212 260 207 Q288 202 318 205 Q358 209 400 222 Q452 240 520 268 L520 380 L0 380 Z" fill="rgba(10,22,40,0.97)"/>
                <path d="M0 305 Q62 262 122 242 Q162 230 202 220 Q232 212 260 207 Q288 202 318 205 Q358 209 400 222 Q452 240 520 268" stroke="#C9A96E" stroke-opacity="0.65" stroke-width="1.5" fill="none"/>
                <g transform="translate(97,200) scale(0.58)">
                    <circle cx="0" cy="-38" r="10" fill="#C9A96E" opacity="0.5"/>
                    <path d="M0 -28 L0 10" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                    <path d="M-13 -9 L0 -4 L13 -9" stroke="#C9A96E" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.5"/>
                    <path d="M0 10 L-9 36" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                    <path d="M0 10 L9 36" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                </g>
                <g transform="translate(177,183) scale(0.74)">
                    <circle cx="0" cy="-40" r="12" fill="#C9A96E" opacity="0.68"/>
                    <path d="M0 -28 L0 12" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.68"/>
                    <path d="M-15 -9 L0 -4 L15 -9" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.68"/>
                    <path d="M0 12 L-11 40" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.68"/>
                    <path d="M0 12 L11 40" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.68"/>
                </g>
                <g transform="translate(260,165)">
                    <circle cx="0" cy="-46" r="15" fill="#C9A96E" opacity="0.92"/>
                    <circle cx="0" cy="-46" r="24" stroke="#C9A96E" stroke-opacity="0.22" stroke-width="2" fill="none" class="vs-node-pulse-slow"/>
                    <path d="M0 -31 L0 16" stroke="#C9A96E" stroke-width="4" stroke-linecap="round" opacity="0.9"/>
                    <path d="M-20 -14 L0 -5" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.9"/>
                    <path d="M20 -14 L0 -5" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.9"/>
                    <path d="M-20 -14 L-40 -40" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.82"/>
                    <path d="M20 -14 L40 -40" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.82"/>
                    <path d="M0 16 L-14 50" stroke="#C9A96E" stroke-width="4" stroke-linecap="round" opacity="0.9"/>
                    <path d="M0 16 L14 50" stroke="#C9A96E" stroke-width="4" stroke-linecap="round" opacity="0.9"/>
                </g>
                <g transform="translate(343,180) scale(0.74)">
                    <circle cx="0" cy="-40" r="12" fill="#C9A96E" opacity="0.68"/>
                    <path d="M0 -28 L0 12" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.68"/>
                    <path d="M-15 -9 L0 -4 L15 -9" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.68"/>
                    <path d="M0 12 L-11 40" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.68"/>
                    <path d="M0 12 L11 40" stroke="#C9A96E" stroke-width="3.5" stroke-linecap="round" opacity="0.68"/>
                </g>
                <g transform="translate(423,198) scale(0.58)">
                    <circle cx="0" cy="-38" r="10" fill="#C9A96E" opacity="0.5"/>
                    <path d="M0 -28 L0 10" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                    <path d="M-13 -9 L0 -4 L13 -9" stroke="#C9A96E" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.5"/>
                    <path d="M0 10 L-9 36" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                    <path d="M0 10 L9 36" stroke="#C9A96E" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                </g>
                <circle cx="82" cy="82" r="2.5" fill="#fff" opacity="0.68" class="vs-star-twinkle"/>
                <circle cx="112" cy="57" r="1.5" fill="#fff" opacity="0.5" class="vs-star-twinkle2"/>
                <circle cx="142" cy="77" r="2" fill="#fff" opacity="0.6" class="vs-star-twinkle"/>
                <circle cx="97" cy="108" r="1.5" fill="#fff" opacity="0.44"/>
                <line x1="82" y1="82" x2="112" y2="57" stroke="#fff" stroke-opacity="0.12" stroke-width="0.8"/>
                <line x1="112" y1="57" x2="142" y2="77" stroke="#fff" stroke-opacity="0.12" stroke-width="0.8"/>
                <line x1="82" y1="82" x2="97" y2="108" stroke="#fff" stroke-opacity="0.1" stroke-width="0.8"/>
                <circle cx="382" cy="67" r="2.5" fill="#fff" opacity="0.65" class="vs-star-twinkle2"/>
                <circle cx="412" cy="47" r="2" fill="#fff" opacity="0.55" class="vs-star-twinkle"/>
                <circle cx="442" cy="72" r="1.5" fill="#fff" opacity="0.5"/>
                <circle cx="422" cy="92" r="2" fill="#fff" opacity="0.62" class="vs-star-twinkle2"/>
                <line x1="382" y1="67" x2="412" y2="47" stroke="#fff" stroke-opacity="0.12" stroke-width="0.8"/>
                <line x1="412" y1="47" x2="442" y2="72" stroke="#fff" stroke-opacity="0.1" stroke-width="0.8"/>
                <line x1="442" y1="72" x2="422" y2="92" stroke="#fff" stroke-opacity="0.1" stroke-width="0.8"/>
                <circle cx="222" cy="62" r="2" fill="#4ECDC4" opacity="0.72" class="vs-star-twinkle"/>
                <circle cx="260" cy="42" r="2.5" fill="#4ECDC4" opacity="0.82" class="vs-star-twinkle2"/>
                <circle cx="298" cy="62" r="2" fill="#4ECDC4" opacity="0.72" class="vs-star-twinkle"/>
                <circle cx="237" cy="87" r="1.5" fill="#4ECDC4" opacity="0.5"/>
                <circle cx="283" cy="87" r="1.5" fill="#4ECDC4" opacity="0.5"/>
                <circle cx="260" cy="108" r="2" fill="#4ECDC4" opacity="0.58" class="vs-star-twinkle"/>
                <line x1="222" y1="62" x2="260" y2="42" stroke="#4ECDC4" stroke-opacity="0.2" stroke-width="0.8"/>
                <line x1="260" y1="42" x2="298" y2="62" stroke="#4ECDC4" stroke-opacity="0.2" stroke-width="0.8"/>
                <line x1="222" y1="62" x2="237" y2="87" stroke="#4ECDC4" stroke-opacity="0.15" stroke-width="0.8"/>
                <line x1="298" y1="62" x2="283" y2="87" stroke="#4ECDC4" stroke-opacity="0.15" stroke-width="0.8"/>
                <line x1="237" y1="87" x2="260" y2="108" stroke="#4ECDC4" stroke-opacity="0.13" stroke-width="0.8"/>
                <line x1="283" y1="87" x2="260" y2="108" stroke="#4ECDC4" stroke-opacity="0.13" stroke-width="0.8"/>
                <circle cx="52" cy="142" r="1.5" fill="#fff" opacity="0.34"/>
                <circle cx="168" cy="132" r="1" fill="#fff" opacity="0.38"/>
                <circle cx="342" cy="127" r="1.5" fill="#fff" opacity="0.34"/>
                <circle cx="472" cy="147" r="1" fill="#fff" opacity="0.38"/>
                <circle cx="495" cy="82" r="1.5" fill="#fff" opacity="0.3"/>
                <circle cx="32" cy="62" r="1" fill="#fff" opacity="0.32"/>
                <circle cx="335" cy="37" r="1.5" fill="#fff" opacity="0.4" class="vs-star-twinkle"/>
            </svg>
            @endif

        </div>
        <div class="vs-caption">
            <div class="vs-num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
            <div class="vs-tag" data-i18n="vs.s{{ $loop->index }}.tag" data-db-ja="{{ $slide->tag_ja }}" data-db-ko="{{ $slide->tag_ko }}" data-db-es="{{ $slide->tag_es }}" data-db-zh-tw="{{ $slide->tag_zh_tw }}" data-db-vi="{{ $slide->tag_vi }}">{{ $slide->tag }}</div>
            <h2 class="vs-title" data-i18n="vs.s{{ $loop->index }}.title" data-db-ja="{{ $slide->title_ja }}" data-db-ko="{{ $slide->title_ko }}" data-db-es="{{ $slide->title_es }}" data-db-zh-tw="{{ $slide->title_zh_tw }}" data-db-vi="{{ $slide->title_vi }}">{{ $slide->title }}</h2>
            <p class="vs-desc" data-i18n="vs.s{{ $loop->index }}.desc" data-db-ja="{{ $slide->description_ja }}" data-db-ko="{{ $slide->description_ko }}" data-db-es="{{ $slide->description_es }}" data-db-zh-tw="{{ $slide->description_zh_tw }}" data-db-vi="{{ $slide->description_vi }}">{{ $slide->description }}</p>
            <span class="vs-pill"><i class="bi {{ $slide->pill_icon }}"></i><span data-i18n="vs.s{{ $loop->index }}.pill" data-db-ja="{{ $slide->pill_label_ja }}" data-db-ko="{{ $slide->pill_label_ko }}" data-db-es="{{ $slide->pill_label_es }}" data-db-zh-tw="{{ $slide->pill_label_zh_tw }}" data-db-vi="{{ $slide->pill_label_vi }}">{{ $slide->pill_label }}</span></span>
        </div>
    </div>
    @endforeach

    {{-- Navigation dots --}}
    <div class="vs-nav">
        @foreach($visionSlides as $slide)
        <button class="vs-dot {{ $loop->first ? 'active' : '' }}" data-target="{{ $loop->index }}" aria-label="Slide {{ $loop->iteration }}"></button>
        @endforeach
    </div>


</section>

{{-- ═══════════════════════════════════════════
     ABOUT
═══════════════════════════════════════════ --}}
<section id="about" style="padding: 6rem 0; background: var(--hvrf-light);">
    <div class="container">

        {{-- Header --}}
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label" data-i18n="about.label">Who We Are</span>
            <h2 class="section-title mt-2" data-i18n="about.heading">About the Foundation</h2>
        </div>

        @if($about)
        {{-- 4 Wise-style cards --}}
        <div class="row g-4 gsap-stagger">

            {{-- Card 1: Philosophy — dark navy --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--dark h-100">
                    <span class="about-card-label" data-i18n="about.card-philosophy">Philosophy</span>
                    <div class="about-card-quote">&ldquo;</div>
                    <p class="about-card-body" style="font-style:italic;" data-i18n="about.philosophy-body" data-db-ja="{{ $about->philosophy_body_ja }}" data-db-ko="{{ $about->philosophy_body_ko }}" data-db-es="{{ $about->philosophy_body_es }}" data-db-zh-tw="{{ $about->philosophy_body_zh_tw }}" data-db-vi="{{ $about->philosophy_body_vi }}">"{{ $about->philosophy_body }}"</p>
                    <small class="about-card-attr" data-i18n="about.philosophy-attr" data-db-ja="{{ $about->philosophy_title_ja ? '— '.$about->philosophy_title_ja : '' }}" data-db-ko="{{ $about->philosophy_title_ko ? '— '.$about->philosophy_title_ko : '' }}" data-db-es="{{ $about->philosophy_title_es ? '— '.$about->philosophy_title_es : '' }}" data-db-zh-tw="{{ $about->philosophy_title_zh_tw ? '— '.$about->philosophy_title_zh_tw : '' }}" data-db-vi="{{ $about->philosophy_title_vi ? '— '.$about->philosophy_title_vi : '' }}">— {{ $about->philosophy_title }}</small>
                </div>
            </div>

            {{-- Card 2: Vision — teal tint --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--teal h-100">
                    <span class="about-card-label" data-i18n="about.card-vision">Vision</span>
                    <div class="about-card-icon"><i class="bi bi-eye-fill"></i></div>
                    <h3 class="about-card-title" data-i18n="about.vision-title" data-db-ja="{{ $about->vision_title_ja }}" data-db-ko="{{ $about->vision_title_ko }}" data-db-es="{{ $about->vision_title_es }}" data-db-zh-tw="{{ $about->vision_title_zh_tw }}" data-db-vi="{{ $about->vision_title_vi }}">{{ $about->vision_title }}</h3>
                    <p class="about-card-body" data-i18n="about.vision-body" data-db-ja="{{ $about->vision_body_ja }}" data-db-ko="{{ $about->vision_body_ko }}" data-db-es="{{ $about->vision_body_es }}" data-db-zh-tw="{{ $about->vision_body_zh_tw }}" data-db-vi="{{ $about->vision_body_vi }}">{{ $about->vision_body }}</p>
                </div>
            </div>

            {{-- Card 3: Mission — white --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--white h-100">
                    <span class="about-card-label" data-i18n="about.card-mission">Mission</span>
                    <div class="about-card-icon"><i class="bi bi-rocket-takeoff-fill"></i></div>
                    <h3 class="about-card-title" data-i18n="about.mission-title" data-db-ja="{{ $about->mission_title_ja }}" data-db-ko="{{ $about->mission_title_ko }}" data-db-es="{{ $about->mission_title_es }}" data-db-zh-tw="{{ $about->mission_title_zh_tw }}" data-db-vi="{{ $about->mission_title_vi }}">{{ $about->mission_title }}</h3>
                    <p class="about-card-body" data-i18n="about.mission-body" data-db-ja="{{ $about->mission_body_ja }}" data-db-ko="{{ $about->mission_body_ko }}" data-db-es="{{ $about->mission_body_es }}" data-db-zh-tw="{{ $about->mission_body_zh_tw }}" data-db-vi="{{ $about->mission_body_vi }}">{{ $about->mission_body }}</p>
                </div>
            </div>

            {{-- Card 4: Why Now — gold tint --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--gold h-100">
                    <span class="about-card-label" data-i18n="about.card-why-now">Why Now</span>
                    <div class="about-card-icon"><i class="bi bi-hourglass-split"></i></div>
                    <h3 class="about-card-title" data-i18n="about.urgency-title">The Urgency</h3>
                    <p class="about-card-body" data-i18n="about.urgency-body">The window to shape a human-centered future is narrow. The choices made today define the next century.</p>
                </div>
            </div>

        </div>
        @endif

    </div>
</section>

{{-- SVG Wave --}}
<div style="background: var(--hvrf-light); line-height:0; display:block;">
    <svg viewBox="0 0 1440 56" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%; display:block;">
        <path d="M0 56L60 46.7C120 37 240 19 360 14C480 9 600 19 720 28C840 37 960 46 1080 42C1200 37 1320 19 1380 9.3L1440 0V56H1380C1320 56 1200 56 1080 56C960 56 840 56 720 56C600 56 480 56 360 56C240 56 120 56 60 56H0Z" fill="white"/>
    </svg>
</div>

{{-- ═══════════════════════════════════════════
     FOCUS AREAS
═══════════════════════════════════════════ --}}
<section id="focus-areas" style="padding: 6rem 0 5rem; background: #fff;">
    <div class="container">
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label mb-3 d-flex justify-content-center" data-i18n="focus.label">Our Work</span>
            <h2 class="section-title mb-3" data-i18n="focus.heading">What the Foundation Will Do</h2>
            <p class="section-subtitle" data-i18n="focus.subtitle">Five pillars to protect and amplify human value in the age of autonomous intelligence.</p>
        </div>

        <div class="row g-4 gsap-stagger">
            @foreach($focusAreas as $index => $area)
            <div class="col-lg-4 col-md-6 gsap-stagger-child {{ $loop->last && $loop->count % 2 !== 0 ? 'offset-lg-0' : '' }}">
                <div class="focus-card h-100">
                    <!-- <div class="focus-num-badge">{{ $area->number }}</div> -->
                    <div class="focus-icon-wrap">
                        <i class="bi {{ $area->icon_name }}"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="font-size: 1.05rem; color: var(--hvrf-navy);" data-i18n="fa.{{ $index }}.title" data-db-ja="{{ $area->title_ja }}" data-db-ko="{{ $area->title_ko }}" data-db-es="{{ $area->title_es }}" data-db-zh-tw="{{ $area->title_zh_tw }}" data-db-vi="{{ $area->title_vi }}">{{ $area->title }}</h4>
                    <p class="small mb-3" style="color: var(--hvrf-gray); line-height: 1.7;" data-i18n="fa.{{ $index }}.desc" data-db-ja="{{ $area->description_ja }}" data-db-ko="{{ $area->description_ko }}" data-db-es="{{ $area->description_es }}" data-db-zh-tw="{{ $area->description_zh_tw }}" data-db-vi="{{ $area->description_vi }}">{{ $area->description }}</p>
                    @if($area->examples_json)
                    <ul class="focus-examples">
                        @foreach($area->examples_json as $ei => $example)
                        <li data-i18n="fa.{{ $index }}.ex{{ $ei }}" data-db-ja="{{ ($area->examples_json_ja ?? [])[$ei] ?? '' }}" data-db-ko="{{ ($area->examples_json_ko ?? [])[$ei] ?? '' }}" data-db-es="{{ ($area->examples_json_es ?? [])[$ei] ?? '' }}" data-db-zh-tw="{{ ($area->examples_json_zh_tw ?? [])[$ei] ?? '' }}" data-db-vi="{{ ($area->examples_json_vi ?? [])[$ei] ?? '' }}">{{ $example }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <span class="focus-num-watermark" aria-hidden="true">{{ $area->number }}</span>
                    <i class="bi {{ $area->icon_name }} card-watermark" aria-hidden="true" style="right:55px; opacity:0.035;"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SVG Wave --}}
<div style="background:#fff; line-height:0; display:block;transform: rotate(180deg);">
    <svg viewBox="0 0 1440 56" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%; display:block;">
        <path d="M0 0L60 9.3C120 19 240 37 360 42C480 46 600 37 720 28C840 19 960 9 1080 14C1200 19 1320 37 1380 46.7L1440 56V0H0Z" fill="#F5F7FA"/>
    </svg>
</div>

{{-- ═══════════════════════════════════════════
     PROGRAMS
═══════════════════════════════════════════ --}}
<section id="programs" style="padding: 6rem 0; background: var(--hvrf-light);">
    <div class="container">
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label mb-3 d-flex justify-content-center" data-i18n="programs.label">First 3 Years</span>
            <h2 class="section-title mb-3" data-i18n="programs.heading">Our First 3 Years of Focus</h2>
            <p class="section-subtitle" data-i18n="programs.subtitle">Focused investment in two foundational pillars — Human Connection and Human Purpose.</p>
        </div>

        <div class="d-flex justify-content-center mb-5 gsap-reveal" data-dir="up" data-delay="0.1">
            <ul class="nav pill-tabs" id="programTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-connection" data-bs-toggle="tab" data-bs-target="#pane-connection" type="button" role="tab">
                        <i class="bi bi-people-fill me-2"></i><span data-i18n="programs.tab-connection">Human Connection</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-purpose" data-bs-toggle="tab" data-bs-target="#pane-purpose" type="button" role="tab">
                        <i class="bi bi-bullseye me-2"></i><span data-i18n="programs.tab-purpose">Human Purpose</span>
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="programTabsContent">
            <div class="tab-pane fade show active" id="pane-connection" role="tabpanel">
                <div class="row g-4 gsap-stagger">
                    @foreach($connectionPrograms as $program)
                    <div class="col-lg-4 gsap-stagger-child">
                        <div class="program-card">
                            <div class="program-icon"><i class="bi bi-people-fill"></i></div>
                            <h4 class="mb-2" style="font-size: 1.1rem; color: var(--hvrf-navy);" data-i18n="prog.c{{ $loop->index }}.title" data-db-ja="{{ $program->title_ja }}" data-db-ko="{{ $program->title_ko }}" data-db-es="{{ $program->title_es }}" data-db-zh-tw="{{ $program->title_zh_tw }}" data-db-vi="{{ $program->title_vi }}">{{ $program->title }}</h4>
                            <p class="small mb-3" style="color: var(--hvrf-gray); line-height: 1.7;" data-i18n="prog.c{{ $loop->index }}.desc" data-db-ja="{{ $program->description_ja }}" data-db-ko="{{ $program->description_ko }}" data-db-es="{{ $program->description_es }}" data-db-zh-tw="{{ $program->description_zh_tw }}" data-db-vi="{{ $program->description_vi }}">{{ $program->description }}</p>
                            @foreach($program->features_json ?? [] as $fi => $feature)
                            @php $pIdx = $loop->parent->index; @endphp
                            <div class="feature-item">
                                <h6 data-i18n="prog.c{{ $pIdx }}.f{{ $fi }}.title" data-db-ja="{{ ($program->features_json_ja ?? [])[$fi]['title'] ?? '' }}" data-db-ko="{{ ($program->features_json_ko ?? [])[$fi]['title'] ?? '' }}" data-db-es="{{ ($program->features_json_es ?? [])[$fi]['title'] ?? '' }}" data-db-zh-tw="{{ ($program->features_json_zh_tw ?? [])[$fi]['title'] ?? '' }}" data-db-vi="{{ ($program->features_json_vi ?? [])[$fi]['title'] ?? '' }}">{{ $feature['title'] ?? '' }}</h6>
                                <p class="small mb-1" style="color: var(--hvrf-gray);" data-i18n="prog.c{{ $pIdx }}.f{{ $fi }}.desc" data-db-ja="{{ ($program->features_json_ja ?? [])[$fi]['description'] ?? '' }}" data-db-ko="{{ ($program->features_json_ko ?? [])[$fi]['description'] ?? '' }}" data-db-es="{{ ($program->features_json_es ?? [])[$fi]['description'] ?? '' }}" data-db-zh-tw="{{ ($program->features_json_zh_tw ?? [])[$fi]['description'] ?? '' }}" data-db-vi="{{ ($program->features_json_vi ?? [])[$fi]['description'] ?? '' }}">{{ $feature['description'] ?? '' }}</p>
                                @if(!empty($feature['items']))
                                <ul class="feature-items-list">
                                    @foreach($feature['items'] as $ii => $item)
                                    <li data-i18n="prog.c{{ $pIdx }}.f{{ $fi }}.i{{ $ii }}" data-db-ja="{{ ($program->features_json_ja ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-ko="{{ ($program->features_json_ko ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-es="{{ ($program->features_json_es ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-zh-tw="{{ ($program->features_json_zh_tw ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-vi="{{ ($program->features_json_vi ?? [])[$fi]['items'][$ii] ?? '' }}">{{ $item }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            @endforeach
                            <i class="bi bi-people-fill card-watermark" aria-hidden="true"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="pane-purpose" role="tabpanel">
                <div class="row g-4">
                    @foreach($purposePrograms as $program)
                    <div class="col-lg-4">
                        <div class="program-card">
                            <div class="program-icon"><i class="bi bi-bullseye"></i></div>
                            <h4 class="mb-2" style="font-size: 1.1rem; color: var(--hvrf-navy);" data-i18n="prog.p{{ $loop->index }}.title" data-db-ja="{{ $program->title_ja }}" data-db-ko="{{ $program->title_ko }}" data-db-es="{{ $program->title_es }}" data-db-zh-tw="{{ $program->title_zh_tw }}" data-db-vi="{{ $program->title_vi }}">{{ $program->title }}</h4>
                            <p class="small mb-3" style="color: var(--hvrf-gray); line-height: 1.7;" data-i18n="prog.p{{ $loop->index }}.desc" data-db-ja="{{ $program->description_ja }}" data-db-ko="{{ $program->description_ko }}" data-db-es="{{ $program->description_es }}" data-db-zh-tw="{{ $program->description_zh_tw }}" data-db-vi="{{ $program->description_vi }}">{{ $program->description }}</p>
                            @foreach($program->features_json ?? [] as $fi => $feature)
                            @php $pIdx = $loop->parent->index; @endphp
                            <div class="feature-item">
                                <h6 data-i18n="prog.p{{ $pIdx }}.f{{ $fi }}.title" data-db-ja="{{ ($program->features_json_ja ?? [])[$fi]['title'] ?? '' }}" data-db-ko="{{ ($program->features_json_ko ?? [])[$fi]['title'] ?? '' }}" data-db-es="{{ ($program->features_json_es ?? [])[$fi]['title'] ?? '' }}" data-db-zh-tw="{{ ($program->features_json_zh_tw ?? [])[$fi]['title'] ?? '' }}" data-db-vi="{{ ($program->features_json_vi ?? [])[$fi]['title'] ?? '' }}">{{ $feature['title'] ?? '' }}</h6>
                                <p class="small mb-1" style="color: var(--hvrf-gray);" data-i18n="prog.p{{ $pIdx }}.f{{ $fi }}.desc" data-db-ja="{{ ($program->features_json_ja ?? [])[$fi]['description'] ?? '' }}" data-db-ko="{{ ($program->features_json_ko ?? [])[$fi]['description'] ?? '' }}" data-db-es="{{ ($program->features_json_es ?? [])[$fi]['description'] ?? '' }}" data-db-zh-tw="{{ ($program->features_json_zh_tw ?? [])[$fi]['description'] ?? '' }}" data-db-vi="{{ ($program->features_json_vi ?? [])[$fi]['description'] ?? '' }}">{{ $feature['description'] ?? '' }}</p>
                                @if(!empty($feature['items']))
                                <ul class="feature-items-list">
                                    @foreach($feature['items'] as $ii => $item)
                                    <li data-i18n="prog.p{{ $pIdx }}.f{{ $fi }}.i{{ $ii }}" data-db-ja="{{ ($program->features_json_ja ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-ko="{{ ($program->features_json_ko ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-es="{{ ($program->features_json_es ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-zh-tw="{{ ($program->features_json_zh_tw ?? [])[$fi]['items'][$ii] ?? '' }}" data-db-vi="{{ ($program->features_json_vi ?? [])[$fi]['items'][$ii] ?? '' }}">{{ $item }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            @endforeach
                            <i class="bi bi-bullseye card-watermark" aria-hidden="true"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- How HVRF Gets Involved --}}
        @php $firstConnProg = $connectionPrograms->first(); $allInvolved = $firstConnProg?->how_involved_json ?? []; @endphp
        @if(count($allInvolved))
        <div class="involved-box mt-5 gsap-reveal" data-dir="up" data-delay="0.1">
            <div class="row align-items-center g-4">
                <div class="col-lg-3">
                    <h5 class="text-white mb-1" style="font-family:'Playfair Display',serif;" data-i18n="programs.involved-heading">How HVRF Gets Involved</h5>
                    <p class="small mb-0" style="color: rgba(255,255,255,0.45);" data-i18n="programs.involved-sub">Our commitment across all programs</p>
                </div>
                <div class="col-lg-9">
                    <div class="row g-2">
                        @foreach($allInvolved as $ii => $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="involved-item">
                                <div class="involved-check"><i class="bi bi-check-lg"></i></div>
                                <span class="small text-white" style="opacity: 0.85;" data-i18n="prog.involved{{ $ii }}" data-db-ja="{{ ($firstConnProg?->how_involved_json_ja ?? [])[$ii] ?? '' }}" data-db-ko="{{ ($firstConnProg?->how_involved_json_ko ?? [])[$ii] ?? '' }}" data-db-es="{{ ($firstConnProg?->how_involved_json_es ?? [])[$ii] ?? '' }}" data-db-zh-tw="{{ ($firstConnProg?->how_involved_json_zh_tw ?? [])[$ii] ?? '' }}" data-db-vi="{{ ($firstConnProg?->how_involved_json_vi ?? [])[$ii] ?? '' }}">{{ $item }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- SVG Wave --}}
<div style="background: var(--hvrf-light); line-height:0; display:block;">
    <svg viewBox="0 0 1440 56" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%; display:block;">
        <path d="M0 56L60 46.7C120 37 240 19 360 14C480 9 600 19 720 28C840 37 960 46 1080 42C1200 37 1320 19 1380 9.3L1440 0V56H0Z" fill="white"/>
    </svg>
</div>

{{-- ═══════════════════════════════════════════
     ROADMAP
═══════════════════════════════════════════ --}}
<section id="roadmap" style="padding: 6rem 0; background: #fff;">
    <div class="container">
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label mb-3 d-flex justify-content-center" data-i18n="roadmap.label">Strategic Plan</span>
            <h2 class="section-title mb-3" data-i18n="roadmap.heading">10-Year Strategic Roadmap</h2>
            <p class="section-subtitle" data-i18n="roadmap.subtitle">Three phases to build human capability, scale ecosystems, and establish global institutions of human value.</p>
        </div>

        {{-- Phase Tab Buttons --}}
        <div class="roadmap-tabs gsap-reveal" data-dir="up" data-delay="0.1">
            <button class="roadmap-tab active" data-phase="1">
                <span class="rm-tab-num" data-i18n="roadmap.p1-num">Phase 1</span>
                <span class="rm-tab-name" data-i18n="roadmap.p1-name">Foundation</span>
                <span class="rm-tab-years" data-i18n="roadmap.p1-years">Years 1–3</span>
            </button>
            <div class="rm-connector"></div>
            <button class="roadmap-tab" data-phase="2">
                <span class="rm-tab-num" data-i18n="roadmap.p2-num">Phase 2</span>
                <span class="rm-tab-name" data-i18n="roadmap.p2-name">Growth</span>
                <span class="rm-tab-years" data-i18n="roadmap.p2-years">Years 4–6</span>
            </button>
            <div class="rm-connector"></div>
            <button class="roadmap-tab" data-phase="3">
                <span class="rm-tab-num" data-i18n="roadmap.p3-num">Phase 3</span>
                <span class="rm-tab-name" data-i18n="roadmap.p3-name">Institution</span>
                <span class="rm-tab-years" data-i18n="roadmap.p3-years">Years 7–10</span>
            </button>
        </div>

        {{-- Phase 1: Foundation --}}
        <div class="roadmap-phase" id="roadmap-phase-1">
            <div class="roadmap-phase-header">
                <div class="roadmap-section-icon"><i class="bi bi-people-fill"></i></div>
                <div>
                    <h5 class="mb-0 fw-bold" style="color:var(--hvrf-navy);" data-i18n="roadmap.p1-title">Foundation: Human Capability & Community</h5>
                    <span class="small" style="color:var(--hvrf-gray);" data-i18n="roadmap.p1-sub">Human Enhancement (Wisdom) + Human Connection Systems</span>
                </div>
            </div>
            <div class="row g-4">
                @foreach($connectionRoadmap as $yearData)
                <div class="col-lg-4 col-md-6">
                    @php $rmColors = ['teal','white','gold']; @endphp
                    <div class="roadmap-card roadmap-card--{{ $rmColors[$loop->index % 3] }} h-100">
                        <div class="roadmap-year-pill"><i class="bi bi-calendar3"></i> <span data-i18n="rm.c{{ $loop->index }}.year" data-db-ja="{{ $yearData->year_label_ja }}" data-db-ko="{{ $yearData->year_label_ko }}" data-db-es="{{ $yearData->year_label_es }}" data-db-zh-tw="{{ $yearData->year_label_zh_tw }}" data-db-vi="{{ $yearData->year_label_vi }}">{{ $yearData->year_label }}</span></div>
                        <h6 class="fw-bold mb-3" style="color:var(--hvrf-navy);font-size:0.92rem;" data-i18n="rm.c{{ $loop->index }}.goal" data-db-ja="{{ $yearData->goal_ja }}" data-db-ko="{{ $yearData->goal_ko }}" data-db-es="{{ $yearData->goal_es }}" data-db-zh-tw="{{ $yearData->goal_zh_tw }}" data-db-vi="{{ $yearData->goal_vi }}">{{ $yearData->goal }}</h6>
                        <p class="rm-col-label teal" data-i18n="roadmap.projects">Projects</p>
                        @php $rmIdx = $loop->index; @endphp
                        <ul class="roadmap-list mb-3">@foreach($yearData->projects_json as $pi => $p)<li data-i18n="rm.c{{ $rmIdx }}.p{{ $pi }}" data-db-ja="{{ ($yearData->projects_json_ja ?? [])[$pi] ?? '' }}" data-db-ko="{{ ($yearData->projects_json_ko ?? [])[$pi] ?? '' }}" data-db-es="{{ ($yearData->projects_json_es ?? [])[$pi] ?? '' }}" data-db-zh-tw="{{ ($yearData->projects_json_zh_tw ?? [])[$pi] ?? '' }}" data-db-vi="{{ ($yearData->projects_json_vi ?? [])[$pi] ?? '' }}">{{ $p }}</li>@endforeach</ul>
                        <p class="rm-col-label gold" data-i18n="roadmap.kpis">KPIs</p>
                        <ul class="roadmap-list kpi-list">@foreach($yearData->kpis_json as $ki => $k)<li data-i18n="rm.c{{ $rmIdx }}.k{{ $ki }}" data-db-ja="{{ ($yearData->kpis_json_ja ?? [])[$ki] ?? '' }}" data-db-ko="{{ ($yearData->kpis_json_ko ?? [])[$ki] ?? '' }}" data-db-es="{{ ($yearData->kpis_json_es ?? [])[$ki] ?? '' }}" data-db-zh-tw="{{ ($yearData->kpis_json_zh_tw ?? [])[$ki] ?? '' }}" data-db-vi="{{ ($yearData->kpis_json_vi ?? [])[$ki] ?? '' }}">{{ $k }}</li>@endforeach</ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Phase 2: Growth (years 4-6) --}}
        <div class="roadmap-phase d-none" id="roadmap-phase-2">
            <div class="roadmap-phase-header">
                <div class="roadmap-section-icon"><i class="bi bi-graph-up-arrow"></i></div>
                <div>
                    <h5 class="mb-0 fw-bold" style="color:var(--hvrf-navy);" data-i18n="roadmap.p2-title">Growth: Creativity & Stewardship Ecosystems</h5>
                    <span class="small" style="color:var(--hvrf-gray);" data-i18n="roadmap.p2-sub">Human Creativity Economy + Human Purpose Infrastructure</span>
                </div>
            </div>
            <div class="row g-4">
                @foreach($purposeRoadmap->filter(fn($y) => $y->year_number <= 6) as $yearData)
                <div class="col-lg-4 col-md-6">
                    @php $rmColors = ['teal','white','gold']; @endphp
                    <div class="roadmap-card roadmap-card--{{ $rmColors[$loop->index % 3] }} h-100">
                        <div class="roadmap-year-pill"><i class="bi bi-calendar3"></i> <span data-i18n="rm.p{{ $loop->index }}.year" data-db-ja="{{ $yearData->year_label_ja }}" data-db-ko="{{ $yearData->year_label_ko }}" data-db-es="{{ $yearData->year_label_es }}" data-db-zh-tw="{{ $yearData->year_label_zh_tw }}" data-db-vi="{{ $yearData->year_label_vi }}">{{ $yearData->year_label }}</span></div>
                        <h6 class="fw-bold mb-3" style="color:var(--hvrf-navy);font-size:0.92rem;" data-i18n="rm.p{{ $loop->index }}.goal" data-db-ja="{{ $yearData->goal_ja }}" data-db-ko="{{ $yearData->goal_ko }}" data-db-es="{{ $yearData->goal_es }}" data-db-zh-tw="{{ $yearData->goal_zh_tw }}" data-db-vi="{{ $yearData->goal_vi }}">{{ $yearData->goal }}</h6>
                        <p class="rm-col-label teal" data-i18n="roadmap.projects">Projects</p>
                        @php $rmIdx = $loop->index; @endphp
                        <ul class="roadmap-list mb-3">@foreach($yearData->projects_json as $pi => $p)<li data-i18n="rm.p{{ $rmIdx }}.p{{ $pi }}" data-db-ja="{{ ($yearData->projects_json_ja ?? [])[$pi] ?? '' }}" data-db-ko="{{ ($yearData->projects_json_ko ?? [])[$pi] ?? '' }}" data-db-es="{{ ($yearData->projects_json_es ?? [])[$pi] ?? '' }}" data-db-zh-tw="{{ ($yearData->projects_json_zh_tw ?? [])[$pi] ?? '' }}" data-db-vi="{{ ($yearData->projects_json_vi ?? [])[$pi] ?? '' }}">{{ $p }}</li>@endforeach</ul>
                        <p class="rm-col-label gold" data-i18n="roadmap.kpis">KPIs</p>
                        <ul class="roadmap-list kpi-list">@foreach($yearData->kpis_json as $ki => $k)<li data-i18n="rm.p{{ $rmIdx }}.k{{ $ki }}" data-db-ja="{{ ($yearData->kpis_json_ja ?? [])[$ki] ?? '' }}" data-db-ko="{{ ($yearData->kpis_json_ko ?? [])[$ki] ?? '' }}" data-db-es="{{ ($yearData->kpis_json_es ?? [])[$ki] ?? '' }}" data-db-zh-tw="{{ ($yearData->kpis_json_zh_tw ?? [])[$ki] ?? '' }}" data-db-vi="{{ ($yearData->kpis_json_vi ?? [])[$ki] ?? '' }}">{{ $k }}</li>@endforeach</ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Phase 3: Institution (years 7-10) --}}
        <div class="roadmap-phase d-none" id="roadmap-phase-3">
            <div class="roadmap-phase-header">
                <div class="roadmap-section-icon"><i class="bi bi-bank2"></i></div>
                <div>
                    <h5 class="mb-0 fw-bold" style="color:var(--hvrf-navy);" data-i18n="roadmap.p3-title">Institution: Global Ethics & Governance</h5>
                    <span class="small" style="color:var(--hvrf-gray);" data-i18n="roadmap.p3-sub">Ethics & Governance — Human responsibility at a global scale</span>
                </div>
            </div>
            <div class="row g-4">
                @foreach($purposeRoadmap->filter(fn($y) => $y->year_number >= 7) as $yearData)
                <div class="col-lg-4 col-md-6">
                    @php $rmColors = ['teal','white','gold']; @endphp
                    <div class="roadmap-card roadmap-card--{{ $rmColors[$loop->index % 3] }} h-100">
                        <div class="roadmap-year-pill"><i class="bi bi-calendar3"></i> <span data-i18n="rm.p3{{ $loop->index }}.year" data-db-ja="{{ $yearData->year_label_ja }}" data-db-ko="{{ $yearData->year_label_ko }}" data-db-es="{{ $yearData->year_label_es }}" data-db-zh-tw="{{ $yearData->year_label_zh_tw }}" data-db-vi="{{ $yearData->year_label_vi }}">{{ $yearData->year_label }}</span></div>
                        <h6 class="fw-bold mb-3" style="color:var(--hvrf-navy);font-size:0.92rem;" data-i18n="rm.p3{{ $loop->index }}.goal" data-db-ja="{{ $yearData->goal_ja }}" data-db-ko="{{ $yearData->goal_ko }}" data-db-es="{{ $yearData->goal_es }}" data-db-zh-tw="{{ $yearData->goal_zh_tw }}" data-db-vi="{{ $yearData->goal_vi }}">{{ $yearData->goal }}</h6>
                        <p class="rm-col-label teal" data-i18n="roadmap.projects">Projects</p>
                        @php $rmIdx = $loop->index; @endphp
                        <ul class="roadmap-list mb-3">@foreach($yearData->projects_json as $pi => $p)<li data-i18n="rm.p3{{ $rmIdx }}.p{{ $pi }}" data-db-ja="{{ ($yearData->projects_json_ja ?? [])[$pi] ?? '' }}" data-db-ko="{{ ($yearData->projects_json_ko ?? [])[$pi] ?? '' }}" data-db-es="{{ ($yearData->projects_json_es ?? [])[$pi] ?? '' }}" data-db-zh-tw="{{ ($yearData->projects_json_zh_tw ?? [])[$pi] ?? '' }}" data-db-vi="{{ ($yearData->projects_json_vi ?? [])[$pi] ?? '' }}">{{ $p }}</li>@endforeach</ul>
                        <p class="rm-col-label gold" data-i18n="roadmap.kpis">KPIs</p>
                        <ul class="roadmap-list kpi-list">@foreach($yearData->kpis_json as $ki => $k)<li data-i18n="rm.p3{{ $rmIdx }}.k{{ $ki }}" data-db-ja="{{ ($yearData->kpis_json_ja ?? [])[$ki] ?? '' }}" data-db-ko="{{ ($yearData->kpis_json_ko ?? [])[$ki] ?? '' }}" data-db-es="{{ ($yearData->kpis_json_es ?? [])[$ki] ?? '' }}" data-db-zh-tw="{{ ($yearData->kpis_json_zh_tw ?? [])[$ki] ?? '' }}" data-db-vi="{{ ($yearData->kpis_json_vi ?? [])[$ki] ?? '' }}">{{ $k }}</li>@endforeach</ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- SVG Wave --}}
<div style="background:#fff; line-height:0; display:block;transform: rotate(180deg);">
    <svg viewBox="0 0 1440 56" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%; display:block;">
        <path d="M0 0L60 9.3C120 19 240 37 360 42C480 46 600 37 720 28C840 19 960 9 1080 14C1200 19 1320 37 1380 46.7L1440 56V0H0Z" fill="#F5F7FA"/>
    </svg>
</div>

{{-- ═══════════════════════════════════════════
     INITIATORS
═══════════════════════════════════════════ --}}
@if($initiators->count())
<section id="initiators" style="padding: 4.5rem 0 3.5rem; background: var(--hvrf-light);">
    <div class="container">
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label mb-3 d-flex justify-content-center initiators-i18n-label"
                  data-original="{{ e($settings['initiators_label'] ?? 'Backed By') }}"
                  data-db-ja="{{ e($settings['initiators_label_ja'] ?? '') }}" data-db-ko="{{ e($settings['initiators_label_ko'] ?? '') }}"
                  data-db-es="{{ e($settings['initiators_label_es'] ?? '') }}" data-db-zh-tw="{{ e($settings['initiators_label_zh_tw'] ?? '') }}"
                  data-db-vi="{{ e($settings['initiators_label_vi'] ?? '') }}">{{ $settings['initiators_label'] ?? 'Backed By' }}</span>
            <h2 class="section-title mb-3 initiators-i18n-heading"
                  data-original="{{ e($settings['initiators_heading'] ?? 'Our Initiators') }}"
                  data-db-ja="{{ e($settings['initiators_heading_ja'] ?? '') }}" data-db-ko="{{ e($settings['initiators_heading_ko'] ?? '') }}"
                  data-db-es="{{ e($settings['initiators_heading_es'] ?? '') }}" data-db-zh-tw="{{ e($settings['initiators_heading_zh_tw'] ?? '') }}"
                  data-db-vi="{{ e($settings['initiators_heading_vi'] ?? '') }}">{{ $settings['initiators_heading'] ?? 'Our Initiators' }}</h2>
            <p class="section-subtitle initiators-i18n-subtitle"
                  data-original="{{ e($settings['initiators_subtitle'] ?? "Leading AI labs, enterprises, and visionaries helping shape HVRF's mission.") }}"
                  data-db-ja="{{ e($settings['initiators_subtitle_ja'] ?? '') }}" data-db-ko="{{ e($settings['initiators_subtitle_ko'] ?? '') }}"
                  data-db-es="{{ e($settings['initiators_subtitle_es'] ?? '') }}" data-db-zh-tw="{{ e($settings['initiators_subtitle_zh_tw'] ?? '') }}"
                  data-db-vi="{{ e($settings['initiators_subtitle_vi'] ?? '') }}">{{ $settings['initiators_subtitle'] ?? "Leading AI labs, enterprises, and visionaries helping shape HVRF's mission." }}</p>
        </div>
    </div>

    <div class="initiators-marquee-wrap gsap-reveal" data-dir="up">
        <div class="initiators-marquee-track">
            @foreach($initiators->concat($initiators) as $initiator)
            @php
                $logoSrc = Str::startsWith($initiator->logo_url, ['http', '/'])
                    ? $initiator->logo_url
                    : (config('filesystems.disks.r2.url')
                        ? rtrim(config('filesystems.disks.r2.url'), '/') . '/' . $initiator->logo_url
                        : asset('storage/' . $initiator->logo_url));
                $hasLink = filled($initiator->website_url);
                $tag = $hasLink ? 'a' : 'div';
            @endphp
            <{{ $tag }} class="initiator-logo-card"
               @if($hasLink) href="{{ $initiator->website_url }}" target="_blank" rel="noopener noreferrer" @endif>
                <img src="{{ $logoSrc }}" alt="{{ $initiator->name }}" loading="lazy">
                <span class="initiator-logo-name initiator-i18n-name"
                      data-original="{{ e($initiator->name) }}"
                      data-db-ja="{{ e($initiator->name_ja) }}" data-db-ko="{{ e($initiator->name_ko) }}"
                      data-db-es="{{ e($initiator->name_es) }}" data-db-zh-tw="{{ e($initiator->name_zh_tw) }}"
                      data-db-vi="{{ e($initiator->name_vi) }}">{{ $initiator->name }}</span>
            </{{ $tag }}>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════
     TEAM
═══════════════════════════════════════════ --}}
<section id="team" style="padding: 6rem 0; background: var(--hvrf-light);">
    <div class="container">
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label mb-3 d-flex justify-content-center" data-i18n="team.label">The People</span>
            <h2 class="section-title mb-3" data-i18n="team.heading">Our Team</h2>
            <p class="section-subtitle" data-i18n="team.subtitle">An extraordinary group of humans committed to shaping a better future.</p>
        </div>

        @if($team->count())
        <div class="row g-4 justify-content-center gsap-stagger">
            @foreach($team as $member)
            <div class="col-xl-3 col-lg-4 col-md-6 gsap-stagger-child">
                <div class="team-card">
                    <div class="team-photo-wrap mx-auto">
                        @if($member->photo_url)
                        @php
                            $photoSrc = Str::startsWith($member->photo_url, 'http')
                                ? $member->photo_url
                                : (config('filesystems.disks.r2.url')
                                    ? rtrim(config('filesystems.disks.r2.url'), '/') . '/' . $member->photo_url
                                    : asset('storage/' . $member->photo_url));
                        @endphp
                        <img src="{{ $photoSrc }}" alt="{{ $member->name }}" class="team-photo">
                        @else
                        <div class="team-photo-placeholder">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        @endif
                        <div class="team-ring"></div>
                    </div>
                    <h5 class="fw-bold mb-1 mt-1" style="font-size: 1rem; color: var(--hvrf-navy);">{{ $member->name }}</h5>
                    <p class="small fw-semibold mb-2 team-i18n-role" style="color: var(--hvrf-teal); font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.5px;"
                       data-original="{{ e($member->role) }}"
                       data-db-ja="{{ e($member->role_ja) }}"
                       data-db-ko="{{ e($member->role_ko) }}"
                       data-db-es="{{ e($member->role_es) }}"
                       data-db-zh-tw="{{ e($member->role_zh_tw) }}"
                       data-db-vi="{{ e($member->role_vi) }}">{{ $member->role }}</p>
                    <p class="small mb-3 team-i18n-bio" style="color: var(--hvrf-gray); line-height: 1.65; font-size: 0.83rem;"
                       data-original="{{ e(Str::limit($member->bio, 120)) }}"
                       data-db-ja="{{ e(Str::limit($member->bio_ja ?: '', 120)) }}"
                       data-db-ko="{{ e(Str::limit($member->bio_ko ?: '', 120)) }}"
                       data-db-es="{{ e(Str::limit($member->bio_es ?: '', 120)) }}"
                       data-db-zh-tw="{{ e(Str::limit($member->bio_zh_tw ?: '', 120)) }}"
                       data-db-vi="{{ e(Str::limit($member->bio_vi ?: '', 120)) }}">{{ Str::limit($member->bio, 120) }}</p>
                    @if($member->linkedin_url)
                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener"
                       style="display:inline-flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:8px; background:rgba(78,205,196,0.1); border:1px solid rgba(78,205,196,0.2); color:var(--hvrf-teal); text-decoration:none; transition:var(--transition);"
                       onmouseover="this.style.background='var(--hvrf-teal)'; this.style.color='#fff';"
                       onmouseout="this.style.background='rgba(78,205,196,0.1)'; this.style.color='var(--hvrf-teal)';">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5 gsap-reveal" data-dir="up">
            <div style="width:80px; height:80px; border-radius:50%; background:rgba(78,205,196,0.08); border:2px dashed rgba(78,205,196,0.25); display:flex; align-items:center; justify-content:center; margin:0 auto 1rem;">
                <i class="bi bi-people" style="font-size:2rem; color:rgba(78,205,196,0.5);"></i>
            </div>
            <p style="color: var(--hvrf-gray);" data-i18n="team.coming-soon">Team coming soon — we are building an extraordinary group of humans.</p>
        </div>
        @endif
    </div>
</section>

{{-- ═══════════════════════════════════════════
     JOIN / CTA
═══════════════════════════════════════════ --}}
<section id="join" class="join-section">
    <div class="join-bg-line"></div>
    <div class="join-glow"></div>
    <div class="container position-relative text-center" style="z-index:2;">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6 gsap-reveal" data-dir="up">
                <span class="section-label mb-4 d-flex justify-content-center" style="color: var(--hvrf-teal);" data-i18n="join.label">Get Involved</span>
                <h2 class="section-title light mb-4" data-i18n-html="join.heading">Join the Movement to<br>Preserve Human Value</h2>
                <p class="mb-5" style="color: rgba(255,255,255,0.65); font-size: 1.05rem; line-height: 1.8;" data-i18n="join.subtitle">
                    Whether you're a researcher, philanthropist, technologist, or simply a human who cares — there's a place for you at HVRF.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#contact" class="btn-hvrf-primary">
                        <span data-i18n="join.cta-primary">Partner With Us</span> <i class="bi bi-arrow-right-short fs-5"></i>
                    </a>
                    <button type="button" class="btn-hvrf-outline" data-bs-toggle="modal" data-bs-target="#newsletterModal">
                        <i class="bi bi-bell"></i> <span data-i18n="join.cta-secondary">Subscribe to Updates</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Newsletter Modal --}}
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 pb-0 pt-3 px-4">
                <div>
                    <h5 class="modal-title" id="newsletterModalLabel" style="font-family: 'Playfair Display', serif; color: var(--hvrf-navy);" data-i18n="news.title">
                        Stay Connected with HVRF
                    </h5>
                    <p class="small mb-0" style="color: var(--hvrf-gray);" data-i18n="news.subtitle">Receive updates on our programs, research, and mission.</p>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4 pt-3">
                <form class="newsletter-ajax-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" data-i18n="news.name-label">Your Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Jane Smith" data-i18n-placeholder="news.name-ph">
                    </div>
                    <div class="mb-4">
                        <label class="form-label"><span data-i18n="news.email-label">Email Address</span> <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="you@example.com" required data-i18n-placeholder="news.email-ph">
                    </div>
                    <button type="submit" class="btn-hvrf-submit btn w-100" data-i18n="news.submit">Subscribe to Updates</button>
                    <div class="newsletter-msg mt-2 text-center"></div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════
     CONTACT
═══════════════════════════════════════════ --}}
<section id="contact" class="contact-section">
    <div class="container">
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label mb-3 d-flex justify-content-center" data-i18n="contact.label">Get In Touch</span>
            <h2 class="section-title mb-3" data-i18n="contact.heading">Contact Us</h2>
            <p class="section-subtitle" data-i18n="contact.subtitle">We believe in the power of human connection. Reach out and let's build a better future together.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 gsap-reveal" data-dir="left" data-delay="0.1">
                <div class="contact-info-panel h-100">
                    <h5 class="text-white fw-bold mb-1" style="font-family:'Playfair Display',serif; font-size: 1.15rem;">HVRF</h5>
                    <p class="small mb-4" style="color: rgba(255,255,255,0.45);">Human Value Reserve Foundation</p>

                    <div class="contact-info-item">
                        <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <div class="small fw-semibold text-white" data-i18n="contact.email">Email</div>
                            <div class="small" style="color: rgba(255,255,255,0.55);">{{ $settings['contact_email'] ?? 'info@hvrf.org' }}</div>
                        </div>
                    </div>

                    @if(!empty($settings['contact_phone']))
                    <div class="contact-info-item">
                        <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <div class="small fw-semibold text-white" data-i18n="contact.phone">Phone</div>
                            <div class="small" style="color: rgba(255,255,255,0.55);">{{ $settings['contact_phone'] }}</div>
                        </div>
                    </div>
                    @endif

                    <div class="contact-info-item">
                        <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <div class="small fw-semibold text-white" data-i18n="contact.location">Location</div>
                            <div class="small" style="color: rgba(255,255,255,0.55);">{{ $settings['contact_location'] ?? 'Global — Remote First' }}</div>
                        </div>
                    </div>

                    <div class="mt-auto pt-3" style="border-top: 1px solid rgba(255,255,255,0.07); margin-top: 1.5rem;">
                        <p class="small mb-3" style="color: rgba(255,255,255,0.4); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;" data-i18n="contact.follow">Follow Us</p>
                        <div class="footer-social d-flex gap-2">
                            <a href="{{ $settings['linkedin_url'] ?? '#' }}" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <a href="{{ $settings['twitter_url'] ?? '#' }}" aria-label="Twitter/X"><i class="bi bi-twitter-x"></i></a>
                            <a href="{{ $settings['facebook_url'] ?? '#' }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            @if(!empty($settings['youtube_url']))
                            <a href="{{ $settings['youtube_url'] }}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 gsap-reveal" data-dir="right" data-delay="0.1">
                <div class="contact-form-panel">
                    @if($errors->any())
                    <div class="alert alert-danger small border-0 rounded-3">
                        <ul class="mb-0 ps-3">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label"><span data-i18n="contact.name-label">Your Name</span> <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Jane Smith" required data-i18n-placeholder="contact.name-ph">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><span data-i18n="contact.email-label">Email Address</span> <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="you@example.com" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><span data-i18n="contact.subject-label">Subject</span> <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="How can we collaborate?" required data-i18n-placeholder="contact.subject-ph">
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label"><span data-i18n="contact.msg-label">Message</span> <span class="text-danger">*</span></label>
                            <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Tell us about your interest in HVRF..." required data-i18n-placeholder="contact.msg-ph">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn-hvrf-submit btn">
                            <span data-i18n="contact.submit">Send Message</span> <i class="bi bi-send ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
/* ═══════════════════════════════════════════════════════════
   HERO — PREMIUM ANIMATIONS
═══════════════════════════════════════════════════════════ */

/* ── 1. CANVAS — AI CIRCUIT BOARD ── */
(function () {
    var canvas = document.getElementById('heroCanvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var W, H, RAF = null;

    var TEAL = '78,205,196';
    var GOLD  = '201,169,110';

    var segments  = [];  /* { x1,y1,x2,y2, col, alpha } */
    var junctions = [];  /* { x,y,r, col, pt,pr,pa }    */
    var pulses    = [];  /* { x1,y1,x2,y2, t,spd, col } */
    var chip      = null;
    var frame     = 0;

    /* ── deterministic seeded RNG so layout is stable ── */
    function makeRng(seed) {
        var s = seed >>> 0;
        return function () {
            s = (Math.imul(s, 1664525) + 1013904223) >>> 0;
            return s / 0x100000000;
        };
    }

    function resize() {
        W = canvas.width  = canvas.parentElement.offsetWidth;
        H = canvas.height = canvas.parentElement.offsetHeight;
        buildLayout();
    }

    function buildLayout() {
        segments = []; junctions = []; pulses = [];
        var rng = makeRng(0xC1AC1D);  /* stable seed */

        /* Chip — left side, vertically centred */
        var csz = Math.min(W * 0.105, 86, H * 0.175);
        chip = {
            x: W * 0.235 - csz * 0.5,
            y: H * 0.475 - csz * 0.5,
            s: csz
        };
        var ccx = chip.x + csz * 0.5;
        var ccy = chip.y + csz * 0.5;

        /* ── Pin positions on chip edges ── */
        var pinCount = 4;
        var pins = [];
        for (var i = 1; i <= pinCount; i++) {
            var t = i / (pinCount + 1);
            pins.push({ x: chip.x + t*csz,       y: chip.y,            axisV: true,  dir: -1 });
            pins.push({ x: chip.x + t*csz,       y: chip.y + csz,      axisV: true,  dir:  1 });
            pins.push({ x: chip.x,               y: chip.y + t*csz,    axisV: false, dir: -1 });
            pins.push({ x: chip.x + csz,         y: chip.y + t*csz,    axisV: false, dir:  1 });
        }

        /* ── Traces from each pin: 1–2 L-segments ── */
        pins.forEach(function (pin) {
            var isGold = rng() < 0.22;
            var col    = isGold ? GOLD : TEAL;
            var alpha  = 0.20 + rng() * 0.14;

            /* Segment 1: straight out from pin */
            var len1 = 35 + rng() * H * 0.28;
            var x2 = pin.x, y2 = pin.y;
            if (pin.axisV) { y2 = clamp(pin.y + pin.dir * len1, 4, H - 4); }
            else            { x2 = clamp(pin.x + pin.dir * len1, 4, W - 4); }
            addSeg(pin.x, pin.y, x2, y2, col, alpha);
            addNode(x2, y2, 2.0, col, rng);

            /* Segment 2: L-bend (~70 % of pins) */
            if (rng() < 0.72) {
                var len2 = 40 + rng() * W * 0.28;
                var x3, y3;
                if (pin.axisV) {
                    x3 = clamp(x2 + (rng() < 0.5 ? -1 : 1) * len2, 4, W - 4);
                    y3 = y2;
                } else {
                    x3 = x2;
                    y3 = clamp(y2 + (rng() < 0.5 ? -1 : 1) * len2, 4, H - 4);
                }
                addSeg(x2, y2, x3, y3, col, alpha);
                addNode(x3, y3, 1.6 + rng() * 1.8, col, rng);

                /* Segment 3: second bend (~38 %) */
                if (rng() < 0.38) {
                    var len3 = 25 + rng() * H * 0.22;
                    var x4, y4;
                    if (pin.axisV) {
                        x4 = x3;
                        y4 = clamp(y3 + (rng() < 0.5 ? -1 : 1) * len3, 4, H - 4);
                    } else {
                        x4 = clamp(x3 + (rng() < 0.5 ? -1 : 1) * len3, 4, W - 4);
                        y4 = y3;
                    }
                    addSeg(x3, y3, x4, y4, col, alpha * 0.78);
                    addNode(x4, y4, 1.4, col, rng);
                }
            }
        });

        /* ── Background scatter traces (left-heavy, avoid center) ── */
        for (var k = 0; k < 22; k++) {
            var isGold = rng() < 0.14;
            var col    = isGold ? GOLD : TEAL;
            var alpha  = 0.05 + rng() * 0.07;
            var x1, y1, x2, y2;
            /* 75 % left side, 25 % far right */
            if (rng() < 0.75) {
                x1 = rng() * W * 0.42;
            } else {
                x1 = W * 0.68 + rng() * W * 0.32;
            }
            y1 = rng() * H;
            if (rng() < 0.5) {
                x2 = (x1 < W * 0.5 ? rng() * W * 0.42 : W * 0.68 + rng() * W * 0.32);
                y2 = y1;
            } else {
                x2 = x1;
                y2 = rng() * H;
            }
            if (Math.abs(x2-x1) + Math.abs(y2-y1) < 45) continue;
            addSeg(x1, y1, x2, y2, col, alpha);
        }
    }

    function clamp(v, lo, hi) { return v < lo ? lo : v > hi ? hi : v; }

    function addSeg(x1, y1, x2, y2, col, alpha) {
        segments.push({ x1:x1, y1:y1, x2:x2, y2:y2, col:col, alpha:alpha });
    }

    function addNode(x, y, r, col, rng) {
        for (var i = 0; i < junctions.length; i++) {
            if (Math.abs(junctions[i].x - x) < 4 && Math.abs(junctions[i].y - y) < 4) return;
        }
        junctions.push({ x:x, y:y, r:r, col:col,
            pt: Math.floor(rng() * 500), pr:0, pa:0 });
    }

    /* ── Draw the CPU chip ── */
    function drawChip(ts) {
        var cx = chip.x, cy = chip.y, cs = chip.s;
        var mx = cx + cs * 0.5, my = cy + cs * 0.5;

        /* Outer ambient glow */
        var glow = ctx.createRadialGradient(mx, my, 0, mx, my, cs * 1.5);
        glow.addColorStop(0, 'rgba(' + TEAL + ',0.07)');
        glow.addColorStop(1, 'rgba(' + TEAL + ',0)');
        ctx.beginPath(); ctx.arc(mx, my, cs * 1.5, 0, Math.PI * 2);
        ctx.fillStyle = glow; ctx.fill();

        /* Chip body */
        rrect(cx, cy, cs, cs, 5);
        ctx.fillStyle   = 'rgba(8,18,42,0.92)'; ctx.fill();
        ctx.strokeStyle = 'rgba(' + TEAL + ',0.55)'; ctx.lineWidth = 1.3; ctx.stroke();

        /* Inner border */
        var p = 7;
        rrect(cx+p, cy+p, cs-p*2, cs-p*2, 2);
        ctx.strokeStyle = 'rgba(' + TEAL + ',0.22)'; ctx.lineWidth = 0.7; ctx.stroke();

        /* Corner squares */
        var cs2 = 4;
        [[cx+p, cy+p],[cx+cs-p-cs2, cy+p],[cx+p, cy+cs-p-cs2],[cx+cs-p-cs2, cy+cs-p-cs2]].forEach(function(c) {
            ctx.fillStyle = 'rgba(' + TEAL + ',0.30)';
            ctx.fillRect(c[0], c[1], cs2, cs2);
        });

        /* Pulsing core dot */
        var pulse = 0.5 + 0.5 * Math.sin(ts / 880);
        ctx.beginPath(); ctx.arc(mx, my, 5 + pulse * 2.5, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(' + TEAL + ',' + (0.12 + pulse * 0.12) + ')'; ctx.fill();
        ctx.beginPath(); ctx.arc(mx, my, 3.2, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(' + TEAL + ',0.75)'; ctx.fill();

        /* Pin stubs */
        var pinN = 4, pinL = 5;
        ctx.strokeStyle = 'rgba(' + TEAL + ',0.42)'; ctx.lineWidth = 0.9;
        for (var i = 1; i <= pinN; i++) {
            var t = i / (pinN + 1);
            ctx.beginPath(); ctx.moveTo(cx + t*cs, cy);       ctx.lineTo(cx + t*cs, cy - pinL); ctx.stroke();
            ctx.beginPath(); ctx.moveTo(cx + t*cs, cy + cs);  ctx.lineTo(cx + t*cs, cy+cs+pinL); ctx.stroke();
            ctx.beginPath(); ctx.moveTo(cx,        cy + t*cs); ctx.lineTo(cx - pinL, cy+t*cs); ctx.stroke();
            ctx.beginPath(); ctx.moveTo(cx + cs,   cy + t*cs); ctx.lineTo(cx+cs+pinL, cy+t*cs); ctx.stroke();
        }
    }

    /* Rounded-rect path helper (avoids ctx.roundRect browser compat issues) */
    function rrect(x, y, w, h, r) {
        ctx.beginPath();
        ctx.moveTo(x+r, y);
        ctx.lineTo(x+w-r, y); ctx.quadraticCurveTo(x+w, y, x+w, y+r);
        ctx.lineTo(x+w, y+h-r); ctx.quadraticCurveTo(x+w, y+h, x+w-r, y+h);
        ctx.lineTo(x+r, y+h); ctx.quadraticCurveTo(x, y+h, x, y+h-r);
        ctx.lineTo(x, y+r); ctx.quadraticCurveTo(x, y, x+r, y);
        ctx.closePath();
    }

    /* ── Main render loop ── */
    function tick(ts) {
        RAF = requestAnimationFrame(tick);
        frame++;
        ctx.clearRect(0, 0, W, H);

        /* Draw trace segments */
        ctx.lineWidth = 0.85;
        for (var i = 0; i < segments.length; i++) {
            var s = segments[i];
            ctx.beginPath(); ctx.moveTo(s.x1, s.y1); ctx.lineTo(s.x2, s.y2);
            ctx.strokeStyle = 'rgba(' + s.col + ',' + s.alpha + ')';
            ctx.stroke();
        }

        /* Spawn data pulses on random segments */
        if (frame % 5 === 0 && pulses.length < 48) {
            var si = Math.floor(Math.random() * segments.length);
            var seg = segments[si];
            var len = Math.abs(seg.x2-seg.x1) + Math.abs(seg.y2-seg.y1);
            if (len > 38) {
                var rev = Math.random() < 0.5;
                pulses.push({
                    x1: rev ? seg.x2 : seg.x1,  y1: rev ? seg.y2 : seg.y1,
                    x2: rev ? seg.x1 : seg.x2,  y2: rev ? seg.y1 : seg.y2,
                    t: 0, spd: 0.005 + Math.random() * 0.009, col: seg.col
                });
            }
        }

        /* Draw + update pulses */
        for (var i = pulses.length - 1; i >= 0; i--) {
            var pu = pulses[i]; pu.t += pu.spd;
            if (pu.t >= 1) { pulses.splice(i, 1); continue; }
            var px = pu.x1 + (pu.x2-pu.x1)*pu.t;
            var py = pu.y1 + (pu.y2-pu.y1)*pu.t;
            var pa = Math.sin(pu.t * Math.PI) * 0.88;
            /* glow halo */
            var gr = ctx.createRadialGradient(px, py, 0, px, py, 7);
            gr.addColorStop(0, 'rgba(' + pu.col + ',' + pa + ')');
            gr.addColorStop(1, 'rgba(' + pu.col + ',0)');
            ctx.beginPath(); ctx.arc(px, py, 7, 0, Math.PI*2);
            ctx.fillStyle = gr; ctx.fill();
            /* core dot */
            ctx.beginPath(); ctx.arc(px, py, 1.8, 0, Math.PI*2);
            ctx.fillStyle = 'rgba(' + pu.col + ',' + Math.min(pa*1.1, 1) + ')'; ctx.fill();
        }

        /* Draw junction nodes */
        for (var i = 0; i < junctions.length; i++) {
            var j = junctions[i];
            j.pt--;
            if (j.pt <= 0) {
                j.pr = j.r; j.pa = 0.50;
                j.pt = 220 + Math.floor(Math.random() * 480);
            }
            if (j.pa > 0.008) {
                j.pr += 0.72; j.pa *= 0.935;
                ctx.beginPath(); ctx.arc(j.x, j.y, j.pr, 0, Math.PI*2);
                ctx.strokeStyle = 'rgba(' + j.col + ',' + j.pa + ')';
                ctx.lineWidth = 0.6; ctx.stroke();
            }
            ctx.beginPath(); ctx.arc(j.x, j.y, j.r, 0, Math.PI*2);
            ctx.fillStyle = 'rgba(' + j.col + ',0.65)'; ctx.fill();
        }

        /* Scan line */
        var sy = ((ts / 6500) * H) % H;
        var sg = ctx.createLinearGradient(0, sy-42, 0, sy+42);
        sg.addColorStop(0,   'rgba(' + TEAL + ',0)');
        sg.addColorStop(0.5, 'rgba(' + TEAL + ',0.011)');
        sg.addColorStop(1,   'rgba(' + TEAL + ',0)');
        ctx.fillStyle = sg; ctx.fillRect(0, sy-42, W, 84);

        /* Chip drawn last (on top) */
        drawChip(ts);
    }

    resize();
    requestAnimationFrame(tick);

    window.addEventListener('resize', function () {
        cancelAnimationFrame(RAF); RAF = null;
        resize(); requestAnimationFrame(tick);
    });

    ScrollTrigger.create({
        trigger: '#home',
        start: 'top top',
        end: 'bottom top',
        onLeave:     function () { cancelAnimationFrame(RAF); RAF = null; },
        onEnter:     function () { if (!RAF) requestAnimationFrame(tick); },
        onEnterBack: function () { if (!RAF) requestAnimationFrame(tick); }
    });
})();

/* ── 2. FLOATING ORBS — GSAP INFINITE ───────────────────── */
gsap.set('.hero-orb-1', { x: 0, y: 0 });
gsap.set('.hero-orb-2', { x: 0, y: 0 });
gsap.set('.hero-orb-3', { x: 0, y: 0 });

var orb1Tl = gsap.timeline({ repeat: -1, yoyo: true });
orb1Tl.to('.hero-orb-1', { x: 90,  y: -55, duration: 7,  ease: 'sine.inOut' })
       .to('.hero-orb-1', { x: -40, y: 30,  duration: 9,  ease: 'sine.inOut' })
       .to('.hero-orb-1', { x: 50,  y: 80,  duration: 7,  ease: 'sine.inOut' });

var orb2Tl = gsap.timeline({ repeat: -1, yoyo: true, delay: -4 });
orb2Tl.to('.hero-orb-2', { x: -80, y: 60,  duration: 9,  ease: 'sine.inOut' })
       .to('.hero-orb-2', { x: 60,  y: -40, duration: 7,  ease: 'sine.inOut' })
       .to('.hero-orb-2', { x: -30, y: -70, duration: 11, ease: 'sine.inOut' });

var orb3Tl = gsap.timeline({ repeat: -1, yoyo: true, delay: -7 });
orb3Tl.to('.hero-orb-3', { x: 120, y: -80, duration: 13, ease: 'sine.inOut' })
       .to('.hero-orb-3', { x: -60, y: 50,  duration: 9,  ease: 'sine.inOut' });

/* rings */
gsap.to('.hero-ring-1', { rotation: 360, duration: 40, ease: 'none', repeat: -1, transformOrigin: '50% 50%' });
gsap.to('.hero-ring-2', { rotation: -360, duration: 60, ease: 'none', repeat: -1, transformOrigin: '50% 50%' });

/* ── 3. WORD-BY-WORD TITLE REVEAL ───────────────────────── */
(function splitTitle() {
    var el = document.querySelector('.hero-title');
    if (!el) return;

    var raw   = el.dataset.title || el.innerText;
    var words = raw.trim().split(/\s+/);

    el.innerHTML = words.map(function (w) {
        return '<span class="hw-wrap"><span class="hw-inner">' + w + '</span></span>';
    }).join(' ');

    gsap.set('.hw-inner', { yPercent: 110, opacity: 0 });
    gsap.to('.hw-inner', {
        yPercent: 0,
        opacity:  1,
        duration: 0.72,
        stagger:  0.075,
        delay:    0.55,
        ease:     'power3.out'
    });
})();

/* ── 4. TYPEWRITER SUBTITLE ─────────────────────────────── */
(function typewriter() {
    var el = document.querySelector('.hero-subtitle');
    if (!el) return;
    var full = el.dataset.subtitle || '';
    el.textContent = '';
    el.style.opacity = '1';

    var i = 0;
    var cursor = document.createElement('span');
    cursor.style.cssText = 'display:inline-block;width:2px;height:1em;background:var(--hvrf-teal);margin-left:2px;vertical-align:middle;animation:blink 0.85s step-end infinite;';
    el.appendChild(cursor);

    setTimeout(function type() {
        if (i < full.length) {
            el.insertBefore(document.createTextNode(full[i++]), cursor);
            setTimeout(type, i < 30 ? 28 : 18);
        } else {
            /* remove cursor after 3s */
            setTimeout(function () {
                gsap.to(cursor, { opacity: 0, duration: 0.5, onComplete: function () { cursor.remove(); } });
            }, 3000);
        }
    }, 1350);
})();

/* ── 5. MOUSE PARALLAX ──────────────────────────────────── */
(function mouseParallax() {
    var sec = document.getElementById('home');
    if (!sec || window.innerWidth < 768) return;

    sec.addEventListener('mousemove', function (e) {
        var cx = sec.offsetWidth  / 2;
        var cy = sec.offsetHeight / 2;
        var mx = (e.clientX - cx) / cx;   /* -1 → 1 */
        var my = (e.clientY - cy) / cy;

        gsap.to('.hero-orb-1', { x: '+=' + (mx * 35), y: '+=' + (my * 22), duration: 3,   ease: 'power2.out', overwrite: 'auto' });
        gsap.to('.hero-orb-2', { x: '+=' + (mx * -25), y: '+=' + (my * -18), duration: 3.5, ease: 'power2.out', overwrite: 'auto' });
        gsap.to('.hero-grid',  { x: mx * 10, y: my * 7,  duration: 4,   ease: 'power2.out' });
        gsap.to('#home canvas',{ x: mx * 5,  y: my * 4,  duration: 5,   ease: 'power2.out' });
        gsap.to('.hero-ring-1',{ x: mx * 18, y: my * 14, duration: 3.5, ease: 'power2.out', overwrite: 'auto' });
        gsap.to('.hero-ring-2',{ x: mx * -12,y: my * -9, duration: 4.5, ease: 'power2.out', overwrite: 'auto' });
    });

    sec.addEventListener('mouseleave', function () {
        gsap.to('.hero-grid, #home canvas', { x: 0, y: 0, duration: 2, ease: 'power2.out' });
    });
})();

/* ── 6. SCROLL PARALLAX ON CONTENT ─────────────────────── */
gsap.to('#home .container', {
    scrollTrigger: {
        trigger: '#home',
        start:   'top top',
        end:     'bottom top',
        scrub:   1.2
    },
    y:       160,
    opacity: 0.25,
    ease:    'none'
});

/* canvas dims on scroll */
gsap.to('#heroCanvas', {
    scrollTrigger: {
        trigger: '#home',
        start:   'top top',
        end:     '60% top',
        scrub:   true
    },
    opacity: 0,
    ease: 'none'
});

/* ═══════════════════════════════════════════════════════════
   VISION SLIDER — GSAP POWERED
═══════════════════════════════════════════════════════════ */
(function () {
    var slides   = document.querySelectorAll('.vslide');
    var dots     = document.querySelectorAll('.vs-dot');
    var bar      = document.getElementById('vsBar');
    if (!slides.length || !bar) return;

    var DURATION  = 7;      /* seconds per slide */
    var current   = 0;
    var barTween  = null;
    var autoTimer = null;
    var isMobile  = window.innerWidth < 768;

    /* ── initial state: hide all non-active slides ── */
    slides.forEach(function (sl, i) {
        if (i !== 0 && !isMobile) {
            gsap.set(sl, { opacity: 0, display: 'none' });
        }
        /* pre-hide caption children so they can be revealed per slide */
        gsap.set(sl.querySelectorAll('.vs-num, .vs-tag, .vs-title, .vs-desc, .vs-pill'), {
            opacity: 0, y: 22
        });
    });

    /* animate in the first slide caption immediately */
    animateCaption(slides[0]);

    /* ── goTo: transition to slide index n ── */
    function goTo(n) {
        if (n === current) return;
        var prev = slides[current];
        var next = slides[n];

        /* direction cue */
        var dir = n > current ? 1 : -1;

        /* kill running bar tween & timer */
        if (barTween)  barTween.kill();
        if (autoTimer) clearTimeout(autoTimer);

        /* out: current visual fades left, caption fades up */
        gsap.to(prev.querySelector('.vs-visual'), {
            opacity: 0, x: dir * -55, filter: 'blur(5px)',
            duration: 0.55, ease: 'power2.in',
            onComplete: function () { gsap.set(prev, { display: 'none', opacity: 0 }); }
        });
        gsap.to(prev.querySelectorAll('.vs-num, .vs-tag, .vs-title, .vs-desc, .vs-pill'), {
            opacity: 0, y: -14,
            duration: 0.3, ease: 'power2.in', stagger: 0.04
        });

        /* in: next visual slides in from right/left */
        gsap.set(next, { display: 'flex', opacity: 1 });
        gsap.fromTo(next.querySelector('.vs-visual'),
            { opacity: 0, x: dir * 60, filter: 'blur(6px)' },
            { opacity: 1, x: 0,        filter: 'blur(0px)', duration: 0.75, ease: 'power3.out', delay: 0.25 }
        );
        gsap.set(next.querySelectorAll('.vs-num, .vs-tag, .vs-title, .vs-desc, .vs-pill'), { opacity: 0, y: 22 });
        animateCaption(next);

        /* dot active state */
        dots.forEach(function (d, i) { d.classList.toggle('active', i === n); });

        current = n;
        startBar();
        autoTimer = setTimeout(function () { goTo((current + 1) % slides.length); }, DURATION * 1000);
    }

    /* ── caption stagger reveal ── */
    function animateCaption(sl) {
        gsap.to(sl.querySelectorAll('.vs-num, .vs-tag, .vs-title, .vs-desc, .vs-pill'), {
            opacity: 1, y: 0,
            duration: 0.62,
            ease: 'power3.out',
            stagger: 0.09,
            delay: 0.42
        });
    }

    /* ── progress bar ── */
    function startBar() {
        gsap.set(bar, { width: '0%' });
        barTween = gsap.to(bar, { width: '100%', duration: DURATION, ease: 'none' });
    }

    /* ── dot click ── */
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            goTo(parseInt(dot.dataset.target, 10));
        });
    });

    /* ── keyboard arrow support ── */
    document.addEventListener('keydown', function (e) {
        var sec = document.querySelector('.vision-section');
        if (!sec) return;
        var rect = sec.getBoundingClientRect();
        if (rect.bottom < 0 || rect.top > window.innerHeight) return;
        if (e.key === 'ArrowRight') goTo((current + 1) % slides.length);
        if (e.key === 'ArrowLeft')  goTo((current - 1 + slides.length) % slides.length);
    });

    /* ── touch / swipe ── */
    (function swipe() {
        var sec = document.querySelector('.vision-section');
        if (!sec) return;
        var sx = 0;
        sec.addEventListener('touchstart', function (e) { sx = e.touches[0].clientX; }, { passive: true });
        sec.addEventListener('touchend', function (e) {
            var dx = e.changedTouches[0].clientX - sx;
            if (Math.abs(dx) < 40) return;
            goTo(dx < 0 ? (current + 1) % slides.length : (current - 1 + slides.length) % slides.length);
        }, { passive: true });
    })();

    /* ── start auto-advance ── */
    startBar();
    autoTimer = setTimeout(function () { goTo(1); }, DURATION * 1000);

    /* ── pause on hover ── */
    var section = document.querySelector('.vision-section');
    if (section) {
        section.addEventListener('mouseenter', function () {
            if (barTween) barTween.pause();
            clearTimeout(autoTimer);
        });
        section.addEventListener('mouseleave', function () {
            if (barTween) barTween.resume();
            autoTimer = setTimeout(function () { goTo((current + 1) % slides.length); },
                DURATION * 1000 * (1 - (barTween ? barTween.progress() : 0)));
        });
    }
})();
</script>
@endsection
