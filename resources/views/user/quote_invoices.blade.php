@extends('layouts.handyman')

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
                                    <div class="add-product-header products" style="display: block;">
                                        @if(Route::currentRouteName() == 'quotations' || Route::currentRouteName() == 'customer-quotations')
                                            <h2 style="display: inline-block;">Quotations</h2>
                                        @else
                                            <h2 style="display: inline-block;">Quotation Invoices</h2>
                                        @endif

                                            @if(Route::currentRouteName() == 'customer-quotations')

                                                <a style="float: right;" href="{{url('/handyman/handyman-create-quotation')}}" class="btn add-newProduct-btn"><i class="fa fa-plus"></i> Create New Quotation</a>
                                                <a style="float: right;margin-right: 10px;" href="{{url('/handyman/handyman-create-direct-invoice')}}" class="btn add-newProduct-btn"><i class="fa fa-plus"></i> Create New Invoice</a>

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

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 171px;" aria-label="Donor's Name: activate to sort column ascending" id="client">@if(Route::currentRouteName() == 'quotations' || Route::currentRouteName() == 'customer-quotations') Quotation Number @else Invoice Number @endif</th>

                                                        @if(Route::currentRouteName() != 'customer-quotations')

                                                        <th class="sorting_asc" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 239px;" aria-sort="ascending" aria-label="Donor's Photo: activate to sort column descending" id="photo">Request Number</th>

                                                        @endif

                                                        @if(Route::currentRouteName() != 'customer-quotations')

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 171px;" aria-label="Donor's Name: activate to sort column ascending" id="handyman">Tax</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 95px;" aria-label="City: activate to sort column ascending" id="serv">Subtotal</th>

                                                        @else

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 171px;" aria-label="Donor's Name: activate to sort column ascending" id="handyman">Customer Name</th>

                                                        @endif

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="rate">Grand Total</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="rate">Current Stage</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="service">Date</th>

                                                        <th class="sorting" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" style="width: 134px;" aria-label="Blood Group: activate to sort column ascending" id="date">Action</th>


                                                    </thead>

                                                    <tbody>
                                                    <?php $i=0;  ?>

                                                    @foreach($invoices as $key)

                                                        <tr role="row" class="odd">

                                                            @if(Route::currentRouteName() == 'customer-quotations')

                                                                <td><a href="{{ url('/handyman/view-custom-quotation/'.$key->invoice_id) }}">QUO# {{$key->quotation_invoice_number}}</a></td>

                                                            @else

                                                                <td><a href="{{ url('/handyman/view-quotation/'.$key->invoice_id) }}">@if(Route::currentRouteName() == 'quotations') QUO# @else INV# @endif {{$key->quotation_invoice_number}}</a></td>

                                                                <?php $requested_quote_number = date("Y", strtotime($key->created_at)) . "-" . sprintf('%04u', $key->id); ?>

                                                                <td><a href="{{ url('/handyman/view-handyman-quote-request/'.$key->id) }}">{{$requested_quote_number}}</a></td>

                                                            @endif


                                                            @if(Route::currentRouteName() != 'customer-quotations')

                                                            <td>{{$key->tax}}</td>

                                                            <td>{{$key->subtotal}}</td>

                                                            @else

                                                            <td>{{$key->name}} {{$key->family_name}}</td>

                                                            @endif


                                                            <td>{{$key->grand_total}}</td>

                                                            <td>

                                                                @if(Route::currentRouteName() == 'quotations' || Route::currentRouteName() == 'customer-quotations')

                                                                    @if($key->status == 3)

                                                                        <span class="btn btn-success">Invoice Generated</span>

                                                                    @elseif($key->status == 2)

                                                                        @if($key->accepted)

                                                                            <span class="btn btn-primary1">Quotation Accepted</span>

                                                                        @else

                                                                            <span class="btn btn-success">Closed</span>

                                                                        @endif

                                                                    @else

                                                                        @if($key->ask_customization)

                                                                            <span class="btn btn-info">Asking for Review</span>

                                                                        @elseif($key->approved)

                                                                            <span class="btn btn-success">Quotation Approved</span>

                                                                        @else

                                                                            <span class="btn btn-warning">Pending</span>

                                                                        @endif

                                                                    @endif

                                                                @else

                                                                    <span class="btn btn-success">Invoice Generated</span>

                                                                @endif

                                                            </td>

                                                            <?php $date = strtotime($key->invoice_date);

                                                            $date = date('d-m-Y',$date);  ?>

                                                            <td>{{$date}}</td>

                                                            <td>
                                                                <div class="dropdown">
                                                                    <button style="outline: none;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                                        <span class="caret"></span></button>
                                                                    <ul class="dropdown-menu">

                                                                        @if(Route::currentRouteName() == 'customer-quotations')

                                                                            <li><a href="{{ url('/handyman/view-custom-quotation/'.$key->invoice_id) }}">View</a></li>
                                                                            <li><a href="{{ url('/handyman/download-custom-quotation/'.$key->invoice_id) }}">Download PDF</a></li>

                                                                            @if(!$key->approved)

                                                                            <li><a href="{{ url('/handyman/send-custom-quotation/'.$key->invoice_id) }}">Send Quotation</a></li>

                                                                            @endif

                                                                            @if($key->status == 2 && $key->accepted)

                                                                                <li><a href="{{ url('/handyman/create-custom-invoice/'.$key->invoice_id) }}">Create Invoice</a></li>

                                                                            @endif

                                                                            @if($key->status != 2 && $key->status != 3)
                                                                                <li><a href="{{ url('/handyman/edit-custom-quotation/'.$key->invoice_id) }}">Edit Quotation</a></li>
                                                                            @endif

                                                                        @else

                                                                            <li><a href="{{ url('/handyman/view-quotation/'.$key->invoice_id) }}">View</a></li>
                                                                            <li><a href="{{ url('/handyman/view-handyman-quote-request/'.$key->id) }}">View Request</a></li>
                                                                            <li><a href="{{ url('/handyman/download-quote-invoice/'.$key->invoice_id) }}">Download PDF</a></li>

                                                                            @if($key->status == 2 && $key->accepted)

                                                                                <li><a href="{{ url('/handyman/create-invoice/'.$key->invoice_id) }}">Create Invoice</a></li>

                                                                            @elseif($key->status == 1)

                                                                                @if($key->ask_customization)
                                                                                    <li><a href="{{ url('/handyman/edit-quotation/'.$key->invoice_id) }}">Edit Quotation</a></li>
                                                                                @endif

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
        $('#example').DataTable();
    </script>

@endsection
