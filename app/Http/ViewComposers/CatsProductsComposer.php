<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;

use Illuminate\Http\Request;
use DB;
/**
 * Created by PhpStorm.
 * User: Dat
 * Date: 12/13/2016
 * Time: 1:28 PM
 */
class CatsBrandsComposer
{
    public function cat(View $view){
        $cat = DB::select("SELECT * FROM eshop.category;");
        $brand = DB::select("SELECT * FROM eshop.brands;");
        $view->with(['cats' => $cat,'brands'=>$brand]);
    }
    public function catlist($idLoai)
    {
        $cat = DB::select('select * from category');
        $brand = DB::select("SELECT * FROM eshop.brands;");
        $productname = DB::select("SELECT * FROM eshop.products;");
        $product = DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->get();
        return view('category-list', ['cats' => $cat, 'products' => $product,'productnames' => $productname,'brands'=>$brand]);
    }
    public function category()
    {
        $cat = DB::select('select * from category');
        return view('category', ['cats' => $cat]);
    }
}