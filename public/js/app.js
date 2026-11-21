/* Roval Tech — interacciones de la interfaz */
(function () {
    'use strict';

    // Menú móvil
    var toggle = document.getElementById('menuToggle');
    var nav = document.getElementById('navLinks');
    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            var isOpen = nav.classList.toggle('open');
            toggle.classList.toggle('open', isOpen);
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            toggle.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
        });

        nav.addEventListener('click', function (event) {
            if (event.target.closest('a')) {
                nav.classList.remove('open');
                toggle.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Sombra del header al desplazarse
    var header = document.getElementById('siteHeader');
    var progress = document.getElementById('scrollProgress');
    if (header) {
        var onScroll = function () {
            header.classList.toggle('scrolled', window.scrollY > 20);
            if (progress) {
                var max = document.documentElement.scrollHeight - window.innerHeight;
                var percent = max > 0 ? (window.scrollY / max) * 100 : 0;
                progress.style.width = Math.min(percent, 100).toFixed(2) + '%';
            }
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll, { passive: true });
        onScroll();
    }

    // Aparición suave de secciones
    var reveals = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && reveals.length) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        reveals.forEach(function (el) { observer.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('visible'); });
    }

    // Retraso escalonado dentro de cada grupo de tarjetas
    document.querySelectorAll('.grid-2, .grid-3, .grid-4, .project-grid, .stat-grid, .values-grid, .object-grid, .tag-row, .check-list').forEach(function (group) {
        Array.prototype.forEach.call(group.children, function (child, index) {
            if (child.classList.contains('reveal')) {
                child.style.setProperty('--delay', Math.min(index * 70, 350) + 'ms');
            }
        });
    });

    // Guardar el estado de publicación al cambiar el radio del listado
    document.querySelectorAll('.publication-toggle input[type="radio"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            this.form.submit();
        });
    });

    // Efectos que siguen al cursor (solo en dispositivos con puntero fino)
    if (window.matchMedia && window.matchMedia('(pointer: fine)').matches) {
        document.querySelectorAll('.hover-card').forEach(function (card) {
            card.addEventListener('mousemove', function (event) {
                var rect = card.getBoundingClientRect();
                card.style.setProperty('--mx', ((event.clientX - rect.left) / rect.width * 100).toFixed(1) + '%');
                card.style.setProperty('--my', ((event.clientY - rect.top) / rect.height * 100).toFixed(1) + '%');
            });
        });

        var hero = document.querySelector('.hero');
        var mock = document.querySelector('.hero-visual .mock-card');
        if (hero && mock) {
            hero.addEventListener('mousemove', function (event) {
                var rect = hero.getBoundingClientRect();
                var x = (event.clientX - rect.left) / rect.width - 0.5;
                var y = (event.clientY - rect.top) / rect.height - 0.5;
                mock.style.transform = 'translate3d(' + (x * 16).toFixed(1) + 'px,' + (y * 12).toFixed(1) + 'px,0) rotateY(' + (x * 3).toFixed(1) + 'deg) rotateX(' + (-y * 3).toFixed(1) + 'deg)';
            });
            hero.addEventListener('mouseleave', function () {
                mock.style.transform = '';
            });
        }

        document.querySelectorAll('.btn-primary').forEach(function (button) {
            button.addEventListener('mousemove', function (event) {
                var rect = button.getBoundingClientRect();
                var x = (event.clientX - rect.left) / rect.width - 0.5;
                var y = (event.clientY - rect.top) / rect.height - 0.5;
                button.style.transform = 'translate(' + (x * 5).toFixed(1) + 'px,' + (y * 3).toFixed(1) + 'px)';
            });
            button.addEventListener('mouseleave', function () {
                button.style.transform = '';
            });
        });
    }

    // Contadores animados al entrar en pantalla
    var counters = document.querySelectorAll('[data-count]');
    if (counters.length && 'IntersectionObserver' in window) {
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;

                var element = entry.target;
                var target = parseInt(element.getAttribute('data-count'), 10) || 0;
                var suffix = element.getAttribute('data-suffix') || '';
                var start = null;

                var tick = function (time) {
                    if (start === null) start = time;
                    var progress = Math.min((time - start) / 1100, 1);
                    var eased = 1 - Math.pow(1 - progress, 3);
                    element.textContent = Math.round(target * eased) + suffix;
                    if (progress < 1) window.requestAnimationFrame(tick);
                };

                window.requestAnimationFrame(tick);
                counterObserver.unobserve(element);
            });
        }, { threshold: 0.6 });

        counters.forEach(function (counter) { counterObserver.observe(counter); });
    }

    // Cierre automático del mensaje de éxito del formulario
    var alert = document.querySelector('.alert-success');
    if (alert) {
        window.setTimeout(function () {
            alert.style.transition = 'opacity .4s ease';
            alert.style.opacity = '0';
            window.setTimeout(function () { alert.remove(); }, 400);
        }, 8000);
    }
})();
