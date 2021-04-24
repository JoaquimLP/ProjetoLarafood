<?php

namespace Tests\Feature\Api;

use App\Models\Empresa;
use App\Models\Mesa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MesaTest extends TestCase
{
    /**
     * Erro get mesa
     *
     * @return void
     */
    public function test_erro_mesa()
    {
        $response = $this->getJson('/api/v1/mesa');
        //$response->dump();
        $response->assertStatus(422);
    }

    /**
     * Recuperar as mesas
     *
     * @return void
     */
    public function test_get_mesa()
    {
        $empresa = Empresa::factory()->create();

        $response = $this->getJson("/api/v1/mesa/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }

    /**
     * Erro recuperar apenas uma mesa
     *
     * @return void
     */
    public function test_get_uuid_erro_mesa()
    {
        $empresa = Empresa::factory()->create();
        $mesa_id = "test_value";
        $response = $this->getJson("/api/v1/mesa/$mesa_id/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     * Erro recuperar apenas uma mesa
     *
     * @return void
     */
    public function test_get_uuid_mesa()
    {
        $empresa = Empresa::factory()->create();
        $mesa = Mesa::factory()->create();
        $response = $this->getJson("/api/v1/mesa/$mesa->uuid/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
