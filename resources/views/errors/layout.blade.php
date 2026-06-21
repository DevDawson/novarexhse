<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('code') — @yield('title') | NOVAREX</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { font-family: 'Inter', system-ui, sans-serif; background: #f8fafc; color: #0f172a; min-height: 100vh; }
    body { min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2rem 1.25rem; }

    /* Radial background */
    body::before {
      content: '';
      position: fixed; inset: 0; z-index: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 60% 40% at 20% 20%, rgba(26,86,219,.07) 0%, transparent 60%),
        radial-gradient(ellipse 50% 40% at 80% 80%, rgba(14,159,110,.06) 0%, transparent 60%);
    }

    .wrap { position: relative; z-index: 1; text-align: center; max-width: 520px; width: 100%; }

    /* Brand */
    .brand { display: inline-flex; align-items: center; gap: .6rem; margin-bottom: 2.5rem; text-decoration: none; }
    .brand-mark { width: 36px; height: 36px; border-radius: 9px; background: #1a56db; display: flex; align-items: center; justify-content: center; font-size: .65rem; font-weight: 900; color: #fff; letter-spacing: .02em; }
    .brand-name { font-weight: 800; font-size: 1rem; color: #0f172a; letter-spacing: -.02em; }

    /* Error code */
    .code {
      font-size: clamp(5rem, 20vw, 8rem);
      font-weight: 900;
      letter-spacing: -.06em;
      line-height: 1;
      margin-bottom: 1.25rem;
      background: linear-gradient(135deg, #1a56db 0%, #0e9f6e 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Title & message */
    .title { font-size: 1.5rem; font-weight: 800; color: #0f172a; letter-spacing: -.03em; margin-bottom: .6rem; }
    .message { font-size: 1rem; color: #64748b; line-height: 1.65; margin-bottom: 2rem; }

    /* Divider */
    .divider { width: 48px; height: 3px; border-radius: 99px; background: linear-gradient(90deg, #1a56db, #0e9f6e); margin: 0 auto 2rem; }

    /* Buttons */
    .actions { display: flex; gap: .75rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem; }
    .btn {
      display: inline-flex; align-items: center; gap: .5rem;
      padding: .6rem 1.4rem; border-radius: 8px;
      font-size: .9rem; font-weight: 600;
      text-decoration: none; cursor: pointer; border: none;
      transition: opacity .15s, transform .1s;
    }
    .btn:hover { opacity: .88; transform: translateY(-1px); }
    .btn-primary { background: #1a56db; color: #fff; }
    .btn-outline { background: transparent; color: #64748b; border: 1.5px solid #e2e8f0; }

    /* Footer note */
    .foot { font-size: .78rem; color: #94a3b8; }
    .foot a { color: #1a56db; text-decoration: none; }
    .foot a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="wrap">

    <a href="/" class="brand">
      <div class="brand-mark">NVX</div>
      <span class="brand-name">NOVAREX</span>
    </a>

    <div class="code">@yield('code')</div>
    <div class="divider"></div>
    <h1 class="title">@yield('title')</h1>
    <p class="message">@yield('message')</p>

    <div class="actions">
      <a href="/" class="btn btn-primary">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        Go to Homepage
      </a>
      <button onclick="history.back()" class="btn btn-outline">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Go Back
      </button>
    </div>

    <p class="foot">
      Need help? Contact us at <a href="mailto:info@novarex.co.tz">info@novarex.co.tz</a>
    </p>

  </div>
</body>
</html>
