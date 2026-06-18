{{-- SaaS Navbar --}}
<nav class="s-navbar" id="s-navbar">
  <div class="container">
    <div class="s-nav-inner">

      {{-- Brand --}}
      <a href="{{ route('home') }}#top" class="s-brand">
        @if(!empty($settings['logo']))
          <div class="s-brand-logo">
            <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }} Logo" width="38" height="38">
          </div>
        @else
          <div class="s-brand-logo">
            <i class="fa-solid fa-leaf" style="color:#fff;font-size:1rem"></i>
          </div>
        @endif
        <div>
          <span class="s-brand-name">{{ $settings['website_short_name'] ?? 'NOVAREX' }}</span>
          <span class="s-brand-sub">{{ $settings['website_subtitle'] ?? 'HSE & Sustainability' }}</span>
        </div>
      </a>

      {{-- Desktop links --}}
      <div class="s-nav-links">
        <a href="{{ route('home') }}#services" class="s-nav-link">Services</a>
        <a href="{{ route('home') }}#sectors" class="s-nav-link">Sectors</a>
        <a href="{{ route('home') }}#training" class="s-nav-link">Training</a>
        <a href="{{ route('home') }}#about" class="s-nav-link">About</a>
        @if(!empty($testimonials) && $testimonials->isNotEmpty())
        <a href="{{ route('home') }}#testimonials" class="s-nav-link">Testimonials</a>
        @endif
        @if(!empty($posts) && $posts->isNotEmpty())
        <a href="{{ route('home') }}#news" class="s-nav-link">News</a>
        @endif
        <a href="{{ route('home') }}#faq" class="s-nav-link">FAQ</a>
        <a href="{{ route('home') }}#contact" class="s-nav-link">Contact</a>
      </div>

      {{-- Desktop CTAs --}}
      <div class="s-nav-actions">
        {{-- Dark mode toggle --}}
        <button id="theme-toggle" class="theme-toggle-btn" aria-label="Switch to dark mode" title="Toggle dark mode">
          <i class="fa-solid fa-moon" id="theme-icon"></i>
        </button>
        @if(!empty($waUrl))
        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn btn-whatsapp btn-sm d-none d-lg-inline-flex">
          <i class="fa-brands fa-whatsapp"></i> WhatsApp
        </a>
        @endif
        <a href="{{ route('home') }}#contact" class="btn btn-primary btn-sm d-none d-md-inline-flex">
          Request Consultation
        </a>
        {{-- Hamburger --}}
        <button class="s-hamburger" type="button" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-label="Menu">
          <i class="fa-solid fa-bars fa-sm"></i>
        </button>
      </div>

    </div>
  </div>
</nav>

{{-- Mobile offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="navOffcanvas" aria-labelledby="navOffcanvasLabel" style="max-width:300px">
  <div class="offcanvas-header border-bottom">
    <div class="s-brand">
      <div class="s-brand-logo">
        @if(!empty($settings['logo']))
          <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }}" width="38" height="38">
        @else
          <i class="fa-solid fa-leaf" style="color:#fff;font-size:1rem"></i>
        @endif
      </div>
      <div>
        <span class="s-brand-name" style="font-size:.95rem">{{ $settings['website_short_name'] ?? 'NOVAREX' }}</span>
        <span class="s-brand-sub">{{ $settings['website_subtitle'] ?? 'HSE & Sustainability' }}</span>
      </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="{{ route('home') }}#services" class="s-mobile-link"><i class="fa-solid fa-briefcase fa-fw text-muted"></i> Services</a>
    <a href="{{ route('home') }}#sectors" class="s-mobile-link"><i class="fa-solid fa-industry fa-fw text-muted"></i> Sectors</a>
    <a href="{{ route('home') }}#training" class="s-mobile-link"><i class="fa-solid fa-graduation-cap fa-fw text-muted"></i> Training</a>
    <a href="{{ route('home') }}#about" class="s-mobile-link"><i class="fa-solid fa-circle-info fa-fw text-muted"></i> About</a>
    <a href="{{ route('home') }}#faq" class="s-mobile-link"><i class="fa-regular fa-circle-question fa-fw text-muted"></i> FAQ</a>
    <a href="{{ route('home') }}#contact" class="s-mobile-link"><i class="fa-regular fa-envelope fa-fw text-muted"></i> Contact</a>
    <div class="border-top mt-3 pt-3">
      <p class="text-muted" style="font-size:.78rem;padding:.5rem .9rem .25rem">
        <i class="fa-solid fa-phone fa-xs me-1"></i> {{ $settings['phone'] ?? '' }}<br>
        <i class="fa-regular fa-envelope fa-xs me-1 mt-1 d-inline-block"></i> {{ $settings['email'] ?? '' }}
      </p>
    </div>
    <div class="d-flex gap-2 flex-column mt-3">
      @if(!empty($waUrl))
      <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn btn-whatsapp btn-sm">
        <i class="fa-brands fa-whatsapp"></i> WhatsApp Us
      </a>
      @endif
      <a href="{{ route('home') }}#contact" class="btn btn-primary btn-sm">Request Consultation</a>
    </div>
  </div>
</div>
