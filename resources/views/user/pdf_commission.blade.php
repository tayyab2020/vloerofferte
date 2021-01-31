@extends('layouts.pdfHead')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Commission Invoice</h1>
        </div>
    </section>

    <div class="container" style="width: 100%;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5" style="margin-right: 15px !important;">

                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <img class="img-fluid" src="{{ public_path('assets/images/'.$gs->logo) }}" style="width:50%; height:100%;margin-bottom: 30px;">

                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 text-right inv-rigth" style="float: right;margin-top: 50px;">

                                <p class="para" style="margin-top: 20px;margin-left: 26px;">{!! $gs->street  !!}<br>TEL: {{$gs->phone}}<br>BTW: NL001973883B94<br>IBAN: NL87ABNA0825957680<br>KvK-nummer: 70462623</p>

                            </div>

                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5" style="margin-right: 15px !important;">

                            <?php $date = date('d-m-Y');  ?>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p class="mb-1 m-rest">{{$request[0]->company_name}}</p>
                                <p class="mb-1 m-rest">{{$request[0]->address}}</p>
                                <p class="mb-1 m-rest">{{$request[0]->postcode}} {{$request[0]->city}}</p>
                                <p class="mb-1 m-rest">{{$request[0]->tax_number}}</p>
                                <p class="mb-1 m-rest">{{$request[0]->registration_number}}</p>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 text-right m2-heading" style="float: right;">
                                <p class="font-weight-bold mb-4 m-heading">INV# {{$commission_invoice_number}}</p>
                                <p class="mb-1 m-rest">Created at: {{$date}}</p>
                                <p class="mb-1 m-rest">Customer Invoice: INV# {{$quotation_invoice_number}}</p>
                                <p class="mb-1 m-rest">Requested Quote Number: {{$requested_quote_number}}</p>
                                <p class="mb-1 m-rest">Requested Service: {{$quote->cat_name}}</p>
                                <p class="mb-1 m-rest">Address: {{$quote->quote_zipcode}}</p>
                            </div>

                        </div>

                        <div class="row p-5" style="font-size: 15px;padding: 2rem !important;">
                            <div class="col-md-12" style="padding: 0px !important;padding-top: 50px;">
                                <table class="table" style="border: 1px solid #e5e5e5;">
                                    <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Costs</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Amount</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">VAT %</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">VAT</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $commission_vat = ($commission/($request[0]->vat_percentage + 100)) * 100;
                                        $commission_vat = $commission - $commission_vat;
                                        $subtotal = $commission - $commission_vat;
                                    ?>

                                    <tr>
                                        <td>Commission</td>
                                        <td>€ {{number_format((float)$commission, 2, ',', '.')}}</td>
                                        <td>{{$request[0]->vat_percentage}}%</td>
                                        <td>{{number_format((float)$commission_vat, 2, ',', '.')}}</td>
                                    </tr>

                                    <tr>
                                        <td>Subtotal excluding VAT</td>
                                        <td>€ {{number_format((float)$subtotal, 2, ',', '.')}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>VAT</td>
                                        <td>€ {{number_format((float)$commission_vat, 2, ',', '.')}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Total including VAT</td>
                                        <td>€ {{number_format((float)$commission, 2, ',', '.')}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td style="font-weight: bold;color: black;">Your Sales</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td style="border-top: 1px solid black;">Short Description</td>
                                        <td style="border-top: 1px solid black;">Amount</td>
                                        <td style="border-top: 1px solid black;">Qty</td>
                                        <td style="border-top: 1px solid black;">Cost</td>
                                    </tr>


                                    @foreach($request as $key)

                                        <tr>
                                            <td>{{$key->service}} {{$key->brand}} {{$key->model}}</td>
                                            <td>{{number_format((float)$key->amount, 2, ',', '.')}}</td>
                                            <td>{{$request[0]->qty}}</td>
                                            <td>{{number_format((float)$request[0]->rate, 2, ',', '.')}}</td>
                                        </tr>

                                    @endforeach

                                    <tr>
                                        <td style="border-top: 1px solid black;"></td>
                                        <td style="border-top: 1px solid black;">Grand Total</td>
                                        <td style="border-top: 1px solid black;">VAT %</td>
                                        <td style="border-top: 1px solid black;">VAT</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>€ {{number_format((float)$request[0]->grand_total, 2, ',', '.')}}</td>
                                        <td>{{$request[0]->vat_percentage}}%</td>
                                        <td>{{number_format((float)$request[0]->tax, 2, ',', '.')}}</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td style="background-color: gray;font-weight: bold;color: black;">Total to receive</td>
                                        <td style="background-color: gray;font-weight: bold;color: black;">€ {{number_format((float)$total_receive, 2, ',', '.')}}</td>
                                        <td style="background-color: gray;font-weight: bold;color: black;"></td>
                                        <td style="background-color: gray;font-weight: bold;color: black;"></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <style type="text/css">

                            .table td, .table th{
                                text-align: center;
                                vertical-align: middle;
                            }

                        </style>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <style type="text/css">

        @media (max-width: 768px) {

            .inv-rigth{

                margin-top: 45px;
            }

            .img-fluid{

                width: 80% !important;
            }

            .para{
                margin-left: 10px !important;
            }

            .m-heading{
                text-align: center;
            }

            .m-rest{
                text-align: center;
            }

            .m2-heading{

                margin-top: 40px;
            }

        }

        .col-12{

            flex: 0 0 100%;
            max-width: 100%;
        }



        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }


        .p-0{

            padding: 0 !important;
        }

        .card-body {

            flex: 1 1 auto;

        }

        .p-5{

            padding: 3rem !important;
        }

        .pb-5, .py-5{

            padding-bottom: 3rem !important;

        }

        .row{

            display: block;
            margin-right: 0px;
            margin-left: 0px;

        }

        .btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before
        {
            display:  table;
            content: " ";
        }


        .col-md-12{

            flex: 0 0 100%;
            max-width: 100%;
        }


        .font-weight-bold{

            font-weight: 700 !important;
        }

        .mb-1, .my-1{

            margin-bottom: .25rem !important;
            font-size: 15px;
        }

        p{

            margin-top: 0;
            margin-bottom: 1rem;
        }

        .mb-5, .my-5{

            margin-bottom: 3rem !important;

        }

        .mt-5, .my-5{

            margin-top: 3rem !important;
        }

        hr{

            box-sizing: content-box;
            height: 0;
            overflow: visible;
        }

        .mb-4, .my-4{

            margin-bottom: 1.5rem !important;
            font-size: 20px;
        }

        .table{

            margin-bottom: 1rem;
            background-color: transparent;
        }

        .border-0{

            border: 0 !important;
        }

        .table td, .table th{

            padding: 1.75rem !important;
            vertical-align: middle;
            text-align: center;
            border-top: 1px solid #dee2e6;
            min-width: 155px;
            width: 14%;
        }

        .text-white
        {

            color: #fff !important;


        }

        .p-4{

            padding: 1.5rem !important;
        }

        .flex-row-reverse{

            flex-direction: row-reverse !important;
        }

        .d-flex{

            display: flex !important;
        }

        .bg-dark{

            background-color: #343a40 !important;
        }



        .pb-3, .py-3{


            padding-bottom: 1rem !important;
        }



        .mb-2, .my-2{

            margin-bottom: .5rem !important;

        }


        .text-white{

            color: #fff !important;
        }

        .font-weight-light{

            font-weight: 300 !important;
        }

        .h2, h2{

            font-size: 2rem;
        }

        .mb-0, .my-0{

            margin-bottom: 0 !important;
        }

    </style>

@endsection