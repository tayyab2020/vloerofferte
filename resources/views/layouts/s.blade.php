<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@yield('title','Gratis vloeroffertes van verschillende winkels bij jou in de buurt. | Vloer offerte aanvragen? | vloerofferte.nl')">
    <meta name="description" content="@yield('description','')">
    <meta property="keywords" content="@yield('keywords','Vloeroffertes, laminaat offerte, visgraat offerte, pvc visgraat offerte, parket offerte, houten vloer offerte')" />
    <meta name="author" content="Vloerofferte.nl">
    <meta property="og:locale" content="nl_NL" />
    <meta property="og:type" content="website" />
    <link rel="canonical" href="{{url('/')}}" />
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
    <link rel="stylesheet" type="text/css"
          href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css">


    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script type="text/javascript"
            src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>


    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'c48884354ee46ae0e7e98458fad7375341bdcfcf';
        window.smartsupp || (function (d) {
            var s, c, o = smartsupp = function () {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>

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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QV9Q57K9LE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-QV9Q57K9LE');
    </script>

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
                <div class="logo" style="margin-bottom: 20px;z-index: 1000;">
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
                            {{--<li class="border-line"><a href="{{route('user-register')}}">{{$lang->signup}}</a></li>--}}
                        <!-- <li class="border-line"><a href="{{route('handyman-register')}}">{{$lang->signup_handyman}}</a></li> -->
                        @endif


                        @if(Auth::guard('user')->check())

                            @if(Auth::guard('user')->user()->role_id == 2)

                                <li class="menuLi border-line"><a style="cursor: pointer;">{{__('text.PROFILE')}} <i
                                                class="fa fa-angle-down"></i></a>
                                    <ul class="menuUl">

                                        <button
                                                style="background-color: white !important;color: black !important;position: relative;right: 5px;"
                                                type="button" class="close dropdown-close" aria-hidden="true">&times;
                                        </button>

                                        <li><a href="{{route('user-dashboard')}}">{{$lang->hpt}}</a></li>

                                        <li><a href="{{route('user-logout')}}">{{$lang->logout}}</a></li>
                                    </ul>
                                </li>

                            @elseif(Auth::guard('user')->user()->role_id == 3)

                                <li class="menuLi border-line"><a style="cursor: pointer;">{{__('text.PROFILE')}} <i
                                                class="fa fa-angle-down"></i></a>
                                    <ul class="menuUl">

                                        <button
                                                style="background-color: white !important;color: black !important;position: relative;right: 5px;"
                                                type="button" class="close dropdown-close" aria-hidden="true">&times;
                                        </button>

                                        <li><a href="{{route('client-quotation-requests')}}">{{$lang->cpt}}</a></li>

                                        <li><a href="{{route('user-logout')}}">{{$lang->logout}}</a></li>

                                    </ul>
                                </li>

                            @endif

                        @endif

                        <li class="menuLi1 border-line"><a style="cursor: pointer;">{{__('text.MENU')}} <i
                                        class="fa fa-angle-down"></i></a>
                            <ul class="menuUl1" style="left: -100px;">

                                <button
                                        style="background-color: white !important;color: black !important;position: relative;right: 5px;"
                                        type="button" class="close dropdown-close" aria-hidden="true">&times;
                                </button>

                                <li><a href="{{route('front.index')}}">{{$lang->home}}</a></li>

                                {{--<li><a href="{{route('front.users')}}">{{$lang->h}}</a></li>--}}

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

                                    <form method="post" action="{{route('lang.change')}}" id="lang-form"
                                          class="lang-form">

                                        {{csrf_field()}}

                                        <input type="hidden" class="lang_select" value="{{$lang->lang}}"
                                               name="lang_select">

                                        <div class="btn-group bootstrap-select fit-width">

                                            @if($lang->lang == 'eng')

                                                <button type="button"
                                                        class="btn dropdown-toggle selectpicker btn-default"
                                                        data-toggle="dropdown" title="English">

                                                    <span class="filter-option pull-left"><span
                                                                class="flag-icon flag-icon-nl"></span> English</span>&nbsp;<span
                                                            class="caret"></span></button>

                                                <div class="dropdown-menu open">

                                                    <ul class="dropdown-menu inner selectpicker" role="menu">

                                                        <li rel="0" class="selected"><a href="#" tabindex="0" class=""
                                                                                        style="color: black !important;"
                                                                                        onclick="formSubmit(this)"
                                                                                        data-value="eng"><span
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

                                                <button type="button"
                                                        class="btn dropdown-toggle selectpicker btn-default"
                                                        data-toggle="dropdown" title="Nederlands">

                                                    <span class="filter-option pull-left"><span
                                                                class="flag-icon flag-icon-nl"></span> Nederlands</span>&nbsp;<span
                                                            class="caret"></span></button>

                                                <div class="dropdown-menu open">

                                                    <ul class="dropdown-menu inner selectpicker" role="menu">

                                                        <li rel="0"><a href="#" tabindex="0" class=""
                                                                       style="color: black !important;"
                                                                       onclick="formSubmit(this)" data-value="eng"><span
                                                                        class="flag-icon flag-icon-us"></span> English<i
                                                                        class="glyphicon glyphicon-ok icon-ok check-mark"></i></a>
                                                        </li>

                                                        <li rel="1" class="selected"><a href="#" tabindex="0" class=""
                                                                                        style="color: black !important;"
                                                                                        onclick="formSubmit(this)"
                                                                                        data-value="du"><span
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

<div id="aanvragen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form id="quote_form" method="post" enctype="multipart/form-data" action="{{route('user.quote')}}">

            <input type="hidden" name="_token" value="{{@csrf_token()}}">
            <input type="hidden" name="quote_waste" id="quote_waste" value="0">

            <div class="modal-content">
                <div class="modal-header">
                    <button style="background-color: white !important;color: black !important;" type="button"
                            class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h3 id="myModalLabel">{{__('text.Ask for Quotation')}}</h3>
                </div>
                <div class="modal-body" id="myWizard">

                    <div class="progress" style="height: 25px;">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1"
                             aria-valuemin="1" aria-valuemax="4"
                             style="width: 25%;line-height: 25px;font-size: 14px;font-weight: 100;background-color: {{$gs->colors == null ? '#f3bd02':$gs->colors}};">
                            {{__('text.Step')}} 1
                        </div>
                    </div>

                    <div class="navbar" style="display: none;">
                        <div class="navbar-inner">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#step1" data-toggle="tab" data-step="1">{{__('text.Step')}}
                                        1</a></li>
                                <li><a href="#step2" data-toggle="tab" data-step="2">{{__('text.Step')}} 2</a></li>
                                <li><a href="#step3" data-toggle="tab" data-step="3">{{__('text.Step')}} 3</a></li>
                                <li><a href="#step4" data-toggle="tab" data-step="4">{{__('text.Step')}} 4</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">

                        <div class="tab-pane fade in active" id="step1" style="height: 300px;overflow-y: auto;">

                            <div class="well">

                                <h3 style="text-align: center;color: #4b4b4b;margin-bottom: 30px;">{{__('text.Fill information for Quotation')}}</h3>

                                <div class="duo-boxes" style="margin-bottom: 40px;">

                                    <select class="js-data-example-ajax2 form-control quote-category quote_validation"
                                            style="height: 40px;" name="quote_service" id="blood_grp" required>

                                        <option value="">{{__('text.Select Category')}}</option>

                                        @if(isset($quote_cats))

                                            @foreach($quote_cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                            @endforeach

                                        @endif

                                        <option value="Diensten">Diensten</option>

                                    </select>

                                </div>

                                <div class="files-box" style="margin-top: 50px;display: none;">

                                    <div style="margin: 0;" class="row">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control file-text" readonly>
                                                <div class="input-group-btn">
                                                <span class="fileUpload btn btn-info">
                                                    <span class="upl" id="upload">{{__('text.Upload your file (Max 2)')}}</span>
                                                    <input type="file" name="quote_files[]" class="upload files-upload" id="up" multiple/>
                                                </span><!-- btn-orange -->
                                                </div><!-- btn -->
                                            </div><!-- group -->
                                            <small class="file-error" style="color: red;display: none;">{{__('text.Please upload max 2 files')}}</small>
                                        </div><!-- form-group -->

                                    </div>

                                </div>

                                <div class="linked-boxes" style="margin-bottom: 40px;">

                                    <select class="js-data-example-ajax5 form-control quote-brand quote_validation"
                                            style="height: 40px;" name="quote_brand" id="blood_grp" required>

                                        <option value="">{{__('text.Select Brand')}}</option>

                                    </select>

                                </div>

                                <div class="linked-boxes" style="margin-bottom: 40px;">

                                    <select class="js-data-example-ajax13 form-control quote-type quote_validation"
                                            style="height: 40px;" name="type_id" id="blood_grp" required>

                                        <option value="">{{__('text.Select Type')}}</option>

                                    </select>

                                </div>

                                {{--<div class="linked-boxes" style="margin-bottom: 40px;">

                                    <select class="js-data-example-ajax11 form-control products-dropdown quote_validation"
                                            style="height: 40px;" name="product_id" id="blood_grp" required>

                                        <option value="">{{__('text.Select Product')}}</option>

                                    </select>

                                </div>--}}

                                <div class="linked-boxes model-box" style="margin-bottom: 40px;">

                                    <select class="js-data-example-ajax6 form-control quote-model quote_validation"
                                            style="height: 40px;" name="quote_model" id="blood_grp" required>

                                        <option value="">{{__('text.Select Model')}}</option>

                                    </select>

                                </div>

                                <div class="linked-boxes" style="margin-bottom: 40px;">

                                    <select class="js-data-example-ajax8 form-control quote-color quote_validation"
                                            style="height: 40px;" name="quote_color" id="blood_grp" required>

                                        <option value="">{{__('text.Select Color')}}</option>

                                    </select>

                                </div>

                                <div class="unlinked-boxes" style="margin-bottom: 40px;display: none;">

                                    <select class="js-data-example-ajax10 form-control quote-service"
                                            name="quote_service1" id="blood_grp">

                                        <option value="">Select Service</option>

                                        @if(isset($quote_services))

                                            @foreach($quote_services as $service)
                                                <option value="{{$service->id}}">{{$service->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>

                                <div class="duo-boxes" style="margin-bottom: 40px;">

                                    <input maskedFormat="9,1" autocomplete="off" max="100" min="1"
                                           style="height: 40px;border: 1px solid #e1e1e1;" type="text"
                                           name="quote_quantity" placeholder="Quantity"
                                           class="form-control quote_quantity quote_validation">

                                </div>

                                <div class="duo-boxes">

                                    <input style="height: 40px;border: 1px solid #e1e1e1;" type="text" name="quote_delivery" id="quote_delivery" class="form-control quote_delivery quote_validation" placeholder="{{__('text.Select Delivery Date')}}" autocomplete="off">

                                </div>

                            </div>

                        </div>


                        <div style="max-height: 300px;overflow-y: auto;" class="tab-pane fade" id="step2">

                            <section class="attributes_table" style="width: 100%;padding: 19px;">

                                <input type="hidden" name="measure_type" id="measure_type">
                                <h3 style="border-bottom: 1px solid #b9b9b9;margin-bottom: 30px;padding-bottom: 10px;text-align: center;">{{__('text.Dimensions')}}</h3>

                                <div class="header-div">
                                    <div class="headings" style="width: 42%;">{{__('text.Description')}}</div>
                                    <div class="headings" style="width: 20%;">{{__('text.Width')}}</div>
                                    <div class="headings" style="width: 20%;">{{__('text.Height')}}</div>
                                    <div class="headings" style="width: 18%;"></div>
                                </div>

                                <div class="attribute-content-div">

                                    <div class="attribute full-res" style="width: 42%;">
                                        <div style="display: flex;align-items: center;">
                                            <div style="width: 100%;"><textarea class="form-control attribute_description" style="width: 90%;border-radius: 7px;resize: vertical;height: 40px;outline: none;" name="attribute_description[]"></textarea></div>
                                        </div>
                                    </div>

                                    <div class="attribute width-box" style="width: 20%;">

                                        <div class="m-box">
                                            <input style="border: 1px solid #ccc;" id="width" class="form-control width m-input" maskedformat="9,1" autocomplete="off" name="width[]" type="text">
                                            <input style="border: 0;outline: none;" value="cm" readonly="" type="text" name="width_unit[]" class="measure-unit">
                                        </div>

                                    </div>

                                    <div class="attribute height-box" style="width: 20%;">

                                        <div class="m-box">
                                            <input style="border: 1px solid #ccc;" id="height" class="form-control height m-input" maskedformat="9,1" autocomplete="off" name="height[]" type="text">
                                            <input style="border: 0;outline: none;" value="cm" readonly="" type="text" name="height_unit[]" class="measure-unit">
                                        </div>

                                    </div>

                                    <div class="attribute last-content" style="padding: 0;width: 18%;">
                                        <div class="res-white" style="display: flex;justify-content: flex-start;align-items: center;width: 100%;">

                                            <span id="next-row-span" class="add-attribute-row" style="cursor: pointer;font-size: 20px;margin-left: 10px;width: 20px;height: 20px;line-height: 20px;">
                                                <i id="next-row-icon" class="fa fa-fw fa-plus"></i>
                                            </span>

                                            <span id="next-row-span" class="remove-attribute-row" style="cursor: pointer;font-size: 20px;margin-left: 10px;width: 20px;height: 20px;line-height: 20px;">
                                                <i id="next-row-icon" class="fa fa-fw fa-trash-o"></i>
                                            </span>

                                            <span id="next-row-span" class="copy-attribute-row" style="cursor: pointer;font-size: 20px;margin: 0 10px;width: 20px;height: 20px;line-height: 20px;">
                                                <i id="next-row-icon" class="fa fa-fw fa-copy"></i>
                                            </span>

                                        </div>
                                    </div>

                                </div>


                            </section>

                            <div class="well"></div>

                            {{--                            <div style="width: 100%;position: relative;height: 2rem;bottom: 2rem;background: linear-gradient(rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 25%, rgb(255, 255, 255) 100%);"></div>--}}

                        </div>

                        <div style="max-height: 300px;overflow-y: auto;" class="tab-pane fade" id="step3">

                            <div class="well">

                                <h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">{{__('text.Provide a description of your job')}}</h3>

                                <textarea style="resize: vertical;" rows="7" name="quote_description"
                                          class="form-control quote_validation"
                                          placeholder="{{__('text.Providing more details increases interest from tradies')}}"></textarea>

                            </div>

                            <div
                                    style="width: 100%;position: relative;height: 2rem;bottom: 2rem;background: linear-gradient(rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 25%, rgb(255, 255, 255) 100%);"></div>

                        </div>

                        <div class="tab-pane fade" id="step4">
                            <div class="well" style="height: 300px;">

                                <h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">{{__('text.Please provide some contact details.')}}</h3>

                                <label>{{__('text.Name')}} <span style="color: red;">*</span></label>
                                <input style="height: 45px;margin-bottom: 20px;" type="text" name="quote_name"
                                       class="form-control quote_validation" placeholder="{{__('text.Enter Name')}}"
                                       autocomplete="off">

                                <label>{{__('text.Family Name')}} <span style="color: red;">*</span></label>
                                <input style="height: 45px;margin-bottom: 20px;" type="text" name="quote_familyname"
                                       class="form-control quote_validation"
                                       placeholder="{{__('text.Enter Family Name')}}" autocomplete="off">

                                <label>{{__('text.Where do you need the job done?')}} <span style="color: red;">*</span></label>
                                <div style="margin-bottom: 20px;">
                                    <input style="height: 45px;" type="search" name="quote_zipcode" id="quote-zipcode"
                                           class="form-control quote_validation" placeholder="{{$lang->spzc}}"
                                           autocomplete="off">
                                    <input type="hidden" id="check_address" value="0">
                                    <input id="postcode" name="postcode" type="hidden">
                                    <input name="city" id="city" type="hidden">
                                </div>

                                <label>{{__('text.Email')}} <span style="color: red;">*</span></label>
                                <input style="height: 45px;margin-bottom: 20px" type="email" name="quote_email"
                                       class="form-control quote_validation" placeholder="{{__('text.Enter Email')}}">

                                <label>{{__('text.Contact Number')}} <span style="color: red;">*</span></label>
                                <input style="height: 45px;margin-bottom: 20px" type="text" name="quote_contact"
                                       class="form-control quote_validation"
                                       placeholder="{{__('text.Enter Contact Number')}}" autocomplete="off">

                                <div>

                                    <label
                                            style="align-items: flex-start;font-size: 12px;padding-left: 25px;margin-bottom: 0;"
                                            class="container-checkbox terms">{{__('text.Your details will be used to create a job post, so that you can monitor and manage the job you\'ve posted.')}}
                                        <input name="permission" class="permission_validation" type="checkbox"
                                               value="1">
                                        <span style="top: 7px;width: 15px;height: 15px;border: 1px solid #8d8d8d;"
                                              class="checkmark-checkbox permission-checkbox"></span>
                                    </label>

                                </div>

                                <br>

                                <small style="text-align: center;display: block;width: 80%;margin: auto;margin-bottom: 10px;">{{__('text.By pressing Get Quotes you agree to the')}}
                                    <a target="_blank"
                                       href="{{isset($quote_data) ? asset('assets/'.$quote_data->file) : null}}">{{__('text.terms and conditions')}}</a> {{__('text.of our website.')}}
                                </small>

                            </div>
                            <div style="width: 100%;position: relative;height: 2rem;bottom: 1rem;background: linear-gradient(rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 25%, rgb(255, 255, 255) 100%);"></div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            style="border: 0;outline: none;"
                            class="btn btn-success floor">{{__('text.If you cant find floor, Click Here')}}</button>
                    <button type="button"
                            style="border: 0;display: none;outline: none;background-color: #e5e5e5 !important;color: black !important;"
                            class="btn back">{{__('text.Back')}}</button>
                    <button type="button"
                            style="border: 0;outline: none;background-color: {{$gs->colors == null ? '#f3bd02':$gs->colors}} !important;"
                            class="btn btn-primary next">{{__('text.Continue')}}</button>
                    <button type="button"
                            style="display: none;border: 0;outline: none;background-color: {{$gs->colors == null ? '#f3bd02':$gs->colors}} !important;"
                            class="btn btn-primary next-submit">{{__('text.Get Quotes')}}</button>
                </div>

            </div>

        </form>
    </div>
</div>

<style type="text/css">

    .attributes_table
    {
        display: none;
    }

    .attributes_table.active
    {
        display: block;
    }

    .m-box {
        display: flex;
        align-items: center;
    }

    .m-input {
        border-radius: 5px !important;
        width: 70%;
        border: 0;
        padding: 0 5px;
        text-align: left;
        height: 30px !important;
    }

    .m-input:focus{
        background: #f6f6f6;
    }

    .measure-unit {
        width: 50%;
    }

    .header-div, .content-div, .attribute-content-div
    {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .header-div .headings
    {
        font-family: system-ui;
        font-weight: 500;
        border-bottom: 1px solid #ebebeb;
        padding-bottom: 15px;
        color: gray;
        height: 40px;
    }

    .content-div, .attribute-content-div
    {
        margin-top: 15px;
        flex-flow: wrap;
        /*border-bottom: 1px solid #d0d0d0;*/
        padding-bottom: 10px;
    }

    .content-div .content {
        font-family: system-ui;
        font-weight: 500;
        padding: 0;
        color: #3c3c3c;
        height: 40px;
        display: flex;
        align-items: center;
    }

    .content-div.active .content {
        border-top: 2px solid #cecece;
        border-bottom: 2px solid #cecece;
    }

    .content-div.active .content:first-child {
        border-left: 2px solid #cecece;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px;
    }

    .content-div.active .last-content {
        border-right: 2px solid #cecece;
        border-bottom-right-radius: 4px;
        border-top-right-radius: 4px;
    }

    .it .btn-orange
    {
        background-color: blue;
        border-color: #777!important;
        color: #777;
        text-align: left;
        width:100%;
    }
    .it input.form-control
    {

        border:none;
        margin-bottom:0px;
        border-radius: 0px;
        border-bottom: 1px solid #ddd;
        box-shadow: none;
    }
    .it .form-control:focus
    {
        border-color: #ff4d0d;
        box-shadow: none;
        outline: none;
    }
    .fileUpload {
        position: relative;
        overflow: hidden;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    /*!
* Datepicker for Bootstrap v1.5.0 (https://github.com/eternicode/bootstrap-datepicker)
*
* Copyright 2012 Stefan Petre
* Improvements by Andrew Rowls
* Licensed under the Apache License v2.0 (http://www.apache.org/licenses/LICENSE-2.0)
*/
    .datepicker {
        padding: 4px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        direction: ltr;
    }
    .datepicker-inline {
        width: 220px;
    }
    .datepicker.datepicker-rtl {
        direction: rtl;
    }
    .datepicker.datepicker-rtl table tr td span {
        float: right;
    }
    .datepicker-dropdown {
        top: 0;

        min-width: 19.3% !important;
    }

    .table-condensed{

        width: 100%;


    }

    .datepicker td, .datepicker th
    {

        font-size: 17px;


    }
    .datepicker-dropdown:before {
        content: '';
        display: inline-block;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #999999;
        border-top: 0;
        border-bottom-color: rgba(0, 0, 0, 0.2);
        position: absolute;
    }
    .datepicker-dropdown:after {
        content: '';
        display: inline-block;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #ffffff;
        border-top: 0;
        position: absolute;
    }
    .datepicker-dropdown.datepicker-orient-left:before {
        left: 6px;
    }
    .datepicker-dropdown.datepicker-orient-left:after {
        left: 7px;
    }
    .datepicker-dropdown.datepicker-orient-right:before {
        right: 6px;
    }
    .datepicker-dropdown.datepicker-orient-right:after {
        right: 7px;
    }
    .datepicker-dropdown.datepicker-orient-bottom:before {
        display: none;
        top: -7px;
    }
    .datepicker-dropdown.datepicker-orient-bottom:after {
        display: none;
        top: -6px;
    }
    .datepicker-dropdown.datepicker-orient-top:before {
        display: none;
        bottom: -7px;
        border-bottom: 0;
        border-top: 7px solid #999999;
    }
    .datepicker-dropdown.datepicker-orient-top:after {
        display: none;
        bottom: -6px;
        border-bottom: 0;
        border-top: 6px solid #ffffff;
    }
    .datepicker > div {
        display: none;
    }
    .datepicker table {
        margin: 0;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .datepicker td,
    .datepicker th {
        text-align: center;
        width: 20px;
        height: 20px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        border: none;
    }
    .table-striped .datepicker table tr td,
    .table-striped .datepicker table tr th {
        background-color: transparent;
    }
    .datepicker table tr td.day:hover,
    .datepicker table tr td.day.focused {
        background: #eeeeee;
        cursor: pointer;
    }
    .datepicker table tr td.old,
    .datepicker table tr td.new {
        color: #999999;
    }
    .datepicker table tr td.disabled,
    .datepicker table tr td.disabled:hover {
        background: none;
        color: #999999;
        cursor: default;
    }
    .datepicker table tr td.highlighted {
        background: #d9edf7;
        border-radius: 0;
    }
    .datepicker table tr td.today,
    .datepicker table tr td.today:hover,
    .datepicker table tr td.today.disabled,
    .datepicker table tr td.today.disabled:hover {
        background-color: #fde19a;
        background-image: -moz-linear-gradient(to bottom, #fdd49a, #fdf59a);
        background-image: -ms-linear-gradient(to bottom, #fdd49a, #fdf59a);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fdd49a), to(#fdf59a));
        background-image: -webkit-linear-gradient(to bottom, #fdd49a, #fdf59a);
        background-image: -o-linear-gradient(to bottom, #fdd49a, #fdf59a);
        background-image: linear-gradient(to bottom, #fdd49a, #fdf59a);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fdd49a', endColorstr='#fdf59a', GradientType=0);
        border-color: #fdf59a #fdf59a #fbed50;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
        color: #000;
    }
    .datepicker table tr td.today:hover,
    .datepicker table tr td.today:hover:hover,
    .datepicker table tr td.today.disabled:hover,
    .datepicker table tr td.today.disabled:hover:hover,
    .datepicker table tr td.today:active,
    .datepicker table tr td.today:hover:active,
    .datepicker table tr td.today.disabled:active,
    .datepicker table tr td.today.disabled:hover:active,
    .datepicker table tr td.today.active,
    .datepicker table tr td.today:hover.active,
    .datepicker table tr td.today.disabled.active,
    .datepicker table tr td.today.disabled:hover.active,
    .datepicker table tr td.today.disabled,
    .datepicker table tr td.today:hover.disabled,
    .datepicker table tr td.today.disabled.disabled,
    .datepicker table tr td.today.disabled:hover.disabled,
    .datepicker table tr td.today[disabled],
    .datepicker table tr td.today:hover[disabled],
    .datepicker table tr td.today.disabled[disabled],
    .datepicker table tr td.today.disabled:hover[disabled] {
        background-color: #fdf59a;
    }
    .datepicker table tr td.today:active,
    .datepicker table tr td.today:hover:active,
    .datepicker table tr td.today.disabled:active,
    .datepicker table tr td.today.disabled:hover:active,
    .datepicker table tr td.today.active,
    .datepicker table tr td.today:hover.active,
    .datepicker table tr td.today.disabled.active,
    .datepicker table tr td.today.disabled:hover.active {
        background-color: #fbf069 \9;
    }
    .datepicker table tr td.today:hover:hover {
        color: #000;
    }
    .datepicker table tr td.today.active:hover {
        color: #fff;
    }
    .datepicker table tr td.range,
    .datepicker table tr td.range:hover,
    .datepicker table tr td.range.disabled,
    .datepicker table tr td.range.disabled:hover {
        background: #eeeeee;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }
    .datepicker table tr td.range.today,
    .datepicker table tr td.range.today:hover,
    .datepicker table tr td.range.today.disabled,
    .datepicker table tr td.range.today.disabled:hover {
        background-color: #f3d17a;
        background-image: -moz-linear-gradient(to bottom, #f3c17a, #f3e97a);
        background-image: -ms-linear-gradient(to bottom, #f3c17a, #f3e97a);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f3c17a), to(#f3e97a));
        background-image: -webkit-linear-gradient(to bottom, #f3c17a, #f3e97a);
        background-image: -o-linear-gradient(to bottom, #f3c17a, #f3e97a);
        background-image: linear-gradient(to bottom, #f3c17a, #f3e97a);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3c17a', endColorstr='#f3e97a', GradientType=0);
        border-color: #f3e97a #f3e97a #edde34;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }
    .datepicker table tr td.range.today:hover,
    .datepicker table tr td.range.today:hover:hover,
    .datepicker table tr td.range.today.disabled:hover,
    .datepicker table tr td.range.today.disabled:hover:hover,
    .datepicker table tr td.range.today:active,
    .datepicker table tr td.range.today:hover:active,
    .datepicker table tr td.range.today.disabled:active,
    .datepicker table tr td.range.today.disabled:hover:active,
    .datepicker table tr td.range.today.active,
    .datepicker table tr td.range.today:hover.active,
    .datepicker table tr td.range.today.disabled.active,
    .datepicker table tr td.range.today.disabled:hover.active,
    .datepicker table tr td.range.today.disabled,
    .datepicker table tr td.range.today:hover.disabled,
    .datepicker table tr td.range.today.disabled.disabled,
    .datepicker table tr td.range.today.disabled:hover.disabled,
    .datepicker table tr td.range.today[disabled],
    .datepicker table tr td.range.today:hover[disabled],
    .datepicker table tr td.range.today.disabled[disabled],
    .datepicker table tr td.range.today.disabled:hover[disabled] {
        background-color: #f3e97a;
    }
    .datepicker table tr td.range.today:active,
    .datepicker table tr td.range.today:hover:active,
    .datepicker table tr td.range.today.disabled:active,
    .datepicker table tr td.range.today.disabled:hover:active,
    .datepicker table tr td.range.today.active,
    .datepicker table tr td.range.today:hover.active,
    .datepicker table tr td.range.today.disabled.active,
    .datepicker table tr td.range.today.disabled:hover.active {
        background-color: #efe24b \9;
    }
    .datepicker table tr td.selected,
    .datepicker table tr td.selected:hover,
    .datepicker table tr td.selected.disabled,
    .datepicker table tr td.selected.disabled:hover {
        background-color: #9e9e9e;
        background-image: -moz-linear-gradient(to bottom, #b3b3b3, #808080);
        background-image: -ms-linear-gradient(to bottom, #b3b3b3, #808080);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#b3b3b3), to(#808080));
        background-image: -webkit-linear-gradient(to bottom, #b3b3b3, #808080);
        background-image: -o-linear-gradient(to bottom, #b3b3b3, #808080);
        background-image: linear-gradient(to bottom, #b3b3b3, #808080);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b3b3b3', endColorstr='#808080', GradientType=0);
        border-color: #808080 #808080 #595959;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
        color: #fff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .datepicker table tr td.selected:hover,
    .datepicker table tr td.selected:hover:hover,
    .datepicker table tr td.selected.disabled:hover,
    .datepicker table tr td.selected.disabled:hover:hover,
    .datepicker table tr td.selected:active,
    .datepicker table tr td.selected:hover:active,
    .datepicker table tr td.selected.disabled:active,
    .datepicker table tr td.selected.disabled:hover:active,
    .datepicker table tr td.selected.active,
    .datepicker table tr td.selected:hover.active,
    .datepicker table tr td.selected.disabled.active,
    .datepicker table tr td.selected.disabled:hover.active,
    .datepicker table tr td.selected.disabled,
    .datepicker table tr td.selected:hover.disabled,
    .datepicker table tr td.selected.disabled.disabled,
    .datepicker table tr td.selected.disabled:hover.disabled,
    .datepicker table tr td.selected[disabled],
    .datepicker table tr td.selected:hover[disabled],
    .datepicker table tr td.selected.disabled[disabled],
    .datepicker table tr td.selected.disabled:hover[disabled] {
        background-color: #808080;
    }
    .datepicker table tr td.selected:active,
    .datepicker table tr td.selected:hover:active,
    .datepicker table tr td.selected.disabled:active,
    .datepicker table tr td.selected.disabled:hover:active,
    .datepicker table tr td.selected.active,
    .datepicker table tr td.selected:hover.active,
    .datepicker table tr td.selected.disabled.active,
    .datepicker table tr td.selected.disabled:hover.active {
        background-color: #666666 \9;
    }
    .datepicker table tr td.active,
    .datepicker table tr td.active:hover,
    .datepicker table tr td.active.disabled,
    .datepicker table tr td.active.disabled:hover {
        background-color: #006dcc;
        background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
        background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: linear-gradient(to bottom, #0088cc, #0044cc);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
        border-color: #0044cc #0044cc #002a80;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
        color: #fff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .datepicker table tr td.active:hover,
    .datepicker table tr td.active:hover:hover,
    .datepicker table tr td.active.disabled:hover,
    .datepicker table tr td.active.disabled:hover:hover,
    .datepicker table tr td.active:active,
    .datepicker table tr td.active:hover:active,
    .datepicker table tr td.active.disabled:active,
    .datepicker table tr td.active.disabled:hover:active,
    .datepicker table tr td.active.active,
    .datepicker table tr td.active:hover.active,
    .datepicker table tr td.active.disabled.active,
    .datepicker table tr td.active.disabled:hover.active,
    .datepicker table tr td.active.disabled,
    .datepicker table tr td.active:hover.disabled,
    .datepicker table tr td.active.disabled.disabled,
    .datepicker table tr td.active.disabled:hover.disabled,
    .datepicker table tr td.active[disabled],
    .datepicker table tr td.active:hover[disabled],
    .datepicker table tr td.active.disabled[disabled],
    .datepicker table tr td.active.disabled:hover[disabled] {
        background-color: #0044cc;
    }
    .datepicker table tr td.active:active,
    .datepicker table tr td.active:hover:active,
    .datepicker table tr td.active.disabled:active,
    .datepicker table tr td.active.disabled:hover:active,
    .datepicker table tr td.active.active,
    .datepicker table tr td.active:hover.active,
    .datepicker table tr td.active.disabled.active,
    .datepicker table tr td.active.disabled:hover.active {
        background-color: #003399 \9;
    }
    .datepicker table tr td span {
        display: block;
        width: 23%;
        height: 54px;
        line-height: 54px;
        float: left;
        margin: 1%;
        cursor: pointer;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    .datepicker table tr td span:hover {
        background: #eeeeee;
    }
    .datepicker table tr td span.disabled,
    .datepicker table tr td span.disabled:hover {
        background: none;
        color: #999999;
        cursor: default;
    }
    .datepicker table tr td span.active,
    .datepicker table tr td span.active:hover,
    .datepicker table tr td span.active.disabled,
    .datepicker table tr td span.active.disabled:hover {
        background-color: #006dcc;
        background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
        background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
        background-image: linear-gradient(to bottom, #0088cc, #0044cc);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
        border-color: #0044cc #0044cc #002a80;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
        color: #fff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }
    .datepicker table tr td span.active:hover,
    .datepicker table tr td span.active:hover:hover,
    .datepicker table tr td span.active.disabled:hover,
    .datepicker table tr td span.active.disabled:hover:hover,
    .datepicker table tr td span.active:active,
    .datepicker table tr td span.active:hover:active,
    .datepicker table tr td span.active.disabled:active,
    .datepicker table tr td span.active.disabled:hover:active,
    .datepicker table tr td span.active.active,
    .datepicker table tr td span.active:hover.active,
    .datepicker table tr td span.active.disabled.active,
    .datepicker table tr td span.active.disabled:hover.active,
    .datepicker table tr td span.active.disabled,
    .datepicker table tr td span.active:hover.disabled,
    .datepicker table tr td span.active.disabled.disabled,
    .datepicker table tr td span.active.disabled:hover.disabled,
    .datepicker table tr td span.active[disabled],
    .datepicker table tr td span.active:hover[disabled],
    .datepicker table tr td span.active.disabled[disabled],
    .datepicker table tr td span.active.disabled:hover[disabled] {
        background-color: #0044cc;
    }
    .datepicker table tr td span.active:active,
    .datepicker table tr td span.active:hover:active,
    .datepicker table tr td span.active.disabled:active,
    .datepicker table tr td span.active.disabled:hover:active,
    .datepicker table tr td span.active.active,
    .datepicker table tr td span.active:hover.active,
    .datepicker table tr td span.active.disabled.active,
    .datepicker table tr td span.active.disabled:hover.active {
        background-color: #003399 \9;
    }
    .datepicker table tr td span.old,
    .datepicker table tr td span.new {
        color: #999999;
    }
    .datepicker .datepicker-switch {
        width: 145px;
    }
    .datepicker .datepicker-switch,
    .datepicker .prev,
    .datepicker .next,
    .datepicker tfoot tr th {
        cursor: pointer;
    }
    .datepicker .datepicker-switch:hover,
    .datepicker .prev:hover,
    .datepicker .next:hover,
    .datepicker tfoot tr th:hover {
        background: #eeeeee;
    }
    .datepicker .cw {
        font-size: 10px;
        width: 12px;
        padding: 0 2px 0 5px;
        vertical-align: middle;
    }
    .input-append.date .add-on,
    .input-prepend.date .add-on {
        cursor: pointer;
    }
    .input-append.date .add-on i,
    .input-prepend.date .add-on i {
        margin-top: 3px;
    }
    .input-daterange input {
        text-align: center;
    }
    .input-daterange input:first-child {
        -webkit-border-radius: 3px 0 0 3px;
        -moz-border-radius: 3px 0 0 3px;
        border-radius: 3px 0 0 3px;
    }
    .input-daterange input:last-child {
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
    }
    .input-daterange .add-on {
        display: inline-block;
        width: auto;
        min-width: 16px;
        height: 18px;
        padding: 4px 5px;
        font-weight: normal;
        line-height: 18px;
        text-align: center;
        text-shadow: 0 1px 0 #ffffff;
        vertical-align: middle;
        background-color: #eeeeee;
        border: 1px solid #ccc;
        margin-left: -5px;
        margin-right: -5px;
    }


</style>

<script type="text/javascript">

    function add_attribute_row(copy = false,content = null) {

        if (!copy) {

            $(`.attributes_table`).append('<div class="attribute-content-div"><div class="attribute full-res" style="width: 42%;">\n' +
                '\n' +
                '                                        <div style="display: flex;align-items: center;">\n' +
                '                                            <div style="width: 100%;"><textarea class="form-control attribute_description" style="width: 90%;border-radius: 7px;resize: vertical;height: 40px;outline: none;" name="attribute_description[]"></textarea></div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="attribute width-box" style="width: 20%;">\n' +
                '\n' +
                '                                        <div class="m-box">\n' +
                '                                            <input style="border: 1px solid #ccc;" id="width" class="form-control width m-input" maskedformat="9,1" autocomplete="off" name="width[]" type="text">\n' +
                '                                            <input style="border: 0;outline: none;" value="cm" readonly="" type="text" name="width_unit[]" class="measure-unit">\n' +
                '                                        </div>\n' +
                '\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="attribute height-box" style="width: 20%;">\n' +
                '\n' +
                '                                        <div class="m-box">\n' +
                '                                            <input style="border: 1px solid #ccc;" id="height" class="form-control height m-input" maskedformat="9,1" autocomplete="off" name="height[]" type="text">\n' +
                '                                            <input style="border: 0;outline: none;" value="cm" readonly="" type="text" name="height_unit[]" class="measure-unit">\n' +
                '                                        </div>\n' +
                '\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="attribute last-content" style="padding: 0;width: 18%;">\n' +
                '                                        <div class="res-white" style="display: flex;justify-content: flex-start;align-items: center;width: 100%;">\n' +
                '\n' +
                '                                            <span id="next-row-span" class="add-attribute-row" style="cursor: pointer;font-size: 20px;margin-left: 10px;width: 20px;height: 20px;line-height: 20px;">\n' +
                '                                                <i id="next-row-icon" class="fa fa-fw fa-plus"></i>\n' +
                '                                            </span>\n' +
                '\n' +
                '                                            <span id="next-row-span" class="remove-attribute-row" style="cursor: pointer;font-size: 20px;margin-left: 10px;width: 20px;height: 20px;line-height: 20px;">\n' +
                '                                                <i id="next-row-icon" class="fa fa-fw fa-trash-o"></i>\n' +
                '                                            </span>\n' +
                '\n' +
                '                                            <span id="next-row-span" class="copy-attribute-row" style="cursor: pointer;font-size: 20px;margin: 0 10px;width: 20px;height: 20px;line-height: 20px;">\n' +
                '                                                <i id="next-row-icon" class="fa fa-fw fa-copy"></i>\n' +
                '                                            </span>\n' +
                '\n' +
                '                                        </div>\n' +
                '                                    </div></div>');
        }
        else {

            $(`.attributes_table`).append('<div class="attribute-content-div"></div>\n');
            content.appendTo(`.attributes_table .attribute-content-div:last`);
        }
    }

    $(document).on('click', '.add-attribute-row', function () {

        add_attribute_row(false);

    });

    $(document).on('click', '.copy-attribute-row', function () {

        var current = $(this).parents('.attribute-content-div');
        var content = current.children().clone();

        add_attribute_row(true, content);

    });

    $(document).on('click', '.remove-attribute-row', function () {

        var current = $(this).parents('.attribute-content-div');
        var count = $(".attributes_table .attribute-content-div").length;


        if (count != 1) {

            current.remove();

        }

    });

    $(document).on('change','.files-upload', function(e){
        var names = [];
        var length = $(this).get(0).files.length;

        if(length > 2)
        {
            $('.file-text').css('border','1px solid red');
            $('.file-error').show();
            $(this).closest('.form-group').find('.form-control').attr("value",'');
        }
        else
        {
            $('.file-text').css('border','');
            $('.file-error').hide();

            for (var i = 0; i < $(this).get(0).files.length; ++i) {
                names.push($(this).get(0).files[i].name);
            }
            // $("input[name=file]").val(names);
            if(length>2){
                var fileName = names.join(', ');
                $(this).closest('.form-group').find('.form-control').attr("value",length+" files selected");
            }
            else{
                $(this).closest('.form-group').find('.form-control').attr("value",names);
            }
        }
    });


    $("#quote-zipcode").on('input',function(e){
        $(this).next('input').val(0);
    });

    $("#quote-zipcode").focusout(function(){

        var check = $(this).next('input').val();

        if(check == 0)
        {
            $(this).val('');
            $('#postcode').val('');
            $("#city").val('');
        }
    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $.fn.datepicker.dates['du'] = {
            days: ["zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag"],
            daysShort: ["zo", "ma", "di", "wo", "do", "vr", "za"],
            daysMin: ["zo", "ma", "di", "wo", "do", "vr", "za"],
            months: ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"],
            monthsShort: ["jan", "feb", "mrt", "apr", "mei", "jun", "jul", "aug", "sep", "okt", "nov", "dec"],
        };

        $('#quote_delivery').datepicker({

            format: 'dd-mm-yyyy',
            startDate: new Date(),
            language: 'du'

        });

    });

</script>

<script type="text/javascript">

    $(document).on('keypress', ".width, .height", function (e) {

        e = e || window.event;
        var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
        var val = String.fromCharCode(charCode);

        if (!val.match(/^[0-9]*\,?[0-9]*$/))  // For characters validation
        {
            e.preventDefault();
            return false;
        }

        if (e.which == 44) {
            if (this.value.indexOf(',') > -1) {
                e.preventDefault();
                return false;
            }
        }

        var num = $(this).attr("maskedFormat").toString().split(',');
        var regex = new RegExp("^\\d{0," + num[0] + "}(\\,\\d{0," + num[1] + "})?$");
        if (!regex.test(this.value)) {
            this.value = this.value.substring(0, this.value.length - 1);
        }

    });

    $(document).on('focusout', ".width, .height", function (e) {

        if ($(this).val().slice($(this).val().length - 1) == ',') {
            var val = $(this).val();
            val = val + '00';
            $(this).val(val);
        }
    });

    function select_model(id,measure)
    {
        $('#measure_type').val(measure);

        if(measure == 'M1' || measure == 'Custom Sized')
        {
            $('.attributes_table').addClass('active');
        }
        else
        {
            $('.attributes_table').removeClass('active');
        }

        $('.quote-model').val(id);
        $(".quote-model").trigger('change.select2');
        $('.quote_quantity').attr("placeholder", "Vul gewenste aantal "+measure+" in");

        $('.navbar a[href="#step1"]').trigger('click');
        $('.back').hide();
        $('.floor').show();
    }

    function select_product(product_id,category_id,brand_id,type_id,model_text,color_text)
    {
        if($('#step1').find('.floor-description').length == 0)
        {
            $('.quote-service').removeClass('quote_validation');
            $('.quote-category').addClass('quote_validation');
            $('.quote-brand').addClass('quote_validation');
            $('.quote-type').addClass('quote_validation');
            $('.quote-model').addClass('quote_validation');
            $('.quote-color').addClass('quote_validation');

            $('.unlinked-boxes').hide();
            $('.linked-boxes').show();
        }
        else
        {
            $('#quote-box').find('.unlinked-boxes').hide();
            $('#quote-box').find('.linked-boxes').show();
        }

        // $('#step1').children('.well').css('height','300px');
        $('.quote_delivery').attr("placeholder", "{{__('text.Select Delivery Date')}}");

        $('.quote-category').val(category_id);
        $(".quote-category").trigger('change.select2');

        $.ajax({
            type: "GET",
            data: "id=" + category_id,
            url: "<?php echo url('get-questions')?>",

            success: function (data) {

                $('#step2').children('.well').empty();

                var index_count = 0;

                $.each(data, function (index, val) {

                    if (data.length == index + 1) {
                        $('#step2').children('.well').append('<div style="margin-bottom: 20px;"></div>');
                    } else {
                        $('#step2').children('.well').append('<div style="margin-bottom: 40px;"></div>');
                    }

                    var last = $('#step2').children('.well').children().last('div');

                    last.append('<h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">' + val.title + '</h3><input type="hidden" name="questions[]" value="' + val.title + '">');

                    if (val.predefined == 1) {

                        last.append('<div class="checkbox_validation"><input name="predefined' + index + '" type="hidden" value="1"></div>');

                        $.each(val.answers, function (index1, val1) {

                            last.children('div').append('<hr>\n' +
                                '                                        <label class="container-checkbox">' + val1.title + '\n' +
                                '                                        <input name="answers' + index + '[]" type="checkbox" value="' + val1.title + '">\n' +
                                '                                        <span class="checkmark-checkbox"></span>\n' +
                                '                                        </label>');

                        });
                    } else {
                        if (val.placeholder) {
                            var placeholder = val.placeholder;
                        } else {
                            var placeholder = '';
                        }

                        last.append('<input name="predefined' + index + '" type="hidden" value="0">\n' +
                            '<textarea name="answers' + index + '" style="resize: vertical;" rows="1" class="form-control quote_validation" placeholder="' + placeholder + '"></textarea>');
                    }

                    index_count = index;

                });

                $('#step2').children('.well').append('<input type="hidden" name="index_count" value="' + index_count + '">');

                if(data.length == 0)
                {
                    $('#step2').children('.well').addClass('hide');
                }
                else
                {
                    $('#step2').children('.well').removeClass('hide');
                }

                /*$('#step2').children('div').children('h3').
                console.log(data);*/
            }
        });

        $.ajax({
            type: "GET",
            data: "id=" + category_id,
            url: "<?php echo url('/products-brands-by-category')?>",
            success: function (data) {

                var options = '';

                $.each(data, function (index, value) {

                    var opt = '<option value="' + value.id + '" >'+value.cat_name+'</option>';

                    options = options + opt;

                });

                $('.quote-model').find('option')
                    .remove()
                    .end()
                    .append('<option value="">{{__("text.Select Model")}}</option>');

                $('.quote-color').find('option')
                    .remove()
                    .end()
                    .append('<option value="">{{__("text.Select Color")}}</option>');

                $('.quote-type').find('option')
                    .remove()
                    .end()
                    .append('<option value="">{{__("text.Select Type")}}</option>');

                $('.quote-brand').find('option')
                    .remove()
                    .end()
                    .append('<option value="">{{__("text.Select Brand")}}</option>' + options);

                $('.quote-brand').val(brand_id);
                $(".quote-brand").trigger('change.select2');
                $(".quote-brand").trigger('change');

                $.ajax({
                    type: "GET",
                    data: "category_id=" + category_id + "&brand_id=" + brand_id,
                    url: "<?php echo url('/products-types-by-category-brand')?>",
                    success: function (data) {

                        var options = '';

                        $.each(data, function(index, value) {

                            var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';
                            options = options + opt;

                        });

                        $('.quote-type').find('option')
                            .remove()
                            .end()
                            .append('<option value="">{{__("text.Select Type")}}</option>' + options);

                        $('.quote-type').val(type_id);
                        $(".quote-type").trigger('change.select2');
                        $(".quote-type").trigger('change');

                        var options = '';
                        var options1 = '';

                        $.ajax({
                            type: "GET",
                            data: "category_id=" + category_id + "&brand_id=" + brand_id + "&type_id=" + type_id,
                            url: "<?php echo url('/products-models-colors-by-category-brand-type')?>",
                            success: function (data) {

                                var first = '';

                                $.each(data[0], function(index, value) {

                                    if(index == 0)
                                    {
                                        first = value.id;
                                    }

                                    var opt = '<option data-measure="'+value.measure+'" value="'+value.id+'" >'+value.model+'</option>';
                                    options = options + opt;

                                });

                                $.each(data[1], function(index, value) {

                                    var opt1 = '<option value="'+value.id+'" >'+value.title+'</option>';
                                    options1 = options1 + opt1;

                                });

                                $('.quote-model').find('option')
                                    .remove()
                                    .end()
                                    .append('<option value="">Select Model</option>' + options);

                                $('.quote-color').find('option')
                                    .remove()
                                    .end()
                                    .append('<option value="">Select Color</option>' + options1);

                                var flag_model = 0;


                                if(data[0].length <= 1)
                                {
                                    if($('.quote-category').find('option:selected').text() == 'Tapijt' || $('.quote-category').find('option:selected').text() == 'Vloerkleden')
                                    {
                                        $('.model-box').show();
                                    }
                                    else
                                    {
                                        $('.model-box').hide();
                                    }

                                    flag_model = 1;

                                }
                                else
                                {
                                    $('.model-box').show();
                                }

                                if(model_text)
                                {
                                    var model_id = $('.quote-model option').filter(function () { return $(this).html() == model_text; }).val();
                                    $('.quote-model').val(model_id);
                                    $(".quote-model").trigger('change.select2');
                                    var measure = $('.quote-model').eq(0).find(':selected').data('measure');
                                    select_model(model_id,measure);
                                }
                                else
                                {
                                    if(flag_model)
                                    {
                                        $('.quote-model').val(first);
                                        $(".quote-model").trigger('change.select2');
                                        var measure = $('.quote-model').eq(0).find(':selected').data('measure');
                                        select_model(first,measure);
                                    }
                                }


                                var color_id = $('.quote-color option').filter(function () { return $(this).html() == color_text; }).val();
                                $('.quote-color').val(color_id);
                                $(".quote-color").trigger('change.select2');
                                $(".quote-color").trigger('change');

                            }
                        });

                    }
                });

            }
        });

        $('.navbar a[href="#step1"]').trigger('click');

        $('.floor').show();
        $('.next').show();
        $('.next-submit').hide();
        $('.back').hide();
    }

    function fetch_products(category_id,brand_id,product_id = null)
    {
        var options = '';

        $.ajax({
            type:"GET",
            data: "category_id=" + category_id + "&brand_id=" + brand_id ,
            url: "<?php echo url('/products-by-category-brand')?>",
            success: function(data) {

                $.each(data, function(index, value) {

                    var opt = '<option value="'+value.id+'" >'+value.title+'</option>';

                    options = options + opt;

                });

                $('.quote-model').find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Model</option>');

                $('.quote-color').find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Color</option>');

                $('.products-dropdown').find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Product</option>'+options);

                if(product_id)
                {
                    $('.products-dropdown').val(product_id);
                }

            }
        });
    }

    $(document).ready(function () {

        $('.quote-model-number').keyup(function() {

            $('.quote-model-number').val($(this).val());

        });

        $('.quote-model').change(function() {

            var id = $(this).val();
            var measure = $(this).find(':selected').data('measure');

            select_model(id,measure);

        });

        $('.quote-color').change(function() {

            var id = $(this).val();

            $('.quote-color').val(id);

            $(".quote-color").trigger('change.select2');

            $('.navbar a[href="#step1"]').trigger('click');

            $('.back').hide();
            $('.floor').show();

        });

        $('.quote-brand').change(function() {

            $('.quote-brand').val($(this).val());

            $(".quote-brand").trigger('change.select2');

            $('.navbar a[href="#step1"]').trigger('click');

            $('.back').hide();
            $('.floor').show();

            var category_id = $('.quote-category').val();
            var brand_id = $(this).val();
            var options = '';

            $.ajax({
                type: "GET",
                data: "category_id=" + category_id + "&brand_id=" + brand_id,
                url: "<?php echo url('/products-types-by-category-brand')?>",
                success: function (data) {

                    $.each(data, function(index, value) {

                        var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';
                        options = options + opt;

                    });

                    $('.quote-type').find('option')
                        .remove()
                        .end()
                        .append('<option value="">{{__("text.Select Type")}}</option>' + options);

                    $('.quote-model').find('option')
                        .remove()
                        .end()
                        .append('<option value="">{{__("text.Select Model")}}</option>');

                    $('.quote-color').find('option')
                        .remove()
                        .end()
                        .append('<option value="">{{__("text.Select Color")}}</option>');

                }
            });

            // fetch_products(category_id,brand_id);

        });

        $('.quote-type').change(function() {

            $('.quote-type').val($(this).val());

            $(".quote-type").trigger('change.select2');

            $('.navbar a[href="#step1"]').trigger('click');

            $('.back').hide();
            $('.floor').show();

            var category_id = $('.quote-category').val();
            var brand_id = $('.quote-brand').val();
            var type_id = $(this).val();

            var options = '';
            var options1 = '';

            $.ajax({
                type: "GET",
                data: "category_id=" + category_id + "&brand_id=" + brand_id + "&type_id=" + type_id,
                url: "<?php echo url('/products-models-colors-by-category-brand-type')?>",
                success: function (data) {

                    var first = '';

                    $.each(data[0], function(index, value) {

                        if(index == 0)
                        {
                            first = value.id;
                        }

                        var opt = '<option data-measure="'+value.measure+'" value="'+value.id+'" >'+value.model+'</option>';
                        options = options + opt;

                    });

                    $.each(data[1], function(index, value) {

                        var opt1 = '<option value="'+value.id+'" >'+value.title+'</option>';
                        options1 = options1 + opt1;

                    });

                    $('.quote-model').find('option')
                        .remove()
                        .end()
                        .append('<option value="">{{__("text.Select Model")}}</option>' + options);

                    $('.quote-color').find('option')
                        .remove()
                        .end()
                        .append('<option value="">{{__("text.Select Color")}}</option>' + options1);

                    if(data[0].length <= 1)
                    {
                        if($('.quote-category').find('option:selected').text() == 'Tapijt' || $('.quote-category').find('option:selected').text() == 'Vloerkleden')
                        {
                            $('.model-box').show();
                        }
                        else
                        {
                            $('.model-box').hide();
                        }

                        $('.quote-model').val(first);
                        $(".quote-model").trigger('change.select2');
                        var measure = $('.quote-model').eq(0).find(':selected').data('measure');
                        select_model(first,measure);
                    }
                    else
                    {
                        $('.model-box').show();
                    }

                }
            });

            // fetch_products(category_id,brand_id);

        });

        $('.products-dropdown').change(function() {

            $('.products-dropdown').val($(this).val());

            $(".products-dropdown").trigger('change.select2');

            $('.navbar a[href="#step1"]').trigger('click');

            $('.back').hide();
            $('.floor').show();

            var product_id = $(this).val();
            var options = '';
            var options1 = '';

            $.ajax({
                type:"GET",
                data: "product_id=" + product_id,
                url: "<?php echo url('/products-models-colors-by-product')?>",
                success: function(data) {

                    $.each(data, function(index, value) {

                        $.each(value.models, function(index1, value1) {

                            var opt = '<option value="'+value1.id+'" >'+value1.model+'</option>';

                            options = options + opt;

                        });

                        $.each(value.colors, function(index2, value2) {

                            var opt1 = '<option value="'+value2.id+'" >'+value2.title+'</option>';

                            options1 = options1 + opt1;

                        });

                    });

                    $('.quote-model').find('option')
                        .remove()
                        .end()
                        .append('<option value="">{{__("text.Select Model")}}</option>' + options);

                    $('.quote-color').find('option')
                        .remove()
                        .end()
                        .append('<option value="">{{__("text.Select Color")}}</option>' + options1);

                }
            });

        });

        $('.quote-category').change(function(){

            $('.quote-service').val('');

            $(".quote-service").trigger('change.select2');

            $('.quote-category').val($(this).val());

            $(".quote-category").trigger('change.select2');

            $('.navbar a[href="#step1"]').trigger('click');

            $('.back').hide();

            if($(this).val() == 'Diensten')
            {
                $('.floor-description').remove();
                $('.floor').hide();
                $('.quote_delivery').attr("placeholder", "{{__('text.Select Installation Date')}}");

                if($('#step1').find('.floor-description').length == 0)
                {
                    $('.linked-boxes').hide();
                    $('.unlinked-boxes').show();

                    $('.quote-service').addClass('quote_validation');
                    $('.quote-category').removeClass('quote_validation');
                    $('.quote-brand').removeClass('quote_validation');
                    $('.quote-type').removeClass('quote_validation');
                    $('.quote-model').removeClass('quote_validation');
                    $('.quote-color').removeClass('quote_validation');
                }
                else
                {
                    $('#quote-box').find('.linked-boxes').hide();
                    $('#quote-box').find('.unlinked-boxes').show();
                }

            }
            else
            {
                $('.floor').show();
                var category_id = $(this).val();
                var options = '';
                $('.quote_delivery').attr("placeholder", "{{__('text.Select Delivery Date')}}");

                if($('#step1').find('.floor-description').length == 0)
                {
                    $('.quote-service').removeClass('quote_validation');
                    $('.quote-category').addClass('quote_validation');
                    $('.quote-brand').addClass('quote_validation');
                    $('.quote-type').addClass('quote_validation');
                    $('.quote-model').addClass('quote_validation');
                    $('.quote-color').addClass('quote_validation');

                    $('.unlinked-boxes').hide();
                    $('.linked-boxes').show();

                    $.ajax({
                        type:"GET",
                        data: "id=" + category_id ,
                        url: "<?php echo url('/products-brands-by-category')?>",
                        success: function(data) {

                            $.each(data, function(index, value) {

                                var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';

                                options = options + opt;

                            });

                            $('.quote-model').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Model")}}</option>');

                            $('.quote-color').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Color")}}</option>');

                            $('.quote-type').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Type")}}</option>');

                            $('.quote-brand').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Brand")}}</option>'+options);

                        }
                    });

                }
                else
                {
                    $('#quote-box').find('.unlinked-boxes').hide();
                    $('#quote-box').find('.linked-boxes').show();

                    $.ajax({
                        type:"GET",
                        data: "id=" + category_id ,
                        url: "<?php echo url('/products-brands-by-category')?>",
                        success: function(data) {

                            $.each(data, function(index, value) {

                                var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';

                                options = options + opt;

                            });

                            $('.quote-type').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Type")}}</option>');

                            $('.quote-model').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Model")}}</option>');

                            $('.quote-color').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Color")}}</option>');

                            // $('.products-dropdown').find('option')
                            //     .remove()
                            //     .end()
                            //     .append('<option value="">Select Product</option>');

                            $('.quote-brand').find('option')
                                .remove()
                                .end()
                                .append('<option value="">{{__("text.Select Brand")}}</option>'+options);

                        }
                    });

                }

                $.ajax({
                    type:"GET",
                    data: "id=" + category_id,
                    url: "<?php echo url('get-questions')?>",

                    success: function(data) {

                        $('#step2').children('.well').empty();

                        var index_count = 0;

                        $.each(data, function (index, val) {

                            if(data.length == index + 1)
                            {
                                $('#step2').children('.well').append('<div style="margin-bottom: 20px;"></div>');
                            }
                            else
                            {
                                $('#step2').children('.well').append('<div style="margin-bottom: 40px;"></div>');
                            }

                            var last = $('#step2').children('.well').children().last('div');

                            last.append('<h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">'+val.title+'</h3><input type="hidden" name="questions[]" value="'+val.title+'">');

                            if(val.predefined == 1)
                            {

                                last.append('<div class="checkbox_validation"><input name="predefined'+index+'" type="hidden" value="1"></div>');

                                $.each(val.answers, function (index1, val1) {

                                    last.children('div').append('<hr>\n' +
                                        '                                        <label class="container-checkbox">'+val1.title+'\n' +
                                        '                                        <input name="answers'+index+'[]" type="checkbox" value="'+val1.title+'">\n' +
                                        '                                        <span class="checkmark-checkbox"></span>\n' +
                                        '                                        </label>');

                                });
                            }
                            else
                            {
                                if(val.placeholder)
                                {
                                    var placeholder = val.placeholder;
                                }
                                else
                                {
                                    var placeholder = '';
                                }

                                last.append('<input name="predefined'+index+'" type="hidden" value="0">\n'+
                                    '<textarea name="answers'+index+'" style="resize: vertical;" rows="1" class="form-control quote_validation" placeholder="'+placeholder+'"></textarea>');
                            }

                            index_count = index;

                        });

                        $('#step2').children('.well').append('<input type="hidden" name="index_count" value="'+index_count+'">');

                        if(data.length == 0)
                        {
                            $('#step2').children('.well').addClass('hide');
                        }
                        else
                        {
                            $('#step2').children('.well').removeClass('hide');
                        }

                        /*$('#step2').children('div').children('h3').
                        console.log(data);*/
                    }
                });
            }

        });

        $('.quote-service').change(function(){

            $('.quote-service').val($(this).val());

            $(".quote-service").trigger('change.select2');

            $('.navbar a[href="#step1"]').trigger('click');

            $('.back').hide();
            $('.floor').show();

            var service_id = $(this).val();
            var options = '';

            $.ajax({
                type:"GET",
                data: "id=" + service_id,
                url: "<?php echo url('get-service-questions')?>",

                success: function(data) {

                    $('#step2').children('.well').empty();

                    var index_count = 0;

                    $.each(data, function (index, val) {

                        if(data.length == index + 1)
                        {
                            $('#step2').children('.well').append('<div style="margin-bottom: 20px;"></div>');
                        }
                        else
                        {
                            $('#step2').children('.well').append('<div style="margin-bottom: 40px;"></div>');
                        }

                        var last = $('#step2').children('.well').children().last('div');

                        last.append('<h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">'+val.title+'</h3><input type="hidden" name="questions[]" value="'+val.title+'">');

                        if(val.predefined == 1)
                        {

                            last.append('<div class="checkbox_validation"><input name="predefined'+index+'" type="hidden" value="1"></div>');

                            $.each(val.answers, function (index1, val1) {

                                last.children('div').append('<hr>\n' +
                                    '                                        <label class="container-checkbox">'+val1.title+'\n' +
                                    '                                        <input name="answers'+index+'[]" type="checkbox" value="'+val1.title+'">\n' +
                                    '                                        <span class="checkmark-checkbox"></span>\n' +
                                    '                                        </label>');

                            });
                        }
                        else
                        {
                            if(val.placeholder)
                            {
                                var placeholder = val.placeholder;
                            }
                            else
                            {
                                var placeholder = '';
                            }

                            last.append('<input name="predefined'+index+'" type="hidden" value="0">\n'+
                                '<textarea name="answers'+index+'" style="resize: vertical;" rows="1" class="form-control quote_validation" placeholder="'+placeholder+'"></textarea>');
                        }

                        index_count = index;

                    });

                    $('#step2').children('.well').append('<input type="hidden" name="index_count" value="'+index_count+'">');

                    if(data.length == 0)
                    {
                        $('#step2').children('.well').addClass('hide');
                    }
                    else
                    {
                        $('#step2').children('.well').removeClass('hide');
                    }

                    /*$('#step2').children('div').children('h3').
                    console.log(data);*/
                }
            });

        });

        $(".quote_quantity").keypress(function(e){

            e = e || window.event;
            var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
            var val = String.fromCharCode(charCode);

            if (!val.match(/^[0-9]*\,?[0-9]*$/))  // For characters validation
            {
                e.preventDefault();
                return false;
            }

            if(e.which == 44)
            {
                if(this.value.indexOf(',') > -1)
                {
                    e.preventDefault();
                    return false;
                }
            }

            var num = $(this).attr("maskedFormat").toString().split(',');
            var regex = new RegExp("^\\d{0," + num[0] + "}(\\,\\d{0," + num[1] + "})?$");
            if (!regex.test(this.value)) {
                this.value = this.value.substring(0, this.value.length - 1);
            }

        });

        $(".quote_quantity").on('focusout',function(e){
            if($(this).val().slice($(this).val().length - 1) == ',')
            {
                var val = $(this).val();
                val = val + '00';
                $(this).val(val);
            }
        });

        $(".quote_quantity").on('input',function(e) {

            var max = parseInt($(this).attr('max'));
            var min = parseInt($(this).attr('min'));
            var value = $(this).val();
            value = value.toString();
            value = value.replace(/\,/g, '.');
            value = parseFloat(value);

            if (value > max)
            {
                $(this).val(max);
            }
            else if (value < min)
            {
                $(this).val(min);
            }

            $('#quantity').val($(this).val());
        });

        $('.next-submit').click(function(){

            var validation = $('.tab-content').find('.active').find('.quote_validation');

            var flag = 0;

            if($('.tab-content').find('.active').find('.permission_validation').length > 0)
            {
                if($('.tab-content').find('.active').find('.permission_validation:checked').length < 1)
                {
                    $('.permission-checkbox').css('border','1px solid red');
                    flag = 1;
                }
                else
                {
                    $('.permission-checkbox').css('border','');
                }
            }

            $(validation).each(function(){

                if(!$(this).val())
                {
                    $(this).css('border','1px solid red');
                    flag = 1;
                }
                else
                {
                    $(this).css('border','');
                }

            });

            if(!flag)
            {
                $('#quote_form').submit();
            }

            return false;
        });

        $('.floor').click(function(){


            if($('#step1').find('.floor-description').length == 0)
            {
                $('#step1').find('.well').find('.duo-boxes').first().after('<div style="margin-bottom: 40px;" class="floor-description"><h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">{{__('text.Provide description of floors heading')}}</h3>\n' +
                    '\n' +
                    '                                <textarea style="resize: vertical;" rows="7" name="floor_description" class="form-control quote_validation" placeholder="{{__('text.Provide description of floors')}}"></textarea></div>');

                $('.well').find(".linked-boxes").each(function(i,obj) {

                    $(obj).find('.quote_validation').removeClass('quote_validation');

                    $(obj).find('select').val('');
                    $(obj).find('select').trigger('change.select2');
                    $(obj).find('input').val('');

                });

                $('.well').find(".unlinked-boxes").each(function(i,obj) {

                    $(obj).find('.quote_validation').removeClass('quote_validation');

                    $(obj).find('select').val('');
                    $(obj).find('select').trigger('change.select2');
                    $(obj).find('input').val('');

                });

                $('.well').find(".linked-boxes").hide();
                $('.well').find(".unlinked-boxes").hide();

            }

        });

        $('.next').click(function(){

            var files_length = $('.files-upload').get(0).files.length;

            var validation = $('.tab-content').find('.active').find('.quote_validation');
            var checkbox_validation = $('.tab-content').find('.active').find('.checkbox_validation');

            var flag = 0;
            var flag1 = 0;

            $(checkbox_validation).each(function(){

                if($(this).children().find('input:checkbox:checked').length < 1)
                {
                    flag1 = 1;
                }

            });

            if(flag1)
            {
                alert('{{__("text.You haven't answered all the questions yet. Scroll down to answer the other questions.")}}');
            }

            $(validation).each(function(){

                if(!$(this).val())
                {
                    if($(this).hasClass('files-upload'))
                    {
                        $('.file-text').css('border','1px solid red');
                    }
                    else if($(this).hasClass('select2-hidden-accessible'))
                    {
                        $(this).next().css('border','1px solid red');
                    }
                    else
                    {
                        $(this).css('border','1px solid red');
                    }

                    flag = 1;
                }
                else
                {
                    if($(this).hasClass('files-upload'))
                    {
                        if(files_length > 2)
                        {
                            $('.file-text').css('border','1px solid red');

                            flag = 1;
                        }
                        else
                        {
                            $('.file-text').css('border','');
                        }
                    }
                    $(this).next().css('border','');
                    $(this).css('border','');
                }

            });

            if(flag == 0 && flag1 == 0)
            {

                if($('.files-upload').hasClass('quote_validation'))
                {
                    var nextId = $('.tab-content').find('.active').next().attr("id");

                    if(nextId == 'step2')
                    {
                        nextId = 'step3';
                    }
                }
                else
                {
                    var nextId = $('.tab-content').find('.active').next().attr("id");
                }

                $('.nav-pills a[href="#' + nextId + '"]').tab('show');

                $('.floor').hide();
                $('.back').show();

                if(nextId == 'step4')
                {
                    $('.next').hide();
                    $('.next-submit').show();

                }
            }

            return false;

        });

        $('.back').click(function(){

            $('.next').show();
            $('.next-submit').hide();

            if($('.files-upload').hasClass('quote_validation'))
            {
                var backId = $('.tab-content').find('.active').prev().attr("id");

                if(backId == 'step2')
                {
                    backId = 'step1';
                }
            }
            else
            {
                var backId = $('.tab-content').find('.active').prev().attr("id");
            }

            $('.nav-pills a[href="#' + backId + '"]').tab('show');

            if(backId == 'step1')
            {
                $('.back').hide();
                $('.floor').show();
            }


            return false;

        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

            //update progress

            if($('.files-upload').hasClass('quote_validation'))
            {
                var step = $(e.target).data('step');

                if(step != 1)
                {
                    step = step - 1;
                }

                var percent = (parseInt(step) / 3) * 100;
            }
            else
            {
                var step = $(e.target).data('step');
                var percent = (parseInt(step) / 4) * 100;
            }

            $('.progress-bar').css({width: percent + '%'});
            $('.progress-bar').text("{{__('text.Step')}} " + step);

            //e.relatedTarget // previous tab

        });

        $('.first').click(function(){

            $('#myWizard a:first').tab('show')

        });

        $('.menuLi1').click(function () {
            $(".menuUl").css("display", 'none');
        });

        $('.menuLi').click(function () {
            $(".menuUl1").css("display", 'none');
        });

    });

    $(document).on('mouseover', '.lang-list', function () {
        $(this).find('.bootstrap-select').addClass('open');
    });

    function formSubmit(e) {
        var value = $(e).data('value');

        $('.lang_select').val(value);

        $('#lang-form').submit();
    }

    $(".js-data-example-ajax8").select2({
        width: '100%',
        height: '200px',
        placeholder: "{{__('text.Select Color')}}",
        allowClear: true,
        dropdownParent: $('#aanvragen'),
        "language": {
            "noResults": function(){
                return '{{__('text.No results found')}}';
            }
        },

    });

    $(".js-data-example-ajax13").select2({
        width: '100%',
        height: '200px',
        placeholder: "{{__('text.Select Type')}}",
        allowClear: true,
        dropdownParent: $('#aanvragen'),
        "language": {
            "noResults": function(){
                return '{{__('text.No results found')}}';
            }
        },

    });

</script>

<!-- Ending of Header area -->

<style type="text/css">

    .slicknav_btn {
        width: 35px;
        display: flex;
        justify-content: center;
    }

    .slicknav_menu .slicknav_icon {
        height: auto;
        width: auto;
    }

    button {
        outline: none !important;
    }

    .bootstrap-select .dropdown-menu {
        padding: 0 !important;
        min-width: auto !important;
        margin: 0;
    }

    .selected {
        background-color: #ececec;
        padding: 10px !important;
    }

    @media only screen and (max-width: 1390px) {

        .container {

            width: 100% !important;


        }
    }

    @media only screen and (max-width: 1225px) {

        .dropdown-close {
            display: none;
        }

        .lang-list {

            width: 98% !important;
        }

        .mainmenu {

            display: none;


        }

        .new_cart {
            display: inline-block !important;
        }


        .logo {
            position: absolute;
            color: #fff;
            top: -20px;
            right: 17px;
        }

        .logo img {
            height: 50px !important;
        }

        #logo-div {
            width: 100%;
        }

        .border-line {
            width: 98% !important;
        }

        .cart-logo div span a i {
            font-size: 24px !important;
            line-height: 0.7 !important;
        }

        .header-area-wrapper {

            padding: 30px 0;
        }

        .slicknav_menu {

            display: block;
            background-color: transparent;
            position: absolute;
            left: 0;
            top: -12px;
            z-index: 99;
            width: 100%;
        }


        .language-select {

            width: 100% !important;
            text-align: center;
            margin-top: 25px !important;
        }

        .bootstrap-select.fit-width {
            width: auto !important;
        }

        .bootstrap-select .dropdown-menu {
            position: relative;
        }


    }


    @media only screen and (max-width: 1100px) {

        .top-social-links li {
            padding-top: 8px !important;
            padding-bottom: 8px !important;
        }

    }

    .bootstrap-select {
        margin-bottom: 0px !important;
    }

    .lang-form .bootstrap-select .selectpicker {
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

    @media (min-width: 1200px) {

        .col-lg-4 {
            width: 25%;
        }
    }

    @media (min-width: 1200px) {

        .col-lg-8 {
            width: 75%;
        }
    }


    .pulse .p1[data-count]:after {
        position: absolute;
        right: 5%;
        top: -25%;
        content: attr(data-count);
        font-size: 40%;
        padding: .2em;
        border-radius: 50%;
        line-height: 1em;
        color: white;
        background: rgba(255, 0, 0, .85);
        text-align: center;
        min-width: 1.5em;
    / / font-weight: bold;
    }

    /***** Pulse *****/

    .pulse span:hover {
        animation: pulse 1s;
        animation-timing-function: linear;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(2.1);
        }
        100% {
            transform: scale(2);
        }
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
                                <button type="submit" class="btn"
                                        style="margin-left: 10px;margin-top: 2px;width: 25%;padding: 0;">{{$lang->s}}</button>
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
                            <li><a href="{{route('front.index')}}"><i class="fa fa-caret-right"></i>
                                    &nbsp;{{$lang->home}}</a></li>
                            @if($ps->a_status == 1)
                                <li><a href="{{route('front.about')}}"><i class="fa fa-caret-right"></i>
                                        &nbsp;{{$lang->about}}</a></li>
                            @endif
                            @if($ps->f_status == 1)
                                <li><a href="{{route('front.faq')}}"><i class="fa fa-caret-right"></i>
                                        &nbsp;{{$lang->faq}}</a></li>
                            @endif
                            @if($ps->c_status == 1)
                                <li><a href="{{route('front.contact')}}"><i class="fa fa-caret-right"></i>
                                        &nbsp;{{$lang->contact}}</a></li>
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
                                    <img style="height: 30px;" src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                    <span><a
                                                href="{{route('front.blogshow',$lblog->title)}}">{{$lblog->title}}</a></span>
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

    .contact-info div {
        margin-left: 20px;
    }

    button {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

 border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>


}

    input[type=submit] {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

 border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>


}

    .btn-cyan {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

 border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

}

    .hero-btn {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

 border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

}

    .footer-social-links li a {
        background-color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>

 border-color:
        <?php if($gs->btn_brd != null) { echo $gs->btn_brd. ' !important;'; } else { echo '#ffffff00 !important;'; } ?>

color: <?php if($gs->btn_col != null) { echo $gs->btn_col. ' !important;'; } else { echo '#fff !important;'; } ?>

 border-left: 1.5px solid;
    }

    .hero-form {
        background-color: <?php if($gs->form_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->form_bg. ' !important;'; } ?>

 color:
        <?php if($gs->form_col != null) { echo $gs->form_col. ' !important;'; } else { echo 'black !important;'; } ?>
border: 11px solid<?php if($gs->form_ic == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->form_ic. ' !important;'; } ?>;
    }

    .hero-form-wrapper .input-group-addon {
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

    .arrow1 {

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

    .team_style2 .team_common:hover .member_info .content {
        color: white;
    }

    .team_style2 .member_info .overlay1 {

        background: #f7f7f7 none repeat scroll 0 0;

    }

    .team_style2 .member_info .overlay2 {

        background: #f7f7f7 none repeat scroll 0 0;

    }

    .team_style2 .team_common:hover .member_info .overlay2 {

        background: {{$gs->colors == null ? '#f3bd02':$gs->colors}} none repeat scroll 0 0;

    }

    .team_style2 .team_common:hover .member_info .content1 {

        color: white;

    }

    .team_style2 .team_common:hover .member_info .change1 {

        color: white;

    }

    .team_style2 .team_common:hover .member_info .link1 {

        color: white !important;

    }


    .team_style2 .team_common:hover .member_info .next1 {
        background-color: #f7f7f7;
    }


    .team_style2 .team_common:hover .member_info .next1 span {
        color: black;
    }

    .content1 {
        color: black;
    }

    .change1 {
        color: black;
    }

    .link1 {
        color: black !important;
    }

    .mainmenu li li a {
        font-size: 15px;
    }

    .mainmenu li a {
        color: <?php if($gs->menu_tx == null) { echo 'black;'; } else { echo $gs->menu_tx. ' !important;'; } ?>;
    }


    .slicknav_nav li a {
        color: <?php if($gs->menu_mobile_tx == null) { echo 'black;'; } else { echo $gs->menu_mobile_tx. ' !important;'; } ?>;
    }

    .cl-btn {
        background-color: transparent !important;
    }

</style>


<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/front/js/wow.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js?v=1.1') }}"></script>
{!! $seo->google_analytics !!}
<script type="text/javascript">
    $(window).load(function () {
        setTimeout(function () {
            $('#cover').fadeOut(1000);
        }, 1000)
    });
</script>

@yield('scripts')

</body>
</html>
