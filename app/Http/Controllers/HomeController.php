<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('type','Stuff')->orderByDesc('created_at')->get();
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
