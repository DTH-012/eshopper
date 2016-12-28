@extends('layouts.mainsame')
@section('title', 'Product detais | E-Shopper')
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

                            <div class="shipping text-center"><!--shipping-->
                                <img src="images/home/shipping.jpg" alt="" />
                            </div><!--/shipping-->

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Sản phẩm hiện có</h2>
                            @include('Product.CatsProducts')
                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection