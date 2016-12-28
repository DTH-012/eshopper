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
                        <h2 class="title text-center">Tìm kiếm thông tin cụ thể</h2>
                            <form action="search-adv">
                                <div class="search_box col-sm-3">
                                    <input type="text" name= "proc" placeholder="Tên sản phẩm"/>
                                </div>
                                <div class="search_box col-sm-3">
                                    <input type="text" name= "cat" placeholder="Tên mặt hàng"/>
                                </div>
                                <div class="search_box col-sm-3">
                                    <input type="text" name= "brand" placeholder="Tên nhà sản xuất"/>
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-default" value="Tìm kiếm" />
                                </div>
                            </form>
                    </div><!--features_items-->
                </div>
            </div>
            @include('Menu.PriceRange')
        </div>
    </section>
</div>
@endsection
