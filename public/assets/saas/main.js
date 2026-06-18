/* NOVAREX SaaS UI — main.js */
'use strict';

/* ── SCROLL REVEAL ── */
(function () {
  const els = document.querySelectorAll('.reveal');
  if (!els.length) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
  }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
  els.forEach(el => io.observe(el));
})();

/* ── NAVBAR SCROLL ── */
(function () {
  const nav = document.getElementById('s-navbar');
  if (!nav) return;
  const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 30);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
})();

/* ── DARK MODE TOGGLE ── */
(function () {
  const html  = document.documentElement;
  const btn   = document.getElementById('theme-toggle');
  const icon  = document.getElementById('theme-icon');
  if (!btn) return;

  const apply = (theme) => {
    html.dataset.theme = theme;
    localStorage.setItem('nvx_theme', theme);
    if (icon) {
      icon.className = theme === 'dark' ? 'fa-solid fa-sun' : 'fa-solid fa-moon';
    }
    btn.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
  };

  // Sync icon with whatever theme was set by the inline script (or default)
  apply(html.dataset.theme || localStorage.getItem('nvx_theme') || 'light');

  btn.addEventListener('click', () => {
    apply(html.dataset.theme === 'dark' ? 'light' : 'dark');
  });
})();

/* ── ANIMATED COUNTERS ── */
(function () {
  const targets = document.querySelectorAll('[data-count]');
  if (!targets.length) return;
  const fmt = (n) => n >= 1000 ? (n / 1000).toFixed(1).replace('.0', '') + 'k' : n;
  const animate = (el) => {
    const target = +el.dataset.count;
    const suffix = el.dataset.suffix || '';
    const dur = 1800;
    const start = performance.now();
    const step = (now) => {
      const progress = Math.min((now - start) / dur, 1);
      const ease = 1 - Math.pow(1 - progress, 3);
      el.textContent = fmt(Math.round(ease * target)) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { animate(e.target); io.unobserve(e.target); } });
  }, { threshold: 0.3 });
  targets.forEach(el => io.observe(el));
})();

/* ── FAQ ACCORDION ── */
(function () {
  document.querySelectorAll('.s-faq-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.s-faq-item');
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.s-faq-item.open').forEach(i => i.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    });
  });
  const first = document.querySelector('.s-faq-item');
  if (first) first.classList.add('open');
})();

/* ── COOKIE BANNER ── */
(function () {
  const banner = document.getElementById('s-cookie');
  if (!banner) return;
  if (localStorage.getItem('nvx_cookie') === '1') { banner.remove(); return; }
  const btn = document.getElementById('s-cookie-accept');
  if (btn) btn.addEventListener('click', () => {
    localStorage.setItem('nvx_cookie', '1');
    banner.style.transition = 'opacity .3s,transform .3s';
    banner.style.opacity = '0';
    banner.style.transform = 'translateX(-50%) translateY(16px)';
    setTimeout(() => banner.remove(), 350);
  });
})();

/* ── LIVE WORKING STATUS ── */
(function () {
  const badges = document.querySelectorAll('.live-status-badge, .s-live-badge[data-working]');
  if (!badges.length) return;

  const rawEl = document.getElementById('working-days-json');
  if (!rawEl) return;
  let days;
  try { days = JSON.parse(rawEl.textContent); } catch { return; }

  const DAY_MAP = { 0: 'Sunday', 1: 'Monday', 2: 'Tuesday', 3: 'Wednesday', 4: 'Thursday', 5: 'Friday', 6: 'Saturday' };
  const toMin = (t) => { if (!t) return null; const [h, m] = t.split(':').map(Number); return h * 60 + m; };

  const check = () => {
    const now = new Date(new Date().toLocaleString('en-US', { timeZone: 'Africa/Dar_es_Salaam' }));
    const dayName = DAY_MAP[now.getDay()];
    const curMin = now.getHours() * 60 + now.getMinutes();
    const today = days.find(d => d.day_name === dayName);
    const open = today && today.is_open && toMin(today.open_time) !== null && toMin(today.close_time) !== null
      && curMin >= toMin(today.open_time) && curMin < toMin(today.close_time);
    const label = open ? 'Open Now' : 'Closed';
    badges.forEach(b => {
      b.className = b.className.replace(/\b(open|closed)\b/g, '');
      b.classList.add('live-status-badge', 's-live-badge', open ? 'open' : 'closed');
      b.innerHTML = `<span class="s-live-dot"></span> ${label}`;
    });
  };
  check();
  setInterval(check, 60000);
})();

