@extends('layouts.handyman')

@section('styles')

    <link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">



@endsection

@section('content')


    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard header items area -->
                    <div class="panel panel-default admin">
                        <div class="panel-heading admin-title">{{$lang->mst}}</div>

                    </div>
                    <!-- Ending of Dashboard header items area -->

                    <!-- Starting of Dashboard Top reference + Most Used OS area -->
                    <div class="reference-OS-area">
                        <div class="donors-profile-top-bg overlay text-center wow fadeInUp" style="background-image: url({{asset('assets/images/'.$gs->h_dashbg)}}); visibility: visible; animation-name: fadeInUp;z-index: auto;color: black;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>{{$user->name}} {{$user->family_name}}</h2>
                                        <p>{{$lang->bg}}

                                            <?php for ($i=0; $i < sizeof($services[0]); $i++) {

                                                if($i == 0)

                                                {

                                                  echo $services[0][$i]->cat_name;

                                          }

                                        else
                                        {

                                            echo ', '.$services[0][$i]->cat_name;

                                        }

                                    }
                                    ?>

                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="profile-fillup-wrap wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="container" style="width: 100%;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="{{route('user-services-update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                            @include('includes.form-success')
                                            @include('includes.form-error')
                                            {{csrf_field()}}


                                            <div class="profile-filup-description-box margin-bottom-30">
{{--                                                <h2 class="text-center">{{$lang->bg}}</h2>--}}
                                                <div class="qualification" id="q">

                                                    <?php $i=0; ?>

                                                    @if($services_selected->count() != 0)

                                                        @foreach($services_selected as $key)
                                                            <div class="qualification-area" style="border: 1px solid #bebebe;display: inline-block;width: 100%;padding-left: 20px;margin-bottom:20px;padding-top: 20px;padding-bottom: 10px;">
                                                                <div class="form-group" style="float: left;width: 100%;">

                                                                    <div class="col-xs-12 col-sm-3 col-md-offset-0 mb-12" style="height: 100px;">

                                                                        <span class="headings1">{{$lang->iservt}}</span>

                                                                        <input type="hidden" name="hs_id[]" value="{{$key->id}}">

                                                                        <select class="js-data-example-ajax"  style="width: 100%" name="title[]" id="title" required>

                                                                            <option value="">{{$lang->sbg}}</option>

                                                                            @foreach($cats as $cat)
                                                                                @if($cat->id == $key->service_id)

                                                                                    <option value="{{$cat->id}}" selected>{{$cat->cat_name}}</option>

                                                                                @else

                                                                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>

                                                                                @endif

                                                                            @endforeach
                                                                        </select>

                                                                    </div>

                                                                    <div class="col-xs-6 col-sm-2" id="rate" style="height: 100px;">

                                                                        <span class="headings1">{{$lang->sr}}</span>

                                                                        <input class="form-control" name="details[]" id="text_details" placeholder="{{$lang->esrt}}" type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$key->rate}}" required style="text-align: center;height: 59%;padding: 0;">

                                                                    </div>

                                                                    <div class="col-xs-6 col-sm-2" id="vat" style="height: 100px;">

                                                                        <span class="headings1">VAT <small>(%)</small></span>

                                                                        <input class="form-control" name="vat_percentages[]" id="vat_percentages" placeholder="VAT" type="number" value="{{$key->vat_percentage}}" readonly required style="text-align: center;height: 59%;padding: 0;">

                                                                    </div>

                                                                    <div class="col-xs-6 col-sm-2" id="sell_rate" style="height: 100px;">

                                                                        <span class="headings1">Selling Rate</span>

                                                                        <input class="form-control" name="sell_rates[]" id="sell_rates" placeholder="Selling Rate" type="number" value="{{$key->sell_rate}}" readonly required style="text-align: center;height: 59%;padding: 0;">

                                                                    </div>

                                                                    <div class="col-xs-6 col-sm-3" id="service_type" style="height: 100px;">

                                                                        <span class="headings1">{{$lang->istt}}</span>

                                                                        <p class="form-control" style="text-align: center;padding-top: 18px;height: 59%;">

                                                                            @if($services[0][$i]->type == 'Per Hour Rate')

                                                                                {{$lang->servT1}}

                                                                            @elseif($services[0][$i]->type == 'Per Meter Rate')

                                                                                {{$lang->servT2}}

                                                                            @elseif($services[0][$i]->type == 'Per Foot Rate')

                                                                                {{$lang->servT3}}

                                                                            @elseif($services[0][$i]->type == 'Per Piece Rate')

                                                                                {{$lang->servT4}}

                                                                            @endif

                                                                        </p>
                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-12 mb-12" id="description" style="margin-top: 20px;">

                                                                        <span class="headings1">{{$lang->dt}}</span>

                                                                        <textarea class="form-control" name="description[]" placeholder="{{$lang->sdesc}}"  cols="1" rows="4" style="resize: vertical;height: 59%;">{{$key->description}}</textarea>
                                                                    </div>

                                                                </div>
                                                                <span class="ui-close remove-ui" id="{{$key->id}}" style="top: -10px;float: left;position: relative;">X</span>
                                                            </div>

                                                            <?php $i++; ?>

                                                        @endforeach

                                                    @else

                                                        <div class="qualification-area" style="border: 1px solid #bebebe;display: inline-block;width: 100%;padding-left: 20px;margin-bottom:20px;padding-top: 20px;padding-bottom: 10px;">
                                                            <div class="form-group" style="float: left;width: 100%;">

                                                                <div class="col-xs-12 col-sm-3 col-md-offset-0 mb-12" style="height: 100px;">

                                                                    <span class="headings1">{{$lang->iservt}}</span>

                                                                    <select class="js-data-example-ajax" style="width: 100%" name="title[]" id="title" required>
                                                                        <option value="">{{$lang->sbg}}</option>
                                                                        @foreach($cats as $cat)
                                                                            <option value="{{$cat->id}}" >{{$cat->cat_name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>

                                                                <div class="col-xs-6 col-sm-2" id="rate" style="height: 100px;">

                                                                    <span class="headings1">{{$lang->sr}}</span>

                                                                    <input class="form-control" name="details[]" id="text_details" placeholder="{{$lang->esrt}}" type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required style="height: 59%;text-align: center;padding: 0;">
                                                                </div>

                                                                <div class="col-xs-6 col-sm-2" id="vat" style="height: 100px;">

                                                                    <span class="headings1">VAT <small>(%)</small></span>

                                                                    <input class="form-control" name="vat_percentages[]" id="vat_percentages" placeholder="VAT" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">

                                                                </div>

                                                                <div class="col-xs-6 col-sm-2" id="sell_rate" style="height: 100px;">

                                                                    <span class="headings1">Selling Rate</span>

                                                                    <input class="form-control" name="sell_rates[]" id="sell_rates" placeholder="Selling Rate" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">

                                                                </div>

                                                                <div class="col-xs-6 col-sm-3" id="service_type" style="height: 100px;">

                                                                    <span class="headings1">{{$lang->istt}}</span>
                                                                       <p class="form-control" style="text-align: center;padding-top: 18px;height: 59%;">
                                                                       </p>

                                                                </div>


                                                                <div class="col-xs-12 col-sm-12 mb-12" id="description" style="margin-top: 20px;">

                                                                    <span class="headings1">{{$lang->dt}}</span>

                                                                    <textarea class="form-control" name="description[]"  placeholder="{{$lang->sdesc}}"  cols="1" rows="4" style="resize: vertical;height: 59%;"></textarea>
                                                                </div>

                                                            </div>
                                                            <span class="ui-close remove-ui1" id="parentclose" style="top: -10px;float: left;position: relative;">X</span>
                                                        </div>
                                                    @endif

                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for=""></label>
                                                    <div class="col-sm-12 text-center">
                                                        <input type="hidden" id="tttl" value="{{$lang->dttl}}">
                                                        <input type="hidden" id="dddc" value="{{$lang->ddesc}}">
                                                        <button class="btn btn-default featured-btn" type="button" name="add-field-btn" id="add-field-btn"><i class="fa fa-plus"></i> {{$lang->amf}}</button>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="submit-area margin-bottom-30">
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <div class="form-group text-center">
                                                            <button class="boxed-btn blog" type="submit">{{$lang->doupl}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div></div></div></div></div>

    <script type="text/javascript">

        $(document).ready(function() {

            $(".js-data-example-ajax").select2({
                width: '100%',
                // placeholder: "City Name",
                placeholder: "<?php echo $lang->sbg; ?>",
                allowClear: true,


            });


            var $selects = $('.js-data-example-ajax').change(function() {
                var id = this.value;
                var selector = this;


                if ($selects.find('option[value=' + id + ']:selected').length > 1) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: <?php echo "'".$lang->sse."'" ?>,

                    })
                    this.options[0].selected = true;

                    $(selector).val('');

                    $(selector).select2("destroy");

                    $(selector).select2();
                }



                $.ajax({
                    type:"GET",
                    data: "id=" + id ,
                    url: "<?php echo url('/services')?>",
                    success: function(data) {

                        if(data.type == "Per Hour Rate"){

                            var type = <?php echo "'".$lang->servT1."'" ?>;
                            var text = <?php echo "'".$lang->servP1."'" ?>;

                        }

                        else if(data.type == "Per Meter Rate")
                            {

                                var type = <?php echo "'".$lang->servT2."'" ?>;
                                var text = <?php echo "'".$lang->servP2."'" ?>;
                            }

                        else if(data.type == "Per Foot Rate")
                        {
                            var type = <?php echo "'".$lang->servT3."'" ?>;
                            var text = <?php echo "'".$lang->servP3."'" ?>;

                        }

                        else if(data.type == "Per Piece Rate")
                        {
                            var type = <?php echo "'".$lang->servT4."'" ?>;
                            var text = <?php echo "'".$lang->servP4."'" ?>;

                        }

                        else
                        {

                            var type = "";
                            var text = "";

                        }

                        $(selector).parent().parent().children('#rate').children("input").attr("placeholder", text);
                        $(selector).parent().parent().children('#service_type').children("p").text(type);
                        $(selector).parent().parent().children('#vat').children("input").val(data.vat_percentage);

                        var rate = $(selector).parent().parent().children('#rate').children("input").val();
                        rate = parseInt(rate);

                        if(rate)
                        {
                            var vat_percentage = data.vat_percentage;
                            vat_percentage = vat_percentage/100;

                            var sell_rate = rate * (vat_percentage);
                            sell_rate = parseFloat(sell_rate.toFixed(2));
                            sell_rate = rate + sell_rate;

                            $(selector).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                        }


                    }
                });

            });

            $("input[name='details[]'").on('input',function(e) {

                var rate = parseInt($(this).val());
                var vat_percentage = parseInt($(this).parent().parent().children('#vat').children("input").val());
                vat_percentage = vat_percentage/100;

                if(vat_percentage)
                {
                    var sell_rate = rate * (vat_percentage);
                    sell_rate = parseFloat(sell_rate.toFixed(2));
                    sell_rate = rate + sell_rate;

                    $(this).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                }

            });


        });



    </script>

    <style>

        .headings1{

            text-align: center;display: block;font-size: 15px;font-weight: 600;margin-bottom: 10px;

        }

        .ui-close
        {
            width: 25px;
            height: 25px;
            line-height: 26px;
            font-size: 14px;
            right: 0%;
        }


        @media (max-width: 1024px){
            .headings1{
                font-size: 14px;
            }
        }


        @media (max-width: 767px)
        {
            .col-xs-6{

                margin-top: 20px;

            }
        }


        @media (max-width: 400px){

            .col-xs-5{
                width: 91.66666667%;
            }

            .col-xs-6{
                width: 100%;
            }

        }

        .select2-container--default .select2-selection--single{

            height: 100%;
            padding: 14px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{

            padding: 27px;
        }

        .select2-selection__clear{

            display: none;
        }

        .nicEdit-main
        {
            width: 100% !important;
            margin: 0 !important;
            background-color: white;
        }

        .container
        {
            width: 100% !important;
        }

    </style>

    <style>

        #services{
            color: #fff;
            background: {{$gs->colors == null ? 'rgba(207, 55, 58, 0.70)':$gs->colors.'c2'}};

        }


    </style>

