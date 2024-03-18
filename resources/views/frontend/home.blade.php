@extends('frontend.layout')


@section('content')
<div class="products-list is-collection row">
  <div class="promo-slide swiper-slide swiper-slide-active is-active" data-slider-slide="" data-swiper-slide-index="1" >
        
    <a class="promo-slide-inner" href=" {{ route('category', 'iPhone15') }} " title="Слайдер Блок 15">
      <img class="promo-slide-image" src="{{ asset('banner.jpg') }}" title="Слайдер Блок 15" alt="Слайдер Блок 15">
    </a>
  
  </div>
</div>
@endsection
