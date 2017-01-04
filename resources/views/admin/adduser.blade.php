@extends('admin.layouts.adminmainsame')
@section('title', 'Thêm user')
@section('headername', 'Thêm user')
@section('breadcrumbname', 'Thêm user')
@section('content')
    @include('errors.error')
    <form action="{!! route('getAddUser') !!}" method="POST">
        <div class="col-sm-12">
            <br>
        </div>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
            <div class="form-group col-sm-10">
                <input class="form-control" type="text" name= "txtname" placeholder="Họ tên user"  value="{!! old('txtname')!!}"/>
            </div>
            <div class="form-group col-sm-10">
                <input class="form-control" type="email" min="0" max="1" name= "txtEmail" placeholder="Email"  value="{!! old('txtEmail') !!}"/>
            </div>
            <div class="form-group col-sm-10">
                <input class="form-control" type="number" min="0" max="1" name= "txtLevel" placeholder="Level" required value="{!! old('txtUserLevel') !!} "/>
            </div>
            <div class="form-group col-sm-10">
                <input class="form-control" type="password"name= "txtPassword" placeholder="Password"  value="{!! old('txtPassword') !!}"/>
            </div>
            <div class="form-group col-sm-10">
                <input class="form-control" type="password"name= "txtRePassword" placeholder="Re-Password"  value="{!! old('txtRePassword') !!}"/>
            </div>
        <div class="col-sm-12">
            <input type="submit" class="btn btn-primary" value="Xác nhận" />
        </div>
    </form>
@endsection