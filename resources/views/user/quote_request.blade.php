@extends('layouts.client')

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
                                        <h2>View / Edit Quote Request</h2>
                                        <a href="{{route('quotation-requests')}}" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr>

                                    <div class="form-horizontal">

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Name* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_name}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Family Name* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_familyname}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Email* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_email}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Contact* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_contact}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Service* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->cat_name}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Zip Code* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_zipcode}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">When* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_when}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Budget* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_budget}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Job Type* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_job}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Work Type* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_work}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Status* </label>
                                            <div class="col-sm-6">
                                                <p style="padding: 10px;" class="form-control">{{$request->quote_status}}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="service_description">Description*</label>
                                            <div class="col-sm-6">
                                                <p class="form-control" style="padding: 10px;">{{$request->quote_description}}</p>
                                            </div>
                                        </div>

                                    </div>
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


    <script src="{{asset('assets/admin/js/jquery152.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>

@endsection