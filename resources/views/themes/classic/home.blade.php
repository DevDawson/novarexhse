@include('partials.head')
@include('partials.nav')

{{-- ===== HERO ===== --}}
<header id="home" class="hero" role="banner" aria-label="NOVAREX Hero" {!! $heroStyle !!}>
  <div class="hero-orb hero-orb-1"></div>
  <div class="hero-orb hero-orb-2"></div>
  <div class="hero-orb hero-orb-3"></div>

  <div class="container position-relative" style="z-index:2">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 hero-content">
        <div class="eyebrow reveal">
          <i class="fa-solid fa-shield-heart"></i>
          {{ $hero['eyebrow'] ?? '' }}
        </div>
        <h1 class="hero-headline reveal reveal-delay-1">{!! $heroTitle !!}</h1>
        <p class="hero-lead reveal reveal-delay-2">{{ $hero['subtitle'] ?? '' }}</p>

        <div class="hero-cta-row reveal reveal-delay-3">
          <a href="{{ $waUrl }}" class="btn btn-whatsapp">
            <i class="fa-brands fa-whatsapp me-2"></i>WhatsApp Us
          </a>
          <a href="{{ $hero['button_url'] ?? '#contact' }}" class="btn btn-primary-brand">
            <i class="fa-regular fa-paper-plane me-2"></i>{{ $hero['button_text'] ?? 'Request Consultation' }}
          </a>
          <a href="#services" class="btn btn-ghost">
            Explore Services <i class="fa-solid fa-arrow-right ms-1" style="font-size:.75rem"></i>
          </a>
        </div>

        <div class="hero-stats reveal reveal-delay-4">
          @foreach($homeStats as $stat)
          <div class="hero-stat">
            <span class="stat-num {{ $stat['accent'] }}"><span class="counter-num" data-target="{{ $stat['value'] }}">0</span>+</span>
            <span class="stat-label">{{ $stat['label'] }}</span>
          </div>
          @endforeach
        </div>
      </div>

      <div class="col-lg-6 reveal reveal-delay-2">
        <div class="hero-panel">
          @if(!empty($hero['image']))
            <img class="hero-panel-image" src="{{ asset('storage/' . $hero['image']) }}"
                 alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }} HSE Consultancy Services"
                 loading="eager" decoding="async" width="520" height="360">
          @endif
          <div class="d-flex align-items-center justify-content-between" style="margin-bottom:1.2rem">
            <div>
              <div style="font-family:'Montserrat',sans-serif;font-weight:800;font-size:1.05rem;color:var(--text)">Our Services</div>
              <div style="font-size:.8rem;color:var(--muted)">Integrated HSE &amp; Sustainability solutions</div>
            </div>
            <div style="display:flex;gap:.4rem">
              <div style="width:8px;height:8px;border-radius:50%;background:var(--green);"></div>
              <div style="width:8px;height:8px;border-radius:50%;background:var(--brand);opacity:.5"></div>
              <div style="width:8px;height:8px;border-radius:50%;background:var(--border);"></div>
            </div>
          </div>

          <div class="d-flex flex-column gap-2" style="position:relative;z-index:1">
            @foreach($services->take(7) as $service)
            <div class="service-pill">
              <div class="sp-icon {{ ($service->accent ?? 'blue') === 'green' ? 'green' : 'blue' }}">
                <i class="{{ $service->icon ?? 'fa-solid fa-layer-group' }}"></i>
              </div>
              <div>
                <span class="sp-name">{{ $service->title }}</span>
                <span class="sp-sub">{{ \Illuminate\Support\Str::limit(strip_tags($service->description ?? ''), 72) }}</span>
              </div>
            </div>
            @endforeach
          </div>

          <div class="hero-panel-footer" style="position:relative;z-index:1">
            <div class="contact-badge">
              <div class="cb-icon"><i class="fa-brands fa-whatsapp"></i></div>
              <div><div class="cb-text">Quick Consultation</div><div class="cb-val">{{ $settings['phone'] ?? '' }}</div></div>
            </div>
            <div class="contact-badge">
              <div class="cb-icon"><i class="fa-solid fa-location-dot"></i></div>
              <div><div class="cb-text">Location</div><div class="cb-val">{{ $settings['location'] ?? '' }}</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<main id="main-content" role="main">

{{-- ===== VALUE STRIP ===== --}}
<div class="value-strip">
  <div class="container">
    <div class="row g-2">
      <div class="col-md-3 col-12 reveal"><div class="value-item"><div class="value-icon"><i class="fa-solid fa-person-walking-arrow-right"></i></div><div><div class="value-title">Safer Workplaces</div><div class="value-desc">Reduce hazards and build safety culture</div></div></div></div>
      <div class="col-md-3 col-12 reveal reveal-delay-1"><div class="value-item"><div class="value-icon"><i class="fa-solid fa-scale-balanced"></i></div><div><div class="value-title">Regulatory Compliance</div><div class="value-desc">Align with international standards</div></div></div></div>
      <div class="col-md-3 col-12 reveal reveal-delay-2"><div class="value-item"><div class="value-icon"><i class="fa-solid fa-seedling"></i></div><div><div class="value-title">Sustainable Growth</div><div class="value-desc">Build long-term responsible performance</div></div></div></div>
      <div class="col-md-3 col-12 reveal reveal-delay-3"><div class="value-item"><div class="value-icon"><i class="fa-solid fa-triangle-exclamation"></i></div><div><div class="value-title">Resilient Operations</div><div class="value-desc">Prepare for disruption, manage risk</div></div></div></div>
    </div>
  </div>
</div>

{{-- ===== CAPABILITIES MARQUEE ===== --}}
@if(count($marqueeItems))
<section class="marquee-band" aria-label="NOVAREX capabilities and sectors">
  <div class="marquee-track">
    @for($repeat = 0; $repeat < 2; $repeat++)
    <div class="marquee-group" @if($repeat === 1) aria-hidden="true" @endif>
      @foreach($marqueeItems as $item)
      <span class="marquee-item">
        <i class="{{ $item['icon'] }}"></i>
        <span>{{ $item['label'] }}</span>
      </span>
      @endforeach
    </div>
    @endfor
  </div>
</section>
@endif

{{-- ===== ABOUT SECTION ===== --}}
<section class="section" id="about">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-5">
        <span class="eyebrow reveal"><i class="fa-solid fa-circle-info"></i>{{ $about['eyebrow'] ?? '' }}</span>
        <h2 class="section-heading reveal reveal-delay-1">{{ $about['title'] ?? '' }}</h2>
        <p class="section-sub reveal reveal-delay-2">{{ $about['subtitle'] ?? '' }}</p>

        <div class="timeline-v2 reveal reveal-delay-3">
          <div class="timeline-item"><div class="timeline-dot"><i class="fa-solid fa-binoculars"></i></div><div class="timeline-body"><h5>Our Vision</h5><p>{{ $about['vision'] ?? '' }}</p></div></div>
          <div class="timeline-item"><div class="timeline-dot"><i class="fa-solid fa-crosshairs"></i></div><div class="timeline-body"><h5>Our Mission</h5><p>{{ $about['mission'] ?? '' }}</p></div></div>
          <div class="timeline-item"><div class="timeline-dot"><i class="fa-solid fa-handshake"></i></div><div class="timeline-body"><h5>Our Commitment</h5><p>{{ $about['commitment'] ?? ($about['content'] ?? '') }}</p></div></div>
        </div>
      </div>

      <div class="col-lg-7 reveal reveal-delay-2">
        <div class="about-card">
          @if(!empty($about['image']))
            <img class="about-cms-image" src="{{ asset('storage/' . $about['image']) }}"
                 alt="About NOVAREX - HSE Consultancy professionals in Mwanza Tanzania"
                 loading="lazy" decoding="async" width="700" height="460">
          @endif
          <h4 style="font-family:'Montserrat',sans-serif;font-weight:800;font-size:1.2rem;margin-bottom:.5rem;color:var(--text)">Core Values</h4>
          <p style="font-size:.88rem;color:var(--muted);margin-bottom:0">The principles that guide every engagement and client relationship.</p>
          <div class="value-grid">
            <div class="value-tile"><div class="vt-icon blue"><i class="fa-solid fa-shield-halved"></i></div><h6>Safety First</h6><p>Promoting safe workplaces, prevention culture, and proactive risk reduction across all sectors.</p></div>
            <div class="value-tile"><div class="vt-icon green"><i class="fa-solid fa-leaf"></i></div><h6>Sustainable Future</h6><p>Supporting sustainable growth, long-term resilience, and responsible environmental stewardship.</p></div>
            <div class="value-tile"><div class="vt-icon green"><i class="fa-solid fa-tree"></i></div><h6>Environmental Stewardship</h6><p>Encouraging responsible environmental management, conservation, and sound practice.</p></div>
            <div class="value-tile"><div class="vt-icon blue"><i class="fa-solid fa-circle-check"></i></div><h6>Quality &amp; Compliance</h6><p>Delivering professional services aligned with international standards, regulations, and best practice.</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider-line"></div>

