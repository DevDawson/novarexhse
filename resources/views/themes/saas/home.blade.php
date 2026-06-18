@include('themes.saas.partials.head')
<body id="top">
@include('themes.saas.partials.nav')

{{-- ══════════════════════════════════════════════
     HERO
══════════════════════════════════════════════ --}}
<section class="s-hero" id="hero" {!! $heroStyle !!}>
  <div class="container">
    <div class="row align-items-center g-5">

      {{-- Left: text --}}
      <div class="col-lg-6">
        <div class="s-hero-badge">
          <span class="badge-dot"></span>
          {{ $settings['website_tagline'] ?? 'HSE & Sustainability Experts' }}
        </div>

        <h1 class="s-hero-title">{!! $heroTitle !!}</h1>

        <p class="s-hero-lead">
          {{ $hero['subtitle'] ?? ($settings['meta_description'] ?? 'End-to-end HSE consulting, environmental management, and sustainability advisory for organisations that put safety and compliance first.') }}
        </p>

        <div class="s-hero-cta">
          <a href="#contact" class="btn btn-primary btn-lg">
            <i class="fa-solid fa-calendar-check"></i>
            {{ $hero['button_text'] ?? 'Request Consultation' }}
          </a>
          <a href="#services" class="btn btn-outline btn-lg">
            Explore Services <i class="fa-solid fa-arrow-down fa-xs"></i>
          </a>
        </div>

        <div class="s-hero-trust">
          <span class="s-hero-trust-label">Accredited in</span>
          <div class="s-hero-trust-badges">
            <span class="s-trust-badge">OSHA</span>
            <span class="s-trust-badge">SGS</span>
            <span class="s-trust-badge">IOSH</span>
            <span class="s-trust-badge">NEBOSH</span>
            <span class="s-trust-badge">ISO</span>
          </div>
        </div>
      </div>

      {{-- Right: stat cards --}}
      <div class="col-lg-6">
        <div class="s-hero-panel">
          @foreach($homeStats as $i => $stat)
          @php
            $icons   = ['fa-shield-halved','fa-leaf','fa-award','fa-users','fa-chart-line'];
            $colors  = ['brand','green','brand','slate','green'];
            $accents = ['','accent-green','','','accent-brand'];
          @endphp
          <div class="s-stat-card {{ $accents[$i] ?? '' }} reveal reveal-delay-{{ $i + 1 }}">
            <div class="s-stat-icon {{ $colors[$i] ?? 'brand' }}">
              <i class="fa-solid {{ $icons[$i] ?? 'fa-star' }}"></i>
            </div>
            <div>
              <span class="s-stat-num" data-count="{{ preg_replace('/[^0-9]/', '', $stat['value']) }}" data-suffix="{{ preg_replace('/[0-9]/', '', $stat['value']) }}">{{ $stat['value'] }}</span>
              <span class="s-stat-label">{{ $stat['label'] }}</span>
            </div>
          </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════
     CAPABILITIES MARQUEE
══════════════════════════════════════════════ --}}
<div class="s-marquee-band">
  <div class="s-marquee-track">
    <div class="s-marquee-group" aria-hidden="false">
      @foreach($marqueeItems as $item)
      <span class="s-marquee-item"><i class="{{ $item['icon'] ?? 'fa-solid fa-circle-check' }}"></i> {{ $item['label'] ?? $item }}</span>
      @endforeach
    </div>
    <div class="s-marquee-group" aria-hidden="true">
      @foreach($marqueeItems as $item)
      <span class="s-marquee-item"><i class="{{ $item['icon'] ?? 'fa-solid fa-circle-check' }}"></i> {{ $item['label'] ?? $item }}</span>
      @endforeach
    </div>
  </div>
</div>

{{-- ══════════════════════════════════════════════
     METRICS BAR
══════════════════════════════════════════════ --}}
<div class="s-metrics">
  <div class="container">
    <div class="s-metrics-grid">
      @foreach($homeStats as $stat)
      <div class="s-metric-item">
        <span class="s-metric-num" data-count="{{ preg_replace('/[^0-9]/', '', $stat['value']) }}" data-suffix="{{ preg_replace('/[0-9]/', '', $stat['value']) }}">{{ $stat['value'] }}</span>
        <span class="s-metric-label">{{ $stat['label'] }}</span>
      </div>
      @endforeach
    </div>
  </div>
</div>

