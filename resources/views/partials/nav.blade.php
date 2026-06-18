{{-- Computed nav variables (safe defaults when partial is used on non-home pages) --}}
@php
  $navSettings  = $settings ?? [];
  $navWaNumber  = preg_replace('/[^0-9]/', '', (string)($navSettings['whatsapp'] ?? ''));
  $navWaUrl     = isset($waUrl) ? $waUrl : ($navWaNumber ? 'https://wa.me/' . $navWaNumber : '#contact');
  $hasTestimonials = isset($testimonials) && $testimonials->isNotEmpty();
  $hasPosts        = isset($posts) && $posts->isNotEmpty();
@endphp

<!-- Skip to main content (accessibility) -->
<a href="#home" class="skip-link">Skip to main content</a>

<div class="topbar d-none d-md-block">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="d-flex gap-2 align-items-center">
      <span class="topbar-badge"><i class="fa-solid fa-shield-halved"></i> HSE &amp; Sustainability Consultancy</span>
      @if(!empty($navSettings['location']))<span class="topbar-badge"><i class="fa-solid fa-location-dot"></i> {{ $navSettings['location'] }}</span>@endif
      @if(!empty($navSettings['phone']))<span class="topbar-badge"><i class="fa-solid fa-phone"></i> {{ $navSettings['phone'] }}</span>@endif
    </div>
    <div class="d-flex align-items-center gap-2">
      @if(!empty($navSettings['email']))<span class="topbar-badge"><i class="fa-solid fa-envelope"></i> {{ $navSettings['email'] }}</span>@endif
      @if(!empty($navSettings['linkedin']))
        <a href="{{ $navSettings['linkedin'] }}" class="topbar-badge text-decoration-none" style="color:var(--muted)" target="_blank" rel="noopener">
          <i class="fa-brands fa-linkedin" style="color:#0A66C2"></i> LinkedIn
        </a>
      @endif
    </div>
  </div>
</div>

<nav class="navbar" id="mainNav" role="navigation" aria-label="Main navigation">
  <div class="container">
    <div class="navbar-inner">
      <a class="brand-mark" href="{{ route('home') }}" aria-label="{{ $navSettings['website_name'] ?? 'NOVAREX' }} - Homepage">
        <div class="brand-logo-wrap">
          <img src="{{ !empty($navSettings['logo']) ? asset('storage/' . $navSettings['logo']) : asset('assets/logo.png') }}"
               alt="{{ $navSettings['website_short_name'] ?? 'NOVAREX' }} Logo" style="width:100%">
        </div>
        <div class="brand-text-wrap d-none d-sm-block">
          <span class="brand-name">{{ $navSettings['website_short_name'] ?? 'NOVAREX' }}</span>
          <span class="brand-sub">{{ $navSettings['website_subtitle'] ?? '' }}</span>
        </div>
      </a>

      <ul class="nav-list" role="list" aria-label="Main site navigation">
        <li class="nav-item"><a href="#about"    class="nav-link-item">About</a></li>
        <li class="nav-item"><a href="#services"  class="nav-link-item">Services</a></li>
        <li class="nav-item"><a href="#sectors"   class="nav-link-item">Sectors</a></li>
        <li class="nav-item"><a href="#training"  class="nav-link-item">Training</a></li>
        <li class="nav-item"><a href="#why"       class="nav-link-item">Why NOVAREX</a></li>
        <li class="nav-item"><a href="#faq"       class="nav-link-item">FAQ</a></li>
        @if($hasTestimonials)<li class="nav-item"><a href="#testimonials" class="nav-link-item">Testimonials</a></li>@endif
        @if($hasPosts)<li class="nav-item"><a href="#blog" class="nav-link-item">News</a></li>@endif
        <li class="nav-item"><a href="#contact"   class="nav-link-item">Contact</a></li>
      </ul>

      <div class="nav-actions">
        <button class="theme-btn" id="themeToggle" aria-label="Toggle colour theme">
          <i id="themeIcon" class="fa-solid fa-moon"></i>
        </button>
        <a href="{{ $navWaUrl }}" class="btn btn-whatsapp btn-sm d-none d-lg-inline-flex" style="border-radius:10px;font-size:.82rem;padding:.42rem 1rem;">
          <i class="fa-brands fa-whatsapp me-1"></i>WhatsApp
        </a>
        <a href="#contact" class="btn btn-primary-brand btn-sm d-none d-lg-inline-flex" style="border-radius:10px;font-size:.82rem;padding:.42rem 1rem;">
          Request Consultation
        </a>
        <button class="nav-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-label="Open menu">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </div>
  </div>
