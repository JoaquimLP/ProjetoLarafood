<?php

namespace Tests\Feature\Api;

use App\Models\Categoria;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    /**
     * Erro get categoria
     *
     * @return void
     */
    public function test_erro_categoria()
    {
        $response = $this->getJson('/api/v1/categoria');
        //$response->dump();
        $response->assertStatus(422);
    }

    /**
     * Recuperar as categorias
     *
     * @return void
     */
    public function test_get_categoria()
    {
        $empresa = Empresa::factory()->create();

        $response = $this->getJson("/api/v1/categoria/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }

    /**
     * Erro recuperar apenas uma categoria
     *
     * @return void
     */
    public function test_get_uuid_erro_categoria()
    {
        $empresa = Empresa::factory()->create();
        $categoria_id = "test_value";
        $response = $this->getJson("/api/v1/categoria/$categoria_id/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     * Erro recuperar apenas uma categoria
     *
     * @return void
     */
    public function test_get_uuid_categoria()
    {
        $empresa = Empresa::factory()->create();
        $categoria = Categoria::factory()->create();
        $response = $this->getJson("/api/v1/categoria/$categoria->uuid/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
