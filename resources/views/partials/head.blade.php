<!doctype html>
<html lang="en-TZ" data-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $seo['title'] ?? ($settings['meta_title'] ?? ($settings['website_name'] ?? 'NOVAREX')) }}</title>
  <meta name="description" content="{{ $seo['description'] ?? ($settings['meta_description'] ?? '') }}">
  <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'HSE consultancy Tanzania, safety audits Mwanza, ISO 45001 Tanzania, environmental management, ESG advisory East Africa, sustainability consultancy' }}">
  <meta name="author" content="NOVAREX HSE &amp; Sustainability Ltd">
  <meta name="geo.region" content="TZ-03">
  <meta name="geo.placename" content="Mwanza, Tanzania">
  <meta name="geo.position" content="{{ $settings['map_latitude'] ?? '-2.487815' }};{{ $settings['map_longitude'] ?? '32.931898' }}">
  <meta name="ICBM" content="{{ $settings['map_latitude'] ?? '-2.487815' }}, {{ $settings['map_longitude'] ?? '32.931898' }}">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">
  @if(!empty($settings['favicon']))
  <link rel="icon" href="{{ asset('storage/' . $settings['favicon']) }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('storage/' . $settings['favicon']) }}">
  @else
  <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/png">
  @endif
  <link rel="sitemap" type="application/xml" href="/sitemap.xml">

  {{-- OG / Twitter meta tags --}}
  @if(!empty($seo['metaTags'])){!! $seo['metaTags'] !!}@endif

  {{-- JSON-LD Structured Data --}}
  @if(!empty($seo['jsonLd'])){!! $seo['jsonLd'] !!}@endif

  {{-- Resource hints --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">
  <link rel="dns-prefetch" href="https://www.googletagmanager.com">

  {{-- CSS: preload trick so style.css doesn't block render --}}
  <link rel="preload" href="{{ asset('assets/style.css') }}" as="style" onload="this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('assets/style.css') }}"></noscript>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" media="print" onload="this.media='all'">
  <noscript><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet"></noscript>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-T95KDT2PPG"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-T95KDT2PPG');
  </script>
</head>
<body>
