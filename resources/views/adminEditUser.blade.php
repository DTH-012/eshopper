@extends('layouts.mainsame')
@section('title', 'Home | E-Shopper')
@section('admin')
    @include('Menu.AdminMenu')
@endsection
@section('content')
    <div id="body">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        @include('Menu.CatsBrands')
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Sửa thông tin user</h2>
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
                                    <div class="col-sm-12">
                                        <div class="input_box">
                                            <input type="text" name= "txtUserName" placeholder="Họ tên user"  value="{!! old('txtUserName',isset($user) ? $user->name : null) !!}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <br>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input_box">
                                            <input type="email" min="0" max="1" name= "txtUserEmail" placeholder="Email"  value="{!! old('txtUserEmail',isset($user) ? $user->email : null) !!}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <br>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input_box">
                                            <input type="number" min="0" max="1" name= "txtUserLevel" placeholder="Level"  value="{!! old('txtUserLevel',isset($user) ? $user->level : null) !!}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <br>
                                    </div>
                                @endforeach
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-default" value="Xác nhận" />
                                </div>
                            </form>
                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
