@extends('front.master')
@section('content')
@include('front.ourJs')
    <div class="greyBg">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><span class="dot">/</span> <a class="active">{{$cat}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if(count($products) !=0)
                    <h1 class="text-center">{{$cat}}</h1>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">

                               <select id="catID">
                                    <option value="">Select Category</option>
                                    @foreach(App\Category::all() as $category)
                                        <option class="option" value="{{$category->id}}">
                                            {{$category->cat_name}}
                                        </option>

                                    @endforeach
                               </select>

                            </div>

                        <div class="col-xs-6 col-sm-3">
                            <select id="priceID">
                                <option value="">Select Price Range</option>
                                <option value="0-200">0-200</option>
                                <option value="200-400">200-400</option>
                                <option value="400-600">400-600</option>
                                <option value="600-1000">600-1000</option>
                            </select>
                        </div>

                        <div class="col-sm-6 hidden-xs">
                            <div class="row">

                                <div class="col-sm-4 pull-right">
                                    <button class="btn btn-primary btn-fill" id="finID">Find</button>
                                </div>
                                <div class="styleNm">16 style(s)</div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row top25">
                    @if(count($products)=="0")
                        <div class="col-md-12" style="text-align: center">
                            <div class="itemBox">
                                <h3>sorry..this <b style="color: red">{{$cat}}</b> Not Fount in categories</h3>
                            </div>
                        </div>
                    @else
                        <div id="productData">
                        @foreach($products as $product)
                            <div class="col-xs-6 col-sm-4">
                                <div class="itemBox">
                                    <div class="prod"><img src="{{url('uploads/img_product')}}/{{$product->pro_image}}"
                                                           alt=""/></div>
                                    <label>{{$product->pro_name}}</label>
                                    <span class="hidden-xs">Code:{{$product->pro_code}}</span>
                                    <div class="addcart">
                                        <div class="price">{{$product->pro_price}} $</div>
                                        <div class="cartIco hidden-xs"><a href="/"><img
                                                        src="{{asset('/theme/images/cart.png')}}"/></a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection