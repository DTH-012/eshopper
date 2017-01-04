<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CateListController extends Controller
{
    public function catlist($idLoai)
    {
        $product = DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->where ('products.Category', '=', $idLoai)
            ->paginate(9);
        $exists = $product->first();
        if($exists == null){
            return view('404');
        }
        return view('category-list',['products' => $product]);
    }
    public function category()
    {
        $cat = DB::select('select * from category');
        return view('category', ['cats' => $cat]);
    }
}
