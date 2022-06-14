<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cupboard;
use App\Models\CupboardHistory;
use App\Models\MasterItem;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function rentItem()
    {
        $items = MasterItem::orderByDesc('created_at')->get();
        return  response([
            'status'=>true,
            'data'=>$items
        ],Response::HTTP_OK);
    }

    public function rentItemSingle($id)
    {
        $item = MasterItem::where('id',$id)->first();
        if (!empty($item)){
            $item->image = asset('storage/'.$item->image);
            return \response([
                'status'=>true,
                'data'=>$item
            ],Response::HTTP_OK);
        }else{
            return \response([
                'status'=>false,
                'msg'=>'Item not found'
            ],Response::HTTP_OK);
        }
    }

    public function shopList()
    {
        $shops = Shop::where('shop_only',1)->orderByDesc('created_at')->get();
        return \response([
            'status'=>true,
            'data'=>$shops
        ],Response::HTTP_OK);
    }

    public function cupboards()
    {
        $cupboard = Cupboard::with('masterItems')->whereHas('masterItems')->where('user_id',\Auth::id())->orderByDesc('created_at')->get();
         return \response([
             'status'=>true,
             'data'=>$cupboard
         ],Response::HTTP_OK);
    }

    public function cupboardCreate(Request $request)
    {
        $this->validate($request,[
            'master_item_id'=>['required','numeric','min:1'],
            'purchase_total'=>['required','numeric','min:1'],
            'in_use_count'=>['required','numeric','min:1'],
        ]);
        $cupboard = new Cupboard();
        $cupboard->user_id = \Auth::id();
        $cupboard->master_item_id = $request->master_item_id;
        $cupboard->purchase_total = $request->purchase_total;
        $cupboard->in_use_count = $request->in_use_count;
        if ($cupboard->save()){
            return \response([
                'status'=>true,
                'data'=>$cupboard
            ],Response::HTTP_OK);
        }else{
            return \response([
                'status'=>false,
                'msg'=>'Data not insert'
            ],Response::HTTP_OK);
        }
    }
    public function cupboardHistory()
    {
        $history = CupboardHistory::with('shops')
            ->with('items')
            ->whereHas('shops')
            ->whereHas('items')
            ->where('user_id',\Auth::id())
            ->orderByDesc('created_at')
            ->get();
        return \response([
            'status'=>true,
            'data'=>$history
        ],Response::HTTP_OK);

    }
}
