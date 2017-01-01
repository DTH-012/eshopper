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
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                                <div class="search_box col-sm-4">
                                    <input type="text" name= "proc" placeholder="Tên sản phẩm"/>
                                </div>
                                <div class="search_box col-sm-4">
                                    <input type="text" name= "cat" placeholder="Tên mặt hàng"/>
                                </div>
                                <div class="search_box col-sm-4">
                                    <input type="text" name= "brand" placeholder="Tên nhà sản xuất"/>
                                </div>
                                <br>
                                <br>
                                 <div class="search_box col-sm-4">
                                        <input type="number" name= "pricemin" placeholder="Giá từ" min="0" max="10000"/>
                                 </div >
                                 <div class="search_box col-sm-4">
                                    <input type="number" name= "pricemax" placeholder="Đến" min="0" max="10000"/>
                                 </div>
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-default col-sm-7" value="Tìm kiếm" />
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
