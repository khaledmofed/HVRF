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
    <img src="/images/logo.jpeg" alt="" class="hero-watermark" aria-hidden="true" style="z-index:1;">

    {{-- Content --}}
    <div class="container position-relative" style="z-index:3;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-8">
                @if($hero)

                {{-- Badge --}}
                <div class="gsap-hero-badge d-flex justify-content-center mb-4">
                    <span class="hero-badge">
                        <span class="badge-dot"></span>
                        {{ $hero->quote_text }}
                    </span>
                </div>

                {{-- Title — words split by JS --}}
                <h1 class="hero-title gsap-hero-title mb-4" data-title="{{ e($hero->headline) }}">
                    {{ $hero->headline }}
                </h1>

                {{-- Subtitle — typed by JS --}}
                <p class="hero-subtitle gsap-hero-sub" style="min-height:3.5rem;"
                   data-subtitle="{{ e($hero->subheadline) }}"></p>

                {{-- CTAs --}}
                <div class="d-flex gap-3 justify-content-center flex-wrap mb-5 gsap-hero-btns">
                    <a href="{{ $hero->cta_primary_url }}" class="btn-hvrf-primary">
                        {{ $hero->cta_primary_label }}
                        <i class="bi bi-arrow-right-short fs-5"></i>
                    </a>
                    <a href="{{ $hero->cta_secondary_url }}" class="btn-hvrf-outline">
                        {{ $hero->cta_secondary_label }}
                    </a>
                </div>
                @endif

                {{-- Stats --}}
                <div class="hero-stats-bar d-flex justify-content-center align-items-center gap-4 flex-wrap gsap-hero-stats">
                    <div class="stat-item">
                        <span class="stat-value" data-count="5000" data-suffix="+">5,000+</span>
                        <span class="stat-label">First Year Participants Target</span>
                    </div>
                    <div class="stat-sep d-none d-sm-block"></div>
                    <div class="stat-item">
                        <span class="stat-value" data-count="100000" data-suffix="+">100,000+</span>
                        <span class="stat-label">Users by Year 2 Goal</span>
                    </div>
                    <div class="stat-sep d-none d-sm-block"></div>
                    <div class="stat-item">
                        <span class="stat-value" data-count="5" data-suffix="">5</span>
                        <span class="stat-label">Core Pillars of Focus</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="position-absolute bottom-0 start-50 translate-middle-x pb-4 d-none d-md-block" style="z-index:4;">
        <div style="display:flex;flex-direction:column;align-items:center;gap:6px;animation:scrollBob 2s ease-in-out infinite;">
            <span style="font-size:0.68rem;color:rgba(255,255,255,0.4);letter-spacing:3px;text-transform:uppercase;">Scroll</span>
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
            <span class="section-label">Our Model</span>
            <h2 class="section-title" style="color:#fff; margin-top:.5rem;">How HVRF Operates</h2>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.55); max-width:560px; margin:.75rem auto 0;">
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
            <p style="font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:1.25rem;">Value Flow</p>
            <div class="eco-flow-row">
                <div class="eco-fn">Funding</div>
                <div class="eco-fc"><span></span><span></span><span></span><span></span><span></span></div>
                <div class="eco-fn">Research</div>
                <div class="eco-fc"><span></span><span></span><span></span><span></span><span></span></div>
                <div class="eco-fn">Communities</div>
                <div class="eco-fc"><span></span><span></span><span></span><span></span><span></span></div>
                <div class="eco-fn">Human Impact</div>
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
        nodes.forEach(function (n) {
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
            {{-- SVG 2: Intelligence Meets Humanity — person with report --}}
            <svg viewBox="0 0 520 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="s2bt" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#4ECDC4" stop-opacity="0.95"/>
                        <stop offset="100%" stop-color="#4ECDC4" stop-opacity="0.38"/>
                    </linearGradient>
                    <linearGradient id="s2bg" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#C9A96E" stop-opacity="0.9"/>
                        <stop offset="100%" stop-color="#C9A96E" stop-opacity="0.35"/>
                    </linearGradient>
                </defs>

                <!-- background glow -->
                <ellipse cx="260" cy="200" rx="215" ry="155" fill="rgba(78,205,196,0.04)"/>

                <!-- ══ DOCUMENT / CLIPBOARD (right) ══ -->
                <rect x="262" y="50" width="200" height="272" rx="14"
                      fill="rgba(8,22,42,0.92)" stroke="#4ECDC4" stroke-opacity="0.42" stroke-width="1.5"/>
                <!-- top highlight -->
                <rect x="276" y="50" width="125" height="1.5" rx="1" fill="rgba(78,205,196,0.28)"/>
                <!-- clip at top -->
                <rect x="332" y="40" width="60" height="22" rx="8"
                      fill="rgba(8,22,42,0.95)" stroke="#4ECDC4" stroke-opacity="0.5" stroke-width="1.2"/>
                <rect x="348" y="47" width="28" height="9" rx="3" fill="rgba(78,205,196,0.22)"/>

                <!-- header lines -->
                <rect x="280" y="86" width="118" height="7" rx="3.5" fill="rgba(255,255,255,0.26)"/>
                <rect x="280" y="100" width="80" height="4.5" rx="2" fill="rgba(255,255,255,0.12)"/>

                <!-- chart area -->
                <rect x="280" y="118" width="164" height="108" rx="5"
                      fill="rgba(255,255,255,0.03)" stroke="rgba(255,255,255,0.07)" stroke-width="1"/>
                <!-- axes -->
                <line x1="296" y1="121" x2="296" y2="222" stroke="rgba(255,255,255,0.13)" stroke-width="1"/>
                <line x1="296" y1="222" x2="440" y2="222" stroke="rgba(255,255,255,0.13)" stroke-width="1"/>
                <!-- grid -->
                <line x1="296" y1="196" x2="440" y2="196" stroke="rgba(255,255,255,0.06)" stroke-width="0.8" stroke-dasharray="3,5"/>
                <line x1="296" y1="170" x2="440" y2="170" stroke="rgba(255,255,255,0.06)" stroke-width="0.8" stroke-dasharray="3,5"/>
                <line x1="296" y1="144" x2="440" y2="144" stroke="rgba(255,255,255,0.06)" stroke-width="0.8" stroke-dasharray="3,5"/>

                <!-- bars (growing left→right) -->
                <rect x="308" y="188" width="16" height="34" rx="3" fill="url(#s2bt)"/>
                <rect x="330" y="174" width="16" height="48" rx="3" fill="url(#s2bt)"/>
                <rect x="352" y="158" width="16" height="64" rx="3" fill="url(#s2bt)"/>
                <rect x="374" y="165" width="16" height="57" rx="3" fill="url(#s2bg)"/>
                <rect x="396" y="146" width="16" height="76" rx="3" fill="url(#s2bt)"/>
                <rect x="418" y="133" width="16" height="89" rx="3" fill="url(#s2bt)"/>

                <!-- trend line -->
                <polyline points="316,185 338,171 360,155 382,162 404,143 426,130"
                          stroke="#C9A96E" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none" opacity="0.85"/>
                <circle cx="316" cy="185" r="2.5" fill="#C9A96E" opacity="0.82"/>
                <circle cx="338" cy="171" r="2.5" fill="#C9A96E" opacity="0.82"/>
                <circle cx="360" cy="155" r="3"   fill="#C9A96E" opacity="1"    class="vs-node-pulse-slow"/>
                <circle cx="382" cy="162" r="2.5" fill="#C9A96E" opacity="0.82"/>
                <circle cx="404" cy="143" r="3"   fill="#C9A96E" opacity="0.9"  class="vs-node-pulse"/>
                <circle cx="426" cy="130" r="2.5" fill="#C9A96E" opacity="0.82"/>

                <!-- data rows -->
                <rect x="280" y="240" width="132" height="5" rx="2.5" fill="rgba(255,255,255,0.22)"/>
                <rect x="280" y="252" width="90"  height="4" rx="2"   fill="rgba(255,255,255,0.12)"/>
                <rect x="280" y="263" width="110" height="4" rx="2"   fill="rgba(78,205,196,0.4)"/>
                <rect x="280" y="274" width="68"  height="4" rx="2"   fill="rgba(255,255,255,0.1)"/>
                <rect x="280" y="285" width="95"  height="4" rx="2"   fill="rgba(201,169,110,0.35)"/>

                <!-- up-arrow badge -->
                <rect x="400" y="240" width="50" height="50" rx="10"
                      fill="rgba(78,205,196,0.1)" stroke="#4ECDC4" stroke-opacity="0.38" stroke-width="1"/>
                <polyline points="413,268 425,256 437,268" stroke="#4ECDC4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.85"/>
                <line x1="425" y1="256" x2="425" y2="280" stroke="#4ECDC4" stroke-width="2" stroke-linecap="round" opacity="0.85"/>

                <!-- ══ HUMAN FIGURE (left) ══ -->
                <ellipse cx="133" cy="198" rx="74" ry="112" fill="rgba(78,205,196,0.055)"/>

                <!-- head -->
                <circle cx="133" cy="72" r="28" fill="rgba(78,205,196,0.14)" stroke="#4ECDC4" stroke-opacity="0.55" stroke-width="1.5"/>
                <!-- eyes -->
                <circle cx="125" cy="70" r="3"   fill="#4ECDC4" opacity="0.65"/>
                <circle cx="141" cy="70" r="3"   fill="#4ECDC4" opacity="0.65"/>
                <!-- smile -->
                <path d="M126 82 Q133 88 140 82" stroke="#4ECDC4" stroke-opacity="0.52" stroke-width="1.3" stroke-linecap="round" fill="none"/>

                <!-- neck -->
                <rect x="127" y="100" width="12" height="18" rx="5" fill="rgba(78,205,196,0.18)"/>

                <!-- shoulders arc -->
                <path d="M90 130 Q112 118 133 118 Q154 118 176 130"
                      stroke="#4ECDC4" stroke-opacity="0.42" stroke-width="2" stroke-linecap="round" fill="none"/>

                <!-- torso -->
                <path d="M95 134 L171 134 L163 244 L103 244 Z"
                      fill="rgba(78,205,196,0.13)" stroke="#4ECDC4" stroke-opacity="0.36" stroke-width="1.2" stroke-linejoin="round"/>

                <!-- left arm (relaxed, down) -->
                <path d="M95 150 Q73 178 70 215"
                      stroke="#4ECDC4" stroke-opacity="0.36" stroke-width="2" stroke-linecap="round" fill="none"/>

                <!-- right arm (extended, pointing at report) -->
                <path d="M171 150 Q210 155 259 170"
                      stroke="#4ECDC4" stroke-opacity="0.58" stroke-width="2.2" stroke-linecap="round" fill="none"/>
                <!-- pointer dot / hand -->
                <circle cx="260" cy="171" r="5.5" fill="rgba(78,205,196,0.28)" stroke="#4ECDC4" stroke-opacity="0.7" stroke-width="1.3" class="vs-node-pulse"/>

                <!-- legs -->
                <path d="M103 244 L93 344 L123 344 L133 280 L143 344 L173 344 L163 244 Z"
                      fill="rgba(78,205,196,0.1)" stroke="#4ECDC4" stroke-opacity="0.28" stroke-width="1.1" stroke-linejoin="round"/>

                <!-- feet -->
                <rect x="85"  y="340" width="38" height="9" rx="4.5" fill="rgba(78,205,196,0.22)"/>
                <rect x="143" y="340" width="38" height="9" rx="4.5" fill="rgba(78,205,196,0.22)"/>

                <!-- dashed connection arm → doc -->
                <line x1="265" y1="170" x2="262" y2="170"
                      stroke="#4ECDC4" stroke-opacity="0.45" stroke-width="1.2" stroke-dasharray="5,4"/>

                <!-- floating metric tags -->
                <rect x="38" y="98"  width="46" height="24" rx="7" fill="rgba(78,205,196,0.1)"   stroke="#4ECDC4"  stroke-opacity="0.32" stroke-width="1"/>
                <line x1="48" y1="108" x2="74" y2="108" stroke="#4ECDC4"  stroke-opacity="0.55" stroke-width="1.5"/>
                <line x1="48" y1="114" x2="66" y2="114" stroke="#4ECDC4"  stroke-opacity="0.32" stroke-width="1"/>

                <rect x="36" y="244" width="52" height="24" rx="7" fill="rgba(201,169,110,0.1)" stroke="#C9A96E" stroke-opacity="0.32" stroke-width="1"/>
                <line x1="46" y1="254" x2="78" y2="254" stroke="#C9A96E" stroke-opacity="0.55" stroke-width="1.5"/>
                <line x1="46" y1="260" x2="64" y2="260" stroke="#C9A96E" stroke-opacity="0.32" stroke-width="1"/>

                <!-- decorative particles -->
                <circle cx="52"  cy="52"  r="2.5" fill="#4ECDC4" opacity="0.36" class="vs-drift-1"/>
                <circle cx="225" cy="40"  r="2"   fill="#4ECDC4" opacity="0.30" class="vs-drift-2"/>
                <circle cx="493" cy="78"  r="2"   fill="#C9A96E" opacity="0.33" class="vs-drift-3"/>
                <circle cx="490" cy="315" r="2.5" fill="#C9A96E" opacity="0.36" class="vs-drift-1"/>
                <circle cx="40"  cy="352" r="2"   fill="#4ECDC4" opacity="0.28" class="vs-drift-2"/>
                <circle cx="238" cy="358" r="1.5" fill="#4ECDC4" opacity="0.26" class="vs-drift-3"/>
                <circle cx="178" cy="44"  r="2"   fill="#C9A96E" opacity="0.33" class="vs-drift-1"/>
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
            <div class="vs-tag">{{ $slide->tag }}</div>
            <h2 class="vs-title">{{ $slide->title }}</h2>
            <p class="vs-desc">{{ $slide->description }}</p>
            <span class="vs-pill"><i class="bi {{ $slide->pill_icon }}"></i>{{ $slide->pill_label }}</span>
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
            <span class="section-label">Who We Are</span>
            <h2 class="section-title mt-2">About the Foundation</h2>
        </div>

        @if($about)
        {{-- 4 Wise-style cards --}}
        <div class="row g-4 gsap-stagger">

            {{-- Card 1: Philosophy — dark navy --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--dark h-100">
                    <span class="about-card-label">Philosophy</span>
                    <div class="about-card-quote">&ldquo;</div>
                    <p class="about-card-body" style="font-style:italic;">"{{ $about->philosophy_body }}"</p>
                    <small class="about-card-attr">— {{ $about->philosophy_title }}</small>
                </div>
            </div>

            {{-- Card 2: Vision — teal tint --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--teal h-100">
                    <span class="about-card-label">Vision</span>
                    <div class="about-card-icon"><i class="bi bi-eye-fill"></i></div>
                    <h3 class="about-card-title">{{ $about->vision_title }}</h3>
                    <p class="about-card-body">{{ $about->vision_body }}</p>
                </div>
            </div>

            {{-- Card 3: Mission — white --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--white h-100">
                    <span class="about-card-label">Mission</span>
                    <div class="about-card-icon"><i class="bi bi-rocket-takeoff-fill"></i></div>
                    <h3 class="about-card-title">{{ $about->mission_title }}</h3>
                    <p class="about-card-body">{{ $about->mission_body }}</p>
                </div>
            </div>

            {{-- Card 4: Why Now — gold tint --}}
            <div class="col-lg-3 col-md-6 gsap-stagger-child">
                <div class="about-card about-card--gold h-100">
                    <span class="about-card-label">Why Now</span>
                    <div class="about-card-icon"><i class="bi bi-hourglass-split"></i></div>
                    <h3 class="about-card-title">The Urgency</h3>
                    <p class="about-card-body">The window to shape a human-centered future is narrow. The choices made today define the next century.</p>
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
            <span class="section-label mb-3 d-flex justify-content-center">Our Work</span>
            <h2 class="section-title mb-3">What the Foundation Will Do</h2>
            <p class="section-subtitle">Five pillars to protect and amplify human value in the age of autonomous intelligence.</p>
        </div>

        <div class="row g-4 gsap-stagger">
            @foreach($focusAreas as $index => $area)
            <div class="col-lg-4 col-md-6 gsap-stagger-child {{ $loop->last && $loop->count % 2 !== 0 ? 'offset-lg-0' : '' }}">
                <div class="focus-card h-100">
                    <!-- <div class="focus-num-badge">{{ $area->number }}</div> -->
                    <div class="focus-icon-wrap">
                        <i class="bi {{ $area->icon_name }}"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="font-size: 1.05rem; color: var(--hvrf-navy);">{{ $area->title }}</h4>
                    <p class="small mb-3" style="color: var(--hvrf-gray); line-height: 1.7;">{{ $area->description }}</p>
                    @if($area->examples_json)
                    <ul class="focus-examples">
                        @foreach($area->examples_json as $example)
                        <li>{{ $example }}</li>
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
            <span class="section-label mb-3 d-flex justify-content-center">First 3 Years</span>
            <h2 class="section-title mb-3">Our First 3 Years of Focus</h2>
            <p class="section-subtitle">Focused investment in two foundational pillars — Human Connection and Human Purpose.</p>
        </div>

        <div class="d-flex justify-content-center mb-5 gsap-reveal" data-dir="up" data-delay="0.1">
            <ul class="nav pill-tabs" id="programTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-connection" data-bs-toggle="tab" data-bs-target="#pane-connection" type="button" role="tab">
                        <i class="bi bi-people-fill me-2"></i>Human Connection
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-purpose" data-bs-toggle="tab" data-bs-target="#pane-purpose" type="button" role="tab">
                        <i class="bi bi-bullseye me-2"></i>Human Purpose
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
                            <h4 class="mb-2" style="font-size: 1.1rem; color: var(--hvrf-navy);">{{ $program->title }}</h4>
                            <p class="small mb-3" style="color: var(--hvrf-gray); line-height: 1.7;">{{ $program->description }}</p>
                            @foreach($program->features_json ?? [] as $feature)
                            <div class="feature-item">
                                <h6>{{ $feature['title'] ?? '' }}</h6>
                                <p class="small mb-1" style="color: var(--hvrf-gray);">{{ $feature['description'] ?? '' }}</p>
                                @if(!empty($feature['items']))
                                <ul class="feature-items-list">
                                    @foreach($feature['items'] as $item)
                                    <li>{{ $item }}</li>
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
                            <h4 class="mb-2" style="font-size: 1.1rem; color: var(--hvrf-navy);">{{ $program->title }}</h4>
                            <p class="small mb-3" style="color: var(--hvrf-gray); line-height: 1.7;">{{ $program->description }}</p>
                            @foreach($program->features_json ?? [] as $feature)
                            <div class="feature-item">
                                <h6>{{ $feature['title'] ?? '' }}</h6>
                                <p class="small mb-1" style="color: var(--hvrf-gray);">{{ $feature['description'] ?? '' }}</p>
                                @if(!empty($feature['items']))
                                <ul class="feature-items-list">
                                    @foreach($feature['items'] as $item)
                                    <li>{{ $item }}</li>
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
        @php $allInvolved = $connectionPrograms->first()?->how_involved_json ?? []; @endphp
        @if(count($allInvolved))
        <div class="involved-box mt-5 gsap-reveal" data-dir="up" data-delay="0.1">
            <div class="row align-items-center g-4">
                <div class="col-lg-3">
                    <h5 class="text-white mb-1" style="font-family:'Playfair Display',serif;">How HVRF Gets Involved</h5>
                    <p class="small mb-0" style="color: rgba(255,255,255,0.45);">Our commitment across all programs</p>
                </div>
                <div class="col-lg-9">
                    <div class="row g-2">
                        @foreach($allInvolved as $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="involved-item">
                                <div class="involved-check"><i class="bi bi-check-lg"></i></div>
                                <span class="small text-white" style="opacity: 0.85;">{{ $item }}</span>
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
            <span class="section-label mb-3 d-flex justify-content-center">Strategic Plan</span>
            <h2 class="section-title mb-3">3-Year Strategic Roadmap</h2>
            <p class="section-subtitle">A phased plan to build the infrastructure for sustained human value.</p>
        </div>

        <div class="row g-5">
            {{-- Connection Roadmap --}}
            <div class="col-lg-6 gsap-reveal" data-dir="left" data-delay="0.05">
                <div class="roadmap-section-head">
                    <div class="roadmap-section-icon"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="font-size: 1rem; color: var(--hvrf-navy);">Human Connection</h5>
                        <span class="small" style="color: var(--hvrf-gray);">Building belonging at scale</span>
                    </div>
                </div>
                <div class="roadmap-timeline">
                    @foreach($connectionRoadmap as $yearData)
                    <div class="roadmap-item">
                        <div class="roadmap-card">
                            <div class="roadmap-year-pill">
                                <i class="bi bi-calendar3"></i>
                                {{ $yearData->year_label }}
                            </div>
                            <h6 class="fw-bold mb-2" style="color: var(--hvrf-navy); font-size: 0.92rem;">{{ $yearData->goal }}</h6>
                            <div class="row g-2 mt-1">
                                <div class="col-sm-6">
                                    <p class="small fw-semibold mb-1" style="color: var(--hvrf-teal); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">Projects</p>
                                    <ul class="roadmap-list">
                                        @foreach($yearData->projects_json as $p)<li>{{ $p }}</li>@endforeach
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <p class="small fw-semibold mb-1" style="color: var(--hvrf-gold); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">KPIs</p>
                                    <ul class="roadmap-list kpi-list">
                                        @foreach($yearData->kpis_json as $k)<li>{{ $k }}</li>@endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Purpose Roadmap --}}
            <div class="col-lg-6 gsap-reveal" data-dir="right" data-delay="0.05">
                <div class="roadmap-section-head">
                    <div class="roadmap-section-icon"><i class="bi bi-bullseye"></i></div>
                    <div>
                        <h5 class="mb-0 fw-bold" style="font-size: 1rem; color: var(--hvrf-navy);">Human Purpose</h5>
                        <span class="small" style="color: var(--hvrf-gray);">Creating meaningful contribution</span>
                    </div>
                </div>
                <div class="roadmap-timeline">
                    @foreach($purposeRoadmap as $yearData)
                    <div class="roadmap-item">
                        <div class="roadmap-card">
                            <div class="roadmap-year-pill">
                                <i class="bi bi-calendar3"></i>
                                {{ $yearData->year_label }}
                            </div>
                            <h6 class="fw-bold mb-2" style="color: var(--hvrf-navy); font-size: 0.92rem;">{{ $yearData->goal }}</h6>
                            <div class="row g-2 mt-1">
                                <div class="col-sm-6">
                                    <p class="small fw-semibold mb-1" style="color: var(--hvrf-teal); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">Projects</p>
                                    <ul class="roadmap-list">
                                        @foreach($yearData->projects_json as $p)<li>{{ $p }}</li>@endforeach
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <p class="small fw-semibold mb-1" style="color: var(--hvrf-gold); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">KPIs</p>
                                    <ul class="roadmap-list kpi-list">
                                        @foreach($yearData->kpis_json as $k)<li>{{ $k }}</li>@endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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
     TEAM
═══════════════════════════════════════════ --}}
<section id="team" style="padding: 6rem 0; background: var(--hvrf-light);">
    <div class="container">
        <div class="text-center mb-5 gsap-reveal" data-dir="up">
            <span class="section-label mb-3 d-flex justify-content-center">The People</span>
            <h2 class="section-title mb-3">Our Team</h2>
            <p class="section-subtitle">An extraordinary group of humans committed to shaping a better future.</p>
        </div>

        @if($team->count())
        <div class="row g-4 justify-content-center gsap-stagger">
            @foreach($team as $member)
            <div class="col-xl-3 col-lg-4 col-md-6 gsap-stagger-child">
                <div class="team-card">
                    <div class="team-photo-wrap mx-auto">
                        @if($member->photo_url)
                        <img src="{{ Str::startsWith($member->photo_url, 'http') ? $member->photo_url : asset('storage/' . $member->photo_url) }}"
                             alt="{{ $member->name }}" class="team-photo">
                        @else
                        <div class="team-photo-placeholder">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        @endif
                        <div class="team-ring"></div>
                    </div>
                    <h5 class="fw-bold mb-1 mt-1" style="font-size: 1rem; color: var(--hvrf-navy);">{{ $member->name }}</h5>
                    <p class="small fw-semibold mb-2" style="color: var(--hvrf-teal); font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.5px;">{{ $member->role }}</p>
                    <p class="small mb-3" style="color: var(--hvrf-gray); line-height: 1.65; font-size: 0.83rem;">{{ Str::limit($member->bio, 120) }}</p>
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
            <p style="color: var(--hvrf-gray);">Team coming soon — we are building an extraordinary group of humans.</p>
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
                <span class="section-label mb-4 d-flex justify-content-center" style="color: var(--hvrf-teal);">Get Involved</span>
                <h2 class="section-title light mb-4">Join the Movement to<br>Preserve Human Value</h2>
                <p class="mb-5" style="color: rgba(255,255,255,0.65); font-size: 1.05rem; line-height: 1.8;">
                    Whether you're a researcher, philanthropist, technologist, or simply a human who cares — there's a place for you at HVRF.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#contact" class="btn-hvrf-primary">
                        Partner With Us <i class="bi bi-arrow-right-short fs-5"></i>
                    </a>
                    <button type="button" class="btn-hvrf-outline" data-bs-toggle="modal" data-bs-target="#newsletterModal">
                        <i class="bi bi-bell"></i> Subscribe to Updates
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
                    <h5 class="modal-title" id="newsletterModalLabel" style="font-family: 'Playfair Display', serif; color: var(--hvrf-navy);">
                        Stay Connected with HVRF
                    </h5>
                    <p class="small mb-0" style="color: var(--hvrf-gray);">Receive updates on our programs, research, and mission.</p>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4 pt-3">
                <form class="newsletter-ajax-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Jane Smith">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                    </div>
                    <button type="submit" class="btn-hvrf-submit btn w-100">Subscribe to Updates</button>
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
            <span class="section-label mb-3 d-flex justify-content-center">Get In Touch</span>
            <h2 class="section-title mb-3">Contact Us</h2>
            <p class="section-subtitle">We believe in the power of human connection. Reach out and let's build a better future together.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 gsap-reveal" data-dir="left" data-delay="0.1">
                <div class="contact-info-panel h-100">
                    <h5 class="text-white fw-bold mb-1" style="font-family:'Playfair Display',serif; font-size: 1.15rem;">HVRF</h5>
                    <p class="small mb-4" style="color: rgba(255,255,255,0.45);">Human Value Reserve Foundation</p>

                    <div class="contact-info-item">
                        <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <div class="small fw-semibold text-white">Email</div>
                            <div class="small" style="color: rgba(255,255,255,0.55);">{{ $settings['contact_email'] ?? 'info@hvrf.org' }}</div>
                        </div>
                    </div>

                    @if(!empty($settings['contact_phone']))
                    <div class="contact-info-item">
                        <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <div class="small fw-semibold text-white">Phone</div>
                            <div class="small" style="color: rgba(255,255,255,0.55);">{{ $settings['contact_phone'] }}</div>
                        </div>
                    </div>
                    @endif

                    <div class="contact-info-item">
                        <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <div class="small fw-semibold text-white">Location</div>
                            <div class="small" style="color: rgba(255,255,255,0.55);">{{ $settings['contact_location'] ?? 'Global — Remote First' }}</div>
                        </div>
                    </div>

                    <div class="mt-auto pt-3" style="border-top: 1px solid rgba(255,255,255,0.07); margin-top: 1.5rem;">
                        <p class="small mb-3" style="color: rgba(255,255,255,0.4); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">Follow Us</p>
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
                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Jane Smith" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="you@example.com" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="How can we collaborate?" required>
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Tell us about your interest in HVRF..." required>{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn-hvrf-submit btn">
                            Send Message <i class="bi bi-send ms-2"></i>
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

/* ── 1. CANVAS — AI ⟷ HUMANITY (simultaneous, left/right) ── */
(function () {
    var canvas = document.getElementById('heroCanvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var W, H, RAF = null;

    var TEAL = '78,205,196';
    var GOLD  = '201,169,110';

    /*
     * Layout: LEFT zone (0–33%) = human circles (gold/warm)
     *         RIGHT zone (63%–100%) = AI network (teal/cool)
     *         CENTER (33–63%) = clear for hero text
     *         BRIDGES = dashed lines + data packets crossing center
     */
    var L = 0.33;   /* left zone right edge  */
    var R = 0.63;   /* right zone left edge  */

    var humanCircles = [], aiNodes = [], packets = [], pulses = [], labels = [];
    var CITY = null;

    var H_LABELS = ['Family','Elderly Care','Mentorship','Creativity','Communities',
                    'Connection','Dignity','Purpose','Belonging'];
    var A_LABELS = ['agent_01 → active','sync: 98%','model: online','inference: ok',
                    'processing...','pattern: found','data: streaming','system: ready'];

    /* ── setup ── */
    function resize() {
        W = canvas.width  = canvas.parentElement.offsetWidth;
        H = canvas.height = canvas.parentElement.offsetHeight;
        CITY = null;
        build();
    }

    function build() {
        humanCircles = []; aiNodes = []; packets = []; pulses = []; labels = [];

        /* Human circles — left zone */
        var hCount = Math.max(4, Math.min(7, Math.floor(H / 120)));
        for (var i = 0; i < hCount; i++) {
            humanCircles.push({
                x:  W * 0.04 + Math.random() * W * (L - 0.06),
                y:  H * 0.08 + Math.random() * H * 0.84,
                vx: (Math.random() - 0.5) * 0.13,
                vy: (Math.random() - 0.5) * 0.13,
                r:  Math.random() * 26 + 18,
                col: Math.random() < 0.65 ? GOLD : TEAL,
                phase: Math.random() * Math.PI * 2,
                spd:   0.55 + Math.random() * 0.75,
                bright: 1,
                lt: Math.floor(Math.random() * 350),
                pt: Math.floor(Math.random() * 420)
            });
        }

        /* AI nodes — right zone */
        var aCount = Math.min(Math.floor(W * H / 10000), 48);
        for (var i = 0; i < aCount; i++) {
            var hub = Math.random() < 0.20;
            aiNodes.push({
                x:  W * R + Math.random() * W * (1 - R - 0.02),
                y:  Math.random() * H,
                vx: (Math.random() - 0.5) * 0.20,
                vy: (Math.random() - 0.5) * 0.20,
                r:  hub ? Math.random() * 1.8 + 2.2 : Math.random() * 1.0 + 0.5,
                col: Math.random() < 0.82 ? TEAL : GOLD,
                hub: hub,
                pt: Math.floor(Math.random() * 220),
                lt: Math.floor(Math.random() * 300)
            });
        }
    }

    /* ── City skyline in right zone (pre-computed, no per-frame random) ── */
    function buildCity() {
        CITY = [];
        var zoneX = W * R, zoneW = W * (1 - R);
        var cols = 9;
        var cw = zoneW / cols;
        for (var c = 0; c < cols; c++) {
            var bh = H * (0.09 + ((c * 5 + 3) % 9) * 0.016);
            var b = {
                x: zoneX + c * cw + cw * 0.08,
                y: H - bh,
                w: cw * 0.84, h: bh, lit: []
            };
            for (var wr = 0; wr < 5; wr++)
                for (var wc = 0; wc < 3; wc++)
                    if (Math.random() < 0.35) b.lit.push({ r: wr, c: wc });
            CITY.push(b);
        }
    }

    function drawCity() {
        if (!CITY) buildCity();
        for (var i = 0; i < CITY.length; i++) {
            var b = CITY[i];
            /* building face */
            ctx.fillStyle   = 'rgba(' + TEAL + ',0.055)';
            ctx.strokeStyle = 'rgba(' + TEAL + ',0.13)';
            ctx.lineWidth   = 0.5;
            ctx.beginPath(); ctx.rect(b.x, b.y, b.w, b.h);
            ctx.fill(); ctx.stroke();
            /* lit windows */
            for (var wi = 0; wi < b.lit.length; wi++) {
                ctx.fillStyle = 'rgba(' + GOLD + ',0.28)';
                ctx.fillRect(
                    b.x + b.w * 0.10 + b.lit[wi].c * b.w * 0.28,
                    b.y + b.h * 0.08 + b.lit[wi].r * b.h * 0.17,
                    b.w * 0.13, b.h * 0.09
                );
            }
        }
    }

    function drawGlow(x, y, r, col, alpha) {
        alpha = Math.max(0, Math.min(1, alpha));
        var g = ctx.createRadialGradient(x, y, 0, x, y, r);
        g.addColorStop(0,    'rgba(' + col + ',' + alpha + ')');
        g.addColorStop(0.45, 'rgba(' + col + ',' + (alpha * 0.48) + ')');
        g.addColorStop(1,    'rgba(' + col + ',0)');
        ctx.beginPath(); ctx.arc(x, y, r, 0, Math.PI * 2);
        ctx.fillStyle = g; ctx.fill();
    }

    /* ── main loop ── */
    function tick(ts) {
        RAF = requestAnimationFrame(tick);
        ctx.clearRect(0, 0, W, H);

        /* Subtle full-width scan beam */
        var sy = ((ts / 5500) * H) % H;
        var sg = ctx.createLinearGradient(0, sy - 55, 0, sy + 55);
        sg.addColorStop(0,   'rgba(' + TEAL + ',0)');
        sg.addColorStop(0.5, 'rgba(' + TEAL + ',0.011)');
        sg.addColorStop(1,   'rgba(' + TEAL + ',0)');
        ctx.fillStyle = sg; ctx.fillRect(0, sy - 55, W, 110);

        /* ── City skyline (right zone background) ── */
        drawCity();

        /* ── AI node connections (right zone) ── */
        var CDIST = Math.min(W * 0.20, 175);
        for (var i = 0; i < aiNodes.length - 1; i++) {
            for (var j = i + 1; j < aiNodes.length; j++) {
                var a = aiNodes[i], b = aiNodes[j];
                var dx = a.x - b.x, dy = a.y - b.y, d = Math.sqrt(dx*dx + dy*dy);
                if (d < CDIST) {
                    ctx.beginPath(); ctx.moveTo(a.x, a.y); ctx.lineTo(b.x, b.y);
                    ctx.strokeStyle = 'rgba(' + TEAL + ',' + ((1 - d/CDIST) * 0.12) + ')';
                    ctx.lineWidth = 0.55; ctx.stroke();
                    if (Math.random() < 0.00020 && packets.length < 55) {
                        packets.push({ ax: a.x, ay: a.y, bx: b.x, by: b.y,
                            t: 0, spd: 0.006 + Math.random() * 0.007,
                            col: Math.random() < 0.7 ? TEAL : GOLD, bridge: false, tgt: null });
                    }
                }
            }
        }

        /* ── Bridge connections (AI hub → human circle, across center) ── */
        var hubs = [];
        for (var i = 0; i < aiNodes.length; i++) { if (aiNodes[i].hub) hubs.push(aiNodes[i]); }
        hubs.sort(function(a, b) { return a.x - b.x; });
        var bridgeCount = Math.min(3, hubs.length, humanCircles.length);
        for (var bi = 0; bi < bridgeCount; bi++) {
            var hub = hubs[bi];
            /* find closest human circle vertically */
            var best = humanCircles[0], bestD = 99999;
            for (var ci = 0; ci < humanCircles.length; ci++) {
                var dd = Math.abs(hub.y - humanCircles[ci].y);
                if (dd < bestD) { bestD = dd; best = humanCircles[ci]; }
            }
            /* dashed bridge line */
            ctx.beginPath(); ctx.moveTo(hub.x, hub.y); ctx.lineTo(best.x, best.y);
            ctx.strokeStyle = 'rgba(' + TEAL + ',0.048)';
            ctx.setLineDash([5, 7]); ctx.lineWidth = 0.65; ctx.stroke();
            ctx.setLineDash([]);

            /* bridge packet (both directions) */
            if (Math.random() < 0.0014 && packets.length < 60) {
                var toHuman = Math.random() < 0.5;
                packets.push({
                    ax: toHuman ? hub.x : best.x, ay: toHuman ? hub.y : best.y,
                    bx: toHuman ? best.x : hub.x, by: toHuman ? best.y : hub.y,
                    t: 0, spd: 0.003 + Math.random() * 0.004,
                    col: toHuman ? TEAL : GOLD,
                    bridge: true, tgt: toHuman ? best : null
                });
            }
        }

        /* ── Pulse rings ── */
        for (var i = pulses.length - 1; i >= 0; i--) {
            var pu = pulses[i]; pu.r += 0.88; pu.a *= 0.960;
            if (pu.a < 0.006) { pulses.splice(i, 1); continue; }
            ctx.beginPath(); ctx.arc(pu.x, pu.y, pu.r, 0, Math.PI*2);
            ctx.strokeStyle = 'rgba(' + pu.col + ',' + pu.a + ')';
            ctx.lineWidth = 0.8; ctx.stroke();
        }

        /* ── Data packets ── */
        for (var i = packets.length - 1; i >= 0; i--) {
            var pk = packets[i]; pk.t += pk.spd;
            if (pk.t >= 1) {
                if (pk.bridge && pk.tgt) pk.tgt.bright = Math.min(pk.tgt.bright + 0.45, 1.85);
                packets.splice(i, 1); continue;
            }
            var px = pk.ax + (pk.bx - pk.ax)*pk.t, py = pk.ay + (pk.by - pk.ay)*pk.t;
            var pa = Math.sin(pk.t * Math.PI) * (pk.bridge ? 0.88 : 0.90);
            ctx.beginPath(); ctx.arc(px, py, pk.bridge ? 2.2 : 1.7, 0, Math.PI*2);
            ctx.fillStyle = 'rgba(' + pk.col + ',' + pa + ')'; ctx.fill();
            var t2 = Math.max(pk.t - 0.07, 0);
            ctx.beginPath(); ctx.arc(pk.ax+(pk.bx-pk.ax)*t2, pk.ay+(pk.by-pk.ay)*t2, 0.8, 0, Math.PI*2);
            ctx.fillStyle = 'rgba(' + pk.col + ',' + (pa * 0.30) + ')'; ctx.fill();
        }

        /* ── AI nodes ── */
        for (var i = 0; i < aiNodes.length; i++) {
            var n = aiNodes[i];
            n.x += n.vx; n.y += n.vy;
            if (n.x < W*R+4)  { n.x = W*R+4;  n.vx =  Math.abs(n.vx); }
            if (n.x > W-6)    { n.x = W-6;    n.vx = -Math.abs(n.vx); }
            if (n.y < 6)      { n.y = 6;      n.vy =  Math.abs(n.vy); }
            if (n.y > H-6)    { n.y = H-6;    n.vy = -Math.abs(n.vy); }
            if (n.hub) {
                n.pt--;
                if (n.pt <= 0) {
                    pulses.push({ x: n.x, y: n.y, r: n.r+1, a: 0.5, col: n.col });
                    n.pt = 160 + Math.floor(Math.random() * 240);
                }
                n.lt--;
                if (n.lt <= 0 && labels.length < 7) {
                    labels.push({ x: n.x, y: n.y,
                        text: A_LABELS[Math.floor(Math.random() * A_LABELS.length)],
                        col: TEAL, life: 1, dec: 0.003 + Math.random() * 0.003 });
                    n.lt = 260 + Math.floor(Math.random() * 380);
                }
                var gn = ctx.createRadialGradient(n.x, n.y, 0, n.x, n.y, n.r*5.5);
                gn.addColorStop(0, 'rgba(' + n.col + ',0.30)');
                gn.addColorStop(1, 'rgba(' + n.col + ',0)');
                ctx.beginPath(); ctx.arc(n.x, n.y, n.r*5.5, 0, Math.PI*2);
                ctx.fillStyle = gn; ctx.fill();
            }
            ctx.beginPath(); ctx.arc(n.x, n.y, n.r, 0, Math.PI*2);
            ctx.fillStyle = 'rgba(' + n.col + ',0.58)'; ctx.fill();
        }

        /* ── Human circles (left zone) ── */
        for (var i = 0; i < humanCircles.length; i++) {
            var hc = humanCircles[i];
            hc.x += hc.vx; hc.y += hc.vy;
            if (hc.x < hc.r+6)          { hc.x = hc.r+6;          hc.vx =  Math.abs(hc.vx); }
            if (hc.x > W*L - hc.r)      { hc.x = W*L - hc.r;      hc.vx = -Math.abs(hc.vx); }
            if (hc.y < hc.r+6)          { hc.y = hc.r+6;          hc.vy =  Math.abs(hc.vy); }
            if (hc.y > H - hc.r - 6)    { hc.y = H - hc.r - 6;    hc.vy = -Math.abs(hc.vy); }

            hc.bright = Math.max(1, hc.bright - 0.009);

            hc.pt--;
            if (hc.pt <= 0) {
                pulses.push({ x: hc.x, y: hc.y, r: hc.r+2, a: 0.42, col: hc.col });
                hc.pt = 300 + Math.floor(Math.random() * 380);
            }
            hc.lt--;
            if (hc.lt <= 0 && labels.length < 7) {
                labels.push({ x: hc.x + hc.r + 5, y: hc.y,
                    text: H_LABELS[Math.floor(Math.random() * H_LABELS.length)],
                    col: GOLD, life: 1, dec: 0.0022 + Math.random() * 0.003 });
                hc.lt = 330 + Math.floor(Math.random() * 500);
            }

            var br = 1 + Math.sin(ts/1000 * hc.spd + hc.phase) * 0.058;
            var rr = hc.r * br;
            var aa = 0.52 * hc.bright;
            drawGlow(hc.x, hc.y, rr * 2.7, hc.col, aa * 0.30);
            drawGlow(hc.x, hc.y, rr,       hc.col, aa);
            ctx.beginPath(); ctx.arc(hc.x, hc.y, rr*0.28, 0, Math.PI*2);
            ctx.fillStyle = 'rgba(' + hc.col + ',' + Math.min(aa*1.2, 1) + ')'; ctx.fill();
        }

        /* ── Floating labels ── */
        ctx.save();
        for (var i = labels.length - 1; i >= 0; i--) {
            var lb = labels[i]; lb.life -= lb.dec;
            if (lb.life <= 0) { labels.splice(i, 1); continue; }
            var fi = Math.min((1 - lb.life) / 0.12, 1), fo = Math.min(lb.life / 0.28, 1);
            var fa = Math.min(fi, fo);
            if (lb.col === GOLD) {
                ctx.font = 'italic ' + (W < 600 ? '11px' : '13px') + ' Georgia, serif';
                ctx.fillStyle = 'rgba(201,169,110,' + (fa * 0.62) + ')';
            } else {
                ctx.font = '8px "Courier New", monospace';
                ctx.fillStyle = 'rgba(78,205,196,' + (fa * 0.56) + ')';
            }
            ctx.fillText(lb.text, lb.x, lb.y - 6);
        }
        ctx.restore();
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
