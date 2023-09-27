<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid p0">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="{{ $item->logo }}" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="{{ route('index') }}" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="{{ $item->logo }}" style="max-width: 85px;" alt="header-logo.png">
		        <img class="logo2 img-fluid" src="{{ $item->logo }}" style="max-width: 85px;" alt="header-logo2.png">
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                <li>
                    <a href="{{ route('index') }}"><span class="title">Home</span></a>
                   
                </li>
                <li>
                    <a href="{{ route('sobre') }}"><span class="title">Sobre nós</span></a>
                </li>
               
                <li>
                    <a href="{{ route('listar') }}"><span class="title">Automoveis</span></a>
                    <ul>
                        @foreach ($item->tipo_automovel as $item)
                        <li><a href="{{ route('listar', ['tipo' => $item->id ]) }}">{{ $item->tipo_automovel }}</a></li>
                        @endforeach
                        <li><a href="{{ route('listar') }}">Ver todos</a></li>
                       
                    </ul>
                </li>

                <li>
                    <a href="{{ route('blogs') }}"><span class="title">Blog</span></a>
                </li>
               
                <li class="last">
                    <a href="{{ route('contato') }}"><span class="title">Contato</span></a>
                </li>
                <li class="list-inline-item list_s"><a href="{{ route('favoritos') }}" class="btn flaticon-heart"> <span class="dn-lg">Ver favoritos</span></a></li>
            </ul>
        </nav>
    </div>
</header>

<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="d-flex justify-content-between">
                @isset($mobile->logo)
                <a class="nav_logo_img" href="{{ route('index') }}"><img class="img-fluid mt20" src="{{ $mobile->logo }}" alt="header-logo2.png"></a>

                @endisset
                <a class="mobile-menu-reg-link" href="#menu"><img src="{{ asset('assets/images/icons8-menu.svg') }}" alt=""></a>
            </div>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>

            <li><a href="{{ route('sobre') }}">Sobre nós</a></li>

            <li><span>Automoveis</span>
                <ul>
                    @if(is_array($mobile->tipo_automovel) || is_object($mobile->tipo_automovel))
                        @foreach ($mobile->tipo_automovel as $tipo)
                            <li><a href="{{ route('listar', ['tipo' => $tipo->id ]) }}">{{ $tipo->tipo_automovel }}</a></li>
                        @endforeach
                    @endif

                    <li><a href="{{ route('listar') }}">Ver todos</a></li>

                </ul>
            </li>
            <li><a href="{{ route('blogs') }}">Blog</a></li>

            <li><a href="{{ route('contato') }}">Contato</a></li>
            
            <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="{{ route('favoritos') }}"><span class="flaticon-heart"></span> Ver favoritos</a></li>
        </ul>
    </nav>
</div>
