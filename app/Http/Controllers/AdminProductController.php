<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcRequest;
use Illuminate\Http\Request;
use DB;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function getList()
    {
        $product = DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->join ('brands','products.Brand','brands.idBRANDS')
            ->orderby('idProducts','ASC')
            ->get();
        return view('adminlistproduct',['products'=>$product]);
    }
    public function getAdd()
    {
        $cat = DB::select('select * from category');
        $brand = DB::select("SELECT * FROM eshop.brands;");
        return view('addproduct', ['cats' => $cat, 'brands'=>$brand]);
    }
    public function postAdd(ProcRequest $request)
    {
        $filename=$request->file('fileimg')->getClientOriginalName();
        $request->file('fileimg')->move('img/',$filename);
        $idProducts=$request->txtProcID;
        $NamePd=$request->txtProcName;
        $Price=$request->txtProcPrice;
        $Quantity=$request->txtProcQuantity;
        $DesFull=$request->txtProcDes;
        $Thumbnail=$request->txtProcThumbnail;
        $NguoiDang=Null;
        $Cat=$request->cboProcCat;
        $Brand=$request->cboProcBrand;
        DB::table('products')->insert([
            'idProducts' => $idProducts,'NamePd' => $NamePd, 'Price' => $Price, 'Quantity' => $Quantity, 'DesFull' =>$DesFull, 'Thumbnail' => $Thumbnail, 'NguoiDang' => $NguoiDang, 'Category' => $Cat, 'Brand' => $Brand
        ]);
        DB::table('image')->insert([
            'Link'=>$Thumbnail,'Product'=>$idProducts
        ]);
        return redirect()->route('getList')->with(['flash_mesage'=>'Thêm thành công']);
    }
    public function getDelete($idproduct)
    {
        DB::table('products')
            ->where('products.idProducts', '=', $idproduct)
            ->delete();
        return redirect()->route('getList')->with(['flash_mesage'=>'Xóa thành công']);
    }
    public function getEdit($id)
    {
        $idproduct= DB::table('products')
            ->where('products.idProducts', '=', $id)
            ->get();
        $cat = DB::select('select * from category');
        $brand = DB::select("SELECT * FROM eshop.brands;");
        $product = DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->join ('brands','products.Brand','brands.idBRANDS')
            ->where('products.idProducts', '=', $id)
            ->get();
        return view('admineditproduct', ['cats' => $cat, 'brands'=>$brand,'products'=>$idproduct,'theods'=>$product]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            ["txtProcName" => "required"],
            ["txtProcName.required" => "Vui lòng nhập tên sàn phẩm"]
        );
        $this->validate($request,
            ["fileimg"=>"required"],
            ["fileimg.required" => "Vui lòng chọn hình ảnh"]
        );
        $filename=$request->file('fileimg')->getClientOriginalName();
        $request->file('fileimg')->move('img/',$filename);
        $NamePd=$request->txtProcName;
        $Price=$request->txtProcPrice;
        $Quantity=$request->txtProcQuantity;
        $DesFull=$request->txtProcDes;
        $Thumbnail=$request->txtProcThumbnail;
        $NguoiDang=Null;
        $Cat=$request->cboProcCat;
        $Brand=$request->cboProcBrand;
        DB::table('products')
            ->where('idProducts', $id)
            ->update([
                'NamePd' => $NamePd, 'Price' => $Price, 'Quantity' => $Quantity, 'DesFull' =>$DesFull, 'Thumbnail' => $Thumbnail, 'NguoiDang' => $NguoiDang, 'Category' => $Cat, 'Brand' => $Brand
            ]);

        DB::table('image')->insert([
            'Link'=>$Thumbnail,'Product'=>$id
        ]);
        return redirect()->route('getList')->with(['flash_mesage'=>'Sửa thành công']);
    }
    public function admin()
    {
        return view('admin');
    }
}
