<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{$seo->meta_keys}}">
    <meta name="author" content="GeniusOcean">

    <title>{{$gs->title}}</title>
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}">


    <link href="{{ asset('assets/front/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}">
    <link href="{{ asset('assets/front/select2/select2.min.css') }}" rel="stylesheet">
    <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/front/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">


@include('styles.admin-design')


@yield('styles')

<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165295462-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-165295462-1');
    </script>

</head>
<body>
<div class="dashboard-wrapper">
    <div class="left-side">
        <!-- Starting of Dashboard Sidebar menu area -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-right">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>

        <div class="dashboard-sidebar-area">
            <img src="{{asset('assets/images/'.$gs->h_sidebg)}}" alt="">
            <div class="sidebar-menu-body">
                <nav id="sidebar-menu">
                    <div class="sidebar-header">
                        <a href="{{route('front.index')}}"> <img src="{{asset('assets/images/'.$gs->logo)}}"
                                                                 alt="Sidebar header logo" class="sidebar-header-logo"
                                                                 style="height: 55px;width: 100%;"></a>

                    </div>
                    <ul class="list-unstyled profile">
                        <li class="active">
                            <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <img
                                        src="{{ Auth::guard('user')->user()->photo ? asset('assets/images/'.Auth::guard('user')->user()->photo):"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSCM_FnlKpZr_N7Pej8GA40qv63zVgNc0MFfejo35drsuxLUcYG"}}"
                                        alt="profile image">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <a href="#homeSubmenu" data-toggle="collapse"
                                       aria-expanded="false">{{ Auth::guard('user')->user()->name}} {{Auth::guard('user')->user()->family_name}}
                                        <span>{{$lang->hmt}}</span></a>
                                </div>
                            </div>
                            <ul class="collapse list-unstyled profile-submenu" id="homeSubmenu">

                                <li><a href=" {{ route('user-reset') }} "><i
                                            class="fa fa-fw fa-cog"></i> {{$lang->chnp}}</a></li>
                                <li><a href="{{ route('user-logout') }}"><i
                                            class="fa fa-fw fa-power-off"></i> {{$lang->logout}}</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-unstyled components">

                        <li>
                            <a href="#dashboard1" data-toggle="collapse" @if(Route::currentRouteName() == 'user-dashboard' || Route::currentRouteName() == 'user-profile' || Route::currentRouteName() == 'radius-management' || Route::currentRouteName() == 'user-complete-profile') aria-expanded="true" @else aria-expanded="false" @endif><i class="fa fa-fw fa-file-code-o"></i> {{$lang->dashboard}}</a>
                            <ul class="collapse list-unstyled submenu" id="dashboard1">
                                <li><a href="{{route('user-dashboard')}}"><i class="fa fa-angle-right"></i> {{__('text.Dashboard')}}</a></li>
                                <li><a href="{{route('user-profile')}}"><i class="fa fa-angle-right"></i> {{$lang->edit}}</a></li>
                                <li><a href="{{route('radius-management')}}"><i class="fa fa-angle-right"></i> {{$lang->rm}}</a></li>
                                <li><a href="{{route('user-complete-profile')}}"><i class="fa fa-angle-right"></i> {{$lang->cmpt}}</a></li>
                            </ul>
                        </li>


                        {{--<li>
                            <a href="{{route('handyman-bookings')}}"><i class="fa fa-fw fa-book"></i> {{$lang->mbt}}</a>
                        </li>--}}

                        <li>
                            <a href="{{route('handyman-quotation-requests')}}"><i class="fa fa-fw fa-file-text"></i>{{__('text.Quotation Requests')}}</a>
                        </li>

                        <li>
                            <a href="{{route('quotations')}}"><i class="fa fa-fw fa-file-text"></i> {{__('text.Quotations')}}</a>
                        </li>

                        <li>
                            <a href="{{route('quotations-invoices')}}"><i class="fa fa-fw fa-file-text"></i> {{__('text.Quotation Invoices')}}</a>
                        </li>

                        <li>
                            <a href="{{route('commission-invoices')}}"><i class="fa fa-fw fa-file-text"></i> {{__('text.Commission Invoices')}}</a>
                        </li>

                        <li>
                            <a href="{{route('customers')}}"><i class="fa fa-fw fa-file-text"></i> {{__('text.Customers')}}</a>
                        </li>


                        <li>
                            <a href="#sales" data-toggle="collapse" @if(Route::currentRouteName() == 'user-products' || Route::currentRouteName() == 'product-create') aria-expanded="true" @else aria-expanded="false" @endif><i class="fa fa-fw fa-file-code-o"></i> {{__('text.Sales')}}</a>
                            <ul class="collapse list-unstyled submenu" id="sales">
                                <li><a href="{{route('customer-quotations')}}"><i class="fa fa-angle-right"></i> {{__('text.Quotations')}}</a></li>
                                <li><a href="{{route('customer-invoices')}}"><i class="fa fa-angle-right"></i> {{__('text.Invoices')}}</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="#services" data-toggle="collapse" @if(Route::currentRouteName() == 'user-products' || Route::currentRouteName() == 'product-create' || Route::currentRouteName() == 'user-items') aria-expanded="true" @else aria-expanded="false" @endif><i class="fa fa-fw fa-file-code-o"></i> {{__('text.My Products')}}</a>
                            <ul class="collapse list-unstyled submenu" id="services">
                                <li><a href="{{route('user-products')}}"><i class="fa fa-angle-right"></i> {{__('text.Products Overview')}}</a></li>
                                <li><a href="{{route('product-create')}}"><i class="fa fa-angle-right"></i> {{__('text.Add Products')}}</a></li>
                                <li><a href="{{route('user-items')}}"><i class="fa fa-angle-right"></i> {{__('text.My Items')}}</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="#services1" data-toggle="collapse" @if(Route::currentRouteName() == 'my-services' || Route::currentRouteName() == 'service-create') aria-expanded="true" @else aria-expanded="false" @endif><i class="fa fa-fw fa-file-code-o"></i> My Services</a>
                            <ul class="collapse list-unstyled submenu" id="services1">
                                <li><a href="{{route('my-services')}}"><i class="fa fa-angle-right"></i> Services Overview</a></li>
                                <li><a href="{{route('service-create')}}"><i class="fa fa-angle-right"></i> Add Services</a></li>
                            </ul>
                        </li>

                        {{--<li>
                            <a href="{{ route('user-subservices') }}" id="sub-services"><i
                                    class="fa fa-fw fa-hospital-o"></i> {{$lang->msst}}</a>
                        </li>

                        <li>
                            <a href="{{ route('user-availability') }}" id="availability"><i
                                    class="fa fa-fw fa-hospital-o"></i> {{$lang->avmt}}</a>
                        </li>--}}

                        {{--<li>
                            <a href="{{route('purchased-bookings')}}"><i class="fa fa-fw fa-book"></i> {{$lang->pbt}}
                            </a>
                        </li>--}}

                        {{--<li>
                            <a href="{{ route('experience-years') }}" id="experience"><i
                                    class="fa fa-fw fa-hospital-o"></i> {{$lang->eyt}}</a>
                        </li>

                        <li>
                            <a href="{{ route('insurance') }}" id="insurance"><i
                                    class="fa fa-fw fa-book"></i> {{$lang->ist}}</a>
                        </li>--}}

                        <li>
                            <a href="{{ route('ratings') }}" id="rating"><i class="fa fa-fw fa-book"></i> {{$lang->hpmrt}}</a>
                        </li>

                        <li>
                            <a href="{{ route('instruction-manual') }}" id="instruction"><i class="fa fa-fw fa-book"></i> {{__('text.Instruction Manual')}}</a>
                        </li>

                        <li class="lang-list" style="text-align: center;margin-top: 20px;">

                            <form method="post" action="{{route('lang.handymanchange')}}" id="lang-form">
                                {{csrf_field()}}


                                <input type="hidden" class="lang_select" value="{{$lang->lang}}" name="lang_select">

                                <div class="btn-group bootstrap-select fit-width">

                                    @if($lang->lang == 'eng')

                                        <button type="button" class="btn dropdown-toggle selectpicker btn-default"
                                                data-toggle="dropdown" title="English" style="color: black !important;">

                                            <span class="filter-option pull-left"><span
                                                    class="flag-icon flag-icon-nl"></span> English</span>&nbsp;<span
                                                class="caret"></span></button>

                                        <div class="dropdown-menu open">

                                            <ul class="dropdown-menu inner selectpicker" role="menu">

                                                <li rel="0" class="selected"><a href="#" tabindex="0" class=""
                                                                                onclick="formSubmit(this)"
                                                                                data-value="eng"
                                                                                style="color: black !important;"><span
                                                            class="flag-icon flag-icon-us"></span> English<i
                                                            class="glyphicon glyphicon-ok icon-ok check-mark"></i></a>
                                                </li>

                                                <li rel="1"><a href="#" tabindex="0" class=""
                                                               style="color: black !important;"
                                                               onclick="formSubmit(this)" data-value="du"><span
                                                            class="flag-icon flag-icon-nl"></span> Nederlands<i
                                                            class="glyphicon glyphicon-ok icon-ok check-mark"></i></a>
                                                </li>
                                            </ul>

                                        </div>

                                    @elseif($lang->lang == 'du')

                                        <button type="button" class="btn dropdown-toggle selectpicker btn-default"
                                                data-toggle="dropdown" title="Nederlands"
                                                style="color: black !important;">

                                            <span class="filter-option pull-left"><span
                                                    class="flag-icon flag-icon-nl"></span> Nederlands</span>&nbsp;<span
                                                class="caret"></span></button>

                                        <div class="dropdown-menu open">

                                            <ul class="dropdown-menu inner selectpicker" role="menu">

                                                <li rel="0"><a href="#" tabindex="0" class="" onclick="formSubmit(this)"
                                                               data-value="eng" style="color: black !important;"><span
                                                            class="flag-icon flag-icon-us"></span> English<i
                                                            class="glyphicon glyphicon-ok icon-ok check-mark"></i></a>
                                                </li>

                                                <li rel="1" class="selected"><a href="#" tabindex="0" class=""
                                                                                onclick="formSubmit(this)"
                                                                                data-value="du"
                                                                                style="color: black !important;"><span
                                                            class="flag-icon flag-icon-nl"></span> Nederlands<i
                                                            class="glyphicon glyphicon-ok icon-ok check-mark"></i></a>
                                                </li>
                                            </ul>

                                        </div>

                                    @endif

                                </div>

                            </form>

                        </li>


                    </ul>
                </nav>
            </div>
        </div>


        <!-- Ending of Dashboard Sidebar menu area -->
    </div>
    @yield('content')
