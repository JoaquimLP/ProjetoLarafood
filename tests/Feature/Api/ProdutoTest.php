<?php

namespace Tests\Feature\Api;

use App\Models\Empresa;
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    /**
     * Erro get produto
     *
     * @return void
     */
    public function test_erro_produto()
    {
        $response = $this->getJson('/api/v1/produto');
        //$response->dump();
        $response->assertStatus(422);
    }

     /**
     * Recuperar as produtos
     *
     * @return void
     */
    public function test_get_produto()
    {
        $empresa = Empresa::factory()->create();

        $response = $this->getJson("/api/v1/produto/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }

     /**
     * Erro recuperar apenas uma produto
     *
     * @return void
     */
    public function test_get_uuid_erro_produto()
    {
        $empresa = Empresa::factory()->create();
        $produto_id = "test_value";
        $response = $this->getJson("/api/v1/produto/$produto_id/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     * Erro recuperar apenas uma produto
     *
     * @return void
     */
    public function test_get_uuid_produto()
    {
        $empresa = Empresa::factory()->create();
        $produto = Produto::factory()->create();
        $response = $this->getJson("/api/v1/produto/$produto->uuid/?token={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }


}
