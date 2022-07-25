<?php

namespace App\Http\Controllers;

use App\Models\MasterItem;
use App\Models\Shop;
use App\Models\ShopItem;
use Illuminate\Http\Request;

class ShopItemController extends Controller
{
    public function index()
    {
        $items = ShopItem::with('shops')->with('masterItems')->orderByDesc('created_at')->paginate(20);
        return view('shop_item.index')
            ->with([
                'items'=>$items,
            ]);
    }

    public function create()
    {
        return view('shop_item.create')
            ->with([
                'shops'=>Shop::all(),
                'items'=>MasterItem::all()
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'shop_id'=>['required'],
           'master_item_id'=>['required'],
        ]);
        $item = new ShopItem();
        $this->extracted($item,$request);
        $item->save();
        toast('Shop item create successfully','success');
        return redirect()->route('shop.item.index');
    }
    public function edit($id)
    {
        $shopItem = ShopItem::where('id',$id)->first();
        if (empty($shopItem)){
            toast('Shop Item not found','error');
            return redirect()->back();
        }
        return view('shop_item.edit')
            ->with([
                'shops'=>Shop::all(),
                'items'=>MasterItem::all(),
                'shopItem'=>$shopItem
            ]);
    }
    public function extracted(ShopItem $item, Request $request)
    {
        $item->shop_id = $request->shop_id;
        $item->master_item_id = $request->master_item_id;
        $item->display_shop = $request->display_shop;
    }
}
