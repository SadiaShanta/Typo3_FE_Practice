/* slider.js
   Enables:
   - mousewheel -> horizontal scroll
   - drag to scroll (mouse & touch)
   - arrow controls (prev/next)
   - keyboard left/right
*/

(function () {
    const slider = document.querySelector('.js-horizontal-slider');
    if (!slider) return;
  
    let isDown = false;
    let startX;
    let scrollLeft;
  
    // mouse drag
    slider.addEventListener('mousedown', (e) => {
      isDown = true;
      slider.classList.add('is-dragging');
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
    });
  
    slider.addEventListener('mouseleave', () => {
      isDown = false;
      slider.classList.remove('is-dragging');
    });
  
    slider.addEventListener('mouseup', () => {
      isDown = false;
      slider.classList.remove('is-dragging');
    });
  
    slider.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 1; // scroll speed multiplier
      slider.scrollLeft = scrollLeft - walk;
    });
  
    // touch drag is native but we add no-op to improve UX for some browsers (optional)
    let touchStartX = 0;
    let touchStartScroll = 0;
    slider.addEventListener('touchstart', (e) => {
      touchStartX = e.touches[0].pageX;
      touchStartScroll = slider.scrollLeft;
    }, {passive: true});
  
    slider.addEventListener('touchmove', (e) => {
      const x = e.touches[0].pageX;
      const walk = (x - touchStartX);
      slider.scrollLeft = touchStartScroll - walk;
    }, {passive: true});
  
    // wheel -> horizontal (shift+wheel or normal wheel)
    slider.addEventListener('wheel', (e) => {
      // If shift key used, allow vertical behaviour for accessibility -> let it pass
      // Otherwise translate vertical wheel delta to horizontal scroll
      if (!e.shiftKey) {
        e.preventDefault();
        slider.scrollLeft += e.deltaY;
      }
    }, {passive: false});
  
    // controls
    const prev = document.querySelector('.js-slider-prev');
    const next = document.querySelector('.js-slider-next');
  
    function scrollToSlide(direction) {
      // find current center slide index
      const slides = Array.from(slider.querySelectorAll('.site-slider__slide'));
      if (!slides.length) return;
      const containerCenter = slider.scrollLeft + slider.offsetWidth / 2;
      let currentIndex = 0;
      let minDiff = Infinity;
      slides.forEach((s, i) => {
        const rect = s.getBoundingClientRect();
        const slideLeft = s.offsetLeft;
        const slideCenter = slideLeft + s.offsetWidth / 2;
        const diff = Math.abs(slideCenter - containerCenter);
        if (diff < minDiff) {
          minDiff = diff;
          currentIndex = i;
        }
      });
      let targetIndex = currentIndex + (direction === 'next' ? 1 : -1);
      targetIndex = Math.max(0, Math.min(slides.length - 1, targetIndex));
      const target = slides[targetIndex];
      if (target) {
        // align center
        const left = target.offsetLeft - (slider.offsetWidth - target.offsetWidth) / 2;
        slider.scrollTo({ left, behavior: 'smooth' });
      }
    }
  
    if (prev) prev.addEventListener('click', () => scrollToSlide('prev'));
    if (next) next.addEventListener('click', () => scrollToSlide('next'));
  
    // keyboard
    slider.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') {
        e.preventDefault();
        scrollToSlide('next');
      } else if (e.key === 'ArrowLeft') {
        e.preventDefault();
        scrollToSlide('prev');
      }
    });
  })();
  