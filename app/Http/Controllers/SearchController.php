<?php
/**
 * Created by PhpStorm.
 * User: Dat
 * Date: 11/30/2016
 * Time: 10:33 AM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q=$request->input('q');
        $product= DB::table('products')
            ->where ('NamePD', 'like', '%'.$q.'%')
            ->paginate(9);
        return view('search',['products' => $product]);
    }
    public function advanced(Request $request)
    {
        return view('search-advanced');
    }
    public function advresult(Request $request)
    {
        $proc=$request->input('proc');
        $cat=$request->input('cat');
        $brand=$request->input('brand');
        $product= DB::table('products')
            ->join ('category','products.Category','category.idCategory')
            ->join ('brands','products.Brand','brands.idBRANDS')
            ->where ([['NamePD', 'like', '%'.$proc.'%'],['category.Name', 'like', '%'.$cat.'%'],['brands.BRANDName', 'like', '%'.$brand.'%']])
            ->paginate(9);
        return view('search',['products' => $product]);
    }
}