<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laravel\Passport\Client as OClient; 
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login(Request $request) { 
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
            'message' => 'Unauthorized'
            ],401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_in' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'role' => Auth::user()->roles->pluck('name')[0],
            'user' => Auth::user()->name
        ]);
    }
}
