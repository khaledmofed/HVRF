<footer class="footer-dark">
    {{-- Top gradient border --}}
    <div style="height: 3px; background: linear-gradient(90deg, transparent, var(--hvrf-teal), var(--hvrf-gold), var(--hvrf-teal), transparent); margin-bottom: 4rem;"></div>

    <div class="container">
        <div class="row g-5 mb-4">
            {{-- Brand --}}
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="/images/logo.jpeg" alt="HVRF"
                         style="height: 42px; width: 42px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(78,205,196,0.3);">
                    <span style="font-family: 'Playfair Display', serif; font-size: 1.2rem; color: #fff; font-weight: 700;">HVRF</span>
                </div>
                <p class="small mb-4" style="line-height: 1.8; color: rgba(255,255,255,0.5); max-width: 300px;">
                    Human Value Reserve Foundation — ensuring humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence.
                </p>
                <div class="footer-social d-flex gap-2">
                    <a href="{{ $settings['linkedin_url'] ?? '#' }}" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="{{ $settings['twitter_url'] ?? '#' }}" aria-label="Twitter/X"><i class="bi bi-twitter-x"></i></a>
                    <a href="{{ $settings['facebook_url'] ?? '#' }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    @if(!empty($settings['youtube_url']))
                    <a href="{{ $settings['youtube_url'] }}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    @endif
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-sm-6 col-lg-2">
                <h6>Quick Links</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#about">About</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#focus-areas">What We Do</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#programs">Programs</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#roadmap">Roadmap</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#team">Team</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#contact">Contact</a></li>
                </ul>
            </div>

            {{-- Focus Areas --}}
            <div class="col-sm-6 col-lg-2">
                <h6>Focus Areas</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="{{ route('home') }}#focus-areas">Human Connection</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#focus-areas">Human Purpose</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#focus-areas">Human Enhancement</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#focus-areas">Creativity Economy</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#focus-areas">Ethics & Governance</a></li>
                </ul>
            </div>

            {{-- Newsletter --}}
            <div class="col-lg-4">
                <h6>Stay Connected</h6>
                <p class="small mb-3" style="color: rgba(255,255,255,0.45);">
                    Subscribe to receive updates on our programs, research, and mission progress.
                </p>
                <form class="newsletter-ajax-form">
                    @csrf
                    <div class="mb-2">
                        <input type="email" name="email" class="form-control form-control-sm"
                               placeholder="your@email.com" required
                               style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); color: #fff; border-radius: 10px; padding: 0.6rem 1rem;">
                    </div>
                    <button type="submit" class="btn btn-sm w-100 fw-semibold"
                            style="background: var(--hvrf-teal); color: #fff; border: none; border-radius: 10px; padding: 0.6rem; transition: var(--transition);"
                            onmouseover="this.style.background='var(--hvrf-teal-dark)'"
                            onmouseout="this.style.background='var(--hvrf-teal)'">
                        Subscribe to Updates
                    </button>
                    <div class="newsletter-msg mt-2"></div>
                </form>
            </div>
        </div>

        <div class="footer-border d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <p class="small mb-0" style="color: rgba(255,255,255,0.3);">
                &copy; {{ date('Y') }} HVRF — Human Value Reserve Foundation. All rights reserved.
            </p>
            <div class="d-flex gap-3">
                <a href="{{ route('admin.login') }}" style="color: rgba(255,255,255,0.2); font-size: 0.75rem;">Admin</a>
            </div>
        </div>
    </div>
</footer>
