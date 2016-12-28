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
                            <h2 class="title text-center">Thêm sản phẩm</h2>
                                @include('errors.error')
                            <form action="{!! route('getaddproduct') !!}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="number" min="1" name= "txtProcID" placeholder="Mã sản phẩm"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="text" name= "txtProcName" placeholder="Tên sản phẩm"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="number" min="1" name= "txtProcPrice" placeholder="Giá sản phẩm"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="number" min="1" name= "txtProcQuantity" placeholder="Số lượng"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_box">
                                        <input type="text" name= "txtProcDes" placeholder="Mô tả chi tiết"/>
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
                                        <input type="text" id="txtProcThumbnail" name= "txtProcThumbnail" placeholder="Hình ảnh"/>
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
                                <div class="col-sm-12">
                                    <select name="cboProcCat" required>
                                        <option value="" disabled selected hidden>Loại sản phẩm</option>
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
                                        <option value="" disabled selected hidden>Nhà sản xuất</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->idBRANDS}}">{{$brand->BRANDName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-default" value="Thêm" />
                                </div>
                            </form>
                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
