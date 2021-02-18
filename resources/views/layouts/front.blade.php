<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="GeniusOcean">
        <title>{{$gs->title}}</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/slicknav.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}">
        <link href="{{ asset('assets/front/select2/select2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/slick.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/slick-theme.css') }}"/>
        <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/front/select2/select2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/front/js/slick.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/front/js/slick.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.6/dist/sweetalert2.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css">


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>


        @include('styles.design')
        @yield('styles')
    <style type="text/css">
        .profile-contact-info {
            margin-top: 15px;
        }
        .ut {
            font-size: 20px;
        }
    </style>
    @if(Auth::guard('user')->check())
<style type="text/css">
@media only screen and (min-width: 767px) {
    .mid-break-9 {
        width: 85%;
    }
    .mid-break-3 {
        width: 15%;
    }

    }
@media only screen and (min-width: 991px) and (max-width: 1199px) {
    .mid-break-9 {
        width: 87%;
    }
    .mid-break-3 {
        width: 13%;
    }

    }
.mainmenu li ul {
    width: 150px;
}
</style>
    @endif

    <!-- Global site tag (gtag.js) - Google Analytics -->
        {{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165295462-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-165295462-1');
        </script>--}}

        @if($lang->lang == 'eng')

            <script src="https://www.google.com/recaptcha/api.js?hl=eng" async defer></script>

        @else

            <script src="https://www.google.com/recaptcha/api.js?hl=nl" async defer></script>

        @endif

    </head>
    <body>
    <div id="cover"></div>

        <!-- Starting of Header area -->
        {{--<div class="header-top-area">
            <div class="container" style="width: 80%;">

                <div class="row" style="display: flex;">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-column-left">
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i> {{$gs->email}}
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i> {{$gs->phone}}
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6">
                        <div class="top-column-right">
                            <ul class="top-social-links">
                                <li class="top-social-links-li">
                                    @if($sl->f_status == 1)
                                    <a href="{{$sl->facebook}}"><i class="fa fa-facebook"></i></a>
                                    @endif
                                    @if($sl->t_status == 1)
                                    <a href="{{$sl->twitter}}"><i class="fa fa-twitter"></i></a>
                                    @endif
                                    @if($sl->l_status == 1)
                                    <a href="{{$sl->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                    @endif
                                    @if($sl->g_status == 1)
                                    <a href="{{$sl->gplus}}"><i class="fa fa-google"></i></a>
                                    @endif
                                </li>
                         @if(Auth::guard('user')->check())
                         @else
                                <li><a href="{{route('user-login')}}">{{$lang->signin}}</a></li>
                                <li><a href="{{route('user-register')}}">{{$lang->signup}}</a></li>
                                <li><a href="{{route('handyman-register')}}">{{$lang->signup_handyman}}</a></li>
                        @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}


        <div class="header-area-wrapper">
            <div class="container" style="width: 90%;">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 mid-break-4" id="logo-div">
                        <div class="logo" style="margin-bottom: 20px;">
                            <a href="{{route('front.index')}}">
                                <img src="{{asset('assets/images/'.$gs->logo)}}" alt="" style="height: 75px;padding-top: 15px;">
                            </a>
                        </div>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8 mid-break-8" style="margin-top: 20px;">
                        <div class="mainmenu">

                            <ul id="menuResponsive">

                                @if(Auth::guard('user')->check())
                                @else
                                    <li class="border-line"><a href="{{route('user-login')}}">{{$lang->signin}}</a></li>
                                    <li class="border-line"><a href="{{route('user-register')}}">{{$lang->signup}}</a></li>
                                    <li class="border-line"><a href="{{route('handyman-register')}}">{{$lang->signup_handyman}}</a></li>
                                @endif


                                @if(Auth::guard('user')->check())

                                    @if(Auth::guard('user')->user()->role_id == 2)

                                        <li class="menuLi border-line"><a  style="cursor: pointer;">PROFILE <i class="fa fa-angle-down"></i></a>
                                            <ul class="menuUl">


                                                <li><a href="{{route('user-dashboard')}}">{{$lang->hpt}}</a></li>

                                                <li><a href="{{route('user-logout')}}">{{$lang->logout}}</a></li>
                                            </ul>
                                        </li>

                                    @elseif(Auth::guard('user')->user()->role_id == 3)

                                        <li class="menuLi border-line"><a  style="cursor: pointer;">PROFILE <i class="fa fa-angle-down"></i></a>
                                            <ul class="menuUl">

                                                <li><a href="{{route('client-dashboard')}}">{{$lang->cpt}}</a></li>

                                                <li><a href="{{route('user-logout')}}">{{$lang->logout}}</a></li>

                                            </ul>
                                        </li>

                                    @endif

                                @endif

                                    <li class="menuLi1 border-line"><a style="cursor: pointer;">Menu <i class="fa fa-angle-down"></i></a>
                                        <ul class="menuUl1" style="left: -100px;">
                                            <li><a href="{{route('front.index')}}">{{$lang->home}}</a></li>

                                            <li><a href="{{route('front.users')}}">{{$lang->h}}</a></li>

                                            @if($ps->a_status == 1)
                                                <li><a href="{{route('front.about')}}">{{$lang->about}}</a></li>
                                            @endif

                                            @if($ps->f_status == 1)
                                                <li><a href="{{route('front.faq')}}">{{$lang->faq}}</a></li>
                                            @endif

                                            @if($ps->c_status == 1)
                                                <li><a href="{{route('front.contact')}}">{{$lang->contact}}</a></li>
                                            @endif


                                            <li style="width: 15%;" class="lang-list">

                                                <form method="post" action="{{route('lang.change')}}" id="lang-form" class="lang-form">

                                                    {{csrf_field()}}

                                                    <input type="hidden" class="lang_select" value="{{$lang->lang}}" name="lang_select">

                                                    <div class="btn-group bootstrap-select fit-width">

                                                        @if($lang->lang == 'eng')

                                                            <button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" title="English">

                                                                <span class="filter-option pull-left"><span class="flag-icon flag-icon-nl"></span> English</span>&nbsp;<span class="caret"></span></button>

                                                            <div class="dropdown-menu open">

                                                                <ul class="dropdown-menu inner selectpicker" role="menu">

                                                                    <li rel="0" class="selected"><a href="#" tabindex="0" class="" style="color: black !important;" onclick="formSubmit(this)" data-value="eng"><span class="flag-icon flag-icon-us"></span> English<i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>

                                                                    <li rel="1" ><a href="#" tabindex="0" class="" style="color: black !important;" onclick="formSubmit(this)" data-value="du"><span class="flag-icon flag-icon-nl"></span> Nederlands<i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                                </ul>

                                                            </div>


                                                        @elseif($lang->lang == 'du')

                                                            <button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" title="Nederlands">

                                                                <span class="filter-option pull-left"><span class="flag-icon flag-icon-nl"></span> Nederlands</span>&nbsp;<span class="caret"></span></button>

                                                            <div class="dropdown-menu open">

                                                                <ul class="dropdown-menu inner selectpicker" role="menu">

                                                                    <li rel="0"><a href="#" tabindex="0" class="" style="color: black !important;" onclick="formSubmit(this)" data-value="eng"><span class="flag-icon flag-icon-us"></span> English<i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>

                                                                    <li rel="1" class="selected"><a href="#" tabindex="0" class="" style="color: black !important;" onclick="formSubmit(this)" data-value="du"><span class="flag-icon flag-icon-nl"></span> Nederlands<i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                                                                </ul>

                                                            </div>

                                                        @endif

                                                    </div>

                                                </form>

                                            </li>
                                        </ul>
                                    </li>

                         {{--<li class="cart-logo border-line" style="height: 35px;padding-top: 0;width: 7%;bottom: 4px;">

                         <div class="pulse" id="ex4" style="height: 100%;">

                         <span class="p1 fa-stack fa-2x has-badge" data-count="{{App\Http\Controllers\FrontendController::getCartCount()}}" style="height: 100%;">

                         <!--<i class="p2 fa fa-circle fa-stack-2x"></i>-->

                         <a href="{{route('cart')}}">

                         <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse"  style="height: 100%;line-height: normal;font-size: 27px;"></i>

                         </a>

                         </span>

                         <a class="new_cart" href="{{route('cart')}}" tabindex="0" style="display: none;padding: 0;margin: 0;position: relative;right: 4px;"><span style="font-size: 14px;">{{$lang->sch}}</span></a>

                         </div>

                         </li>--}}


                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">

    $(document).on( 'mouseover', '.lang-list', function(){
        $(this).find('.bootstrap-select').addClass('open');
    } );

    function formSubmit(e)
    {
        var value = $(e).data('value');

        $('.lang_select').val(value);

        $('#lang-form').submit();


    }
</script>

    <!-- Ending of Header area -->

    <style type="text/css">

        .slicknav_btn
        {
            width: 35px;
            display: flex;
            justify-content: center;
        }

        .slicknav_menu .slicknav_icon
        {
            height: auto;
            width: auto;
        }

        button
        {
            outline: none !important;
        }

        .bootstrap-select .dropdown-menu
        {
            padding: 0 !important;
            min-width: auto !important;
            margin: 0;
        }

        .selected
        {
            background-color: #ececec;
            padding: 10px !important;
        }

        @media only screen and (max-width: 1390px){

            .container{

                width: 100% !important;


            }
        }

        @media only screen and (max-width: 1225px){

            .lang-list{

                width: 98% !important;
            }

            .mainmenu{

                display: none;


            }

            .new_cart
            {
                display: inline-block !important;
            }


            .logo
            {
                position: absolute;
                color: #fff;
                top: -20px;
                right: 17px;
            }

            .logo img
            {
                height: 50px !important;
            }

            #logo-div
            {
                width: 100%;
            }

            .border-line
            {
                width: 98% !important;
            }

            .cart-logo div span a i
            {
                font-size: 24px !important;
                line-height: 0.7 !important;
            }

            .header-area-wrapper{

                padding: 30px 0;
            }

            .slicknav_menu{

                display: block;
                background-color: transparent;
                position: absolute;
                left: 0;
                top: -12px;
                z-index: 99;
                width: 100%;
            }



            .language-select
            {

                width: 100% !important;
                text-align: center;
                margin-top: 25px !important;
            }

            .bootstrap-select.fit-width
            {
                width: auto !important;
            }

            .bootstrap-select .dropdown-menu
            {
                position: relative;
            }


        }


        @media only screen and (max-width: 1100px){

            .top-social-links li
            {
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }

        }

        .bootstrap-select
        {
            margin-bottom: 0px !important;
        }

        .lang-form .bootstrap-select .selectpicker
        {
            background-color: white !important;
            color: inherit !important;
            margin: 0;
            text-transform: inherit;
            white-space: nowrap;
            border: 1px solid;
            box-shadow: none;
            border-color: #ccc !important;
            font-size: 14px;
            padding: 6px 12px;
            padding-right: 25px;
            border-radius: 4px;
            width: auto;
        }

        @media (min-width: 1200px){

            .col-lg-4
            {
                width: 25%;
            }
        }

        @media (min-width: 1200px){

            .col-lg-8
            {
                width: 75%;
            }
        }


        .pulse .p1[data-count]:after{
            position:absolute;
            right:5%;
            top:-25%;
            content: attr(data-count);
            font-size:40%;
            padding:.2em;
            border-radius:50%;
            line-height:1em;
            color: white;
            background:rgba(255,0,0,.85);
            text-align:center;
            min-width: 1.5em;
        //font-weight:bold;
        }

        /***** Pulse *****/

        .pulse span:hover{
            animation: pulse 1s;
            animation-timing-function: linear;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(2.1); }
            100% { transform: scale(2); }
        }

        </style>

        <!-- Starting of Hero area -->
        @yield('content')

        <!-- starting of subscribe newsletter area -->
        <div class="subscribe-newsletter-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="subscribe-newsletter-area">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <h4>{{$lang->ston}}</h4>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <form action="{{route('front.subscribe.submit')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="email" name="email" placeholder="{{$lang->supl}}" required>
                                        <button type="submit" class="btn" style="margin-left: 10px;margin-top: 2px;width: 25%;padding: 0;">{{$lang->s}}</button>
                                    </form>
                                    <p>
                                    @if(Session::has('subscribe'))
                                        {{ Session::get('subscribe') }}
                                    @endif
                                    @foreach($errors->all() as $error)
                                        {{$error}}
                                    @endforeach
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of subscribe newsletter area -->
        <!-- starting of footer area -->
        <footer class="section-padding footer-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->about}}</div>
                            <div class="footer-content">
                                <p>{!!$gs->about!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->fl}}</div>
                            <div class="footer-content">
                                <ul class="about-footer">
                                    <li><a href="{{route('front.index')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->home}}</a></li>
                                @if($ps->a_status == 1)
                                    <li><a href="{{route('front.about')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->about}}</a></li>
                                @endif
                                @if($ps->f_status == 1)
                                    <li><a href="{{route('front.faq')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->faq}}</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                    <li><a href="{{route('front.contact')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->contact}}</a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->lns}}</div>
                            <div class="footer-content">
                                <ul class="latest-tweet">
                                    @foreach($lblogs as $lblog)
                                    <li>
                                        <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                        <span><a href="{{route('front.blogshow',$lblog->title)}}">{{$lblog->title}}</a></span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->contact}}</div>
                            <div class="footer-content">
                                <div class="contact-info">
                                @if($gs->street != null)
                                  <p class="contact-info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {!! $gs->street !!}
                                    </p>
                                @endif
                                @if($gs->phone != null)
                                    <p class="contact-info">
                                         <i class="fa fa-phone" aria-hidden="true"></i>
                                        <a href="tel:{{$gs->phone}}">{{$gs->phone}}</a>
                                    </p>
                                @endif
                                @if($gs->email != null)
                                    <p class="contact-info">
                                         <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                    </p>
                                @endif
                                @if($gs->site != null)
                                    <p class="contact-info">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <a href="{{$gs->site}}" style="word-break: break-all;">{{$gs->site}}</a>
                                    </p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="footer-copyright-area">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                      <p class="copy-right-side">
                        {!!$gs->footer!!}
                      </p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-social-links">
                        <ul>
                            @if($sl->f_status == 1)
                            <li><a class="facebook" href="{{$sl->facebook}}">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            @endif
                            @if($sl->g_status == 1)
                            <li><a class="google" href="{{$sl->gplus}}">
                                <i class="fa fa-google"></i>
                            </a></li>
                            @endif
                            @if($sl->t_status == 1)
                            <li><a class="twitter" href="{{$sl->twitter}}">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            @endif
                            @if($sl->l_status == 1)
                            <li><a class="tumblr" href="{{$sl->linkedin}}">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                            @endif
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </footer>
        <!-- Ending of footer area -->


