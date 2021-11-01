<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\Shop;
use App\Models\ShopItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role',2)->get();
        $categories = Category::all();
        return view('user.layouts.home',compact('users','categories'));
    }

    public function restaurantMenu($id){
        $user = User::find($id);
        $shop = Shop::where('user_id',$id)->get();
        $shopMenus = ShopItem::where('shop_id',$shop[0]->id)->get();
        if (\auth()->check()){
            $authUserId = Auth::user()->id;
            $favourite = Favourite::where(['user_id'=>$authUserId,'favourite_shop_id'=>$id])->get();
        }else{
            return redirect()->route('login');
        }
        return view('user.restaurant_menu',compact('shopMenus','shop','user','favourite'));
    }

    public function profile(){
        return view('user.profile');
    }

    public function address($id){
        $user = User::find($id);
        return view('user.profile_address',compact('user'));
    }

    public function addressEdit($id){
        $user = User::find($id);
        return view('user.profile_address_edit',compact('user'));
    }

    public function addressUpdate(Request $request){
        $user = User::find($request->user_id);
        $user->address = $request->address;
        $user->update();
        Alert::success('Success', 'Your Address is successfully updated');
        return view('user.profile_address',compact('user'));
    }

    public function profileEdit($id){
        $user = User::find($id);
        return view('user.profile_edit',compact('user'));
    }

    public function profileUpdate(Request $request){

        $request->validate([
            "name" => "required|string|max:256",
            "email" => "required|string|min:3|max:256",
            "phone" => "required|string|min:7|max:16",
        ]);

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->profile_image){
            $request->validate([
                "profile_image"=>"mimes:jpg,jpeg,png"
            ]);
            $photo = $request->file('profile_image');
            $dir = "shop-profile/";
            $profileName = uniqid()."shop.".$request->file('profile_image')->getClientOriginalExtension();
            File::delete(public_path($dir.$user->profile_image));
            $photo->move($dir,$profileName);

            $user->profile_image = $profileName;
        }
        if($request->new_password != null){
            $request->validate([
                "new_password" => "min:7|max:16"
            ]);
            $user->password = Hash::make($request->new_password);
        }

        $user->update();
        Alert::success('Success', 'Your profile is successfully updated');
        return redirect()->route('user-profile');
    }

    public function orderList($id){
        $orders = Cart::where('customer_id',$id)->orderBy('id','desc')->get();
        return view('user.profile_order_list',compact('orders'));
    }

    public function orderDetail($id){
        $order = Cart::where('id',$id)->get();
        return view('user.profile_order_detail',compact('order'));
    }

    public function categorySearch($id){
        $shop = Shop::with(['category','user'])->get()->where('shop_category',$id);
        return view('user.all_restaurant',compact('shop'));
    }

    public function allRestaurant(){
        $shop = Shop::all();
        return view('user.all_restaurant',compact('shop'));
    }

    public function addToFavourite($id){
        $authUser = Auth::user()->id;
        if (!Favourite::where(['user_id'=>$authUser,'favourite_shop_id'=>$id])->exists()){
            $favourite = new Favourite();
            $favourite->user_id = Auth::user()->id;
            $favourite->favourite_shop_id = $id;
            $favourite->save();
            toast('Added to favourite','success');
            return redirect()->back();
        }else{
            toast('Already added to favourite','warning');
            return redirect()->back();
        }
    }

    public function removeFromFavourite($id){
        $authUser = Auth::user()->id;
        if (Favourite::where(['user_id'=>$authUser,'favourite_shop_id'=>$id])->exists()){
            $favourite = Favourite::where(['user_id'=>$authUser,'favourite_shop_id'=>$id])->get();
            $toDelete = Favourite::find($favourite[0]->id);
            $toDelete->delete();
            toast('Removed from favourite','warning');
            return redirect()->back();
        }else{
            toast('This is not included in your favourite list','warning');
            return redirect()->back();
        }
    }

    public function favouriteShops(){
        $authUser = Auth::user()->id;
        $favouriteShops = Favourite::where('user_id',$authUser)->get();
        return view('user.favourite_shops',compact('favouriteShops'));
    }
}
