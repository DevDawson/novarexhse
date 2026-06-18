@include('partials.head')
<body class="links-page-body">
  <main class="links-profile-shell">
    <section class="links-profile">
      <a class="links-logo" href="{{ route('home') }}">
        <img src="{{ !empty($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('assets/logo.png') }}"
             alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }} Logo"
             loading="eager" decoding="async" width="80" height="80">
      </a>
      <h1>{{ $settings['links_title'] ?? 'NOVAREX Links' }}</h1>
      <p>{{ $settings['links_intro'] ?? '' }}</p>

      <div class="links-list">
        @foreach($links as $link)
        <a class="profile-link-card"
           href="{{ route('go', $link->id) }}"
           target="_blank"
           rel="noopener">
          <i class="{{ $link->icon ?? 'fa-solid fa-link' }}"></i>
          <span>
            <strong>{{ $link->title }}</strong>
            <small>{{ $link->description ?: $link->url }}</small>
          </span>
          <i class="fa-solid fa-arrow-up-right-from-square"></i>
        </a>
        @endforeach
      </div>

      <div class="links-footer">
        <a href="{{ route('home') }}">Website</a>
        <a href="{{ route('page', 'terms') }}">Terms</a>
        <a href="{{ route('page', 'privacy') }}">Privacy</a>
      </div>
    </section>
  </main>
</body>
</html>
