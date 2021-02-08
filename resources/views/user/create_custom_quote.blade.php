@extends('layouts.handyman')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard data-table area -->
                    <div class="section-padding add-product-1" style="padding-top: 0;">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                       @if(Route::currentRouteName() == 'create-custom-quotation')

                                            <h2>Create Quotation</h2>

                                        @else

                                           <h2>Create Invoice</h2>

                                        @endif
                                    </div>
                                    <hr>

                                    <div class="main-box1">

                                        <div class="alert-box">

                                        </div>

                                        @include('includes.form-success')

                                        <div class="row" style="margin: 20px 0px;border-bottom: 1px solid #f1f1f1;padding-bottom: 20px;">

                                            <div class="col-md-4 col-sm-4 col-xs-12 customer-details" style="float: left;text-align: left">

                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-12" style="float: right;text-align: right;">

                                                <img class="img-fluid" src="{{ asset('assets/images/'.$user->photo) }}" style="width:50%; height:100%;margin-bottom: 30px;">

                                                <p style="margin: 0"><b>{{$user->name}} {{$user->family_name}}</b></p>
                                                <p style="margin: 0">{{$user->company_name}}</p>
                                                <p style="margin: 0">{{$user->address}}<?php if($user->city){ echo ', '.$user->city; } ?></p>
                                                <p style="margin: 0">TEL: {{$user->phone}}</p>
                                                <p style="margin: 0">{{$user->email}}</p>

                                            </div>

                                        </div>

                                        @if(Route::currentRouteName() == 'create-custom-quotation')

                                        <form class="form-horizontal" action="{{route('store-custom-quotation')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                        @else

                                        <form class="form-horizontal" action="{{route('store-direct-invoice')}}" method="POST" enctype="multipart/form-data">
                                             {{csrf_field()}}

                                        @endif

                                            <div class="row" style="margin: 0;margin-top: 30px;margin-bottom: 20px;">

                                                <div class="col-md-4">
                                                    <div class="form-group" style="margin: 0;">
                                                        <label>Estimated Date</label>
                                                        <input type="text" name="date" placeholder="Select Estimated Date" class="form-control estimate_date" autocomplete="off" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group" style="margin: 0;">
                                                        <label>Customer</label>
                                                        <div id="cus-box" style="display: flex;">
                                                            <select class="customer-select form-control" name="customer" required>

                                                                <option value="">Select Customer</option>

                                                                @foreach($customers as $key)

                                                                    <option value="{{$key->id}}">{{$key->name}} {{$key->family_name}}</option>

                                                                @endforeach

                                                            </select>
                                                            <button type="button" href="#myModal" role="button" data-toggle="modal" style="outline: none;margin-left: 10px;" class="btn btn-primary">Add New Customer</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row" style="margin: 0;">
                                                <div class="col-sm-12">

                                                    <div class="row" style="margin: 0;margin-top: 35px;">
                                                        <div class="col-md-12 col-sm-12" style="border: 1px solid #e5e5e5;padding: 0;">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover table-white items-table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th style="width: 40px;">#</th>
                                                                        <th class="col-sm-2">Category/Item</th>
                                                                        <th class="col-sm-2">Brand</th>
                                                                        <th class="col-sm-2">Model</th>
                                                                        <th class="col-sm-2">Cost</th>
                                                                        <th class="col-sm-2">Qty</th>
                                                                        <th class="col-sm-2">Amount</th>
                                                                        <th style="width: 50px;">Description</th>
                                                                        <th> </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td class="service_box">
                                                                            <select class="js-data-example-ajax form-control" style="width: 100%" name="item[]" required>

                                                                                <option value="">Select Category/Item</option>

                                                                                @foreach($all_services as $key)
                                                                                    <option value="{{$key->id}}">{{$key->cat_name}}</option>
                                                                                @endforeach

                                                                                @foreach($items as $key)
                                                                                    <option value="{{$key->id}}I">{{$key->cat_name}}</option>
                                                                                @endforeach

                                                                            </select>

                                                                            <input type="hidden" name="service_title[]" value="">
                                                                        </td>

                                                                        <td class="brand_box">
                                                                            <select class="js-data-example-ajax1 form-control" style="width: 100%" name="brand[]" required>

                                                                                <option value="">Select Brand</option>

                                                                            </select>

                                                                            <input type="hidden" name="brand_title[]" value="">
                                                                        </td>

                                                                        <td class="model_box">
                                                                            <select class="js-data-example-ajax2 form-control" style="width: 100%" name="model[]" required>

                                                                                <option value="">Select Model</option>

                                                                            </select>

                                                                            <input type="hidden" name="model_title[]" value="">
                                                                        </td>

                                                                        <td class="td-rate">
                                                                            <input name="cost[]" maskedFormat="9,1" autocomplete="off" class="form-control" type="text" value="" required>
                                                                        </td>

                                                                        <td class="td-qty">
                                                                            <input name="qty[]" maskedFormat="9,1" autocomplete="off" class="form-control" type="text" required>
                                                                        </td>

                                                                        <td class="td-amount">
                                                                            <input name="amount[]" class="form-control" readonly="" type="text">
                                                                        </td>

                                                                        <td style="text-align: center;" class="td-desc">
                                                                            <input type="hidden" name="description[]" id="description" class="form-control">
                                                                            <a href="javascript:void(0)" class="add-desc" title="Add Description" style="color: black;"><i style="font-size: 20px;" class="fa fa-plus-square"></i></a>
                                                                        </td>

                                                                        <td style="text-align: center;"><a href="javascript:void(0)" class="text-success font-18 add-row" title="Add"><i class="fa fa-plus"></i></a></td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table class="table table-hover table-white" style="margin-bottom: 0;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td class="text-right">Sub Total</td>
                                                                        <td style="text-align: right; padding-right: 30px;width: 230px">
                                                                            <input class="form-control text-right" value="0" name="sub_total" id="sub_total" readonly="" style="border: 0;background: transparent;box-shadow: none;padding: 0;padding-right: 4px;cursor: default;" type="text">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" class="text-right">Tax ({{$vat_percentage}}%)</td>
                                                                        <td style="text-align: right; padding-right: 30px;width: 230px">
                                                                            <input type="hidden" name="vat_percentage" id="vat_percentage" value="{{$vat_percentage}}">
                                                                            <input class="form-control text-right" value="0" name="tax_amount" id="tax_amount" readonly="" style="border: 0;background: transparent;box-shadow: none;padding: 0;padding-right: 4px;cursor: default;" type="text">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" style="text-align: right; font-weight: bold">
                                                                            Grand Total
                                                                        </td>
                                                                        <td id="grand_total_cell" style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                                                            € 0.00
                                                                        </td>
                                                                        <input class="form-control text-right" value="0" name="grand_total" id="grand_total" type="hidden">
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin: 0;margin-top: 30px;margin-bottom: 20px;">
                                                        <div class="col-md-12" style="padding: 0;">
                                                            <div class="form-group" style="margin: 0;">
                                                                <label>Other Information</label>
                                                                <textarea name="other_info" class="form-control" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="submit-section" style="text-align: center;margin-bottom: 20px;">
                                                        <button type="submit" style="width: 100px;font-size: 20px;border-radius: 25px;" class="btn btn-primary submit-btn">Create</button>
                                                    </div>

                                                </div></div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ending of Dashboard data-table area -->
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form id="quote_form" method="post" action="{{route('user.quote')}}">

                <input type="hidden" name="_token" value="{{@csrf_token()}}">

                <div class="modal-content">

                    <div class="modal-header">
                        <button style="background-color: white !important;color: black !important;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Create Customer</h3>
                    </div>

                    <div class="modal-body" id="myWizard" style="display: inline-block;">

                        <input type="hidden" id="token" name="token" value="{{csrf_token()}}">
                        <input type="hidden" id="handyman_id" name="handyman_id" value="{{Auth::user()->id}}">
                        <input type="hidden" id="handyman_name" name="handyman_name" value="<?php echo Auth::user()->name .' '. Auth::user()->family_name; ?>">

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="name" name="name" class="form-control validation" placeholder="{{$lang->suf}}" type="text">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="family_name" name="family_name" class="form-control validation" placeholder="{{$lang->fn}}" type="text">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="business_name" name="business_name" class="form-control" placeholder="{{$lang->bn}}" type="text">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="postcode" name="postcode" class="form-control validation" placeholder="{{$lang->pc}}" type="text">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="address" name="address" class="form-control validation" placeholder="{{$lang->ad}}" type="text">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="city" name="city" class="form-control validation" placeholder="{{$lang->ct}}" type="text">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input id="phone" name="phone" class="form-control validation" placeholder="{{$lang->pn}}" type="number">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input id="email" name="email" class="form-control validation" placeholder="{{$lang->sue}}" type="email">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" style="border: 0;outline: none;background-color: #5cb85c !important;" class="btn btn-primary submit-customer">Create</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div id="cover"></div>


    <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <button style="background-color: white !important;color: black !important;" type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 id="myModalLabel">Add Description</h4>
                </div>

                <div class="modal-body" id="myWizard">
                    <textarea rows="5" style="resize: vertical;" id="description-text" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="button" class="btn btn-success submit-desc">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">

        #cover {
            background: url(<?php echo asset('assets/images/page-loader.gif'); ?>) no-repeat scroll center center #ffffff78;
            position: fixed;
            z-index: 100000;
            height: 100%;
            width: 100%;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-size: 8%;
            display: none;
        }

        .form-control
        {
            height: 35px;
        }

        #cus-box .select2-selection
        {
            height: 40px !important;
            padding-top: 5px !important;
        }

        #cus-box .select2-selection__arrow
        {
            top: 7.5px !important;
        }

        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
        {
            padding: 25px 10px;
            vertical-align: middle;
        }

        .select2-selection
        {
            height: 35px !important;
            padding-top: 3px;
            outline: none;
            border-color: #cacaca !important;
        }

        .select2-selection__arrow
        {
            top: 4.5px !important;
        }

        .select2-selection__clear
        {
            display: none;
        }

        .dropdown-menu
        {
            left: -65px;
        }

        select {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            text-indent: 1px !important;
            text-overflow: '' !important;
        }

        /* Custom dropdown */
        .custom-dropdown {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin: 10px; /* demo only */
        }

        .custom-dropdown select {
            background-color: #1abc9c;
            color: #fff;
            font-size: inherit;
            padding: .5em;
            padding-right: 2.5em;
            border: 0;
            margin: 0;
            border-radius: 3px;
            text-indent: 0.01px;
            text-overflow: '';
            -webkit-appearance: button; /* hide default arrow in chrome OSX */
            outline: none;
        }

        .custom-dropdown::before,
        .custom-dropdown::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .custom-dropdown::after { /*  Custom dropdown arrow */
            content: "\25BC";
            height: 1em;
            font-size: .625em;
            line-height: 1;
            right: 1.2em;
            top: 50%;
            margin-top: -.5em;
        }

        .custom-dropdown::before { /*  Custom dropdown arrow cover */
            width: 2em;
            right: 0;
            top: 0;
            bottom: 0;
            border-radius: 0 3px 3px 0;
        }

        .custom-dropdown select[disabled] {
            color: rgba(0,0,0,.3);
        }

        .custom-dropdown select[disabled]::after {
            color: rgba(0,0,0,.1);
        }

        .custom-dropdown::before {
            background-color: rgba(0,0,0,.15);
        }

        .custom-dropdown::after {
            color: rgba(0,0,0,.4);
        }

        .text-left{

            font-size: 18px !important;
            text-align: center !important;

        }

        .swal2-popup{

            width: 25% !important;
            height: 330px !important;
        }

        .swal2-icon.swal2-warning{

            width: 20% !important;
            height: 82px !important;
        }

        .swal2-title{

            font-size: 27px !important;
        }

        .swal2-content{

            font-size: 18px !important;
        }

        .swal2-actions{

            font-size: 13px !important;
        }

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



