<!doctype html>
<html lang="en-TZ" data-theme="light">
<script>try{var t=localStorage.getItem('nvx_theme');if(t==='dark'||t==='light')document.documentElement.dataset.theme=t;}catch(e){}</script>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ $seo['title'] ?? ($post->title ?? 'Blog') }}</title>
<meta name="description" content="{{ $seo['description'] ?? '' }}">
@if(!empty($seo['canonical']))<link rel="canonical" href="{{ $seo['canonical'] }}">@endif
@if(!empty($settings['favicon']))<link rel="icon" href="{{ asset('storage/' . $settings['favicon']) }}" type="image/x-icon">@elseif(!empty($settings['logo']))<link rel="icon" href="{{ asset('storage/' . $settings['logo']) }}" type="image/png">@endif
@if(!empty($seo['metaTags'])){!! $seo['metaTags'] !!}@endif
@if(!empty($seo['jsonLd'])){!! $seo['jsonLd'] !!}@endif
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{ asset('assets/saas/style.css') }}">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T95KDT2PPG"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-T95KDT2PPG');</script>
</head>
<body style="background:var(--bg-alt)">

<nav class="s-standalone-nav">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="{{ route('home') }}" class="s-brand">
      <div class="s-brand-logo">
        @if(!empty($settings['logo']))
          <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }}" width="38" height="38">
        @else
          <i class="fa-solid fa-leaf" style="color:#fff;font-size:1rem"></i>
        @endif
      </div>
      <span class="s-brand-name">{{ $settings['website_short_name'] ?? 'NOVAREX' }}</span>
    </a>
    <a href="{{ route('home') }}" class="btn btn-outline btn-sm">
      <i class="fa-solid fa-arrow-left fa-xs"></i> Back to Website
    </a>
  </div>
</nav>

<main class="s-standalone-main">
  <div class="container" style="max-width:840px">

    @if($post)

      @if(!empty($post->featured_image))
        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="s-blog-hero-img" width="900" height="500" loading="eager">
      @endif

      <span class="eyebrow green mb-3">
        <i class="fa-solid fa-newspaper"></i> Blog / News
      </span>

      <h1 style="font-size:clamp(1.75rem,4vw,2.75rem);font-weight:900;letter-spacing:-.03em;color:var(--text);margin-bottom:1rem">
        {{ $post->title }}
      </h1>

      @php $excerpt = $post->excerpt ?: Str::limit(strip_tags((string)$post->content), 155); @endphp
      @if(!empty($excerpt))
      <p style="font-size:1.05rem;color:var(--text-muted);line-height:1.7;margin-bottom:1.5rem">{{ $excerpt }}</p>
      @endif

      <div style="display:flex;gap:1rem;align-items:center;margin-bottom:2rem;padding-bottom:1.25rem;border-bottom:1px solid var(--border)">
        <div class="s-testimonial-avatar" style="width:36px;height:36px;font-size:.8rem">
          <i class="fa-solid fa-newspaper"></i>
        </div>
        <div>
          <div style="font-size:.84rem;font-weight:600;color:var(--text)">{{ $settings['website_short_name'] ?? 'NOVAREX' }}</div>
          <div style="font-size:.76rem;color:var(--text-muted)">{{ optional($post->published_at ?? $post->created_at)->format('d F Y') }}</div>
        </div>
      </div>

      <article class="s-cms-article">
        {!! $post->content !!}
      </article>

    @else

      <div class="text-center py-5">
        <div style="width:72px;height:72px;border-radius:18px;background:var(--brand-light);border:1.5px solid var(--brand-mid);display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem">
          <i class="fa-solid fa-newspaper" style="font-size:1.75rem;color:var(--brand)"></i>
        </div>
        <h1 style="font-size:1.75rem;font-weight:800;color:var(--text);margin-bottom:.5rem">Post Not Found</h1>
        <p style="color:var(--text-muted);margin-bottom:1.5rem">The article you are looking for is unavailable or has been removed.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">
          <i class="fa-solid fa-house fa-xs"></i> Back to Homepage
        </a>
      </div>

    @endif

  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="{{ asset('assets/saas/main.js') }}" defer></script>
</body>
</html>
