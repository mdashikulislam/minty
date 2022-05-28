<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MasterItem;
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
}
