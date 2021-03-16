@extends('layouts.front')

@section('content')

    <main class="container container1">

        <!-- Left Column / Headphones Image -->
        <div class="left-column">

            @if($product->photo)

                <img src="{{asset('assets/images/'.$product->photo)}}" class="active">

            @elseif(file_exists('assets/images/'.$product->article_code.'.jpeg'))

                <img src="{{asset('assets/images/'.$product->article_code.'.jpeg')}}" class="active">

            @else

                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSCM_FnlKpZr_N7Pej8GA40qv63zVgNc0MFfejo35drsuxLUcYG" class="active">

            @endif

        </div>


        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span id="top-heading">{{$product->article_code}}</span>
                <h1>{{$product->title}}</h1>

                <?php $description = preg_replace(array('#<[^>]+>#','#&nbsp;#'), ' ', $product->description); ?>

                <p>{{$description}}</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

            <?php if($product->color){ $colors = explode(',',$product->color); }else{ $colors = []; } ?>

                @if($colors)

                    <!-- Product Color -->
                        <div class="product-color">
                            <span>Colors</span>

                            <div class="color-choose">

                                @foreach($colors as $color)

                                    <div>
                                        <input data-image="{{$color}}" type="radio" id="{{$color}}" name="color" value="{{$color}}" checked>
                                        <label for="{{$color}}"><span></span></label>
                                    </div>

                                @endforeach

                            </div>

                        </div>

                @endif

                <!-- Cable Configuration -->
                <div class="product-description">
                    <span>Category</span>

                    <p style="padding: 5px;color: black;">{{$product->cat_name}}</p>

                </div>

                <div class="product-description">
                    <span>Brand</span>

                    <p style="padding: 5px;color: black;">{{$product->brand_name}}</p>

                </div>

                <div class="product-description">
                    <span>Model</span>

                    <p style="padding: 5px;color: black;">{{$product->model_name}}</p>

                </div>

                @if($product->model_number)

                    <div class="product-description">
                        <span>Model Number</span>

                        <p style="padding: 5px;color: black;">{{$product->model_number}}</p>

                    </div>

                @endif


                @if($product->size)

                    <div class="product-description">
                        <span>Sizes</span>

                        <p style="padding: 5px;color: black;">{{$product->size}}</p>

                    </div>

                @endif


                @if($product->measure)

                    <div class="product-description">
                        <span>Measure</span>

                        <p style="padding: 5px;color: black;">{{$product->measure}}</p>

                    </div>

                @endif


                @if($product->floor_type)

                    <div class="product-description">
                        <span>Floor Type</span>

                        <p style="padding: 5px;color: black;">{{$product->floor_type}}</p>

                    </div>

                @endif


                @if($product->floor_type2)

                    <div class="product-description">
                        <span>Floor Type 2</span>

                        <p style="padding: 5px;color: black;">{{$product->floor_type2}}</p>

                    </div>

                @endif


                @if($product->supplier)

                    <div class="product-description">
                        <span>Supplier</span>

                        <p style="padding: 5px;color: black;">{{$product->supplier}}</p>

                    </div>

                @endif


                @if($product->additional_info)

                    <div class="product-description">
                        <span>Additional Info</span>

                        <p style="padding: 5px;color: black;">{{$product->additional_info}}</p>

                    </div>

                @endif

            </div>

            @if($product->estimated_price)

                <!-- Product Pricing -->
                    <div class="product-price">
                        <span>Estimated Price: € {{$product->estimated_price}}</span>
                    </div>

            @endif

        </div>
    </main>

    <style>

        .container1 {
            max-width: 100%;
            width: 90%;
            margin: 0 auto;
            padding: 15px;
            display: flex;
        }

        /* Columns */
        .left-column {
            width: 45%;
            position: relative;
            text-align: center;
        }

        .right-column {
            width: 55%;
            margin-top: 60px;
        }

        /* Left Column */
        .left-column img {
            width: 90%;
            opacity: 0;
            transition: all 0.3s ease;
            height: 450px;
            box-shadow: 2px 2px 8px 0 rgb(0 0 0 / 20%);
        }

        .left-column img.active {
            opacity: 1;
        }

        /* Product Description */
        .product-description {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
        }
        .product-description #top-heading {
            font-size: 12px;
            color: #358ED7;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
        }
        .product-description h1 {
            font-weight: 300;
            font-size: 32px;
            color: #43484D;
            letter-spacing: -2px;
        }
        .product-description p {
            font-size: 16px;
            font-weight: 300;
            color: #86939E;
            line-height: 24px;
        }

        /* Product Color */
        .product-color {
            margin-bottom: 30px;
        }

        .color-choose div {
            display: inline-block;
        }

        .color-choose input[type="radio"] {
            display: none;
        }

        .color-choose input[type="radio"] + label span {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
        }

        .color-choose input[type="radio"] + label span {
            border: 2px solid #FFFFFF;
            box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
        }

        .color-choose input[type="radio"]#red + label span {
            background-color: #C91524;
        }
        .color-choose input[type="radio"]#Red + label span {
            background-color: #C91524;
        }
        .color-choose input[type="radio"]#blue + label span {
            background-color: #314780;
        }
        .color-choose input[type="radio"]#Blue + label span {
            background-color: #314780;
        }
        .color-choose input[type="radio"]#black + label span {
            background-color: #323232;
        }
        .color-choose input[type="radio"]#Black + label span {
            background-color: #323232;
        }
        .color-choose input[type="radio"]#yellow + label span {
            background-color: #eded1d;
        }
        .color-choose input[type="radio"]#Yellow + label span {
            background-color: #eded1d;
        }
        .color-choose input[type="radio"]#green + label span {
            background-color: #0fdb0f;
        }
        .color-choose input[type="radio"]#Green + label span {
            background-color: #0fdb0f;
        }
        .color-choose input[type="radio"]#white + label span {
            background-color: white;
        }
        .color-choose input[type="radio"]#White + label span {
            background-color: white;
        }
        .color-choose input[type="radio"]#brown + label span {
            background-color: brown;
        }
        .color-choose input[type="radio"]#Brown + label span {
            background-color: brown;
        }
        .color-choose input[type="radio"]#gray + label span {
            background-color: gray;
        }
        .color-choose input[type="radio"]#Gray + label span {
            background-color: gray;
        }

        .color-choose input[type="radio"]:checked + label span {
            /*background-image: url(https://designmodo.com/demo/product-page/images/check-icn.svg);*/
            background-repeat: no-repeat;
            background-position: center;
        }

        /* Cable Configuration */
        .cable-choose {
            margin-bottom: 20px;
        }

        .cable-choose button {
            border: 2px solid #E1E8EE;
            border-radius: 6px;
            padding: 13px 20px;
            font-size: 14px;
            color: #5E6977;
            background-color: #fff;
            cursor: pointer;
            transition: all .5s;
        }

        .cable-choose button:hover,
        .cable-choose button:active,
        .cable-choose button:focus {
            border: 2px solid #86939E;
            outline: none;
        }

        .cable-config {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
        }

        .cable-config a {
            color: #358ED7;
            text-decoration: none;
            font-size: 12px;
            position: relative;
            margin: 10px 0;
            display: inline-block;
        }
        .cable-config a:before {
            content: "?";
            height: 15px;
            width: 15px;
            border-radius: 50%;
            border: 2px solid rgba(53, 142, 215, 0.5);
            display: inline-block;
            text-align: center;
            line-height: 16px;
            opacity: 0.5;
            margin-right: 5px;
        }

        /* Product Price */
        .product-price {
            display: flex;
            align-items: center;
        }

        .product-price span {
            font-size: 22px;
            font-weight: 300;
            color: #43474D;
            margin-right: 20px;
        }

        .cart-btn {
            display: inline-block;
            background-color: #7DC855;
            border-radius: 6px;
            font-size: 16px;
            color: #FFFFFF;
            text-decoration: none;
            padding: 12px 30px;
            transition: all .5s;
        }
        .cart-btn:hover {
            background-color: #64af3d;
        }

        /* Responsive */
        @media (max-width: 940px) {
            .container1 {
                flex-direction: column;
                margin-top: 60px;
            }

            .left-column,
            .right-column {
                width: 100%;
                min-height: auto;
            }

            .left-column img {
                width: 300px;
                right: 0;
                top: -65px;
                left: initial;
                height: auto;
            }
        }

        @media (max-width: 535px) {
            .left-column img {
                width: 70%;
                top: -85px;
            }
        }
    </style>



@endsection