@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            var current_desc = '';

            $(".add-desc").click(function(){
                current_desc = $(this);
                var d = current_desc.prev('input').val();
                $('#description-text').val(d);
                $("#myModal1").modal('show');
            });

            $(".submit-desc").click(function () {
                var desc = $('#description-text').val();
                current_desc.prev('input').val(desc);
                $('#description-text').val('');
                $("#myModal1").modal('hide');
            });

            $(".submit-customer").click(function(){

                var name = $('#name').val();
                var family_name = $('#family_name').val();
                var business_name = $('#business_name').val();
                var postcode = $('#postcode').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var handyman_id = $('#handyman_id').val();
                var handyman_name = $('#handyman_name').val();
                var token = $('#token').val();

                var validation = $('.modal-body').find('.validation');

                var flag = 0;

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
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                    if(!regex.test(email))
                    {
                        $('#email').css('border','1px solid red');

                        $('.alert-box').html('<div class="alert alert-danger">\n' +
                            '                                            <button type="button" class="close cl-btn" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>\n' +
                            '                                            <p class="text-left">Email address is not valid...</p>\n' +
                            '                                        </div>');
                        $('.alert-box').show();
                        $('.alert-box').delay(5000).fadeOut(400);
                    }
                    else
                    {
                        $('#email').css('border','');

                        $('#cover').show();

                        $.ajax({

                            type: "POST",
                            data: "handyman_id=" + handyman_id + "&handyman_name=" + handyman_name + "&name=" + name + "&family_name=" + family_name + "&business_name=" + business_name + "&postcode=" + postcode + "&address=" + address + "&city=" + city + "&phone=" + phone + "&email=" + email + "&_token=" + token,
                            url: "<?php echo url('/handyman/create-customer')?>",

                            success: function(data) {

                                $('.customer-details').empty();

                                $('.customer-details').append('<div><b>'+data.data.name+' '+data.data.family_name+'</b></div>\n'+
                                    '<div>'+data.data.address+'</div>\n'+
                                    '<div>'+data.data.city+'</div>\n'+
                                    '<div>'+data.data.postcode+'</div>\n');

                                console.log(data);

                                $('#cover').hide();

                                var newStateVal = data.data.id;
                                var newName = data.data.name + " " + data.data.family_name;

                                // Set the value, creating a new option if necessary
                                if ($(".customer-select").find("option[value=" + newStateVal + "]").length) {
                                    $(".customer-select").val(newStateVal).trigger("change");
                                } else {
                                    // Create the DOM option that is pre-selected by default
                                    var newState = new Option(newName, newStateVal, true, true);
                                    // Append it to the select
                                    $(".customer-select").append(newState).trigger('change');
                                }

                                $('.alert-box').html('<div class="alert alert-success">\n' +
                                        '                                            <button type="button" class="close cl-btn" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>\n' +
                                        '                                            <p class="text-left">'+data.message+'</p>\n' +
                                        '                                        </div>');
                                $('.alert-box').show();
                                $('.alert-box').delay(5000).fadeOut(400);

                                $('#myModal').modal('toggle');
                                window.scrollTo({top: 0, behavior: 'smooth'});
                            },
                            error: function(data) {

                                console.log(data);

                                $('#cover').hide();

                                /*if (data.status == 422) {
                                    $.each(data.responseJSON.errors, function (i, error) {
                                        $('.alert-box').html('<div class="alert alert-danger">\n' +
                                            '                                            <button type="button" class="close cl-btn" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>\n' +
                                            '                                            <p class="text-left">'+error[0]+'</p>\n' +
                                            '                                        </div>');
                                    });
                                    $('.alert-box').show();
                                    $('.alert-box').delay(5000).fadeOut(400);
                                }*/

                                    $('.alert-box').html('<div class="alert alert-danger">\n' +
                                        '                                            <button type="button" class="close cl-btn" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>\n' +
                                        '                                            <p class="text-left">Something went wrong!</p>\n' +
                                        '                                        </div>');
                                    $('.alert-box').show();
                                    $('.alert-box').delay(5000).fadeOut(400);

                                $('#myModal').modal('toggle');
                                window.scrollTo({top: 0, behavior: 'smooth'});
                                }

                        });
                    }
                }

            });

            $('.estimate_date').datepicker({

                format: 'dd-mm-yyyy',
                startDate: new Date(),

            });

            $(".customer-select").select2({
                width: '100%',
                height: '200px',
                placeholder: "Select Customer",
                allowClear: true,
            });

            $(".js-data-example-ajax").select2({
                width: '100%',
                height: '200px',
                placeholder: "Select Category/Item",
                allowClear: true,
            });

            $(".js-data-example-ajax1").select2({
                width: '100%',
                height: '200px',
                placeholder: "Select Brand",
                allowClear: true,
            });

            $(".js-data-example-ajax2").select2({
                width: '100%',
                height: '200px',
                placeholder: "Select Model",
                allowClear: true,
            });


            $(".js-data-example-ajax").change(function(){

                var current = $(this);

                var id = current.val();
                var handyman_id = $('#handyman_id').val();

                $.ajax({
                    type:"GET",
                    data: "id=" + id + "&type=service",
                    url: "<?php echo url('/get-quotation-data')?>",
                    success: function(data) {

                        current.parent().children('input').val(data.cat_name);

                        if(data.rate)
                        {
                            var rate = data.rate;
                            rate = rate.toString();
                            rate = rate.replace(/\./g, ',');

                            current.parent().parent().find('.td-rate').children('input').val(rate);
                        }
                        else
                        {
                            current.parent().parent().find('.td-rate').children('input').val(0);
                        }

                        var vat_percentage = parseInt($('#vat_percentage').val());
                        vat_percentage = vat_percentage + 100;
                        var cost = current.parent().parent().find('.td-rate').children('input').val();
                        cost = cost.replace(/\,/g, '.');
                        var qty = current.parent().parent().find('.td-qty').children('input').val();
                        qty = qty.replace(/\,/g, '.');

                        var amount = cost * qty;

                        amount = parseFloat(amount).toFixed(2);

                        if(isNaN(amount))
                        {
                            amount = 0;
                        }

                        amount = amount.replace(/\./g, ',');

                        current.parent().parent().find('.td-amount').children('input').val(amount);

                        var amounts = [];
                        $("input[name='amount[]']").each(function() {
                            amounts.push($(this).val().replace(/\,/g, '.'));
                        });

                        var grand_total = 0;

                        for (let i = 0; i < amounts.length; ++i) {

                            if(isNaN(parseFloat(amounts[i])))
                            {
                                amounts[i] = 0;
                            }

                            grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                        }

                        var vat = grand_total/vat_percentage * 100;
                        vat = grand_total - vat;
                        vat = parseFloat(vat).toFixed(2);

                        var sub_total = grand_total - vat;
                        sub_total = parseFloat(sub_total).toFixed(2);

                        $('#sub_total').val(sub_total.replace(/\./g, ','));
                        $('#tax_amount').val(vat.replace(/\./g, ','));
                        $('#grand_total').val(grand_total);

                        $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));
                    }
                });

                var category_id = current.val();
                var item_check = category_id.includes('I');

                if(!item_check)
                {
                    var options = '';

                    $.ajax({
                        type:"GET",
                        data: "id=" + category_id + "&handyman_id=" + handyman_id,
                        url: "<?php echo route('products-brands-by-category') ?>",
                        success: function(data) {

                            $.each(data, function(index, value) {

                                var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';

                                options = options + opt;

                            });

                            current.parent().next().children('select').find('option')
                                .remove()
                                .end()
                                .append('<option value="">Select Brand</option>'+options);

                            current.parent().next().next().children('select').find('option')
                                .remove()
                                .end()
                                .append('<option value="">Select Model</option>');

                        }
                    });
                }

            });


            $(".js-data-example-ajax1").change(function(){

                var current = $(this);

                var brand_id = current.val();
                var handyman_id = $('#handyman_id').val();

                $.ajax({
                    type:"GET",
                    data: "id=" + brand_id + "&type=brand",
                    url: "<?php echo url('/get-quotation-data')?>",
                    success: function(data) {
                        current.parent().children('input').val(data.cat_name);
                    }
                });

                var options = '';

                $.ajax({
                    type:"GET",
                    data: "id=" + brand_id + "&handyman_id=" + handyman_id,
                    url: "<?php echo route('products-models-by-brands') ?>",
                    success: function(data) {

                        $.each(data, function(index, value) {

                            var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';

                            options = options + opt;

                        });

                        current.parent().next().children('select').find('option')
                            .remove()
                            .end()
                            .append('<option value="">Select Model</option>'+options);

                    }
                });

            });

            $(".js-data-example-ajax2").change(function(){

                var current = $(this);
                var model_id = current.val();
                var brand_id = current.parent().parent().find('.brand_box').children('select').val();
                var cat_id = current.parent().parent().find('.service_box').children('select').val();

                $.ajax({
                    type:"GET",
                    data: "id=" + model_id + "&cat=" + cat_id + "&brand=" + brand_id + "&type=model",
                    url: "<?php echo url('/get-quotation-data')?>",
                    success: function(data) {
                        current.parent().children('input').val(data.cat_name);

                        var rate = data.rate;
                        rate = rate.toString();
                        rate = rate.replace(/\./g, ',');

                        current.parent().parent().find('.td-rate').children('input').val(rate);

                        var vat_percentage = parseInt($('#vat_percentage').val());
                        vat_percentage = vat_percentage + 100;
                        var cost = current.parent().parent().find('.td-rate').children('input').val();
                        cost = cost.replace(/\,/g, '.');
                        var qty = current.parent().parent().find('.td-qty').children('input').val();
                        qty = qty.replace(/\,/g, '.');

                        var amount = cost * qty;

                        amount = parseFloat(amount).toFixed(2);

                        if(isNaN(amount))
                        {
                            amount = 0;
                        }

                        amount = amount.replace(/\./g, ',');

                        current.parent().parent().find('.td-amount').children('input').val(amount);

                        var amounts = [];
                        $("input[name='amount[]']").each(function() {
                            amounts.push($(this).val().replace(/\,/g, '.'));
                        });

                        var grand_total = 0;

                        for (let i = 0; i < amounts.length; ++i) {

                            if(isNaN(parseFloat(amounts[i])))
                            {
                                amounts[i] = 0;
                            }

                            grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                        }

                        var vat = grand_total/vat_percentage * 100;
                        vat = grand_total - vat;
                        vat = parseFloat(vat).toFixed(2);

                        var sub_total = grand_total - vat;
                        sub_total = parseFloat(sub_total).toFixed(2);

                        $('#sub_total').val(sub_total.replace(/\./g, ','));
                        $('#tax_amount').val(vat.replace(/\./g, ','));
                        $('#grand_total').val(grand_total);

                        $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));
                    }
                });

            });

            $(".add-row").click(function(){

                var rowCount = $('.items-table tr').length;

                $(".items-table").append('<tr>\n' +
                    '                                                                        <td>'+rowCount+'</td>\n' +
                    '                                                                        <td class="service_box">\n' +
                    '                                                                            <select class="js-data-example-ajax form-control" style="width: 100%" name="item[]" required>\n' +
                    '                                                                                    <option value="">Select Category/Item</option>\n' +
                    '                                                                                @foreach($all_services as $key)\n' +
                    '                                                                                    <option value="{{$key->id}}">{{$key->cat_name}}</option>\n' +
                    '                                                                                @endforeach\n' +
                    '                                                                                @foreach($items as $key)\n' +
                    '                                                                                    <option value="{{$key->id}}I">{{$key->cat_name}}</option>\n' +
                    '                                                                                @endforeach\n' +
                    '                                                                            </select>\n' +
                    '                                                                           <input type="hidden" name="service_title[]" value="">\n'+
                    '                                                                        </td>\n' +
                    '                                                                        <td class="brand_box">\n' +
                    '                                                                            <select class="js-data-example-ajax1 form-control" style="width: 100%" name="brand[]" required>\n' +
                    '                                                                                    <option value="">Select Brand</option>\n' +
                    '                                                                            </select>\n' +
                    '                                                                           <input type="hidden" name="brand_title[]" value="">\n'+
                    '                                                                        </td>\n' +
                    '                                                                        <td class="model_box">\n' +
                    '                                                                            <select class="js-data-example-ajax2 form-control" style="width: 100%" name="model[]" required>\n' +
                    '                                                                                    <option value="">Select Model</option>\n' +
                    '                                                                            </select>\n' +
                    '                                                                           <input type="hidden" name="model_title[]" value="">\n'+
                    '                                                                        </td>\n' +
                    '                                                                        <td class="td-rate">\n' +
                    '                                                                            <input name="cost[]" maskedFormat="9,1" autocomplete="off" class="form-control" type="text" required>\n' +
                    '                                                                        </td>\n' +
                    '                                                                        <td class="td-qty">\n' +
                    '                                                                            <input name="qty[]" maskedFormat="9,1" autocomplete="off" class="form-control" type="text" required>\n' +
                    '                                                                        </td>\n' +
                    '                                                                        <td class="td-amount">\n' +
                    '                                                                            <input name="amount[]" class="form-control" readonly="" type="text">\n' +
                    '                                                                        </td>\n' +
                    '                                                                        <td style="text-align: center;" class="td-desc">\n' +
                    '                                                                            <input type="hidden" name="description[]" id="description" class="form-control">\n' +
                    '                                                                            <a href="javascript:void(0)" class="add-desc" title="Add Description" style="color: black;"><i style="font-size: 20px;" class="fa fa-plus-square"></i></a>\n' +
                    '                                                                        </td>\n' +
                    '                                                                        <td style="text-align: center;"><a href="javascript:void(0)" class="text-danger font-18 remove-row" title="Remove"><i class="fa fa-trash-o"></i></a></td>\n' +
                    '                                                                    </tr>');

                $(".add-desc").click(function(){
                    current_desc = $(this);
                    var d = current_desc.prev('input').val();
                    $('#description-text').val(d);
                    $("#myModal1").modal('show');
                });


                $(".js-data-example-ajax").change(function(){

                    var current = $(this);

                    var id = current.val();
                    var handyman_id = $('#handyman_id').val();

                    $.ajax({
                        type:"GET",
                        data: "id=" + id + "&type=service",
                        url: "<?php echo url('/get-quotation-data')?>",
                        success: function(data) {

                            current.parent().children('input').val(data.cat_name);

                            if(data.rate)
                            {
                                var rate = data.rate;
                                rate = rate.toString();
                                rate = rate.replace(/\./g, ',');
                                current.parent().parent().find('.td-rate').children('input').val(rate);
                            }
                            else
                            {
                                current.parent().parent().find('.td-rate').children('input').val(0);
                            }

                            var vat_percentage = parseInt($('#vat_percentage').val());
                            vat_percentage = vat_percentage + 100;
                            var cost = current.parent().parent().find('.td-rate').children('input').val();
                            cost = cost.replace(/\,/g, '.');
                            var qty = current.parent().parent().find('.td-qty').children('input').val();
                            qty = qty.replace(/\,/g, '.');

                            var amount = cost * qty;

                            amount = parseFloat(amount).toFixed(2);

                            if(isNaN(amount))
                            {
                                amount = 0;
                            }

                            amount = amount.replace(/\./g, ',');

                            current.parent().parent().find('.td-amount').children('input').val(amount);

                            var amounts = [];
                            $("input[name='amount[]']").each(function() {
                                amounts.push($(this).val().replace(/\,/g, '.'));
                            });

                            var grand_total = 0;

                            for (let i = 0; i < amounts.length; ++i) {

                                if(isNaN(parseFloat(amounts[i])))
                                {
                                    amounts[i] = 0;
                                }

                                grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                            }

                            var vat = grand_total/vat_percentage * 100;
                            vat = grand_total - vat;
                            vat = parseFloat(vat).toFixed(2);

                            var sub_total = grand_total - vat;
                            sub_total = parseFloat(sub_total).toFixed(2);

                            $('#sub_total').val(sub_total.replace(/\./g, ','));
                            $('#tax_amount').val(vat.replace(/\./g, ','));
                            $('#grand_total').val(grand_total);

                            $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));
                        }
                    });

                    var category_id = current.val();
                    var item_check = category_id.includes('I');

                    if(!item_check)
                    {
                        var options = '';

                        $.ajax({
                            type:"GET",
                            data: "id=" + category_id + "&handyman_id=" + handyman_id,
                            url: "<?php echo route('products-brands-by-category') ?>",
                            success: function(data) {

                                $.each(data, function(index, value) {

                                    var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';

                                    options = options + opt;

                                });

                                current.parent().next().children('select').find('option')
                                    .remove()
                                    .end()
                                    .append('<option value="">Select Brand</option>'+options);

                                current.parent().next().next().children('select').find('option')
                                    .remove()
                                    .end()
                                    .append('<option value="">Select Model</option>');

                            }
                        });
                    }

                });


                $(".js-data-example-ajax1").change(function(){

                    var current = $(this);

                    var brand_id = current.val();
                    var handyman_id = $('#handyman_id').val();

                    $.ajax({
                        type:"GET",
                        data: "id=" + brand_id + "&type=brand",
                        url: "<?php echo url('/get-quotation-data')?>",
                        success: function(data) {
                            current.parent().children('input').val(data.cat_name);
                        }
                    });

                    var options = '';

                    $.ajax({
                        type:"GET",
                        data: "id=" + brand_id + "&handyman_id=" + handyman_id,
                        url: "<?php echo route('products-models-by-brands') ?>",
                        success: function(data) {

                            $.each(data, function(index, value) {

                                var opt = '<option value="'+value.id+'" >'+value.cat_name+'</option>';

                                options = options + opt;

                            });

                            current.parent().next().children('select').find('option')
                                .remove()
                                .end()
                                .append('<option value="">Select Model</option>'+options);

                        }
                    });

                });


                $(".js-data-example-ajax2").change(function(){

                    var current = $(this);
                    var model_id = current.val();
                    var brand_id = current.parent().parent().find('.brand_box').children('select').val();
                    var cat_id = current.parent().parent().find('.service_box').children('select').val();

                    $.ajax({
                        type:"GET",
                        data: "id=" + model_id + "&cat=" + cat_id + "&brand=" + brand_id + "&type=model",
                        url: "<?php echo url('/get-quotation-data')?>",
                        success: function(data) {
                            current.parent().children('input').val(data.cat_name);

                            var rate = data.rate;
                            rate = rate.toString();
                            rate = rate.replace(/\./g, ',');

                            current.parent().parent().find('.td-rate').children('input').val(rate);

                            var vat_percentage = parseInt($('#vat_percentage').val());
                            vat_percentage = vat_percentage + 100;
                            var cost = current.parent().parent().find('.td-rate').children('input').val();
                            cost = cost.replace(/\,/g, '.');
                            var qty = current.parent().parent().find('.td-qty').children('input').val();
                            qty = qty.replace(/\,/g, '.');

                            var amount = cost * qty;

                            amount = parseFloat(amount).toFixed(2);

                            if(isNaN(amount))
                            {
                                amount = 0;
                            }

                            amount = amount.replace(/\./g, ',');

                            current.parent().parent().find('.td-amount').children('input').val(amount);

                            var amounts = [];
                            $("input[name='amount[]']").each(function() {
                                amounts.push($(this).val().replace(/\,/g, '.'));
                            });

                            var grand_total = 0;

                            for (let i = 0; i < amounts.length; ++i) {

                                if(isNaN(parseFloat(amounts[i])))
                                {
                                    amounts[i] = 0;
                                }

                                grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                            }

                            var vat = grand_total/vat_percentage * 100;
                            vat = grand_total - vat;
                            vat = parseFloat(vat).toFixed(2);

                            var sub_total = grand_total - vat;
                            sub_total = parseFloat(sub_total).toFixed(2);

                            $('#sub_total').val(sub_total.replace(/\./g, ','));
                            $('#tax_amount').val(vat.replace(/\./g, ','));
                            $('#grand_total').val(grand_total);

                            $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));
                        }
                    });

                });

                $('.estimate_date').datepicker({

                    format: 'dd-mm-yyyy',
                    startDate: new Date(),

                });

                $(".js-data-example-ajax").select2({
                    width: '100%',
                    height: '200px',
                    placeholder: "Select Category/Item",
                    allowClear: true,
                });

                $(".js-data-example-ajax1").select2({
                    width: '100%',
                    height: '200px',
                    placeholder: "Select Brand",
                    allowClear: true,
                });

                $(".js-data-example-ajax2").select2({
                    width: '100%',
                    height: '200px',
                    placeholder: "Select Model",
                    allowClear: true,
                });

                $(".remove-row").click(function(){

                    var rowCount = $('.items-table tr').length;

                    $(this).parent().parent().remove();

                    $(".items-table tbody tr").each(function(index) {
                        $(this).children('td:first-child').text(index+1);
                    });

                    var vat_percentage = parseInt($('#vat_percentage').val());
                    vat_percentage = vat_percentage + 100;

                    var amounts = [];
                    $("input[name='amount[]']").each(function() {
                        amounts.push($(this).val().replace(/\,/g, '.'));
                    });

                    var grand_total = 0;

                    for (let i = 0; i < amounts.length; ++i) {

                        if(isNaN(parseFloat(amounts[i])))
                        {
                            amounts[i] = 0;
                        }

                        grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                    }

                    var vat = grand_total/vat_percentage * 100;
                    vat = grand_total - vat;
                    vat = parseFloat(vat).toFixed(2);

                    var sub_total = grand_total - vat;
                    sub_total = parseFloat(sub_total).toFixed(2);

                    $('#sub_total').val(sub_total.replace(/\./g, ','));
                    $('#tax_amount').val(vat.replace(/\./g, ','));
                    $('#grand_total').val(grand_total);

                    $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));

                });

                $("input[name='cost[]'").keypress(function(e){

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

                $("input[name='qty[]'").keypress(function(e){

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

                $("input[name='qty[]'").on('focusout',function(e){
                    if($(this).val().slice($(this).val().length - 1) == ',')
                    {
                        var val = $(this).val();
                        val = val + '00';
                        $(this).val(val);
                    }
                });

                $("input[name='cost[]'").on('input',function(e){

                    var vat_percentage = parseInt($('#vat_percentage').val());
                    vat_percentage = vat_percentage + 100;
                    var cost = $(this).val();
                    cost = cost.replace(/\,/g, '.');
                    var qty = $(this).parent().parent().find('.td-qty').children('input').val();
                    qty = qty.replace(/\,/g, '.');

                    var amount = cost * qty;

                    amount = parseFloat(amount).toFixed(2);

                    if(isNaN(amount))
                    {
                        amount = 0;
                    }

                    amount = amount.replace(/\./g, ',');

                    $(this).parent().parent().find('.td-amount').children('input').val(amount);

                    var amounts = [];
                    $("input[name='amount[]']").each(function() {
                        amounts.push($(this).val().replace(/\,/g, '.'));
                    });

                    var grand_total = 0;

                    for (let i = 0; i < amounts.length; ++i) {

                        if(isNaN(parseFloat(amounts[i])))
                        {
                            amounts[i] = 0;
                        }

                        grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                    }

                    var vat = grand_total/vat_percentage * 100;
                    vat = grand_total - vat;
                    vat = parseFloat(vat).toFixed(2);

                    var sub_total = grand_total - vat;
                    sub_total = parseFloat(sub_total).toFixed(2);

                    $('#sub_total').val(sub_total.replace(/\./g, ','));
                    $('#tax_amount').val(vat.replace(/\./g, ','));
                    $('#grand_total').val(grand_total);

                    $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));

                });

                $("input[name='qty[]'").on('input',function(e){

                    var vat_percentage = parseInt($('#vat_percentage').val());
                    vat_percentage = vat_percentage + 100;
                    var qty = $(this).val();
                    qty = qty.replace(/\,/g, '.');
                    var cost = $(this).parent().parent().find('.td-rate').children('input').val();
                    cost = cost.replace(/\,/g, '.');

                    var amount = cost * qty;

                    amount = parseFloat(amount).toFixed(2);

                    if(isNaN(amount))
                    {
                        amount = 0;
                    }

                    amount = amount.replace(/\./g, ',');

                    $(this).parent().parent().find('.td-amount').children('input').val(amount);

                    var amounts = [];
                    $("input[name='amount[]']").each(function() {
                        amounts.push($(this).val().replace(/\,/g, '.'));
                    });

                    var grand_total = 0;

                    for (let i = 0; i < amounts.length; ++i) {

                        if(isNaN(parseFloat(amounts[i])))
                        {
                            amounts[i] = 0;
                        }

                        grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                    }

                    var vat = grand_total/vat_percentage * 100;
                    vat = grand_total - vat;
                    vat = parseFloat(vat).toFixed(2);

                    var sub_total = grand_total - vat;
                    sub_total = parseFloat(sub_total).toFixed(2);

                    $('#sub_total').val(sub_total.replace(/\./g, ','));
                    $('#tax_amount').val(vat.replace(/\./g, ','));
                    $('#grand_total').val(grand_total);

                    $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));

                });

            });

            $(".remove-row").click(function(){

                var rowCount = $('.items-table tr').length;

                $(this).parent().parent().remove();

                $(".items-table tbody tr").each(function(index) {
                    $(this).children('td:first-child').text(index+1);
                });

                var vat_percentage = parseFloat($('#vat_percentage').val());
                vat_percentage = vat_percentage + 100;

                var amounts = [];
                $("input[name='amount[]']").each(function() {
                    amounts.push($(this).val().replace(/\,/g, '.'));
                });

                var grand_total = 0;

                for (let i = 0; i < amounts.length; ++i) {

                    if(isNaN(parseFloat(amounts[i])))
                    {
                        amounts[i] = 0;
                    }

                    grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                }

                var vat = grand_total/vat_percentage * 100;
                vat = grand_total - vat;
                vat = parseFloat(vat).toFixed(2);

                var sub_total = grand_total - vat;
                sub_total = parseFloat(sub_total).toFixed(2);

                $('#sub_total').val(sub_total.replace(/\./g, ','));
                $('#tax_amount').val(vat.replace(/\./g, ','));
                $('#grand_total').val(grand_total);

                $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));

            });

            $("input[name='cost[]'").keypress(function(e){

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

            $("input[name='qty[]'").keypress(function(e){

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

            $("input[name='qty[]'").on('focusout',function(e){
                if($(this).val().slice($(this).val().length - 1) == ',')
                {
                    var val = $(this).val();
                    val = val + '00';
                    $(this).val(val);
                }
            });

            $("input[name='cost[]'").on('input',function(e){

                var vat_percentage = parseInt($('#vat_percentage').val());
                vat_percentage = vat_percentage + 100;
                var cost = $(this).val();
                cost = cost.replace(/\,/g, '.');
                var qty = $(this).parent().parent().find('.td-qty').children('input').val();
                qty = qty.replace(/\,/g, '.');

                var amount = cost * qty;

                amount = parseFloat(amount).toFixed(2);

                if(isNaN(amount))
                {
                    amount = 0;
                }

                amount = amount.replace(/\./g, ',');

                $(this).parent().parent().find('.td-amount').children('input').val(amount);

                var amounts = [];
                $("input[name='amount[]']").each(function() {
                    amounts.push($(this).val().replace(/\,/g, '.'));
                });

                var grand_total = 0;

                for (let i = 0; i < amounts.length; ++i) {

                    if(isNaN(parseInt(amounts[i])))
                    {
                        amounts[i] = 0;
                    }

                    grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                }

                var vat = grand_total/vat_percentage * 100;
                vat = grand_total - vat;
                vat = parseFloat(vat).toFixed(2);

                var sub_total = grand_total - vat;
                sub_total = parseFloat(sub_total).toFixed(2);

                $('#sub_total').val(sub_total.replace(/\./g, ','));
                $('#tax_amount').val(vat.replace(/\./g, ','));
                $('#grand_total').val(grand_total);

                $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));

            });

            $("input[name='qty[]'").on('input',function(e){

                var vat_percentage = parseInt($('#vat_percentage').val());
                vat_percentage = vat_percentage + 100;
                var qty = $(this).val();
                qty = qty.replace(/\,/g, '.');
                var cost = $(this).parent().parent().find('.td-rate').children('input').val();
                cost = cost.replace(/\,/g, '.');

                var amount = cost * qty;

                amount = parseFloat(amount).toFixed(2);

                if(isNaN(amount))
                {
                    amount = 0;
                }

                amount = amount.replace(/\./g, ',');

                $(this).parent().parent().find('.td-amount').children('input').val(amount);

                var amounts = [];
                $("input[name='amount[]']").each(function() {
                    amounts.push($(this).val().replace(/\,/g, '.'));
                });

                var grand_total = 0;

                for (let i = 0; i < amounts.length; ++i) {

                    if(isNaN(parseInt(amounts[i])))
                    {
                        amounts[i] = 0;
                    }

                    grand_total = (parseFloat(amounts[i]) + parseFloat(grand_total)).toFixed(2);
                }

                var vat = grand_total/vat_percentage * 100;
                vat = grand_total - vat;
                vat = parseFloat(vat).toFixed(2);

                var sub_total = grand_total - vat;
                sub_total = parseFloat(sub_total).toFixed(2);

                $('#sub_total').val(sub_total.replace(/\./g, ','));
                $('#tax_amount').val(vat.replace(/\./g, ','));
                $('#grand_total').val(grand_total);

                $('#grand_total_cell').text('€ ' + grand_total.replace(/\./g, ','));

            });


        });
    </script>

@endsection
