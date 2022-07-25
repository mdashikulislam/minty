<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;

    public function login(LoginRequest $request)
    {
        if (!empty(\Auth::check())){
            return \response([
                'status'=>false,
                'message'=>'You already logged in'
            ],Response::HTTP_UNAUTHORIZED);
        }
        $user = User::where('email',$request->email)->first();
        if (!$user || !Hash::check($request->password,$user->password)){
            return \response([
                'status'=>false,
                'message'=>'Invalid Credentials'
            ],Response::HTTP_UNAUTHORIZED);
        }
        if ($user->roles[0]->name !== APP_USER){
            return \response([
                'status'=>false,
                'message'=>'Only App User Can login'
            ],Response::HTTP_UNAUTHORIZED);
        }
        $token = $user->createToken('login')->plainTextToken;
        $user->update(['auth_token'=>$token]);
        return \response([
            'status'=>true,
            'message'=>'Login Successful',
            'token'=>$token
        ],Response::HTTP_OK);
    }

    public function register(RegisterRequest $request)
    {

        \DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->sendEmailVerificationNotification();
            $token = $user->createToken('register')->plainTextToken;
            $user->assignRole(APP_USER);
            \DB::commit();
            return \response([
                'status'=>true,
                'message'=>'Register Successful',
                'token'=>$token
            ],Response::HTTP_OK);
        }catch (\Exception $exception){
            \DB::rollBack();
            return \response([
                'status'=>false,
                'message'=>'Registration failed',
            ],Response::HTTP_UNAUTHORIZED);
        }

    }

    public function logout()
    {
        \Auth::user()->tokens()->delete();
        return \response([
            'status'=>true,
            'message'=>'Logout Successful'
        ],Response::HTTP_OK);
    }

    public function userInfo()
    {
        return \response([
            'status'=>true,
            'data'=>User::where('id',\Auth::id())->first()
        ],Response::HTTP_OK);
    }

    public function userInfoUpdate(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255'],
            'email'=>['required','max:32','email','unique:users,email,'.\Auth::id()]
        ]);
        $user = User::where('id',\Auth::id())->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return \response([
            'status'=>true,
            'data'=>$user
        ],Response::HTTP_OK);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::where('id',\Auth::id())->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return \response([
            'status'=>true,
            'message'=>'Password change successfully.'
        ],Response::HTTP_OK);
    }
}
