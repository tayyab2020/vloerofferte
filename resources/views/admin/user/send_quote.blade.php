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
                                        <h2>Send Quote Request</h2>
                                        <a href="{{route('quotation-requests')}}" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('user.quote')}}" method="POST" enctype="multipart/form-data">

                                        @include('includes.form-error')
                                        @include('includes.form-success')

                                        {{csrf_field()}}

                                        <input type="hidden" name="quote_id" value="{{$request->id}}">


                                        <div class="form-group" style="margin: 0;">
                                            <div style="text-align: center;">
                                                <p style="text-align: center;font-size: 20px;" class="form-control"><b>Service:</b> {{$request->cat_name}}</p>
                                            </div>
                                        </div>

                                        @if($handymen)

                                        <div class="form-group" style="margin: 30px 0px;overflow-y: auto;">

                                            <table style="margin: auto;display: table;text-align: center;">

                                                <thead>
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Radius</th>
                                                <th>Address</th>
                                                <th>Postcode</th>
                                                </thead>

                                                <tbody>
                                                @foreach($handymen as $i => $key)

                                                <tr>
                                                <td><input type="checkbox" name="action[]" value="{{$key->id}}" id="action{{$i}}"></td>
                                                <td>{{$key->name}} {{$key->family_name}}</td>
                                                <td><?php echo number_format((float)$array1[$i]['handyman_distance'], 2, '.', ''); ?> KM</td>
                                                <td>{{$key->address}}</td>
                                                <td>{{$key->postcode}}</td>
                                                </tr>

                                                @endforeach
                                                </tbody>

                                            </table>

                                        </div>

                                        @endif

                                        <div class="add-product-footer">
                                            <button type="submit" style="outline: none;" class="btn add-product_btn">Send</button>
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

<style type="text/css">

    td,th{
        padding: 20px !important;
        border: 1px solid lightgrey;
    }

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

@section('scripts')

    <script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        //]]>
    </script>



    <script src="{{asset('assets/admin/js/jquery152.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>

@endsection
