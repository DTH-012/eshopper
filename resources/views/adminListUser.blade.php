@extends('layouts.mainsame')
@section('title', 'Shop | E-Shopper')
@section('admin')
    @include('Menu.AdminMenu')
@endsection
@section('content')
    <div id="body">

        <section>
            <div class="container">
                <div class="row">
                    @if(Session::has('flash_mesage'))
                        <div  class="alert alert-success">
                            {!! Session::get('flash_mesage') !!}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead >
                        <tr align="center">
                            <th>Mã tài khoản</th>
                            <th>Họ tên tài khoản</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="odd gradeX" align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->level}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Xóa user này ?')" href="{!! URL::route('getDeleteUser',$user->id) !!}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('getEditUser',$user->id) !!}">Sửa</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection