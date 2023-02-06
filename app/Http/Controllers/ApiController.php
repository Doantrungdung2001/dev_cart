<?php

namespace App\Http\Controllers;
use App\Models\ItemCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function MaxCategoryCart(){
        $category_product = ItemCart::groupBy('id_category')->get();
       
        $arr = ['status' => true,
            'message'=>"Sản phẩm đã lưu thành công",
            'data'=> $category_product
        ];
        return response()->json($arr, 201);
    }

    public function product_cart(){
        $id_user = 2;
        $product = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->get();
        $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('total_price');
        
        $arr = ['status' => true,
            'message'=>"Lấy Sản phẩm giỏ hàng thành công",
            'id_user'=>$id_user,
            'totalQuanty'=>$totalQuanty,
            'totalPrice'=>$totalPrice,
            'data'=> $product
        ];
        return response()->json($arr, 201);
    }

    public function total_product_cart(){
        $id_user = 2;
        $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
    
        $arr = ['status' => true,
            'message'=>"Tổng số lương trong giỏ hàng",
            'id_user'=>$id_user,
            'totalQuanty'=>$totalQuanty
        ];
        return response()->json($arr, 201);
    }
}
