<div class="cell-3 cell-4-md hidden-sm flex-first">



    <div class="sidebar-block">
      <div class="sidebar-block-heading mega-menu-main_heading">
        Каталог
      </div>

      <div class="sidebar-block-content">

        <ul class="sidebar-menu menu level-1 is-vertical is-collapse insales-menu--loaded"
          data-menu-id="sidebar-menu">
@isset($cats)
            @foreach($cats as $k=>$v)

                  <li class="sidebar-menu-item menu-item level-1 has-submenu">
                    <div class="sidebar-menu-item-controls menu-item-controls level-1">

                      <a href="{{route('category', str_replace('/', '-', $k) ) }}" class="sidebar-menu-link menu-link level-1
                      @isset($active) @if($active == $k)  active  @endif  @endisset " data-menu-link="airpods"
                        data-menu-link-source="collection">
                              {{ $v }}
                      </a>

                    </div>
                  </li>

            @endforeach
@endisset
        </ul>
      </div>

    </div>


    <div class="sidebar-block">
      <form class="filter sidebar-filter " action="/collection/iphone" method="get" data-filter="sidebar-filter">

        <div class="filter-heading">
          Фильтры
        </div>
        <div class="filter-section is-collapse" data-filter-section="false">

          <div class="filter-section-control">
            <button class="filter-section-toggle is-filter-section-toggle button is-active-toggle" type="button"
              data-filter-section-toggle="">
              <span class="filter-section-name">
                Цена
              </span>
              <sup class="filter-section-count"></sup>
              <span class="sidebar-menu-marker filter-marker menu-marker level-1">
              </span>
            </button>

            <button class="filter-section-clear button is-filter-section-clear is-disabled" type="button"
              data-filter-section-clear="" disabled=""></button>
          </div>

          <div class="filter-items-wrapper is-collapsable is-closed" data-filter-section-items="">
            <div class="filter-items">
              <div class="filter-item is-range-slider" data-filter-section-item="">
                <div data-min="38990" data-max="175990" data-from="" data-to="" data-range-slider="price">
                  <div data-range-slider-place="" class="noUi-target noUi-ltr noUi-horizontal">
                    <div class="noUi-base">
                      <div class="noUi-origin" style="left: 0%;">
                        <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider"
                          aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0"
                          aria-valuenow="0.0" aria-valuetext="38990" style="z-index: 5;">
                          <div class="noUi-tooltip">38990</div>
                        </div>
                      </div>
                      <div class="noUi-origin" style="left: 100%;">
                        <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider"
                          aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0"
                          aria-valuenow="100.0" aria-valuetext="175990" style="z-index: 4;">
                          <div class="noUi-tooltip">175990</div>
                        </div>
                      </div>
                    </div>
                    <div class="noUi-pips noUi-pips-horizontal">
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 0%;"></div>
                      <div class="noUi-value noUi-value-horizontal noUi-value-large" style="left: 0%;">38990</div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 4%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 8%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 12%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 16%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 20%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 24%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 28%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 32%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 36%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 40%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 44%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 48%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 52%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 56%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 60%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 64%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 68%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 72%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 76%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 80%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 84%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 88%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 92%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 96%;"></div>
                      <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 100%;"></div>
                      <div class="noUi-value noUi-value-horizontal noUi-value-large" style="left: 100%;">175990
                      </div>
                    </div>
                  </div> <input type="hidden" name="price_min" value="38990" data-range-slider-input="from"
                    disabled=""> <input type="hidden" name="price_max" value="175990" data-range-slider-input="to"
                    disabled="">
                </div>
              </div>
            </div>

            <div class="filter-section-toolbar">
              <button type="button" class="filter-section-submit button is-filter-section-submit is-disabled"
                data-filter-submit="" disabled="">
                Применить
              </button>
            </div>
          </div>

        </div>


        <div class="filter-section is-collapse" data-filter-section="false">

          <div class="filter-section-control">
            <button class="filter-section-toggle is-filter-section-toggle button is-active-toggle" type="button"
              data-filter-section-toggle="">
              <span class="filter-section-name">Объем памяти</span>
              <sup class="filter-section-count"></sup>
              <span class="sidebar-menu-marker filter-marker menu-marker level-1">
              </span>
            </button>

            <button class="filter-section-clear button is-filter-section-clear is-disabled" type="button"
              data-filter-section-clear="" disabled=""></button>
          </div>

          <div class="filter-items-wrapper is-collapsable is-closed" data-filter-section-items="">


            <ul class="filter-items-list">



              <li class="filter-item" data-filter-section-item="">
                <label class="filter-field">
                  <input class="filter-field-input" type="checkbox" value="47627395" name="characteristics[]">

                  <span class="filter-field-marker"></span>
                  <span class="filter-field-caption">64 Гб</span>
                </label>
              </li>



              <li class="filter-item" data-filter-section-item="">
                <label class="filter-field">
                  <input class="filter-field-input" type="checkbox" value="47627412" name="characteristics[]">

                  <span class="filter-field-marker"></span>
                  <span class="filter-field-caption">128 Гб</span>
                </label>
              </li>

            </ul>



            <div class="filter-section-toolbar">
              <button type="button" class="filter-section-submit button is-filter-section-submit is-disabled"
                data-filter-submit="" disabled="">
                Применить
              </button>
            </div>

          </div>

        </div>

        <div class="filter-controls">

          <button type="submit" class="filter-submit button is-primary is-filter-submit" data-filter-submit="">
            Применить
          </button>


          <a href="/collection/iphone" class="filter-clear button is-secondary is-sfilter-clear is-disabled"
            data-filter-clear="">
            Сбросить
          </a>
        </div>

      </form>

    </div>

  </div>