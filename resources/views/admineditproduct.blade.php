@extends('layouts.mainsame')
@section('title', 'Home | E-Shopper')
@section('admin')
    @include('Menu.AdminMenu')
@endsection
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
                            <h2 class="title text-center">Sửa sản phẩm</h2>
                            @include('errors.error')
                            <form action="" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                @foreach($products as $product)
                                 <div class="col-sm-12">
                                     Mã sản phẩm đang sửa:{!! old('txtProcID',isset($product) ? $product->idProducts : null) !!}
                                 </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="text" name= "txtProcName" placeholder="Tên sản phẩm"  value="{!! old('txtProcName',isset($product) ? $product->NamePd : null) !!}"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="number" min="1" name= "txtProcPrice" placeholder="Giá sản phẩm"  value="{!! old('txtProcPrice',isset($product) ? $product->Price : null) !!}"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="number" min="1" name= "txtProcQuantity" placeholder="Số lượng"  value="{!! old('txtProcQuantity',isset($product) ? $product->Quantity : null) !!}"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="text" name= "txtProcDes" placeholder="Mô tả chi tiết"  value="{!! old('txtProcDes',isset($product) ? $product->DesFull : null) !!}"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                    <div class="col-sm-12">
                                        <input type="file" id="file" name="fileimg" onchange="CopyMe(this, 'txtProcThumbnail');"/>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input_box">
                                            <input type="text" id="txtProcThumbnail" name= "txtProcThumbnail" placeholder="Hình ảnh" value="{!! old('txtProcThumbnail',isset($product) ? $product->Thumbnail : null) !!}"/>
                                        </div>
                                    </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="text" name= "txtProcPost-er" placeholder="Nhân viên đăng"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                @endforeach
                                <div class="col-sm-12">
                                    <select name="cboProcCat" required>
                                        @foreach($theods as $procds)
                                        @endforeach
                                        <option value="{{$procds->Category}}"selected hidden>{{$procds->Name}}</option>
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->idCategory}}">{{$cat->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <select name="cboProcBrand" required>
                                        @foreach($theods as $procds)
                                        @endforeach
                                        <option value="{{$procds->Brand}}"selected hidden>{{$procds->BRANDName}}</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->idBRANDS}}">{{$brand->BRANDName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-default" value="Xác nhận" />
                                </div>
                            </form>
                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
