@extends('frontend.layout')

@section('content')

<div class="content-wrapper container fhg-content">
  <div class="checkout-v2-wrapper co-section--checkout_content">
    <div class="co-section--checkout_order co-section--checkout_order_sided">

      <div class="co-section--checkout_header co-checkout-block--padded">
        <div class="decorated-title-wrapper co-checkout-title">
          <h1 class="decorated-title co-title co-title--h1">
          Оформление заказа
          </h1>
        </div>

      </div>
      <div class="co-sidebar-wrapper"><button class="co-sidebar-toggler js-co-sidebar-toggler">
        <span>
          <span class="co-icon halfling-shopping-cart"></span>
          <span class="co-sidebar-toggler_title">Ваш заказ</span>
          <span class="co-icon halfling-menu-down"></span>
        </span>
        <span class="co-basket_total-price co-price--current">{{$cart_price}}&nbsp;руб</span> 
      </button>
      <div class="co-sidebar co-sidebar--hidden@sm js-co-sidebar co-sidebar--fixed">
        <div class="co-basket co-checkout-block--padded">
          <div class="co-basket_item-list">
            <div class="co-basket_item">
              <div class="co-basket_item-image_container">
                <div class="co-basket_item-image">
                  <img alt="image" src="https://static.insales-cdn.com/images/products/1/3682/757050978/thumb_iPhone15ProMax_Blue_Small.jpg">
                </div>
              </div>
              <div class="co-basket_item-description">iPhone 15 Pro Max, 1 ТБ, Титановый синий</div>
              <div class="co-basket_item-total">
                <span class="co-basket_item-count">1</span> x <span class="co-basket_item-price co-price--current">164990&nbsp;руб</span>
              </div>
            </div>
            <div class="co-basket_item">
              <div class="co-basket_item-image_container">
                <div class="co-basket_item-image">
                  <img alt="image" src="https://static.insales-cdn.com/images/products/1/3682/757050978/thumb_iPhone15ProMax_Blue_Small.jpg">
                </div>
              </div>
              <div class="co-basket_item-description">iPhone 15 Pro Max, 1 ТБ, Титановый синий</div>
              <div class="co-basket_item-total">
                <span class="co-basket_item-count">1</span> x <span class="co-basket_item-price co-price--current">164990&nbsp;руб</span>
              </div>
            </div>
            </div>
            <div class="co-basket_subtotal-list">
              <div class="co-basket_subtotal">
                <div class="co-basket_subtotal-title">Сумма по товарам</div>
                <div class="co-basket_subtotal-price co-price--current" id="items_price">{{$cart_price}}&nbsp;руб</div>
                <div id="order_items_price" style="display:none">{{$cart_price}}</div>
              </div>
              <div id="discounts-block"></div>
              <div style="display: none">
                <div class="co-basket_subtotal" id="discount-subtotal-sample">
                  <div class="co-basket_subtotal-title discount-subtotal-description"></div>
                  <div class="co-basket_subtotal-price co-price--current discount-subtotal-amount"></div>
                </div>
              </div>
              <div class="co-basket_subtotal">
                <div class="co-basket_subtotal-title">Стоимость доставки</div>
                <div class="co-basket_subtotal-price co-price--current" id="delivery_price">0&nbsp;руб</div>
                <div id="delivery_price_unformatted" style="display:none">0</div>
              </div>
              <div class="co-basket_subtotal" id="payment_way_block" style="display:none;">
                <div class="co-basket_subtotal-title">Способ оплаты</div>
                <div class="co-basket_subtotal-price co-price--current" id="payment_gateway_price">0&nbsp;руб</div>
              </div>
            </div>
            <div class="co-basket_total">
              <div class="co-basket_total-title">Итого:</div><div class="co-basket_total-price co-price--current" id="total_price">{{$cart_price}}&nbsp;руб</div>
            </div>
          </div>
        </div>
      </div>
      <div class="co-notice--danger co-notice--flash" id="checkout_order_errors" style="display: none"></div>
      <form id="order_form" class="co-checkout-order_form co-checkout-block--padded" data-onepage-checkout="true" data-checkout2="true" data-has-payment-rules="false" data-client-identifier="email" data-use-mask="1" action="/new_order" accept-charset="UTF-8" method="post">
        <input type="hidden" name="authenticity_token" value="HUHGMU6P62-BguVuQxwrmLyU2LW6nGZk73sSE_74GanNOATpVKOMogdvxWODS19BS5X9bBclYVBPjFrosPIYpA" autocomplete="off"><div class="co-delivery_method-list co-checkout-block">
        <div class="co-checkout-block">
          <div class="co-input co-input--required co-input--tel"><h2 class="co-input-label co-title co-title--h2">Контактный телефон</h2><input class="co-input-field js-input-field" type="tel" id="client_phone" name="client[phone]" value=""></div>
        </div>
        <h2 class="co-title co-title--h2">Доставка</h2><div class="co-checkout-block" data-address-autocomplete="https://kladr.insales.ru" id="delivery_address">
          <div class="co-input "><input id="shipping_address_country" type="hidden" value="RU">
          </div>
        </div>
        <div id="hidden-data" style="display: none">
          <input id="default_delivery_variant_id" type="hidden" name="order[delivery_variant_id]" value="">
        </div>
        <div class="variants delivery_variants co-input co-input--required co-input--radio co-tabs"  id="delivery_variants" style="z-index: inherit;"><div id="deliveries-not-available" style="display: none;">Для данного населенного пункта нет подходящих способов доставки</div>
        
        <input name="shipping_address[no_delivery]" type="hidden" value="0" autocomplete="off">
        <input style="display: none" type="checkbox" value="1" checked="checked" name="shipping_address[no_delivery]" id="shipping_address_no_delivery">
        <div class="co-tabs-content co-tabs-content--active">
          <label class="co-delivery_method co-input-wrapper co-toggable_field co-toggable_field--bordered co-delivery_method--for_individual co-delivery_method--for_juridical" for="order_delivery_variant_id_1390419">
            <span class="radio co-delivery_method-input co-toggable_field-input co-toggable_field-input--radio">
              <input checked="checked" class="radio_button js-input-field" data-delivery-id="1390419" id="order_delivery_variant_id_1390419" name="order[delivery_variant_id]" rel="#price_1390419" type="radio" value="1390419" style="cursor: pointer; opacity: 1;">
            <span>
              </span>
            </span>
            <span class="co-toggable_field-information co-delivery_method-information">
            <span class="co-delivery_method-title co-toggable_field-title co-input-title" id="delivery_title_1390419">Заберу сам в г.Новороссийск, Проспект Ленина д. 13</span>
            <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_description_1390419"></span>
            <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_outlet_1390419"></span><span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_interval_1390419"></span>
            <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_details_1390419"></span>
            <div id="delivery_error_1390419" style="color: red; display: block;"></div>
            <span>
              </span>
            </span>
            <span class="co-delivery_method-price co-toggable_field-price co-price--current" id="price_1390419" data-price="0">+ 0&nbsp;руб</span>
            <span class="co-delivery_method-price co-toggable_field-price co-price--current" id="price_range_1390419" style="display: none"></span>
          </label>
          <label class="co-delivery_method co-input-wrapper co-toggable_field co-toggable_field--bordered co-delivery_method--for_individual co-delivery_method--for_juridical" for="order_delivery_variant_id_1390420">
            <span class="radio co-delivery_method-input co-toggable_field-input co-toggable_field-input--radio">
            <input class="radio_button js-input-field" data-delivery-id="1390420" id="order_delivery_variant_id_1390420" name="order[delivery_variant_id]" rel="#price_1390420" type="radio" value="1390420" style="cursor: pointer; opacity: 1;"><span>
              </span>
            </span>
            <span class="co-toggable_field-information co-delivery_method-information">
              <span class="co-delivery_method-title co-toggable_field-title co-input-title" id="delivery_title_1390420">Мне нужна доставка по Новороссийску или Новороссийскому району</span>
              <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_description_1390420"><p></p>
              </span>
              <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_outlet_1390420"></span>
              <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_interval_1390420"></span>
              <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_details_1390420"></span>
              <div id="delivery_error_1390420" style="color: red; display: none"></div>
              <span></span>
            </span>
            <span class="co-delivery_method-price co-toggable_field-price co-price--current" id="price_1390420" data-price="0">+ 0&nbsp;руб</span>
            <span class="co-delivery_method-price co-toggable_field-price co-price--current" id="price_range_1390420" style="display: none"></span>
          </label>
          <label class="co-delivery_method co-input-wrapper co-toggable_field co-toggable_field--bordered co-delivery_method--for_individual co-delivery_method--for_juridical" for="order_delivery_variant_id_1390425">
            <span class="radio co-delivery_method-input co-toggable_field-input co-toggable_field-input--radio">
              <input class="radio_button js-input-field" data-delivery-id="1390425" id="order_delivery_variant_id_1390425" name="order[delivery_variant_id]" rel="#price_1390425" type="radio" value="1390425" style="cursor: pointer; opacity: 1;">
              <span>
                </span>
              </span>
              <span class="co-toggable_field-information co-delivery_method-information">
                <span class="co-delivery_method-title co-toggable_field-title co-input-title" id="delivery_title_1390425">Мне нужна доставка по России</span>
                <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_description_1390425">
            <p>Доставка осуществляется транспортной компанией СДЭК. Окончательная стоимость расчитывается транспортной компанией.</p>
          </span>
          <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_outlet_1390425"></span>
          <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_interval_1390425"></span>
          <span class="co-delivery_method-description co-toggable_field-description co-input-description" id="delivery_details_1390425"></span>
          <div id="delivery_error_1390425" style="color: red; display: none">
          </div>
          <span></span>
        </span>
        <span class="co-delivery_method-price co-toggable_field-price co-price--current" id="price_1390425" data-price="600">+ 600&nbsp;руб</span>
        <span class="co-delivery_method-price co-toggable_field-price co-price--current" id="price_range_1390425" style="display: none"></span>
      </label><div class="co-modal co-modal--outlet co-modal--fixed co-modal--hide">
        <div class="co-modal-wrapper">
          <div class="co-modal-header-container">
            <button class="co-modal-close js-modal-close co-icon co-modal-close-icon"></button>
            <div>
              <h3 class="co-modal-title co-title co-title--h2"></h3>
            </div>
            <button class="co-modal-select-point co-icon"></button>
          </div>
          <div class="co-form--outlet co-modal-outlet_form co-modal-body js-modal-body"></div>
        </div>
      </div>
      <div class="co-overlay"></div>
    </div>
  </div>
  <div class="co-delivery_adress " id="shipping_address" style="display: none">
    <div class="co-delivery_adress-form">
      <div class="co-input  co-input--textarea co-input--address  co-input--nested co-input--empty_nested">
        <label class="co-input-label" for="shipping_address_address">Адрес</label>
        <textarea class="co-input-field js-input-field" autocomplete="off" rows="2" id="shipping_address_address" name="shipping_address[address]" disabled=""></textarea>
        <div class="co-input-notice co-notice--danger">Поле не заполнено</div>
      </div>
    </div>
  </div>
      <div class="co-checkout-block">
        <div class="co-input co-input--textarea co-input--comment co-input--nested co-input--empty_nested">
          <label class="co-input-label" for="order_comment">
            <label for="order_comment">Комментарии к заказу</label>
          </label>
          <textarea rows="2" class="co-input-field js-input-field" autocomplete="off" name="order[comment]" id="order_comment"></textarea>
        </div>
      </div>
      <div class="co-checkout-block">
        <div class="co-input co-input--text co-input--nested co-input--empty_nested" id="delivery-date-calendar-block" style="display: none;">
          <label class="co-input-label" for="order_delivery_date" id="delivery-date-calendar-label">Дата доставки</label>
          <input class="co-input-field js-input-field" id="delivery-date-calendar" name="order[delivery_date]" readonly="true">
        </div>
        <div class="co-input co-input--select co-input--nested" id="delivery-time-intervals-block" style="display: none;">
          <label class="co-input-label" for="order_delivery_time_interval" id="delivery-time-intervals-label">Время доставки</label>
          <div class="co-input-select">
            <select class="co-input-field js-input-field" id="delivery-time-intervals-select" name="order[delivery_time_interval]"></select>
          </div>
        </div>
      </div>
      <div class="co-customer co-checkout-block co-tabs" data-tabs-organization="false" data-tabs-person="true" data-tabs-registration="false" id="customer-fields">
        <h3 class="co-title co-title--h2 co-tabs-header">Покупатель</h3>
        <div class="co-tabs-controls co-tabs-controls--customer" style="display: none">
          <button class="co-tabs-node co-tabs-node--active js-tabs-node--switch" data-target="#tabs-person" style="" type="button">Физическое лицо</button>
          <button class="co-tabs-node js-tabs-node--switch" data-target="#tabs-organization" style="" type="button">Организация</button>
        </div>
        <div class="co-tabs-content  co-tabs-content--active" id="tabs-person">
          <input id="client_human_type_individual" name="client[human_type]" type="hidden" value="individual">
          <div class="co-input co-input--required co-input--text co-input--name  co-input--nested co-input--empty_nested">
            <label class="co-input-label" for="client_name">Контактное лицо (ФИО)</label>
            <input class="co-input-field js-input-field" autocomplete="off" type="text" id="client_name" name="client[name]" value="">
            <div class="co-input-notice co-notice--danger">Поле не заполнено</div>
          </div>
          <div class="co-input  co-input--text co-input--email  co-input--nested co-input--empty_nested">
            <label class="co-input-label" for="client_email">Email</label>
            <input class="co-input-field js-input-field" autocomplete="off" type="text" id="client_email" name="client[email]" value="">
            <div class="co-input-notice co-notice--danger">Поле не заполнено</div>
          </div>
        </div>
        <div class="co-tabs-content " id="tabs-organization"></div>
        <input value="0" autocomplete="off" type="hidden" name="client[registered]" id="client_registered">
      </div>
      <div class="variants payment_variants co-payment_method-list co-checkout-block"  id="payment_gateways" style="position: relative; z-index: inherit;">
        <div class="co-input co-input--required co-input--radio">
          <h3 class="co-title co-title--h2 co-input-label">Способ оплаты</h3>
          <label class="co-payment_method  co-input-wrapper co-toggable_field co-toggable_field--bordered juridical individual" for="order_payment_gateway_id_458164">
            <span class="co-payment_method-input co-toggable_field-input  co-toggable_field-input--radio">
              <input checked="checked" class="radio_button js-input-field" data-payment-id="458164" data-payment-position="1" id="order_payment_gateway_id_458164" name="order[payment_gateway_id]" rel="#summ_458164" type="radio" value="458164" style="cursor: pointer; opacity: 1;"><span>
                </span>
              </span>
              <span class="co-payment_method-information co-toggable_field-information">
                <span class="co-payment_method-title co-toggable_field-title co-input-title">Наличными в магазине</span>
                <span class="co-payment_method-description co-toggable_field-description co-input-description" id="payment_description_458164">
                  </span>
                </span>
                <span class="co-toggable_field-price co-price--current" id="summ_458164" data-price="0" style="display: none;">0&nbsp;руб</span>
              </label>
              <label class="co-payment_method  co-input-wrapper co-toggable_field co-toggable_field--bordered juridical individual" for="order_payment_gateway_id_661054">
                <span class="co-payment_method-input co-toggable_field-input  co-toggable_field-input--radio">
                  <input class="radio_button js-input-field" data-payment-id="661054" data-payment-position="2" id="order_payment_gateway_id_661054" name="order[payment_gateway_id]" rel="#summ_661054" type="radio" value="661054" style="cursor: pointer; opacity: 1;">
                  <span></span>
                </span>
                <span class="co-payment_method-information co-toggable_field-information">
                  <span class="co-payment_method-title co-toggable_field-title co-input-title">Банковской картой, в рассрочку или кредит</span>
                  <span class="co-payment_method-description co-toggable_field-description co-input-description" id="payment_description_661054">
                    <p>Без комиссии</p>
                  </span>
                </span>
                <span class="co-toggable_field-price co-price--current" id="summ_661054" data-price="219224.6">+ 219224.60&nbsp;руб</span>
              </label>
              <div id="payments-not-available" style="display: none;">Для данного способа доставки нет подходящих способов оплаты</div>
            </div>
          </div>
          <div id="checkout_result_fields"></div>
          <div id="checkout_buyer_fields"></div>
        </div>
        <div class="co-checkout-block"></div>
        <div class="consent_to_personal_data_checkbox co-checkout-block"></div>
        <button class="co-button co-button--checkout js-button-checkout_submit" id="create_order" type="submit">Подтвердить заказ</button>
        <input type="hidden" name="order[viewed_product_ids]" value="[399427819,399428219,399427784,399427855]"></form><div id="picker-container"></div>

    </div>
  </div>
</div>

@endsection