@extends('layouts.mainsame')
@section('title', 'Login | E-Shopper')
@section('content')
    <div id="body">
        <section id="form"><!--form-->
            <div class="container">
                <div class="col-sm-8">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Sửa thông tin tài khoản !</h2>
                        @if(Session::has('flash_mesage'))
                            <div  class="alert alert-success">
                                {!! Session::get('flash_mesage') !!}
                            </div>
                        @endif
                        @include('errors.error')
                        <form action="" method="post">
                            @foreach($info as $acc)
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                            <input type="text" name="txtname" placeholder="Họ tên" value="{!! old('txtname',isset($acc) ? $acc->name : null) !!}"/>
                            <input type="email" name="txtEmail" placeholder="Email" value="{!! old('txtEmail',isset($acc) ? $acc->email : null) !!}"/>
                            <input type="password" name="txtOldPassword" placeholder="Mật khẩu cũ"/>
                            <input type="password" name="txtPassword" placeholder="Mật khẩu mới"/>
                            <input type="password" name="txtRePassword" placeholder="Xác nhận mật khẩu"/>
                            <button type="submit" class="btn btn-default">Xác nhận</button>
                            @endforeach
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </section> <!--/#cart_items-->
    </div>
@endsection