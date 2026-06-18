<!doctype html>
<html lang="en-TZ" data-theme="light">
{{-- Inline: set theme before CSS paints to prevent flash --}}
<script>try{var t=localStorage.getItem('nvx_theme');if(t==='dark'||t==='light')document.documentElement.dataset.theme=t;}catch(e){}</script>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ $seo['title'] ?? $settings['website_name'] ?? 'NOVAREX' }}</title>
<meta name="description" content="{{ $seo['description'] ?? $settings['meta_description'] ?? '' }}">
@if(!empty($settings['meta_keywords']))<meta name="keywords" content="{{ $settings['meta_keywords'] }}">@endif
<meta name="author" content="{{ $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd' }}">
<meta name="geo.region" content="TZ">
<meta name="geo.placename" content="Dar es Salaam, Tanzania">
@if(!empty($settings['map_latitude']) && !empty($settings['map_longitude']))
<meta name="geo.position" content="{{ $settings['map_latitude'] }};{{ $settings['map_longitude'] }}">
<meta name="ICBM" content="{{ $settings['map_latitude'] }}, {{ $settings['map_longitude'] }}">
@endif
<meta name="robots" content="index,follow">
@if(!empty($seo['canonical']))<link rel="canonical" href="{{ $seo['canonical'] }}">@endif
@if(!empty($settings['favicon']))
<link rel="icon" href="{{ asset('storage/' . $settings['favicon']) }}" type="image/x-icon">
@elseif(!empty($settings['logo']))
<link rel="icon" href="{{ asset('storage/' . $settings['logo']) }}" type="image/png">
@endif

{{-- OG / Twitter --}}
@if(!empty($seo['metaTags'])){!! $seo['metaTags'] !!}@endif
@if(!empty($seo['jsonLd'])){!! $seo['jsonLd'] !!}@endif

{{-- Resource hints --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

{{-- Fonts --}}
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"></noscript>

{{-- Bootstrap CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"></noscript>

{{-- SaaS theme CSS --}}
<link rel="stylesheet" href="{{ asset('assets/saas/style.css') }}">

{{-- Google Analytics --}}
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T95KDT2PPG"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-T95KDT2PPG');</script>
</head>
