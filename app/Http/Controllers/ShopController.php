<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::orderByDesc('created_at')->paginate(20);
        return view('shop.index')
            ->with([
                'shops'=>$shops
            ]);
    }
    public function create()
    {
        return view('shop.create');
    }
    public function edit($id)
    {
        $shop = Shop::where('id',$id)->first();
        if (empty($shop)){
            toast('Shop not found','error');
            return redirect()->back();
        }
        return view('shop.edit')
            ->with([
                'shop'=>$shop
            ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:50'],
            'address'=>['required','max:255'],
            'postcode'=>['required','max:10','alpha_num'],
            'contact_name'=>['required','max:50'],
            'contact_number'=>['required','max:50'],
            'contact_email'=>['required','email','max:50'],
            'qrcode_out'=>['required','max:50'],
            'qrcode_in'=>['required','max:50'],
            'lat'=>['required','max:20'],
            'long'=>['required','max:20']
        ]);
        $shop = new Shop();
        $this->extracted($shop,$request);
        $shop->save();
        toast('Shop create successfully','success');
        return redirect()->route('shop.index');
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:50'],
            'address'=>['required','max:255'],
            'postcode'=>['required','max:10','alpha_num'],
            'contact_name'=>['required','max:50'],
            'contact_number'=>['required','max:50'],
            'contact_email'=>['required','email','max:50'],
            'qrcode_out'=>['required','max:50'],
            'qrcode_in'=>['required','max:50'],
            'lat'=>['required','max:20'],
            'long'=>['required','max:20']
        ]);
        $shop = Shop::where('id',$id)->first();
        if (empty($shop)){
            toast('Shop not found','error');
            return redirect()->back();
        }
        $this->extracted($shop,$request);
        $shop->save();
        toast('Shop update successfully','success');
        return redirect()->route('shop.index');
    }
    public function delete($id){
        $shop = Shop::where('id',$id)->first();
        if (empty($shop)){
            toast('Item not found','error');
            return redirect()->route('item.index');
        }
        $shop->delete();
        toast('Shop delete successfully','success');
        return redirect()->route('shop.index');
    }
    private function extracted(Shop $shop, Request $request){
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->postcode = $request->postcode;
        $shop->contact_name = $request->contact_name;
        $shop->contact_number = $request->contact_number;
        $shop->contact_email = $request->contact_email;
        $shop->qrcode_out = $request->qrcode_out;
        $shop->qrcode_in = $request->qrcode_in;
        $shop->lat = $request->lat;
        $shop->long = $request->long;
        $shop->shop_only = $request->shop_only;
    }
}