{{-- ══════════════════════════════════════════════
     SERVICES
══════════════════════════════════════════════ --}}
<section class="section" id="services">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-6 reveal">
        <span class="section-label">What We Do</span>
        <h2 class="section-title">Comprehensive HSE &amp; Sustainability Services</h2>
        <p class="section-desc">We deliver end-to-end solutions across health, safety, environment, and sustainability — from advisory and auditing to training and compliance.</p>
      </div>
      <div class="col-lg-6 d-flex align-items-end justify-content-lg-end mt-3 mt-lg-0 reveal reveal-delay-1">
        <a href="#contact" class="btn btn-outline">
          Request a Service <i class="fa-solid fa-arrow-right fa-xs"></i>
        </a>
      </div>
    </div>

    <div class="row g-4">
      @foreach($services as $i => $svc)
      @php $isGreen = strtolower($svc->color ?? '') === 'green'; @endphp
      <div class="col-md-6 col-lg-4 reveal reveal-delay-{{ ($i % 3) + 1 }}">
        <div class="s-service-card {{ $isGreen ? 'green' : '' }} h-100">
          <div class="s-svc-header">
            <div class="s-svc-icon {{ $isGreen ? 'green' : 'brand' }}">
              <i class="fa-solid {{ $svc->icon ?? 'fa-shield-halved' }}"></i>
            </div>
            <span class="s-svc-tag {{ $isGreen ? 'green' : 'brand' }}">
              {{ $isGreen ? 'Sustainability' : 'HSE' }}
            </span>
          </div>
          <div class="s-svc-body">
            <h3 class="s-svc-title">{{ $svc->title }}</h3>
            <p class="s-svc-desc">{{ Str::limit($svc->description ?? '', 130) }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Service pills for extra services --}}
    @if($services->count() > 6)
    <div class="d-flex flex-wrap gap-2 mt-4 reveal">
      @foreach($services->skip(6) as $svc)
      <a href="#contact" class="btn btn-outline btn-sm">
        <i class="fa-solid {{ $svc->icon ?? 'fa-arrow-right' }} fa-xs"></i> {{ $svc->title }}
      </a>
      @endforeach
    </div>
    @endif
  </div>
</section>

{{-- ══════════════════════════════════════════════
     EXPERTISE BAND
══════════════════════════════════════════════ --}}
@if(!empty($settings['expertise_title']))
<div class="container">
  <div class="s-expertise-band reveal">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <span class="eyebrow" style="color:#fff;background:rgba(255,255,255,.15);border-color:rgba(255,255,255,.2)">
          <i class="fa-solid fa-certificate"></i> Expertise &amp; Accreditations
        </span>
        <h2 style="color:#fff;font-size:1.65rem;margin-bottom:.5rem">{{ $settings['expertise_title'] }}</h2>
        @if(!empty($settings['expertise_content']))
        <p class="s-expertise-content">{{ $settings['expertise_content'] }}</p>
        @endif
        <div class="s-expertise-badges">
          <span class="s-exp-badge">OSHA Compliant</span>
          <span class="s-exp-badge">SGS Certified</span>
          <span class="s-exp-badge">IOSH Aligned</span>
          <span class="s-exp-badge">NEBOSH Standard</span>
          <span class="s-exp-badge">CQI/IRCA Member</span>
        </div>
      </div>
      <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
        <a href="#contact" class="btn" style="background:#fff;color:var(--brand);border-color:#fff;font-weight:700">
          <i class="fa-solid fa-handshake"></i> Work With Us
        </a>
      </div>
    </div>
  </div>
</div>
@endif

