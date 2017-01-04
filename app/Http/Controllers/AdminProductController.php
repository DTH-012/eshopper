<?php
namespace App\Http\Controllers;
use App\Http\Requests\ProcRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;
use App\Http\Requests\BrandRequest;
use DB;
class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    //Product
    public function getList()
    {
        $product = DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->join ('brands','products.Brand','brands.idBRANDS')
            ->orderby('idProducts','ASC')
            ->get();
        return view('admin.listproduct',['products'=>$product]);
    }
    public function getAdd()
    {
        $cat = DB::select('select * from category');
        $brand = DB::select("SELECT * FROM brands;");
        return view('admin.addproduct', ['cats' => $cat, 'brands'=>$brand]);
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
            'idProducts' => $idProducts,'NamePd' => $NamePd, 'Price' => $Price, 'Quantity' => $Quantity, 'DesFull' =>$DesFull, 'Thumbnail' => $Thumbnail, 'Category' => $Cat, 'Brand' => $Brand
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
        $brand = DB::select("SELECT * FROM brands;");
        $product = DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->join ('brands','products.Brand','brands.idBRANDS')
            ->where('products.idProducts', '=', $id)
            ->get();
        return view('admin.editproduct', ['cats' => $cat, 'brands'=>$brand,'products'=>$idproduct,'theods'=>$product]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            ["txtProcName" => "required"],
            ["txtProcName.required" => "Vui lòng nhập tên sàn phẩm"]
        );
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
                'NamePd' => $NamePd, 'Price' => $Price, 'Quantity' => $Quantity, 'DesFull' =>$DesFull, 'Thumbnail' => $Thumbnail, 'Category' => $Cat, 'Brand' => $Brand
            ]);
        $img=DB::table('image')
            ->where ('Link','=',$Thumbnail)
            ->where ('Product','=',$id)
            ->get();
        $exist=$img->first();
        if($exist== null) {
            $filename=$request->file('fileimg')->getClientOriginalName();
            $request->file('fileimg')->move('img/',$filename);
            DB::table('image')->insert([
                'Link' => $Thumbnail, 'Product' => $id
            ]);
        }
        return redirect()->route('getList')->with(['flash_mesage'=>'Sửa thành công']);
    }
    public function admin()
    {
        return view('admin.index');
    }
    //Category
    public function getListCat()
    {
        $cat = DB::table('category')
            ->get();
        return view('admin.listcat',['cats'=>$cat]);
    }
    public function getAddCat()
    {
        return view('admin.addcat');
    }
    public function postAddCat(CatRequest $request){
        $idCat=$request->txtCatID;
        $nameCat=$request->txtCatName;
        DB::table('category')->insert([
            'idCategory' => $idCat,'Name' => $nameCat
        ]);
        return redirect()->route('getListCat')->with(['flash_mesage'=>'Thêm thành công']);
    }
    public function getDeleteCat($idcat)
    {
        $proc=DB::table('products')
            ->where('products.Category','=',$idcat)
            ->get();
        $exists = $proc->first();
        if($exists != null){
            return redirect()->route('getListCat')->with(['flash_mesage'=>'Không được xóa loại sản phẩm đang có sản phẩm']);
        }
        else {
            DB::table('category')
                ->where('category.idCategory', '=', $idcat)
                ->delete();
            return redirect()->route('getListCat')->with(['flash_mesage' => 'Xóa thành công']);
        }
    }
    public function getEditCat($id)
    { $cat = DB::table('category')
        ->where('idCategory','=',$id)
        ->get();
        return view('admin.editcat', ['cats' => $cat]);
    }
    public function postEditCat(Request $request,$id){
        $this->validate($request,
            ["txtCatName" => "required"],
            ["txtCatName.required" => "Vui lòng nhập tên loại sàn phẩm"]
        );
        $name=$request->txtCatName;
        DB::table('category')
            ->where('category.idCategory', '=', $id)
            ->update([
                'Name' => $name
            ]);
        return redirect()->route('getListCat')->with(['flash_mesage'=>'Sửa thành công']);
    }
    //Brand
    public function getListBrand()
    {
        $brand = DB::table('brands')
            ->get();
        return view('admin.listbrand',['brands'=>$brand]);
    }
    public function getAddBrand()
    {
        return view('admin.addbrand');
    }
    public function postAddBrand(BrandRequest $request){
        $idBrand=$request->txtBrandID;
        $nameBrand=$request->txtBrandName;
        DB::table('brands')->insert([
            'idBRANDS' => $idBrand,'BRANDName' => $nameBrand
        ]);
        return redirect()->route('getListBrand')->with(['flash_mesage'=>'Thêm thành công']);
    }
    public function getDeleteBrand($idbrand)
    {
        $proc=DB::table('products')
            ->where('products.Brand','=',$idbrand)
            ->get();
        $exists = $proc->first();
        if($exists != null){
            return redirect()->route('getListBrand')->with(['flash_mesage'=>'Không được xóa nhà sx đang có sản phẩm']);
        }
        else {
            DB::table('brands')
                ->where('brands.idBRANDS', '=', $idbrand)
                ->delete();
            return redirect()->route('getListBrand')->with(['flash_mesage' => 'Xóa thành công']);
        }
    }
    public function getEditBrand($idbrand)
    {
        $brand = DB::table('brands')
            ->where('idBRANDS','=',$idbrand)
            ->get();
        return view('admin.editbrand', ['brands' => $brand]);
    }
    public function postEditBrand(Request $request,$idbrand){
        $this->validate($request,
            ["txtBrandName" => "required"],
            ["txtBrandName.required" => "Vui lòng nhập tên nhà sx"]
        );
        $name=$request->txtBrandName;
        DB::table('brands')
            ->where('brands.idBRANDS', '=', $idbrand)
            ->update([
                'BRANDName' => $name
            ]);
        return redirect()->route('getListBrand')->with(['flash_mesage'=>'Sửa thành công']);
    }
}