<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopItemRequest;
use App\Models\Shop;
use App\Models\ShopItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopItems = ShopItem::all();
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

        return redirect()->route('shopItem.create')->with('toast','Items is added successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopItem  $shopItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopItem $shopItem)
    {
        //
    }
}
