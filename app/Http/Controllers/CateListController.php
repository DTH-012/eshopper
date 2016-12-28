<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CateListController extends Controller
{
    public function catlist($idLoai)
    {
        $cat = DB::select('select * from category');
        $brand = DB::select("SELECT * FROM eshop.brands;");
        $productname = DB::select("SELECT * FROM eshop.products;");
        $product = DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->where ('products.Category', '=', $idLoai)
            ->paginate(9);
        $exists = $product->first();
        if($exists == null){
            return view('404');
        }
        return view('category-list', ['cats' => $cat, 'products' => $product,'productnames' => $productname,'brands'=>$brand]);
    }
    public function category()
    {
        $cat = DB::select('select * from category');
        return view('category', ['cats' => $cat]);
    }
}
