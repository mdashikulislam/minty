<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required',  Rules\Password::defaults()],
        ];
    }

    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response),'status'=>true], 200);
        }
        return new JsonResponse(['message' => trans($response),'status'=>true], 200);
    }
//
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json([
            'message'=>trans($response),
            'status'=>false
        ]);
    }

}
