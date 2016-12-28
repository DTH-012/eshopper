<div class="left-sidebar">
    <h2>Mặt hàng</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach ($cats as $cat)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="category-list-{{$cat->idCategory}}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{$cat->Name}}
                    </a>
                </h4>
            </div>
        </div>
        @endforeach
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Nhãn hiệu</h2>
        <div class="brands-name">
            @foreach ($brands as $brand)
            <ul class="nav nav-pills nav-stacked">

                <li><a href="brand-list-{{$brand->idBRANDS}}"> <span class="pull-right"></span>{{$brand->BRANDName}}</a></li>

            </ul>
            @endforeach
        </div>
    </div><!--/brands_products-->

    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
            <input type="number" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
    </div><!--/shipping-->

</div>