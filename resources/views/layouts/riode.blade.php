<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Riode</title>

    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Riode - Ultimate eCommerce Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/public/riode/images/icons/favicon-1.png">



    <link rel="stylesheet" type="text/css" href="/public/riode/vendor/fontawesome-free/css/all.min-1.css">
    <link rel="stylesheet" type="text/css" href="/public/riode/vendor/animate/animate.min-1.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="/public/riode/vendor/magnific-popup/magnific-popup.min-1.css">
    <link rel="stylesheet" type="text/css" href="/public/riode/vendor/owl-carousel/owl.carousel.min-1.css">
    <link rel="stylesheet" type="text/css" href="/public/riode/vendor/nouislider/nouislider.min-1.css">
    {{--<link rel="stylesheet" href="/public/riode/bootstrap/bootstrap.min.css">--}}
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="/public/riode/css/demo4.min.css">
    <link rel="stylesheet" href="/public/riode/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/public/riode/css/my_style.css">
</head>

<body class="home">

<div class="page-wrapper">
    <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg">@lang('head_text.site_text')</p>
                </div>
                <div class="header-right">
                    <div class="dropdown">
                        <a href="#currency">USD</a>
                        <ul class="dropdown-box">
                            <li><a href="#USD">USD</a></li>
                            <li><a href="#EUR">EUR</a></li>
                        </ul>
                    </div>
                    <!-- End DropDown Menu -->
                    <div class="dropdown ml-4">
                        <a href="#language">ENG</a>
                        <ul class="dropdown-box">
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">ENG</a>
                            </li>
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}">RUS</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End DropDown Menu -->
                    <span class="divider d-lg-show"></span>
                    <a href="contact-us-1.html" class="contact d-lg-show mr-0"><i class="d-icon-map"></i>Contact
                        Us</a>
                    <span class="divider d-lg-show"></span>
                    <a href="" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a>
                </div>
            </div>
        </div>
        <!-- End HeaderTop -->
        <div class="header-middle sticky-header fix-top sticky-content">
            <div class="container">
                <div class="header-left">
                    <a href="#" class="mobile-menu-toggle mr-0">
                        <i class="d-icon-bars2"></i>
                    </a>
                    <a href="{{route('store.index')}}" class="logo d-lg-show">
                        <img src="/public/riode/images/demos/demo4/logo.png" alt="logo" width="154" height="43">
                    </a>
                    <!-- End Logo -->

                    <nav class="main-nav mr-4">
                        @include('riode.topmenu.main')

                    </nav>
                    <span class="divider d-xl-show mr-4"></span>
                    <div class="header-search hs-toggle d-xl-show">
                        <a href="#" class="search-toggle">
                            <i class="d-icon-search"></i>
                        </a>
                        <form action="#" class="input-wrapper">
                            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search..." required="">
                            <button class="btn btn-search" type="submit">
                                <i class="d-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- End of Header Search -->
                </div>
                <div class="header-center d-flex d-lg-none flex-1 justify-content-center">
                    <a href="{{route('store.index')}}" class="logo mr-0">
                        <img src="/public/riode/images/demos/demo4/logo.png" alt="logo" width="154" height="43">
                    </a>
                </div>
                <div class="header-right">
                    {{--@if(auth()->check())
                        <a style="margin-right: 30px">
                            {{auth()->user()->name}}
                        </a>
                        <a href="{{route('store.logout')}}" class="my_login_link">Logout</a>
                    @else
                        <a href="{{route('store.login_form')}}" class="my_login_link"><i class="d-icon-user"></i></a>
                    @endif--}}
                    @auth
                        <a style="margin-right: 30px">
                            {{auth()->user()->name}}
                        </a>
                        <a href="{{route('store.logout')}}" class="my_login_link">Logout</a>
                    @endauth
                    @guest
                        <a href="{{route('store.login')}}" class="my_login_link"><i class="d-icon-user"></i></a>
                    @endguest


                    <a href="wishlist-1.html" class="wishlist mr-4 d-lg-show">
                        <i class="d-icon-heart"><span id="wish_count" class="cart-count"></span></i>
                    </a>

                    <div class="dropdown cart-dropdown type2 mr-0 mr-lg-2">
                        <a href="#" class="cart-toggle link pro_count">
                            <i class="d-icon-bag"><span class="cart-count">{{Cart::count()}}</span></i>
                        </a>
                        <div class="dropdown-box m_box_ajax mm_ajax">
                            @include('riode.ajax._cart_modal')
                        </div>
                        <!-- End Dropdown Box -->
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- End of Header -->
    @yield('content')
    <!-- End of Main -->

    <footer class="footer appear-animate">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title">Get To Know Us</h4>
                                    <ul class="widget-body">
                                        <li><a href="#">About Riode</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Affiliate Program</a></li>
                                        <li><a href="#">Show Hosts</a></li>
                                        <li><a href="#">Riode Cares</a></li>
                                        <li><a href="#">Submit Your Product</a></li>
                                    </ul>
                                </div>
                                <!-- End of Widget -->
                            </div>
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title">Account</h4>
                                    <ul class="widget-body">
                                        <li><a href="account-1.html">My Account</a></li>
                                        <li><a href="#">Our Guarantees</a></li>
                                        <li><a href="#">Terms And Conditions</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Intellectual Property Claims</a></li>
                                        <li><a href="#">Site Map</a></li>
                                    </ul>
                                </div>
                                <!-- End of Widget -->
                            </div>
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title">Get Help</h4>
                                    <ul class="widget-body">
                                        <li><a href="#">Shipping &amp; Delivery</a></li>
                                        <li><a href="#">Order Status</a></li>
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Payment Options</a></li>
                                        <li><a href="contact-us-1.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <!-- End of Widget -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget">
                            <h4 class="widget-title">Newsletter</h4>
                            <div class="widget-body widget-newsletter">
                                <p>Sign up for newsletter today</p>
                                <form action="#" class="input-wrapper input-wrapper-inline">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address here..." required="">
                                    <button class="btn btn-primary btn-sm btn-rounded btn-icon-right" type="submit">subscribe<i class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="footer-info d-flex align-items-center justify-content-between">
                            <div class="social-links">
                                <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                            </div>
                            <figure class="payment">
                                <img src="/public/riode/images/demos/demo4/payment.png" alt="payment" width="135" height="24">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of FooterMiddle -->
        <div class="footer-bottom">
            <div class="container justify-content-center">
                <p class="copyright">Riode eCommerce &copy; 2021. All Rights Reserved</p>
            </div>
        </div>
        <!-- End of FooterBottom -->
    </footer>
    <!-- End of Footer -->
