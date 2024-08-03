<?php

namespace App\Http\Controllers;

use App\Models\Sabor;

class SaborController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/sabores",
     *     summary="Listar todos os sabores",
     *     tags={"Sabores"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de sabores"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Sabor::all());
    }

    /**
     * @OA\Get(
     *     path="/api/sabores/{id}",
     *     summary="Buscar sabor por ID",
     *     tags={"Sabores"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do sabor",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Dados do sabor"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sabor não encontrado"
     *     )
     * )
     */
    public function show($id)
    {
        $sabor = Sabor::find($id);
        if ($sabor) {
            return response()->json($sabor);
        }
        return response()->json(['mensagem' => 'Sabor não encontrado'], 404);
    }
}