</nav>

<section class="brand-marquee-band" aria-label="NOVAREX capabilities and sectors">
  <div class="brand-marquee-track">
    @for($repeat = 0; $repeat < 2; $repeat++)
      <div class="brand-marquee-group" @if($repeat === 1) aria-hidden="true" @endif>
        <span class="brand-marquee-item">
          NOVAREX HSE &amp; Sustainability LTD. | Protecting People | Preserving Environment | Building Sustainability
        </span>
      </div>
    @endfor
  </div>
</section>

<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
  <div class="offcanvas-header">
    <div class="d-flex align-items-center gap-2">
      <div class="brand-logo-wrap" style="width:34px;height:34px;border-radius:9px;">
        <img src="{{ !empty($navSettings['logo']) ? asset('storage/' . $navSettings['logo']) : asset('assets/logo.png') }}" alt="" style="width:100%">
      </div>
      <h5 class="offcanvas-title mb-0" id="mobileMenuLabel">{{ $navSettings['website_short_name'] ?? 'NOVAREX' }}</h5>
    </div>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-3">
    <div class="d-flex flex-column gap-1 mb-4">
      <a href="#about"    class="mobile-nav-link" data-bs-dismiss="offcanvas"><i class="fa-solid fa-circle-info fa-fw me-2" style="color:var(--brand)"></i>About</a>
      <a href="#services" class="mobile-nav-link" data-bs-dismiss="offcanvas"><i class="fa-solid fa-layer-group fa-fw me-2" style="color:var(--brand)"></i>Services</a>
      <a href="#sectors"  class="mobile-nav-link" data-bs-dismiss="offcanvas"><i class="fa-solid fa-industry fa-fw me-2" style="color:var(--brand)"></i>Sectors</a>
      <a href="#training" class="mobile-nav-link" data-bs-dismiss="offcanvas"><i class="fa-solid fa-person-chalkboard fa-fw me-2" style="color:var(--brand)"></i>Training</a>
      <a href="#why"      class="mobile-nav-link" data-bs-dismiss="offcanvas"><i class="fa-solid fa-star fa-fw me-2" style="color:var(--green)"></i>Why NOVAREX</a>
      <a href="#faq"      class="mobile-nav-link" data-bs-dismiss="offcanvas"><i class="fa-solid fa-circle-question fa-fw me-2" style="color:var(--green)"></i>FAQ</a>
      <a href="#contact"  class="mobile-nav-link" data-bs-dismiss="offcanvas"><i class="fa-solid fa-envelope fa-fw me-2" style="color:var(--green)"></i>Contact</a>
    </div>
    <div class="d-grid gap-2">
      <a href="{{ $navWaUrl }}" class="btn btn-whatsapp" data-bs-dismiss="offcanvas"><i class="fa-brands fa-whatsapp me-2"></i>WhatsApp Us</a>
      <a href="#contact" class="btn btn-primary-brand" data-bs-dismiss="offcanvas">Request Consultation</a>
      @if(!empty($navSettings['linkedin']))<a href="{{ $navSettings['linkedin'] }}" class="btn btn-ghost" data-bs-dismiss="offcanvas"><i class="fa-brands fa-linkedin me-2"></i>LinkedIn</a>@endif
      <a href="{{ route('links') }}" class="btn btn-ghost" data-bs-dismiss="offcanvas"><i class="fa-solid fa-link me-2"></i>All Links</a>
    </div>
    <div class="mt-3 pt-3" style="border-top:1px solid var(--border)">
      <div class="footer-contact-item">
        <div class="fci-icon"><i class="fa-solid fa-phone"></i></div>
        <div class="fci-text">{{ $navSettings['phone'] ?? '' }}<br>{{ $navSettings['phone_alt'] ?? '' }}</div>
      </div>
      <div class="footer-contact-item">
        <div class="fci-icon"><i class="fa-solid fa-envelope"></i></div>
        <div class="fci-text">{{ $navSettings['email'] ?? '' }}</div>
      </div>
    </div>
  </div>
</div>
