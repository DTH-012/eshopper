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
    public function index1(Request $request)
    {
        return view('search-advanced');
    }

    public function index(Request $request)
    {
        $q=$request->input('q');
        $product= DB::table('products')
            ->where ('NamePD', 'like', '%'.$q.'%')
            ->get();;
        //SELECT * FROM eshop.products where NamePd like '%quan%';

        //DB::connection('operator')->table('users')->where('email', 'LIKE', '%test%')->get();
        return view('search',['products' => $product]);
    }
}