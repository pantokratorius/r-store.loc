<div class="cell-12 cell-12-md hidden-sm flex-first" style="position: relative; display: flex; justify-content: center">
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
                      @isset($active) @if($active == $k)  active  @endif  @endisset " >
                              {{ $v }}
                      </a>
                    </div>
                  </li>

            @endforeach
            <li class="search">
              <div class="search_input_wrap">
                <input type="text" class="search_input" />
              <div class="fa fa-search fa-lg"></div>
            </div>
          </li>

            @endisset
          </ul>
        </div>

      </div>

      @include('frontend.components.search_input')

  </div>

  @push('styles')
    <style>
       .search_input_wrap {
          width: 30%;
          display: flex;
          align-items: center;
          /* border: 1px solid #fff; */
          border-radius: 15px;
          /* padding: 0 20px; */
       }

       .search_input_wrap_shown {
          padding: 0 20px;
          border: 1px solid #ddd;
       }

    </style>
  @endpush



