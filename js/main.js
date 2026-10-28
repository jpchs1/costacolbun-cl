// Costa Colbún — Main JavaScript
(function() {
    'use strict';

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function handleScroll() {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 80) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

    }

    window.addEventListener('scroll', handleScroll, { passive: true });

    // Mobile menu toggle
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');

    navToggle.addEventListener('click', function() {
        navToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
        document.body.classList.toggle('menu-open');
    });

    function closeMenu() {
        navToggle.classList.remove('active');
        navMenu.classList.remove('active');
        document.body.classList.remove('menu-open');
        navToggle.setAttribute('aria-expanded', 'false');
    }
    navToggle.addEventListener('click', function() {
        navToggle.setAttribute('aria-expanded', String(navMenu.classList.contains('active')));
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && navMenu.classList.contains('active')) {
            closeMenu();
            navToggle.focus();
        }
    });
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) closeMenu();
    });
    handleScroll();
    // Close menu on link click
    navMenu.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function() {
            closeMenu();
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            var target = document.getElementById(this.getAttribute('href').slice(1));
            if (target) {
                var offset = navbar.offsetHeight;
                var pos = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({ top: pos, behavior: reduceMotion ? 'auto' : 'smooth' });
            }
        });
    });

    // Scroll animations (Intersection Observer)
    var animElements = document.querySelectorAll(
        '.about-grid, .feature-card, .lakelife-card, .nearby-card, .gallery-item, .section-header, .pricing-highlight, .contact-grid'
    );

    if ('IntersectionObserver' in window && !reduceMotion) {
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    animElements.forEach(function(el) {
        el.classList.add('animate-ready');
        observer.observe(el);
    });

    }

    // Gallery Lightbox
    var lightbox = document.getElementById('lightbox');
    var lightboxImg = lightbox.querySelector('.lightbox-img');
    var galleryItems = document.querySelectorAll('.gallery-item img');
    var currentIndex = 0;
    var galleryFocus = null;
    var images = Array.from(galleryItems);

    galleryItems.forEach(function(img, index) {
        var item = img.closest('.gallery-item');
        item.tabIndex = 0;
        item.setAttribute('role', 'button');
        item.setAttribute('aria-label', 'Ampliar: ' + img.alt);
        item.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); img.click(); }
        });
        img.addEventListener('click', function() {
            currentIndex = index;
            openLightbox(img.src, img.alt);
        });
    });

    function openLightbox(src, alt) {
        galleryFocus = document.activeElement;
        lightboxImg.src = src;
        lightboxImg.alt = alt;
        lightbox.classList.add('active');
        lightbox.setAttribute('aria-hidden', 'false');
        lightbox.querySelector('.lightbox-close').focus();
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        lightbox.setAttribute('aria-hidden', 'true');
        if (galleryFocus) galleryFocus.focus();
        document.body.style.overflow = '';
    }

    lightbox.querySelector('.lightbox-close').addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });

    lightbox.querySelector('.lightbox-prev').addEventListener('click', function(e) {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        lightboxImg.src = images[currentIndex].src;
        lightboxImg.alt = images[currentIndex].alt;
    });

    lightbox.querySelector('.lightbox-next').addEventListener('click', function(e) {
        e.stopPropagation();
        currentIndex = (currentIndex + 1) % images.length;
        lightboxImg.src = images[currentIndex].src;
        lightboxImg.alt = images[currentIndex].alt;
    });

    document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Tab') {
            var controls = Array.from(lightbox.querySelectorAll('button'));
            var first = controls[0], last = controls[controls.length - 1];
            if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
            else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
        }
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') lightbox.querySelector('.lightbox-prev').click();
        if (e.key === 'ArrowRight') lightbox.querySelector('.lightbox-next').click();
    });

    // Active nav link on scroll
    var sections = document.querySelectorAll('section[id]');
    function highlightNav() {
        var scrollPos = window.pageYOffset + navbar.offsetHeight + 100;
        sections.forEach(function(section) {
            var top = section.offsetTop;
            var height = section.offsetHeight;
            var id = section.getAttribute('id');
            var link = navbar.querySelector('a[href="#' + id + '"]');
            if (link) {
                if (scrollPos >= top && scrollPos < top + height) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            }
        });
    }
    window.addEventListener('scroll', highlightNav, { passive: true });

    // Blog Carousel
    var blogCarousel = document.getElementById('blogCarousel');
    var blogPrev = document.getElementById('blogPrev');
    var blogNext = document.getElementById('blogNext');

    if (blogCarousel && blogPrev && blogNext) {
        var scrollAmount = 0;

        function getBlogCardWidth() {
            var card = blogCarousel.querySelector('.blog-card');
            if (!card) return 340;
            return card.offsetWidth + 24; // card width + gap
        }

        blogNext.addEventListener('click', function() {
            var cardW = getBlogCardWidth();
            var maxScroll = blogCarousel.scrollWidth - blogCarousel.parentElement.offsetWidth;
            scrollAmount = Math.min(scrollAmount + cardW, maxScroll);
            blogCarousel.style.transform = 'translateX(-' + scrollAmount + 'px)';
        });

        blogPrev.addEventListener('click', function() {
            var cardW = getBlogCardWidth();
            scrollAmount = Math.max(scrollAmount - cardW, 0);
            blogCarousel.style.transform = 'translateX(-' + scrollAmount + 'px)';
        });

        // Touch/drag support
        var isDragging = false;
        var startX = 0;
        var dragStartScroll = 0;

        blogCarousel.addEventListener('mousedown', function(e) {
            isDragging = true;
            startX = e.pageX;
            dragStartScroll = scrollAmount;
        });

        blogCarousel.addEventListener('mousemove', function(e) {
            if (!isDragging) return;
            var diff = startX - e.pageX;
            var maxScroll = blogCarousel.scrollWidth - blogCarousel.parentElement.offsetWidth;
            scrollAmount = Math.max(0, Math.min(dragStartScroll + diff, maxScroll));
            blogCarousel.style.transform = 'translateX(-' + scrollAmount + 'px)';
        });

        document.addEventListener('mouseup', function() { isDragging = false; });

        blogCarousel.addEventListener('touchstart', function(e) {
            startX = e.touches[0].pageX;
            dragStartScroll = scrollAmount;
        }, { passive: true });

        blogCarousel.addEventListener('touchmove', function(e) {
            var diff = startX - e.touches[0].pageX;
            var maxScroll = blogCarousel.scrollWidth - blogCarousel.parentElement.offsetWidth;
            scrollAmount = Math.max(0, Math.min(dragStartScroll + diff, maxScroll));
            blogCarousel.style.transform = 'translateX(-' + scrollAmount + 'px)';
        }, { passive: true });
    }


    // Help visitors prepare a specific inquiry without storing their personal data.
    function prepareInquiry(text, topic, scrollToForm) {
        var messageField = document.getElementById('message');
        var topicField = document.getElementById('inquiryTopic');
        if (!messageField) return;
        if (!messageField.value.includes(text)) {
            messageField.value = messageField.value.trim() ? messageField.value.trim() + '\n\n' + text : text;
        }
        if (topicField) topicField.value = topic;
        var wrapper = document.querySelector('.contact-form-wrapper');
        if (wrapper) wrapper.classList.add('inquiry-ready');
        if (scrollToForm) {
            var formTop = document.getElementById('contacto').getBoundingClientRect().top + window.pageYOffset - navbar.offsetHeight;
            window.scrollTo({top: formTop, behavior: reduceMotion ? 'auto' : 'smooth'});
        }
    }
    var terrainMatch = document.getElementById('terrainMatch');
    if (terrainMatch) terrainMatch.addEventListener('submit', function(event) {
        event.preventDefault();
        var text = 'Quiero consultar el plano, los sitios disponibles y sus valores vigentes.\n' +
            'Mi proyecto: ' + document.getElementById('terrainUse').value + '\n' +
            'Me gustaria priorizar: ' + document.getElementById('terrainPriority').value + '\n' +
            'Presupuesto del terreno: ' + document.getElementById('terrainBudget').value;
        prepareInquiry(text, 'Plano, disponibilidad y valores', true);
        document.getElementById('name').focus({preventScroll:true});
    });
    document.querySelectorAll('[data-house-idea]').forEach(function(link) {
        link.addEventListener('click', function() {
            prepareInquiry('Asi imagino mi proyecto: ' + link.dataset.houseIdea + '. Quiero revisar terreno, factibilidad y condiciones de fachada.', 'Construcción y fachada', false);
        });
    });
    document.querySelectorAll('[data-inquiry]').forEach(function(link) {
        link.addEventListener('click', function() {
            prepareInquiry(link.dataset.inquiry, 'Servicios y antecedentes del terreno', false);
        });
    });
    var photoSlides = [{"img":"DJI_0005","title":"El paisaje donde empieza todo","text":"Una vista aérea del entorno de Costa Colbún para comenzar a imaginar tu próxima casa."},{"img":"DJI_0001","title":"Descubre el lugar desde otra perspectiva","text":"Observa la relación entre los terrenos, el paisaje y el lago. En la visita podrás recorrer el sitio que te interese."},{"img":"DJI_0016","title":"Un entorno para conocer en persona","text":"Las fotografías son el comienzo. Ven a descubrir las vistas y la orientación de los terrenos."}];
    document.querySelectorAll('[data-tour-slide]').forEach(function(button) {
        button.addEventListener('click', function() {
            var index = Number(button.dataset.tourSlide);
            var slide = photoSlides[index];
            if (!slide) return;
            document.getElementById('tourPhotoSource').srcset = 'img/' + slide.img + '.webp';
            document.getElementById('tourPhoto').src = 'img/' + slide.img + '.JPG';
            document.getElementById('tourPhoto').alt = slide.title + ' — Costa Colbún';
            document.getElementById('tourPhotoCount').textContent = String(index + 1).padStart(2, '0') + ' / 03';
            document.getElementById('tourPhotoTitle').textContent = slide.title;
            document.getElementById('tourPhotoText').textContent = slide.text;
            document.querySelectorAll('[data-tour-slide]').forEach(function(item) {
                item.setAttribute('aria-pressed', String(item === button));
            });
        });
    });

    // Prepare a WhatsApp inquiry; the visitor reviews and sends it.
    var contactForm = document.getElementById('contactForm');
    var visitDate = document.getElementById('visitDate');
    var today = new Date();
    visitDate.min = today.getFullYear() + '-' + String(today.getMonth() + 1).padStart(2, '0') + '-' + String(today.getDate()).padStart(2, '0');
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        if (!contactForm.reportValidity()) return;
        var name = document.getElementById('name').value.trim();
        var email = document.getElementById('email').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var message = document.getElementById('message').value.trim();
        var buildPlan = document.getElementById('buildPlan').value;
        var lines = ['Hola, quiero conocer Costa Colbún este verano 2027 y consultar por el Bono de Construcción de UF 300.', '', 'Nombre: ' + name];
        var inquiryTopic = document.getElementById('inquiryTopic');
        if (inquiryTopic) lines.push('Quiero revisar: ' + inquiryTopic.value);
        if (email) lines.push('Email: ' + email);
        if (phone) lines.push('Teléfono: ' + phone);
        if (visitDate.value) lines.push('Fecha de visita propuesta: ' + visitDate.value.split('-').reverse().join('/'));
        if (buildPlan) lines.push('Plazo para construir: ' + buildPlan);
        if (message) lines.push('', message);
        window.location.assign('https://wa.me/56992337976?text=' + encodeURIComponent(lines.join('\n')));
    });

})();
