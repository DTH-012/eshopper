@extends('admin.layouts.adminmainsame')
@section('title', 'Sửa nhà sản xuất')
@section('headername', 'Sửa nhà sản xuất')
@section('breadcrumbname', 'Sửa nhà sản xuất')
@section('content')
    @include('errors.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
        @foreach($brands as $brand)
            <div class="col-sm-12">
                Mã nhà sản xuất đang sửa:{!! old('txtBrandID',isset($brand) ? $brand->idBRANDS : null) !!}
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name= "txtBrandName" placeholder="Tên nhà sản xuất"  value="{!! old('txtBrandName',isset($brand) ? $brand->BRANDName : null) !!}"/>
            </div>
        @endforeach
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
