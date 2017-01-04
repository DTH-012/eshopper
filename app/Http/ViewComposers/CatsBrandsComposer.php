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
        $cat = DB::select('SELECT * FROM category ;');
        $brand = DB::select('SELECT * FROM brands;');
        $view->with(['cats' => $cat,'brands'=>$brand]);
    }
}