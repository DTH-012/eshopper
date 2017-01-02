

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($itemsactive as $recommended_item)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{$recommended_item->Thumbnail}}" alt="" />
                                <h2>{{$recommended_item->Price}}$</h2>
                                <p>{{$recommended_item->NamePd}}</p>
                            </div>
                            <div class="product-overlay" ;>
                                <div class="overlay-content" ;>
                                    <h2>{{$recommended_item->Price}}$</h2>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    <a href="product-details-{{$recommended_item->idProducts}}" class="btn btn-default add-to-cart">Thông tin chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="item">
                @foreach($items as $recommended_item)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{$recommended_item->Thumbnail}}" alt="" />
                                <h2>{{$recommended_item->Price}}$</h2>
                                <p>{{$recommended_item->NamePd}}</p>
                            </div>
                            <div class="product-overlay" ;>
                                <div class="overlay-content" ;>
                                    <h2>{{$recommended_item->Price}}$</h2>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    <a href="product-details-{{$recommended_item->idProducts}}" class="btn btn-default add-to-cart">Thông tin chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>