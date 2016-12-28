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
                            <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email"  required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu"  required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                             <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span>
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                    </div>
							    </span>
                                <div>
                                    <button type="submit" class=" btn-primary">Login</button>
                                </div>
                                <br>
                                <div>
                                    <a  href="{{ url('/password/reset') }}">Forgot Your Password? </a>
                                </div>
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





