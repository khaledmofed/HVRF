<nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top" style="background: transparent;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-white" href="{{ route('home') }}#home" style="text-decoration: none;">
            <img src="/images/logo-hvrf.png" alt="HVRF Logo">
            <span style="font-family: 'Playfair Display', serif; font-size: 1.25rem; letter-spacing: 0.3px;">HVRF</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-label="Toggle navigation" style="color: rgba(255,255,255,0.8);">
            <i class="bi bi-list fs-4"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1 pt-3 pt-lg-0">
                @foreach([['#about','About'],['#focus-areas','What We Do'],['#programs','Programs'],['#roadmap','Roadmap'],['#team','Team'],['#contact','Contact']] as [$hash, $label])
                <li class="nav-item">
                      <a class="nav-link text-white" href="{{ route('home') }}{{ $hash }}" style="font-size: 0.88rem;">{{ $label }}</a>
                </li>
                @endforeach
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('home') }}#contact" class="nav-cta nav-link">Support Our Mission</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