{{-- ===== EXPERTISE SECTION ===== --}}
<section class="section section-alt" id="expertise">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-5">
        <span class="eyebrow reveal"><i class="fa-solid fa-user-shield"></i>Our Expertise</span>
        <h2 class="section-heading reveal reveal-delay-1">{{ $settings['expertise_title'] ?? '' }}</h2>
      </div>
      <div class="col-lg-7">
        <div class="expertise-panel reveal reveal-delay-2">
          <p>{{ $settings['expertise_content'] ?? '' }}</p>
          <div class="expertise-badges">
            <span>OSHA Tanzania</span>
            <span>SGS</span>
            <span>IOSH</span>
            <span>NEBOSH</span>
            <span>CQI/IRCA</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider-line"></div>

{{-- ===== SERVICES SECTION ===== --}}
<section class="section section-alt" id="services">
  <div class="container">
    <div class="row mb-5 align-items-end">
      <div class="col-lg-8">
        <span class="eyebrow reveal"><i class="fa-solid fa-layer-group"></i>Our Services</span>
        <h2 class="section-heading reveal reveal-delay-1">Integrated HSE, sustainability, environmental, and resilience solutions.</h2>
        <p class="section-sub reveal reveal-delay-2">Comprehensive consultancy services designed to strengthen compliance, operational safety, environmental performance, and long-term organizational resilience.</p>
      </div>
      <div class="col-lg-4 text-lg-end reveal reveal-delay-2">
        <a href="#contact" class="btn btn-primary-brand">Get a Proposal <i class="fa-solid fa-arrow-right ms-1" style="font-size:.75rem"></i></a>
      </div>
    </div>

    <div class="row g-4">
      @foreach($services as $index => $service)
      <div class="col-md-6 col-xl-4 reveal {{ $index % 3 === 1 ? 'reveal-delay-1' : ($index % 3 === 2 ? 'reveal-delay-2' : '') }}">
        <div class="service-card {{ ($service->accent ?? '') === 'green' ? 'green-accent' : '' }}">
          @if(!empty($service->image))
            <img class="svc-card-image" src="{{ asset('storage/' . $service->image) }}"
                 alt="{{ $service->title }} - NOVAREX Service" loading="lazy" decoding="async" width="420" height="220">
          @endif
          <div class="svc-icon {{ ($service->accent ?? 'blue') === 'green' ? 'green' : 'blue' }}">
            <i class="{{ $service->icon ?? 'fa-solid fa-layer-group' }}"></i>
          </div>
          <h3 class="svc-title">{{ $service->title }}</h3>
          <p class="svc-desc">{{ $service->description }}</p>
          @if(!empty($service->tag))
            <span class="svc-tag {{ ($service->accent ?? 'blue') === 'green' ? 'green' : 'blue' }}">{{ $service->tag }}</span>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider-line"></div>

