@foreach($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{$product->Thumbnail}}" alt="" />
                    <h2>{{$product->Price}}$</h2>
                    <p>{{$product->NamePd}}</p>
                </div>
                <div class="product-overlay" ;>
                    <div class="overlay-content" ;>
                        <h2>{{$product->Price}}$</h2>
                        <p>{{$product->NamePd}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        <a href="product-details-{{$product->idProducts}}" class="btn btn-default add-to-cart">Thông tin chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="col-sm-12">
    <ul class="pagination">
        {!! $products->render() !!}
    </ul>
</div>