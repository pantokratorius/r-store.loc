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



  </div>