<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index()
    {

        return view('home');
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

//    public function verify($id,$hash,Request $request)
//    {
//        if (! hash_equals((string) $id,
//            (string) $request->user()->getKey())) {
//            return false;
//        }
//        return 'ashik';
//    }
}
