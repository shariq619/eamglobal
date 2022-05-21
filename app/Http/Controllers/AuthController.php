<?php

namespace App\Http\Controllers;


use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        try {

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials))
                return api_error('Invalid credentials!');
            $user = $request->user();

            foreach ($user->tokens as $token) {
                $token->revoke();
            }

            $tokenObj = $user->createToken('user access token');
            $token = $tokenObj->token;
            $token->expires_at = Carbon::now()->addWeeks(4);
            $token->device_type = $request->device_type;
            $token->device_token = $request->device_id;
            $token->save();
            $token->accessToken;
            $token = $tokenObj->accessToken;
            $user->makeHidden('tokens');
            $data = Arr::add($user->toArray(), 'token_detail', ['access_token' => $token, 'token_type' => 'Bearer']);

            return api_success('Login Successfully', $data);


        } catch (\Exception $ex) {
            return api_error('message: ' . $ex->getMessage(), 500);
        }

    }
}
