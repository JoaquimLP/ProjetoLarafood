<?php

namespace Tests\Feature\Api;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Mesa;
use App\Models\Order;
use App\Models\Produto;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PedidoTest extends TestCase
{
    /**
     * A basic feature test erro_orders.
     *
     * @return void
     */
    public function test_erro_orders()
    {
        $response = $this->postJson('/api/v1/create-orders');
        $response->dump();
        $response->assertStatus(422)
                ->assertJsonPath('errors.token', [trans('validation.required', ['attribute' => 'token'])])
                ->assertJsonPath('errors.produto', [trans('validation.required', ['attribute' => 'produto'])]);
    }

    /**
     * A basic feature test erro_orders.
     *
     * @return void
     */
    public function test_create_new_orders()
    {
        $empresa = Empresa::factory()->create();
        $produtos = Produto::factory()->count(5)->create();

        $paylod = [
            'token' => $empresa->uuid,
            'produto' => [

            ]
        ];

       foreach ($produtos as $produto) {
           array_push($paylod['produto'],
                [
                    "identify"=>$produto->uuid,
                    "qtd"=> 2
                ]);
       }

        $response = $this->postJson("/api/v1/create-orders", $paylod);
        //$response->dump();
        $response->assertStatus(201);
    }

    /**
     * A basic feature test erro_orders.
     *
     * @return void
     */
    public function test_total_orders()
    {
        $empresa = Empresa::factory()->create();
        $produtos = Produto::factory()->count(2)->create();

        $paylod = [
            'token' => $empresa->uuid,
            'produto' => [

            ]
        ];

       foreach ($produtos as $produto) {
           array_push($paylod['produto'],
                [
                    "identify"=>$produto->uuid,
                    "qtd"=> 1
                ]);
       }

        $response = $this->postJson("/api/v1/create-orders", $paylod);
        //$response->dump();
        $response->assertStatus(201)
            ->assertJsonPath('data.total', 25.8);
    }


      /**
     * A basic feature test orders_not_found.
     *
     * @return void
     */
    public function test_orders_not_found()
    {
        $order = "teste";

        $response = $this->getJson("/api/v1/orders/{$order}");
        //$response->dump();
        $response->assertStatus(404);
    }

        /**
     * A basic feature test orders.
     *
     * @return void
     */
    public function test_get_orders()
    {
        $order = Order::factory()->create();
        $response = $this->getJson("/api/v1/orders/$order->identify/");

        $response->assertStatus(200);
    }

    /**
     * A basic feature test_create_new_orders_auth.
     *
     * @return void
     */
    public function test_create_new_orders_auth()
    {
        $empresa = Empresa::factory()->create();
        $produtos = Produto::factory()->count(5)->create();

        $paylod = [
            'token' => $empresa->uuid,
            'produto' => [

            ]
        ];

        foreach ($produtos as $produto) {
           array_push($paylod['produto'],
                [
                    "identify"=>$produto->uuid,
                    "qtd"=> 2
                ]);
        }

        $cliente = Cliente::factory()->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;


        $response = $this->postJson("/api/v1/auth/create-orders", $paylod, [
            'Authorization' => 'Bearer '.$token
        ]);
        //$response->dump();
        $response->assertStatus(201);
    }

    /**
     * A basic feature test_create_new_orders_mesa.
     *
     * @return void
     */
    public function test_create_new_orders_mesa()
    {
        $empresa = Empresa::factory()->create();
        $produtos = Produto::factory()->count(5)->create();
        $mesa = Mesa::factory()->create();

        $paylod = [
            'token' => $empresa->uuid,
            "mesa" => $mesa->uuid,
            'produto' => [

            ]
        ];

        foreach ($produtos as $produto) {
           array_push($paylod['produto'],
                [
                    "identify"=>$produto->uuid,
                    "qtd"=> 2
                ]);
        }

        $response = $this->postJson("/api/v1/create-orders", $paylod);
        //$response->dump();
        $response->assertStatus(201);
    }

      /**
     * A basic feature test_get_user_orders_auth.
     *
     * @return void
     */
    public function test_get_user_orders_auth()
    {
        $cliente = Cliente::factory()->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;
        Order::factory()->create(['cliente_id' => $cliente->id ]);


        $response = $this->getJson("/api/v1/auth/orders/my-orders",[
            'Authorization' => 'Bearer '.$token
        ]);
        //$response->dump();
        $response->assertStatus(200);
    }
}
