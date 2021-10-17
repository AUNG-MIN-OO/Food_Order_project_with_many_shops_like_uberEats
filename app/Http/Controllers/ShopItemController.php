<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopItemRequest;
use App\Http\Requests\ShopItemUpdateRequest;
use App\Models\Shop;
use App\Models\ShopItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ShopItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $shop = Shop::where('user_id',$userId)->get();
        $shopItems = ShopItem::where('shop_id',$shop[0]->id)->get();
        return view('admin.shop.item.index',compact('shopItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $shop = Shop::where('user_id',$user->id)->get();
        return view('admin.shop.item.create',compact('user','shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopItemRequest $request)
    {
        $photo = $request->file('item_image');
        $dir = "shop-item/";
        $newName = uniqid()."shop_item.".$request->file('item_image')->getClientOriginalExtension();
        $photo->move($dir,$newName);

        $shopItem = new ShopItem();
        $shopItem->name = $request->name;
        $shopItem->price = $request->price;
        $shopItem->item_count = $request->item_count;
        $shopItem->shop_id = $request->shop_id;
        $shopItem->item_image = $newName;
        $shopItem->save();

        return redirect()->route('shopItem.index')->with('toast','Items is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopItem  $shopItem
     * @return \Illuminate\Http\Response
     */
    public function show(ShopItem $shopItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopItem  $shopItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopItem $shopItem)
    {
        return view('admin.shop.item.edit',compact('shopItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopItem  $shopItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopItem $shopItem)
    {
        $request->validate([
            "name" => "required|string|min:3|max:256",
            "price" => "required|integer|min:3",
            "item_count" => "required|integer|min:1|max:100",
        ]);
        $shopItem->name = $request->name;
        $shopItem->price = $request->price;
        $shopItem->item_count = $request->item_count;

        if ($request->file('item_image')){
            $request->validate([
                "item_image" => "required|mimes:jpg,jpeg,png"
            ]);
            $photo = $request->file('item_image');
            $dir = "shop-item/";
            $newName = uniqid()."shop_item.".$request->file('item_image')->getClientOriginalExtension();
            File::delete(public_path($dir.$shopItem->item_image));
            $photo->move($dir,$newName);

            $shopItem->item_image = $newName;
        }

        $shopItem->update();
        return redirect()->route('shopItem.index')->with("toast","Shop Item is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopItem  $shopItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopItem $shopItem)
    {
        $shopItem->delete();
        return redirect()->route('shopItem.index')->with("toast","Item has been deleted");
    }
}
