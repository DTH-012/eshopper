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
class ProductsComposer
{
    public function product(View $view){
        $product = DB::table('products')
            ->paginate(9);
        $view->with(['products' => $product]);
    }
}