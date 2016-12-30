@extends('admin.layouts.adminmainsame')
@section('title', 'Sửa thông tin user')
@section('headername', 'Sửa thông tin user')
@section('breadcrumbname', 'Sửa thông tin user')
@section('content')
							@include('errors.error')
							<form action="" method="POST">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
								<div class="col-sm-12">
									<br>
								</div>
								@foreach($users as $user)
									<div class="col-sm-12">
										Mã user đang sửa:{!! old('txtUserID',isset($user) ? $user->id : null) !!}
									</div>
									<div class="form-group col-sm-10">
										<input class="form-control" type="text" name= "txtUserName" placeholder="Họ tên user"  value="{!! old('txtUserName',isset($user) ? $user->name : null) !!}"/>
									</div>
									<div class="form-group col-sm-10">
										<input class="form-control" type="email" min="0" max="1" name= "txtUserEmail" placeholder="Email"  value="{!! old('txtUserEmail',isset($user) ? $user->email : null) !!}"/>
									</div>
									<div class="form-group col-sm-10">
										<input class="form-control" type="number" min="0" max="1" name= "txtUserLevel" placeholder="Level"  value="{!! old('txtUserLevel',isset($user) ? $user->level : null) !!}"/>
									</div>
								@endforeach
								<div class="col-sm-12">
									<input type="submit" class="btn btn-primary" value="Xác nhận" />
								</div>
							</form>
@endsection