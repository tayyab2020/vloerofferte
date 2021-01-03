@extends('layouts.handyman')

@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header products">
                                        <h2>My Products</h2>
                                        <a href="{{route('product-create')}}" class="btn add-newProduct-btn"><i
                                                class="fa fa-plus"></i> Add New Product</a>
                                    </div>
                                    <hr>
                                    <div>
                                        @include('includes.form-success')

                                        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
                                        <link rel="stylesheet" href="https://gurayyarar.github.io/AdminBSBMaterialDesign/css/style.css" />

                                        <script src="{{asset('assets/admin/js/editable.js')}}"></script>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="header">

                                                        <ul style="top: 10px;" class="header-dropdown m-r--5">
                                                            <li class="dropdown">
                                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="material-icons">more_vert</i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="body">
                                                        <table id="example1" class="mainTable table table-striped table-hover products dt-responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="product-table_wrapper_info" style="width: 100%;margin-top: 55px !important;cursor: pointer;" width="100%" cellspacing="0">
                                                            <thead>
                                                            <tr role="row">
                                                                <th class="no-sort"></th>
                                                                <th class="sorting" id="photo" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Photo</th>
                                                                <th class="sorting" id="client" tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Title</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Slug</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Category</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Brand</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Model</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Rate</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Sell Rate</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">VAT %</th>
                                                                <th class="sorting" id="client"  tabindex="0" aria-controls="product-table_wrapper" rowspan="1" colspan="1" aria-label="Donor's Name: activate to sort column ascending">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach($products_selected as $cat)
                                                                <tr role="row" class="odd">
                                                                    <td data-editable="false"><input style="position: relative;left: 0;opacity: 1;" type="checkbox" /></td>
                                                                    <td data-editable="false" tabindex="0" class="sorting_1"><img
                                                                            src="{{ $cat->photo ? asset('assets/images/'.$cat->photo):'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSCM_FnlKpZr_N7Pej8GA40qv63zVgNc0MFfejo35drsuxLUcYG'}}"
                                                                            alt="Category's Photo" style="max-height: 100px;">
                                                                    </td>
                                                                    <td data-editable="false">{{$cat->title}}</td>
                                                                    <td data-editable="false">{{$cat->slug}}</td>
                                                                    <td data-editable="false">{{$cat->category}}</td>
                                                                    <td data-editable="false">{{$cat->brand}}</td>
                                                                    <td data-editable="false">{{$cat->model}}</td>
                                                                    <td>{{$cat->rate}}</td>
                                                                    <td>{{$cat->sell_rate}}</td>
                                                                    <td data-editable="false">{{$cat->vat_percentage}}</td>
                                                                    <td data-editable="false">
                                                                        <a href="{{route('product-edit',$cat->id)}}"
                                                                           class="btn btn-primary product-btn"><i
                                                                                class="fa fa-edit"></i> Edit</a>
                                                                        <a href="{{route('product-delete',$cat->id)}}"
                                                                           class="btn btn-danger product-btn"><i
                                                                                class="fa fa-trash"></i> Remove</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>
                                        </div>

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

    <style>

        .navbar
        {
            position: relative;
        }

        #photo
        {
            width: 250px !important;
        }

        #client
        {
            width: 170px !important;
        }

        a[aria-expanded="false"]::before, a[aria-expanded="true"]::before
        {
            display: none;
        }

        .btn
        {
            display: flex;
            align-items: center;
        }

        .fa
        {
            top: 0 !important;
            margin-right: 5px;
            font-size: 13px !important;
        }

        .table.products > tbody > tr > td
        {
            text-align: center;
        }

        table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting
        {
            padding-right: 0;
            padding-left: 0;
            text-align: center;
        }

        table tr>th
        {
            border-top: 1px solid #e1e1e1 !important;
            border-bottom: 1px solid #e1e1e1 !important;
        }

        .dtr-details .dtr-data .btn
        {
            margin: 5px;
        }

        .no-sort::after { display: none!important; }

        .no-sort { pointer-events: none!important; cursor: default!important; }

    </style>

@endsection

@section('scripts')

    <script type="text/javascript">

        var table = $('#example1').DataTable(
            {
                columnDefs: [ { "orderable": false, "targets": [0] } ]
            }
        );

        $('.mainTable').editableTableWidget();

        /*$('.mainTable').on('validate', function(evt, newValue) {
            table.ajax.reload();
            $('#example1').load(document.URL + ' #example1');
        });*/

        $('.mainTable').on('change', function(evt, newValue) {
            table.rows().invalidate();
        });

    </script>

@endsection
