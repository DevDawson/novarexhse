{{-- SaaS Footer --}}
<footer class="s-footer">
  <div class="container">
    <div class="row g-5">

      {{-- Brand column --}}
      <div class="col-lg-4">
        <a href="{{ route('home') }}" style="display:inline-flex;align-items:center;gap:.75rem;margin-bottom:1rem;text-decoration:none">
          <div class="s-brand-logo">
            @if(!empty($settings['logo']))
              <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }}" width="40" height="40">
            @else
              <i class="fa-solid fa-leaf" style="color:#fff;font-size:1rem"></i>
            @endif
          </div>
          <div>
            <span class="s-footer-brand-name">{{ $settings['website_short_name'] ?? 'NOVAREX' }}</span>
            <span class="s-footer-brand-sub">{{ $settings['website_subtitle'] ?? 'HSE & Sustainability' }}</span>
          </div>
        </a>
        <p class="s-footer-tagline">{{ $settings['website_tagline'] ?? 'Building safer workplaces and sustainable futures across East Africa.' }}</p>

        {{-- Social links --}}
        <div class="s-social-row">
          @if(!empty($settings['linkedin']))
          <a href="{{ $settings['linkedin'] }}" class="s-social-btn" target="_blank" rel="noopener" title="LinkedIn">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
          @endif
          @if(!empty($settings['facebook']))
          <a href="{{ $settings['facebook'] }}" class="s-social-btn" target="_blank" rel="noopener" title="Facebook">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
          @endif
          @if(!empty($settings['instagram']))
          <a href="{{ $settings['instagram'] }}" class="s-social-btn" target="_blank" rel="noopener" title="Instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>
          @endif
          @if(!empty($settings['whatsapp']))
          <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}" class="s-social-btn wa" target="_blank" rel="noopener" title="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
          @endif
        </div>
      </div>

      {{-- Navigation --}}
      <div class="col-6 col-lg-2">
        <h6>Company</h6>
        <nav class="s-footer-links">
          <a href="{{ route('home') }}#about">About</a>
          <a href="{{ route('home') }}#services">Services</a>
          <a href="{{ route('home') }}#sectors">Sectors</a>
          <a href="{{ route('home') }}#training">Training</a>
          <a href="{{ route('home') }}#faq">FAQ</a>
          <a href="{{ route('home') }}#contact">Contact</a>
        </nav>
      </div>

      {{-- Services --}}
      <div class="col-6 col-lg-3">
        <h6>Services</h6>
        <nav class="s-footer-links">
          @foreach($services->take(7) as $svc)
          <a href="{{ route('home') }}#services">{{ $svc->title }}</a>
          @endforeach
        </nav>
      </div>

      {{-- Contact --}}
      <div class="col-lg-3">
        <h6>Contact</h6>

        @if(!empty($settings['footer_address']))
        <div class="s-footer-contact-item">
          <div class="s-fci-icon"><i class="fa-solid fa-location-dot fa-xs"></i></div>
          <div class="s-fci-text">{{ $settings['footer_address'] }}</div>
        </div>
        @endif

        @if(!empty($settings['phone']))
        <div class="s-footer-contact-item">
          <div class="s-fci-icon"><i class="fa-solid fa-phone fa-xs"></i></div>
          <a href="tel:{{ preg_replace('/[^+0-9]/', '', $settings['phone']) }}" class="s-fci-text">{{ $settings['phone'] }}</a>
        </div>
        @endif

        @if(!empty($settings['email']))
        <div class="s-footer-contact-item">
          <div class="s-fci-icon"><i class="fa-regular fa-envelope fa-xs"></i></div>
          <a href="mailto:{{ $settings['email'] }}" class="s-fci-text">{{ $settings['email'] }}</a>
        </div>
        @endif

        {{-- Live status --}}
        <div class="mt-2">
          <span class="s-live-badge live-status-badge" data-working="1">
            <span class="s-live-dot"></span> Checking…
          </span>
        </div>
      </div>

    </div>{{-- /row --}}

    {{-- Bottom bar --}}
    <div class="s-footer-bottom">
      <span>&copy; {{ date('Y') }} {{ $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd' }}. All rights reserved.</span>
      <div style="display:flex;gap:1.25rem;flex-wrap:wrap">
        @if(!empty($settings['footer_content']))
        <span style="font-size:.75rem;color:#475569">{!! $settings['footer_content'] !!}</span>
        @endif
        <a href="{{ route('page', 'privacy') }}" style="font-size:.78rem;color:#475569;transition:color var(--transition)" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#475569'">Privacy</a>
        <a href="{{ route('page', 'terms') }}" style="font-size:.78rem;color:#475569;transition:color var(--transition)" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#475569'">Terms</a>
        <a href="{{ route('links') }}" style="font-size:.78rem;color:#475569;transition:color var(--transition)" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#475569'">Links</a>
      </div>
    </div>

  </div>{{-- /container --}}
</footer>

{{-- Cookie banner --}}
@if(isset($settings['cookie_enabled']) && $settings['cookie_enabled'] === '1')
<div class="s-cookie" id="s-cookie">
  <p>
    @if(!empty($settings['cookie_message']))
      {!! $settings['cookie_message'] !!}
    @else
      We use cookies to enhance your experience. By continuing, you agree to our
      <a href="{{ route('page', 'privacy') }}">Privacy Policy</a>.
    @endif
  </p>
  <button id="s-cookie-accept" class="btn btn-primary btn-sm" style="flex-shrink:0">Accept</button>
</div>
@endif

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
{{-- SaaS main JS --}}
<script src="{{ asset('assets/saas/main.js') }}" defer></script>
</body>
</html>
