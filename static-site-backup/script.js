document.addEventListener('DOMContentLoaded', () => {

  /* ===== NAVBAR SCROLL ===== */
  const navbar = document.querySelector('.navbar');
  const handleScroll = () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  };
  window.addEventListener('scroll', handleScroll);
  handleScroll();

  /* ===== MOBILE MENU ===== */
  const navToggle = document.querySelector('.nav-toggle');
  const navLinks = document.querySelector('.nav-links');
  navToggle.addEventListener('click', () => {
    navToggle.classList.toggle('active');
    navLinks.classList.toggle('active');
  });
  navLinks.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      navToggle.classList.remove('active');
      navLinks.classList.remove('active');
    });
  });

  /* ===== SCROLL REVEAL ANIMATIONS ===== */
  const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
  const revealOnScroll = () => {
    revealElements.forEach((el, i) => {
      const rect = el.getBoundingClientRect();
      const windowH = window.innerHeight;
      if (rect.top < windowH - 80) {
        setTimeout(() => el.classList.add('active'), i * 60);
      }
    });
  };
  window.addEventListener('scroll', revealOnScroll);
  revealOnScroll();

  /* ===== COUNTER ANIMATION ===== */
  const counters = document.querySelectorAll('[data-count]');
  let counterDone = false;
  const animateCounters = () => {
    if (counterDone) return;
    counters.forEach(counter => {
      const rect = counter.getBoundingClientRect();
      if (rect.top < window.innerHeight - 50) {
        counterDone = true;
        const target = +counter.dataset.count;
        const suffix = counter.dataset.suffix || '';
        const duration = 2000;
        const start = performance.now();
        const step = (now) => {
          const progress = Math.min((now - start) / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          counter.textContent = Math.floor(target * eased) + suffix;
          if (progress < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
      }
    });
  };
  window.addEventListener('scroll', animateCounters);
  animateCounters();

  /* ===== SMOOTH ACTIVE NAV LINK ===== */
  const sections = document.querySelectorAll('section[id]');
  const navItems = document.querySelectorAll('.nav-links a:not(.nav-cta)');
  const highlightNav = () => {
    let current = '';
    sections.forEach(sec => {
      const top = sec.offsetTop - 150;
      if (window.scrollY >= top) current = sec.id;
    });
    navItems.forEach(a => {
      a.classList.remove('active');
      a.style.color = '';
      if (a.getAttribute('href') === '#' + current) {
        a.classList.add('active');
      }
    });
  };
  window.addEventListener('scroll', highlightNav);

  /* ===== TYPING EFFECT IN HERO ===== */
  const typingEl = document.querySelector('.typing-text');
  if (typingEl) {
    const words = ['Sites Profissionais', 'Apps Mobile', 'Sistemas ERP', 'E-commerce', 'Landing Pages'];
    let wordIndex = 0, charIndex = 0, isDeleting = false;
    const type = () => {
      const current = words[wordIndex];
      typingEl.textContent = isDeleting
        ? current.substring(0, charIndex--)
        : current.substring(0, charIndex++);
      let delay = isDeleting ? 40 : 80;
      if (!isDeleting && charIndex > current.length) {
        delay = 2000;
        isDeleting = true;
      } else if (isDeleting && charIndex < 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        delay = 400;
      }
      setTimeout(type, delay);
    };
    type();
  }

  /* ===== TILT EFFECT ON SERVICE CARDS ===== */
  document.querySelectorAll('.service-card').forEach(card => {
    card.addEventListener('mousemove', e => {
      const rect = card.getBoundingClientRect();
      const x = (e.clientX - rect.left) / rect.width - 0.5;
      const y = (e.clientY - rect.top) / rect.height - 0.5;
      card.style.transform = `translateY(-8px) perspective(600px) rotateX(${-y * 5}deg) rotateY(${x * 5}deg)`;
    });
    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  });

  /* ===== FORM HANDLING ===== */
  const form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const btn = form.querySelector('.form-submit');
      const origHTML = btn.innerHTML;
      btn.innerHTML = '<i class="ri-check-line"></i> Mensagem Enviada!';
      btn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
      setTimeout(() => {
        btn.innerHTML = origHTML;
        btn.style.background = '';
        form.reset();
      }, 3000);
    });
  }

  /* ===== PARALLAX ON HERO SHAPES ===== */
  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    const shapes = document.querySelectorAll('.hero-shape');
    shapes.forEach((shape, i) => {
      const speed = 0.1 + (i % 5) * 0.05;
      shape.style.transform = `translateY(${scrolled * speed}px)`;
    });
  });

  /* ===== NEWSLETTER FORM ===== */
  const newsletterForm = document.getElementById('newsletterForm');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', e => {
      e.preventDefault();
      const wrapper = newsletterForm.parentElement;
      const origHTML = newsletterForm.outerHTML;
      const descP = wrapper.querySelector('p');
      if (descP) descP.style.display = 'none';
      newsletterForm.outerHTML = '<p class="newsletter-success"><i class="ri-check-line"></i> Inscrição realizada com sucesso!</p>';
      setTimeout(() => {
        const successMsg = wrapper.querySelector('.newsletter-success');
        if (successMsg) successMsg.outerHTML = origHTML;
        if (descP) descP.style.display = '';
        // Re-attach listener
        const newForm = document.getElementById('newsletterForm');
        if (newForm) {
          newForm.addEventListener('submit', e => {
            e.preventDefault();
            newForm.reset();
          });
        }
      }, 4000);
    });
  }

});