<style type="text/css">

    .contact-info div
    { margin-left: 20px; }

    button
    {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

        border-color: <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

        color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

    }

    input[type=submit]
    {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

        border-color: <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

        color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

    }

    .btn-cyan
    {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

        border-color: <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

        color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>
    }

    .hero-btn
    {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

        border-color: <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

        color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>
    }

    .footer-social-links li a
    {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

        border-color: <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

        color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

        border-left: 1.5px solid;
    }

    .hero-form
    {
        background-color: <?php if($gs->form_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->form_bg. ' !important;'; } ?>

        color: <?php if($gs->form_col != null) { echo $gs->form_col. ' !important;'; } else { echo 'black !important;'; } ?>
        border: 11px solid <?php if($gs->form_ic == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->form_ic. ' !important;'; } ?>;
    }

    .hero-form-wrapper .input-group-addon
    {
        background-color: <?php if($gs->form_ic == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->form_ic. ' !important;'; } ?>
    }

                           .next1 {
  text-decoration: none !important;
  display: inline-block;
  padding: 8px 16px;
  transition: 1.0s;
  box-shadow: 4px 4px 17px 0px rgba(0, 0, 0, 0.33);
  background-color: {{$gs->colors == null ? '#f3bd02':$gs->colors}};

}




.arrow1
{

    color: white;

}

