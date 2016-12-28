@extends('layouts.mainsame')
@section('title', 'Login | E-Shopper')
@section('content')
    <div id="body">
        <section id="form"><!--form-->
            <div class="container">
                    <div class="col-sm-8">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Tạo tài khoản mới!</h2>
                            @include('errors.error')
                            <form action="" method="post">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                                <input type="text" name="txtname" placeholder="Họ tên" value="{!! old('txtname') !!}"/>
                                <input type="email" name="txtEmail" placeholder="Email" value="{!! old('txtEmail') !!}"/>
                                <input type="password" name="txtPassword" placeholder="Mật khẩu"/>
                                <input type="password" name="txtRePassword" placeholder="Xác nhận mật khẩu"/>
                                <button type="submit" class="btn btn-default">Đăng ký</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
            </div>
        </section> <!--/#cart_items-->
    </div>
@endsection