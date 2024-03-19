import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import Glide from '@glidejs/glide'

new Glide('.glide', {
    type: 'carousel', 
    autoplay: 5000,
    animationDuration: 1200,
    animationTimingFunc: 'ease-out',
    hoverpause: false,
   
}).mount()