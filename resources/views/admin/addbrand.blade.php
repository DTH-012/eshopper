@extends('admin.layouts.adminmainsame')
@section('title', 'Thêm nhà sản xuất')
@section('headername', 'Thêm nhà sản xuất')
@section('breadcrumbname', 'Thêm nhà sản xuất')
@section('content')
    @include('errors.error')
    <form action="{!! route('getaddbrand') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
        <div class="form-group">
            <input class="form-control" type="number" min="1" name= "txtBrandID" placeholder="Mã nhà sx "/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name= "txtBrandName" placeholder="Tên nhà sx"/>
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

