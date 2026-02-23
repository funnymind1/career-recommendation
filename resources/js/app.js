import './bootstrap';

import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.plugin(collapse);

Alpine.start();

// Initialize AOS
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    offset: 100,
});
