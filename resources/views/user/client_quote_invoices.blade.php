@extends('layouts.client')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard data-table area -->
                    <div class="section-padding add-product-1" style="padding: 0;">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                        @if(Route::currentRouteName() == 'client-quotations' || Route::currentRouteName() == 'client-custom-quotations')
                                            <h2>Quotations</h2>
                                        @else
                                            <h2>Quotation Invoices</h2>
                                        @endif
                                    </div>
                                    <hr>
                                    <div>
                                        @include('includes.form-success')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example" class="table table-striped table-hover products dt-responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="product-table_wrapper_info" style="width: 100%;margin-top: 55px !important;" width="100%" cellspacing="0">
                                                    <thead>

                                                    <tr role="row">

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 171px;" aria-label="Donor's Name: activate to sort column ascending" id="client">@if(Route::currentRouteName() == 'client-quotations' || Route::currentRouteName() == 'client-custom-quotations') Quotation Number @else Invoice Number @endif</th>

                                                        @if(Route::currentRouteName() != 'client-custom-quotations')

                                                        <th class="sorting_asc" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 239px;" aria-sort="ascending" aria-label="Donor's Photo: activate to sort column descending" id="photo">Request Number</th>

                                                        @endif

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 171px;" aria-label="Donor's Name: activate to sort column ascending" id="client">Handyman</th>

                                                        {{--<th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 171px;" aria-label="Donor's Name: activate to sort column ascending" id="handyman">Tax</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 95px;" aria-label="City: activate to sort column ascending" id="serv">Subtotal</th>--}}

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="rate">Grand Total</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="rate">Current Stage</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="client">Posting Date</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="client">Delivery Date</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="client">Time Remaining</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="date">Action</th>


                                                    </thead>

                                                    <tbody>
                                                    <?php $i=0;  ?>

                                                    @foreach($invoices as $key)

                                                        <tr role="row" class="odd">

                                                            @if(Route::currentRouteName() == 'client-custom-quotations')

                                                                <td><a href="{{ url('/handyman/custom-quotation/'.$key->invoice_id) }}">QUO# {{$key->quotation_invoice_number}}</a></td>

                                                            @else

                                                                <td><a href="{{ url('/handyman/quotation/'.$key->invoice_id) }}">@if(Route::currentRouteName() == 'client-quotations') QUO# @else INV# @endif{{$key->quotation_invoice_number}}</a></td>

                                                                <?php $requested_quote_number = date("Y", strtotime($key->created_at)) . "-" . sprintf('%04u', $key->id); ?>

                                                                <td><a href="{{ url('/handyman/view-quote-request/'.$key->id) }}">{{$requested_quote_number}}</a></td>

                                                            @endif

                                                            <td>{{$key->name}} {{$key->family_name}}</td>

                                                            {{--<td>{{$key->tax}}</td>

                                                            <td>{{$key->subtotal}}</td>--}}

                                                            <td>{{$key->grand_total}}</td>

                                                            <td>

                                                                @if(Route::currentRouteName() == 'client-quotations' || Route::currentRouteName() == 'client-custom-quotations')

                                                                    @if($key->status == 3)

                                                                        <span class="btn btn-success">Invoice Generated</span>

                                                                    @elseif($key->status == 2)

                                                                        @if($key->accepted)

                                                                            <span class="btn btn-success">Quotation Accepted</span>

                                                                        @else

                                                                            <span class="btn btn-primary1">Closed</span>

                                                                        @endif

                                                                    @else

                                                                        @if($key->ask_customization)

                                                                            <span class="btn btn-info">Asking for Review</span>

                                                                        @else

                                                                            <span class="btn btn-primary1">Quotation Received</span>

                                                                        @endif

                                                                    @endif

                                                                @else

                                                                    <span class="btn btn-success">Invoice Generated</span>

                                                                @endif

                                                             </td>

                                                            <?php

                                                                $date = strtotime($key->invoice_date);
                                                                $date = date('d-m-Y',$date);

                                                                $current_date = date('d-m-Y H:i:s', time());

                                                                $delivery_date = strtotime($key->date_delivery);
                                                                $delivery_date = date('d-m-Y',$delivery_date);

                                                                $delivery_date = $delivery_date.' 23:59:00';


                                                                $cal_delivery_date = strtotime($key->date_delivery);
                                                                $cal_delivery_date = date('Y-m-d',$cal_delivery_date);
                                                                $cal_delivery_date = $cal_delivery_date.' 23:59:00';


                                                                /*$dif = strtotime($delivery_date)-strtotime($current_date);
                                                                $dateDiff = intval(($dif)/60);

                                                                $days = intval($dateDiff/(60*24));
                                                                $hours = (intval($dateDiff/60)%24) + 1;
                                                                $minutes = $dateDiff%60;
                                                                $seconds = gmdate("s", $dif);

                                                                $interval = $days . 'd ' . $hours . 'h ' . $minutes . 'm ' . $seconds . 's';*/
                                                            ?>

                                                            <td>{{$date}}</td>

                                                                <td class="delivery_date">
                                                                    <input type="hidden" id="delivery_date" value="{{$cal_delivery_date}}">
                                                                    {{$delivery_date}}
                                                                </td>

                                                                <td class="interval"></td>

                                                            <td>
                                                                <div class="dropdown">
                                                                    <button style="outline: none;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                        <span class="caret"></span></button>
                                                                    <ul class="dropdown-menu">

                                                                        @if(Route::currentRouteName() == 'client-custom-quotations')

                                                                            <li><a href="{{ url('/handyman/custom-quotation/'.$key->invoice_id) }}">View</a></li>
                                                                            <li><a href="{{ url('/handyman/download-client-custom-quotation/'.$key->invoice_id) }}">Download PDF</a></li>

                                                                            @if($key->status != 2 && $key->status != 3)

                                                                                @if(!$key->ask_customization)
                                                                                    <li><a href="{{ url('/handyman/custom-quotation/ask-customization/'.$key->invoice_id) }}">Ask Again</a></li>
                                                                                @endif
                                                                                <li><a href="{{ url('/handyman/custom-quotation/accept-quotation/'.$key->invoice_id) }}">Accept</a></li>

                                                                            @endif

                                                                        @else

                                                                            <li><a href="{{ url('/handyman/quotation/'.$key->invoice_id) }}">View</a></li>
                                                                            <li><a href="{{ url('/handyman/view-quote-request/'.$key->id) }}">View Request</a></li>
                                                                            <li><a href="{{ url('/handyman/download-client-quote-invoice/'.$key->invoice_id) }}">Download PDF</a></li>

                                                                            @if($key->status != 0 && $key->status != 2 && $key->status != 3)

                                                                                @if(!$key->ask_customization)
                                                                                    <li><a href="{{ url('/handyman/ask-customization/'.$key->invoice_id) }}">Ask Again</a></li>
                                                                                @endif
                                                                                <li><a href="{{ url('/handyman/accept-quotation/'.$key->invoice_id) }}">Accept</a></li>

                                                                            @endif

                                                                        @endif

                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table></div></div>

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


    <style type="text/css">

        .btn-primary1
        {
            background-color: darkcyan;
            border-color: darkcyan;
            color: white !important;
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

    </style>


    <style type="text/css">

        table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting{

            padding-right: 0;
            padding-left: 0;
            text-align: center;
            border-top: 1px solid black !important;
            border-bottom: 1px solid black !important;
        }

        #img{

            width: 100% !important;
            display: block !important;
        }

        #photo{
            width: 250px !important;
        }

        #client{
            width: 230px !important;
        }

        #handyman{
            width: 230px !important;
        }

        #serv{
            width: 170px !important;
        }

        #rate{
            width: 175px !important;
        }

        #service{
            width: 151px !important;
        }

        #date{
            width: 158px !important;
        }

        #amount{
            width: 160px !important;
        }

        #status{
            width: 77px !important;
        }

        .table.products > tbody > tr > td
        {

            text-align: center;

        }


    </style>

@endsection

@section('scripts')

    <script type="text/javascript">

        $('.interval').each(function(i, obj) {

            var p = $(this);

            var delivery_date = $(this).prev().children('input').val();

            (function () {
                const second = 1000,
                    minute = second * 60,
                    hour = minute * 60,
                    day = hour * 24;


                let birthday = delivery_date.toString('M d, Y HH:mm:ss'),
                    countDown = new Date(birthday).getTime(),
                    x = setInterval(function() {

                        let now = new Date().getTime(),
                            distance = countDown - now;

                        var interval = Math.floor(distance / (day)) + 'd ' + Math.floor((distance % (day)) / (hour)) + 'h ' + Math.floor((distance % (hour)) / (minute)) + 'm ' + Math.floor((distance % (minute)) / second) + 's';


                        //do something later when date is reached
                        if (distance > 0) {

                            p.text(interval);

                        }
                        else
                        {
                            p.text('Expired');
                            clearInterval(x);
                        }
                        //seconds
                    }, 0)
            }());

        });

        $('#example').DataTable();
    </script>

@endsection