{{-- ══════════════════════════════════════════════
     ABOUT
══════════════════════════════════════════════ --}}
<section class="section section-alt" id="about">
  <div class="container">
    <div class="row g-5 align-items-center">

      {{-- Image side --}}
      <div class="col-lg-5 reveal">
        @php $aboutImg = $about['background_image'] ?? $about['image'] ?? null; @endphp
        <div class="s-about-image-wrap">
          @if(!empty($aboutImg))
            <img src="{{ asset('storage/' . $aboutImg) }}" alt="About NOVAREX" loading="lazy">
          @else
            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&q=80" alt="HSE Professionals at Work" loading="lazy">
          @endif
          <div class="s-about-badge">
            <div class="s-about-badge-icon">
              <i class="fa-solid fa-award"></i>
            </div>
            <div>
              <div class="s-about-badge-title">{{ $settings['stat_1_value'] ?? '1' }}+ Years Experience</div>
              <div class="s-about-badge-sub">Trusted across East Africa</div>
            </div>
          </div>
        </div>
      </div>

      {{-- Text side --}}
      <div class="col-lg-7">
        <div class="reveal reveal-delay-1">
          <span class="section-label">Who We Are</span>
          <h2 class="section-title">{{ $about['title'] ?? 'Dedicated to Safer, Sustainable Workplaces' }}</h2>
          <p class="section-desc">{{ $about['subtitle'] ?? '' }}</p>
        </div>

        <div class="s-timeline reveal reveal-delay-2">
          @if(!empty($about['vision']))
          <div class="s-timeline-item">
            <div class="s-tl-dot brand"><i class="fa-solid fa-eye fa-xs"></i></div>
            <div>
              <div class="s-tl-title">Vision</div>
              <div class="s-tl-body">{{ $about['vision'] }}</div>
            </div>
          </div>
          @endif
          @if(!empty($about['mission']))
          <div class="s-timeline-item">
            <div class="s-tl-dot green"><i class="fa-solid fa-bullseye fa-xs"></i></div>
            <div>
              <div class="s-tl-title">Mission</div>
              <div class="s-tl-body">{{ $about['mission'] }}</div>
            </div>
          </div>
          @endif
          @if(!empty($about['commitment']))
          <div class="s-timeline-item">
            <div class="s-tl-dot brand"><i class="fa-solid fa-handshake fa-xs"></i></div>
            <div>
              <div class="s-tl-title">Commitment</div>
              <div class="s-tl-body">{{ $about['commitment'] }}</div>
            </div>
          </div>
          @endif
        </div>

        {{-- Core values --}}
        @if(!empty($features) && $features->isNotEmpty())
        <div class="s-values-grid reveal reveal-delay-3">
          @php $valIcons = ['fa-shield-halved','fa-leaf','fa-lightbulb','fa-users','fa-chart-line','fa-handshake','fa-star','fa-check-circle']; @endphp
          @foreach($features->take(6) as $fi => $feat)
          @php $isGreen = ($fi % 2 === 1); @endphp
          <div class="s-value-chip">
            <div class="s-vc-icon {{ $isGreen ? 'green' : 'brand' }}">
              <i class="fa-solid {{ $valIcons[$fi % count($valIcons)] }} fa-xs"></i>
            </div>
            <div>
              <div class="s-vc-name">{{ $feat->title }}</div>
              @if(!empty($feat->description))
              <div class="s-vc-desc">{{ Str::limit($feat->description, 70) }}</div>
              @endif
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>

    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════
     SECTORS
══════════════════════════════════════════════ --}}
<section class="section" id="sectors">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">Where We Operate</span>
      <h2 class="section-title">Industry Sectors We Serve</h2>
      <p class="section-desc mx-auto">From oil & gas to healthcare — our HSE expertise spans all major industries operating across East Africa.</p>
    </div>

    <div class="s-sector-grid reveal">
      @php
        $sectorIcons = [
          'fa-oil-well','fa-hard-hat','fa-industry','fa-truck','fa-leaf','fa-hospital',
          'fa-bolt','fa-ship','fa-building','fa-wheat-awn','fa-flask','fa-recycle'
        ];
      @endphp
      @foreach($sectors as $si => $sector)
      <div class="s-sector-card">
        <div class="s-sector-icon">
          <i class="fa-solid {{ $sectorIcons[$si % count($sectorIcons)] }}"></i>
        </div>
        <div class="s-sector-name">{{ $sector->name }}</div>
        @if(!empty($sector->description))
        <div class="s-sector-desc">{{ Str::limit($sector->description, 55) }}</div>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════
     TRAINING
