@extends('admin.layouts.adminmainsame')
@section('title', 'Danh sách nhà sản xuất')
@section('headername', 'Danh sách nhà sản xuất')
@section('breadcrumbname', 'Danh sách nhà sản xuất')
@section('content')
    @if(Session::has('flash_mesage'))
        <div  class="alert alert-success">
            {!! Session::get('flash_mesage') !!}
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead >
        <tr align="center">
            <th>Mã nhà sx</th>
            <th>Tên nhà sx</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr class="odd gradeX" align="center">
                <td>{{$brand->idBRANDS}}</td>
                <td>{{$brand->BRANDName}}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Xóa nhà sản xuất này ?')" href="{!! URL::route('getDeleteBrand',$brand->idBRANDS) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('getEditBrand',$brand->idBRANDS) !!}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
