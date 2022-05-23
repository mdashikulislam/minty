<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index()
    {
        $users = User::whereHas('roles',function ($q){
            $q->where('name',APP_USER);
        })->orderByDesc('created_at')->get();

        return view('home')
            ->with([
                'users'=>$users
            ]);
    }

    public function changePassword()
    {
        return view('change-password');
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::where('id',Auth::id())->first();
        $user->password = Hash::make($request->password);
        $user->save();
        toast('Password update successful','success');
        return redirect()->route('dashboard');
    }
}
