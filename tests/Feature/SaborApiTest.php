<?php

namespace Tests\Feature;

use App\Models\Sabor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class SaborApiTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function pode_listar_todos_sabores()
    {
         $user = User::factory()->create();

         $token = JWTAuth::fromUser($user);

         Sabor::factory()->count(3)->create();

         $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                          ->getJson('/api/sabores');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    /** @test */
    public function pode_mostrar_sabor_por_id()
    {
        $user = User::factory()->create();

        $token = JWTAuth::fromUser($user);

        $sabor = Sabor::factory()->create();

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->getJson("/api/sabores/{$sabor->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $sabor->id,
            'nome' => $sabor->nome,
            'descricao' => $sabor->descricao,
        ]);
    }

    /** @test */
    public function retorna_404_se_sabor_nao_encontrado()
    {
        $user = User::factory()->create();

        $token = JWTAuth::fromUser($user);

        $sabor = Sabor::factory()->create();

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->getJson("/api/sabores/9999");


        $response->assertStatus(404);
        $response->assertJson([
            'mensagem' => 'Sabor não encontrado',
        ]);
    }
}
