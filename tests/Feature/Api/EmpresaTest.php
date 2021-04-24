<?php

namespace Tests\Feature\APi;

use App\Models\Empresa;
use App\Models\Plano;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpresaTest extends TestCase
{
    /**
     * A basic feature test route empresa.
     *
     * @return void
     */
    public function test_empresa()
    {
        //Plano::factory()->count(1)->create();
        Empresa::factory()->count(5)->create();
        $response = $this->get('/api/v1/empresa');
        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }


    /**
     * A basic feature test route empresa.
     *
     * @return void
     */
    public function test_empresa_erro()
    {
        $empresa = "fake_value";

        $response = $this->get("/api/v1/empresa/{$empresa}");
        $response->assertStatus(404);
    }

    /**
     * A basic feature test route empresa.
     *
     * @return void
     */
    public function test_empresa_id()
    {
        //Plano::factory()->count(1)->create();

        $empresa = Empresa::factory()->create();

        $response = $this->get("/api/v1/empresa/{$empresa->uuid}");
        $response->assertStatus(200);
    }
}
