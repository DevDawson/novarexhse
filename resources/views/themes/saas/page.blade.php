<!doctype html>
<html lang="en-TZ" data-theme="light">
<script>try{var t=localStorage.getItem('nvx_theme');if(t==='dark'||t==='light')document.documentElement.dataset.theme=t;}catch(e){}</script>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ $seo['title'] ?? ($title ?? 'NOVAREX') }}</title>
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

    <div class="mb-3">
      <span class="eyebrow">
        <i class="fa-solid fa-scale-balanced"></i>
        {{ $settings['website_short_name'] ?? 'NOVAREX' }}
      </span>
    </div>

    <h1 style="font-size:clamp(1.75rem,4vw,2.75rem);font-weight:900;letter-spacing:-.03em;color:var(--text);margin-bottom:2rem">
      {{ $title }}
    </h1>

    <div class="s-cms-article">
      @if(str_contains($content, '<'))
        {!! $content !!}
      @else
        {!! nl2br(e($content)) !!}
      @endif
    </div>

  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