══════════════════════════════════════════════ --}}
<section class="section section-alt" id="training">
  <div class="container">
    <div class="row mb-5 align-items-end">
      <div class="col-lg-6 reveal">
        <span class="section-label green">Training &amp; Courses</span>
        <h2 class="section-title">Professional HSE Training Programmes</h2>
        <p class="section-desc">Industry-recognised courses delivered on-site or at our facility, tailored to your organisation's needs.</p>
      </div>
      <div class="col-lg-6 reveal reveal-delay-1">
        <div class="s-training-notice">
          <i class="fa-solid fa-info-circle"></i>
          <div>
            <div class="s-tn-title">Flexible Scheduling</div>
            <div class="s-tn-body">All course durations and fees are available on request. We customise delivery to fit your team and timeline.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-3">
      @foreach($courses as $ci => $course)
      <div class="col-md-6 col-lg-4 reveal reveal-delay-{{ ($ci % 3) + 1 }}">
        <div class="s-training-card h-100">
          <div class="s-tc-header">
            <span class="s-tc-num">Course {{ $course->code ?? sprintf('%02d', $ci + 1) }}</span>
          </div>
          <div class="s-tc-body">
            <h3 class="s-tc-title">{{ $course->title }}</h3>
            @if(!empty($course->description))
            <p class="s-tc-desc">{{ Str::limit($course->description, 100) }}</p>
            @endif
          </div>
          <div class="s-tc-footer">
            <span class="s-tc-dot"></span>
            <span class="s-tc-mode">{{ $course->duration ?? 'Duration on request' }}</span>
            @if(!empty($course->price) && $course->price !== 'On request')
            <span class="ms-auto" style="font-size:.78rem;font-weight:700;color:var(--green)">{{ $course->price }}</span>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="text-center mt-4 reveal">
      <a href="#contact" class="btn btn-green">
        <i class="fa-solid fa-graduation-cap"></i> Enquire About Training
      </a>
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════
     WHY NOVAREX
══════════════════════════════════════════════ --}}
<section class="section" id="why-novarex">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">Why Choose Us</span>
      <h2 class="section-title">Built on Expertise, Driven by Results</h2>
      <p class="section-desc mx-auto">We combine deep technical knowledge with a commitment to delivering measurable outcomes for every client.</p>
    </div>

    <div class="row g-4">
      @php
        $whyData = [
          ['icon'=>'fa-shield-check','title'=>'Regulatory Compliance','desc'=>'Deep understanding of Tanzanian and international HSE regulations to keep your operations fully compliant.'],
          ['icon'=>'fa-users-gear','title'=>'Expert Team','desc'=>'Certified professionals with decades of combined experience across HSE, environmental, and sustainability disciplines.'],
          ['icon'=>'fa-chart-line','title'=>'Measurable Impact','desc'=>'We set clear KPIs from day one and track progress — every engagement is results-oriented.'],
          ['icon'=>'fa-handshake','title'=>'Partnership Approach','desc'=>'We work alongside your team, not just for them. Long-term relationships built on trust and transparency.'],
          ['icon'=>'fa-globe','title'=>'East African Coverage','desc'=>'Operations and project delivery across Tanzania and the wider East African region.'],
          ['icon'=>'fa-certificate','title'=>'International Standards','desc'=>'Aligned with ISO, NEBOSH, IOSH, and OSHA frameworks to meet global client requirements.'],
        ];
      @endphp
      @foreach($whyData as $wi => $why)
      <div class="col-md-6 col-lg-4 reveal reveal-delay-{{ ($wi % 3) + 1 }}">
        <div class="s-why-card">
          <span class="s-why-num">0{{ $wi + 1 }}</span>
          <div class="s-why-icon"><i class="fa-solid {{ $why['icon'] }}"></i></div>
          <h3 class="s-why-title">{{ $why['title'] }}</h3>
          <p class="s-why-desc">{{ $why['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════
     WORKPLACE POLICY BAND
══════════════════════════════════════════════ --}}
@if(!empty($settings['workplace_policy_title']))
<div class="container mb-5">
  <div class="s-policy-band reveal">
    <div>
      <span class="s-policy-eyebrow">Policy</span>
      <h2>{{ $settings['workplace_policy_title'] }}</h2>
      <p>Our workplace standards reflect our commitment to the highest levels of occupational health, safety, and environmental responsibility.</p>
    </div>
    <a href="{{ route('page', 'workplace-policy') }}" class="btn btn-outline" style="color:#fff;border-color:rgba(255,255,255,.3);flex-shrink:0">
      Read Policy <i class="fa-solid fa-arrow-right fa-xs ms-1"></i>
    </a>
  </div>
</div>
@endif

{{-- ══════════════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════════════ --}}
@if(!empty($testimonials) && $testimonials->isNotEmpty())
<section class="section section-alt" id="testimonials">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">Client Voices</span>
      <h2 class="section-title">What Our Clients Say</h2>
    </div>

    <div class="row g-4">
      @foreach($testimonials as $ti => $testimonial)
      <div class="col-md-6 col-lg-{{ $testimonials->count() > 2 ? '4' : '6' }} reveal reveal-delay-{{ ($ti % 3) + 1 }}">
        <div class="s-testimonial-card">
          <p class="s-testimonial-quote">{{ $testimonial->quote ?? $testimonial->content }}</p>
          <div class="s-testimonial-person">
            @if(!empty($testimonial->image))
              <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" loading="lazy">
            @else
              <div class="s-testimonial-avatar">{{ strtoupper(substr($testimonial->name ?? 'C', 0, 1)) }}</div>
            @endif
            <div>
              <div class="s-testimonial-name">{{ $testimonial->name ?? 'Client' }}</div>
              <div class="s-testimonial-role">{{ $testimonial->role ?? $testimonial->position ?? '' }}{{ !empty($testimonial->company) ? ', ' . $testimonial->company : '' }}</div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ══════════════════════════════════════════════
     GALLERY
══════════════════════════════════════════════ --}}
@if(!empty($gallery) && $gallery->isNotEmpty())
<section class="section" id="gallery">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <span class="section-label">Gallery</span>
      <h2 class="section-title">Our Work in Action</h2>
    </div>
    <div class="s-gallery-grid reveal">
      @foreach($gallery as $img)
      @if(!empty($img->image))
      <figure class="s-gallery-item">
        <img src="{{ asset('storage/' . $img->image) }}"
             alt="{{ $img->title ?? 'NOVAREX gallery' }}"
             loading="lazy"
             data-lightbox="gallery"
             data-src="{{ asset('storage/' . $img->image) }}"
             data-caption="{{ $img->title ?? '' }}">
        @if(!empty($img->title))
        <figcaption class="s-gallery-caption">{{ $img->title }}</figcaption>
        @endif
      </figure>
      @endif
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ══════════════════════════════════════════════
     BLOG
