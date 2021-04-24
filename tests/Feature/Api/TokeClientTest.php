<?php

namespace Tests\Feature\Api;

use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class TokeClientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_erro_create_new_token()
    {
        $response = $this->postJson('/api/v1/sanctum/token');

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_token_user_fake()
    {
        $paylod = [
            "email" =>  "teste@gmail.com",
            "password" =>  "12345678",
            "device_name" =>  Str::random(10),
        ];

        $response = $this->postJson('/api/v1/sanctum/token', $paylod);
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_token_user()
    {
        $cliente = Cliente::factory()->create();
        $paylod = [
            "email" =>  $cliente->email,
            "password" =>  'password',
            "device_name" =>  Str::random(10),
        ];

        $response = $this->postJson('/api/v1/sanctum/token', $paylod);
        $response->dump();
        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

     /**
     * erro ao fazer login
     *
     * @return void
     */
    public function test_erro_get_me()
    {
        $response = $this->getJson('/api/v1/auth/me');
        $response->dump();
        $response->assertStatus(401);
    }

     /**
     * fazer login
     *
     * @return void
     */
    public function test_get_me()
    {
        $cliente = Cliente::factory()->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;
        //dd($token->plainTextToken);
        $response = $this->getJson('/api/v1/auth/me', [
                'Authorization' => 'Bearer '.$token
            ]);
        //$response->dump();
        $response->assertStatus(200)->assertExactJson([
            'data' => [
                'name' => $cliente->name,
                'email' => $cliente->email,
            ]
        ]);
    }

     /**
     * erro ao fazer logout
     *
     * @return void
     */
    public function test_get_logout()
    {
        $cliente = Cliente::factory()->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;
        //dd($token->plainTextToken);
        $response = $this->postJson('/api/v1/auth/logout', [], [
                'Authorization' => 'Bearer '.$token
            ]);
        //$response->dump();
        $response->assertStatus(204);
    }
}
