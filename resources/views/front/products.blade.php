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


    <div class="cd-filter filter-is-visible" id="cd-filter" style="position: relative;float: left;height: 915px;z-index: auto;border-right: 1px solid #e0e0e0;">

        <a href="#0" class="cd-filter-trigger filter-is-visible" style="margin-left: 15px;">{{$lang->ft}}</a>


        <form action="{{route('front.products')}}" method="get">

            {{csrf_field()}}

            <div class="cd-filter-block">
                <h4>Category</h4>

                <div class="cd-filter-content">
                    <div class="cd-select cd-filters">
                        <select class="filter categories" name="category" id="category">
                            <option value="">Select Category</option>
                            @foreach($cats as $key)
                                <option {{$category == $key->id ? 'selected' : null}} value="{{$key->id}}">{{$key->cat_name}}</option>
                            @endforeach
                        </select>
                    </div> <!-- cd-select -->
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            <div class="cd-filter-block">
                <h4>Brand</h4>

                <div class="cd-filter-content">
                    <div class="cd-select cd-filters">
                        <select class="filter brands" name="brand" id="brand">
                            <option value="">Select Brand</option>
                            @foreach($brands as $key)
                                <option {{$brand == $key->id ? 'selected' : null}} value="{{$key->id}}">{{$key->cat_name}}</option>
                            @endforeach
                        </select>
                    </div> <!-- cd-select -->
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            <div class="cd-filter-block">
                <h4>Model</h4>

                <div class="cd-filter-content">
                    <div class="cd-select cd-filters">
                        <select class="filter models" name="model" id="model">
                            <option value="">Select Model</option>
                            @foreach($models as $key)
                                <option {{$model == $key->id ? 'selected' : null}} value="{{$key->id}}">{{$key->cat_name}}</option>
                            @endforeach
                        </select>
                    </div> <!-- cd-select -->
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->


            <link href="{{ asset('assets/front/css/nouislider.min.css') }}" rel="stylesheet">
            <script src="{{ asset('assets/front/js/nouislider.js') }}"></script>


            <div class="cd-filter-block">
                <h4>{{$lang->fprt}}</h4>

                <input type="hidden" name="org_range_start" id="org_range-start" value="{{$lowest}}">
                <input type="hidden" name="org_range_end" id="org_range-end" value="{{$highest}}">

                <div class="cd-filter-content" style="margin-bottom: 50px;">
                    <div class="cd-filters">
                        <div id="slider" style="margin-top: 50px;"></div>

                        <span id="slider-lowest" style="float: left;margin-top: 10px;">€ {{$lowest}}</span>
                        <span id="slider-highest" style="float: right;margin-top: 10px;">€ {{$highest}}</span>

                        <input type="hidden" name="range_start" id="range-start" value="{{$s == "" ? $lowest : $s}}">
                        <input type="hidden" name="range_end" id="range-end" value="{{isEmpty($e) ? $highest : ($e == 0.00) ? 0 : $e}}">

                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

            </div>


            <script>
                var slider = document.getElementById('slider');

                var start = $('#range-start').val();
                var end = $('#range-end').val();

                noUiSlider.create(slider, {
                    start: [start,end],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: [{{$lowest}}],
                        max: [{{$highest}}]
                    }
                });


                slider.noUiSlider.on('set', function (values, handle) {

                    document.getElementById('range-start').value = values[0];
                    document.getElementById('range-end').value = values[1];

                });
            </script>

            <div class="cd-filter-block">
                <h4>Size</h4>

                <div class="cd-filter-content">
                    <div class="cd-select cd-filters">
                        <select class="filter sizes" name="size" id="size">
                            <option value="">Select Size</option>
                            @foreach($sizes as $key)
                                <option {{$size == $key->size ? 'selected' : null}} value="{{$key->size}}">{{$key->size}}</option>
                            @endforeach
                        </select>
                    </div> <!-- cd-select -->
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            <div class="cd-filter-block">
                <h4>Color</h4>

                <div class="cd-filter-content">
                    <div class="cd-select cd-filters">
                        <select class="filter colors" name="color" id="color">
                            <option value="">Select Color</option>
                            @foreach($colors as $key)
                                <option {{$color == $key->color ? 'selected' : null}} value="{{$key->color}}">{{$key->color}}</option>
                            @endforeach
                        </select>
                    </div> <!-- cd-select -->
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            <style type="text/css">

                .noUi-horizontal .noUi-handle
                {
                    outline: none;
                }


                @media only screen and (max-width: 991px) {

                    .hero-area h1, .hero-area h1.donors-header {

                        margin-left: 0px !important;
                    }

                    .hero-form {

                        margin-left: 0px;
                    }


                }

                .noUi-tooltip {
                    display: none;
                }

                .noUi-active .noUi-tooltip {
                    display: block;
                }


                .uk-link:hover, a:hover {
                    text-decoration: none !important;
                }


            </style>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit" style="font-size: 20px;">{{$lang->fbt}}</button>
                    </div>
                </div>
            </div>

        </form>

        <a href="#0" class="cd-close" style="background-color: #febb22;"><i class="icon ent-close" style="background-color: #febb22;"></i> {{$lang->fct}}</a>


        <!-- <a href="#0" class="cd-close"><i class="icon ent-close"></i> close </a> -->
    </div> <!-- cd-filter -->

    <a href="#0" class="cd-filter-trigger"
       style="color: white; position: relative; display: block; background-color: #003580; background-position-x: 33%; margin-left: 0px; left: 0px; padding-left: 0px; text-decoration: none; width: 35px; top: 0px; float: left;border-top-right-radius: 9px;border-bottom-right-radius: 10px;margin-top: 10px;"
       id="fltr-btn"></a>

    <div class="cd-main-content is-fixed" style="height: 915px;overflow-y: auto;min-height: 915px;">


        <div class="section-padding all-donors-wrap team_section team_style2 wow fadeInUp"
             style="visibility: visible; animation-name: fadeInUp;float: right;width: 100%;">
            <div class="container">

                <div class="row">

                    @foreach($all_products as $key)
                        <div class="col-lg-4 col-md-4 col-sm-4" style="z-index: 0;">
                            <div class="team_common">

                                <div style="width: 100%;background-color: white;">
                                    <a href="{{url('product/'.$key->id)}}">
                                        <div class="member_img"
                                             style="width: 100%;border: 0;display: inline-block;height: 210px;">

                                            @if($key->photo)

                                                <img
                                                    src="{{asset('assets/images/'.$key->photo)}}"
                                                    alt="member image"
                                                    style="width: 100%;height: 100%;">

                                            @elseif(file_exists('assets/images/'.$key->article_code.'.jpeg'))

                                                <img
                                                    src="{{asset('assets/images/'.$key->article_code.'.jpeg')}}"
                                                    alt="member image"
                                                    style="width: 100%;height: 100%;">

                                            @else

                                                <img
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSCM_FnlKpZr_N7Pej8GA40qv63zVgNc0MFfejo35drsuxLUcYG"
                                                    alt="member image"
                                                    style="width: 100%;height: 100%;">

                                            @endif

                                        </div>
                                    </a>

                                    <div style="display: inline-block;width: 100%;text-align: center;min-height: 70px;">
                                        <p style="font-size: 18px;font-weight: bold;color: black;text-overflow: ellipsis;display: -webkit-box;width: 100%;visibility: visible;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;line-height: 2;padding: 0 10px;">{{$key->title}}</p>
                                        <small>{{$key->model_number}}</small>
                                    </div>


                                    <div style="display: flex;justify-content: center;width: 100%;text-align: center;margin-bottom: 10px;">
                                        <button data-id="{{$key->id}}" href="#aanvragen" role="button" data-toggle="modal" style="height: 35px;min-width: 100px;float: right;border: 0;outline: none;font-size: 18px;display: flex;align-items: center;" class="btn btn-primary start-btn">{{__('text.Start')}}</button>
                                    </div>


                                </div>

                            </div>
                        </div>

                    @endforeach



                    <style type="text/css">

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

                        .team_style2 .team_common
                        {
                            border: 0;
                            box-shadow: 2px 2px 5px 1px #d7d7d7;
                        }

                        @media (max-width: 890px) {
                            .next1 {
                                right: 35px !important;
                            }
                        }

                        @media (max-width: 550px) {
                            .next1 {
                                width: 10% !important;
                            }
                        }

                        @media (max-width: 450px) {
                            .next1 {
                                width: 12% !important;
                            }
                        }

                    </style>


                </div>

            </div>
            <div class="text-center">
                {!! $all_products->appends(['range_start' => $range_s, 'range_end' => $range_e, 'category' => $category, 'brand' => $brand, 'model' => $model, 'size' => $size, 'color' => $color])->links() !!}
            </div>
        </div>

    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLY8yBITvKeBs1k95HeMuCGgPgVGZRYi0&libraries=places&callback=initMap" async defer></script>

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

            $('.quote-category').change(function(){

                $('.quote-category').val($(this).val());

                $(".quote-category").trigger('change.select2');

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

                $('#myWizard a:first').tab('show');

            });

            $('.start-btn').click(function(){

                var product_id = $(this).data('id');
                var options = '';

                $.ajax({
                    type: "GET",
                    data: "id=" + product_id,
                    url: "<?php echo url('/products-by-id')?>",
                    success: function (data) {

                        $('.quote-category').val(data.category_id);
                        $(".quote-category").trigger('change.select2');

                        var category_id = data.category_id;
                        var brand_id = data.brand_id;
                        var model_id = data.model_id;
                        var model_number = data.model_number;
                        var options = '';

                        $('.quote-model-number').val(model_number);

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

            });

        });

    </script>

    <style type="text/css">

        @media only screen and (max-width: 767px)
        {
            .subscribe-newsletter-wrapper
            {
                padding-top: 40px;
            }
        }

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

    <style>

        .cd-filters .select2-container--default .select2-selection--single
        {
            border: 1px solid #aaa !important;
            border-radius: 4px !important;
        }

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

        .cd-filters .select2-selection__clear{
            position: relative;
            right: 5px;
            top: 1px;
            z-index: 1000;
            display: block !important;
        }

        .select2-selection__clear
        {
            display: none;
        }

    </style>

    <style type="text/css">

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

    <script>

        $(".categories").select2({
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


        $('.categories').change(function() {

            var id = $(this).val();
            var options = '';
            var options1 = '';

            if(id != '')
            {
                $.ajax({
                    type:"GET",
                    data: "id=" + id ,
                    url: "<?php echo url('/products-data-by-category')?>",
                    success: function(data) {

                        var highest = data[2];
                        var lowest = data[3];

                        if(highest != null && lowest != null && highest != lowest)
                        {
                            slider.noUiSlider.updateOptions({
                                range: {
                                    'min': lowest,
                                    'max': highest
                                },
                                start: [lowest,highest],
                            });

                            $("#slider-lowest").text('€ '+ lowest);
                            $("#slider-highest").text('€ '+ highest);

                            $('#org_range-start').val(lowest);
                            $('#org_range-end').val(highest);
                        }

                        $.each(data[0], function(index, value) {

                            var measure = value.measure;

                            var size_count = 0;
                            var sizes = value.size;
                            sizes = sizes.split(',');

                            if(value.size != '')
                            {
                                size_count = sizes.length;
                            }

                            if(size_count > 0)
                            {
                                for(var i=0;i<size_count;i++)
                                {
                                    var opt = '<option value="'+sizes[i]+'" >'+sizes[i] +' '+measure+'</option>';
                                    options = options + opt;
                                }
                            }

                        });

                        $.each(data[1], function(index, value) {

                            var color_count = 0;
                            var colors = value.color;
                            colors = colors.split(',');

                            if(value.color != '')
                            {
                                color_count = colors.length;
                            }

                            if(color_count > 0)
                            {
                                for(var i=0;i<color_count;i++)
                                {
                                    var opt1 = '<option value="'+colors[i]+'" >'+colors[i]+'</option>';
                                    options1 = options1 + opt1;
                                }
                            }

                        });

                        $('.sizes').find('option')
                            .remove()
                            .end()
                            .append('<option value="">Select Size</option>'+options);

                        $('.colors').find('option')
                            .remove()
                            .end()
                            .append('<option value="">Select Color</option>'+options1);

                    }
                });
            }

        });


        $(".brands").select2({
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

        $(".models").select2({
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


        $(".sizes").select2({
            width: '100%',
            height: '200px',
            placeholder: "Select Size",
            allowClear: true,
            "language": {
                "noResults": function(){
                    return '{{__('text.No results found')}}';
                }
            },
        });

        $(".colors").select2({
            width: '100%',
            height: '200px',
            placeholder: "Select Color",
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

        jQuery(document).ready(function ($) {
            //open/close lateral filter

            $('#fltr-btn').hide();

            //close filter dropdown inside lateral .cd-filter
            $('.cd-filter-block h4').on('click', function () {
                $(this).toggleClass('closed').siblings('.cd-filter-content').slideToggle(300);
            })

            $('.cd-filter-trigger').on('click', function () {
                triggerFilter(true);
            });

            $('.cd-filter .cd-close').on('click', function () {
                triggerFilter(false);
            });


            var windowWidth = $(window).width();

            if (windowWidth < 768) {
                triggerFilter(false);
            }

            function triggerFilter($bool) {
                var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('.cd-gallery')]);
                elementsToTrigger.each(function () {
                    $(this).toggleClass('filter-is-visible', $bool);
                });

                if ($bool) {

                    setTimeout(function () {
                        $('#cd-filter').show('slow');
                        $('#fltr-btn').hide('slow');
                    }, 100);

                } else {

                    setTimeout(function () {
                        $('#cd-filter').hide('slow');
                        $('#fltr-btn').show('slow');
                    }, 100);

                }


            }

            //fix lateral filter and gallery on scrolling
            $(window).on('scroll', function () {
                (!window.requestAnimationFrame) ? fixGallery() : window.requestAnimationFrame(fixGallery);
            });

            function fixGallery() {
                var offsetTop = $('.cd-main-content').offset().top,
                    scrollTop = $(window).scrollTop();
                (scrollTop >= offsetTop) ? $('.cd-main-content').addClass('is-fixed') : $('.cd-main-content').removeClass('is-fixed');
            }

            /************************************
             MitItUp filter settings
             More details:
             https://mixitup.kunkalabs.com/
             or:
             https://codepen.io/patrickkunka/
             *************************************/


        });

    </script>

    <style type="text/css">

        /* reset.css */

        /* https://meyerweb.com/eric/tools/css/reset/
           v2.0 | 20110126
           License: none (public domain)
        */

        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section, main {
            display: block;
        }

        body, * {
            font-family: MuseoSans, "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        ol, ul {
            list-style: none;
        }

        blockquote, q {
            quotes: none;
        }

        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        a, a:active, a:focus {
            outline: none;
        }


        /* --------------------------------

        Additional Styles

        -------------------------------- */
        *, *::after, *::before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        html * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a {
            color: #f03d6c;
            text-decoration: none;
        }

        /* --------------------------------

        Main Components

        -------------------------------- */
        .cd-header {
            position: relative;
            height: 150px;
            background-color: #70e5cd;
        }

        .cd-header h1 {
            color: #ffffff;
            line-height: 150px;
            text-align: center;
        }

        @media only screen and (min-width: 1170px) {
            .cd-header {
                height: 180px;
            }

            .cd-header h1 {
                line-height: 180px;
            }
        }

        .cd-main-content {
            position: relative;
            min-height: 100vh;
        }

        .cd-main-content:after {
            content: "";
            display: table;
            clear: both;
        }

        .cd-main-content.is-fixed .cd-tab-filter-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }

        .cd-main-content.is-fixed .cd-gallery {
            padding-top: 76px;
        }

        .cd-main-content.is-fixed .cd-filter {
            position: fixed;
            height: 100vh;
            overflow: hidden;
        }

        .cd-main-content.is-fixed .cd-filter form {
            height: 100vh;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }

        .cd-main-content.is-fixed .cd-filter-trigger {
            position: fixed;
        }

        @media only screen and (min-width: 768px) {
            .cd-main-content.is-fixed .cd-gallery {
                padding-top: 90px;
            }
        }

        @media only screen and (min-width: 1170px) {
            .cd-main-content.is-fixed .cd-gallery {
                padding-top: 100px;
            }
        }

        /* --------------------------------

        xtab-filter

        -------------------------------- */
        .cd-tab-filter-wrapper {
            background-color: #ffffff;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
            z-index: 1;
        }

        .cd-tab-filter-wrapper:after {
            content: "";
            display: table;
            clear: both;
        }

        .cd-tab-filter {
            /* tabbed navigation style on mobile - dropdown */
            position: relative;
            height: 50px;
            width: 140px;
            margin: 0 auto;
            z-index: 1;
        }

        .cd-tab-filter::after {
            /* small arrow icon */
            content: '';
            position: absolute;
            right: 14px;
            top: 50%;
            bottom: auto;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            display: inline-block;
            width: 16px;
            height: 16px;
            background: url("") no-repeat center center;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
            pointer-events: none;
        }

        .cd-tab-filter ul {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #ffffff;
            box-shadow: inset 0 -2px 0 #f03d6c;
        }

        .cd-tab-filter li {
            display: none;
        }

        .cd-tab-filter li:first-child {
            /* this way the placehodler is alway visible */
            display: block;
        }

        .cd-tab-filter a {
            display: block;
            /* set same size of the .cd-tab-filter */
            height: 50px;
            width: 140px;
            line-height: 50px;
            padding-left: 14px;
        }

        .cd-tab-filter a.selected {
            background: #f03d6c;
            color: #ffffff;
        }

        .cd-tab-filter.is-open::after {
            /* small arrow rotation */
            -webkit-transform: translateY(-50%) rotate(-180deg);
            -moz-transform: translateY(-50%) rotate(-180deg);
            -ms-transform: translateY(-50%) rotate(-180deg);
            -o-transform: translateY(-50%) rotate(-180deg);
            transform: translateY(-50%) rotate(-180deg);
        }

        .cd-tab-filter.is-open ul {
            box-shadow: inset 0 -2px 0 #f03d6c, 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .cd-tab-filter.is-open ul li {
            display: block;
        }

        .cd-tab-filter.is-open .placeholder a {
            /* reduces the opacity of the placeholder on mobile when the menu is open */
            opacity: .4;
        }

        @media only screen and (min-width: 768px) {
            .cd-tab-filter {
                /* tabbed navigation style on medium devices */
                width: auto;
                cursor: auto;
            }

            .cd-tab-filter::after {
                /* hide the arrow */
                display: none;
            }

            .cd-tab-filter ul {
                background: transparent;
                position: static;
                box-shadow: none;
                text-align: center;
            }

            .cd-tab-filter li {
                display: inline-block;
            }

            .cd-tab-filter li.placeholder {
                display: none !important;
            }

            .cd-tab-filter a {
                display: inline-block;
                padding: 0 1em;
                width: auto;
                color: #9a9a9a;
                text-transform: uppercase;
            }

            .no-touch .cd-tab-filter a:hover {
                color: #f03d6c;
            }

            .cd-tab-filter a.selected {
                background: transparent;
                color: #f03d6c;
                /* create border bottom using box-shadow property */
                box-shadow: inset 0 -2px 0 #f03d6c;
            }

            .cd-tab-filter.is-open ul li {
                display: inline-block;
            }
        }

        @media only screen and (min-width: 1170px) {
            .cd-tab-filter {
                /* tabbed navigation on big devices */
                width: 100%;
                float: right;
                margin: 0;
                -webkit-transition: width 0.3s;
                -moz-transition: width 0.3s;
                transition: width 0.3s;
            }

            .cd-tab-filter.filter-is-visible {
                /* reduce width when filter is visible */
                width: 80%;
            }
        }

        /* --------------------------------

        xgallery

        -------------------------------- */
        .cd-gallery {
            padding: 26px 5%;
            width: 100%;
        }

        .cd-gallery li {
            margin-bottom: 1.6em;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .cd-gallery li.gap {
            /* used in combination with text-align: justify to align gallery elements */
            opacity: 0;
            height: 0;
            display: inline-block;
        }

        .cd-gallery img {
            display: block;
            width: 100%;
        }

        .cd-gallery .cd-fail-message {
            display: none;
            text-align: center;
        }

        @media only screen and (min-width: 768px) {
            .cd-gallery {
                padding: 40px 3%;
            }

            .cd-gallery ul {
                text-align: justify;
            }

            .cd-gallery ul:after {
                content: "";
                display: table;
                clear: both;
            }

            .cd-gallery li {
                width: 48%;
                margin-bottom: 2em;
            }
        }

        @media only screen and (min-width: 1170px) {
            .cd-gallery {
                padding: 50px 2%;
                float: right;
                -webkit-transition: width 0.3s;
                -moz-transition: width 0.3s;
                transition: width 0.3s;
            }

            .cd-gallery li {
                width: 23%;
            }

            .cd-gallery.filter-is-visible {
                /* reduce width when filter is visible */
                width: 80%;
            }
        }

        /* --------------------------------

        xfilter

        -------------------------------- */
        .cd-filter {
            position: absolute;
            top: 0;
            left: 0;
            width: 280px;
            height: 100%;
            background: #ffffff;
            box-shadow: 4px 4px 20px transparent;
            z-index: 2;
            /* Force Hardware Acceleration in WebKit */
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -o-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: translateX(-100%);
            -moz-transform: translateX(-100%);
            -ms-transform: translateX(-100%);
            -o-transform: translateX(-100%);
            transform: translateX(-100%);
            -webkit-transition: -webkit-transform 0.3s, box-shadow 0.3s;
            -moz-transition: -moz-transform 0.3s, box-shadow 0.3s;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cd-filter::before {
            /* top colored bar */
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 50px;
            width: 100%;
            background-color: #0090e3;
            z-index: 2;
        }

        .cd-filter form {
            padding: 70px 20px;
        }

        .cd-filter .cd-close {
            position: absolute;
            top: 0;
            right: 0;
            height: 50px;
            line-height: 50px;
            width: 60px;
            color: #ffffff;
            text-align: center;
            background: #444444;
            opacity: 0;
            -webkit-transition: opacity 0.3s;
            -moz-transition: opacity 0.3s;
            transition: opacity 0.3s;
            z-index: 3;
        }

        .no-touch .cd-filter .cd-close:hover {
            background: #666666;
        }

        .cd-filter.filter-is-visible {
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
            transform: translateX(0);
            box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.2);
        }

        .cd-filter.filter-is-visible .cd-close {
            opacity: 1;
        }

        @media only screen and (min-width: 1170px) {
            .cd-filter {
                width: 20%;
            }

            .cd-filter form {
                padding: 70px 10%;
            }
        }

        .cd-filter-trigger {
            position: absolute;
            top: 0;
            left: 0;
            height: 50px;
            line-height: 50px;
            width: 60px;
            /* image replacement */
            overflow: hidden;
            text-indent: 100%;
            color: transparent;
            white-space: nowrap;
            background: transparent url("") no-repeat center center;
            z-index: 3;
        }

        .cd-filter-trigger.filter-is-visible {
            pointer-events: none;
        }

        .cd-filter-trigger {
            width: auto;
            left: 2%;
            text-indent: 0;
            color: #9a9a9a;
            text-transform: uppercase;
            padding-left: 24px;
            background-position: left center;
            -webkit-transition: color 0.3s;
            -moz-transition: color 0.3s;
            transition: color 0.3s;
        }

        .no-touch .cd-filter-trigger:hover {
            color: #f03d6c;
        }

        .cd-filter-trigger.filter-is-visible, .cd-filter-trigger.filter-is-visible:hover {
            color: #ffffff;
        }

        @media only screen and (max-width: 575px) {

            .cd-filter {

                width: 100%;
            }


        }


        /* --------------------------------

        xcustom form elements

        -------------------------------- */
        .cd-filter-block {
            margin-bottom: 1.6em;
        }

        .cd-filter-block h4 {
            /* filter block title */
            position: relative;
            margin-bottom: .2em;
            padding: 10px 0 10px 20px;
            color: #9a9a9a;
            text-transform: uppercase;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
        }

        .no-touch .cd-filter-block h4:hover {
            color: #f03d6c;
        }

        .cd-filter-block h4::before {
            /* arrow */
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 16px;
            height: 16px;
            background: url("") no-repeat center center;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: -webkit-transform 0.3s;
            -moz-transition: -moz-transform 0.3s;
            transition: transform 0.3s;
        }

        .cd-filter-block h4.closed::before {
            -webkit-transform: translateY(-50%) rotate(-90deg);
            -moz-transform: translateY(-50%) rotate(-90deg);
            -ms-transform: translateY(-50%) rotate(-90deg);
            -o-transform: translateY(-50%) rotate(-90deg);
            transform: translateY(-50%) rotate(-90deg);
        }

        .cd-filter-block input, .cd-filter-block select,
        .cd-filter-block .radio-label::before,
        .cd-filter-block .checkbox-label::before {
            /* shared style for input elements */
            border-radius: 0;
            background-color: #ffffff;
            border: 2px solid #e6e6e6;
        }

        .cd-filter-block input[type='search'],
        .cd-filter-block input[type='text'],
        .cd-filter-block select {
            width: 100%;
            padding: .8em;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            box-shadow: none;
        }

        .cd-filter-block input[type='search']:focus,
        .cd-filter-block input[type='text']:focus,
        .cd-filter-block select:focus {
            outline: none;
            background-color: #ffffff;
            border-color: #f03d6c;
        }

        .cd-filter-block input[type='search'] {
            /* custom style for the search element */
            border-color: transparent;
            background-color: #e6e6e6;
            /* prevent jump - ios devices */
            font-size: 1rem !important;
        }

        .cd-filter-block input[type='search']::-webkit-search-cancel-button {
            display: none;
        }

        .cd-filter-block .cd-select {
            /* select element wrapper */
            position: relative;
        }

        .cd-filter-block .cd-select::after {
            /* switcher arrow for select element */
            content: '';
            position: absolute;
            z-index: 1;
            right: 14px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            display: block;
            width: 16px;
            height: 16px;
            background: url("") no-repeat center center;
            pointer-events: none;
        }

        .cd-filter-block select {
            cursor: pointer;
        }

        .cd-filter-block select::-ms-expand {
            display: none;
        }

        .cd-filter-block .list li {
            position: relative;
            margin-bottom: .8em;
        }

        .cd-filter-block .list li:last-of-type {
            margin-bottom: 0;
        }

        .cd-filter-block input[type=radio],
        .cd-filter-block input[type=checkbox] {
            /* hide original check and radio buttons */
            position: absolute;
            left: 0;
            top: 0;
            margin: 0;
            padding: 0;
            opacity: 0;
            z-index: 2;
        }

        .cd-filter-block .checkbox-label,
        .cd-filter-block .radio-label {
            padding-left: 24px;

            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .cd-filter-block .checkbox-label::before, .cd-filter-block .checkbox-label::after,
        .cd-filter-block .radio-label::before,
        .cd-filter-block .radio-label::after {
            /* custom radio and check boxes */
            content: '';
            display: block;
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .cd-filter-block .checkbox-label::before,
        .cd-filter-block .radio-label::before {
            width: 16px;
            height: 16px;
            left: 0;
            top: 9px !important;
        }

        .cd-filter-block .checkbox-label::after,
        .cd-filter-block .radio-label::after {
            /* check mark - hidden */
            display: none;
        }

        .cd-filter-block .checkbox-label::after {
            /* check mark style for check boxes */
            width: 16px;
            height: 16px;
            background: url("https://entrusters.com/templates/yoo_moustache/html/com_entrusters_shop/products/ui-img/cd-icon-check.svg") no-repeat center center;
            left: 0px;
            top: 9px !important;
        }

        .cd-filter-block .radio-label::before,
        .cd-filter-block .radio-label::after {
            border-radius: 50%;
        }

        .cd-filter-block .radio-label::after {
            /* check mark style for radio buttons */
            width: 6px;
            height: 6px;
            background-color: #ffffff !important;
            left: 3px !important;
            top: 3px !important;
        }

        .cd-filter-block input[type=radio]:checked + label::before,
        .cd-filter-block input[type=checkbox]:checked + label::before {
            border-color: #f03d6c;
            background-color: #f03d6c;
        }

        .cd-filter-block input[type=radio]:checked + label::after,
        .cd-filter-block input[type=checkbox]:checked + label::after {
            display: block;
        }

        @-moz-document url-prefix() {
            /* hide custom arrow on Firefox - select element */
            .cd-filter-block .cd-select::after {
                display: none;
            }
        }


    </style>


    <style type="text/css">

        .select2-container {

            height: 100%;
        }

        .select2-container--default .select2-selection--single {

            height: 100%;
            padding: 11px;
            border: none;
            border-radius: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {

            padding: 26px;
        }

        .cd-filters .select2-selection__clear {
            position: relative;
            right: 5px;
            top: 1px;
            z-index: 1000;
            display: block !important;
        }

        .select2-selection__clear
        {
            display: none;
        }

        [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            position: absolute;
            left: -9999px;
        }

        [type="radio"]:checked + label,
        [type="radio"]:not(:checked) + label {
            position: relative;
            padding-left: 28px;
            cursor: pointer;
            line-height: 20px;
            display: inline-block;
            color: #666;
        }

        [type="radio"]:checked + label:before,
        [type="radio"]:not(:checked) + label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 18px;
            height: 18px;
            border: 1px solid #ddd;
            border-radius: 100%;
            background: #fff;
        }

        [type="radio"]:checked + label:after,
        [type="radio"]:not(:checked) + label:after {
            content: '';
            width: 12px;
            height: 12px;
            background: #c33131;
            position: absolute;
            top: 3px;
            left: 3px;
            border-radius: 100%;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        [type="radio"]:not(:checked) + label:after {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        [type="radio"]:checked + label:after {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

    </style>


@endsection
