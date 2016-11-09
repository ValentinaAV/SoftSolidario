<header class="main-header">
  <a href="{{ url('/login') }}" class="logo" style="position:fixed">
    <span class="logo-mini"><b>S</b>S</span>
    <span class="logo-lg"><b>Soft</b>Solidario</span>
  </a>

  <nav class="navbar navbar-fixed-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          @if(Auth::user())
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;{{Auth::user()->name}}&nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
          
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/logout') }}" style="color:black"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesion</a></li>
          </ul>
          @endif
        </li>
      </ul>
    </div>
  </nav>
</header>
