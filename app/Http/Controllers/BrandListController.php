<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BrandListController extends Controller
{
    public function brandlist($idBrand)
    {
        $cat = DB::select('select * from category');
        $brand = DB::select("SELECT * FROM eshop.brands;");
        $productname = DB::select("SELECT * FROM eshop.products;");
        $product = DB::table('products')
            ->join ('brands','products.Brand','brands.idBRANDS')
            ->where ('Brand', '=', $idBrand)
            ->paginate(9);
        $exists = $product->first();
        if($exists == null){
            return view('404');
        }
        return view('brand-list', ['cats' => $cat, 'products' => $product,'productnames' => $productname,'brands'=>$brand]);
    }
}
