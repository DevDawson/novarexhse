@php
  $footerSettings = $settings ?? [];
  $footerWaNumber = preg_replace('/[^0-9]/', '', (string)($footerSettings['whatsapp'] ?? ''));
  $footerWaUrl    = isset($waUrl) ? $waUrl : ($footerWaNumber ? 'https://wa.me/' . $footerWaNumber : '#contact');
  $footerMapSearch = isset($mapSearchUrl) ? $mapSearchUrl : '#';
  $footerStatus = isset($seoStatus) ? $seoStatus : ['open' => false, 'label' => 'Closed'];
@endphp

<footer class="site-footer" id="footer" role="contentinfo">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="footer-brand">
          <div class="brand-logo-wrap">
            <img src="{{ !empty($footerSettings['logo']) ? asset('storage/' . $footerSettings['logo']) : asset('assets/logo.png') }}" alt="" style="width:100%">
          </div>
          <span class="fb-name">{{ $footerSettings['website_short_name'] ?? 'NOVAREX' }}</span>
          <span class="fb-sub">{{ $footerSettings['website_subtitle'] ?? '' }}</span>
          <p class="footer-tagline">{{ $footerSettings['website_tagline'] ?? '' }}</p>
          <div class="social-row mt-3">
            <a href="{{ $footerWaUrl }}" class="social-btn wa" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            @if(!empty($footerSettings['linkedin']))<a href="{{ $footerSettings['linkedin'] }}" class="social-btn" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin"></i></a>@endif
            @if(!empty($footerSettings['facebook']))<a href="{{ $footerSettings['facebook'] }}" class="social-btn" aria-label="Facebook" target="_blank" rel="noopener"><i class="fa-brands fa-facebook"></i></a>@endif
            @if(!empty($footerSettings['instagram']))<a href="{{ $footerSettings['instagram'] }}" class="social-btn" aria-label="Instagram" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>@endif
            <a href="{{ $footerMapSearch }}" class="social-btn" aria-label="Google Maps" target="_blank" rel="noopener"><i class="fa-solid fa-map-location-dot"></i></a>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-2">
        <div class="footer-col">
          <h6>Navigation</h6>
          <ul class="footer-links">
            <li><a href="#about">About NOVAREX</a></li>
            <li><a href="#services">Our Services</a></li>
            <li><a href="#sectors">Sectors</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="{{ route('links') }}">All Links</a></li>
            <li><a href="{{ route('page', 'terms') }}">Terms</a></li>
            <li><a href="{{ route('page', 'privacy') }}">Privacy</a></li>
          </ul>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <div class="footer-col">
          <h6>Services</h6>
          <ul class="footer-links">
            @if(isset($services))
              @foreach($services->take(7) as $service)
              <li><a href="#services">{{ $service->title }}</a></li>
              @endforeach
            @endif
          </ul>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="footer-col">
          <h6>Contact</h6>
          @if(!empty($footerSettings['footer_address']))
          <div class="footer-contact-item">
            <div class="fci-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div class="fci-text">{!! nl2br(e(strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", (string)$footerSettings['footer_address'])))) !!}</div>
          </div>
          @endif
          <div class="footer-contact-item">
            <div class="fci-icon"><i class="fa-solid fa-phone"></i></div>
            <div class="fci-text">{{ $footerSettings['phone'] ?? '' }}<br>{{ $footerSettings['phone_alt'] ?? '' }}</div>
          </div>
          <div class="footer-contact-item">
            <div class="fci-icon"><i class="fa-solid fa-envelope"></i></div>
            <div class="fci-text">{{ $footerSettings['email'] ?? '' }}</div>
          </div>
          <div class="footer-contact-item">
            <div class="fci-icon"><i class="fa-solid fa-clock"></i></div>
            <div class="fci-text">
              @if($footerStatus['open'])
                <span class="live-status-badge open sm"><span class="live-dot"></span>{{ $footerStatus['label'] }}</span>
              @else
                <span class="live-status-badge closed sm"><span class="live-dot"></span>{{ $footerStatus['label'] }}</span>
              @endif
              <br><small>{{ $footerSettings['business_hours'] ?? '' }}</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <span class="fb-copy">&copy; {{ date('Y') }} {{ $footerSettings['website_name'] ?? 'NOVAREX' }}. All rights reserved.</span>
      <span class="fb-right">{{ $footerSettings['footer_content'] ?? '' }}</span>
    </div>
  </div>
