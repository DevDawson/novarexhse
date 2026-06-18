<!doctype html>
<html lang="en-TZ" data-theme="light">
<script>try{var t=localStorage.getItem('nvx_theme');if(t==='dark'||t==='light')document.documentElement.dataset.theme=t;}catch(e){}</script>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ $seo['title'] ?? ($settings['links_title'] ?? 'NOVAREX Links') }}</title>
<meta name="description" content="{{ $seo['description'] ?? '' }}">
@if(!empty($seo['canonical']))<link rel="canonical" href="{{ $seo['canonical'] }}">@endif
@if(!empty($settings['favicon']))<link rel="icon" href="{{ asset('storage/' . $settings['favicon']) }}" type="image/x-icon">@elseif(!empty($settings['logo']))<link rel="icon" href="{{ asset('storage/' . $settings['logo']) }}" type="image/png">@endif
@if(!empty($seo['metaTags'])){!! $seo['metaTags'] !!}@endif
@if(!empty($seo['jsonLd'])){!! $seo['jsonLd'] !!}@endif
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('assets/saas/style.css') }}">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T95KDT2PPG"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-T95KDT2PPG');</script>
</head>
<body class="s-links-body">

<div class="s-links-shell">
  <div class="s-links-profile">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="d-inline-block mb-3">
      @if(!empty($settings['logo']))
        <div class="s-links-logo">
          <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }}" width="80" height="80">
        </div>
      @else
        <div class="s-links-logo" style="background:var(--brand);display:flex;align-items:center;justify-content:center">
          <i class="fa-solid fa-leaf" style="color:#fff;font-size:2rem"></i>
        </div>
      @endif
    </a>

    <h1 class="s-links-name">{{ $settings['links_title'] ?? $settings['website_short_name'] ?? 'NOVAREX' }}</h1>
    <p class="s-links-intro">{{ $settings['links_intro'] ?? $settings['website_tagline'] ?? '' }}</p>

    {{-- Links list --}}
    @if(!empty($links) && $links->isNotEmpty())
    <div class="s-links-list text-start">
      @foreach($links as $link)
      <a href="{{ route('go', $link->id) }}" class="s-profile-link" target="_blank" rel="noopener">
        <div class="link-icon">
          <i class="{{ $link->icon ?? 'fa-solid fa-link' }}"></i>
        </div>
        <div style="flex:1;min-width:0">
          <strong>{{ $link->title }}</strong>
          @if(!empty($link->description))
          <small>{{ $link->description }}</small>
          @elseif(!empty($link->url))
          <small>{{ parse_url($link->url, PHP_URL_HOST) }}</small>
          @endif
        </div>
        <i class="fa-solid fa-arrow-up-right-from-square link-arrow"></i>
      </a>
      @endforeach
    </div>
    @else
    <p class="text-muted" style="font-size:.88rem">No links available yet.</p>
    @endif

    {{-- Footer links --}}
    <div class="s-links-footer">
      <a href="{{ route('home') }}"><i class="fa-solid fa-house fa-xs me-1"></i>Website</a>
      <a href="{{ route('page', 'terms') }}">Terms</a>
      <a href="{{ route('page', 'privacy') }}">Privacy</a>
    </div>

  </div>

  <p class="text-center mt-3" style="font-size:.72rem;color:#94a3b8">
    &copy; {{ date('Y') }} {{ $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd' }}
  </p>
</div>

</body>
</html>
