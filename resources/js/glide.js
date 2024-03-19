
import Glide from '@glidejs/glide'

const glide = new Glide('.glide', {
    type: 'carousel',
    autoplay: 5000,
    animationDuration: 1200,
    animationTimingFunc: 'ease-out',
    hoverpause: false,
})


glide.on('run', function(r) {
    $(".glide__bullet").removeClass('glide__bullet--active')
    $(".glide__bullets").find(`[data-glide-dir='=${glide.index}']`).addClass('glide__bullet--active')
  })


  glide.mount()
