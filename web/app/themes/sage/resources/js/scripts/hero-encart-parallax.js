const ENCART_SELECTOR = '[data-parallax-encart]';
const MAX_OFFSET_PX = 8;
const SMOOTH = 0.08;

let targetX = 0;
let targetY = 0;
let currentX = 0;
let currentY = 0;
let rafId = null;

function initEncartParallax() {
  // Pas d'effet sur mobile / tactile (pas de hover)
  if (!window.matchMedia('(hover: hover)').matches) return;

  const encart = document.querySelector(ENCART_SELECTOR);
  if (!encart) return;

  const zone = encart.closest('section');
  if (!zone) return;

  encart.style.willChange = 'transform';

  function isInsideZone(clientX, clientY) {
    const rect = zone.getBoundingClientRect();
    return (
      clientX >= rect.left &&
      clientX <= rect.right &&
      clientY >= rect.top &&
      clientY <= rect.bottom
    );
  }

  function onMouseMove(e) {
    if (isInsideZone(e.clientX, e.clientY)) {
      const w = window.innerWidth;
      const h = window.innerHeight;
      targetX = (e.clientX / w - 0.5) * 2;
      targetY = (e.clientY / h - 0.5) * 2;
    } else {
      targetX = 0;
      targetY = 0;
    }
    if (rafId === null) rafId = requestAnimationFrame(updateTransform);
  }

  function updateTransform() {
    currentX += (targetX * MAX_OFFSET_PX - currentX) * SMOOTH;
    currentY += (targetY * MAX_OFFSET_PX - currentY) * SMOOTH;
    encart.style.transform = `translate(${currentX}px, ${currentY}px)`;
    if (
      Math.abs(currentX - targetX * MAX_OFFSET_PX) > 0.01 ||
      Math.abs(currentY - targetY * MAX_OFFSET_PX) > 0.01
    ) {
      rafId = requestAnimationFrame(updateTransform);
    } else {
      rafId = null;
    }
  }

  document.addEventListener('mousemove', onMouseMove, { passive: true });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initEncartParallax);
} else {
  initEncartParallax();
}