══════════════════════════════════════════════ --}}
@if(!empty($posts) && $posts->isNotEmpty())
<section class="section section-alt" id="news">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">Blog &amp; News</span>
      <h2 class="section-title">Latest from NOVAREX</h2>
    </div>
    <div class="row g-4">
      @foreach($posts as $pi => $post)
      <div class="col-md-6 col-lg-4 reveal reveal-delay-{{ $pi + 1 }}">
        <article class="s-blog-card">
          @if(!empty($post->featured_image))
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy">
          @else
            <div style="height:200px;background:var(--bg-alt);display:flex;align-items:center;justify-content:center">
              <i class="fa-solid fa-newspaper fa-2x text-muted"></i>
            </div>
          @endif
          <div class="s-blog-body">
            <div class="s-blog-date">{{ optional($post->published_at ?? $post->created_at)->format('d M Y') }}</div>
            <h3 class="s-blog-title">{{ $post->title }}</h3>
            <p class="s-blog-excerpt">{{ Str::limit(strip_tags($post->excerpt ?: $post->content), 120) }}</p>
            <a href="{{ route('blog.show', $post->slug) }}" class="s-blog-link">
              Read More <i class="fa-solid fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ══════════════════════════════════════════════
     FAQ
══════════════════════════════════════════════ --}}
@if(!empty($faqs) && $faqs->isNotEmpty())
<section class="section" id="faq">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4 reveal">
        <span class="section-label">FAQ</span>
        <h2 class="section-title">Frequently Asked Questions</h2>
        <p class="section-desc">Everything you need to know about our services, processes, and approach.</p>
        <a href="#contact" class="btn btn-outline mt-3">
          <i class="fa-regular fa-envelope fa-sm"></i> Ask a Question
        </a>
      </div>
      <div class="col-lg-8">
        <div class="s-faq-list reveal reveal-delay-1">
          @foreach($faqs as $faq)
          <div class="s-faq-item">
            <button class="s-faq-btn" type="button">
              <span>{{ $faq->question }}</span>
              <span class="s-faq-chevron"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="s-faq-answer">{{ $faq->answer }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endif

{{-- ══════════════════════════════════════════════
     CTA BAND
══════════════════════════════════════════════ --}}
<div class="container" style="padding-bottom:5rem">
  <div class="s-cta-band reveal">
    <h2>Ready to Build a Safer, More Sustainable Organisation?</h2>
    <p>Partner with NOVAREX for expert HSE consulting, environmental management, and sustainability solutions tailored to your industry.</p>
    <div class="s-cta-btns">
      <a href="#contact" class="btn btn-white btn-lg">
        <i class="fa-solid fa-calendar-check"></i> Request Consultation
      </a>
      @if(!empty($waUrl))
      <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="btn btn-lg" style="background:rgba(255,255,255,.12);color:#fff;border:1.5px solid rgba(255,255,255,.25)">
        <i class="fa-brands fa-whatsapp"></i> WhatsApp Us
      </a>
      @endif
    </div>
  </div>
</div>

{{-- ══════════════════════════════════════════════
     CONTACT
══════════════════════════════════════════════ --}}
<section class="section section-alt" id="contact">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <span class="section-label">Get In Touch</span>
      <h2 class="section-title">Contact Us</h2>
      <p class="section-desc mx-auto">Have a project in mind? We'd love to hear from you. Send us a message and we'll get back within one business day.</p>
    </div>

    <div class="row g-4">

      {{-- Contact Info --}}
      <div class="col-lg-4">
        <div class="s-contact-info reveal">
          <h4>{{ $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd' }}</h4>
          <p class="org-address">{{ $settings['address'] ?? $settings['location'] ?? '' }}</p>

          @if(!empty($settings['phone']))
          <div class="s-ci-row">
            <div class="s-ci-icon"><i class="fa-solid fa-phone fa-xs"></i></div>
            <div>
              <span class="s-ci-label">Phone</span>
              <a href="tel:{{ $phoneDigits }}" class="s-ci-val">{{ $settings['phone'] }}</a>
              @if(!empty($settings['phone_alt']))
              <a href="tel:{{ preg_replace('/[^+0-9]/', '', $settings['phone_alt']) }}" class="s-ci-val d-block" style="color:var(--text-muted);font-size:.8rem">{{ $settings['phone_alt'] }}</a>
              @endif
            </div>
          </div>
          @endif

          @if(!empty($settings['email']))
          <div class="s-ci-row">
            <div class="s-ci-icon"><i class="fa-regular fa-envelope fa-xs"></i></div>
            <div>
              <span class="s-ci-label">Email</span>
              <a href="mailto:{{ $settings['email'] }}" class="s-ci-val">{{ $settings['email'] }}</a>
            </div>
          </div>
          @endif

          @if(!empty($settings['address']))
          <div class="s-ci-row">
            <div class="s-ci-icon"><i class="fa-solid fa-location-dot fa-xs"></i></div>
            <div>
              <span class="s-ci-label">Location</span>
              <span class="s-ci-val">{{ $settings['footer_address'] ?? $settings['address'] }}</span>
            </div>
          </div>
          @endif

          {{-- Business hours --}}
          @if(!empty($settings['business_hours']))
          <div class="s-ci-row">
            <div class="s-ci-icon"><i class="fa-regular fa-clock fa-xs"></i></div>
            <div>
              <span class="s-ci-label">Business Hours</span>
              <span class="s-ci-val" style="font-size:.82rem">{{ $settings['business_hours'] }}</span>
            </div>
          </div>
          @endif

          {{-- Live working status --}}
          <div class="mb-1">
            <span class="s-live-badge live-status-badge" data-working="1">
              <span class="s-live-dot"></span> Checking...
            </span>
          </div>

          {{-- Working days mini table --}}
          @if(!empty($workingDays) && $workingDays->isNotEmpty())
          <div class="s-working-days mt-2">
            @foreach($workingDays as $day)
            <div class="s-wd-row">
              <span class="s-wd-day">{{ $day->day_name }}</span>
              @if($day->is_open)
                <span class="s-wd-time">{!! ($day->open_time ?: 'Open') . ($day->close_time ? ' &ndash; ' . e($day->close_time) : '') !!}</span>
              @else
                <span class="s-wd-closed">Closed</span>
              @endif
            </div>
            @endforeach
          </div>
          @endif

          {{-- Map --}}
          @if(!empty($mapEmbedUrl))
          <div class="s-map-wrap">
            <iframe src="{{ $mapEmbedUrl }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="NOVAREX Location"></iframe>
            <div class="s-map-actions">
              <div>
                <strong>{{ $settings['website_short_name'] ?? 'NOVAREX' }}</strong>
                <span>{{ $settings['footer_address'] ?? $settings['address'] ?? '' }}</span>
              </div>
              <div class="s-map-btns">
                <a href="{{ $mapSearchUrl }}" target="_blank" rel="noopener" class="btn btn-outline btn-sm"><i class="fa-solid fa-search-location fa-xs"></i></a>
                <a href="{{ $mapDirectionsUrl }}" target="_blank" rel="noopener" class="btn btn-primary btn-sm"><i class="fa-solid fa-diamond-turn-right fa-xs"></i></a>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>

      {{-- Contact Form --}}
      <div class="col-lg-8">
        <div class="s-form-card reveal reveal-delay-1">
          <h4>Send Us a Message</h4>
          <p class="form-sub">We respond to all enquiries within one business day.</p>

          {{-- Flash messages --}}
          @if(session('success'))
          <div class="s-toast success"><i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}</div>
          @endif
          @if(session('error'))
          <div class="s-toast danger"><i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}</div>
          @endif

          <form action="{{ route('contact.submit') }}" method="POST" novalidate>
            @csrf
            <div class="row g-3">
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="fname" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                  <label for="fname">Full Name</label>
                  @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="femail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                  <label for="femail">Email Address</label>
                  @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="fphone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                  <label for="fphone">Phone (optional)</label>
                  @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-select @error('subject') is-invalid @enderror" id="fsubject" name="subject">
                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select service…</option>
                    @foreach($services as $svc)
                    <option value="{{ $svc->title }}" {{ old('subject') === $svc->title ? 'selected' : '' }}>{{ $svc->title }}</option>
                    @endforeach
                    <option value="Training" {{ old('subject') === 'Training' ? 'selected' : '' }}>Training / Course Enquiry</option>
                    <option value="Other" {{ old('subject') === 'Other' ? 'selected' : '' }}>Other Enquiry</option>
                  </select>
                  <label for="fsubject">Service</label>
                  @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control @error('message') is-invalid @enderror" id="fmessage" name="message" placeholder="Message" style="height:130px" required>{{ old('message') }}</textarea>
                  <label for="fmessage">Your Message</label>
                  @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg w-100">
                  <i class="fa-solid fa-paper-plane"></i> Send Message
                </button>
              </div>
            </div>
          </form>

          {{-- Corporate email directory --}}
          @if(!empty($corporateEmails) && $corporateEmails->isNotEmpty())
          <div class="s-email-directory">
            <h4><i class="fa-solid fa-building fa-sm me-2" style="color:var(--brand)"></i>Direct Department Emails</h4>
            <div class="s-email-list">
              @foreach($corporateEmails as $ce)
              <a href="mailto:{{ $ce->email }}" target="_blank" rel="noopener">
                <i class="fa-regular fa-envelope"></i>
                <div>
                  <strong>{{ $ce->label ?? $ce->name ?? $ce->email }}</strong>
                  <small>{{ $ce->email }}</small>
                </div>
                <i class="fa-solid fa-arrow-up-right-from-square ms-auto" style="font-size:.7rem;color:var(--text-light)"></i>
              </a>
              @endforeach
            </div>
          </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</section>

{{-- Working days JSON for JS --}}
@php
$_wdJson = $workingDays->map(function ($d) {
    return ['day_name' => $d->day_name, 'is_open' => (bool) $d->is_open, 'open_time' => $d->open_time, 'close_time' => $d->close_time];
});
@endphp
<script type="application/json" id="working-days-json">@json($_wdJson)</script>

{{-- ══ LIGHTBOX ══ --}}
<div class="s-lightbox" id="s-lightbox" role="dialog" aria-modal="true" aria-label="Image viewer" tabindex="-1">
  <button class="s-lb-close" id="s-lb-close" aria-label="Close image viewer">
    <i class="fa-solid fa-xmark"></i>
  </button>
  <span class="s-lb-counter" id="s-lb-counter"></span>
  <div class="s-lb-inner">
    <img class="s-lb-img" id="s-lb-img" src="" alt="">
    <p class="s-lb-caption" id="s-lb-caption"></p>
  </div>
  <button class="s-lb-prev" id="s-lb-prev" aria-label="Previous image">
    <i class="fa-solid fa-chevron-left"></i>
  </button>
  <button class="s-lb-next" id="s-lb-next" aria-label="Next image">
    <i class="fa-solid fa-chevron-right"></i>
  </button>
</div>

@include('themes.saas.partials.footer')
