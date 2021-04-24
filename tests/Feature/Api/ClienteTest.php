<?php

namespace Tests\Feature\Api;

use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_erro_create_new_cliente()
    {
        $payload = [
            "name"=> "Carlos Faria",
            "email"=> "carlosfarias@gmail.com",
            //"password"=> "12345678"
        ];

        $response = $this->postJson('/api/v1/cliente', $payload);
        //$response->dump();
        $response->assertStatus(422)
            ->assertExactJson([
                'message'=> 'The given data was invalid.',
                'errors' => [
                    'password' => [trans('validation.required', ['attribute' => 'password'])]
                ]
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_cliente()
    {
        $payload = [
            "name"=> "Carlos Faria",
            "email"=> "carlosfarias@gmail.com",
            "password"=> "12345678"
        ];

        $response = $this->postJson('/api/v1/cliente', $payload);
        //$response->dump();
        $response->assertStatus(201)->assertExactJson([
                'data' => [
                    'name' => $payload['name'],
                    'email' => $payload['email'],
                ]
            ]);
    }
}