</div>

<!-- Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="{{route('store.index')}}" class="sticky-link active">
        <i class="d-icon-home"></i>
        <span>Home</span>
    </a>
    <a href="demo4-shop.html" class="sticky-link">
        <i class="d-icon-volume"></i>
        <span>Categories</span>
    </a>
    <a href="wishlist-1.html" class="sticky-link">
        <i class="d-icon-heart"></i>
        <span>Wishlist</span>
    </a>
    <a href="account-1.html" class="sticky-link">
        <i class="d-icon-user"></i>
        <span>Account</span>
    </a>
    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="d-icon-search"></i>
            <span>Search</span>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search your keyword..." required="">
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
    </div>
</div>

<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search your keyword..." required="">
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="{{route('store.index')}}">Home</a>
            </li>
            <li>
                <a href="demo4-shop.html">Categories</a>
                <ul>
                    <li>
                        <a href="#">
                            Variations 1
                        </a>
                        <ul>
                            <li><a href="shop-banner-sidebar-1.html">Banner With Sidebar</a></li>
                            <li><a href="shop-boxed-banner-1.html">Boxed Banner</a></li>
                            <li><a href="shop-infinite-scroll-1.html">Infinite Ajaxscroll</a></li>
                            <li><a href="shop-horizontal-filter-1.html">Horizontal Filter</a></li>
                            <li><a href="shop-navigation-filter-1.html">Navigation Filter<span class="tip tip-hot">Hot</span></a></li>

                            <li><a href="shop-off-canvas-1.html">Off-Canvas Filter</a></li>
                            <li><a href="shop-right-sidebar-1.html">Right Toggle Sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            Variations 2
                        </a>
                        <ul>

                            <li><a href="shop-grid-3cols-1.html">3 Columns Mode<span class="tip tip-new">New</span></a></li>
                            <li><a href="shop-grid-4cols-1.html">4 Columns Mode</a></li>
                            <li><a href="shop-grid-5cols-1.html">5 Columns Mode</a></li>
                            <li><a href="shop-grid-6cols-1.html">6 Columns Mode</a></li>
                            <li><a href="shop-grid-7cols-1.html">7 Columns Mode</a></li>
                            <li><a href="shop-grid-8cols-1.html">8 Columns Mode</a></li>
                            <li><a href="shop-list-1.html">List Mode</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="demo4-product.html">Products</a>
                <ul>
                    <li>
                        <a href="#">Product Pages</a>
                        <ul>
                            <li><a href="product-simple-1.html">Simple Product</a></li>
                            <li><a href="product-1.html">Variable Product</a></li>
                            <li><a href="product-sale-1.html">Sale Product</a></li>
                            <li><a href="product-featured-1.html">Featured &amp; On Sale</a></li>

                            <li><a href="product-left-sidebar-1.html">With Left Sidebar</a></li>
                            <li><a href="product-right-sidebar-1.html">With Right Sidebar</a></li>
                            <li><a href="product-sticky-cart-1.html">Add Cart Sticky<span class="tip tip-hot">Hot</span></a></li>
                            <li><a href="product-tabinside-1.html">Tab Inside</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Product Layouts</a>
                        <ul>
                            <li><a href="product-grid-1.html">Grid Images<span class="tip tip-new">New</span></a></li>
                            <li><a href="product-masonry-1.html">Masonry</a></li>
                            <li><a href="product-gallery-1.html">Gallery Type</a></li>
                            <li><a href="product-full-1.html">Full Width Layout</a></li>
                            <li><a href="product-sticky-1.html">Sticky Info</a></li>
                            <li><a href="product-sticky-both-1.html">Left &amp; Right Sticky</a></li>
                            <li><a href="product-horizontal-1.html">Horizontal Thumb</a></li>

                            <li><a href="#">Build Your Own</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Pages</a>
                <ul>
                    <li><a href="about-us-1.html">About</a></li>
                    <li><a href="contact-us-1.html">Contact Us</a></li>
                    <li><a href="account-1.html">Login</a></li>
                    <li><a href="faq-1.html">FAQs</a></li>
                    <li><a href="error-404-1.html">Error 404</a></li>
                    <li><a href="coming-soon-1.html">Coming Soon</a></li>
                </ul>
            </li>
            <li>
                <a href="blog-classic-1.html">Blog</a>
                <ul>
                    <li><a href="blog-classic-1.html">Classic</a></li>
                    <li><a href="blog-listing-1.html">Listing</a></li>
                    <li>
                        <a href="#">Grid</a>
                        <ul>
                            <li><a href="blog-grid-2col-1.html">Grid 2 columns</a></li>
                            <li><a href="blog-grid-3col-1.html">Grid 3 columns</a></li>
                            <li><a href="blog-grid-4col-1.html">Grid 4 columns</a></li>
                            <li><a href="blog-grid-sidebar-1.html">Grid sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Masonry</a>
                        <ul>
                            <li><a href="blog-masonry-2col-1.html">Masonry 2 columns</a></li>
                            <li><a href="blog-masonry-3col-1.html">Masonry 3 columns</a></li>
                            <li><a href="blog-masonry-4col-1.html">Masonry 4 columns</a></li>
                            <li><a href="blog-masonry-sidebar-1.html">Masonry sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Mask</a>
                        <ul>
                            <li><a href="blog-mask-grid-1.html">Blog mask grid</a></li>
                            <li><a href="blog-mask-masonry-1.html">Blog mask masonry</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="post-single-1.html">Single Post</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Elements</a>
                <ul>
                    <li><a href="element-products-1.html">Products</a></li>
                    <li><a href="element-typography-1.html">Typography</a></li>
                    <li><a href="element-titles-1.html">Titles</a></li>
                    <li><a href="element-categories-1.html">Product Category</a></li>
                    <li><a href="element-buttons-1.html">Buttons</a></li>
                    <li><a href="element-accordions-1.html">Accordions</a></li>
                    <li><a href="element-alerts-1.html">Alert &amp; Notification</a></li>
                    <li><a href="element-tabs-1.html">Tabs</a></li>
                    <li><a href="element-testimonials-1.html">Testimonials</a></li>
                    <li><a href="element-blog-posts-1.html">Blog Posts</a></li>
                    <li><a href="element-instagrams-1.html">Instagrams</a></li>
                    <li><a href="element-cta-1.html">Call to Action</a></li>
                    <li><a href="element-icon-boxes-1.html">Icon Boxes</a></li>
                    <li><a href="element-icons-1.html">Icons</a></li>
                </ul>
            </li>
            <li><a href="../../item/donald-ultimate-ecommerce-html-template/29603750-1.html" target="_blank">Buy Riode!</a></li>
        </ul>
        <!-- End of MobileMenu -->
    </div>
