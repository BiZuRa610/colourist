/**
 * Colourist by Zerlinda — Main JavaScript
 * Minimalist interaction logic, video viewport autoplay, and accessible mega navigation
 */

(function () {
  'use strict';

  // 1. Navigation & Mega Menu Controller
  const burgerBtn = document.getElementById('burgerBtn');
  const megaPanel = document.getElementById('megaNavPanel');
  const navBackdrop = document.getElementById('navBackdrop');
  const expNavBtn = document.getElementById('expNavBtn');
  const expMobileSubmenu = document.getElementById('expMobileSubmenu');
  const expChevron = document.getElementById('expChevron');
  const desktopSubmenuCol = document.getElementById('desktopSubmenuCol');

  function openMenu() {
    if (!megaPanel || !burgerBtn) return;
    burgerBtn.setAttribute('aria-expanded', 'true');
    megaPanel.classList.add('open');
    if (navBackdrop) navBackdrop.classList.add('open');
    document.body.classList.add('menu-open');
  }

  function closeMenu() {
    if (!megaPanel || !burgerBtn) return;
    burgerBtn.setAttribute('aria-expanded', 'false');
    megaPanel.classList.remove('open');
    if (navBackdrop) navBackdrop.classList.remove('open');
    document.body.classList.remove('menu-open');

    // Reset Experiences submenu state on menu close
    if (expNavBtn) {
      expNavBtn.setAttribute('aria-expanded', 'false');
      expNavBtn.classList.remove('active');
    }
    if (desktopSubmenuCol) {
      desktopSubmenuCol.classList.remove('open');
    }
    if (expMobileSubmenu) {
      expMobileSubmenu.classList.remove('open');
    }
    if (expChevron) {
      expChevron.classList.remove('open');
    }
  }

  function toggleMenu() {
    const isOpen = megaPanel && megaPanel.classList.contains('open');
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  }

  if (burgerBtn) {
    burgerBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      toggleMenu();
    });
  }

  if (navBackdrop) {
    navBackdrop.addEventListener('click', function () {
      closeMenu();
    });
  }

  // Close with Esc key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeMenu();
    }
  });

  // Close when clicking outside header & panel
  document.addEventListener('click', function (e) {
    if (!megaPanel || !megaPanel.classList.contains('open')) return;
    const header = document.querySelector('.site-header');
    if (header && !header.contains(e.target) && !megaPanel.contains(e.target)) {
      closeMenu();
    }
  });

  // Close when clicking any menu page link
  if (megaPanel) {
    const pageLinks = megaPanel.querySelectorAll('a.menu-link');
    pageLinks.forEach(function (link) {
      link.addEventListener('click', function () {
        closeMenu();
      });
    });
  }

  // Toggle "Experiences" submenu on click (Desktop 2nd column + Mobile accordion)
  if (expNavBtn) {
    expNavBtn.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();

      const isExpanded = expNavBtn.getAttribute('aria-expanded') === 'true';
      const nextState = !isExpanded;

      expNavBtn.setAttribute('aria-expanded', nextState ? 'true' : 'false');
      expNavBtn.classList.toggle('active', nextState);

      // Desktop: toggle right column visibility
      if (desktopSubmenuCol) {
        desktopSubmenuCol.classList.toggle('open', nextState);
      }

      // Mobile: toggle accordion dropdown below Experiences
      if (expMobileSubmenu) {
        expMobileSubmenu.classList.toggle('open', nextState);
      }
      if (expChevron) {
        expChevron.classList.toggle('open', nextState);
      }
    });
  }

  // 2. Video Viewport Autoplay (IntersectionObserver)
  const isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!isReducedMotion && 'IntersectionObserver' in window) {
    const videoObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          const video = entry.target;
          if (entry.isIntersecting) {
            // Lazy load source if data-src present
            if (video.dataset.src && !video.currentSrc) {
              video.src = video.dataset.src;
            }
            const playPromise = video.play();
            if (playPromise !== undefined) {
              playPromise.catch(function () {
                // Autoplay was prevented (e.g. browser policy or low power mode)
              });
            }
          } else {
            if (!video.paused) {
              video.pause();
            }
          }
        });
      },
      {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
      }
    );

    document.querySelectorAll('video.lazy-video, .hero-video-bg').forEach(function (video) {
      videoObserver.observe(video);
    });
  }

  // 3. Testimonials Slider (Partners page)
  const quoteSlides = document.querySelectorAll('.quote-slide');
  const quoteDots = document.querySelectorAll('.quote-dot');
  let currentQuoteIndex = 0;
  let quoteTimer = null;

  function showQuoteSlide(index) {
    if (!quoteSlides.length) return;
    quoteSlides.forEach(function (slide, i) {
      slide.classList.toggle('active', i === index);
    });
    quoteDots.forEach(function (dot, i) {
      dot.classList.toggle('active', i === index);
    });
    currentQuoteIndex = index;
  }

  if (quoteSlides.length > 1) {
    quoteDots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        const idx = parseInt(this.getAttribute('data-index'), 10);
        showQuoteSlide(idx);
        restartQuoteTimer();
      });
    });

    function nextQuote() {
      const nextIdx = (currentQuoteIndex + 1) % quoteSlides.length;
      showQuoteSlide(nextIdx);
    }

    function restartQuoteTimer() {
      if (quoteTimer) clearInterval(quoteTimer);
      quoteTimer = setInterval(nextQuote, 6500);
    }

    restartQuoteTimer();
  }

  // 4. Booking Page Interaction (book.php)
  const optButtons = document.querySelectorAll('.opt-btn');
  const serviceInput = document.getElementById('selectedService');
  const bookingForm = document.getElementById('bookingForm');

  if (optButtons.length && serviceInput) {
    optButtons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        optButtons.forEach(function (b) { b.classList.remove('on'); });
        this.classList.add('on');
        serviceInput.value = this.getAttribute('data-service') || '';
      });
    });
  }

  if (bookingForm) {
    bookingForm.addEventListener('submit', function (e) {
      const waNumber = bookingForm.getAttribute('data-wa') || '628111925828';
      const service = serviceInput ? serviceInput.value : 'Personal Color Analysis';
      const date = document.getElementById('bookDate') ? document.getElementById('bookDate').value : '';
      const time = document.getElementById('bookTime') ? document.getElementById('bookTime').value : '';
      const name = document.getElementById('bookName') ? document.getElementById('bookName').value : '';
      const clientWa = document.getElementById('bookWa') ? document.getElementById('bookWa').value : '';
      const notes = document.getElementById('bookNotes') ? document.getElementById('bookNotes').value : '';

      if (!name || !clientWa) {
        alert('Mohon lengkapi nama lengkap dan nomor WhatsApp Anda.');
        e.preventDefault();
        return;
      }

      // Format WhatsApp message
      const text =
        "Halo Colourist by Zerlinda,\n" +
        "Saya ingin reservasi pengalaman sesi:\n\n" +
        "• Layanan: " + service + "\n" +
        (date ? "• Tanggal: " + date + "\n" : "") +
        (time ? "• Waktu: " + time + "\n" : "") +
        "• Nama: " + name + "\n" +
        "• WhatsApp: " + clientWa + "\n" +
        (notes ? "• Catatan: " + notes + "\n" : "") +
        "\nMohon info ketersediaan jadwal. Terima kasih.";

      const url = "https://wa.me/" + waNumber.replace(/[^0-9]/g, '') + "?text=" + encodeURIComponent(text);
      
      // Open WhatsApp in new tab / redirect
      window.open(url, '_blank');
      e.preventDefault();
    });
  }

})();

