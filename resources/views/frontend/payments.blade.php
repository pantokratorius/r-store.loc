@extends('frontend.layout')


@section('page_title')
Оплата и доставка товара
@endsection
@section('page_description')
    Способы оплаты и доставки
@endsection
@section('page_keywords')
    Способы оплаты и доставки
@endsection


@section('content')

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

        Оплата и доставка

    </h1>
  </div>
<div class="editor">
<h2><strong>Наш интернет-магазин осуществляет доставку по Новороссийску и всей России:</strong></h2>
<p>&nbsp;</p>
<h2>Способы доставки</h2>
<ul>
    <li>Бесплатная доставка по Новороссийску</li>
    <li>Бесплатная <b> экспресс - доставка</b> за 1 час по Новороссийску</li>
    <li>Бесплатная доставка по Новороссийску</li>
</ul>
<ul>
    <li>Забрать в нашем магазине</li>
    <li>Самовывоз из магазина на проспекте Ленина д. 13</li>
</ul>
<ul>
    <li>Доставка по РФ</li>
    <li>Доставка по России осуществляется транспортной компанией <a target="_blank" href="https://www.cdek.ru/"><span style="text-decoration: underline;"><span style="color: #00ccff; text-decoration: underline;">СДЭК</span></span></a>&nbsp;по 100% предоплате.</li>
</ul>

<h2>Способы оплаты</h2>
<ul>
    <li></li>
    <li>Кредит</li>
    <li>Наличный расчет</li>
    <li>Безналичный расчет</li>
</ul>
  </div>


@endsection

@push('styles')
    <style>
        ul:not(.main-menu):not(.sidebar-menu) li:not(:first-child) {
            margin-left: 15px;
        }

        ul:not(.mobile-sidebar-menu):not(.sidebar-menu) li:first-child {
            font-weight: bold;
            /* font-size: 120%; */
            list-style: none;
        }

        .mobile-sidebar-menu-bottom li:first-child {
            text-decoration: underline
        }

    </style>
@endpush
