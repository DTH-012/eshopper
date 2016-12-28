@extends('layouts.mainsame')
@section('title', 'Login | E-Shopper')
@section('content')
    <div id="body">
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập vào tài khoản của bạn</h2>
                    @include('errors.error')
                    <form action="#" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                        <input type="email" name="txtEmail" placeholder="Email" />
                        <input type="password" name="txtPassword" placeholder="Mật khẩu" />
                        <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Tạo tài khoản mới!</h2>
                    <form action="register" >
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                        <button type="submit" class="btn btn-default">Đăng ký tài khoản mới</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
    </section> <!--/#cart_items-->
    </div>
@endsection