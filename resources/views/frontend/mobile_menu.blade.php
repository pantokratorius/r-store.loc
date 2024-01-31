<div class="mobile_menu alertify  ajs-closable ajs-pulse ajs-panel-placeholder"><div class="ajs-dimmer"></div><div class="ajs-modal" tabindex="0"><div class="ajs-panel at-left-position" tabindex="0"><button class="ajs-reset"></button><div class="ajs-commands"><button class="ajs-pin"></button><button class="ajs-maximize"></button><button class="ajs-close"></button></div><div class="ajs-header" style="display: none;"></div><div class="ajs-body"><div class="ajs-content"><div class="sidebar">

  <div class="sidebar-block">
    <div class="sidebar-block-heading">
      Каталог товаров
    </div>

    <div class="sidebar-block-content">
      

    <ul class="mobile-sidebar-menu menu level-1 is-vertical is-collapse insales-menu--loaded" data-menu-id="mobile-sidebar-menu">
        @isset($cats)
            @foreach($cats as $k=>$v)
        <li class="mobile-sidebar-menu-item menu-item level-1 has-submenu">
            <div class="mobile-sidebar-menu-item-controls menu-item-controls level-1">
              <a href="{{route('category', str_replace('/', '-', $k) ) }}" class="mobile-sidebar-menu-link menu-link level-1" data-menu-link="airpods" data-menu-link-source="collection">
                {{ $v }}
              </a>
                <button class="mobile-sidebar-menu-marker menu-marker level-1" type="button"></button>
            </div>
        </li>
        @endforeach
    @endisset
</ul>
    </div>
  </div>

  <div class="sidebar-block">
    <div class="sidebar-block-heading">
      Верхнее меню
    </div>

    <div class="sidebar-block-content">
  <ul class="mobile-sidebar-menu menu level-1 is-vertical is-collapse insales-menu--loaded" data-menu-id="mobile-sidebar-menu">
      <li class="mobile-sidebar-menu-item menu-item level-1">
        <div class="mobile-sidebar-menu-item-controls menu-item-controls level-1">
          

          <a href="/page/oplata" class="mobile-sidebar-menu-link menu-link level-1" data-menu-link-source="menu" data-menu-link-current="no">
            Оплата
          </a>
        </div>
      </li>
      <li class="mobile-sidebar-menu-item menu-item level-1">
        <div class="mobile-sidebar-menu-item-controls menu-item-controls level-1">
          

          <a href="/page/kontakty" class="mobile-sidebar-menu-link menu-link level-1" data-menu-link-source="menu" data-menu-link-current="no">
            Контакты
          </a>
        </div>
      </li>
    
  </ul>
    </div>
    <div class="sidebar-block-content" style="display: none;">
        <a class="mobile-sidebar-menu-link menu-link" href="/client_account/login">
          
            <span>Вход / Регистрация</span>
          
        </a>
    </div>
  </div>
</div></div></div>
<div class="ajs-footer" style="display: none;">
    <div class="ajs-auxiliary ajs-buttons">
        </div>
        <div class="ajs-primary ajs-buttons">
    </div>
</div>
        <div class="ajs-handle">
            </div>
            <button class="ajs-reset">
                </button>
            </div>
        </div>
    </div>