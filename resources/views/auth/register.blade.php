@extends('layouts.mainsame')
@section('title', 'Register | E-Shopper')
@section('content')
    <div id="body">
        <section id="form"><!--form-->
            <div class="container">
                <div class="col-sm-8">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Tạo tài khoản mới!</h2>
                        @include('errors.error')
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"  />
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Họ tên" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div >
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email"  required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div>
                                    <input id="password" type="password"name="password" placeholder="Mật khẩu" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <input id="password-confirm" type="password"name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </section> <!--/#cart_items-->
    </div>
@endsection










                    </form>
