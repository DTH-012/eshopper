<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentRequest;
use Carbon\Carbon;
use Auth;

use Illuminate\Http\Request;
use DB;

class ProductDetailsController extends Controller
{
    public function procDetails($idProducts)
    {
        $cat = DB::select('select * from category');
        $brand = DB::select("SELECT * FROM eshop.brands;");
        $productname = DB::select("SELECT * FROM eshop.products;");
        $img = DB::select("SELECT * FROM eshop.image Where Product=$idProducts limit 3;");
        $product = DB::table('products')
            ->where ('idProducts', $idProducts)
            ->get();
        $comment = DB::table('comment')
            ->where ('ID_Product', $idProducts)
            ->orderby('Time','DESC')
            ->paginate(2);
        $product_related = DB::select("select * from eshop.products where Category in (Select Category From eshop.products Where idProducts=5) and idProducts!=$idProducts ORDER BY RAND() limit 3;");
        return view('product-details', ['products' => $product,'cats' => $cat, 'productnames' => $productname,'brands'=>$brand,'Images'=>$img,'products_related'=>$product_related,'comments'=>$comment]);
    }

    //Comment
    public function postComment(CommentRequest $request,$idProducts)
    {
        $name=$request->txtname;
        $email=$request->txtemail;
        $content=$request->txtcontent;
        $time=Carbon::now();
        $time->setTimezone('Asia/Phnom_Penh');
        DB::table('comment')->insert([
            'Name' => $name, 'Email' => $email,'ID_Product' => $idProducts,  'Comment' =>$content,'Time'=>$time
        ]);
        return redirect()->route('viewDetail',$idProducts)->with(['flash_mesage'=>'Đã gửi phản hồi']);
    }

}
