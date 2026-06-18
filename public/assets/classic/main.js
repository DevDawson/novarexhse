(function() {
  "use strict";

  // ── THEME ────────────────────────────────────────────────
  const root = document.documentElement;
  const btn  = document.getElementById('themeToggle');
  const icon = document.getElementById('themeIcon');

  const applyTheme = (theme) => {
    root.setAttribute('data-theme', theme);
    localStorage.setItem('nx-theme', theme);
    if (icon) icon.className = theme === 'dark' ? 'fa-solid fa-moon' : 'fa-solid fa-sun';
    if (btn) btn.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
  };

  const saved = localStorage.getItem('nx-theme') ||
    (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
  applyTheme(saved);

  if (btn) {
    btn.addEventListener('click', () => {
      applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
    });
  }

  // ── NAVBAR SCROLL ────────────────────────────────────────
  const nav = document.getElementById('mainNav');
  if (nav) {
    window.addEventListener('scroll', () => {
      nav.classList.toggle('scrolled', window.scrollY > 30);
    }, { passive: true });
  }

  // ── ACTIVE NAV LINK ──────────────────────────────────────
  const sections = document.querySelectorAll('section[id], header[id]');
  const navLinks = document.querySelectorAll('.nav-link-item');

  const updateActive = () => {
    let current = '';
    sections.forEach(sec => {
      if (window.scrollY >= sec.offsetTop - 110) current = sec.id;
    });
    navLinks.forEach(link => {
      link.classList.toggle('active', link.getAttribute('href') === '#' + current);
    });
  };

  window.addEventListener('scroll', updateActive, { passive: true });
  updateActive();

  // ── REVEAL ON SCROLL ─────────────────────────────────────
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  reveals.forEach(el => observer.observe(el));

  // ── ANIMATED COUNTERS ─────────────────────────────────────
  const counters = document.querySelectorAll('.counter-num[data-target]');
  let countersStarted = false;

  const startCounters = () => {
    if (countersStarted) return;
    countersStarted = true;
    counters.forEach(el => {
      const target = parseInt(el.dataset.target, 10);
      const duration = 1600;
      const step = Math.ceil(target / (duration / 16));
      let current = 0;
      const tick = () => {
        current = Math.min(current + step, target);
        el.textContent = current;
        if (current < target) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
    });
  };

  const heroEl = document.querySelector('.hero');
  const heroObs = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) startCounters();
  }, { threshold: 0.3 });
  if (heroEl) heroObs.observe(heroEl);

  // Also start on scroll if not already
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) startCounters();
  }, { passive: true, once: true });

  // ── SMOOTH CLOSE OFFCANVAS ON LINK ────────────────────────
  document.querySelectorAll('.mobile-nav-link[href]').forEach(link => {
    link.addEventListener('click', () => {
      const offcanvasEl = document.getElementById('mobileMenu');
      const bsInstance = bootstrap.Offcanvas.getInstance(offcanvasEl);
      if (bsInstance) bsInstance.hide();
    });
  });

  // AJAX contact form with normal POST fallback
  document.querySelectorAll('[data-ajax-contact]').forEach(form => {
    form.addEventListener('submit', async (event) => {
      if (!window.fetch) return;
      event.preventDefault();

      const button = form.querySelector('button[type="submit"]');
      const originalText = button ? button.innerHTML : '';
      const showMessage = (type, message) => {
        const old = document.querySelector('.site-toast.ajax-toast');
        if (old) old.remove();
        const note = document.createElement('div');
        note.className = `site-toast ajax-toast ${type}`;
        note.textContent = message;
        form.before(note);
        note.scrollIntoView({ behavior: 'smooth', block: 'center' });
      };

      if (button) {
        button.disabled = true;
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Sending';
      }

      try {
        const response = await fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          },
          credentials: 'same-origin'
        });
        const payload = await response.json();
        showMessage(payload.type || (payload.ok ? 'success' : 'danger'), payload.message || 'Request completed.');
        if (payload.ok) form.reset();
      } catch (error) {
        showMessage('danger', 'Could not send your inquiry. Please try again.');
      } finally {
        if (button) {
          button.disabled = false;
          button.innerHTML = originalText;
        }
      }
    });
  });

  const cookieBanner = document.getElementById('cookieBanner');
  const acceptCookies = document.getElementById('acceptCookies');
  if (cookieBanner && localStorage.getItem('novarex-cookie-ok') !== '1') {
    cookieBanner.hidden = false;
  }
  if (acceptCookies) {
    acceptCookies.addEventListener('click', () => {
      localStorage.setItem('novarex-cookie-ok', '1');
      if (cookieBanner) cookieBanner.hidden = true;
    });
  }

})();
