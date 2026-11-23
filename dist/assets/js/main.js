/**
 * Colourist — Main JavaScript
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
  const siteHeader = document.querySelector('.site-header');

  // Handle header scroll state on transparent hero
  function checkHeaderScroll() {
    if (!siteHeader) return;
    if (window.scrollY > 40) {
      siteHeader.classList.add('is-scrolled');
    } else {
      siteHeader.classList.remove('is-scrolled');
    }
  }
  window.addEventListener('scroll', checkHeaderScroll, { passive: true });
  checkHeaderScroll();

  function openMenu() {
    if (!megaPanel || !burgerBtn) return;
    burgerBtn.setAttribute('aria-expanded', 'true');
    megaPanel.classList.add('open');
    if (navBackdrop) navBackdrop.classList.add('open');
    document.body.classList.add('menu-open');
    if (siteHeader) siteHeader.classList.add('menu-open');
  }

  function closeMenu() {
    if (!megaPanel || !burgerBtn) return;
    burgerBtn.setAttribute('aria-expanded', 'false');
    megaPanel.classList.remove('open');
    if (navBackdrop) navBackdrop.classList.remove('open');
    document.body.classList.remove('menu-open');
    if (siteHeader) siteHeader.classList.remove('menu-open');

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

  // 2. Olaplex-style Unified Video Player Controller (Home, Experiences, Workshop)
  const videoPlayers = document.querySelectorAll('[data-video-player]');
  videoPlayers.forEach(function (player) {
    const video = player.querySelector('video');
    const playBtn = player.querySelector('.vcp-play-btn');
    const muteBtn = player.querySelector('.vcp-mute-btn');
    if (!video) return;

    function pausePlayer() {
      video.pause();
      player.classList.remove('is-playing');
      if (muteBtn) muteBtn.style.display = 'none';
    }

    function playPlayer() {
      // Pause all other players on page and return to poster
      videoPlayers.forEach(function (other) {
        if (other !== player) {
          const otherVid = other.querySelector('video');
          if (otherVid) {
            otherVid.pause();
            otherVid.currentTime = 0;
            otherVid.load();
          }
          other.classList.remove('is-playing');
          const otherMute = other.querySelector('.vcp-mute-btn');
          if (otherMute) otherMute.style.display = 'none';
        }
      });

      // Play this with sound enabled
      video.muted = false;
      const playPromise = video.play();
      if (playPromise !== undefined) {
        playPromise.then(function () {
          player.classList.add('is-playing');
          if (muteBtn) muteBtn.style.display = 'flex';
        }).catch(function () {
          // If browser blocks unmuted play, fallback to muted
          video.muted = true;
          video.play();
          player.classList.add('is-playing');
          if (muteBtn) {
            muteBtn.style.display = 'flex';
            updateMuteIcons(true);
          }
        });
      }
    }

    player.addEventListener('click', function (e) {
      if (e.target.closest('.vcp-mute-btn')) return;
      if (video.paused) {
        playPlayer();
      } else {
        pausePlayer();
      }
    });

    if (muteBtn) {
      muteBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        video.muted = !video.muted;
        updateMuteIcons(video.muted);
      });
    }

    function updateMuteIcons(isMuted) {
      if (!muteBtn) return;
      const unmutedIcon = muteBtn.querySelector('.icon-unmuted');
      const mutedIcon = muteBtn.querySelector('.icon-muted');
      if (unmutedIcon && mutedIcon) {
        unmutedIcon.style.display = isMuted ? 'none' : 'block';
        mutedIcon.style.display = isMuted ? 'block' : 'none';
      }
    }

    video.addEventListener('ended', function () {
      pausePlayer();
      video.currentTime = 0;
      video.load();
    });
  });

  // 3. Video Viewport Autoplay (IntersectionObserver)
  const isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!isReducedMotion && 'IntersectionObserver' in window) {
    const videoObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          const video = entry.target;
          if (entry.isIntersecting) {
            if (video.dataset.src && !video.currentSrc) {
              video.src = video.dataset.src;
            }
            const playPromise = video.play();
            if (playPromise !== undefined) {
              playPromise.catch(function () {});
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

    document.querySelectorAll('video.lazy-video, .hero-video-bg, .home-leader-video').forEach(function (video) {
      videoObserver.observe(video);
    });
  }

  // 3. Transformation Category Filter (Real Clients, Experts, Celebrities)
  const transFilterBtns = document.querySelectorAll('.trans-filter-btn');
  const transStories = document.querySelectorAll('.trans-story-row');

  if (transFilterBtns.length && transStories.length) {
    transFilterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const cat = this.getAttribute('data-category');
        const isAlreadyActive = this.classList.contains('active');

        if (isAlreadyActive) {
          // Klik lagi = tampilkan semua
          this.classList.remove('active');
          transStories.forEach(function (story) {
            story.style.display = 'grid';
          });
        } else {
          // Aktifkan tombol yang dipilih
          transFilterBtns.forEach(function (b) { b.classList.remove('active'); });
          this.classList.add('active');

          transStories.forEach(function (story) {
            const storyCat = story.getAttribute('data-category');
            if (cat === storyCat) {
              story.style.display = 'grid';
            } else {
              story.style.display = 'none';
            }
          });
        }
      });
    });
  }

  // 4. Partners Carousel Swipe / Drag & Fade Effect
  const partnersTrack = document.getElementById('partnersTrack');
  const partnersFadeLeft = document.getElementById('partnersFadeLeft');
  const partnersFadeRight = document.getElementById('partnersFadeRight');
  const partnerPrev = document.getElementById('partnerPrev');
  const partnerNext = document.getElementById('partnerNext');

  if (partnersTrack) {
    if (partnerPrev) {
      partnerPrev.addEventListener('click', function () {
        partnersTrack.scrollBy({ left: -220, behavior: 'smooth' });
      });
    }
    if (partnerNext) {
      partnerNext.addEventListener('click', function () {
        partnersTrack.scrollBy({ left: 220, behavior: 'smooth' });
      });
    }

    function updatePartnersFades() {
      const scrollLeft = partnersTrack.scrollLeft;
      const maxScroll = partnersTrack.scrollWidth - partnersTrack.clientWidth;

      if (partnersFadeLeft) {
        partnersFadeLeft.style.opacity = scrollLeft > 10 ? '1' : '0';
      }
      if (partnersFadeRight) {
        partnersFadeRight.style.opacity = (maxScroll - scrollLeft) > 10 ? '1' : '0';
      }
    }

    partnersTrack.addEventListener('scroll', updatePartnersFades, { passive: true });
    updatePartnersFades();

    // Mouse drag support for desktop
    let isDown = false;
    let startX = 0;
    let scrollStart = 0;

    partnersTrack.addEventListener('mousedown', function (e) {
      isDown = true;
      startX = e.pageX - partnersTrack.offsetLeft;
      scrollStart = partnersTrack.scrollLeft;
      partnersTrack.style.cursor = 'grabbing';
    });

    document.addEventListener('mouseup', function () {
      if (isDown) {
        isDown = false;
        if (partnersTrack) partnersTrack.style.cursor = 'grab';
      }
    });

    partnersTrack.addEventListener('mousemove', function (e) {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - partnersTrack.offsetLeft;
      const walk = (x - startX) * 1.5;
      partnersTrack.scrollLeft = scrollStart - walk;
    });

    // Mobile scroll hint animation on first view
    if ('IntersectionObserver' in window && window.innerWidth <= 720) {
      let hintShown = false;
      const trackObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting && !hintShown) {
            hintShown = true;
            partnersTrack.scrollBy({ left: 35, behavior: 'smooth' });
            setTimeout(function () {
              partnersTrack.scrollBy({ left: -35, behavior: 'smooth' });
            }, 450);
          }
        });
      }, { threshold: 0.3 });
      trackObserver.observe(partnersTrack);
    }
  }

  // 5. Celebrities Carousel Arrows & Fade
  const celebsTrack = document.getElementById('celebsTrack');
  const celebPrev = document.getElementById('celebPrev');
  const celebNext = document.getElementById('celebNext');
  const celebsFadeRight = document.getElementById('celebsFadeRight');

  if (celebsTrack) {
    function updateCelebsFade() {
      if (!celebsFadeRight) return;
      const scrollLeft = celebsTrack.scrollLeft;
      const maxScroll = celebsTrack.scrollWidth - celebsTrack.clientWidth;
      celebsFadeRight.style.opacity = (maxScroll - scrollLeft) > 15 ? '1' : '0';
    }

    celebsTrack.addEventListener('scroll', updateCelebsFade, { passive: true });
    updateCelebsFade();

    if (celebPrev) {
      celebPrev.addEventListener('click', function () {
        celebsTrack.scrollBy({ left: -260, behavior: 'smooth' });
      });
    }
    if (celebNext) {
      celebNext.addEventListener('click', function () {
        celebsTrack.scrollBy({ left: 260, behavior: 'smooth' });
      });
    }
  }

  // 6. Workshop Student Carousel Arrows
  const studentTrack = document.getElementById('studentTrack');
  const studentPrev = document.getElementById('studentPrev');
  const studentNext = document.getElementById('studentNext');

  if (studentTrack) {
    if (studentPrev) {
      studentPrev.addEventListener('click', function () {
        studentTrack.scrollBy({ left: -240, behavior: 'smooth' });
      });
    }
    if (studentNext) {
      studentNext.addEventListener('click', function () {
        studentTrack.scrollBy({ left: 240, behavior: 'smooth' });
      });
    }
  }

  // 7. Booking Page Interaction (book.php)
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
        "Halo Colourist,\n" +
        "Saya ingin reservasi pengalaman sesi:\n\n" +
        "• Layanan: " + service + "\n" +
        (date ? "• Tanggal: " + date + "\n" : "") +
        (time ? "• Waktu: " + time + "\n" : "") +
        "• Nama: " + name + "\n" +
        "• WhatsApp: " + clientWa + "\n" +
        "\nMohon info ketersediaan jadwal. Terima kasih.";

      const url = "https://wa.me/" + waNumber.replace(/[^0-9]/g, '') + "?text=" + encodeURIComponent(text);
      
      window.open(url, '_blank');
      e.preventDefault();
    });
  }

})();
