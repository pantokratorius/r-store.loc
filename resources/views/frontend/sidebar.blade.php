<div class="cell-12 cell-12-md hidden-sm flex-first" style="position: relative">
    <div class="sidebar-block">
      <div class="sidebar-block-heading mega-menu-main_heading">
        {{-- Каталог --}}
      </div>

      <div class="sidebar-block-content">

        <ul class="sidebar-menu menu level-1 is-collapse insales-menu--loaded"
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
            <li class="search"><input type="text" class="search_input" /><div class="fa fa-search fa-lg"></div></li>
            @endisset
          </ul>
        </div>
        
      </div>
      
      @include('frontend.components.search_input')

  </div>



 