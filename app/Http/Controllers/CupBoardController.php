<?php

namespace App\Http\Controllers;

use App\Models\Cupboard;
use App\Models\MasterItem;
use App\Models\User;
use Illuminate\Http\Request;

class CupBoardController extends Controller
{
    public function index()
    {
        $cupboards = Cupboard::with(['users','masterItems'])
        ->orderByDesc('created_at')->get();
        return view('cupboard.index')
            ->with([
                'cupboards'=>$cupboards
            ]);
    }
    public function create()
    {
        return view('cupboard.create')
            ->with([
                'users'=>User::all(),
                'items'=>MasterItem::all()
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'user_id'=>['required'],
           'master_item_id'=>['required'],
           'purchase_total'=>['required'],
           'in_use_count'=>['required']
        ]);
        $cupboard = new Cupboard();
        $this->extracted($cupboard,$request);
        $cupboard->save();
        toast('Cupboard create successfully','success');
        return redirect()->route('cupboard.index');
    }

    public function edit($id,Request $request)
    {
        $cupboard = Cupboard::where('id',$id)->first();
        if (empty($cupboard)){
            toast('Cupboard not found','error');
            return redirect()->back();
        }
        return view('cupboard.edit')
            ->with([
                'users'=>User::all(),
                'items'=>MasterItem::all(),
                'cupboard'=>$cupboard
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'user_id'=>['required'],
            'master_item_id'=>['required'],
            'purchase_total'=>['required'],
            'in_use_count'=>['required']
        ]);
        $cupboard = Cupboard::where('id',$id)->first();
        if (empty($cupboard)){
            toast('Cupboard not found','error');
            return redirect()->route('cupboard.index');
        }
        $this->extracted($cupboard,$request);
        $cupboard->save();
        toast('Cupboard update successfully','success');
        return redirect()->route('cupboard.index');
    }

    public function delete($id)
    {
        $cupboard = Cupboard::where('id',$id)->first();
        if (empty($cupboard)){
            toast('Cupboard not found','error');
            return redirect()->route('cupboard.index');
        }
        $cupboard->delete();
        toast('Cupboard delete successfully','success');
        return redirect()->route('cupboard.index');
    }
    private function extracted(Cupboard $cupboard, Request $request){
        $cupboard->user_id = $request->user_id;
        $cupboard->master_item_id = $request->master_item_id;
        $cupboard->purchase_total = $request->purchase_total;
        $cupboard->in_use_count = $request->in_use_count;
    }
}
