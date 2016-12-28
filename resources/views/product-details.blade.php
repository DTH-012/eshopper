@extends('layouts.mainsame')
@section('title', 'Product detais | E-Shopper')
@section('content')
    <div id="body">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        @include('Menu.CatsBrands')
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                @foreach($products as $product)
                                <div class="view-product">
                                    <img id="mainImage" src="{{$product->Thumbnail}}" alt="" />
                                </div>
                                @endforeach
                                <div id="similar-product" class="carousel slide" data-ride="carousel">

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active" onclick="changeImageOnClick(event)">
                                            @foreach($Images as $img)
                                                <a href="#"><img src="{{$img->Link}}" alt="" width="85" height="84"></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-7">
                                @foreach($products as $product)
                                <div class="product-information"><!--/product-information-->
                                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                    <h2>{{$product->NamePd}}</h2>
                                    <p>Web ID: 1089772</p>
                                    <img src="images/product-details/rating.png" alt="" />
                                    <span>
									<span>{{$product->Price}}</span>
									<label>{{$product->Quantity}}:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										+ Giỏ Hàng
									</button>
								    </span>
                                    <p><b>Availability:</b> In Stock</p>
                                    <p><b>Condition:</b> New</p>
                                    <p><b>Brand:</b> E-SHOPPER</p>
                                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                                </div><!--/product-information-->
                                @endforeach
                            </div>

                        </div><!--/product-details-->

                        <div>
                            @include('errors.error')
                        </div>
                        <div class="category-tab shop-details-tab"><!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li><a href="#comments" data-toggle="tab">Phản hồi (5)</a></li>
                                    <li class="active"><a href="#reviews" data-toggle="tab">Gửi phản hồi</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="comments" >
                                    @foreach($comments as $comment)
                                    <div class="col-sm-1">
                                        <div class="thumbnail">
                                            <img class="img-responsive user-photo" src="img/avatar_2x.png">
                                        </div><!-- /thumbnail -->
                                    </div><!-- /col-sm-1 -->

                                    <div class="col-sm-11">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong>{{$comment->Name}}</strong> <span class="text-muted">{{$comment->Time}}</span>
                                            </div>
                                            <div class="panel-body">
                                                    <div class="col-sm-12">
                                                        <p>{{$comment->Comment}}</p>
                                                    </div>
                                            </div><!-- /panel-body -->
                                        </div><!-- /panel panel-default -->
                                    </div><!-- /col-sm-5 -->
                                    @endforeach
                                    <div class="col-sm-12">
                                        <ul class="pagination">
                                            @if($comments->currentPage() !=1)
                                                <li><a href="{!! $comments->url($comments->currentPage()-1) !!}"><<</a> </li>
                                            @endif
                                            @for($i = 1; $i <= $comments->lastPage(); $i = $i+1)
                                                <li class="{!! ($comments->currentPage() == $i) ? "active" : "" !!}"><a href="{!! $comments->url($i) !!}">{!! $i !!}</a> </li>
                                            @endfor
                                            @if($comments->currentPage() != $comments->lastPage())
                                                <li><a href="{!! $comments->url($comments->currentPage()+1) !!}">>></a> </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade active in" id="reviews" >
                                    <div class="col-sm-12">
                                        <ul>
                                            @if (Auth::guest())
                                                <li><a href="login"><i class="fa fa-user"></i>Tài khoản</a></li>
                                            @else
                                                    <a href="#">
                                                        {{ Auth::user()->name}}
                                                    </a>
                                            @endif
                                            <li><p ><i class="fa fa-clock-o" id="timehms"></i></p></li>
                                            <li><p><i class="fa fa-calendar-o" id="timedmy"></i></p></li>
                                                <script>
                                                    var d2 = new Date();
                                                    d2=" "+d2.getHours() + ":" + (d2.getMinutes() + 1)+"     ";
                                                    document.getElementById("timehms").innerHTML = d2;

                                                    var d = new Date();
                                                    d=" "+d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear() ;
                                                    document.getElementById("timedmy").innerHTML = d;
                                                </script>
                                        </ul>
                                        <p>
                                        <p><div  class="alert alert-success">
                                            aaaaaaaaaaaaaa
                                        </div><b></b></p>

                                        <p><b>Đánh giá của bạn</b></p>

                                        <form action="#" method="post">
										<span>
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
											<input type="text" name="txtname" placeholder="Họ tên"/>
											<input type="email" name="txtemail" placeholder="Email"/>
										</span>
                                            <textarea name="txtcontent" placeholder="Phản hồi của bạn"></textarea>
                                            <button type="submit" class="btn btn-default pull-right">
                                                Gửi
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div><!--/category-tab-->

                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Sản phẩm gợi ý</h2>

                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                                    @foreach($products_related as $key=>$product_related)
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{$product_related->Thumbnail}}" alt="" />
                                                        <h2>{{$product_related->Price}}</h2>
                                                        <p>{{$product_related->NamePd}}</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>+ Giỏ Hàng</button>
                                                    </div>
													 <div class="product-overlay" ;>
														<div class="overlay-content">
															<h2>{{$product_related->Price}}</h2>
															<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
															<a href="product-details-{{$product_related->idProducts}}" class="btn btn-default add-to-cart">Thông tin chi tiết</a>
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

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<script type="text/javascript">
    function changeImageOnClick(event)
    {
        event = event || window.event;
        var targetElement = event.target || event.srcElement;

        if (targetElement.tagName == "IMG")
        {
            mainImage.src = targetElement.getAttribute("src");
        }
    }
</script>