{{-- ===== SECTORS SECTION ===== --}}
<section class="section" id="sectors">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8">
        <span class="eyebrow reveal"><i class="fa-solid fa-industry"></i>Sectors</span>
        <h2 class="section-heading reveal reveal-delay-1">Industries and organizations we support.</h2>
        <p class="section-sub reveal reveal-delay-2">NOVAREX supports high-risk, regulated, operational, and development-focused sectors with practical HSE, environmental, quality, energy, and sustainability expertise.</p>
      </div>
    </div>
    <div class="sector-grid">
      @foreach($sectors as $sector)
      <div class="sector-card reveal">
        <div class="sector-icon"><i class="{{ $sector->icon ?? 'fa-solid fa-building' }}"></i></div>
        <h3>{{ $sector->title }}</h3>
        <p>{{ $sector->description ?? '' }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider-line"></div>

{{-- ===== TRAINING SECTION ===== --}}
<section class="section" id="training">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <span class="eyebrow reveal green"><i class="fa-solid fa-person-chalkboard"></i>Professional Training</span>
        <h2 class="section-heading reveal reveal-delay-1">Structured learning that turns standards into everyday practice.</h2>
        <p class="section-sub reveal reveal-delay-2">NOVAREX provides professional training and capacity-building programs grounded in our consultancy service areas.</p>
        <div class="training-notice reveal reveal-delay-3">
          <i class="fa-solid fa-circle-info mt-1"></i>
          <div>
            <div class="tn-title">Professional Training Programs Only</div>
            <p class="tn-body">Programs focus on professional awareness, implementation support, internal auditing skills, and organizational capacity building.</p>
          </div>
        </div>
        <div class="mt-4 reveal reveal-delay-4">
          <a href="#contact" class="btn btn-primary-brand w-100"><i class="fa-solid fa-calendar-check me-2"></i>Enquire About Training</a>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="row g-3">
          @foreach($courses as $index => $course)
          <div class="col-md-6 reveal {{ $index % 2 ? 'reveal-delay-1' : '' }}">
            <div class="training-card">
              @if(!empty($course->image))
                <img class="training-card-image" src="{{ asset('storage/' . $course->image) }}"
                     alt="{{ $course->title }} - NOVAREX Training" loading="lazy" decoding="async" width="420" height="220">
              @endif
              <span class="tc-num">{{ $course->code ?? str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
              <h4 class="tc-title">{{ $course->title }}</h4>
              <p class="tc-desc">{{ $course->description }}</p>
              <div class="tc-footer">
                <div class="tc-dot"></div>
                <span class="tc-mode">{{ $course->mode ?? '' }}{{ !empty($course->duration) ? ' - ' . $course->duration : '' }}{{ !empty($course->price) ? ' - ' . $course->price : '' }}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider-line"></div>

{{-- ===== WHY NOVAREX SECTION ===== --}}
<section class="section section-alt" id="why">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8">
        <span class="eyebrow reveal"><i class="fa-solid fa-award"></i>Why NOVAREX</span>
        <h2 class="section-heading reveal reveal-delay-1">The trusted choice for organizations that demand professional HSE and sustainability expertise.</h2>
        <p class="section-sub reveal reveal-delay-2">NOVAREX delivers practical, standards-based consultancy services focused on safety, environmental compliance, sustainability, and operational resilience.</p>
      </div>
    </div>

    <div class="trust-bar mb-5 reveal">
      @foreach($homeStats as $stat)
      <div class="trust-item">
        <span class="trust-num"><span class="counter-num" data-target="{{ $stat['value'] }}">0</span>+</span>
        <span class="trust-label">{{ $stat['label'] }}</span>
      </div>
      @endforeach
    </div>

    <div class="row g-4">
      @foreach($features as $index => $feature)
      <div class="col-md-6 col-lg-4 reveal {{ $index % 3 === 1 ? 'reveal-delay-1' : ($index % 3 === 2 ? 'reveal-delay-2' : '') }}">
        <div class="why-card">
          <span class="wc-num">{{ str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
          <div class="wc-icon"><i class="{{ $feature->icon ?? 'fa-solid fa-star' }}"></i></div>
          <h5>{{ $feature->title }}</h5>
          <p>{{ $feature->description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider-line"></div>

{{-- ===== WORKPLACE POLICY BAND ===== --}}
<section class="section" id="workplace-policy">
  <div class="container">
    <div class="policy-band reveal">
      <div>
        <span class="eyebrow"><i class="fa-solid fa-shield-heart"></i>Novarex Management Policies</span>
        <h2>{{ $settings['workplace_policy_title'] ?? '' }}</h2>
        <p>{{ \Illuminate\Support\Str::limit(strip_tags($settings['workplace_policy_content'] ?? ''), 360) }}</p>
      </div>
      <a class="btn btn-small btn-primary-brand" href="{{ route('page', 'workplace-policy') }}">Read Policy</a>
    </div>
  </div>
</section>

{{-- ===== TESTIMONIALS SECTION ===== --}}
@if($testimonials->isNotEmpty())
<div class="divider-line"></div>
<section class="section" id="testimonials">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8">
        <span class="eyebrow reveal"><i class="fa-solid fa-comment-dots"></i>Testimonials</span>
        <h2 class="section-heading reveal reveal-delay-1">Client feedback from practical HSE and sustainability work.</h2>
      </div>
    </div>
    <div class="row g-4">
      @foreach($testimonials as $testimonial)
      <div class="col-md-6 col-lg-4 reveal">
        <div class="testimonial-card">
          <p>{{ $testimonial->quote }}</p>
          <div class="testimonial-person">
            @if(!empty($testimonial->image))
              <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" loading="lazy" decoding="async" width="80" height="80">
            @endif
            <div>
              <strong>{{ $testimonial->name }}</strong>
              <span>{{ trim(($testimonial->position ?? '') . ' ' . ($testimonial->company ?? '')) }}</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ===== GALLERY SECTION ===== --}}
@if($gallery->isNotEmpty())
<div class="divider-line"></div>
<section class="section section-alt" id="gallery">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8">
        <span class="eyebrow reveal"><i class="fa-solid fa-images"></i>Gallery</span>
        <h2 class="section-heading reveal reveal-delay-1">Project and Highlights.</h2>
      </div>
    </div>
    <div class="gallery-grid">
      @foreach($gallery as $image)
      <figure class="gallery-item reveal">
        <img src="{{ asset('storage/' . $image->image) }}"
             alt="{{ $image->title ?? 'Gallery image - NOVAREX project' }}"
             loading="lazy" decoding="async" width="600" height="400">
        <figcaption>
          <strong>{{ $image->title ?? '' }}</strong>
          <span>{{ $image->category ?? '' }}</span>
        </figcaption>
      </figure>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ===== BLOG / NEWS SECTION ===== --}}
@if($posts->isNotEmpty())
<div class="divider-line"></div>
<section class="section" id="blog">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8">
        <span class="eyebrow reveal"><i class="fa-solid fa-newspaper"></i>Blog &amp; News</span>
        <h2 class="section-heading reveal reveal-delay-1">Insights, updates, and professional guidance.</h2>
      </div>
    </div>
    <div class="row g-4">
      @foreach($posts as $post)
      <div class="col-md-6 col-lg-4 reveal">
        <article class="blog-card">
          @if(!empty($post->featured_image))
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy" decoding="async" width="600" height="340">
          @endif
          <div class="blog-card-body">
            <span>{{ $post->published_at?->format('M d, Y') }}</span>
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 120) }}</p>
            <a href="{{ route('blog.show', $post->slug) }}">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<div class="divider-line"></div>

