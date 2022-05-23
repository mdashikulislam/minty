<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles',function ($q){
            $q->where('name',APP_USER);
        })->orderByDesc('created_at')->get();

        return view('user.index')
            ->with([
                'users'=>$users
            ]);
    }
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        if (empty($user)){
            toast('User not found','error');
            return redirect()->route('dashboard');
        }
        return view('user.edit')
            ->with([
                'user'=>$user
            ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255'],
            'email'=>['required','max:255','email'],
        ]);
        $user = User::where('id',$id)->first();
        if (empty($user)){
            toast('User not found','error');
            return redirect()->route('dashboard');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $this->validate($request,[
                'password'=>['required','min:8'],
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        toast('User update successful','success');
        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $user = User::where('id',$id)->first();
        if (empty($user)){
            toast('User not found','error');
            return redirect()->route('dashboard');
        }
        $user->delete();
        toast('User update successful','success');
        return redirect()->route('dashboard');
    }
}
