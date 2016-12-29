<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        @if (Auth::guest())
                            @include('Menu.mainMenu')
                        @elseif (Auth::user()->level==1)
                            @include('Menu.mainMenu')
                            @include('Menu.AdminMenu')
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <form action="search">
                        <input type="text" name= "q" placeholder="Tên sản phẩm"/>
                    </form>
                </div>
            </div>
            <div class="col-sm-2">
                <form action="search-advanced">
                    <input type="submit" class="btn btn-default" value="Nâng cao" />
                </form>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->