@endsection



@section('scripts')




    <script type="text/javascript">


        // Handling the click event
        $("#add-field-btn").on('click',function() {
            var title = $('#tttl').val();
            var desc = $('#dddc').val();

            $(".qualification").append('<div class="qualification-area" style="border: 1px solid #bebebe;display: inline-block;width: 100%;padding-left: 20px;margin-bottom:20px;padding-top: 20px;padding-bottom: 10px;">'+
                '<div class="form-group" style="float:left;width:100%;">'+
                '<div class="col-xs-12 col-sm-3 col-md-offset-0 mb-12" style="height: 100px;">'+
                '<span class="headings1">{{$lang->iservt}}</span>'+
                '<input type="hidden" name="hs_id[]" value="0">' +
                // '<input type="text" class="form-control" name="title[]" id="title" placeholder="'+title+'" required="">'+
                '<select class="js-data-example-ajax" style="width: 100%" name="title[]" id="title" required>'+
                '<option value="">{{$lang->sbg}}</option>' +
                '@foreach($cats as $cat)' +
                '<option value="{{$cat->id}}" >{{$cat->cat_name}}</option>' +
                '@endforeach' +
                '</select>'+
                '</div>'+
                '<div class="col-xs-6 col-sm-2" id="rate" style="height: 100px;">'+
                '<span class="headings1">{{$lang->sr}}</span>'+
                // '<select class="js-example-responsive" style="width: 100%" name="details[]" id="text_details" placeholder="'+desc+'" type="text" ></select>'+
                '<input type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="details[]" id="text_details" placeholder="{{$lang->esrt}}" required style="height: 59%;text-align:center;padding:0;">'+
                '</div>'+
                '<div class="col-xs-6 col-sm-2" id="vat" style="height: 100px;">'+
                '<span class="headings1">VAT <small>(%)</small></span>'+
                '<input class="form-control" name="vat_percentages[]" id="vat_percentages" placeholder="VAT" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">'+
                '</div>'+
                '<div class="col-xs-6 col-sm-2" id="sell_rate" style="height: 100px;">'+
                '<span class="headings1">Selling Rate</span>'+
                '<input class="form-control" name="sell_rates[]" id="sell_rates" placeholder="Selling Rate" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">'+
                '</div>'+
                '<div class="col-xs-6 col-sm-3" id="service_type" style="height: 100px;">'+
                '<span class="headings1">{{$lang->istt}}</span>'+
                '<p class="form-control" style="text-align: center;padding-top: 18px;height: 59%;"></p>'+
                '</div>'+
                '<div class="col-xs-12 col-sm-12" id="description" style="margin-top: 20px;">'+
                '<span class="headings1">{{$lang->dt}}</span>'+
                '<textarea class="form-control" name="description[]" placeholder="{{$lang->sdesc}}" style="resize:vertical;height:59%;" cols="2" rows="4"></textarea>'+
                '</div>'+
                '</div>'+
                '<span class="ui-close remove-ui1" style="top:-10px;float:left;position:relative;">X</span>'+
                '</div>');

            $(".js-data-example-ajax").select2({
                width: '100%',
                // placeholder: "City Name",
                placeholder: "<?php echo $lang->sbg; ?>",
                allowClear: true,

            }).on('change', function (e) {
// AT this section we have to load placeholder and use it to Next textfield
            });

            var $selects = $('.js-data-example-ajax').change(function() {

                var id = this.value;
                var selector = this;

                if ($selects.find('option[value=' + id + ']:selected').length > 1) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: <?php echo "'".$lang->sse."'" ?>,

                    })
                    this.options[0].selected = true;

                    $(selector).val('');

                    $(selector).select2("destroy");

                    $(selector).select2();
                }



                $.ajax({
                    type:"GET",
                    data: "id=" + id ,
                    url: "<?php echo url('/services')?>",
                    success: function(data) {

                        if(data.type == "Per Hour Rate"){

                            var type = <?php echo "'".$lang->servT1."'" ?>;
                            var text = <?php echo "'".$lang->servP1."'" ?>;

                        }

                        else if(data.type == "Per Meter Rate")
                            {

                                var type = <?php echo "'".$lang->servT2."'" ?>;
                                var text = <?php echo "'".$lang->servP2."'" ?>;
                            }

                        else if(data.type == "Per Foot Rate")
                        {
                            var type = <?php echo "'".$lang->servT3."'" ?>;
                            var text = <?php echo "'".$lang->servP3."'" ?>;

                        }

                        else if(data.type == "Per Piece Rate")
                        {
                            var type = <?php echo "'".$lang->servT4."'" ?>;
                            var text = <?php echo "'".$lang->servP4."'" ?>;

                        }

                        else
                        {

                            var type = "";
                            var text = "";

                        }

                        $(selector).parent().parent().children('#rate').children("input").attr("placeholder", text);
                        $(selector).parent().parent().children('#service_type').children("p").text(type);
                        $(selector).parent().parent().children('#vat').children("input").val(data.vat_percentage);

                        var rate = $(selector).parent().parent().children('#rate').children("input").val();
                        rate = parseInt(rate);

                        if(rate)
                        {
                            var vat_percentage = data.vat_percentage;
                            vat_percentage = vat_percentage/100;

                            var sell_rate = rate * (vat_percentage);
                            sell_rate = parseFloat(sell_rate.toFixed(2));
                            sell_rate = rate + sell_rate;

                            $(selector).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                        }


                    }
                });

            });

            $("input[name='details[]'").on('input',function(e) {

                var rate = parseInt($(this).val());
                var vat_percentage = parseInt($(this).parent().parent().children('#vat').children("input").val());
                vat_percentage = vat_percentage/100;

                if(vat_percentage)
                {
                    var sell_rate = rate * (vat_percentage);
                    sell_rate = parseFloat(sell_rate.toFixed(2));
                    sell_rate = rate + sell_rate;

                    $(this).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                }

            });

        });

        function isEmpty(el){
            return !$.trim(el.html())
        }

        $(document).on('click', '.remove-ui' ,function() {


            var id = $(this).attr('id');

            var parent = this.parentNode;


            $.ajax({
                type:"GET",
                data: "id=" + id ,
                url: "<?php echo url('/handyman/delete-services')?>",
                success: function(data) {

                    $(parent).children().children().children('select').val('');


                    $(parent).children().children().children('select').select2("destroy");

                    $(parent).children().children().children('select').select2();


                    $(parent).hide();
                    $(parent).remove();


                    Swal.fire(
                        'Success!',
                        <?php echo "'".$lang->sdt."'"; ?>,
                        'success'
                    )

                    if (isEmpty($('#q'))) {
                        var title = $('#tttl').val();
                        var desc = $('#dddc').val();
                        $(".qualification").append('<div class="qualification-area" style="border: 1px solid #bebebe;display: inline-block;width: 100%;padding-left: 20px;margin-bottom:20px;padding-top: 20px;padding-bottom: 10px;">'+
                            '<div class="form-group" style="float:left;width:100%;">'+
                            '<div class="col-xs-12 col-sm-3 col-md-offset-0 mb-12" style="height: 100px;">'+
                            '<span class="headings1">{{$lang->iservt}}</span>'+
                            '<select class="js-data-example-ajax" style="width: 100%"name="title[]" id="title" required>'+
                            '<option value="">{{$lang->sbg}}</option>' +
                            '@foreach($cats as $cat)' +
                            '<option value="{{$cat->id}}" >{{$cat->cat_name}}</option>' +
                            '@endforeach' +
                            '</select>'+
                            // '<input type="text" class="form-control" name="title[]" id="title" placeholder="'+title+'">'+
                            '</div>'+
                            '<div class="col-xs-6 col-sm-2" id="rate" style="height: 100px;">'+
                            '<span class="headings1">{{$lang->sr}}</span>'+
                            '<input type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="details[]" id="text_details" placeholder="{{$lang->esrt}}" required style="height: 59%;text-align:center;padding:0;">'+
                            // '<select class="js-example-responsive" style="width: 100%" name="details[]" id="text_details" placeholder="'+desc+'" type="text" ></select>'+
                            '</div>'+
                            '<div class="col-xs-6 col-sm-2" id="vat" style="height: 100px;">'+
                            '<span class="headings1">VAT <small>(%)</small></span>'+
                            '<input class="form-control" name="vat_percentages[]" id="vat_percentages" placeholder="VAT" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">'+
                            '</div>'+
                            '<div class="col-xs-6 col-sm-2" id="sell_rate" style="height: 100px;">'+
                            '<span class="headings1">Selling Rate</span>'+
                            '<input class="form-control" name="sell_rates[]" id="sell_rates" placeholder="Selling Rate" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">'+
                            '</div>'+
                            '<div class="col-xs-6 col-sm-3" id="service_type" style="height: 100px;">'+
                            '<span class="headings1">{{$lang->istt}}</span>'+
                            '<p class="form-control" style="text-align: center;padding-top: 18px;height: 59%;"></p>'+
                            '</div>'+
                            '<div class="col-xs-12 col-sm-12" id="description" style="margin-top: 20px;">'+
                            '<span class="headings1">{{$lang->dt}}</span>'+
                            '<textarea class="form-control" name="description[]" placeholder="{{$lang->sdesc}}" style="resize:vertical;height:59%;" cols="2" rows="4"></textarea>'+
                            '</div>'+
                            '</div>'+
                            '<span class="ui-close remove-ui1" style="top: -10px;float:left;position:relative;">X</span>'+
                            '</div>');

                        $(".js-data-example-ajax").select2({
                            width: '100%',
                            // placeholder: "City Name",
                            placeholder: "<?php echo $lang->sbg; ?>",
                            allowClear: true,

                        }).on('change', function (e) {
// AT this section we have to load placeholder and use it to Next textfield
                        });

                        $('.js-data-example-ajax').on('change', function() {
                            var id = this.value;
                            var selector = this;


                            $.ajax({
                                type:"GET",
                                data: "id=" + id ,
                                url: "<?php echo url('/services')?>",
                                success: function(data) {

                                    if(data.type == "Per Hour Rate"){

                                        var type = <?php echo "'".$lang->servT1."'" ?>;
                                        var text = <?php echo "'".$lang->servP1."'" ?>;

                                    }

                                    else if(data.type == "Per Meter Rate")
                                    {

                                        var type = <?php echo "'".$lang->servT2."'" ?>;
                                        var text = <?php echo "'".$lang->servP2."'" ?>;

                                    }

                                    else if(data.type == "Per Foot Rate")
                                    {

                                        var type = <?php echo "'".$lang->servT3."'" ?>;
                                        var text = <?php echo "'".$lang->servP3."'" ?>;

                                    }

                                    else if(data.type == "Per Piece Rate")
                                    {

                                        var type = <?php echo "'".$lang->servT4."'" ?>;
                                        var text = <?php echo "'".$lang->servP4."'" ?>;

                                    }

                                    else
                                    {

                                        var type = "";
                                        var text = "";

                                    }

                                    $(selector).parent().parent().children('#rate').children("input").attr("placeholder", text);
                                    $(selector).parent().parent().children('#service_type').children("p").text(type);
                                    $(selector).parent().parent().children('#vat').children("input").val(data.vat_percentage);

                                    var rate = $(selector).parent().parent().children('#rate').children("input").val();
                                    rate = parseInt(rate);

                                    if(rate)
                                    {
                                        var vat_percentage = data.vat_percentage;
                                        vat_percentage = vat_percentage/100;

                                        var sell_rate = rate * (vat_percentage);
                                        sell_rate = parseFloat(sell_rate.toFixed(2));
                                        sell_rate = rate + sell_rate;

                                        $(selector).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                                    }

                                }
                            });

                        });

                        $("input[name='details[]'").on('input',function(e) {

                            var rate = parseInt($(this).val());
                            var vat_percentage = parseInt($(this).parent().parent().children('#vat').children("input").val());
                            vat_percentage = vat_percentage/100;

                            if(vat_percentage)
                            {
                                var sell_rate = rate * (vat_percentage);
                                sell_rate = parseFloat(sell_rate.toFixed(2));
                                sell_rate = rate + sell_rate;

                                $(this).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                            }

                        });

                    }

                }
            });

        });

        $(document).on('click', '.remove-ui1' ,function() {

            var parent = this.parentNode;

            $(parent).children().children().children('select').val('');


            $(parent).children().children().children('select').select2("destroy");

            $(parent).children().children().children('select').select2();

            $(parent).hide();
            $(parent).remove();


            if (isEmpty($('#q'))) {
                var title = $('#tttl').val();
                var desc = $('#dddc').val();
                $(".qualification").append('<div class="qualification-area" style="border: 1px solid #bebebe;display: inline-block;width: 100%;padding-left: 20px;margin-bottom:20px;padding-top: 20px;padding-bottom: 10px;">'+
                    '<div class="form-group" style="float:left;width:100%;">'+
                    '<div class="col-xs-12 col-sm-3 col-md-offset-0 mb-12" style="height: 100px;">'+
                    '<span class="headings1">{{$lang->iservt}}</span>'+
                    '<select class="js-data-example-ajax" style="width: 100%"name="title[]" id="title" required>'+
                    '<option value="">{{$lang->sbg}}</option>' +
                    '@foreach($cats as $cat)' +
                    '<option value="{{$cat->id}}" >{{$cat->cat_name}}</option>' +
                    '@endforeach' +
                    '</select>'+
                    // '<input type="text" class="form-control" name="title[]" id="title" placeholder="'+title+'">'+
                    '</div>'+
                    '<div class="col-xs-6 col-sm-2" id="rate" style="height: 100px;">'+
                    '<span class="headings1">{{$lang->sr}}</span>'+
                    '<input type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="details[]" id="text_details" placeholder="{{$lang->esrt}}" required style="height: 59%;text-align:center;padding:0;">'+
                    // '<select class="js-example-responsive" style="width: 100%" name="details[]" id="text_details" placeholder="'+desc+'" type="text" ></select>'+
                    '</div>'+
                    '<div class="col-xs-6 col-sm-2" id="vat" style="height: 100px;">'+
                    '<span class="headings1">VAT <small>(%)</small></span>'+
                    '<input class="form-control" name="vat_percentages[]" id="vat_percentages" placeholder="VAT" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">'+
                    '</div>'+
                    '<div class="col-xs-6 col-sm-2" id="sell_rate" style="height: 100px;">'+
                    '<span class="headings1">Selling Rate</span>'+
                    '<input class="form-control" name="sell_rates[]" id="sell_rates" placeholder="Selling Rate" type="number" readonly required style="text-align: center;height: 59%;padding: 0;">'+
                    '</div>'+
                    '<div class="col-xs-6 col-sm-3" id="service_type" style="height: 100px;">'+
                    '<span class="headings1">{{$lang->istt}}</span>'+
                    '<p class="form-control" style="text-align: center;padding-top: 18px;height: 59%;"></p>'+
                    '</div>'+
                    '<div class="col-xs-12 col-sm-12" id="description" style="margin-top: 20px;">'+
                    '<span class="headings1">{{$lang->dt}}</span>'+
                    '<textarea class="form-control" name="description[]" placeholder="{{$lang->sdesc}}" style="resize:vertical;height:59%;" cols="2" rows="4"></textarea>'+
                    '</div>'+
                    '</div>'+
                    '<span class="ui-close remove-ui1" style="top:-10px;float:left;position:relative;">X</span>'+
                    '</div>');

                $(".js-data-example-ajax").select2({
                    width: '100%',
                    // placeholder: "City Name",
                    placeholder: "<?php echo $lang->sbg; ?>",
                    allowClear: true,

                }).on('change', function (e) {
// AT this section we have to load placeholder and use it to Next textfield
                });

                $('.js-data-example-ajax').on('change', function() {
                    var id = this.value;
                    var selector = this;




                    $.ajax({
                        type:"GET",
                        data: "id=" + id ,
                        url: "<?php echo url('/services')?>",
                        success: function(data) {

                            if(data.type == "Per Hour Rate"){

                            var type = <?php echo "'".$lang->servT1."'" ?>;
                            var text = <?php echo "'".$lang->servP1."'" ?>;

                            }

                            else if(data.type == "Per Meter Rate")
                            {
                                var type = <?php echo "'".$lang->servT2."'" ?>;
                                var text = <?php echo "'".$lang->servP2."'" ?>;
                            }

                            else if(data.type == "Per Foot Rate")
                            {
                                var type = <?php echo "'".$lang->servT3."'" ?>;
                                var text = <?php echo "'".$lang->servP3."'" ?>;
                            }

                            else if(data.type == "Per Piece Rate")
                            {
                                var type = <?php echo "'".$lang->servT4."'" ?>;
                                var text = <?php echo "'".$lang->servP4."'" ?>;
                            }

                            else
                            {
                                var type = "";
                                var text = "";
                            }

                            $(selector).parent().parent().children('#rate').children("input").attr("placeholder", text);
                            $(selector).parent().parent().children('#service_type').children("p").text(type);
                            $(selector).parent().parent().children('#vat').children("input").val(data.vat_percentage);

                            var rate = $(selector).parent().parent().children('#rate').children("input").val();
                            rate = parseInt(rate);

                            if(rate)
                            {
                                var vat_percentage = data.vat_percentage;
                                vat_percentage = vat_percentage/100;

                                var sell_rate = rate * (vat_percentage);
                                sell_rate = parseFloat(sell_rate.toFixed(2));
                                sell_rate = rate + sell_rate;

                                $(selector).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                            }

                        }
                    });

                });

                $("input[name='details[]'").on('input',function(e) {

                    var rate = parseInt($(this).val());
                    var vat_percentage = parseInt($(this).parent().parent().children('#vat').children("input").val());
                    vat_percentage = vat_percentage/100;

                    if(vat_percentage)
                    {
                        var sell_rate = rate * (vat_percentage);
                        sell_rate = parseFloat(sell_rate.toFixed(2));
                        sell_rate = rate + sell_rate;

                        $(this).parent().parent().children('#sell_rate').children("input").val(sell_rate);
                    }

                });

            }

        });




        function uploadclick(){
            $("#uploadFile").click();
            $("#uploadFile").change(function(event) {
                readURL(this);
                $("#uploadTrigger").html($("#uploadFile").val());
            });

        }


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $("#myTags").tagit({
                fieldName: "special[]",
                allowSpaces: true
            });
        });
    </script>


    <style>

        .swal2-show{
            font-size: 17px;
        }
    </style>


@endsection
