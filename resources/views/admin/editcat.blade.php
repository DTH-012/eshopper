@extends('admin.layouts.adminmainsame')
@section('title', 'Sửa sản phẩm')
@section('headername', 'Sửa sản phẩm')
@section('breadcrumbname', 'Sửa sản phẩm')
@section('content')
    @include('errors.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
        @foreach($cats as $cat)
            <div class="col-sm-12">
                Mã loại sản phẩm đang sửa:{!! old('txtCatID',isset($cat) ? $cat->idCategory : null) !!}
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name= "txtCatName" placeholder="Tên loại sản phẩm"  value="{!! old('txtProcName',isset($cat) ? $cat->Name : null) !!}"/>
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
