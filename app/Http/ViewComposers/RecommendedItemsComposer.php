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
class RecommendedItemsComposer
{
    public function product(View $view){
        $recommended_item_active=DB::table('products')
            ->inRandomOrder()
            ->limit (3)
            ->get();
        $recommended_item=DB::table('products')
            ->inRandomOrder()
            ->limit (3)
            ->get();
        $view->with(['itemsactive' => $recommended_item_active,'items'=>$recommended_item]);
    }
}