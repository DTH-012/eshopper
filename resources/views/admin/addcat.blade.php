@extends('admin.layouts.adminmainsame')
@section('title', 'Thêm loại sản phẩm')
@section('headername', 'Thêm loại sản phẩm')
@section('breadcrumbname', 'Thêm loại sản phẩm')
@section('content')
    @include('errors.error')
    <form action="{!! route('getaddcat') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
        <div class="form-group">
            <input class="form-control" type="number" min="1" name= "txtCatID" placeholder="Mã loại "/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name= "txtCatName" placeholder="Tên loại sản phẩm"/>
        </div>
        <div class="col-sm-12">
            <input type="submit" class="btn btn-primary" value="Thêm" />
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

