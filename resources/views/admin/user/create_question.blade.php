@extends('layouts.admin')

@section('styles')

    <link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

    <style type="text/css">
        .colorpicker-alpha {display:none !important;}
        .colorpicker{ min-width:128px !important;}
        .colorpicker-color {display:none !important;}
    </style>

@endsection

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Add Quotation Question</h2>
                                        <a href="{{route('quotation-questions')}}" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('save-question')}}" method="POST" enctype="multipart/form-data">
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Question Title* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input class="form-control question_title" name="title" id="blood_group_display_name" placeholder="Enter Question Title" required="" type="text">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="">Predefined Answers* </label>
                                            <div class="col-sm-3">
                                                <label class="switch">
                                                    <input type="checkbox" name="predefined" id="predefined" onchange="Predefined()">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="sub-services s_box" id="q" style="display: none;">

                                            <div class="form-group">

                                                <label class="control-label col-sm-4" for="sub_service">Text* </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control predefined_answer" name="predefined_answer[]" id="predefined_answer">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group s_box" style="margin-top: 40px;display: none;">

                                            <label class="control-label col-sm-3" for=""></label>

                                            <div class="col-sm-12 text-center">

                                                <button class="btn btn-default featured-btn" type="button" name="add-field-btn" id="add-field-btn"><i class="fa fa-plus"></i> Add More Fields</button>
                                            </div>
                                        </div>




                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="button" class="btn add-product_btn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        //]]>
    </script>

    <script type="text/javascript">

        function Predefined()
        {

            if($('#predefined').is(":checked"))
            {

                $('.s_box').show();

            }
            else
            {

                $('.s_box').hide();

            }

        }


        $("#add-field-btn").on('click',function() {


            $(".sub-services").append('<div class="form-group">'+
                '<label class="control-label col-sm-4" for="sub_service">Text* </label>'+
                '<div class="col-sm-6">'+
                // '<input type="text" class="form-control" name="title[]" id="title" placeholder="'+title+'" required="">'+
                '<input type="text" class="form-control predefined_answer" name="predefined_answer[]" id="predefined_answer">'+
                '</div>'+
                '<div class="col-xs-1 col-sm-1">'+
                '<span class="ui-close remove-ui1" style="margin:0;right:70%;">X</span></div></div>');

        });

        $(document).on('click', '.add-product_btn' ,function() {

            var check = 0;

            if($('#predefined').is(":checked"))
            {
                if($('.question_title').val() == "")
                {
                    $('.question_title').css('border','1px solid red');
                    check = 1;
                }
                else
                {
                    $('.question_title').css('border','');
                }

                $(".predefined_answer").each(function() {
                    var element = $(this);
                    if (element.val() == "") {
                        $(this).css('border','1px solid red');
                        check = 1;
                    }
                    else
                    {
                        $(this).css('border','');
                    }
                });

                if(!check)
                {
                    $('form').submit();
                }
            }
            else
            {
                if($('.question_title').val() == "")
                {
                    $('.question_title').css('border','1px solid red');
                }
                else
                {
                    $('.question_title').css('border','');
                    $('form').submit();
                }

            }

        });


        $(document).on('click', '.remove-ui1' ,function() {

            var parent = this.parentNode.parentNode;

            $(parent).hide();
            $(parent).remove();



        });

    </script>

    <style type="text/css">

        .swal2-show
        {
            padding: 40px;
            width: 30%;

        }

        .swal2-header
        {
            font-size: 23px;
        }

        .swal2-content
        {
            font-size: 18px;
        }

        .swal2-actions
        {
            font-size: 16px;
        }

    </style>


    <script>
        $('#cp1').colorpicker();
        $('#cp2').colorpicker();
    </script>



    <script src="{{asset('assets/admin/js/jquery152.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>

@endsection
