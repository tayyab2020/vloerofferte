@extends('layouts.front')
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

    </style>
@endsection
@section('content')


    <div class="hero-area overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});z-index: auto;color: black;padding-top: 20px;padding-bottom: 45px;background-color: #ebebeb;">

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


        <div class="container" style="width: 100%;">

            <div class="row" style="display: flex;justify-content: center;">

                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" id="quote-con">

                    <h3 class="box-heading" style="text-align: center;padding-top: 25px;color: black;/*text-shadow: 1px 2px 5px #4f4f4f;*/font-weight: 500;">{{__('text.Fill information for Quotation')}}</h3>

                    {{--<h1 style="color: black;">{{$gs->bg_title}}</h1>
                    <p>{!!$gs->bg_text!!}</p>--}}

                    <style>
                        .main-form
                        {
                            background-color: {{($gs->form_bg == null) ? (($gs->colors == null) ? '#f3bd02 !important;' : $gs->colors.' !important;') : $gs->form_bg. ' !important;' }};
                            color: {{($gs->form_col != null) ? $gs->form_col. ' !important;' : 'black !important;' }};
                            border: 1px solid {{($gs->form_ic == null) ? (($gs->colors == null) ? '#f3bd02 !important;' : $gs->colors.' !important;') : $gs->form_ic. ' !important;' }};
                        }
                    </style>

                    <div class="main-form" style="border-radius: 10px;box-shadow: 0px 0px 4px 0px #dbdbdb;">

                        <div id="quote-box" style="display: flex;justify-content: space-between;width: 100%;padding: 20px;">

                            <div style="width: 20%;">

                                <select class="js-data-example-ajax1 form-control quote-service" name="group" id="blood_grp">

                                    <option value="">{{__('text.Select Category')}}</option>

                                    @if($lang->lang == 'eng')

                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->cat_slug}}</option>
                                        @endforeach

                                    @else

                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                        @endforeach

                                    @endif

                                </select>

                            </div>

                            <div style="width: 20%;">

                                <select class="js-data-example-ajax3 form-control quote-brand" name="group" id="blood_grp">

                                    <option value="">{{__('text.Select Brand')}}</option>

                                </select>

                            </div>

                            <div style="width: 20%;">

                                <select class="js-data-example-ajax4 quote-model form-control" name="group" id="blood_grp">

                                    <option value="">{{__('text.Select Model')}}</option>

                                </select>

                            </div>

                            <div style="width: 20%;">

                                <input type="text" style="height: 100%;" name="model_number" class="form-control quote-model-number" placeholder="{{__('text.Model Number (Optional)')}}" />

                            </div>

                            <button href="#aanvragen" role="button" data-toggle="modal" style="height: 45px;min-width: 100px;float: right;border: 0;outline: none;font-size: 18px;" class="btn btn-primary">{{__('text.Search')}}</button>

                        </div>
                    </div>

                    <div class="header-top-area" style="border-radius: 10px;margin-top: 10px;">
                        <div class="container" style="width: 100%;">

                            <div class="row" style="display: flex;">

                                <div style="width: 100%;">
                                    <div>
                                        <ul style="display: flex;justify-content: center;">
                                            <li class="t-h" style="display: flex;align-items: center;">
                                                <img style="width: 20px;height: 20px;margin-right: 5px;" src="{{asset('assets/images/deal.png')}}">
                                                <span style="vertical-align: inherit;">{!! __('text.Your reliable partner') !!}</span>
                                            </li>
                                            <li class="c-h" style="display: flex;align-items: center;">
                                                <img style="width: 20px;height: 20px;margin-right: 5px;" src="{{asset('assets/images/deal.png')}}">
                                                <span style="vertical-align: inherit;">{!! __('text.We match supply and demand transparently') !!}</span>
                                            </li>
                                            <li class="t-h" style="display: flex;align-items: center;">
                                                <img style="width: 20px;height: 20px;margin-right: 5px;" src="{{asset('assets/images/deal.png')}}">
                                                <span style="vertical-align: inherit;">{!! __('text.We are involved in the growth of your company') !!}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="main-form" style="border-radius: 10px;box-shadow: 0px 0px 4px 0px #dbdbdb;margin-top: 10px;">

                        <div id="quote-box" style="display: flex;justify-content: space-between;width: 100%;padding: 20px;">

                            <div style="width: 90%;">

                                <div class="autocomplete" style="width:100%;">
                                    <input id="productInput" class="form-control quote-product" type="text" name="product" placeholder="{{__('text.Select Product')}}">
                                </div>

                                <select style="display: none;" class="form-control all-products" name="group" id="blood_grp">

                                    @foreach($products as $product)
                                        <option data-cat="{{$product->cat_name}}" value="{{$product->id}}">{{$product->title}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <button href="#aanvragen" role="button" data-toggle="modal" style="height: 45px;min-width: 100px;float: right;border: 0;outline: none;font-size: 18px;" class="btn btn-primary">{{__('text.Search')}}</button>

                        </div>
                    </div>

                    <div id="aanvragen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                            <form id="quote_form" method="post" action="{{route('user.quote')}}">

                                <input type="hidden" name="_token" value="{{@csrf_token()}}">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button style="background-color: white !important;color: black !important;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">{{__('text.Ask for Quotation')}}</h3>
                                    </div>
                                    <div class="modal-body" id="myWizard">

                                        <div class="progress" style="height: 25px;">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 20%;line-height: 25px;font-size: 14px;font-weight: 100;background-color: {{$gs->colors == null ? '#f3bd02':$gs->colors}};">
                                                {{__('text.Step')}} 1
                                            </div>
                                        </div>

                                        <div class="navbar" style="display: none;">
                                            <div class="navbar-inner">
                                                <ul class="nav nav-pills">
                                                    <li class="active"><a href="#step1" data-toggle="tab" data-step="1">{{__('text.Step')}} 1</a></li>
                                                    <li><a href="#step2" data-toggle="tab" data-step="2">{{__('text.Step')}} 2</a></li>
                                                    <li><a href="#step3" data-toggle="tab" data-step="3">{{__('text.Step')}} 3</a></li>
                                                    <li><a href="#step4" data-toggle="tab" data-step="4">{{__('text.Step')}} 4</a></li>
                                                    <li><a href="#step5" data-toggle="tab" data-step="5">{{__('text.Step')}} 5</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="tab-content">

                                            <div class="tab-pane fade in active" id="step1">

                                                <div class="well">

                                                    <h3 style="text-align: center;color: #4b4b4b;margin-bottom: 30px;">{{__('text.Fill information for Quotation')}}</h3>

                                                    <div style="margin-bottom: 40px;">

                                                        <select class="js-data-example-ajax2 form-control quote-service quote_validation" style="height: 40px;" name="quote_service" id="blood_grp" required>

                                                            <option value="">{{__('text.Select Category')}}</option>

                                                            @if($lang->lang == 'eng')

                                                                @foreach($cats as $cat)
                                                                    <option value="{{$cat->id}}">{{$cat->cat_slug}}</option>
                                                                @endforeach

                                                            @else

                                                                @foreach($cats as $cat)
                                                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                                @endforeach

                                                            @endif

                                                        </select>

                                                    </div>


                                                    <div style="margin-bottom: 40px;">

                                                        <select class="js-data-example-ajax5 form-control quote-brand quote_validation" style="height: 40px;" name="quote_brand" id="blood_grp" required>

                                                            <option value="">{{__('text.Select Brand')}}</option>

                                                        </select>

                                                    </div>


                                                    <div style="margin-bottom: 40px;">

                                                        <select class="js-data-example-ajax6 form-control quote-model quote_validation" style="height: 40px;" name="quote_model" id="blood_grp" required>

                                                            <option value="">{{__('text.Select Model')}}</option>

                                                        </select>

                                                    </div>


                                                    <div>

                                                        <input style="height: 40px;border: 1px solid #e1e1e1;" type="text" name="quote_model_number" placeholder="{{__('text.Model Number (Optional)')}}" class="form-control quote-model-number">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="step2">
                                                <div class="well">

                                                    <h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">{{__('text.Where do you need the job done?')}}</h3>

                                                    <input style="height: 40px;" type="search" name="quote_zipcode" id="quote-zipcode" class="form-control quote_validation" placeholder="{{$lang->spzc}}" autocomplete="off">
                                                    <input type="hidden" id="check_address" value="0">
                                                    <input id="postcode" name="postcode" type="hidden">
                                                    <input name="city" id="city" type="hidden">

                                                </div>
                                            </div>


                                            <div class="tab-pane fade" id="step3">

                                                <div class="well" style="height: 300px;"></div>

                                                <div style="width: 100%;position: relative;height: 2rem;bottom: 2rem;background: linear-gradient(rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 25%, rgb(255, 255, 255) 100%);"></div>

                                            </div>

                                            <div class="tab-pane fade" id="step4">

                                                <div class="well" style="height: 300px;">

                                                    <h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">{{__('text.Provide a description of your job')}}</h3>

                                                    <textarea style="resize: vertical;" rows="7" name="quote_description" class="form-control quote_validation" placeholder="{{__('text.Providing more details increases interest from tradies')}}"></textarea>

                                                </div>

                                                <div style="width: 100%;position: relative;height: 2rem;bottom: 2rem;background: linear-gradient(rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 25%, rgb(255, 255, 255) 100%);"></div>

                                            </div>

                                            <div class="tab-pane fade" id="step5">
                                                <div class="well" style="height: 300px;">

                                                    <h3 style="text-align: center;color: #4b4b4b;margin-bottom: 20px;">{{__('text.Please provide some contact details.')}}</h3>

                                                    <label>{{__('text.Name')}} <span style="color: red;">*</span></label>
                                                    <input style="height: 45px;margin-bottom: 20px;" type="text" name="quote_name" class="form-control quote_validation" placeholder="{{__('text.Enter Name')}}" autocomplete="off">

                                                    <label>{{__('text.Family Name')}} <span style="color: red;">*</span></label>
                                                    <input style="height: 45px;margin-bottom: 20px;" type="text" name="quote_familyname" class="form-control quote_validation" placeholder="{{__('text.Enter Family Name')}}" autocomplete="off">

                                                    <label>{{__('text.Email')}} <span style="color: red;">*</span></label>
                                                    <input style="height: 45px;margin-bottom: 20px" type="email" name="quote_email" class="form-control quote_validation" placeholder="{{__('text.Enter Email')}}">

                                                    <label>{{__('text.Contact Number')}} <span style="color: red;">*</span></label>
                                                    <input style="height: 45px;margin-bottom: 20px" type="text" name="quote_contact" class="form-control quote_validation" placeholder="{{__('text.Enter Contact Number')}}" autocomplete="off">

                                                    <div>

                                                        <label style="align-items: flex-start;font-size: 12px;padding-left: 25px;margin-bottom: 0;" class="container-checkbox terms">{{__('text.Your details will be used to create a job post, so that you can monitor and manage the job you\'ve posted.')}}
                                                            <input name="permission" class="permission_validation" type="checkbox" value="1">
                                                            <span style="top: 7px;width: 15px;height: 15px;border: 1px solid #8d8d8d;" class="checkmark-checkbox permission-checkbox"></span>
                                                        </label>

                                                    </div>

                                                    <br>

                                                    <small style="text-align: center;display: block;width: 80%;margin: auto;margin-bottom: 10px;">{{__('text.By pressing Get Quotes you agree to the')}} <a target="_blank" href="{{asset('assets/'.$data->file)}}">{{__('text.terms and conditions')}}</a> {{__('text.of our website.')}}</small>

                                                </div>
                                                <div style="width: 100%;position: relative;height: 2rem;bottom: 1rem;background: linear-gradient(rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 25%, rgb(255, 255, 255) 100%);"></div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button style="border: 0;display: none;outline: none;background-color: #e5e5e5 !important;color: black !important;" class="btn back">{{__('text.Back')}}</button>
                                        <button style="border: 0;outline: none;background-color: {{$gs->colors == null ? '#f3bd02':$gs->colors}} !important;" class="btn btn-primary next">{{__('text.Continue')}}</button>
                                        <button style="display: none;border: 0;outline: none;background-color: {{$gs->colors == null ? '#f3bd02':$gs->colors}} !important;" class="btn btn-primary next-submit">{{__('text.Get Quotes')}}</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                    <style>

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
                            border-bottom: none;
                            border-top: none;
                            z-index: 99;
                            /*position the autocomplete items to be the same width as the container:*/
                            top: 100%;
                            left: 0;
                            right: 0;
                        }

                        .autocomplete-items div {
                            padding: 10px;
                            cursor: pointer;
                            background-color: #fff;
                            border-bottom: 1px solid #d4d4d4;
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
                                margin: 5px;
                                height: 45px;
                            }

                            #quote-box button
                            {
                                width: 100%;
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

                </div>

            </div>
        </div>
    </div>
    <!-- Ending of Hero area -->

    <section id="steps" class="steps steps--en">
        <div class="row row1" style="max-width: 80%;margin-left: auto;margin-right: auto;display: flex;flex-flow: row wrap;">
            <div class="small-12 columns" style="padding-top: 20px;">
                <h2 class="hiw">{{$lang->hiwh}}</h2>

                {{--@if($language == 'eng')

                    <div id="languagePickerContainer">
                        <a class="languageSelector" onclick="changeLanguage(1)" id="dutch" title="dutch">Nederlands</a>
                        <div class="infographic__separator">·</div>
                        <a class="languageSelector languageSelector-selected" title="english" id="english" onclick="changeLanguage(0)">English</a>
                    </div>


                @else

                    <div id="languagePickerContainer">
                        <a class="languageSelector languageSelector-selected" onclick="changeLanguage(1)" id="dutch" title="dutch">Nederlands</a>
                        <div class="infographic__separator">·</div>
                        <a class="languageSelector" title="english" id="english" onclick="changeLanguage(0)">English</a>
                    </div>


                @endif--}}

            </div>
        </div>
        <div class="row steps__items row1" style="max-width: 80%;margin-left: auto;margin-right: auto;display: flex;flex-flow: row wrap;margin-top: 35px;">
            <div class="small-12 medium-6 large-3 columns">
                <div class="step"> <img src="{{asset('assets/images/Profile PNG.png')}}" class="ic-img">
                    <div class="step__header step__header_en @if($language == 'du') hide @endif"> 1. {{$hiw->heading1}}</div>
                    <div class="step__header step__header_de @if($language == 'eng') hide @endif"> 1. {{$hiw->dh1}}</div>
                    <p class="step_description step__description_en ic-p @if($language == 'du') hide @endif"> {{$hiw->desc1}} </p>
                    <p class="step_description step__description_de ic-p @if($language == 'eng') hide @endif"> {{$hiw->dd1}} </p>
                </div>
            </div>
            <div class="small-12 medium-6 large-3 columns">
                <div class="step"> <img src="{{asset('assets/images/Date PNG.png')}}" class="ic-img">
                    <div class="step__header step__header_en @if($language == 'du') hide @endif"> 2. {{$hiw->heading2}}</div>
                    <div class="step__header step__header_de @if($language == 'eng') hide @endif"> 2. {{$hiw->dh2}}</div>
                    <p class="step_description step__description_en ic-p @if($language == 'du') hide @endif"> {{$hiw->desc2}} </p>
                    <p class="step_description step__description_de ic-p @if($language == 'eng') hide @endif"> {{$hiw->dd2}} </p>
                </div>
            </div>
            <div class="small-12 medium-6 large-3 columns">
                <div class="step"> <img src="{{asset('assets/images/Send Reservation PNG.png')}}" class="ic-img">
                    <div class="step__header step__header_en @if($language == 'du') hide @endif"> 3. {{$hiw->heading3}}</div>
                    <div class="step__header step__header_de @if($language == 'eng') hide @endif"> 3. {{$hiw->dh3}}</div>
                    <p class="step_description step__description_en ic-p @if($language == 'du') hide @endif"> {{$hiw->desc3}} </p>
                    <p class="step_description step__description_de ic-p @if($language == 'eng') hide @endif"> {{$hiw->dd3}}  </p>
                </div>
            </div>
            <div class="small-12 medium-6 large-3 columns">
                <div class="step"> <img src="{{asset('assets/images/Warranty.png')}}" class="ic-img">
                    <div class="step__header step__header_en @if($language == 'du') hide @endif"> 4. {{$hiw->heading4}}</div>
                    <div class="step__header step__header_de @if($language == 'eng') hide @endif"> 4. {{$hiw->dh4}}</div>
                    <p class="step_description step__description_en ic-p @if($language == 'du') hide @endif"> {{$hiw->desc4}} </p>
                    <p class="step_description step__description_de ic-p @if($language == 'eng') hide @endif"> {{$hiw->dd4}}  </p>
                </div>
            </div>
            <div class="small-12 medium-6 large-3 columns">
                <div class="step"> <img src="{{asset('assets/images/Location PNG.png')}}" class="ic-img">
                    <div class="step__header step__header_en @if($language == 'du') hide @endif"> 5. {{$hiw->heading5}}</div>
                    <div class="step__header step__header_de @if($language == 'eng') hide @endif"> 5. {{$hiw->dh5}}</div>
                    <p class="step_description step__description_en ic-p @if($language == 'du') hide @endif"> {{$hiw->desc5}} </p>
                    <p class="step_description step__description_de ic-p @if($language == 'eng') hide @endif"> {{$hiw->dd5}}  </p>
                </div>
            </div>
            <div class="small-12 medium-6 large-3 columns">
                <div class="step"> <img src="{{asset('assets/images/Payment PNG.png')}}" class="ic-img">
                    <div class="step__header step__header_en @if($language == 'du') hide @endif"> 6. {{$hiw->heading6}}</div>
                    <div class="step__header step__header_de @if($language == 'eng') hide @endif"> 6. {{$hiw->dh6}}</div>
                    <p class="step_description step__description_en ic-p @if($language == 'du') hide @endif"> {{$hiw->desc6}} </p>
                    <p class="step_description step__description_de ic-p @if($language == 'eng') hide @endif"> {{$hiw->dd6}}  </p>
                </div>
            </div>
        </div>

    </section>


    <!-- Starting of blog area -->
    <div class="section-padding blog-area-wrapper wow fadeInUp">

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


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNlftIg-4OOM7dicTvWaJm46DgD-Wz61Q&libraries=places&callback=initMap" async defer></script>

        <script type="text/javascript">

            function initMap() {

                var input = document.getElementById('quote-zipcode');

                var options = {
                    componentRestrictions: {country: "nl"}
                };

                var autocomplete = new google.maps.places.Autocomplete(input,options);

                // Set the data fields to return when the user selects a place.
                autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);


                autocomplete.addListener('place_changed', function() {

                    var flag = 0;

                    var place = autocomplete.getPlace();


                    if (!place.geometry) {

                        // User entered the name of a Place that was not suggested and
                        // pressed the Enter key, or the Place Details request failed.
                        window.alert("{{__('text.No details available for input: ')}}" + place.name);
                        return;
                    }
                    else
                    {
                        var string = $('#quote-zipcode').val().substring(0, $('#quote-zipcode').val().indexOf(',')); //first string before comma

                        if(string)
                        {
                            var is_number = $('#quote-zipcode').val().match(/\d+/);

                            if(is_number === null)
                            {
                                flag = 1;
                            }
                        }
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


                    if(postal_code == '' || city == '')
                    {
                        flag = 1;
                    }

                    if(!flag)
                    {
                        $('#check_address').val(1);
                        $("#address-error").remove();
                        $('#postcode').val(postal_code);
                        $("#city").val(city);
                    }
                    else
                    {
                        $('#quote-zipcode').val('');
                        $('#postcode').val('');
                        $("#city").val('');

                        $("#address-error").remove();
                        $('#quote-zipcode').parent().append('<small id="address-error" style="color: red;display: block;margin-top: 10px;">{{__('text.Kindly write your full address with house/building number so system can detect postal code and city from it!')}}</small>');
                    }

                });
            }

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

                $('.quote-model-number').keyup(function() {

                    $('.quote-model-number').val($(this).val());

                });

                $('.quote-model').change(function() {

                    var id = $(this).val();

                    $('.quote-model').val($(this).val());

                    $(".quote-model").trigger('change.select2');

                    $('.navbar a[href="#step1"]').trigger('click');

                    $('.back').hide();

                });

                $('.quote-brand').change(function() {

                    $('.quote-brand').val($(this).val());

                    $(".quote-brand").trigger('change.select2');

                    $('.navbar a[href="#step1"]').trigger('click');

                    $('.back').hide();

                    var brand_id = $(this).val();
                    var options = '';

                    $.ajax({
                        type:"GET",
                        data: "id=" + brand_id ,
                        url: "<?php echo url('/products-models-by-brands')?>",
                        success: function(data) {

                            $.each(data, function(index, value) {

                                var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';

                                options = options + opt;

                            });

                            $('.quote-model').find('option')
                                .remove()
                                .end()
                                .append('<option value="">Select Model</option>'+options);

                        }
                    });

                });

                $('.quote-service').change(function(){

                    $('.quote-service').val($(this).val());

                    $(".quote-service").trigger('change.select2');

                    $('.navbar a[href="#step1"]').trigger('click');

                    $('.back').hide();

                    var category_id = $(this).val();
                    var options = '';

                    $.ajax({
                        type:"GET",
                        data: "id=" + category_id,
                        url: "<?php echo url('get-questions')?>",

                        success: function(data) {

                            $('#step3').children('.well').empty();

                            var index_count = 0;

                            $.each(data, function (index, val) {

                                if(data.length == index + 1)
                                {
                                    $('#step3').children('.well').append('<div style="margin-bottom: 20px;"></div>');
                                }
                                else
                                {
                                    $('#step3').children('.well').append('<div style="margin-bottom: 40px;"></div>');
                                }

                                var last = $('#step3').children('.well').children().last('div');

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

                            $('#step3').children('.well').append('<input type="hidden" name="index_count" value="'+index_count+'">');

                            /*$('#step3').children('div').children('h3').
                            console.log(data);*/
                        }
                    });

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
                                .append('<option value="">Select Model</option>');

                            $('.quote-brand').find('option')
                                .remove()
                                .end()
                                .append('<option value="">Select Brand</option>'+options);

                        }
                    });

                });


                function autocomplete(inp, arr, values, categories) {
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
                        /*for each item in the array...*/
                        for (i = 0; i < arr.length; i++) {

                            var string = arr[i];
                            string = string.toLowerCase();
                            val = val.toLowerCase();
                            var res = string.includes(val);

                            if (res) {
                                /*create a DIV element for each matching element:*/
                                b = document.createElement("DIV");
                                /*make the matching letters bold:*/
                                /*b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                b.innerHTML += arr[i].substr(val.length);*/
                                b.innerHTML = arr[i] + ', ' + categories[i];
                                /*insert a input field that will hold the current array item's value:*/
                                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'><input type='hidden' value='" + values[i] + "'>";
                                /*execute a function when someone clicks on the item value (DIV element):*/
                                b.addEventListener("click", function(e) {
                                    /*insert the value for the autocomplete text field:*/
                                    inp.value = this.getElementsByTagName("input")[0].value;

                                    var product_id = this.getElementsByTagName("input")[1].value;
                                    var options = '';

                                    $.ajax({
                                        type: "GET",
                                        data: "id=" + product_id,
                                        url: "<?php echo url('/products-by-id')?>",
                                        success: function (data) {

                                            $('.quote-service').val(data.category_id);
                                            $(".quote-service").trigger('change.select2');

                                            var category_id = data.category_id;
                                            var brand_id = data.brand_id;
                                            var model_id = data.model_id;
                                            var options = '';

                                            $.ajax({
                                                type: "GET",
                                                data: "id=" + category_id,
                                                url: "<?php echo url('get-questions')?>",

                                                success: function (data) {

                                                    $('#step3').children('.well').empty();

                                                    var index_count = 0;

                                                    $.each(data, function (index, val) {

                                                        if (data.length == index + 1) {
                                                            $('#step3').children('.well').append('<div style="margin-bottom: 20px;"></div>');
                                                        } else {
                                                            $('#step3').children('.well').append('<div style="margin-bottom: 40px;"></div>');
                                                        }

                                                        var last = $('#step3').children('.well').children().last('div');

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

                                                    $('#step3').children('.well').append('<input type="hidden" name="index_count" value="' + index_count + '">');

                                                    /*$('#step3').children('div').children('h3').
                                                    console.log(data);*/
                                                }
                                            });

                                            $.ajax({
                                                type: "GET",
                                                data: "id=" + category_id,
                                                url: "<?php echo url('/products-brands-by-category')?>",
                                                success: function (data) {

                                                    $.each(data, function (index, value) {

                                                        var opt = '<option value="' + value.id + '" >' + value.cat_name + '</option>';

                                                        options = options + opt;

                                                    });

                                                    $('.quote-model').find('option')
                                                        .remove()
                                                        .end()
                                                        .append('<option value="">Select Model</option>');

                                                    $('.quote-brand').find('option')
                                                        .remove()
                                                        .end()
                                                        .append('<option value="">Select Brand</option>' + options);

                                                    $('.quote-brand').val(brand_id);
                                                    $(".quote-brand").trigger('change.select2');


                                                    var options = '';

                                                    $.ajax({
                                                        type: "GET",
                                                        data: "id=" + brand_id,
                                                        url: "<?php echo url('/products-models-by-brands')?>",
                                                        success: function (data) {

                                                            $.each(data, function (index, value) {

                                                                var opt = '<option value="' + value.id + '" >' + value.cat_name + '</option>';

                                                                options = options + opt;

                                                            });

                                                            $('.quote-model').find('option')
                                                                .remove()
                                                                .end()
                                                                .append('<option value="">Select Model</option>' + options);

                                                            $('.quote-model').val(model_id);
                                                            $(".quote-model").trigger('change.select2');

                                                        }
                                                    });

                                                }
                                            });

                                            $('.navbar a[href="#step1"]').trigger('click');

                                            $('.back').hide();

                                        }

                                    });

                                    /*close the list of autocompleted values,
                                    (or any other open lists of autocompleted values:*/
                                    closeAllLists();
                                });
                                a.appendChild(b);
                            }
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

                var sel = $(".all-products");
                var length = sel.children('option').length;

                $(".all-products > option").each(function() {
                    if (this.value) options.push(this.value); texts.push(this.text); categories.push(this.getAttribute('data-cat'));
                });

                /*for (var i=0, n=length;i<n;i++) { // looping over the options
                    console.log($('.all-products option:eq(i)').text());
                    if (sel.options[i].value) options.push(sel.options[i].value);
                }

                console.log(options);*/

                autocomplete(document.getElementById("productInput"), texts, options, categories);

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

                $('.next').click(function(){

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
                            if($(this).hasClass('select2-hidden-accessible'))
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
                            $(this).next().css('border','');
                            $(this).css('border','');

                        }

                    });

                    if(flag == 0 && flag1 == 0)
                    {
                        var nextId = $('.tab-content').find('.active').next().attr("id");
                        $('.nav-pills a[href="#' + nextId + '"]').tab('show');

                        $('.back').show();

                        if(nextId == 'step5')
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

                    var backId = $('.tab-content').find('.active').prev().attr("id");
                    $('.nav-pills a[href="#' + backId + '"]').tab('show');

                    if(backId == 'step1')
                    {
                        $('.back').hide();
                    }


                    return false;

                });

                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

                    //update progress
                    var step = $(e.target).data('step');
                    var percent = (parseInt(step) / 5) * 100;

                    $('.progress-bar').css({width: percent + '%'});
                    $('.progress-bar').text("{{__('text.Step')}} " + step);

                    //e.relatedTarget // previous tab

                });

                $('.first').click(function(){

                    $('#myWizard a:first').tab('show')

                });

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


            .image-flip:hover .backside,
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
            }

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

    <style type="text/css">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            if(window.location.hash) {
                var hash = window.location.hash;
                $(hash).modal('toggle');
            }

            $('#from_date').datepicker({

                format: 'dd-mm-yyyy',
                startDate: new Date(),

            });

            $('#to_date').datepicker({

                format: 'dd-mm-yyyy',
                startDate: new Date(),

            });

        });

    </script>

    <script>

        $(".js-data-example-ajax").select2({
            width: '100%',
            height: '200px',
            placeholder: "{{__('text.Select Category')}}",
            allowClear: true,
            dropdownParent: $('#service_box'),
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

    </script>

@endsection
