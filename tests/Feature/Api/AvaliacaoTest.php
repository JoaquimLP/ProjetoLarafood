<?php

namespace Tests\Feature\Api;

use App\Models\Cliente;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class AvaliacaoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_erro_create_new_avaliacao()
    {
        $identify = "teste";
        $response = $this->postJson("/api/v1/auth/$identify/avaliacao");

        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_avaliacao()
    {
        $cliente = Cliente::factory()->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;
        $oder = Order::factory()->create(['cliente_id' => $cliente->id ]);

        $payload = [
            "comentario"=>"perfeito",
            "stars"=> "5"
        ];

        $response = $this->postJson("/api/v1/auth/$oder->identify/avaliacao", $payload,
            [
                'Authorization' => 'Bearer '.$token
            ]);

        $response->dump();

        $response->assertStatus(201);
    }
}
