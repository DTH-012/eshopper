@extends('admin.layouts.adminmainsame')
@section('title', 'Thêm sản phẩm')
@section('headername', 'Thêm sản phẩm')
@section('breadcrumbname', 'Thêm sản phẩm')
@section('content')
							@include('errors.error')
							<form action="{!! route('getaddproduct') !!}" method="POST" enctype="multipart/form-data">
							<div class="col-sm-8">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
								<div class="form-group">
									<input class="form-control" type="number" min="1" name= "txtProcID" placeholder="Mã sản phẩm"  value="{!! old('txtProcID')!!}"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name= "txtProcName" placeholder="Tên sản phẩm"  value="{!! old('txtProcName')!!}"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="number" min="1" name= "txtProcPrice" placeholder="Giá sản phẩm"  value="{!! old('txtProcPrice')!!}"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="number" min="1" name= "txtProcQuantity" placeholder="Số lượng"  value="{!! old('txtProcQuantity')!!}"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name= "txtProcDes" placeholder="Mô tả chi tiết"  value="{!! old('txtProcDes')!!}"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="file" id="file" name="fileimg" onchange="CopyMe(this,'txtProcThumbnail');"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" id="txtProcThumbnail" name= "txtProcThumbnail" placeholder="Hình ảnh"/>
								</div>
								<div class="form-group">
									<select class="form-control" name="cboProcCat" required>
										<option value="" disabled selected hidden>Loại sản phẩm</option>
										@foreach($cats as $cat)
											<option value="{{$cat->idCategory}}">{{$cat->Name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="cboProcBrand" required>
										<option value="" disabled selected hidden>Nhà sản xuất</option>
										@foreach($brands as $brand)
											<option value="{{$brand->idBRANDS}}">{{$brand->BRANDName}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-sm-12">
									<input type="submit" class="btn btn-primary" value="Thêm" />
								</div>
								<br><br><br><br><br>
								<br>
							</div>
							<div class="col-sm-4">
								<div class="form-group">Hỉnh ảnh bổ sung 1</div>
								<div class="form-group">
									<input class="form-control" type="file" id="file1" name="Bonusfileimg1" onchange="CopyMe(this,'BonusImg1');"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" id="BonusImg1" name= "txtBonusImg1" placeholder="Hình ảnh"/>
								</div>


								<div class="form-group">Hỉnh ảnh bổ sung 2</div>
								<div class="form-group">
									<input class="form-control" type="file" id="file2" name="Bonusfileimg2" onchange="CopyMe(this,'BonusImg2');"/>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" id="BonusImg2" name= "txtBonusImg2" placeholder="Hình ảnh"/>
								</div>
							</div>
							</form>
@endsection

