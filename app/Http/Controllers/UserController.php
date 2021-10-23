<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use App\Models\ShopItem;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('user.restaurant_menu',compact('shopMenus','shop','user'));
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
}
