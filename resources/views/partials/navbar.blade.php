<nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top" style="background: transparent;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-white" href="{{ route('home') }}#home" style="text-decoration: none;">
            <img src="/images/logo-hvrf.png" alt="HVRF Logo">
            <span style="font-family: 'Playfair Display', serif; font-size: 1.25rem; letter-spacing: 0.3px;">HVRF</span>
        </a>

        {{-- Mobile: lang button + toggler always visible --}}
        <div class="d-flex d-lg-none align-items-center gap-2 ms-auto">
            <div class="dropdown">
                <button class="lang-btn-mobile dropdown-toggle" id="langDropdownMobile" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        aria-label="Select language">
                    <span class="lang-flag-icon fi fi-us"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end lang-dropdown-menu" aria-labelledby="langDropdownMobile">
                    <li><button class="dropdown-item hvrf-lang-option active" data-lang="en"><span class="fi fi-us me-2"></span><span>English</span></button></li>
                    <li><button class="dropdown-item hvrf-lang-option" data-lang="ja"><span class="fi fi-jp me-2"></span><span>日本語</span></button></li>
                    <li><button class="dropdown-item hvrf-lang-option" data-lang="ko"><span class="fi fi-kr me-2"></span><span>한국어</span></button></li>
                    <li><button class="dropdown-item hvrf-lang-option" data-lang="es"><span class="fi fi-es me-2"></span><span>Español</span></button></li>
                    <li><button class="dropdown-item hvrf-lang-option" data-lang="zh-TW"><span class="fi fi-tw me-2"></span><span>繁體中文</span></button></li>
                    <li><button class="dropdown-item hvrf-lang-option" data-lang="vi"><span class="fi fi-vn me-2"></span><span>Tiếng Việt</span></button></li>
                </ul>
            </div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-label="Toggle navigation" style="color: rgba(255,255,255,0.8);">
                <i class="bi bi-list fs-4"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1 pt-3 pt-lg-0">
                @foreach([['#about','nav.about','About'],['#focus-areas','nav.what-we-do','What We Do'],['#programs','nav.programs','Programs'],['#roadmap','nav.roadmap','Roadmap'],['#team','nav.team','Team'],['#contact','nav.contact','Contact']] as [$hash, $key, $label])
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}{{ $hash }}" style="font-size: 0.88rem;" data-i18n="{{ $key }}">{{ $label }}</a>
                </li>
                @endforeach

                {{-- Desktop language switcher --}}
                <li class="nav-item dropdown d-none d-lg-block ms-lg-1">
                    <button class="lang-btn-desktop dropdown-toggle" id="langDropdownDesktop" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            aria-label="Select language">
                        <span class="lang-flag-icon fi fi-us"></span>
                        <span class="lang-code-text">EN</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end lang-dropdown-menu" aria-labelledby="langDropdownDesktop">
                        <li><button class="dropdown-item hvrf-lang-option active" data-lang="en"><span class="fi fi-us me-2"></span><span>English</span></button></li>
                        <li><button class="dropdown-item hvrf-lang-option" data-lang="ja"><span class="fi fi-jp me-2"></span><span>日本語</span></button></li>
                        <li><button class="dropdown-item hvrf-lang-option" data-lang="ko"><span class="fi fi-kr me-2"></span><span>한국어</span></button></li>
                        <li><button class="dropdown-item hvrf-lang-option" data-lang="es"><span class="fi fi-es me-2"></span><span>Español</span></button></li>
                        <li><button class="dropdown-item hvrf-lang-option" data-lang="zh-TW"><span class="fi fi-tw me-2"></span><span>繁體中文</span></button></li>
                        <li><button class="dropdown-item hvrf-lang-option" data-lang="vi"><span class="fi fi-vn me-2"></span><span>Tiếng Việt</span></button></li>
                    </ul>
                </li>

                <li class="nav-item ms-lg-3">
                    <a href="{{ route('home') }}#contact" class="nav-cta nav-link" data-i18n="nav.cta">Support Our Mission</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