.next1 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -2px;
  transition: 1.0s;
}



.next1:hover span {
  padding-right: 25px;
  color: black;
}

.next1:hover span:after {
  opacity: 1;
  right: 5px;
}

.round1 {
  border-radius: 50%;
}

                        .checked {
  color: orange !important;
}

                        .team_style2 .team_common:hover  .member_info .content
                        {
                            color: white;
                        }

                        .team_style2 .member_info .overlay1
                        {

                            background: #f7f7f7 none repeat scroll 0 0;

                        }

                        .team_style2 .member_info .overlay2
                        {

                            background: #f7f7f7 none repeat scroll 0 0;

                        }

                         .team_style2 .team_common:hover .member_info .overlay2
    {

        background: {{$gs->colors == null ? '#f3bd02':$gs->colors}} none repeat scroll 0 0;

    }

    .team_style2 .team_common:hover .member_info .content1
    {

        color: white;

    }

    .team_style2 .team_common:hover .member_info .change1
    {

        color: white;

    }

    .team_style2 .team_common:hover .member_info .link1
    {

        color: white !important;

    }


    .team_style2 .team_common:hover .member_info .next1
    {
        background-color: #f7f7f7;
    }


    .team_style2 .team_common:hover .member_info .next1 span
    {
        color: black;
    }

    .content1
    {
        color: black;
    }

    .change1
    {
        color: black;
    }

    .link1
    {
        color: black !important;
    }

    .mainmenu li li a{
        font-size: 15px;
    }

    .mainmenu li a
    {
        color: <?php if($gs->menu_tx == null) { echo 'black;'; } else { echo $gs->menu_tx. ' !important;'; } ?>;
    }


    .slicknav_nav li a
    {
        color: <?php if($gs->menu_mobile_tx == null) { echo 'black;'; } else { echo $gs->menu_mobile_tx. ' !important;'; } ?>;
    }

    .cl-btn
    {
        background-color: transparent !important;
    }

</style>


        <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/wow.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery.slicknav.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/main.js?v=1.1') }}"></script>
        {!! $seo->google_analytics !!}
        <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function(){
                $('#cover').fadeOut(1000);
            },1000)
        });
        </script>

        @yield('scripts')

    </body>
</html>
