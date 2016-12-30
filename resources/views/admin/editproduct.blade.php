@extends('admin.layouts.adminmainsame')
@section('title', 'Sửa sản phẩm')
@section('headername', 'Sửa sản phẩm')
@section('breadcrumbname', 'Sửa sản phẩm')
@section('content')
							@include('errors.error')
							<form action="" method="POST"  enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
								@foreach($products as $product)
									<div class="col-sm-12">
										Mã sản phẩm đang sửa:{!! old('txtProcID',isset($product) ? $product->idProducts : null) !!}
									</div>
									<div class="form-group">
										<input class="form-control" type="text" name= "txtProcName" placeholder="Tên sản phẩm"  value="{!! old('txtProcName',isset($product) ? $product->NamePd : null) !!}"/>
									</div>
									<div class="form-group">
										<input class="form-control" type="number" min="1" name= "txtProcPrice" placeholder="Giá sản phẩm"  value="{!! old('txtProcPrice',isset($product) ? $product->Price : null) !!}"/>
									</div>
									<div class="form-group">
										<input class="form-control" type="number" min="1" name= "txtProcQuantity" placeholder="Số lượng"  value="{!! old('txtProcQuantity',isset($product) ? $product->Quantity : null) !!}"/>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" name= "txtProcDes" placeholder="Mô tả chi tiết"  value="{!! old('txtProcDes',isset($product) ? $product->DesFull : null) !!}"/>
									</div>
									<div class="form-group">
										<input class="form-control" type="file" id="file" name="fileimg" onchange="CopyMe(this, 'txtProcThumbnail');"/>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" id="txtProcThumbnail" name= "txtProcThumbnail" placeholder="Hình ảnh" value="{!! old('txtProcThumbnail',isset($product) ? $product->Thumbnail : null) !!}"/>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" name= "txtProcPost-er" placeholder="Nhân viên đăng"/>
									</div>
								@endforeach
								<div class="form-group">
									<select class="form-control" name="cboProcCat" required>
										@foreach($theods as $procds)
										@endforeach
										<option value="{{$procds->Category}}"selected hidden>{{$procds->Name}}</option>
										@foreach($cats as $cat)
											<option value="{{$cat->idCategory}}">{{$cat->Name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="cboProcBrand" required>
										@foreach($theods as $procds)
										@endforeach
										<option value="{{$procds->Brand}}"selected hidden>{{$procds->BRANDName}}</option>
										@foreach($brands as $brand)
											<option value="{{$brand->idBRANDS}}">{{$brand->BRANDName}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-sm-12">
									<input type="submit" class="btn btn-primary" value="Xác nhận" />
								</div>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
							</form>
@endsection
