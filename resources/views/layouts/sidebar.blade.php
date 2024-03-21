<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="form-inline mr-auto"></div>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAADpUlEQVR4nO2cXYhVVRiGnzQZtHJUxAqmBOsmD+qAPwXSRQUSiTggKiRqCHoljkJ/Fwb+XEXmRQQylylpRTCEOpR6MUg30lUoGkYlIV0ERqEWhPnGhh1nlEnGmXP2etfZ3wMPzNXAer/97X322mstCIIgCIIgCIIgCEYyHVgKbAD2AgeAAeAT4Ej597vA60Af0ACm3PEfggnRDawBPgQuAhqHfwLDwD5gOfBA1OT+mAy8Ahwrw1SL/Rl4H3gmCnNvuoBtwA9tKIJG8TYwBLwUhbmT4hayBbhaUSE0imeA3igMLAK+TlgIjfAf4BDwSF27oh/426AQusufgBeoEbOBkwbB6x7eAt6gBswDvjcIXGP0o/LHRkfSSPzg1jj9CphKh7EA+M0gXI3TU51UlCfKlzFl7onypTX7qY/vDMJUi3yPzPncIES12FfJlO0G4akN/g7MJTOeAv4yCE9tcji3WePjBqGpzW4mE/oMwlIF/pLDvFfRxucNwlJF7sGcunSHSq8BD2PMOYOQVLE7MGWhQThK4CVMOWAQjhK5GDMml786VFMPYsYSg1CU0MuY8aZBKEpsD0YMGQSixG7EiF8NAlFibZ4jMwzCkIHFXcKC5wzCkMnyIQvWG4QhE1/GgK0GQcjEKw5zW7sMgpCRxYxFUnYbhCCzVY/Fi3Iy3jYIQWZ+m3LnVr9BADK0mL1IQjzUGbUgxe6vp1MUZJ3B1ShTT6dYnfKswcBlbOWrUx41GLTMv7vPqbIgRUv+YTBwGfsxFXPGYNAyd1WVBdlvMGCZ+2OV7yYvGgxYGbiyqoI8GB+pGEtBioMRKuOQwRUoc5+veh/hbYNBy9SzKV4STxkMXIZ+AcwiAcuiS/ivCMWGpcPl8SFJ+dTgilTiRXM7y8UfFjye+Z50TcBNrlvdXjMIRwksTquwpY6rGRsY82QNJx0bmLPNICRFQZoUD7gvDYJSdEiT4tSD6wZhKW5ZTd4xCEtRkCbTarLlrUFGvGUQmKIgTYqphBsGoSk6pMlRg9AUBWmy2iA0tdH5ZMZDpocnq0U+RoZ8YxCc2uDNXA/J/MAgPLXBQTKlU89iXEGmrDQIT234Zp4tDYMA1UIvOH2uHQ89HdYZ3WTOTIMgNcFfU4M5PzPupssgVI3iQHkQ2f/ZWy7gmEQHIkP3UGNSh68oSBTEmtTdoOiQKIg1qbtB0SFREGtSd4OiQ6Ig1qTuBkWHREGs+czQtalDCYIgCIIgCIIgwIB/AdhfyF8KItgSAAAAAElFTkSuQmCC">
      <div style="margin: 0 10px" class="d-sm-none d-lg-inline-block">Привет, {{Auth::user()->name}}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Logged in 5 min ago</div>
        <a href="{{route('profile.edit')}}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="#" onclick="event.preventDefault();
            this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </form>

      </div>
    </li>
  </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Backend</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item ">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        @role('Super Admin|admin')
        

          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Товары</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class=""><a class="nav-link" href="{{route('import')}}">Импорт</a></li>
            </ul>
        </li>
        @endrole
      

      
 
        {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}


      </ul>
  </aside>
</div>
