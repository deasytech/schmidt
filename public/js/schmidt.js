(function () {
  'use strict';
  var d = document, root = d.documentElement, body = d.body;
  root.classList.add('js');

  // Header: solid after scroll
  var hdr = d.querySelector('.hdr');
  function onScroll() { if (hdr) hdr.classList.toggle('is-solid', window.scrollY > 40 || !hdr.classList.contains('hdr--over')); }
  onScroll(); window.addEventListener('scroll', onScroll, { passive: true });

  // Mobile drawer
  var btn = d.querySelector('.menu-btn'), drawer = d.getElementById('drawer');
  function setMenu(open) {
    body.classList.toggle('menu-open', open);
    btn.setAttribute('aria-expanded', open);
    btn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    drawer.setAttribute('aria-hidden', !open);
    if (open) { var f = drawer.querySelector('a'); f && f.focus(); } else { btn.focus(); }
  }
  if (btn && drawer) {
    drawer.setAttribute('aria-hidden', 'true');
    btn.addEventListener('click', function () { setMenu(!body.classList.contains('menu-open')); });
    drawer.addEventListener('click', function (e) { if (e.target.closest('a')) body.classList.remove('menu-open'); });
    d.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && body.classList.contains('menu-open')) setMenu(false);
      if (e.key === 'Tab' && body.classList.contains('menu-open')) {
        var els = [btn].concat([].slice.call(drawer.querySelectorAll('a')));
        var i = els.indexOf(d.activeElement);
        if (e.shiftKey && i <= 0) { els[els.length - 1].focus(); e.preventDefault(); }
        else if (!e.shiftKey && i === els.length - 1) { els[0].focus(); e.preventDefault(); }
      }
    });
    window.matchMedia('(min-width:1024px)').addEventListener('change', function (m) { if (m.matches) body.classList.remove('menu-open'); });
  }

  // Reveal on scroll
  var rv = d.querySelectorAll('.rv');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (es) { es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }); }, { rootMargin: '0px 0px -8% 0px' });
    rv.forEach(function (el) { io.observe(el); });
  } else { rv.forEach(function (el) { el.classList.add('in'); }); }

  // Project filters (progressive enhancement: without JS everything is shown)
  var chips = d.querySelectorAll('.chip[data-filter]'), tiles = d.querySelectorAll('.tile[data-cat]'), grid = d.querySelector('.tiles');
  chips.forEach(function (c) {
    c.addEventListener('click', function () {
      var f = c.getAttribute('data-filter');
      chips.forEach(function (x) { x.setAttribute('aria-pressed', x === c); });
      tiles.forEach(function (t) { t.hidden = !(f === '*' || t.getAttribute('data-cat') === f); });
      grid.classList.toggle('is-filtered', f !== '*');
      var s = d.getElementById('filter-status'); if (s) s.textContent = tiles.length ? [].filter.call(tiles, function (t) { return !t.hidden; }).length + ' projects shown' : '';
    });
  });

  // Form: prevent double submit
  d.querySelectorAll('form[data-once]').forEach(function (f) {
    f.addEventListener('submit', function () {
      var b = f.querySelector('button[type=submit]');
      if (b && f.checkValidity()) { b.disabled = true; b.textContent = 'Sending…'; }
    });
  });

  // Lightbox
  var links = [].slice.call(d.querySelectorAll('[data-lightbox] a'));
  if (links.length) {
    var lb = d.createElement('div'); lb.className = 'lb'; lb.setAttribute('role', 'dialog'); lb.setAttribute('aria-modal', 'true'); lb.setAttribute('aria-label', 'Image viewer');
    lb.innerHTML = '<button class="lb-x" aria-label="Close">×</button><button class="lb-p" aria-label="Previous image">‹</button><img alt=""><button class="lb-n" aria-label="Next image">›</button>';
    body.appendChild(lb);
    var img = lb.querySelector('img'), cur = 0, opener = null, tx = 0;
    var show = function (i) { cur = (i + links.length) % links.length; img.src = links[cur].href; img.alt = links[cur].querySelector('img').alt; };
    var close = function () { lb.classList.remove('is-open'); body.style.overflow = ''; opener && opener.focus(); };
    links.forEach(function (a, i) { a.addEventListener('click', function (e) { e.preventDefault(); opener = a; show(i); lb.classList.add('is-open'); body.style.overflow = 'hidden'; lb.querySelector('.lb-x').focus(); }); });
    lb.querySelector('.lb-x').onclick = close; lb.querySelector('.lb-p').onclick = function () { show(cur - 1); }; lb.querySelector('.lb-n').onclick = function () { show(cur + 1); };
    lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
    lb.addEventListener('touchstart', function (e) { tx = e.changedTouches[0].clientX; }, { passive: true });
    lb.addEventListener('touchend', function (e) { var dx = e.changedTouches[0].clientX - tx; if (Math.abs(dx) > 50) show(cur + (dx < 0 ? 1 : -1)); }, { passive: true });
    d.addEventListener('keydown', function (e) {
      if (!lb.classList.contains('is-open')) return;
      if (e.key === 'Escape') close(); if (e.key === 'ArrowLeft') show(cur - 1); if (e.key === 'ArrowRight') show(cur + 1);
      if (e.key === 'Tab') { e.preventDefault(); lb.querySelector('.lb-x').focus(); }
    });
  }
})();