/* ── GALLERY LIGHTBOX ── */
(function () {
  const lb      = document.getElementById('s-lightbox');
  if (!lb) return;
  const lbImg   = document.getElementById('s-lb-img');
  const lbCap   = document.getElementById('s-lb-caption');
  const lbCount = document.getElementById('s-lb-counter');
  const closeBtn = document.getElementById('s-lb-close');
  const prevBtn  = document.getElementById('s-lb-prev');
  const nextBtn  = document.getElementById('s-lb-next');

  const items = [...document.querySelectorAll('[data-lightbox]')];
  if (!items.length) return;

  let current = 0;

  const loadImg = (index) => {
    current = index;
    const el   = items[index];
    const src  = el.dataset.src || el.src || '';
    const cap  = el.dataset.caption || el.alt || '';
    lbImg.classList.add('loading');
    lbCount.textContent = `${index + 1} / ${items.length}`;
    lbCap.textContent   = cap;
    prevBtn.disabled = items.length <= 1;
    nextBtn.disabled = items.length <= 1;
    const tmp = new Image();
    tmp.onload = () => {
      lbImg.src = src;
      lbImg.alt = cap;
      lbImg.classList.remove('loading');
    };
    tmp.onerror = () => {
      lbImg.src = src;
      lbImg.classList.remove('loading');
    };
    tmp.src = src;
  };

  const open = (index) => {
    loadImg(index);
    lb.classList.add('active');
    document.body.style.overflow = 'hidden';
    lb.focus();
  };

  const close = () => {
    lb.classList.remove('active');
    document.body.style.overflow = '';
  };

  const prev = () => loadImg((current - 1 + items.length) % items.length);
  const next = () => loadImg((current + 1) % items.length);

  // Attach click to each gallery image
  items.forEach((el, i) => {
    el.style.cursor = 'zoom-in';
    el.addEventListener('click', () => open(i));
  });

  closeBtn.addEventListener('click', close);
  prevBtn.addEventListener('click', (e) => { e.stopPropagation(); prev(); });
  nextBtn.addEventListener('click', (e) => { e.stopPropagation(); next(); });

  // Close on backdrop click
  lb.addEventListener('click', (e) => { if (e.target === lb || e.target.classList.contains('s-lb-inner')) close(); });

  // Keyboard
  document.addEventListener('keydown', (e) => {
    if (!lb.classList.contains('active')) return;
    if (e.key === 'Escape')     { e.preventDefault(); close(); }
    if (e.key === 'ArrowLeft')  { e.preventDefault(); prev(); }
    if (e.key === 'ArrowRight') { e.preventDefault(); next(); }
  });

  // Touch / swipe
  let touchStartX = 0;
  lb.addEventListener('touchstart', (e) => { touchStartX = e.touches[0].clientX; }, { passive: true });
  lb.addEventListener('touchend', (e) => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 50) dx < 0 ? next() : prev();
  }, { passive: true });
})();

/* ── SMOOTH SCROLL for anchor links ── */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const id = a.getAttribute('href').slice(1);
    const el = id ? document.getElementById(id) : null;
    if (!el) return;
    e.preventDefault();
    const offset = 80;
    window.scrollTo({ top: el.getBoundingClientRect().top + window.scrollY - offset, behavior: 'smooth' });
    const oc = document.querySelector('.offcanvas.show');
    if (oc) { const bsOc = bootstrap.Offcanvas.getInstance(oc); if (bsOc) bsOc.hide(); }
  });
});