{{-- ===== FAQ SECTION ===== --}}
<section class="section section-alt" id="faq">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5">
        <span class="eyebrow reveal"><i class="fa-solid fa-circle-question"></i>FAQ</span>
        <h2 class="section-heading reveal reveal-delay-1">Frequently asked questions.</h2>
        <p class="section-sub reveal reveal-delay-2">Quick answers about NOVAREX services, training, ISO support, proposals, and engagement process.</p>
      </div>
      <div class="col-lg-7">
        <div class="faq-list reveal reveal-delay-2">
          @foreach($faqs as $index => $faq)
          <details class="faq-item" @if($index === 0) open @endif>
            <summary>{{ $faq->question }}</summary>
            <p>{{ $faq->answer }}</p>
          </details>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider-line"></div>

{{-- ===== CONTACT SECTION ===== --}}
<section class="section" id="contact">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-7">
        <span class="eyebrow reveal"><i class="fa-solid fa-envelope"></i>Contact &amp; Location</span>
        <h2 class="section-heading reveal reveal-delay-1">Ready to strengthen your HSE and sustainability performance? <span class="accent-blue">Let's talk.</span></h2>
        <p class="section-sub reveal reveal-delay-2">Contact NOVAREX to discuss your consultancy requirements, request a proposal, or enquire about professional training programs.</p>
      </div>
    </div>

    @if(session('success'))
    <div class="site-toast success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="site-toast danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">
      {{-- Contact Info Card --}}
      <div class="col-lg-4">
        <div class="contact-info-card reveal">
          <h4 style="font-family:'Montserrat',sans-serif;font-weight:800;font-size:1.2rem;color:var(--text);margin-bottom:.3rem">{{ $settings['website_name'] ?? '' }}</h4>
          <p style="font-size:.84rem;color:var(--muted);margin-bottom:1.3rem;line-height:1.5">{{ $settings['address'] ?? '' }}</p>

          <div class="cinfo-row"><div class="cinfo-icon"><i class="fa-solid fa-phone"></i></div><div><div class="cinfo-label">Phone</div><div class="cinfo-val">{{ $settings['phone'] ?? '' }}</div><div class="cinfo-val" style="font-size:.82rem;color:var(--muted)">{{ $settings['phone_alt'] ?? '' }}</div></div></div>
          <div class="cinfo-row"><div class="cinfo-icon"><i class="fa-solid fa-envelope"></i></div><div><div class="cinfo-label">Email</div><div class="cinfo-val">{{ $settings['email'] ?? '' }}</div></div></div>
          <div class="cinfo-row"><div class="cinfo-icon"><i class="fa-solid fa-clock"></i></div><div><div class="cinfo-label">Business Hours</div><div class="cinfo-val">{{ $settings['business_hours'] ?? '' }}</div></div></div>
          <div class="cinfo-row">
            <div class="cinfo-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div>
              <div class="cinfo-label">Location</div>
              <div class="cinfo-val">{{ $settings['location'] ?? '' }}</div>
              @if($mapCoordinates)<div class="cinfo-val map-gps">GPS: {{ $mapCoordinates }}</div>@endif
            </div>
          </div>

          {{-- Working days mini table --}}
          <div class="working-days-mini">
            @foreach($workingDays as $day)
            <div>
              <span>{{ substr($day->day_name, 0, 3) }}</span>
              <strong>
                @if($day->is_open)
                  {!! ($day->open_time ?: 'Open') . ($day->close_time ? ' &nbsp; - &nbsp; ' . e($day->close_time) : '') !!}
                @else
                  Closed
                @endif
              </strong>
            </div>
            @endforeach
          </div>

          <div class="mt-4 d-flex flex-column gap-2">
            <a href="{{ $waUrl }}" class="btn btn-whatsapp w-100"><i class="fa-brands fa-whatsapp me-2"></i>Open WhatsApp Chat</a>
            <a href="tel:{{ $phoneDigits }}" class="btn btn-ghost w-100"><i class="fa-solid fa-phone me-2"></i>Call Now</a>
            @if(!empty($settings['linkedin']))<a href="{{ $settings['linkedin'] }}" class="btn btn-ghost w-100"><i class="fa-brands fa-linkedin me-2"></i>Connect on LinkedIn</a>@endif
            <a href="{{ route('links') }}" class="btn btn-ghost w-100"><i class="fa-solid fa-link me-2"></i>Other Links</a>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        {{-- Contact Form --}}
        <form class="form-card reveal reveal-delay-1" method="POST" action="{{ route('contact.submit') }}" data-ajax-contact>
          @csrf
          <h4>Send an Inquiry</h4>
          <p class="form-sub">Complete the form below and the NOVAREX team will respond within one business day.</p>

          @if($errors->any())
          <div class="alert alert-danger mb-3">
            <ul class="mb-0">@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul>
          </div>
          @endif

          <div class="row g-3">
            <div class="col-md-6"><div class="form-floating"><input type="text" class="form-control" name="name" id="f-name" placeholder="Full Name" value="{{ old('name') }}" required><label for="f-name">Full Name</label></div></div>
            <div class="col-md-6"><div class="form-floating"><input type="text" class="form-control" name="company" id="f-company" placeholder="Organisation" value="{{ old('company') }}"><label for="f-company">Organisation / Company</label></div></div>
            <div class="col-md-6"><div class="form-floating"><input type="email" class="form-control" name="email" id="f-email" placeholder="Email" value="{{ old('email') }}" required><label for="f-email">Email Address</label></div></div>
            <div class="col-md-6"><div class="form-floating"><input type="tel" class="form-control" name="phone" id="f-phone" placeholder="Phone" value="{{ old('phone') }}"><label for="f-phone">Phone Number</label></div></div>
            <div class="col-12">
              <div class="form-floating">
                <select class="form-select" name="service" id="f-service">
                  <option value="">Select a service area</option>
                  @foreach($services as $service)<option @selected(old('service') === $service->title)>{{ $service->title }}</option>@endforeach
                  <option @selected(old('service') === 'General Inquiry')>General Inquiry</option>
                </select>
                <label for="f-service">Service Area of Interest</label>
              </div>
            </div>
            <div class="col-12"><div class="form-floating"><textarea class="form-control" name="message" id="f-message" placeholder="Message" style="height:130px" required>{{ old('message') }}</textarea><label for="f-message">Your Message</label></div></div>
            <div class="col-12 d-flex flex-wrap gap-2">
              <button class="btn btn-primary-brand px-4" type="submit"><i class="fa-solid fa-paper-plane me-2"></i>Submit Inquiry</button>
              <a href="{{ $waUrl }}" class="btn btn-whatsapp px-4"><i class="fa-brands fa-whatsapp me-2"></i>WhatsApp Instead</a>
            </div>
          </div>
        </form>

        {{-- Corporate Emails Directory --}}
        @if($corporateEmails->isNotEmpty())
        <div class="email-directory reveal reveal-delay-2">
          <h4>Corporate Emails</h4>
          <div class="email-grid">
            @foreach($corporateEmails as $email)
            <a href="mailto:{{ $email->email }}">
              <i class="fa-solid fa-envelope"></i>
              <span>
                <strong>{{ $email->email }}</strong>
                <small>{{ trim(($email->label ?? '') . ($email->person_name ? ' - ' . $email->person_name : '')) }}</small>
              </span>
            </a>
            @endforeach
          </div>
        </div>
        @endif

        {{-- Google Maps Embed --}}
        <div class="map-wrap reveal reveal-delay-2">
          <iframe title="NOVAREX Office Location - Nyasaka A, Mwanza, Tanzania"
                  src="{{ $mapEmbedUrl }}"
                  loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                  aria-label="Interactive map showing NOVAREX office location in Mwanza Tanzania"></iframe>
          <div class="map-actions">
            <div>
              <strong>NOVAREX HQ, Nyasaka A Mwanza</strong>
              <span>{{ $mapCoordinates }}</span>
            </div>
            <div class="map-action-buttons">
              <a href="{{ $mapSearchUrl }}" class="btn btn-ghost btn-sm" target="_blank" rel="noopener"><i class="fa-solid fa-map-location-dot me-1"></i>Open Map</a>
              <a href="{{ $mapDirectionsUrl }}" class="btn btn-primary-brand btn-sm" target="_blank" rel="noopener"><i class="fa-solid fa-route me-1"></i>Directions</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

@include('partials.footer')
