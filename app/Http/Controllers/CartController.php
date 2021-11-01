<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Shop;
use App\Models\ShopItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($id){
        $item = ShopItem::find($id);
        return view('user.add_to_cart',compact('item'));
    }

    public function addItemToCart(Request $request){

        $id  = $request->menu_id;
        $item = ShopItem::find($id);
        $shop = Shop::where('id',$item->shop_id)->get();
        $shop_id = $shop[0]->id;
       if (!$item){
           abort(404);
       }
       $cart = Session::get('cart');
       if (!$cart){

           $cart = [
               $id => [
                   "name"=>$item->name,
                   "quantity"=>$request->quantity,
                   "price"=>$item->price,
                   "image"=>$item->item_image,
                   "item_id"=>$item->id,
                   "user_id"=>Auth::user()->id,
                   "shop_id"=>$shop_id,
               ]
           ];

           session()->put('cart',$cart);
           toast('Added to cart','success');
           return redirect()->back();
       }

       if (isset($cart[$id])){
           $cart[$id]['quantity'] = $request->quantity;
           session()->put('cart',$cart);
           toast('Added to cart','success');
           return redirect()->back();
       }

        $cart[$id] =  [
            "name"=>$item->name,
            "quantity"=>$request->quantity,
            "price"=>$item->price,
            "image"=>$item->item_image,
            "item_id"=>$item->id,
            "user_id"=>Auth::user()->id,
            "shop_id"=>$shop_id,
        ];

        session()->put('cart',$cart);
        toast('Added to cart','success');
        return redirect()->back();
    }

    public function orderConfirm(){
        $cart = session()->get('cart');
        if ($cart == null)
            $cart =[];

        return view('user.order_confirm')->with('cart',$cart);
    }

    public function orderDelete($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return redirect()->back();
    }

    public function checkOutPage(){
        $cart = session()->get('cart');
        if ($cart == null)
            $cart =[];

        return view('user.check_out')->with('cart',$cart);

    }

    public function checkOut(){
        $cart = session()->get('cart');

        foreach ($cart as $key=>$item) {
            $cart = new Cart();
            $cart->item_id = $item['item_id'];
            $cart->item_name = $item['name'];
            $cart->customer_id = $item['user_id'];
            $cart->item_price = $item['price'];
            $cart->item_image = $item['image'];
            $cart->quantity = $item['quantity'];
            $cart->shop_id = $item['shop_id'];

            $cart->save();
            $cart = session()->get('cart');
            if(isset($cart[$key])) {
                unset($cart[$key]);
                session()->put('cart',$cart);
            }
        }

        return redirect()->route('order_success');

    }

    public function orderSuccess(){
        return view('user.order_success');
    }


}
