@extends('frontend.layout')

@section('page_title')
    Связаться с нами
@endsection
@section('page_description')
    Связаться с нами, наши контакты
@endsection
@section('page_keywords')
    Связаться с нами, наши контакты
@endsection

@section('content')

<div class="page cell-12">

    <div class="breadcrumb-wrapper">
      <ul class="breadcrumb">
        <li class="breadcrumb-item home">
          <a class="breadcrumb-link home-icon" title="" href="/">
          </a>
        </li>
      </ul>
    </div>

    <div class="page-headding-wrapper" style="margin-bottom: 50px">
      <h1 class="page-headding">

          Контакты

      </h1>
    </div><!-- /.page_headding -->


      <div class="editor">
    <h2><a href="3">г. Новороссийск, проспект Ленина д.13</a></h2>
    <div class="info">
      <div>
    <p><span style="font-size: 14pt;"><strong>Режим работы:</strong></span></p>
    <ul>
      <li>Пн - Вс:&nbsp; 10:00 — 20:00</li>
      <li style="margin-top: 5px"><b>Без перерыва</b></li>
      <li><b>Без выходных</b></li>

    </ul>
  </div>
  <div>
    <p><span style="font-size: 14pt;"><strong>Связаться с нами:</strong></span></p>
    <ul>
      <li>Тел.:&nbsp;&nbsp;<a href="tel: +7(967)307-01-00"> +7 (967) 307-01-00</a></li>
    </ul>
    <div style="display: flex; margin-bottom: 20px">
      <a target="blank" title="Telegram" href="https://t.me/rstore_novoross"
        class="social-menu-link">
        <div class="fa fa-telegram fa-lg"></div>
      </a>
  <a target="blank" title="Telegram" href="https://t.me/rstore_novoross"
    class="social-menu-link">
    <div class="fa fa-whatsapp fa-lg"></div>
  </a>
</div>
  </div>
  </div>

    <p>
      <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae5b2c8114a7f6f086af8a1d742faaf35a49a5e5d45b3e7f15a86ee0fdf05d20d&amp;source=constructor" width="100%" height="545" frameborder="0"></iframe>
  </p>
      </div>




              </div>
@endsection

@push('styles')
    <style>
      ul {
        list-style: none;
        padding-left: 10px;
        margin: 5px 0 0;
      }


      .mobile-sidebar-menu-bottom li:last-child {
            text-decoration: underline
        }


    </style>
@endpush
