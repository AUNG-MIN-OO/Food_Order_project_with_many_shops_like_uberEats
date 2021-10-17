<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterShop;
use App\Models\Category;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminController extends Controller
{

    public function redirect(){
        if (Auth::user()->role == 1){
            return redirect()->route('admin-home');
        }elseif( Auth::user()->role == 2){
            $user = Auth::user();
            $shop = Shop::where('user_id',$user->id)->first();
            return redirect()->route('shop.index',$shop->id);
        }else{
            return redirect()->route('home');
        }
    }

    public function showRegister(){
        $category = Category::all();
        return view('admin.register',compact('category'));
    }

    public function addShop(RegisterShop $request){

        DB::beginTransaction();
        try {
            $photo = $request->file('profile_image');
            $dir = "shop-profile/";
            $profileName = uniqid()."shop.".$request->file('profile_image')->getClientOriginalExtension();
            $photo->move($dir,$profileName);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->profile_image = $profileName;
            $user->role = 2;
            $user->save();

            Shop::firstOrCreate(
                [
                    'user_id'=>$user->id
                ]);

            DB::commit();

            return redirect()->route('admin-home');
        }catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors(['fails'=>'Something wrong.'.$e->getMessage()])->withInput();
        }

    }

    public function index(){
        return view('admin.home');
    }

    public function editProfile($id){
        $user = User::findOrFail($id);
        return view('admin.shop.edit',compact('user'));
    }

    public function updateProfile(Request $request,$id){
        $request->validate([
            "name" => "required|string|max:256",
            "email" => "required|string|min:3|max:256",
            "phone" => "required|string|min:7|max:16",
            "address" => "required|min:7",
        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

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
        }elseif($request->new_password != null){
            $request->validate([
                "new_password" => "min:7|max:16"
            ]);
            $user->password = Hash::make($request->new_password);
        }

        $user->update();
        return redirect()->route('shop.index')->with("toast","Profile info is updated");
    }
}
