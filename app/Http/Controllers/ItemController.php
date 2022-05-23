<?php

namespace App\Http\Controllers;

use App\Models\MasterItem;
use App\Models\Shop;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = MasterItem::orderByDesc('created_at')->paginate(20);
        return view('item.index')
            ->with([
                'items'=>$items
            ]);
    }
    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>['required','max:10'],
            'price'=>['required','between:0.00,999.99'],
            'image'=>['required','mimes:jpeg,jpg,png,gif']
        ]);
        $item = new MasterItem();
        $item->name = $request->name;
        $item->price = round($request->price,2);
        $item->image = uploadSingleFile($request->image,'item');
        $item->save();
        toast('Master item create successfully','success');
        return redirect()->route('item.index');
    }

    public function edit($id)
    {
        $item = MasterItem::where('id',$id)->first();
        if (empty($item)){
            toast('Item not found','error');
            return redirect()->back();
        }
        return view('item.edit')
            ->with([
                'item'=>$item
            ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:10'],
            'price'=>['required','between:0.00,999.99'],
        ]);
        $item = MasterItem::where('id',$id)->first();
        if (empty($item)){
            toast('Item not found','error');
            return redirect()->route('item.index');
        }
        $item->name = $request->name;
        $item->price = $request->price;
        if ($request->image){
            $this->validate($request,[
                'image'=>['required','mimes:jpeg,jpg,png,gif']
            ]);
            $item->image = uploadSingleFile($request->image,'item');
        }
        $item->save();
        toast('Master item update successfully','success');
        return redirect()->route('item.index');
    }
    public function delete($id){
        $item = MasterItem::where('id',$id)->first();
        if (empty($item)){
            toast('Item not found','error');
            return redirect()->route('item.index');
        }
        $item->delete();
        toast('Master item delete successfully','success');
        return redirect()->route('item.index');
    }
}
