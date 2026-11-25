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
  const expNavGroup = document.getElementById('expNavGroup');
  const expMainLink = document.getElementById('expMainLink');
  const expChevronBtn = document.getElementById('expChevronBtn');
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
    if (desktopSubmenuCol) {
      desktopSubmenuCol.classList.remove('open');
    }
    if (expMobileSubmenu) {
      expMobileSubmenu.classList.remove('open');
    }
    if (expChevron) {
      expChevron.classList.remove('open');
    }
    if (expChevronBtn) {
      expChevronBtn.setAttribute('aria-expanded', 'false');
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

  // Close menu and handle anchor scrolling with header offset when clicking any link
  if (megaPanel) {
    const allMenuLinks = megaPanel.querySelectorAll('a');
    allMenuLinks.forEach(function (link) {
      link.addEventListener('click', function (e) {
        const href = link.getAttribute('href') || '';
        closeMenu();

        // If link has a hash targeting on this page
        if (href.indexOf('#') !== -1) {
          const hashIndex = href.indexOf('#');
          const pagePart = href.substring(0, hashIndex);
          const hash = href.substring(hashIndex);

          // If on same page or link is relative anchor
          const currentPath = window.location.pathname.replace(/\/$/, '');
          const isSamePage = !pagePart || currentPath.endsWith(pagePart.replace(/^\//, '')) || (pagePart === 'experiences' && currentPath.indexOf('experiences') !== -1);

          if (isSamePage) {
            const target = document.querySelector(hash);
            if (target) {
              e.preventDefault();
              setTimeout(function () {
                const headerOffset = 70;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                window.scrollTo({
                  top: offsetPosition,
                  behavior: 'smooth'
                });
                if (history.pushState) {
                  history.pushState(null, null, hash);
                }
              }, 120);
            }
          }
        }
      });
    });
  }

  // Desktop: Hover / Focus on "Experiences" opens right column submenu
  if (expNavGroup && desktopSubmenuCol) {
    let hoverTimer;

    function openDesktopSub() {
      clearTimeout(hoverTimer);
      desktopSubmenuCol.classList.add('open');
      if (expChevron) expChevron.classList.add('open');
    }

    function closeDesktopSub() {
      hoverTimer = setTimeout(function () {
        if (!expNavGroup.matches(':hover') && !desktopSubmenuCol.matches(':hover')) {
          desktopSubmenuCol.classList.remove('open');
          if (expChevron) expChevron.classList.remove('open');
        }
      }, 180);
    }

    expNavGroup.addEventListener('mouseenter', openDesktopSub);
    expNavGroup.addEventListener('mouseleave', closeDesktopSub);
    expNavGroup.addEventListener('focusin', openDesktopSub);
    expNavGroup.addEventListener('focusout', closeDesktopSub);

    desktopSubmenuCol.addEventListener('mouseenter', openDesktopSub);
    desktopSubmenuCol.addEventListener('mouseleave', closeDesktopSub);
  }

  // Mobile / Touch: Chevron button toggles accordion submenu
  if (expChevronBtn) {
    expChevronBtn.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      const isOpen = expMobileSubmenu && expMobileSubmenu.classList.contains('open');
      const next = !isOpen;

      if (expMobileSubmenu) expMobileSubmenu.classList.toggle('open', next);
      if (expChevron) expChevron.classList.toggle('open', next);
      expChevronBtn.setAttribute('aria-expanded', next ? 'true' : 'false');
    });
  }

  // Scroll with header offset if landing with hash
  if (window.location.hash) {
    setTimeout(function () {
      const target = document.querySelector(window.location.hash);
      if (target) {
        const headerOffset = 70;
        const elementPosition = target.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    }, 200);
  }

  // 2. Olaplex-Style Experiences Horizontal Carousel (Home Page with Infinite Loop)
  const expTrack = document.getElementById('expCarouselTrack');
  if (expTrack) {
    const expCards = expTrack.querySelectorAll('[data-exp-card]');
    const expPrev = document.getElementById('expCarouselPrev');
    const expNext = document.getElementById('expCarouselNext');
    const origCards = expTrack.querySelectorAll('[data-clone="none"]');
    const N = origCards.length || 4;

    // Prevent native drag on images and videos inside track
    expTrack.querySelectorAll('img, video').forEach(function (mediaEl) {
      mediaEl.addEventListener('dragstart', function (e) {
        e.preventDefault();
      });
    });

    // Helper: calculate set width (distance from set A card 0 to set B card 0)
    function getSetWidth() {
      if (expCards.length >= 2 * N && expCards[N] && expCards[0]) {
        return expCards[N].offsetLeft - expCards[0].offsetLeft;
      }
      return 0;
    }

    // Update active card based on center proximity (throttled with RAF)
    let rafActiveCard = null;
    function updateActiveCard() {
      const trackRect = expTrack.getBoundingClientRect();
      const trackCenter = trackRect.left + trackRect.width / 2;

      let closestCard = null;
      let minDistance = Infinity;

      expCards.forEach(function (card) {
        const cardRect = card.getBoundingClientRect();
        const cardCenter = cardRect.left + cardRect.width / 2;
        const distance = Math.abs(trackCenter - cardCenter);

        if (distance < minDistance) {
          minDistance = distance;
          closestCard = card;
        }
      });

      expCards.forEach(function (card) {
        if (card === closestCard) {
          card.classList.add('is-active');
        } else {
          card.classList.remove('is-active');
        }
      });

      return closestCard;
    }

    function throttledUpdateActive() {
      if (rafActiveCard) return;
      rafActiveCard = requestAnimationFrame(function () {
        updateActiveCard();
        rafActiveCard = null;
      });
    }

    // Initial position: center middle card of set B without animation
    function initPosition() {
      const middleCardIdx = N + Math.floor(N / 2);
      const middleCard = expCards[middleCardIdx] || expCards[0];
      if (!middleCard) return;

      const centerOffset = middleCard.offsetLeft - (expTrack.clientWidth - middleCard.offsetWidth) / 2;
      expTrack.style.scrollSnapType = 'none';
      expTrack.style.scrollBehavior = 'auto';
      expTrack.scrollLeft = centerOffset;

      requestAnimationFrame(function () {
        expTrack.style.scrollSnapType = '';
        expTrack.style.scrollBehavior = '';
        updateActiveCard();
      });
    }

    // Run initial positioning
    initPosition();
    setTimeout(initPosition, 60);
    window.addEventListener('load', initPosition);

    // Silent Jump mechanism (Lompat diam-diam ke set B)
    let isJumping = false;
    let pendingJumpDelta = 0;
    let currentlyPlayingVideo = null;

    function jumpSilent(delta) {
      if (isJumping || delta === 0) return;

      // Tahan lompatan jika video sedang berputar agar playback tidak terputus
      if (currentlyPlayingVideo && !currentlyPlayingVideo.paused) {
        pendingJumpDelta = delta;
        return;
      }

      isJumping = true;
      expTrack.style.scrollSnapType = 'none';
      expTrack.style.scrollBehavior = 'auto';

      expTrack.scrollLeft += delta;

      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          expTrack.style.scrollSnapType = '';
          expTrack.style.scrollBehavior = '';
          isJumping = false;
          updateActiveCard();
        });
      });
    }

    // Check if active card is in clone set and jump silently to equivalent card in set B
    function checkAndPerformJump() {
      if (isDown || isJumping) return;
      const active = updateActiveCard();
      if (!active) return;

      const cloneType = active.getAttribute('data-clone');
      const setWidth = getSetWidth();
      if (setWidth <= 0) return;

      if (cloneType === 'prev') {
        jumpSilent(+setWidth);
      } else if (cloneType === 'next') {
        jumpSilent(-setWidth);
      }
    }

    // Debounced scroll listener & native scrollend
    let scrollDebounceTimer = null;
    expTrack.addEventListener('scroll', function () {
      throttledUpdateActive();
      clearTimeout(scrollDebounceTimer);
      scrollDebounceTimer = setTimeout(checkAndPerformJump, 80);
    }, { passive: true });

    if ('onscrollend' in window) {
      expTrack.addEventListener('scrollend', checkAndPerformJump);
    }
    window.addEventListener('resize', throttledUpdateActive, { passive: true });

    // Desktop arrows (< and >) — selalu aktif tanpa disabled
    if (expPrev) {
      expPrev.addEventListener('click', function () {
        const cardWidth = expCards[0] ? expCards[0].offsetWidth : 300;
        expTrack.scrollBy({ left: -(cardWidth + 2), behavior: 'smooth' });
      });
    }
    if (expNext) {
      expNext.addEventListener('click', function () {
        const cardWidth = expCards[0] ? expCards[0].offsetWidth : 300;
        expTrack.scrollBy({ left: (cardWidth + 2), behavior: 'smooth' });
      });
    }

    // Keyboard arrow keys navigation when carousel has focus
    expTrack.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        const cardWidth = expCards[0] ? expCards[0].offsetWidth : 300;
        expTrack.scrollBy({ left: -(cardWidth + 2), behavior: 'smooth' });
      } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        const cardWidth = expCards[0] ? expCards[0].offsetWidth : 300;
        expTrack.scrollBy({ left: (cardWidth + 2), behavior: 'smooth' });
      }
    });

    // Pointer Events: Desktop mouse drag with continuous loop & accidental click suppression
    let isDown = false;
    let hasDragged = false;
    let startX = 0;
    let scrollStart = 0;
    let activePointerId = null;

    expTrack.addEventListener('pointerdown', function (e) {
      if (e.pointerType === 'touch') return;
      if (e.button !== 0) return; // Left click only

      isDown = true;
      hasDragged = false;
      startX = e.clientX;
      scrollStart = expTrack.scrollLeft;
      activePointerId = e.pointerId;

      try {
        expTrack.setPointerCapture(e.pointerId);
      } catch (err) {}

      expTrack.classList.add('is-dragging');
    });

    expTrack.addEventListener('pointermove', function (e) {
      if (!isDown) return;
      const deltaX = e.clientX - startX;
      if (Math.abs(deltaX) > 5) {
        hasDragged = true;
      }

      let newScrollLeft = scrollStart - deltaX;
      const setWidth = getSetWidth();

      if (setWidth > 0 && expCards.length >= 2 * N) {
        const firstCardB = expCards[N];
        const lastCardB = expCards[2 * N - 1];
        const minCenterB = firstCardB.offsetLeft - (expTrack.clientWidth - firstCardB.offsetWidth) / 2;
        const maxCenterB = lastCardB.offsetLeft - (expTrack.clientWidth - lastCardB.offsetWidth) / 2;
        const cardWidth = firstCardB.offsetWidth;

        // Saat drag melewati batas set B, lompat dengan menyesuaikan startScroll
        if (newScrollLeft < minCenterB - cardWidth / 2) {
          newScrollLeft += setWidth;
          scrollStart += setWidth;
        } else if (newScrollLeft > maxCenterB + cardWidth / 2) {
          newScrollLeft -= setWidth;
          scrollStart -= setWidth;
        }
      }

      expTrack.scrollLeft = newScrollLeft;
    });

    function endPointerDrag(e) {
      if (!isDown) return;
      isDown = false;
      expTrack.classList.remove('is-dragging');

      if (activePointerId !== null) {
        try {
          expTrack.releasePointerCapture(activePointerId);
        } catch (err) {}
        activePointerId = null;
      }

      throttledUpdateActive();
      checkAndPerformJump();

      if (hasDragged) {
        setTimeout(function () {
          hasDragged = false;
        }, 60);
      }
    }

    expTrack.addEventListener('pointerup', endPointerDrag);
    expTrack.addEventListener('pointercancel', endPointerDrag);

    // Suppress clicks on children if user dragged > 5px
    expTrack.addEventListener('click', function (e) {
      if (hasDragged) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
      }
    }, true); // Capturing phase

    // Helper: Synchronize Play/Pause icon state across cards with identical data-index
    function syncPlayIcons(index, isPlaying) {
      expTrack.querySelectorAll(`[data-exp-card][data-index="${index}"]`).forEach(function (c) {
        const pBtn = c.querySelector('.exp-ctrl-play');
        if (pBtn) {
          const playIcon = pBtn.querySelector('.icon-play');
          const pauseIcon = pBtn.querySelector('.icon-pause');
          if (playIcon) playIcon.style.display = isPlaying ? 'none' : 'block';
          if (pauseIcon) pauseIcon.style.display = isPlaying ? 'block' : 'none';
        }
      });
    }

    // Helper: Synchronize Mute icon and audio state across cards with identical data-index
    function syncMuteIcons(index, isMuted) {
      expTrack.querySelectorAll(`[data-exp-card][data-index="${index}"]`).forEach(function (c) {
        const mBtn = c.querySelector('.exp-ctrl-mute');
        if (mBtn) {
          const mutedIcon = mBtn.querySelector('.icon-muted');
          const unmutedIcon = mBtn.querySelector('.icon-unmuted');
          if (mutedIcon) mutedIcon.style.display = isMuted ? 'block' : 'none';
          if (unmutedIcon) unmutedIcon.style.display = isMuted ? 'none' : 'block';
        }
        const v = c.querySelector('video');
        if (v) v.muted = isMuted;
      });
    }

    // Helper: Pause all other videos across carousel and page
    function pauseAllOtherVideos(exceptVideo) {
      expCards.forEach(function (c) {
        const vid = c.querySelector('video');
        if (vid && vid !== exceptVideo) {
          vid.pause();
          vid.currentTime = 0;
          syncPlayIcons(c.getAttribute('data-index'), false);
        }
      });

      const otherPlayers = document.querySelectorAll('[data-video-player]');
      otherPlayers.forEach(function (player) {
        const vid = player.querySelector('video');
        if (vid && vid !== exceptVideo) {
          vid.pause();
          vid.currentTime = 0;
          player.classList.remove('is-playing');
          const mute = player.querySelector('.vcp-mute-btn');
          if (mute) mute.style.display = 'none';
        }
      });
    }

    // Setup controls for each card (including clones)
    expCards.forEach(function (card) {
      const video = card.querySelector('video');
      const playBtn = card.querySelector('.exp-ctrl-play');
      const muteBtn = card.querySelector('.exp-ctrl-mute');
      const cardIndex = card.getAttribute('data-index');

      if (!video) return;

      function centerCard() {
        const offset = card.offsetLeft - (expTrack.clientWidth - card.offsetWidth) / 2;
        expTrack.scrollTo({ left: offset, behavior: 'smooth' });
      }

      function playThisCard() {
        centerCard();
        pauseAllOtherVideos(video);

        // Lazy load video source on clone cards if not yet loaded
        if (!video.src && video.getAttribute('data-src')) {
          video.src = video.getAttribute('data-src');
          video.load();
        }

        video.muted = false;
        syncMuteIcons(cardIndex, false);

        const p = video.play();
        if (p !== undefined) {
          p.then(function () {
            currentlyPlayingVideo = video;
            syncPlayIcons(cardIndex, true);
          }).catch(function () {
            video.muted = true;
            syncMuteIcons(cardIndex, true);
            video.play();
            currentlyPlayingVideo = video;
            syncPlayIcons(cardIndex, true);
          });
        }
      }

      function pauseThisCard() {
        video.pause();
        currentlyPlayingVideo = null;
        syncPlayIcons(cardIndex, false);

        // Eksekusi lompatan tertunda jika ada
        if (pendingJumpDelta !== 0) {
          jumpSilent(pendingJumpDelta);
          pendingJumpDelta = 0;
        }
      }

      if (playBtn) {
        playBtn.addEventListener('click', function (e) {
          e.stopPropagation();
          if (video.paused) {
            playThisCard();
          } else {
            pauseThisCard();
          }
        });
      }

      if (muteBtn) {
        muteBtn.addEventListener('click', function (e) {
          e.stopPropagation();
          const nextMuted = !video.muted;
          syncMuteIcons(cardIndex, nextMuted);
        });
      }

      video.addEventListener('ended', function () {
        video.currentTime = 0;
        syncPlayIcons(cardIndex, false);
        currentlyPlayingVideo = null;

        // Eksekusi lompatan tertunda jika ada
        if (pendingJumpDelta !== 0) {
          jumpSilent(pendingJumpDelta);
          pendingJumpDelta = 0;
        }
      });
    });
  }

  // 3. Olaplex-style Unified Video Player Controller (Experiences page, etc.)
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

      // Also pause any carousel video on page
      const carouselCards = document.querySelectorAll('[data-exp-card]');
      carouselCards.forEach(function (c) {
        const vid = c.querySelector('video');
        if (vid) {
          vid.pause();
          vid.currentTime = 0;
          vid.load();
          const pIcon = c.querySelector('.icon-play');
          const psIcon = c.querySelector('.icon-pause');
          if (pIcon) pIcon.style.display = 'block';
          if (psIcon) psIcon.style.display = 'none';
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

    document.querySelectorAll('video.lazy-video, .hero-video-bg').forEach(function (video) {
      videoObserver.observe(video);
    });
  }

  // 4. Workshop Video Viewport Autoplay (/workshop)
  const wkAutoplay = document.querySelector('[data-workshop-autoplay]');
  if (wkAutoplay) {
    const wkVideo = wkAutoplay.querySelector('video');
    const wkMuteBtn = wkAutoplay.querySelector('.wk-mute-btn');
    const mutedIcon = wkMuteBtn ? wkMuteBtn.querySelector('.icon-muted') : null;
    const unmutedIcon = wkMuteBtn ? wkMuteBtn.querySelector('.icon-unmuted') : null;

    if (wkVideo) {
      wkVideo.muted = true;

      if (!isReducedMotion && 'IntersectionObserver' in window) {
        const wkObserver = new IntersectionObserver(
          function (entries) {
            entries.forEach(function (entry) {
              if (entry.isIntersecting) {
                const playPromise = wkVideo.play();
                if (playPromise !== undefined) {
                  playPromise.catch(function () {});
                }
              } else {
                if (!wkVideo.paused) {
                  wkVideo.pause();
                }
              }
            });
          },
          { threshold: 0.25 }
        );
        wkObserver.observe(wkAutoplay);
      } else {
        const p = wkVideo.play();
        if (p !== undefined) p.catch(function () {});
      }

      if (wkMuteBtn) {
        wkMuteBtn.addEventListener('click', function (e) {
          e.stopPropagation();
          wkVideo.muted = !wkVideo.muted;
          if (mutedIcon && unmutedIcon) {
            mutedIcon.style.display = wkVideo.muted ? 'block' : 'none';
            unmutedIcon.style.display = wkVideo.muted ? 'none' : 'block';
          }
        });
      }
    }
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
      const waNumber = bookingForm.getAttribute('data-wa') || '6285121807590';
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
