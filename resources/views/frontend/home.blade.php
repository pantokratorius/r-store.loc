@extends('frontend.layout')
@vite(['resources/js/glide.js', 'resources/css/glide.scss'])
@section('content')
<div class="glide">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      <li class="glide__slide">
        <a href=" {{ route('category', 'iPhone15') }} ">
          <img style="width: 100%" class="promo-slide-image" src="{{ asset('banner.jpg') }}" title="Слайдер Блок 15" alt="Слайдер Блок 15">
        </a>
      </li>

      <li class="glide__slide">
        <a href=" {{ route('category', 'iPhone15') }} ">
          <img style="width: 100%" class="promo-slide-image" src="{{ asset('banner1.jpg') }}" title="Слайдер Блок 15" alt="Слайдер Блок 15">
        </a>
      </li>
      <li class="glide__slide">
        <a href=" {{ route('category', 'iPhone15') }} ">
          <img style="width: 100%" class="promo-slide-image" src="{{ asset('banner2.jpg') }}" title="Слайдер Макбук" alt="Слайдер Блок 15">
        </a>
      </li>
    </ul>
  </div>
</div>
<div class="glide">
  <div class="glide__bullets" data-glide-el="controls[nav]">
    <button class="glide__bullet glide__bullet--active" data-glide-dir="=0"></button>
    <button class="glide__bullet" data-glide-dir="=1"></button>
    <button class="glide__bullet" data-glide-dir="=2"></button>
  </div>
</div>

@endsection

@push('styles')
<style>
    .collection-wrapper{
        max-width: 1300px;
        margin-top: 20px;
      }
</style>
@endpush
