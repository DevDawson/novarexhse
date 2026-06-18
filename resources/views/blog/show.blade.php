@include('partials.head')
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
      @if($post)
        @if(!empty($post->featured_image))
          <img class="blog-hero-image mb-4"
               src="{{ asset('storage/' . $post->featured_image) }}"
               alt="{{ $post->title }}"
               loading="eager" decoding="async" width="900" height="500">
        @endif
        <span class="eyebrow reveal visible"><i class="fa-solid fa-newspaper"></i>Blog / News</span>
        <h1 class="section-heading">{{ $post->title }}</h1>
        <p class="section-sub">{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags((string)$post->content), 155) }}</p>
        <article class="cms-article mt-5">{!! $post->content !!}</article>
      @else
        <h1 class="section-heading">Post not found</h1>
        <p class="section-sub">The article you are looking for is unavailable.</p>
      @endif
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="{{ asset('assets/main.js') }}" defer></script>
</body>
</html>
