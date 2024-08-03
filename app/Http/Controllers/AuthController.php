<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['erro' => 'Não autorizado!'], 401);
        }

        return response()->json(compact('token'));
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['mensagem' => 'Desconectado com sucesso!']);
    }
}
