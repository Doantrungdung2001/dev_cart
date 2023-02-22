<?php

namespace App\Http\Controllers;

use App\Models\ItemCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class CartsController extends Controller
{
    public function Index(){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        // $res = Http::get('https://p01-product-api-production-e005.up.railway.app/api/user/products');
        return view('home',['product'=> $res['data']]);
        // $product = DB::table('product')->get();
       
        // return view('home',compact('product'));
    
    }
    public function SameProduct(){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        // $res = Http::get('https://p01-product-api-production-e005.up.railway.app/api/user/products');
        return view('same-product',['product'=> $res['data']]);
    
    }
    public function BuyAgain(){
        $res = Http::get('http://103.179.173.95:81/api/listOrderByUser/2');
        // return $res[0]["products"]; 
        return view('buy-again',['product'=> $res[0]["products"]]);
    }

    public function AddCart(Request $req){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        // $res = Http::get('https://p01-product-api-production-e005.up.railway.app/api/user/products');
        if($req->user_id != NULL){
            $id_user = $req->user_id;
        }else{
            $id_user = 64;
        }
        if($req->product_id != NULL){
            $id= $req->product_id; 
        }else{
            $id = 1;
        }
        if($req->quantity != NULL){
            $quantity= $req->quantity; 
        }else{
            $quantity = 1;
        }
        $cart_item = new ItemCart();
        foreach($res['data'] as $prd){
            if($prd['sub_products'] != null){
                foreach($prd['sub_products'] as $item){
                    if($item['id'] == $id){
                        if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->exists()) {
                            $now_quanty = ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->first();
                            if ($item['quantity'] >= $quantity) {
                                $i = $now_quanty->quanty + $quantity;
                                $sale_price = $prd['sale_price'] * $i;
                                ItemCart::where('id_user',$id_user)
                                ->where('id_product',$id)
                                ->update(['quanty'=>$i]);
                                ItemCart::where('id_user',$id_user)
                                ->where('id_product',$id)
                                ->update(['total_price'=>$sale_price]);
                                $arr = ['message'=>"Success"];
                            }
                            else {
                                $arr = ['message'=>"Error"];
                            }
                        }else{
                            if (($item['quantity'] != null) && ($item['quantity'] >= $quantity)) {
                                $cart_item->id_user = $id_user;
                                $cart_item->id_product = $item['id'];
                                $cart_item->id_category = $prd['category_id'];
                                $cart_item->name = $prd['name'];
                                $cart_item->quanty = $quantity;
                                $cart_item->size = $item['size'];
                                $cart_item->color = $item['color'];
                                $cart_item->price = $prd['sale_price'];
                                $cart_item->total_price = $prd['sale_price'];
                                $cart_item->image_url = $item['image_url'];
                                $cart_item->status = 1;
                                $cart_item->save();

                                $arr = ['message'=>"Success"];
                            }
                            else {
                                $arr = ['message'=>"Error"];
                            }
                            
                        }
                    }
                }
            }
        }
        return response()->json($arr,200);
    }
    
    public function AddCart1(Request $req){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        // $res = Http::get('https://p01-product-api-production-e005.up.railway.app/api/user/products');
        if($req->user_id != NULL){
            $id_user = $req->user_id;
        }else{
            $id_user = 64;
        }
        if($req->product_id != NULL){
            $id= $req->product_id; 
        }else{
            $id = 1;
        }
        if($req->quantity != NULL){
            $quantity= $req->quantity; 
        }else{
            $quantity = 1;
        }
        $cart_item = new ItemCart();
        foreach($res['data'] as $prd){
            if($prd['sub_products'] != null){
                foreach($prd['sub_products'] as $item){
                    if($item['id'] == $id){
                        if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->exists()) {
                            $now_quanty = ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->first();
                            if ($item['quantity'] >= $quantity) {
                                $i = $now_quanty->quanty + $quantity;
                                $sale_price = $prd['sale_price'] * $i;
                                ItemCart::where('id_user',$id_user)
                                ->where('id_product',$id)
                                ->update(['quanty'=>$i]);
                                ItemCart::where('id_user',$id_user)
                                ->where('id_product',$id)
                                ->update(['total_price'=>$sale_price]);
                                $arr = ['message'=>"Success"];
                            }
                            else {
                                $arr = ['message'=>"Error"];
                            }
                        }else{
                            if (($item['quantity'] != null) && ($item['quantity'] >= $quantity)) {
                                $cart_item->id_user = $id_user;
                                $cart_item->id_product = $item['id'];
                                $cart_item->id_category = $prd['category_id'];
                                $cart_item->name = $prd['name'];
                                $cart_item->quanty = $quantity;
                                $cart_item->size = $item['size'];
                                $cart_item->color = $item['color'];
                                $cart_item->price = $prd['sale_price'];
                                $cart_item->total_price = $prd['sale_price'];
                                $cart_item->image_url = $item['image_url'];
                                $cart_item->status = 1;
                                $cart_item->save();

                                $arr = ['message'=>"Success"];
                            }
                            else {
                                $arr = ['message'=>"Error"];
                            }
                            
                        }
                    }
                }
            }
        }
        return response()->json($arr,200);
    }

    public function AddToCart(Request $req,$id){
        $res = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
        // $res = Http::get('https://p01-product-api-production-e005.up.railway.app/api/user/products');
        if($req->user_id != NULL){
            $id_user = $req->user_id;
        }else{
            $id_user = 64;
        }

        $cart_item = new ItemCart();
        foreach($res['data'] as $prd){
            if($prd['sub_products'] != null){
                foreach($prd['sub_products'] as $item){
                    if($item['id'] == $id){
                        if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->exists()) {
                            $now_quanty = ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->first();
                            if ($item['quantity'] >= $now_quanty->quanty + 1) {
                                $i = $now_quanty->quanty + 1;
                                $sale_price = $prd['sale_price'] * $i;
                                ItemCart::where('id_user',$id_user)
                                ->where('id_product',$id)
                                ->update(['quanty'=>$i]);
                                ItemCart::where('id_user',$id_user)
                                ->where('id_product',$id)
                                ->update(['total_price'=>$sale_price]);
                                $arr = ['message'=>"Success"];
                            }
                            else {
                                $arr = ['message'=>"Error"];
                            }
                        }else{
                            if (($item['quantity'] != null) && ($item['quantity'] >= 1)) {
                                $cart_item->id_user = $id_user;
                                $cart_item->id_product = $item['id'];
                                $cart_item->id_category = $prd['category_id'];
                                $cart_item->name = $prd['name'];
                                $cart_item->quanty = 1;
                                $cart_item->size = $item['size'];
                                $cart_item->color = $item['color'];
                                $cart_item->price = $prd['sale_price'];
                                $cart_item->total_price = $prd['sale_price'];
                                $cart_item->image_url = $item['image_url'];
                                $cart_item->status = 1;
                                $cart_item->save();

                                $arr = ['message'=>"Success"];
                            }
                            else {
                                $arr = ['message'=>"Error"];
                            }
                            
                        }
                    }
                }
            }
        }
        return response()->json($arr,200);
    }

    public function ViewToCart(Request $req){
        if($req->user_id != NULL){
            $id_user = $req->user_id;
        }else{
            $id_user = 64;
        }
        $cart = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->get();

        $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('total_price');
        return view('cart',compact('cart','totalQuanty','totalPrice'));
    }

    public function DeleteItemListToCart(Request $req,$id){
        if($req->user_id != NULL){
            $id_user = $req->user_id;
        }else{
            $id_user = 64;
        }
       if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->exists()){
        ItemCart::where('id_product',$id)
        ->update(['status'=>0]);
       }
       $cart = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->get();
       $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
       $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('total_price');
       $message = "Delete success";
       return view('list-cart',compact('cart','totalQuanty','totalPrice', 'message'));
    }

    public function SaveItemListToCart(Request $req,$id,$quanty){
        if($req->user_id != NULL){
            $id_user = $req->user_id;
        }else{
            $id_user = 64;
        }
        if(ItemCart::where('id_user',$id_user)->where('id_product',$id)->exists()){
            $products = Http::get('https://p01-product-api-production.up.railway.app/api/user/products');
            // $products = Http::get('https://p01-product-api-production-e005.up.railway.app/api/user/products');
            foreach($products['data'] as $prd){
                if($prd['sub_products'] != null){
                    foreach($prd['sub_products'] as $item){
                        if($item['id'] == $id){
                            if ($item['quantity'] >= $quanty) {
                                ItemCart::where('id_user',$id_user)->where('id_product',$id)
                                ->update(['quanty'=>$quanty]);
                                $now_quanty = ItemCart::where('id_user',$id_user)->where('id_product',$id)->where('status',1)->first();
                                $i = $now_quanty->quanty;
                                $sale_price = $now_quanty->price * $i;
                                ItemCart::where('id_user',$id_user)->where('id_product',$id)
                                ->update(['total_price'=>$sale_price]);
                                $message = "Update success";
                            }
                            else {
                                $message = "Update error";
                            }
                        }
                    }
                }
            }
        }
        $cart = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->get();
        $totalQuanty = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('quanty');
        $totalPrice = DB::table('item_carts')->where('id_user',$id_user)->where('status',1)->sum('total_price');
        return view('list-cart',compact('cart','totalQuanty','totalPrice', 'message'));
    }
    public function Dashboard() {
		$labels = ['Số sản phẩm được thanh toán', 'Số sản phẩm bị xóa'];
        $dataset = [];
        $data1 = DB::table('item_carts')->where('status', 2)->sum('quanty');
        $data2 = DB::table('item_carts')->where('status', 0)->sum('quanty');
        array_push($dataset, $data1);
        array_push($dataset, $data2);
        $list1 = DB::table('item_carts')
        ->select('id_product', 'name', 'size', 'color', 'image_url', 'price', DB::raw('SUM(quanty) as totalProduct'))
        ->where('status',2)
        ->groupBy('id_product', 'name', 'size', 'color', 'image_url', 'price')
        ->orderBy('totalProduct', 'desc')
        ->limit(5)
        ->get();

        $list2 = DB::table('item_carts')
        ->select('id_product', 'name', 'size', 'color', 'image_url', 'price', DB::raw('SUM(quanty) as totalProduct'))
        ->where('status', 0)
        ->groupBy('id_product', 'name', 'size', 'color', 'image_url', 'price')
        ->orderBy('totalProduct', 'desc')
        ->limit(5)
        ->get();
        // dd($total);
        return view('dashboard', compact('labels', 'dataset','list1', 'list2'));
    }

}

















