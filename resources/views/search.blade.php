@extends('layouts.mainsame')
@section('title', 'Home | E-Shopper')
@section('content')
    <div id="body">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        @include('Menu.CatsBrands')
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Sản phẩm hiện có</h2>
                            @include('Search.Result')
                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
