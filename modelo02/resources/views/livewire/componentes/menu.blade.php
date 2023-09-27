<div>
<!-- Main Header Nav -->
<header class="header-nav menu_style_home_one style2 style3 navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid p0">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="images/header-logo.png" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="/" wire:navigate class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="{{ $site->logo }}" alt="header-logo.png">
                <img class="logo2 img-fluid" src="{{ $site->logo }}" alt="header-logo2.png">
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <div class="ht_left_widget float-left">
               
            </div>
            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                <li>
                    <a href="/" ><span class="title">Home</span></a>
                    
                </li>
                <li>
                    <a href="/sobre"><span class="title">Sobre nós</span></a>
                    
                </li>
                <li>
                    <a href="#"><span class="title">Automoveis</span></a>
                    <ul>
                        @foreach ($site->tipo_automovel as $item)
                        <li><a href="{{ route('listar', ['tipo' => $item->id ]) }}" >{{ $item->tipo_automovel }}</a></li>
                        @endforeach
                        <li><a href="{{ route('listar') }}">Ver todos</a></li>
                       
                    </ul>
                </li>
                <li class="last">
                    <a href="/contato"  ><span class="title">Contato</span></a>
                </li>
                <li class="list-inline-item list_s">
                    <a href="" class="btn flaticon-heart"> 
                        <span class="dn-lg">Ver favoritos</span>
                    </a>
                </li>            
            </ul>
        </nav>
    </div>
</header>


<!-- Main Header Nav For Mobile -->
<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="main_logo_home2 text-center">
      <a href="index.html"><img class="nav_logo_img img-fluid mt20" src="images/header-logo2.png" alt="header-logo2.png"></a>
            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item list_s"><a href="page-register.html"><span class="flaticon-user"></span></a></li>
                <li class="list-inline-item">
                    <div class="search_overlay">
                          <div id="search-button-listener2" class="mk-search-trigger style2 mk-fullscreen-trigger">
                               <div id="search-button2"><i class="flaticon-magnifying-glass"></i></div>
                          </div>
                        <div class="mk-fullscreen-search-overlay" id="mk-search-overlay2">
                            <button class="mk-fullscreen-close" id="mk-fullscreen-close-button2"><i class="fa fa-times"></i></button>
                            <div id="mk-fullscreen-search-wrapper2">
                                  <form method="get" id="mk-fullscreen-searchform2">
                                    <input type="text" value="" placeholder="Search courses..." id="mk-fullscreen-search-input2">
                                    <i class="flaticon-magnifying-glass fullscreen-search-icon"><input value="" type="submit"></i>
                                  </form>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-inline-item"><a class="mobile-menu-trigger" href="#menu"><img src="images/dark-nav-icon.svg" alt=""></a></a></li>
            </ul>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li><span>Home</span>
                <ul>
                    <li><a href="index.html">Home 1</a></li>
                    <li><a href="index2.html">Home 2</a></li>
                    <li><a href="index3.html">Home 3</a></li>
                    <li><a href="index4.html">Home 4</a></li>
                    <li><a href="index5.html">Home 5</a></li>
                    <li><a href="index6.html">Home 6</a></li>
                    <li><a href="index7.html">Home 7</a></li>
                    <li><a href="index8.html">Home 8</a></li>
                    <li><a href="index9.html">Home 9</a></li>
                    <li><a href="index10.html">Home 10</a></li>
                </ul>
            </li>
            <li><span>Listing</span>
                <ul>
                    <li><span>Listing Grid</span>
                        <ul>
                            <li><a href="page-listing-grid-v1.html">Grid v1</a></li>
                            <li><a href="page-listing-grid-v2.html">Grid v2</a></li>
                            <li><a href="page-listing-grid-v3.html">Grid v3</a></li>
                            <li><a href="page-listing-grid-v4.html">Grid v4</a></li>
                            <li><a href="page-listing-grid-v5.html">Grid v5</a></li>
                            <li><a href="page-listing-full-width-grid.html">Grid Fullwidth</a></li>
                        </ul>
                    </li>
                    <li><span>Listing Style</span>
                        <ul>
                            <li><a href="page-listing-parallax.html">Parallax Style</a></li>
                            <li><a href="page-listing-slider.html">Slider Style</a></li>
                            <li><a href="page-listing-map.html">Map Header</a></li>
                        </ul>
                    </li>
                    <li><span>Listing Half</span>
                        <ul>
                            <li><a href="page-listing-half-map-v1.html">Map V1</a></li>
                            <li><a href="page-listing-half-map-v2.html">Map V2</a></li>
                            <li><a href="page-listing-half-map-v3.html">Map V3</a></li>
                            <li><a href="page-listing-half-map-v4.html">Map V4</a></li>
                        </ul>
                    </li>
                    <li><span>Agent View</span>
                        <ul>
                            <li><a href="page-listing-agent-v1.html">Agent V1</a></li>
                            <li><a href="page-listing-agent-v2.html">Agent V2</a></li>
                            <li><a href="page-listing-agent-v3.html">Agent Details</a></li>
                        </ul>
                    </li>
                    <li><span>Agencies View</span>
                        <ul>
                            <li><a href="page-agencies-list-v1.html">Agencies V1</a></li>
                            <li><a href="page-agencies-list-v2.html">Agencies V2</a></li>
                            <li><a href="page-agencies-list-v3.html">Agencies Details</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><span>Property</span>
                <ul>
                    <li><span>Property</span>
                        <ul>
                            <li><a href="page-dashboard.html">Dashboard</a></li>
                            <li><a href="page-my-properties.html">My Properties</a></li>
                            <li><a href="page-add-new-property.html">Add New Property</a></li>
                        </ul>
                    </li>
                    <li><span>Listing Single</span>
                        <ul>
                            <li><a href="page-listing-single-v1.html">Single V1</a></li>
                            <li><a href="page-listing-single-v2.html">Single V2</a></li>
                            <li><a href="page-listing-single-v3.html">Single V3</a></li>
                            <li><a href="page-listing-single-v4.html">Single V4</a></li>
                            <li><a href="page-listing-single-v5.html">Single V5</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><span>Blog</span>
                <ul>
                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
                    <li><a href="page-blog-single.html">Single Post</a></li>
                </ul>
            </li>
            <li><span>Pages</span>
                <ul>
                    <li><span>Shop</span>
                        <ul>
                            <li><a href="page-shop.html">Shop</a></li>
                            <li><a href="page-shop-single.html">Shop Single</a></li>
                            <li><a href="page-shop-cart.html">Cart</a></li>
                            <li><a href="page-shop-checkout.html">Checkout</a></li>
                            <li><a href="page-shop-order.html">Order</a></li>
                        </ul>
                    </li>
                    <li><a href="page-about.html">About Us</a></li>
                    <li><a href="page-gallery.html">Gallery</a></li>
                    <li><a href="page-faq.html">Faq</a></li>
                    <li><a href="page-login.html">LogIn</a></li>
                    <li><a href="page-compare.html">Membership</a></li>
                    <li><a href="page-compare2.html">Membership 2</a></li>
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-service.html">Service</a></li>
                    <li><a href="page-error.html">404 Page</a></li>
                    <li><a href="page-terms.html">Terms and Conditions</a></li>
                    <li><a href="page-ui-element.html">UI Elements</a></li>
                </ul>
            </li>
            <li><a href="page-contact.html">Contact</a></li>
            <li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
            <li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li>
            <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li>
        </ul>
    </nav>
</div>
</div>
