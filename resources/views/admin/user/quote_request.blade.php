@extends('layouts.admin')

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
                                    <form class="form-horizontal" action="{{route('user.quote')}}" method="POST" enctype="multipart/form-data">

                                        @include('includes.form-error')
                                        @include('includes.form-success')

                                        {{csrf_field()}}

                                        <input type="hidden" name="quote_id" value="{{$request->id}}">

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Name* </label>
                                            <div class="col-sm-6">
                                                <input class="form-control" value="{{$request->quote_name}}" name="quote_name" id="quote_name" placeholder="Enter Name" required="" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Family Name* </label>
                                            <div class="col-sm-6">
                                                <input class="form-control" value="{{$request->quote_familyname}}" name="quote_familyname" id="quote_familyname" placeholder="Enter Family Name" required="" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Email* </label>
                                            <div class="col-sm-6">
                                                <input class="form-control" value="{{$request->quote_email}}" name="quote_email" id="quote_email" placeholder="Enter Email" required="" type="email" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Contact* </label>
                                            <div class="col-sm-6">
                                                <input class="form-control" value="{{$request->quote_contact}}" name="quote_contact" id="quote_contact" placeholder="Enter Contact Number" required="" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Service* </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="quote_service" id="quote_service" required="">
                                                    @foreach($services as $key)

                                                        <option @if($request->quote_service == $key->id) selected @endif value="{{$key->id}}">{{$key->cat_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_slug">Zip Code* </label>
                                            <div class="col-sm-6">
                                                <input class="form-control" value="{{$request->quote_zipcode}}" name="quote_zipcode" id="quote_zipcode" placeholder="Enter Zip Code" required="" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">When* </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="quote_when" id="quote_when" required="">
                                                    <option @if($request->quote_when == "Emergency") selected @endif value="Emergency">Emergency</option>
                                                    <option @if($request->quote_when == "ASAP") selected @endif value="ASAP">ASAP</option>
                                                    <option @if($request->quote_when == "Next few days") selected @endif value="Next few days">Next few days</option>
                                                    <option @if($request->quote_when == "I'm Flexible") selected @endif value="I'm Flexible">I'm Flexible</option>
                                                    <option @if($request->quote_when == "Few Months") selected @endif value="Few Months">Few Months</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Budget* </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="quote_budget" id="quote_budget" required="">
                                                    <option @if($request->quote_budget == "Under € 1000") selected @endif value="Under € 1000">Under € 1000</option>
                                                    <option @if($request->quote_budget == "€ 1000 - € 5000") selected @endif value="€ 1000 - € 5000">€ 1000 - € 5000</option>
                                                    <option @if($request->quote_budget == "€ 5000 - € 10000") selected @endif value="€ 5000 - € 10000">€ 5000 - € 10000</option>
                                                    <option @if($request->quote_budget == "More than € 10000") selected @endif value="More than € 10000">More than € 10000</option>
                                                    <option @if($request->quote_budget == "Not Sure") selected @endif value="Not Sure">Not Sure</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Job Type* </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="quote_job" id="quote_job" required="">
                                                    <option @if($request->quote_job == "Residential") selected @endif value="Residential">Residential</option>
                                                    <option @if($request->quote_job == "Commercial") selected @endif value="Commercial">Commercial</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Work Type* </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="quote_work" id="quote_work" required="">
                                                    <option @if($request->quote_work == "New Build") selected @endif value="New Build">New Build</option>
                                                    <option @if($request->quote_work == "Renovations") selected @endif value="Renovations">Renovations</option>
                                                    <option @if($request->quote_work == "Repairs") selected @endif value="Repairs">Repairs</option>
                                                    <option @if($request->quote_work == "Installation") selected @endif value="Installation">Installation</option>
                                                    <option @if($request->quote_work == "Maintenance") selected @endif value="Maintenance">Maintenance</option>
                                                    <option @if($request->quote_work == "Other") selected @endif value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Status* </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="quote_status" id="quote_status" required="">
                                                    <option @if($request->quote_status == "Ready to hire") selected @endif value="Ready to hire">Ready to hire</option>
                                                    <option @if($request->quote_status == "Planning & Budgeting") selected @endif value="Planning & Budgeting">Planning & Budgeting</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="service_description">Description*</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="quote_description" id="quote_description" rows="5" style="resize: vertical;" placeholder="Enter Description of Job">{{$request->quote_description}}</textarea>
                                            </div>
                                        </div>


                                        <hr>
                                        <div class="add-product-footer">
                                            <button type="submit" style="outline: none;" class="btn add-product_btn">EDIT</button>
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNlftIg-4OOM7dicTvWaJm46DgD-Wz61Q&libraries=places&callback=initMap" async defer></script>

    <script type="text/javascript">

        function initMap() {

            var input = document.getElementById('quote_zipcode');

            var options = {
                componentRestrictions: {country: "nl"}
            };

            var autocomplete = new google.maps.places.Autocomplete(input,options);


            // Set the data fields to return when the user selects a place.
            autocomplete.setFields(
                ['address_components', 'geometry', 'icon', 'name']);


            autocomplete.addListener('place_changed', function() {

                var place = autocomplete.getPlace();


                if (!place.geometry) {

                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                var city = '';

                for(var i=0; i < place.address_components.length; i++)
                {

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
                            var city = place.address_components[i].long_name;
                        }
                    }
                }

            });
        }

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
