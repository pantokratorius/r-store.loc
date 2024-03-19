@extends('frontend.layout')
@section('page_title')
Заказ оформлен
@endsection
@section('page_description')
Заказ оформлен
@endsection
@section('page_keywords')
Заказ оформлен
@endsection

@section('content')

<div class="cart-body">
  <div class="cart-list">
    <div class="content-wrapper container fhg-content">
        <div class="row cart-wrapper">
          <div class="cart cell-12">

    <div class="page-headding-wrapper">
    <h1 class="page-headding">
      Оформление заказа
    </h1>
    </div><!-- /.page_headding -->

          </div>
        </div>
      </div>

<div class="content-wrapper container fhg-content">
    <div class="row cart-wrapper">
      <div class="cart cell-12">
<div class="notice is-success text-center js-cart-empty">
Ваш заказ принят, с Вами свяжется наш менеджер.
</div>
      </div>
    </div>
  </div>


  </div>
</div>
<div class="cart-footer row flex-between">

  <div class="cell-4 cell-6-md cell-12-sm">



  </div>

</div>
@endsection

@push('scripts')
<script>
    $(function(){
        const Backlen=history.length;
        if (Backlen > 0) history.go(-Backlen);

        setTimeout(() => {
            location = "/"
        }, 5000);
    })
</script>
@endpush
