/**
 * Horloge numérique du footer (format 24h).
 */
function initFooterClock() {
  const CLOCK_ID = 'footer-clock';
  const INTERVAL_MS = 1000;

  function pad(n) {
    return n < 10 ? '0' + n : String(n);
  }

  function updateClock() {
    const el = document.getElementById(CLOCK_ID);
    if (!el) return;

    const d = new Date();
    el.textContent = pad(d.getHours()) + ':' + pad(d.getMinutes());
    el.setAttribute('datetime', d.toISOString());
  }

  updateClock();
  setInterval(updateClock, INTERVAL_MS);
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initFooterClock);
} else {
  initFooterClock();
}
