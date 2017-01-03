@extends('layouts.mainsame')
@section('title', 'Shop | E-Shopper')
@section('content')
    <div id="body">
        <section id="advertisement">
            <div class="container">
                <img src="images/shop/advertisement.jpg" alt="" />
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            @include('Menu.CatsBrands')


                        </div>
                    </div>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Sản phẩm hiện có</h2>
                            @include('Product.Products')
                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection