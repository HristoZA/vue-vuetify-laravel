<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{

    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if($this->attemptLogin($request)){
            $user = Auth::user();

            $user->tokens()->delete();
            $success['token'] =  $user->createToken('app')->plainTextToken;

            $user->save();
            return $this->sendResponse('User succesfully logged in.', $success, 200);
        }else{
            return $this->sendError('Unauthorised', ['error' => 'Invalid Login Credentials'], 404);
        }

    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return $this->sendResponse('User logged out.', '', 200);
    }
}