</footer>

{{-- ===== COOKIE BANNER ===== --}}
@if(($footerSettings['cookie_enabled'] ?? '1') === '1')
<div class="cookie-banner" id="cookieBanner" hidden>
  <div>
    <strong>{{ $footerSettings['cookie_title'] ?? 'Cookie Notice' }}</strong>
    <p>{{ $footerSettings['cookie_message'] ?? '' }} <a href="{{ route('page', 'privacy') }}">Privacy Policy</a></p>
  </div>
  <button class="btn btn-primary-brand btn-sm" type="button" id="acceptCookies">Accept</button>
</div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="{{ asset('assets/main.js') }}" defer></script>

@if(isset($workingDays) && $workingDays->isNotEmpty())
<script>
// ── LIVE WORKING HOURS STATUS (EAT = UTC+3) ──────────────────────────────────
(function() {
  var schedule = {!! json_encode($workingDays->map(function($d) {
    return [
      'day'    => $d->day_name,
      'open'   => (bool)(int)$d->is_open,
      'start'  => str_replace(':', '', (string)($d->open_time ?? '0830')),
      'end'    => str_replace(':', '', (string)($d->close_time ?? '1730')),
      'startF' => $d->open_time ?? '08:30',
      'endF'   => $d->close_time ?? '17:30',
    ];
  })->values(), JSON_UNESCAPED_SLASHES) !!};

  function getEATNow() {
    var now = new Date();
    var utc = now.getTime() + (now.getTimezoneOffset() * 60000);
    var eat = new Date(utc + (3600000 * 3));
    return { dayIndex: eat.getDay(), h: eat.getHours(), m: eat.getMinutes() };
  }

  var dayNames = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

  function updateStatus() {
    var t = getEATNow();
    var now = t.h * 100 + t.m;
    var dayName = dayNames[t.dayIndex];
    var found = null;
    for (var i = 0; i < schedule.length; i++) {
      if (schedule[i].day.toLowerCase() === dayName.toLowerCase()) { found = schedule[i]; break; }
    }

    var badges = document.querySelectorAll('.live-status-badge');
    if (!badges.length) return;

    var isOpen = false, label = 'Closed', sub = '';
    if (found) {
      if (!found.open) {
        label = 'Closed Today';
      } else {
        var start = parseInt(found.start, 10);
        var end   = parseInt(found.end, 10);
        if (now >= start && now < end) {
          isOpen = true; label = 'Open Now'; sub = 'until ' + found.endF + ' EAT';
        } else if (now < start) {
          label = 'Opens at ' + found.startF;
        } else {
          label = 'Closed for the Day';
        }
      }
    }

    badges.forEach(function(badge) {
      var isSm = badge.classList.contains('sm');
      badge.className = 'live-status-badge ' + (isOpen ? 'open' : 'closed') + (isSm ? ' sm' : '');
      var dot = badge.querySelector('.live-dot');
      if (!dot) { dot = document.createElement('span'); dot.className = 'live-dot'; badge.prepend(dot); }
      var textNodes = [];
      badge.childNodes.forEach(function(n) { if (n.nodeType === 3) textNodes.push(n); });
      textNodes.forEach(function(n) { n.remove(); });
      badge.appendChild(document.createTextNode(label));
      var sm = badge.querySelector('small');
      if (sub && !isSm) {
        if (!sm) { sm = document.createElement('small'); badge.appendChild(sm); }
        sm.textContent = sub;
      } else if (sm) { sm.remove(); }
    });
  }

  updateStatus();
  setInterval(updateStatus, 60000);
})();
</script>
@endif

</body>
</html>
