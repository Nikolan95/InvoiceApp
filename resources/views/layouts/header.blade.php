<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
    <div class="navbar-header pull-left">
        <a class="navbar-brand" href="{{ url('/home') }}">Krooya</a>
    </div>
    <ul class="nav navbar-nav pull-right toolbar">            
        <li class="dropdown">               
        <a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span><img src="/img/admin.jpg"></a>
            <ul class="dropdown-menu userinfo arrow">
                <li class="username">
                <a href="#">
                <div class="pull-left"><img src="/css/download.jpg" alt="{{ Auth::user()->name }}"/></div>
                <div class="pull-right"><h5>Dobrodošao, {{ Auth::user()->name }}</h5><small>Ulogovan kao <span>{{ Auth::user()->name }}</span></small></div>
                </a>
                </li>
                <li class="userlinks">
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/account') }}">Profil <i class="pull-right fa fa-cog"></i></a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('izloguj se') }}
                        <i class="pull-right glyphicon glyphicon-log-out"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</header>