</div>

{{--<div class="login_modal">
    --}}{{--<div class="alert_div">
        <div class="alert alert-danger alert-summary alert-light alert-message alert-inline">
            <i class="fas fa-exclamation-triangle"></i>
            <h4 class="alert-title">Error!</h4>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <button type="button" class="btn btn-link btn-close">
                <i class="d-icon-times"></i>
            </button>
        </div>
    </div>--}}{{--
    <div class="flex_con">
        @include('riode.login')
    </div>
</div>

<div class="spinner_div">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>--}}


<!-- Plugins JS File -->
<script src="/public/riode/vendor/jquery/jquery.min-1.js"></script>
<script src="/public/riode/vendor/elevatezoom/jquery.elevatezoom.min-1.js"></script>
<script src="/public/riode/vendor/magnific-popup/jquery.magnific-popup.min-1.js"></script>

<script src="/public/riode/vendor/owl-carousel/owl.carousel.min-1.js"></script>
<script src="/public/riode/vendor/imagesloaded/imagesloaded.pkgd.min-1.js"></script>
<script src="/public/riode/vendor/isotope/isotope.pkgd.min-1.js"></script>
<script src="/public/riode/vendor/nouislider/nouislider.min-1.js"></script>
{{--<script src="/public/riode/bootstrap/bootstrap.min.js"></script>--}}
<!-- Main JS File -->
<script src="/public/riode/js/main.min-1.js"></script>
<script src="/public/riode/js/jquery-ui.min.js"></script>
<script src="/public/riode/js/my_script.js"></script>
</body>

</html>
