<div class="recommended_items"><!--recommended_items-->
    @foreach($products as $cat)
    @endforeach
    <h2 class="title text-center">{{$cat->Name}}</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$product->Thumbnail}}" alt="" />
                                    <h2>{{$product->Price}}</h2>
                                    <p>{{$product->NamePd}}</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>+ Giỏ Hàng</button>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{$product->Price}}</h2>
                                        <p>{{$product->NamePd}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        <a href="product-details-{{$product->idProducts}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thông tin chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div><!--/recommended_items-->
<div class="col-sm-12">
    <ul class="pagination">
        @if($products->currentPage() !=1)
            <li><a href="{!! $products->url($products->currentPage()-1) !!}"><<</a> </li>
        @endif
        @for($i = 1; $i <= $products->lastPage(); $i = $i+1)
            <li class="{!! ($products->currentPage() == $i) ? "active" : "" !!}"><a href="{!! $products->url($i) !!}">{!! $i !!}</a> </li>
        @endfor
        @if($products->currentPage() != $products->lastPage())
            <li><a href="{!! $products->url($products->currentPage()+1) !!}">>></a> </li>
        @endif
    </ul>
</div>