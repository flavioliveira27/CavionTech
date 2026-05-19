// ========== NAVBAR SCROLL EFFECT ==========
const navbar = document.getElementById('navbar');
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// ========== MOBILE MENU TOGGLE ==========
navToggle.addEventListener('click', () => {
    navToggle.classList.toggle('active');
    navLinks.classList.toggle('active');
    document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
});

// Close mobile menu when clicking a link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        navToggle.classList.remove('active');
        navLinks.classList.remove('active');
        document.body.style.overflow = '';
    });
});

// ========== ACTIVE NAV LINK ON SCROLL ==========
const sections = document.querySelectorAll('section[id]');

function updateActiveLink() {
    const scrollY = window.scrollY;

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute('id');

        if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${sectionId}`) {
                    link.classList.add('active');
                }
            });
        }
    });
}

window.addEventListener('scroll', updateActiveLink);

// ========== SCROLL ANIMATIONS ==========
function animateOnScroll() {
    const elements = document.querySelectorAll(
        '.about-grid, .team-card, .services-grid, .training-card, .pricing-card, .client-item, .blog-card, .contact-box, .section-header'
    );

    const observer = new IntersectionObserver((entries) => {
        let visibleIndex = 0;
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, visibleIndex * 200); // 100ms padrão restaurado
                visibleIndex++;
                observer.unobserve(entry.target);
            } else if (entry.boundingClientRect.top < 0) {
                // Se o elemento já passou p/ cima (recarregou a página no meio), force ele a aparecer!
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    elements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(el);
    });
}

animateOnScroll();

// ========== COUNTER ANIMATION ==========
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const text = el.textContent;
                const match = text.match(/(\d+\.?\d*)/);

                if (match) {
                    const target = parseFloat(match[0]);
                    const suffix = text.replace(match[0], '');
                    const isDecimal = text.includes('.');
                    const duration = 2000;
                    const step = target / (duration / 16);
                    let current = 0;

                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        el.textContent = (isDecimal ? current.toFixed(1) : Math.floor(current)) + suffix;
                    }, 16);
                }

                observer.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
}

animateCounters();

// ========== FORM SUBMISSION ==========
const contactForm = document.getElementById('contactForm');

contactForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData);

    // Show success feedback
    const btn = contactForm.querySelector('button[type="submit"]');
    const originalText = btn.textContent;
    btn.textContent = 'MENSAGEM ENVIADA ✓';
    btn.style.background = 'linear-gradient(135deg, #10B981, #059669)';
    btn.style.borderColor = '#10B981';
    btn.disabled = true;

    setTimeout(() => {
        btn.textContent = originalText;
        btn.style.background = '';
        btn.style.borderColor = '';
        btn.disabled = false;
        contactForm.reset();
    }, 3000);
});


