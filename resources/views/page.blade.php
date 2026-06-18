@include('partials.head')
<style>
.cms-article h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.1;
    margin-top: 3rem;
    margin-bottom: 1rem;
}
</style>
<body>
  <nav class="navbar scrolled">
    <div class="container">
      <div class="navbar-inner">
        <a class="brand-mark" href="{{ route('home') }}">
          <div class="brand-logo-wrap">
            <img src="{{ !empty($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('assets/logo.png') }}" alt="" style="width:100%">
          </div>
          <div class="brand-text-wrap d-none d-sm-block">
            <span class="brand-name">{{ $settings['website_short_name'] ?? 'NOVAREX' }}</span>
            <span class="brand-sub">{{ $settings['website_subtitle'] ?? '' }}</span>
          </div>
        </a>
        <div class="nav-actions ms-auto">
          <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">Back to Website</a>
        </div>
      </div>
    </div>
  </nav>

  <main class="section">
    <div class="container" style="max-width:900px">
      <span class="eyebrow reveal visible"><i class="fa-solid fa-scale-balanced"></i>NOVAREX</span>
      <h1 class="section-heading">{{ $title }}</h1>
      <article class="cms-article mt-4">
        @if(str_contains($content, '<'))
          {!! $content !!}
        @else
          {!! nl2br(e($content)) !!}
        @endif
      </article>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
