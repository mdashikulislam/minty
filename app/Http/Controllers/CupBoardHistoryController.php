<?php

namespace App\Http\Controllers;

use App\Models\Cupboard;
use App\Models\CupboardHistory;
use App\Models\MasterItem;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class CupBoardHistoryController extends Controller
{
    public function index()
    {
        $histories = CupboardHistory::with(['users','shops','items'])->orderByDesc('created_at')->get();
        return view('cupboard_history.index')
            ->with([
                'histories'=>$histories
            ]);
    }
    public function create()
    {
        return view('cupboard_history.create')
            ->with([
                'users'=>User::all(),
                'cupboards'=>Cupboard::all(),
                'shops'=>Shop::all(),
                'items'=>MasterItem::all()
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'user_id'=>['required'],
           'cupboard_id'=>['required'],
           'shop_id'=>['required'],
           'which_way'=>['required'],
           'qnty'=>['required','min:1','numeric'],
           'cost_each'=>['required','between:0.01,99999.99'],
        ]);
        $history = new CupboardHistory();
        $this->extracted($history,$request);
        $history->save();
        toast('Cupboard history create successfully','success');
        return redirect()->route('cupboard.history.index');
    }

    public function edit($id)
    {
        $history = CupboardHistory::where('id',$id)->first();
        if (empty($history)){
            toast('Cupboard History not found','error');
            return redirect()->back();
        }
        return  view('cupboard_history.edit')
            ->with([
                'history'=>$history,
                'users'=>User::all(),
                'cupboards'=>Cupboard::all(),
                'shops'=>Shop::all(),
                'items'=>MasterItem::all()
            ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'user_id'=>['required'],
            'cupboard_id'=>['required'],
            'shop_id'=>['required'],
            'which_way'=>['required'],
            'qnty'=>['required','min:1','numeric'],
            'cost_each'=>['required','between:0.01,99999.99'],
        ]);
        $history = CupboardHistory::where('id',$id)->first();
        if (empty($history)){
            toast('Cupboard History not found','error');
            return redirect()->back();
        }
        $this->extracted($history,$request);
        $history->save();
        toast('Cupboard history update successfully','success');
        return redirect()->route('cupboard.history.index');
    }

    public function delete($id)
    {
        $history = CupboardHistory::where('id',$id)->first();
        if (empty($history)){
            toast('Cupboard history not found','error');
            return redirect()->route('cupboard.history.index');
        }
        $history->delete();
        toast('Cupboard history delete successfully','success');
        return redirect()->route('cupboard.history.index');
    }
    private function extracted(CupboardHistory $history, Request $request){
        $history->user_id = $request->user_id;
        $history->cupboard_id = $request->cupboard_id;
        $history->shop_id = $request->shop_id;
        $history->which_way = $request->which_way;
        $history->qnty = $request->qnty;
        $history->cost_each = $request->cost_each;
        $history->cost_total = $request->cost_each * $request->qnty;
    }

}
