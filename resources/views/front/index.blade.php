@extends('layouts.front')

@section('keywords', $seo->meta_keys)

@section('styles')
    <style type="text/css">
        /* Hide the list on focus of the input field */
        datalist {
            display: none;
        }
        /* specifically hide the arrow on focus */
        input::-webkit-calendar-picker-indicator {
            display: none;
        }

        @media (max-width: 767px)
        {
            .video-box video
            {
                width: 95% !important;
            }
        }

        .elementor-row
        {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .elementor-col-50
        {
            width: 50%;
        }

        .elementor-widget-wrap
        {
            padding: 90px 60px 90px 0;
            display: flex;
            align-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .elementor-column-wrap
        {
            max-width: 630px;
            float: right;
        }

        .elementor-widget-container1
        {
            margin: 20px 0 30px 0;
            padding: 0;
        }

        .elementor-icon-list-item
        {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .elementor-icon-list-icon
        {
            text-align: left;
            display: flex;
        }

        .elementor-icon-list-icon i
        {
            color: white;
            width: 1.25em;
            font-size: 9px;
        }

        .elementor-icon-list-text
        {
            padding-left: 5px;
            color: white;
            font-size: 18px;
            font-weight: 400;
            font-family: sans-serif;
        }

        .elementor-element
        {
            width: 100%;
        }

        @media screen and (max-width: 1200px)
        {
            .ex-row
            {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 992px)
        {
            .elementor-column-wrap
            {
                float: none;
                margin: auto;
            }

            .elementor-widget-wrap
            {
                padding: 90px 0;
            }
        }

        @media only screen and (max-width: 767px)
        {
            .elementor-widget-wrap
            {
                padding: 90px 20px;
            }
        }

        @media screen and (max-width: 991px)
        {
            .third-head
            {
                font-size: 17px !important;
                line-height: 1.6 !important;
                padding: 20px;
            }

            .ex-row
            {
                width: 90% !important;
                display: block !important;
            }

            .ex-box
            {
                margin-bottom: 20px;
                float: left !important;
            }
        }

        @media (min-width: 1200px)
        {
            .col-lg1-4
            {
                width: 33.33333333%;
            }
        }

        .main-form
        {
            background-color: {{($gs->form_bg == null) ? (($gs->colors == null) ? '#f3bd02 !important;' : $gs->colors.' !important;') : $gs->form_bg. ' !important;' }};
            color: {{($gs->form_col != null) ? $gs->form_col. ' !important;' : 'black !important;' }};
            border: 1px solid {{($gs->form_ic == null) ? (($gs->colors == null) ? '#f3bd02 !important;' : $gs->colors.' !important;') : $gs->form_ic. ' !important;' }};
        }

        @media (max-width: 767px)
        {
            .btn-box
            {
                display: block !important;
            }

            .btn-box div
            {
                margin: 20px 0;
            }
        }

        .p-btns
        {
            padding: 20px 15px;
            text-align: center;
            font-size: 14px;
            -webkit-transition: opacity .45s cubic-bezier(0.25,1,0.33,1);
            transition: opacity .45s cubic-bezier(0.25,1,0.33,1);
            color: white;
            font-weight: 600;
            display: inline-block;
            width: 80%;
            border: 0;
            border-radius: 6px;
            background-color: {{($gs->form_bg == null) ? (($gs->colors == null) ? '#f3bd02 !important;' : $gs->colors.' !important;') : $gs->form_bg. ' !important;' }}
                        }

        .p-btns span
        {
            left: 0;
            display: inline-block;
            transform: translateX(0);
            -webkit-transform: translateX(0);
            transition: opacity .45s cubic-bezier(0.25,1,0.33,1),transform .45s cubic-bezier(0.25,1,0.33,1);
            -webkit-transition: opacity .45s cubic-bezier(0.25,1,0.33,1),transform .45s cubic-bezier(0.25,1,0.33,1);
            position: relative;
        }

        .p-btns:hover span
        {
            transform: translateX(-18px);
            -webkit-transform: translateX(-18px);
        }

        .p-btns i
        {
            text-decoration: none;
            background-color: transparent!important;
            top: 53% !important;
            right: 20% !important;
            font-size: 18px;
            line-height: 18px;
            width: 18px;
            position: absolute;
            margin-top: -9px;
            opacity: 0;
            transition: all .45s cubic-bezier(0.25,1,0.33,1);
            -webkit-transition: all .45s cubic-bezier(0.25,1,0.33,1);
            display: inline-block;
            word-spacing: 1px;
            text-align: center;
            vertical-align: middle;
            max-width: 100%;
        }

        .p-btns:hover i
        {
            opacity: 1;
        }

        .autocomplete ::-webkit-input-placeholder {
            text-align: center;
        }

        .autocomplete :-moz-placeholder { /* Firefox 18- */
            text-align: center;
        }

        .autocomplete ::-moz-placeholder {  /* Firefox 19+ */
            text-align: center;
        }

        .autocomplete :-ms-input-placeholder {
            text-align: center;
        }

        .autocomplete {
            position: relative;
            display: inline-block;
        }

        .quote-product {
            /*border: 1px solid transparent;*/
            background-color: #f1f1f1;
            padding: 10px;
            font-size: 16px;
        }

        .quote-product {
            background-color: #f1f1f1;
            width: 100%;
            height: 45px;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            /* border-bottom: none;
            border-top: none; */
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
            max-height: 230px;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        .autocomplete-items div:last-child
        {
            border-bottom: 0;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }

        .terms .checkmark-checkbox:after
        {
            left: 4px !important;
            top: 1.5px !important;
        }

        .container-checkbox {
            display: flex;
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            font-weight: 300;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            align-items: center;
            font-family: sans-serif;
            color: #353535;
        }

        /* Hide the browser's default radio button */
        .container-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom radio button */
        .checkmark-checkbox {
            position: absolute;
            /*top: 6.5px;*/
            left: 0;
            height: 20px;
            width: 20px;
            background-color: transparent;
            border: 1px solid #e5e5e5;
            border-radius: 2px;
        }

        /* On mouse-over, add a grey background color */
        .container-checkbox:hover input ~ .checkmark-checkbox {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .container-checkbox input:checked ~ .checkmark-checkbox {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark-checkbox:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container-checkbox input:checked ~ .checkmark-checkbox:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container-checkbox .checkmark-checkbox:after {
            left: 7px;
            top: 3.5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .pac-container
        {
            z-index: 1000000;
        }

        #quote-box .select2
        {
            /*width: 70% !important;
            float: left;*/
            border: 1px solid lightgrey;
        }

        @media (max-width: 1020px)
        {
            .t-h
            {
                display: none !important;
            }

            .c-h
            {
                border: 0 !important;
            }
        }

        @media (max-width: 500px)
        {

            .box-heading
            {
                font-size: 20px;
            }

            #quote-box
            {
                flex-wrap: wrap;
            }

            #quote-box div
            {
                width: 100% !important;
                /*margin: 5px;*/
                /*height: 45px;*/
            }

            #quote-box button
            {
                width: 100% !important;
                margin-top: 20px;
            }
        }

        @media (max-width: 767px)
        {
            #quote-con
            {
                margin-bottom: 30px;
            }
        }

        .well
        {
            box-shadow: none;
            margin-bottom: 0;
            background-color: #ffffff;
            border: 0;
            overflow-y: auto;
        }

        .well .select2
        {
            border: 1px solid #e1e1e1;
        }

    </style>
@endsection
@section('content')

    <div class="hero-area overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});z-index: auto;color: black;padding-top: 0;padding-bottom: 0;background-color: #ebebeb;">

        @if(Session::has('unsuccess'))

            <div class="alert alert-danger validation" style="position: absolute;top: 0px;width: 100%;background-color: #e53333;color: white;border: none;">

                <button type="button" class="close cl-btn" data-dismiss="alert" aria-label="Close" style="text-shadow: none;opacity: 1;"><span aria-hidden="true" style="font-size: 30px;">×</span></button>

                <ul class="text-left" style="text-align: center;font-size: 21px;list-style: none;padding-left: 0;font-weight: 600;font-family: monospace;">

                    <li>{{ Session::get('unsuccess') }}</li>

                </ul>
            </div>

        @endif

            @if(Session::has('success'))

                <div class="alert alert-success validation" style="position: absolute;top: 0px;width: 100%;border: none;">

                    <button type="button" class="close cl-btn" data-dismiss="alert" aria-label="Close" style="text-shadow: none;opacity: 1;"><span aria-hidden="true" style="font-size: 30px;">×</span></button>

                    <ul class="text-left" style="text-align: center;font-size: 21px;list-style: none;padding-left: 0;font-weight: 600;font-family: monospace;">

                        <li>{{ Session::get('success') }}</li>

                    </ul>
                </div>

            @endif

            @include('includes.form-error')

        <div class="container" style="width: 100%;padding: 0;">

            <div class="elementor-row">
                <div style="background-color: #62a8e5;padding: 0;" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="elementor-column-wrap elementor-element-populated">
                        <div class="elementor-widget-wrap">

                            <div class="elementor-element">
                                <div class="elementor-widget-container">
                                    <h1 style="font-family: sans-serif;font-size: 40px;font-weight: 600;margin: 0;" class="elementor-heading-title elementor-size-default">Vind de laagste prijs voor jouw vloer</h1>
                                </div>
                            </div>

                            <div class="elementor-element">
                                <div class="elementor-widget-container1">
                                    <ul style="list-style-type: none;padding: 0;" class="elementor-icon-list-items">
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon"><i aria-hidden="true" class="fas fa-circle"></i></span>
                                            <span class="elementor-icon-list-text">Vergelijk gratis vloer offertes van verschillende winkels</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon"><i aria-hidden="true" class="fas fa-circle"></i></span>
                                            <span class="elementor-icon-list-text">Vloerofferte.nl geeft jou in no time de alleberste deals</span>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon"><i aria-hidden="true" class="fas fa-circle"></i></span>
                                            <span class="elementor-icon-list-text">Snel en eenvoudig geregeld</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="elementor-element">
                                <div class="elementor-widget-container">
                                    <div class="main-form p-box" style="border-radius: 10px;/*box-shadow: 0px 0px 4px 0px #dbdbdb;*/margin-top: 10px;background-color: transparent !important;border: none !important;">

                                        <div id="quote-box" style="display: flex;justify-content: space-between;width: 100%;padding: 0">

                                            <div style="width: 48%;">

                                                <div class="autocomplete" style="width:100%;">
                                                    <input id="productInput" autocomplete="off" class="form-control quote-product" type="text" name="product" placeholder="{{__('text.Select Product')}}">
                                                </div>

                                                <select style="display: none;" class="form-control all-products" name="group" id="blood_grp">

                                                    @foreach($quote_products as $key)

                                                        @foreach($key->models as $key1)

                                                            @foreach($key->colors as $key2)

                                                                <option data-cat="{{$key->cat_id}}" data-brand-id="{{$key->brand_id}}" data-type-id="{{$key->model_id}}" data-model="{{$key1->model}}" data-model-id="{{$key1->id}}" data-color="{{$key2->title}}" data-color-id="{{$key2->id}}" value="{{$key->id}}">{{$key->title.', '.$key1->model.', '.$key2->title}}</option>

                                                            @endforeach

                                                        @endforeach

                                                    @endforeach

                                                </select>

                                                <input type="hidden" id="type_id">
                                                <input type="hidden" id="category_id">
                                                <input type="hidden" id="brand_id">
                                                <input type="hidden" id="model_id">
                                                <input type="hidden" id="color_id">

                                            </div>

                                            <button data-id="1" class="btn btn-success p-btns" style="height: 45px;min-width: 100px;float: right;border: 0;outline: none;font-size: 18px;width: 48%;background-color: #0090e3 !important;border: none !important;padding: 6px 12px;font-weight: 400;" class="btn btn-primary">{{__('text.Start')}}</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="padding: 0;" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div style="margin: 0;display: flex;justify-content: center;height: 100%;" class="row video-box">

                        <video style="width: 100% !important;object-fit: fill;" controls="">

                            <source type="video/mp4" src="{{asset('assets/vloerofferte.nl.mp4')}}">

                        </video>

                    </div>
                </div>
            </div>

            <div class="row" style="margin: 20px 0 0 0;">

                <h1 class="third-head" style="line-height: 74px;font-weight: 600;background: #C7E2E5;display: inline-block;width: 100%;text-transform: none;position:relative;text-align: center;margin: 40px 0;color: rgb(71 71 71);font-size: 20px;">Alle vloerenwinkels onder één dak. 100% veilig met onze gelijk oversteken service!</h1>

                <div style="width: 70%;margin: auto;padding: 0;display: flex;" class="ex-row row">

                    <div style="float: none;" class="ex-box col-lg1-4 col-md-4 col-sm-12 col-xs-12">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: 1px solid gray;display: flex;justify-content: space-between;flex-direction: column;align-items: center;padding: 20px;height: 100%;">

                            <h4 style="text-transform: uppercase;">VLOER OFFERTE</h4>

                            <p data-id="1" class="show-read-more" style="text-align: center;">Heeft u een vloer gevonden die u aanspreekt en bent u benieuwd naar de laagste prijs? <br> Zoek hier uw vloer op en vraag gratis een offerte aan.</p>

                            <a data-id="1" class="btn btn-success p-btns" style="text-transform: uppercase;background: #C7E2E5;border: 0;padding: 10px 20px;border-radius: 20px;font-weight: bold;text-decoration: none;cursor: pointer;color: white;width: auto;">AANVRAGEN</a>

                        </div>

                    </div>

                    <div style="float: none;" class="ex-box col-lg1-4 col-md-4 col-sm-12 col-xs-12">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: 1px solid gray;display: flex;justify-content: space-between;flex-direction: column;align-items: center;padding: 20px;height: 100%;">

                            <h4 style="text-transform: uppercase;">DIENSTEN</h4>

                            <p data-id="3" class="show-read-more" style="text-align: center;">Heeft u een vloer gekocht maar bent u nog op zoek naar een vloerinstallateur? <br> Vraag hier een gratis offerte aan van erkende installateurs bij u in de buurt.</p>

                            <a data-id="3" class="btn btn-success p-btns" style="text-transform: uppercase;background: #C7E2E5;border: 0;padding: 10px 20px;border-radius: 20px;font-weight: bold;text-decoration: none;cursor: pointer;color: white;width: auto;">AANVRAGEN</a>

                        </div>

                    </div>

                    <div style="float: none;" class="col-lg1-4 col-md-4 col-sm-12 col-xs-12">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: 1px solid gray;display: flex;justify-content: space-between;flex-direction: column;align-items: center;padding: 20px;height: 100%;">

                            <h4 style="text-transform: uppercase;">UPLOAD UW OFFERTE</h4>

                            <p data-id="4" class="show-read-more" style="text-align: center;">Heeft u een offerte ontvangen en bent u benieuwd of dit een goede deal is? <br> Upload hier uw offerte en ontvang gratis vloeroffertes van uw gewilde vloer.</p>

                            <a data-id="4" class="btn btn-success p-btns" style="text-transform: uppercase;background: #C7E2E5;border: 0;padding: 10px 20px;border-radius: 20px;font-weight: bold;text-decoration: none;cursor: pointer;color: white;width: auto">UPLOADEN</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- Ending of Hero area -->


    <!-- Starting of All - sectors area -->
    <div class="section-padding all-sectors-wrap wow fadeInUp" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title pb_50 text-center">
                        <h2>{{$lang->bgs}}</h2>

                        <div class="section-borders">
                            <span></span>
                            <span class="black-border"></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach($quote_cats as $cat)

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">

                                <a href="{{url('products/?_token='.@csrf_token().'&category='.$cat->id)}}">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">

                                                <p>
                                                    @if($cat->photo == NULL)

                                                        <img class=" img-fluid" src="{{asset('assets/images/'.$gs->logo)}}" >

                                                    @else

                                                        <img class=" img-fluid" src="{{asset('assets/images/'.$cat->photo)}}" >

                                                    @endif

                                                </p>

                                                <h4 class="card-title" style="font-weight: 600;padding-top: 30px;font-family: monospace;font-size: 15px;">{{$cat->cat_name}}</h4>

                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="backside" >
                                    <div class="card">
                                        <div class="card-body text-center mt-4">

                                            <h4 class="card-title">{{$cat->cat_name}}</h4>

                                            <p class="card-text">{!! $cat->description !!}</p>

                                            <a target="_blank" class="btn btn-primary" style="color: white !important;margin-top: 20px;" href="{{url('products/?_token='.@csrf_token().'&category='.$cat->id)}}">View</a>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">

                                <a href="{{url('diensten')}}">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <p>
                                                    <img class=" img-fluid" src="{{asset('assets/Diensten.jpeg')}}">
                                                </p>

                                                <h4 class="card-title" style="font-weight: 600;padding-top: 30px;font-family: monospace;font-size: 15px;">{{__('text.Services')}}</h4>

                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="backside" >
                                    <div class="card">
                                        <div class="card-body text-center mt-4">

                                            <h4 class="card-title">{{__('text.Services')}}</h4>

                                            <p class="card-text"></p>

                                            <a target="_blank" class="btn btn-primary" style="color: white !important;margin-top: 20px;" href="{{url('diensten')}}">View</a>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!-- Ending of All - sectors area -->

    <div class="py-12">
        <div class="text-center text-honing  text-support font-bold pb-4 text-lg"></div>
        <div class="text-nacht text-center sm:text-t3 text-t2-2-sm font-bold-important pb-6 px-4 leading-none">Vrijblijvende vloer offertes aanvragen en vergelijken</div>
        <div style="font-family: sans-serif;" class="container mx-auto mt-0 md:mt-12">

            <div class="flex justify-between relative">
                <div class="back-line"></div>
                <div class="w-1/4 relative text-center step-hover-1">
                    <lottie-player data-aos="fade-up" id="lottie-player-step-1" class="flex-shrink-0 mx-auto w-16 h-16 sm:h-32 sm:w-56 mb-8 sm:mb-0" src="{{asset('assets/front/js/Envelop.json')}}" background="transparent" speed="3" loop></lottie-player>
                    <div data-aos="fade-up" data-aos-delay="300" class="sm:block font-bold text-body-3 mb-12">Zoek je product of dienst <br> Vul je wensen in</div>
                    <div id="steps-step-1" class="step-dots completed-dot active-dot"></div>
                </div>
                <div class="w-1/4 relative text-center step-hover-2">
                    <lottie-player data-aos="fade-up" id="lottie-player-step-2" class="flex-shrink-0 mx-auto w-16 h-16 sm:h-32 sm:w-56 mb-8 sm:mb-0" src="{{asset('assets/front/js/Stamp.json')}}" background="transparent" speed="3" loop></lottie-player>
                    <div data-aos="fade-up" data-aos-delay="300" class="sm:block font-bold text-body-3 mb-12">Wij checken en<br> verbinden je</div>
                    <div id="steps-step-2" class="step-dots"></div>
                </div>
                <div class="w-1/4 relative text-center step-hover-3">
                    <lottie-player data-aos="fade-up" id="lottie-player-step-3" class="flex-shrink-0 mx-auto w-16 h-16 sm:h-32 sm:w-56 mb-8 sm:mb-0" src="{{asset('assets/front/js/Stars.json')}}" background="transparent" speed="3" loop></lottie-player>
                    <div data-aos="fade-up" data-aos-delay="300" class="sm:block font-bold text-body-3 mb-12">Kom in contact met vloeren<br>winkels en ontvang offertes</div>
                    <div id="steps-step-3" class="step-dots"></div>
                </div>
                <div class="w-1/4 relative text-center step-hover-4">
                    <lottie-player data-aos="fade-up" id="lottie-player-step-4" class="flex-shrink-0 mx-auto w-16 h-16 sm:h-32 sm:w-56 mb-8 sm:mb-0" src="{{asset('assets/front/js/Hands.json')}}" background="transparent" speed="3" loop></lottie-player>
                    <div data-aos="fade-up" data-aos-delay="300" class="sm:block font-bold text-body-3 mb-12">Akkoord met<br> de offerte</div>
                    <div id="steps-step-4" class="step-dots"></div>
                </div>
            </div>

            <div style="margin-top: 10px;" class="flex justify-between px-2 sm:px-12 lg:px-24">
                <div class="text-step-1 w-full md:w-5/12 3xl:w-1/3">
                    <div class="px-4 sm:px-8 pt-6 pb-8 bg-aqua rounded mt-8 text-center transition-5 flex flex-wrap justify-center height-responsive-info-desktop">
                        <div class="font-bold-important sm:text-body-1 text-t2-sm mb-2 w-full">Wat heb je nodig?</div>
                        <div class="font-medium sm:text-body-3 text-body-2-sm">Selecteer de vloer of dienst. Vul je aanvraag verder aan met je persoonlijke wensen.</div>
                    </div>
                </div>
                <div class="text-step-2 w-full md:w-5/12 3xl:w-1/3" style="display: none;">
                    <div class="px-4 sm:px-8 pt-6 pb-8 bg-aqua rounded mt-8 text-center transition-5 flex flex-wrap justify-center height-responsive-info-desktop">
                        <div class="font-bold-important sm:text-body-1 text-t2-sm mb-2 w-full">Wij checken en verbinden je</div>
                        <div class="font-medium sm:text-body-3 text-body-2-sm">Je aanvraag komt binnen bij ons. Wij checken of alles in orde is en sturen deze door naar erkende vloerenwinkels.</div>
                    </div>
                </div>
                <div class="text-step-3 w-full md:w-1/2 3xl:w-1/3" style="display: none;">
                    <div class="px-4 sm:px-8 pt-6 pb-8 bg-aqua rounded mt-8 text-center transition-5 flex flex-wrap justify-center height-responsive-info-desktop">
                        <div class="font-bold-important sm:text-body-1 text-t2-sm mb-2 w-full">Vergelijk de offertes</div>
                        <div class="font-medium sm:text-body-3 text-body-2-sm">Je ontvangt meerdere offertes van erkende vloerenwinkels in je dashboard & mail.</div>
                    </div>
                </div>
                <div class="text-step-4 w-full md:w-2/4 3xl:w-1/3" style="display: none;">
                    <div class="px-4 sm:px-8 pt-6 pb-8 bg-aqua rounded mt-8 text-center transition-5 flex flex-wrap justify-center height-responsive-info-desktop">
                        <div class="font-bold-important sm:text-body-1 text-t2-sm mb-2 w-full">Gelijk oversteken service</div>
                        <div class="font-medium sm:text-body-3 text-body-2-sm">Betaal veilig via Ideal. Je betaling blijft op onze rekening totdat je de goederen en/of dienst hebt onvangen. Laat ons weten dat je de goederen en/of dienst hebt ontvangen en wij maken het geld vrij.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>

        .py-12
        {
            padding-bottom: 2rem;
            padding-top: 2rem;
        }

        .text-support
        {
            font-size: 14px;
            font-weight: 700;
            line-height: 23px;
        }

        .text-honing
        {
            --tw-text-opacity: 1;
            color: rgb(255 184 56);
        }

        .text-center
        {
            text-align: center;
        }

        .pb-4
        {
            padding-bottom: 1rem;
        }

        .text-nacht
        {
            color: rgb(40 54 123);
        }

        .px-4
        {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .font-bold-important
        {
            font-weight: 700 !important;
        }

        .text-t2-2-sm
        {
            font-size: 16px;
            font-weight: 700;
            line-height: 21px;
        }

        .mx-auto
        {
            margin-left: auto;
            margin-right: auto;
        }

        .mt-0
        {
            margin-top: 0;
        }

        .relative
        {
            position: relative;
        }

        .flex
        {
            display: flex;
        }

        .justify-between
        {
            justify-content: space-between !important;
        }

        .back-line
        {
            background-color: #1f8320;
            bottom: 10px;
            content: "";
            height: 0.3em;
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            width: 76%;
            z-index: 0;
        }

        .back-step-2:before, .back-step-3:after
        {
            background-color: rgb(186 220 237);
            bottom: 0;
            content: "";
            height: 0.3em;
            left: 0;
            position: absolute;
            right: 0;
            z-index: -2;
        }

        .back-step-2:before
        {
            width: 34%;
        }

        .back-step-3:after
        {
            width: 67%;
        }

        .w-1\/4
        {
            width: 25%;
        }

        [data-aos=fade-up]
        {
            transform: translate3d(0,100px,0);
        }

        .mb-8
        {
            margin-bottom: 2rem;
        }

        .h-16
        {
            height: 4rem;
        }

        .w-16
        {
            width: 4rem;
        }

        .flex-shrink-0
        {
            flex-shrink: 0;
        }

        [data-aos^=fade][data-aos^=fade]
        {
            opacity: 0;
            transition-property: opacity,transform;
        }

        [data-aos][data-aos][data-aos-duration="400"], body[data-aos-duration="400"] [data-aos]
        {
            transition-duration: .4s;
        }

        [data-aos][data-aos][data-aos-easing=ease], body[data-aos-easing=ease] [data-aos]
        {
            transition-timing-function: ease;
        }

        [data-aos][data-aos][data-aos-delay="300"].aos-animate, body[data-aos-delay="300"] [data-aos].aos-animate
        {
            transition-delay: .3s;
        }

        [data-aos^=fade][data-aos^=fade].aos-animate
        {
            opacity: 1;
            transform: translateZ(0);
        }

        .text-body-3
        {
            line-height: 20px;
        }

        .text-body-2, .text-body-3
        {
            font-size: 16px;
            font-weight: 500;
        }

        [data-aos=fade-up]
        {
            transform: translate3d(0,100px,0);
        }

        .step-dots
        {
            background-color: #fff;
            border-color: #1f8320;
            border-radius: 9999px;
            border-width: 3px;
            bottom: 0;
            box-shadow: 0 0 0 3px #1f8320;
            flex-shrink: 0;
            height: 26px;
            left: 0;
            margin-left: auto;
            margin-right: auto;
            margin-top: 3rem;
            position: absolute;
            right: 0;
            transition: border .5s ease,background-color .5s ease;
            width: 26px;
            z-index: 20;
        }

        .step-dots.completed-dot
        {
            background: #badced url(https://offerte.nl/img/website/cpc/check-white.svg) no-repeat center center;
            background-size: 70%;
            border-color: rgb(186 220 237);
            box-shadow: 0 0 0 1px #badced;
        }

        /* .px-2
        {
            padding-left: 3rem;
            padding-right: 3rem;
        } */

        .w-full
        {
            width: 100%;
        }

        .height-responsive-info-desktop
        {
            min-height: 117px;
        }

        .transition-5
        {
            transition: all .5s ease;
        }

        .mt-8
        {
            margin-top: 2rem;
        }

        .flex-wrap
        {
            flex-wrap: wrap;
        }

        .justify-center
        {
            justify-content: center;
        }

        .rounded
        {
            border-radius: .5rem;
        }

        .bg-aqua
        {
            background-color: rgb(186 220 237);
            color: #5b5b5b;
            position: relative;
            z-index: 100;
        }

        .pb-8
        {
            padding-bottom: 2rem;
        }

        .pt-6
        {
            padding-top: 1.5rem;
        }

        .mb-2
        {
            margin-bottom: 0.5rem;
        }

        .text-t2-sm
        {
            font-size: 13px;
            font-weight: 700;
            line-height: 16px;
        }

        .font-medium
        {
            font-weight: 500;
        }

        .text-body-2-sm
        {
            font-size: 10px;
            font-weight: 500;
            line-height: 18px;
        }

        .step-dots.active-dot:after
        {
            background-color: rgb(186 220 237);
            border-radius: 0.5rem;
            bottom: -5.5rem;
            content: " ";
            height: 4rem;
            left: -0.7rem;
            transform: rotate(45deg);
            width: 4rem;
        }

        .step-dots-wit, .step-dots.active-dot:after
        {
            position: absolute;
        }

        .mb-12
        {
            margin-bottom: 5rem;
        }

        .md\:mt-12
        {
            margin-top: 3rem;
        }

        @media (min-width: 640px)
        {
            .sm\:text-t3
            {
                font-size: 22px;
                font-weight: 700;
                line-height: 30px;
            }

            .sm\:mb-0
            {
                margin-bottom: 0;
            }

            .sm\:h-32
            {
                height: 14rem;
            }

            .sm\:w-56
            {
                width: 14rem;
            }

            .sm\:block
            {
                display: block;
            }

            .sm\:px-12
            {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .height-responsive-info-desktop
            {
                min-height: 176px;
            }

            .sm\:px-8
            {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .sm\:text-body-1
            {
                font-size: 18px;
                font-weight: 500;
                line-height: 28px;
            }

            .sm\:text-body-3
            {
                font-size: 16px;
                font-weight: 500;
                line-height: 20px;
            }
        }

        @media (min-width: 768px)
        {
            .md\:w-5\/12
            {
                width: 41.666667%;
            }

            .height-responsive-info-desktop
            {
                min-height: 245px;
            }

            .text-step-2
            {
                margin-left: 19%;
            }

            .text-step-3
            {
                margin-left: 48%;
            }

            .text-step-4
            {
                margin-left: 57%;
            }
        }

        @media (min-width: 1024px)
        {
            .lg\:px-24
            {
                padding-left: 6rem;
                padding-right: 6rem;
            }

            .height-responsive-info-desktop
            {
                min-height: 184px;
            }
        }

        @media (min-width: 1600px)
        {
            .\33xl\:w-1\/3
            {
                width: 33.333333%;
            }

            .text-step-4
            {
                margin-left: 67%;
            }
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <div style="margin-top: 50px;" class="container">
        <h2 class="heading" style="text-align: center;">{{__('text.Our Brands')}}</h2>

        <section class="customer-logos slider" style="padding-bottom: 20px;padding-top: 20px;">

            @foreach($brands as $brand)

                <div class="slide"><a target="_blank" href="{{url('products/?_token='.@csrf_token().'&brand='.$brand->id)}}"><img src="{{ asset('assets/images/'.$brand->photo) }}"></a></div>

            @endforeach

        </section>
    </div>

    <!-- Starting of blog area -->
    <div style="padding-top: 0;" class="section-padding blog-area-wrapper wow fadeInUp">

        <section id="usp" class="usp">
            <div class="row row1" style="max-width: 80%;margin-left: auto;margin-right: auto;display: flex;flex-flow: row wrap;margin-top: 35px;">
                <div class="small-12 medium-12 large-12 columns">
                    <h2 class="hiw">{{$lang->rtbh}}</h2>
                </div>
            </div>
            <div class="row usps__row row2" style="max-width: 60%;margin-left: auto;margin-right: auto;display: flex;flex-flow: row wrap;margin-top: 35px;">
                <div class="large-4 medium-8 small-11 columns">
                    <div class="usp__block">
                        <div>
                            <img src="{{asset('assets/images/Marketplace PNG.png')}}" class="ic-img">
                            <p class="usp__block__title step__header_en ic-p @if($language == 'du') hide @endif">{{$rtb->heading1}}</p>
                            <p class="usp__block__title step__header_de ic-p @if($language == 'eng') hide @endif">{{$rtb->dh1}}</p>
                        </div>
                        <span class="step__description_en @if($language == 'du') hide @endif">{{$rtb->desc1}} </span>
                        <span class="step__description_de @if($language == 'eng') hide @endif">{{$rtb->dd1}} </span>
                    </div>
                </div>
                <div class="large-4 medium-8 small-11 columns">
                    <div class="usp__block">
                        <div>
                            <img src="{{asset('assets/images/Payment PNG.png')}}" class="ic-img">
                            <p class="usp__block__title step__header_en ic-p @if($language == 'du') hide @endif">{{$rtb->heading2}}</p>
                            <p class="usp__block__title step__header_de ic-p @if($language == 'eng') hide @endif">{{$rtb->dh2}}</p>
                        </div>
                        <span class="step__description_en @if($language == 'du') hide @endif">{{$rtb->desc2}}</span>
                        <span class="step__description_de @if($language == 'eng') hide @endif">{{$rtb->dd2}}</span>
                    </div>
                </div>
                <div class="large-4 medium-8 small-11 columns">
                    <div class="usp__block">
                        <div>
                            <img src="{{asset('assets/images/Warranty.png')}}" class="ic-img">
                            <p class="usp__block__title step__header_en ic-p @if($language == 'du') hide @endif">{{$rtb->heading3}}</p>
                            <p class="usp__block__title step__header_de ic-p @if($language == 'eng') hide @endif">{{$rtb->dh3}}</p>
                        </div>
                        <span class="step__description_en @if($language == 'du') hide @endif">{{$rtb->desc3}}</span>
                        <span class="step__description_de @if($language == 'eng') hide @endif">{{$rtb->dd3}}</span>
                    </div>
                </div>
            </div>
        </section>

        <style>

            .slick-slide {
                margin: 0px 20px;
            }

            .slick-slide img {

                width: 100%;
            }

            .slick-slider
            {
                position: relative;
                display: block;
                box-sizing: border-box;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-touch-callout: none;
                -khtml-user-select: none;
                -ms-touch-action: pan-y;
                touch-action: pan-y;
                -webkit-tap-highlight-color: transparent;
            }

            .slick-list
            {
                position: relative;
                display: block;
                overflow: hidden;
                margin: 0;
                padding: 0;
            }
            .slick-list:focus
            {
                outline: none;
            }
            .slick-list.dragging
            {
                cursor: pointer;
                cursor: hand;
            }

            .slick-slider .slick-track,
            .slick-slider .slick-list
            {
                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }

            .slick-track
            {
                position: relative;
                top: 0;
                left: 0;
                display: block;
                margin: auto;
            }
            .slick-track:before,
            .slick-track:after
            {
                display: table;
                content: '';
            }
            .slick-track:after
            {
                clear: both;
            }
            .slick-loading .slick-track
            {
                visibility: hidden;
            }

            .slick-slide
            {
                display: none;
                float: left;
                position: relative;
                height: 140px;
                min-height: 1px;
            }
            [dir='rtl'] .slick-slide
            {
                float: right;
            }
            .slick-slide img
            {
                display: block;
            }
            .slick-slide.slick-loading img
            {
                display: none;
            }
            .slick-slide.dragging img
            {
                pointer-events: none;
            }
            .slick-initialized .slick-slide
            {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .slick-loading .slick-slide
            {
                visibility: hidden;
            }
            .slick-vertical .slick-slide
            {
                display: block;
                height: auto;
                border: 1px solid transparent;
            }
            .slick-arrow.slick-hidden {
                display: none;
            }

        </style>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdCPSjhOgaYXo6twWkseoaSHc2Ipob024&libraries=places&callback=initMap" async defer></script>

        <script type="text/javascript">

            $(document).ready(function(){

                $('.p-btns').click(function(){

                    $('.floor-description').remove();

                    var id = $(this).data('id');

                    $('.navbar a[href="#step1"]').trigger('click');
                    $('.next').show();
                    $('.next-submit').hide();
                    $('.back').hide();

                    if(id == 1 || id == 2)
                    {
                        $('.floor').show();

                        if($('.quote-category').val() == 'Diensten')
                        {
                            $('.quote-category').val('');
                            $(".quote-category").trigger('change.select2');
                        }

                        $('.files-upload').removeClass('quote_validation');
                        $('.quote-service').removeClass('quote_validation');
                        $('.quote-category').addClass('quote_validation');
                        $('.quote-brand').addClass('quote_validation');
                        $('.quote-type').addClass('quote_validation');
                        $('.quote-model').addClass('quote_validation');
                        $('.quote-color').addClass('quote_validation');
                        $('.quote_quantity').addClass('quote_validation');
                        $('.quote_delivery').addClass('quote_validation');

                        $('#step1').css('height','300px');
                        $('.quote_delivery').attr("placeholder", "{{__('text.Select Delivery Date')}}");

                        $('.files-box').hide();
                        $('.unlinked-boxes').hide();
                        $('.linked-boxes').show();
                        $('.duo-boxes').show();

                        $('.o-box').hide();
                        $('.cbm-box').show();
                        $('.p-box').show();
                        $('.progress-bar').css('width',(100/4)+'%');
                    }
                    else if(id == 3)
                    {
                        $('.quote-category').val('Diensten');
                        $(".quote-category").trigger('change.select2');

                        $('.quote-brand').val('');
                        $(".quote-brand").trigger('change.select2');

                        $('.quote-type').val('');
                        $(".quote-type").trigger('change.select2');

                        $('.quote-model').val('');
                        $(".quote-model").trigger('change.select2');

                        $('.quote-color').val('');
                        $(".quote-color").trigger('change.select2');

                        $('.files-box').hide();
                        $('.linked-boxes').hide();
                        $('.unlinked-boxes').show();
                        $('.duo-boxes').show();

                        $('.quote-service').addClass('quote_validation');
                        $('.files-upload').removeClass('quote_validation');
                        $('.quote-category').removeClass('quote_validation');
                        $('.quote-brand').removeClass('quote_validation');
                        $('.quote-type').removeClass('quote_validation');
                        $('.quote-model').removeClass('quote_validation');
                        $('.quote-color').removeClass('quote_validation');
                        $('.quote_quantity').addClass('quote_validation');
                        $('.quote_delivery').addClass('quote_validation');

                        $('#step1').css('height','300px');

                        $('.quote_delivery').attr("placeholder", "{{__('text.Select Installation Date')}}");

                        $('.o-box').hide();
                        $('.cbm-box').show();
                        $('.p-box').show();
                        $('.progress-bar').css('width',(100/4)+'%');
                    }
                    else
                    {
                        $('.quote-service').val('');
                        $('.quote-service').trigger('change.select2');

                        $('.quote-category').val('');
                        $(".quote-category").trigger('change.select2');

                        $('.quote-brand').val('');
                        $(".quote-brand").trigger('change.select2');

                        $('.quote-type').val('');
                        $(".quote-type").trigger('change.select2');

                        $('.quote-model').val('');
                        $(".quote-model").trigger('change.select2');

                        $('.quote-color').val('');
                        $(".quote-color").trigger('change.select2');

                        $('.files-upload').addClass('quote_validation');
                        $('.quote-service').removeClass('quote_validation');
                        $('.quote-category').removeClass('quote_validation');
                        $('.quote-brand').removeClass('quote_validation');
                        $('.quote-type').removeClass('quote_validation');
                        $('.quote-model').removeClass('quote_validation');
                        $('.quote-color').removeClass('quote_validation');

                        $('#step1').css('height','');
                        $('.quote_quantity').removeClass('quote_validation');
                        $('.quote_delivery').removeClass('quote_validation');

                        $('.unlinked-boxes').hide();
                        $('.linked-boxes').hide();
                        $('.duo-boxes').hide();
                        $('.files-box').show();
                        $('.progress-bar').css('width',(100/3)+'%');
                    }

                    $('#aanvragen').modal('toggle');

                });

                $('.customer-logos').slick({
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1500,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4
                        }
                    }, {
                        breakpoint: 520,
                        settings: {
                            slidesToShow: 3
                        }
                    }]
                });
            });

            function initMap() {

                var input = document.getElementById('quote-zipcode');

                var options = {
                    componentRestrictions: {country: "nl"}
                };

                var autocomplete = new google.maps.places.Autocomplete(input,options);

                // Set the data fields to return when the user selects a place.
                autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);


                autocomplete.addListener('place_changed', function() {

                    var place = autocomplete.getPlace();


                    if (!place.geometry) {

                        // User entered the name of a Place that was not suggested and
                        // pressed the Enter key, or the Place Details request failed.
                        window.alert("{{__('text.No details available for input: ')}}" + place.name);
                        return;
                    }

                    var city = '';
                    var postal_code = '';


                    for(var i=0; i < place.address_components.length; i++)
                    {
                        if(place.address_components[i].types[0] == 'postal_code')
                        {
                            postal_code = place.address_components[i].long_name;
                        }

                        if(place.address_components[i].types[0] == 'locality')
                        {
                            city = place.address_components[i].long_name;
                        }

                    }


                    if(city == '')
                    {
                        for(var i=0; i < place.address_components.length; i++)
                        {
                            if(place.address_components[i].types[0] == 'administrative_area_level_2')
                            {
                                city = place.address_components[i].long_name;

                            }
                        }
                    }

                    /*if(postal_code == '' || city == '')
                    {
                        flag = 1;
                    }*/

                    $('#check_address').val(1);
                    $('#postcode').val(postal_code);
                    $("#city").val(city);

                });
            }

            $(document).ready(function() {

                $('.topMembers').slick({
                    dots: false,
                    arrows: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                arrows: true,
                                centerMode: false,
                                centerPadding: '0px',
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 1
                            }
                        }
                    ],
                    prevArrow: "<button class='slick-arrow slick-prev' data-role='none' type='button' style='display: block;'><svg class='domain-icon css-oee40j' viewBox='0 0 24 24' aria-hidden='true'><path fill='none' stroke='currentColor' stroke-width='2' d='M15 5l-7 7 7 7'></path></svg><span class='css-16q9xmc'>Prev</span></button>",
                    nextArrow: "<button class='slick-arrow slick-next' data-role='none' type='button' style='display: block;'><svg class='domain-icon css-oee40j' viewBox='0 0 24 24' aria-hidden='true'><path fill='none' stroke='currentColor' stroke-width='2' d='M9 5l7 7-7 7'></path></svg><span class='css-16q9xmc'>Next</span></button>"
                });

                function autocomplete(inp, arr, values, categories, brands, types, models, colors, models_texts, colors_texts) {
                    /*the autocomplete function takes two arguments,
                    the text field element and an array of possible autocompleted values:*/
                    var currentFocus;
                    /*execute a function when someone writes in the text field:*/
                    inp.addEventListener("input", function(e) {

                        var a, b, i, val = this.value;
                        /*close any already open lists of autocompleted values*/
                        closeAllLists();
                        if (!val) { return false;}
                        currentFocus = -1;
                        /*create a DIV element that will contain the items (values):*/
                        a = document.createElement("DIV");
                        a.setAttribute("id", this.id + "autocomplete-list");
                        a.setAttribute("class", "autocomplete-items");
                        /*append the DIV element as a child of the autocomplete container:*/
                        this.parentNode.appendChild(a);

                        var border_flag = 0;
                        var found_flag = 0;

                        if(arr.length == 0)
                        {
                            border_flag = 1;
                        }

                        /*for each item in the array...*/
                        for (i = 0; i < arr.length; i++) {

                            var string = arr[i];
                            string = string.toLowerCase();
                            val = val.toLowerCase();
                            var res = string.includes(val);

                            if (res) {

                                found_flag = 1;

                                /*create a DIV element for each matching element:*/
                                b = document.createElement("DIV");
                                /*make the matching letters bold:*/
                                /*b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                b.innerHTML += arr[i].substr(val.length);*/
                                // b.innerHTML = arr[i] + ', ' + categories[i];
                                b.innerHTML = arr[i];
                                /*insert a input field that will hold the current array item's value:*/
                                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'><input type='hidden' value='" + values[i] + "'><input type='hidden' value='" + categories[i] + "'><input type='hidden' value='" + brands[i] + "'><input type='hidden' value='" + types[i] + "'><input type='hidden' value='" + models[i] + "'><input type='hidden' value='" + colors[i] + "'><input type='hidden' value='" + models_texts[i] + "'><input type='hidden' value='" + colors_texts[i] + "'>";
                                /*execute a function when someone clicks on the item value (DIV element):*/
                                b.addEventListener("click", function(e) {
                                    /*insert the value for the autocomplete text field:*/
                                    inp.value = this.getElementsByTagName("input")[0].value;

                                    var product_id = this.getElementsByTagName("input")[1].value;
                                    var category_id = this.getElementsByTagName("input")[2].value;
                                    var brand_id = this.getElementsByTagName("input")[3].value;
                                    var type_id = this.getElementsByTagName("input")[4].value;
                                    var model_text = this.getElementsByTagName("input")[7].value;
                                    var color_text = this.getElementsByTagName("input")[8].value;

                                    select_product(product_id,category_id,brand_id,type_id,model_text,color_text);

                                    /*close the list of autocompleted values,
                                    (or any other open lists of autocompleted values:*/
                                    closeAllLists();
                                });
                                a.appendChild(b);
                            }
                        }

                        if(border_flag || !found_flag)
                        {
                            a.style.border = "0";
                        }

                    });
                    /*execute a function presses a key on the keyboard:*/
                    inp.addEventListener("keydown", function(e) {
                        var x = document.getElementById(this.id + "autocomplete-list");
                        if (x) x = x.getElementsByTagName("div");
                        if (e.keyCode == 40) {
                            /*If the arrow DOWN key is pressed,
                            increase the currentFocus variable:*/
                            currentFocus++;
                            /*and and make the current item more visible:*/
                            addActive(x);
                        } else if (e.keyCode == 38) { //up
                            /*If the arrow UP key is pressed,
                            decrease the currentFocus variable:*/
                            currentFocus--;
                            /*and and make the current item more visible:*/
                            addActive(x);
                        } else if (e.keyCode == 13) {
                            /*If the ENTER key is pressed, prevent the form from being submitted,*/
                            e.preventDefault();
                            if (currentFocus > -1) {
                                /*and simulate a click on the "active" item:*/
                                if (x) x[currentFocus].click();
                            }
                        }
                    });
                    function addActive(x) {
                        /*a function to classify an item as "active":*/
                        if (!x) return false;
                        /*start by removing the "active" class on all items:*/
                        removeActive(x);
                        if (currentFocus >= x.length) currentFocus = 0;
                        if (currentFocus < 0) currentFocus = (x.length - 1);
                        /*add class "autocomplete-active":*/
                        x[currentFocus].classList.add("autocomplete-active");
                    }
                    function removeActive(x) {
                        /*a function to remove the "active" class from all autocomplete items:*/
                        for (var i = 0; i < x.length; i++) {
                            x[i].classList.remove("autocomplete-active");
                        }
                    }
                    function closeAllLists(elmnt) {
                        /*close all autocomplete lists in the document,
                        except the one passed as an argument:*/
                        var x = document.getElementsByClassName("autocomplete-items");
                        for (var i = 0; i < x.length; i++) {
                            if (elmnt != x[i] && elmnt != inp) {
                                x[i].parentNode.removeChild(x[i]);
                            }
                        }
                    }
                    /*execute a function when someone clicks in the document:*/
                    document.addEventListener("click", function (e) {
                        closeAllLists(e.target);
                    });
                }

                /*An array containing all the country names in the world:*/
                options = [];
                texts = [];
                categories = [];
                brands = [];
                types = [];
                models = [];
                colors = [];
                models_texts = [];
                colors_texts = [];

                var sel = $(".all-products");
                var length = sel.children('option').length;

                $(".all-products > option").each(function() {
                    if (this.value) options.push(this.value); texts.push(this.text); categories.push(this.getAttribute('data-cat')); brands.push(this.getAttribute('data-brand-id')); types.push(this.getAttribute('data-type-id')); models.push(this.getAttribute('data-model-id')); colors.push(this.getAttribute('data-color-id')); models_texts.push(this.getAttribute('data-model')); colors_texts.push(this.getAttribute('data-color'));
                });

                /*for (var i=0, n=length;i<n;i++) { // looping over the options
                    console.log($('.all-products option:eq(i)').text());
                    if (sel.options[i].value) options.push(sel.options[i].value);
                }

                console.log(options);*/

                autocomplete(document.getElementById("productInput"), texts, options, categories, brands, types, models, colors, models_texts, colors_texts);

            });

            function changeLanguage(id)
            {
                if(id == 1)
                {

                    $('#dutch').addClass('languageSelector-selected');
                    $('#english').removeClass('languageSelector-selected');

                    $('.step__header_en').addClass('hide');
                    $('.step__header_de').removeClass('hide');

                    $('.step__description_en').addClass('hide');
                    $('.step__description_de').removeClass('hide');

                }
                else{

                    $('#english').addClass('languageSelector-selected');
                    $('#dutch').removeClass('languageSelector-selected');

                    $('.step__header_de').addClass('hide');
                    $('.step__header_en').removeClass('hide');


                    $('.step__description_de').addClass('hide');
                    $('.step__description_en').removeClass('hide');

                }
            }

        </script>

        <style type="text/css">

            .slick-slide
            {
                outline: none;
            }

            @media (min-width: 1200px){

                .slick-slide
                {
                    padding: 0 20px;
                }

            }

            @media (min-width: 1250px){

                .slick-slide
                {
                    padding: 0 30px;
                }

            }

            .slick-arrow{position:absolute;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);background:rgba(#fff,0.8);text-align:center;cursor:pointer;z-index:1;width:48px;height:48px;background:#fff;color:#3c475b;border:0;border-radius:50%;box-shadow:0 1px 3px 0 rgba(30,41,61,0.1),0 1px 2px 0 rgba(30,41,61,0.2);opacity:0.9;}

            .slick-arrow:before
            {
                display: none;
            }

            .slick-arrow:hover , .slick-arrow:focus
            {
                outline: none;
                background: #fff;
            }

            .slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus
            {
                color: #0ea800;
            }

            .form-control:focus
            {
                border-color: #66afe9 !important;
            }

            #team {
                background: #eee !important;
            }

            .btn-primary:hover,
            .btn-primary:focus {
                background-color: #108d6f;
                border-color: #108d6f;
                box-shadow: none;
                outline: none;
            }

            .btn-primary {
                color: #fff;
                background-color: #007b5e;
                border-color: #007b5e;
            }

            section {
                padding: 60px 0;
            }

            section .section-title {
                text-align: center;
                color: #007b5e;
                margin-bottom: 50px;
                text-transform: uppercase;
            }

            .card {
                border: none;
                position: relative;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-clip: border-box;
                border-radius: .25rem;
            }

            .card-body
            {
                -webkit-box-flex:1;
                flex:1 1 auto;
                padding:1.25rem;
            }


            /*.image-flip:hover .backside,
            .image-flip.hover .backside {
                -webkit-transform: rotateY(0deg);
                -moz-transform: rotateY(0deg);
                -o-transform: rotateY(0deg);
                -ms-transform: rotateY(0deg);
                transform: rotateY(0deg);
                border-radius: .25rem;
            }

            .image-flip:hover .frontside,
            .image-flip.hover .frontside {
                -webkit-transform: rotateY(180deg);
                -moz-transform: rotateY(180deg);
                -o-transform: rotateY(180deg);
                transform: rotateY(180deg);
            }*/

            .mainflip {
                -webkit-transition: 1s;
                -webkit-transform-style: preserve-3d;
                -ms-transition: 1s;
                -moz-transition: 1s;
                -moz-transform: perspective(1000px);
                -moz-transform-style: preserve-3d;
                -ms-transform-style: preserve-3d;
                transition: 1s;
                transform-style: preserve-3d;
                position: relative;
                border: 1px solid #fff;
            }



            .frontside {
                position: relative;
                -webkit-transform: rotateY(0deg);
                -ms-transform: rotateY(0deg);
                z-index: 2;
                margin-bottom: 30px;
            }

            .backside {
                position: absolute;
                top: 0;
                left: 0;
                -webkit-transform: rotateY(-180deg);
                -moz-transform: rotateY(-180deg);
                -o-transform: rotateY(-180deg);
                -ms-transform: rotateY(-180deg);
                transform: rotateY(-180deg);
                -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
                -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
                box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);


            }


            .frontside,
            .backside {
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                -ms-backface-visibility: hidden;
                backface-visibility: hidden;
                -webkit-transition: 1s;
                -webkit-transform-style: preserve-3d;
                -moz-transition: 1s;
                -moz-transform-style: preserve-3d;
                -o-transition: 1s;
                -o-transform-style: preserve-3d;
                -ms-transition: 1s;
                -ms-transform-style: preserve-3d;
                transition: 1s;
                transform-style: preserve-3d;
                padding-top: 20px;
                border:1px solid #ffffff;
                border-radius: 5%;
                width: 100%;
                background-color: #f2f4f4;
                /*background-image: linear-gradient(141deg, #d9d9d9 0%, #edf0f1 51%, #aad9ea 75%);*/
                background-image: linear-gradient(141deg, #e7e7e700 0%,  #d6ebf2a1 75%);
                opacity: 0.8;
            }

            .frontside .card,
            .backside .card {
                min-height: 312px;
            }

            .backside .card a {
                font-size: 18px;
                color: #007b5e !important;
            }

            .frontside .card .card-title,
            .backside .card .card-title {
                color: #2b2b2b !important;

            }

            .frontside .card .card-body img {
                width: 85%;
                height: 200px;
                border-radius: 7%;
            }

            .steps{

                background: #f5f5f5;

            }

            @media screen and (min-width: 1024px){

                .steps{

                    padding: 3rem;

                }

            }


            .column,.columns{-ms-flex:1 1 0px;flex:1 1 0px;padding-right:.3125rem;padding-left:.3125rem;min-width:initial}




            .hiw{-ms-flex-positive:2;flex-grow:2;color:#444;text-align:center;-ms-flex-align:center;align-items:center;font-family:"Lato",sans-serif;font-size:2.25rem;font-weight:700;line-height:1.25;padding-bottom:2.25rem;margin:0;text-align:center;font-size:2rem}



            @media screen and (min-width: 30em){

                .hiw{

                    font-size: 38px;

                }

            }

            @media screen and (min-width: 64em){

                .hiw{

                    padding-bottom: 38px;

                }

            }


            #languagePickerContainer{left:0;right:0;margin:.625rem auto;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center;z-index:999;padding-bottom:1rem;margin-top:-2rem}

            .languageSelector{font-size:1em;margin-right:4%;margin:0 1%;color:#666;font-weight:400;cursor:pointer}


            .infographic__separator{content:"\B7";font-family:"Fira Sans";font-size:2.25rem;line-height:1rem;color:#666}

            .languageSelector-selected{color: <?php if($gs->btn_bg == null) { if($gs->colors == null){ echo '#f3bd02 !important;'; } else {   echo $gs->colors.' !important;'; }} else { echo $gs->btn_bg. ' !important;'; } ?>}

            .steps__items {
                justify-content: center;
            }

            .steps__items{text-align:center;font-family:"Lato",sans-serif}



            .large-3{-ms-flex:0 0 30%;flex:0 0 30%;max-width:30%}

            @media print, screen and (max-width: 1600px){

                .row1{

                    max-width: 100% !important;
                }

            }


            @media print, screen and (max-width: 1300px){

                .medium-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}

            }


            @media print, screen and (max-width: 760px){

                .small-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}

            }

            .step{margin-bottom:2.5625rem;margin-left:.9375rem;margin-right:.9375rem}

            @media screen and (min-width: 480px){
                .step img {
                    max-height: 5.375rem;
                    min-height: 80px;
                }
            }

            .step img {
                max-width: 100%;
                max-height: 80px;
            }


            .ic-img{display:inline-block;vertical-align:middle;max-width:100%;height:auto;-ms-interpolation-mode:bicubic}



            .steps--en .step__header_en{display:block}

            .step__header{font-weight:700;font-size:20px;color:#444;margin-top: 20px;}


            @media screen and (min-width: 30em){

                .step__header{

                    font-size: 20px;
                    margin-top: 20px;

                }


            }




            .steps--en .step__description_en{

                display: block;
            }

            @media screen and (min-width: 480px){

                .steps__items p{

                    font-size: 17px;
                }
            }

            .steps__items p{

                font-size: 17px;
                color: #999;
            }




            .ic-p{margin-bottom:1rem;font-size:inherit;line-height:1.6;text-rendering:optimizeLegibility}


            #usp{

                background: #fff;
            }

            .usp{padding-top:3rem;padding-bottom:3rem;background-color:#F3F3F3}

            .large-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}

            @media screen and (min-width: 30em)
            {
                .usps__row{

                    padding: 1.25rem;
                }
            }

            .usps__row{-ms-flex-pack:center;justify-content:center}



            .small-11{-ms-flex:0 0 91.66667%;flex:0 0 91.66667%;max-width:91.66667%;margin-bottom: 20px;}


            @media print, screen and (min-width: 30em)
            {
                .medium-8{-ms-flex:0 0 66.66667%;flex:0 0 66.66667%;max-width:66.66667%;margin-bottom: 20px;}
            }

            @media print, screen and (min-width: 64em)
            {
                .large-4{-ms-flex:0 0 33.33333%;flex:0 0 33.33333%;max-width:33.33333%}
            }




            @media screen and (min-width: 64em)
            {
                .usp__block{min-height:26rem;padding:1.525rem}
            }


            .usp__block {
                box-shadow: 0px 0px 5px 4px #f3f3f3;
                border: 1px solid #dddddd;
                min-height: 42rem;
            }



            @media screen and (min-width: 1024px)
            {

                .usp__block
                {
                    min-height: 42rem;
                }
            }


            .usp__block{height: 100%;text-align:center;font-family:"Lato", sans-serif;border:solid;border-width:thin;border-color:#ccc;margin:0.1875rem;padding:1.525rem 1.525rem 2.525rem;min-width:8.25rem;background-color:#fff}


            .usp__block div{

                min-height: 7rem;
            }

            .usp__block div{display:block;text-decoration:none;color:#666;padding-top:0.5rem;font-weight:600;min-height:9rem;margin-bottom: 20px;}

            .usp__block img {
                max-width: 100%;
                height: 80px;
                padding-bottom:0.5rem;
            }


            .usp__block__title{margin-top:0;margin-bottom:0;font-size:20px;color:#444}

            @media screen and (min-width: 30em)
            {
                .usp__block span{

                    font-size: 13px;
                }
            }

            .usp__block span{font-weight:300;color:#666;font-size:15px;word-break: break-word;}




            @media print, screen and (max-width: 1600px){

                .row2{

                    max-width: 80% !important;
                }

            }

            @media print, screen and (max-width: 1200px){

                .row2{

                    max-width: 90% !important;
                }

            }

        </style>

        @if(count($lblogs) > 0)

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>{{$lang->lns}}</h2>
                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel blog-area-slider">
                            @foreach($lblogs as $lblog)
                                <a href="{{route('front.blogshow',$lblog->title)}}" class="single-blog-box">

                                    <div class="blog-thumb-wrapper">
                                        @if($lblog->photo)
                                            <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="Blog Image">
                                        @else
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSCM_FnlKpZr_N7Pej8GA40qv63zVgNc0MFfejo35drsuxLUcYG" alt="Blog Image">
                                        @endif
                                    </div>

                                    <div class="blog-text">

                                        <h4 style="height: auto;margin-bottom: 10px;">{{$lblog->title}}</h4>
                                        <p style="height: 120px;text-overflow: ellipsis;display: -webkit-box;width: 100%;visibility: visible;-webkit-line-clamp: 4;-webkit-box-orient: vertical;overflow: hidden;line-height: 2;font-size: 15px;">{{substr(strip_tags($lblog->details),0,250)}}</p>
                                        <span class="boxed-btn blog">{{$lang->vd}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        @endif

    </div>
    <!-- Ending of blog area -->

    <style>

        .select2-container{

            height: 100%;
        }

        .select2-container--default .select2-selection--single{

            height: 100%;
            padding: 7px;
            border: none;
            border-radius: 0;
            outline: none;

        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{

            padding: 19px;
        }

        .select2-selection__clear{

            display: none;
        }

    </style>

    <script type="text/javascript">

        $(document).ready(function() {

            if(window.location.hash) {
                var hash = window.location.hash;
                $(hash).modal('toggle');
            }

        });

    </script>

    <script>

        $(".js-data-example-ajax0").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Service')}}",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });


        $(".js-data-example-ajax10").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Service')}}",
            allowClear: true,
            dropdownParent: $('#aanvragen'),
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });


        $(".js-data-example-ajax1").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Category')}}",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });

        $(".js-data-example-ajax3").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Brand')}}",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });

        $(".js-data-example-ajax4").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Model')}}",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });

        $(".js-data-example-ajax7").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Color')}}",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });

        $(".js-data-example-ajax2").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Category')}}",
            allowClear: true,
            dropdownParent: $('#aanvragen'),
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });

        $(".js-data-example-ajax5").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Brand')}}",
            allowClear: true,
            dropdownParent: $('#aanvragen'),
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },

        });

        $(".js-data-example-ajax6").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Model')}}",
            allowClear: true,
            dropdownParent: $('#aanvragen'),
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },

        });

        $(".js-data-example-ajax9").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Product')}}",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },

        });

        $(".js-data-example-ajax11").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Product')}}",
            allowClear: true,
            dropdownParent: $('#aanvragen'),
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },

        });

        $(".js-data-example-ajax12").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Type')}}",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },

        });

    </script>

    <script src="{{asset('assets/front/js/aos.js')}}"></script>
    <script>
        AOS.init({
            disable: 'mobile',
            once: true
        });
    </script>

    <script src="{{asset('assets/front/js/how-it-works.js')}}"></script>
    <script src="{{asset('assets/front/js/lottie-player.js')}}"></script>

@endsection
