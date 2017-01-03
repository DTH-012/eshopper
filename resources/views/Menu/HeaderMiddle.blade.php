<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="index"><img src="images/home/logo.png" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">

                        @if (Auth::guest())
                            <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="col-sm-12">
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li class="col-sm-12">
                                        <a href="edit-account-{{Auth::user()->id}}">
                                        Edit
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                        @if (Auth::guest())
                            <li><a href="login"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->