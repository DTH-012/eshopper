@extends('layouts.mainsame')
@section('title', 'Shop | E-Shopper')
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
                                <th>Mã sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Mô tả sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Nhà sản xuất</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr class="odd gradeX" align="center">
                                <td>{{$product->idProducts}}</td>
                                <td>{{$product->Price}}</td>
                                <td>{{$product->Quantity}}</td>
                                <td>{{$product->DesFull}}</td>
                                <td>{{$product->NamePd}}</td>
                                <td>{{$product->Name}}</td>
                                <td>{{$product->BRANDName}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Xóa sản phẩm này ?')" href="{!! URL::route('getDelete',$product->idProducts) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('getEdit',$product->idProducts) !!}">Edit</a></td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection