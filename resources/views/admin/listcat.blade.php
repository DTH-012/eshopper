@extends('admin.layouts.adminmainsame')
@section('title', 'Danh sách loại sản phẩm')
@section('headername', 'Danh sách loại sản phẩm')
@section('breadcrumbname', 'Danh sách loại sản phẩm')
@section('content')
    @if(Session::has('flash_mesage'))
        <div  class="alert alert-success">
            {!! Session::get('flash_mesage') !!}
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead >
        <tr align="center">
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr class="odd gradeX" align="center">
                <td>{{$cat->idCategory}}</td>
                <td>{{$cat->Name}}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Xóa loại sản phẩm này ?')" href="{!! URL::route('getDeleteCat',$cat->idCategory) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('getEditCat',$cat->idCategory) !!}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