</div>


<script type="text/javascript">

    function formSubmit(e) {
        var value = $(e).data('value');

        $('.lang_select').val(value);

        $('#lang-form').submit();


    }
</script>


<style type="text/css">

    #sidebar-menu
    {
        width: 100%;
    }

    button {
        outline: none !important;
    }

    .bootstrap-select {
        margin-bottom: 0px !important;
    }

    #lang-form .bootstrap-select .selectpicker {

        background-color: white !important;
        color: inherit !important;
        margin: 0;
        text-transform: inherit;
        white-space: nowrap;
        border: 1px solid transparent;
        box-shadow: none;
        border-color: #ccc !important;
        font-size: 14px;
        padding: 6px 12px;
        padding-right: 25px;
        border-radius: 4px;

    }

    .bootstrap-select .dropdown-menu {
        padding: 0 !important;
    }

    .selected {
        background-color: #ececec;

    }

    .language-select {

        width: 100% !important;
        text-align: center;
        margin-top: 25px !important;
    }


    @media only screen and (min-width: 1200px) and (min-width: 768px) {

        .right-side {
            width: 81%;
        }

        ul.profile li.active img {

            margin-left: 0px;
        }

    }

    .bootstrap-select.fit-width {
        width: 70% !important;
    }

    #sidebar-menu ul.components ul li a {
        padding-left: 15px;
    }


    iframe {
        width: 100%;
    }


    .bootstrap-select .dropdown-menu {
        position: relative;
    }


    .add-back-btn, .add-newProduct-btn {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

         border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

 color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

    }

    .featured-btn {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

         border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

 color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

    }

    .add-product_btn {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

         border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

 color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

    }

    .boxed-btn.blog {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

         border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

 color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

    }

    .nicEdit-button {
        background-image: url("<?php echo asset('assets/images/nicEditIcons-latest.gif'); ?>") !important;
    }

</style>


<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.canvasjs.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<script src="{{asset('assets/admin/js/admin-main.js')}}"></script>


@yield('scripts')

</body>
</html>
