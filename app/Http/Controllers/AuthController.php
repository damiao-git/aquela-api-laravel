<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
   /**
 * @OA\Post(
 *     path="/api/login",
 *     summary="Login",
 *     tags={"Login"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email"),
 *             @OA\Property(property="password", type="string", format="password")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login efetuado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="token", type="string", description="JWT token")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Credendiais inválidas"
 *     ),
 * )
 */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['erro' => 'Não autorizado!'], 401);
        }

        return response()->json(compact('token'));
    }

   /**
 * @OA\Post(
 *     path="/api/logout",
 *     summary="Logout",
 *     tags={"Login"},
 *     security={{ "Bearer": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Desconectado com sucesso"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     ),
 * )
 */

    public function logout()
    {
        Auth::logout();
        return response()->json(['mensagem' => 'Desconectado com sucesso!']);
    }
}
