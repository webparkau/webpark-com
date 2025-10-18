<?php
// Sessions for CSRF
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>WebPark — AI and SaaS Venture Studio in Perth</title>
  <meta name="description" content="WebPark is a Perth based venture studio building AI tools, fintech utilities, and focused consumer products. Follow builds. Join early access." />
  <link rel="canonical" href="https://webpark.com.au/" />
  <meta name="robots" content="index,follow" />

  <!-- Icons -->
  <link rel="icon" href="/assets/favicon.ico" sizes="any">
  <link rel="icon" type="image/svg+xml" href="/assets/logo.svg">
  <link rel="apple-touch-icon" href="/assets/apple-touch-icon.png">
  <meta name="theme-color" content="#0f172a">
  <link rel="mask-icon" href="/assets/logo.svg" color="#0f172a">

  <!-- Open Graph -->
  <meta property="og:title" content="WebPark — AI and SaaS Venture Studio in Perth">
  <meta property="og:description" content="We build small useful products then scale what customers love. CoreFoundry.ai, CVmate.ai, FinAI Lens, BitcoinAustralia.com." />
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://webpark.com.au/">
  <meta property="og:image" content="https://webpark.com.au/assets/og-banner.jpg">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="WebPark — AI and SaaS Venture Studio in Perth">
  <meta name="twitter:description" content="AI tools, fintech utilities, and focused consumer products.">
  <meta name="twitter:image" content="https://webpark.com.au/assets/og-banner.jpg">

  <!-- Schema -->
  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"Organization",
    "name":"WebPark Pty Ltd",
    "url":"https://webpark.com.au/",
    "logo":"https://webpark.com.au/assets/logo.svg",
    "sameAs":[
      "https://webpark.au/",
      "https://bitcoinaustralia.com/",
      "https://cvmate.ai/",
      "https://corefoundry.ai/"
    ],
    "address":{
      "@type":"PostalAddress",
      "addressLocality":"Perth",
      "addressRegion":"WA",
      "addressCountry":"AU"
    }
  }
  </script>

  <style>
    :root{--bg:#0f172a;--card:#111827;--text:#e5e7eb;--muted:#94a3b8;--accent:#60a5fa;--border:rgba(148,163,184,.3)}
    *{box-sizing:border-box}
    body{margin:0;background:linear-gradient(180deg,#0b1220,#0f172a 45%);color:var(--text);font-family:ui-sans-serif,system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Helvetica,Arial}
    a{color:#60a5fa;text-decoration:none}
    .wrap{min-height:100svh;display:grid;place-items:center;padding:24px}
    .card{width:min(1000px,94vw);background:rgba(17,24,39,.75);backdrop-filter:blur(6px);border:1px solid var(--border);border-radius:18px;padding:28px 28px 22px;box-shadow:0 12px 30px rgba(0,0,0,.25)}
    header{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap}
    .brand{display:flex;align-items:center;gap:10px}
    .brand img{width:28px;height:28px}
    .tag{border:1px solid var(--border);color:var(--muted);padding:6px 10px;border-radius:999px;font-size:13px}
    h1{margin:10px 0 6px;font-size:clamp(26px,4vw,40px)}
    p{margin:8px 0;line-height:1.6}
    .muted{color:var(--muted)}
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:12px;margin-top:12px}
    .pill{border:1px solid var(--border);border-radius:14px;padding:14px;background:#0b1220}
    .pill strong{display:block;margin-bottom:4px}
    .section{margin-top:18px}
    .sub{font-weight:700;margin:10px 0 6px}
    ul.clean{padding-left:18px;margin:6px 0}
    form{margin-top:16px;display:flex;gap:10px;flex-wrap:wrap}
    input[type=email]{flex:1;min-width:260px;background:#0b1220;border:1px solid var(--border);color:var(--text);padding:12px 14px;border-radius:12px;outline:none}
    input[type=email]::placeholder{color:#94a3b8}
    button{background:var(--accent);color:#0b1220;font-weight:700;border:none;padding:12px 16px;border-radius:12px;cursor:pointer}
    .fine{font-size:12px;color:var(--muted);margin-top:8px}
    .footer{margin-top:18px;display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;color:#9aa5b1}
    .hp{position:absolute;left:-10000px;top:auto;width:1px;height:1px;overflow:hidden}
    .callout{border:1px dashed var(--border);border-radius:12px;padding:10px 12px;background:#0b1220;margin-top:12px}
  </style>
</head>
<body>
  <main class="wrap">
    <section class="card" aria-label="WebPark landing">
      <header>
        <div class="brand">
          <img src="/assets/logo.svg" alt="WebPark logo" width="28" height="28" />
          <strong>WebPark</strong>
        </div>
        <span class="tag">Perth • Venture Studio</span>
      </header>

      <h1>We build small useful products then scale what customers love.</h1>
      <p class="muted">
        Focus on AI tools, fintech utilities, and niche consumer products. Ship fast. Validate with real users. Scale what works.
      </p>

      <!-- Selected projects -->
      <div class="section" id="projects">
        <div class="sub">Selected projects</div>
        <div class="grid" aria-label="Projects">
          <div class="pill">
            <strong><a href="https://corefoundry.ai" target="_blank" rel="noopener">CoreFoundry.ai</a></strong>
            <span class="muted">Shared data and AI layer for WebPark apps. Uploads, parsing, insights, and APIs.</span>
          </div>
          <div class="pill">
            <strong><a href="https://cvmate.ai" target="_blank" rel="noopener">CVmate.ai</a></strong>
            <span class="muted">AI assisted resumes and profile summaries. Clear outputs for real applications.</span>
          </div>
          <div class="pill">
            <strong><a href="https://finailens.com" target="_blank" rel="noopener">FinAI Lens</a></strong>
            <span class="muted">Accounting data to AI insights. Upload reports. See trends, risks, and actions.</span>
          </div>
          <div class="pill">
            <strong><a href="https://bitcoinaustralia.com" target="_blank" rel="noopener">BitcoinAustralia.com</a></strong>
            <span class="muted">Clear guides and tools for Australians. Rebuild planned with fresh Drupal base.</span>
          </div>
          <div class="pill">
            <strong><a href="https://tax.bitcoinaustralia.com" target="_blank" rel="noopener">Bitcoin Tax Calculator</a></strong>
            <span class="muted">ATO aligned summaries for gains and income. Frontend ready. API integration next.</span>
          </div>
        </div>
        <div class="callout">
          <strong>Developer hub:</strong> docs and changelogs live at <a href="https://webpark.au" target="_blank" rel="noopener">webpark.au</a>.
        </div>
      </div>

      <!-- How we work -->
      <div class="section">
        <div class="sub">How we work</div>
        <ul class="clean muted">
          <li>Ship MVPs in weeks. Keep scope tight.</li>
          <li>Measure real use. Cut what does not move the needle.</li>
          <li>Scale only after repeatable demand is clear.</li>
        </ul>
      </div>

      <!-- Waitlist -->
      <form action="/save.php" method="POST" novalidate>
        <input type="hidden" name="csrf" value="<?=htmlspecialchars($_SESSION['csrf'], ENT_QUOTES)?>">
        <input type="text" name="website" class="hp" autocomplete="off" tabindex="-1" aria-hidden="true">
        <input type="email" name="email" required placeholder="Join the WebPark update list">
        <button type="submit">Notify Me</button>
      </form>
      <p class="fine">Low volume. Double opt in. Unsubscribe anytime.</p>

<!-- Footer -->
<div class="footer">
  <span>Contact: <a href="mailto:mail@webpark.com.au">mail@webpark.com.au</a></span>
  <span style="display:flex;gap:14px;align-items:center">
    <a href="https://www.linkedin.com/company/webpark" target="_blank" rel="noopener" aria-label="LinkedIn" title="LinkedIn">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="#9aa5b1" xmlns="http://www.w3.org/2000/svg"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V23h-4V8zM8 8h3.8v2.05h.05c.53-1 1.82-2.05 3.75-2.05 4.01 0 4.75 2.64 4.75 6.08V23h-4v-6.64c0-1.58-.03-3.61-2.2-3.61-2.2 0-2.53 1.72-2.53 3.49V23H8V8z"/></svg>
    </a>
    <a href="https://x.com/WebparkAU" target="_blank" rel="noopener" aria-label="X" title="X">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="#9aa5b1" xmlns="http://www.w3.org/2000/svg"><path d="M18.244 2H21.5l-7.5 8.57L23 22h-6.09l-4.76-6.19L6.6 22H3.34l8.04-9.19L1 2h6.19l4.31 5.72L18.244 2zm-2.14 18h1.52L7.99 4H6.41l9.694 16z"/></svg>
    </a>
    <a href="https://github.com/webparkau" target="_blank" rel="noopener" aria-label="GitHub" title="GitHub">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="#9aa5b1" xmlns="http://www.w3.org/2000/svg"><path d="M12 .5A11.5 11.5 0 0 0 .5 12.36c0 5.26 3.44 9.72 8.2 11.3.6.12.82-.26.82-.58v-2.2c-3.34.74-4.04-1.45-4.04-1.45-.55-1.44-1.35-1.82-1.35-1.82-1.1-.76.08-.74.08-.74 1.22.09 1.86 1.29 1.86 1.29 1.08 1.9 2.84 1.35 3.53 1.03.11-.8.42-1.35.76-1.66-2.67-.31-5.48-1.37-5.48-6.11 0-1.35.47-2.45 1.25-3.31-.13-.3-.54-1.55.12-3.23 0 0 1.01-.33 3.3 1.26a11.2 11.2 0 0 1 6 0c2.28-1.59 3.29-1.26 3.29-1.26.66 1.68.25 2.93.12 3.23.78.86 1.25 1.96 1.25 3.31 0 4.76-2.82 5.79-5.5 6.1.43.37.82 1.1.82 2.22v3.29c0 .33.22.72.83.58A11.5 11.5 0 0 0 23.5 12.36 11.5 11.5 0 0 0 12 .5z"/></svg>
    </a>
    <span>•</span>
    <a href="/privacy.html" rel="nofollow">Privacy</a> •
    <a href="/terms.html" rel="nofollow">Terms</a>
  </span>
</div>
    </section>
  </main>
</body>
</html>