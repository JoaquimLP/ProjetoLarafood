<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $empresa = Empresa::factory()->create();
        return [
            'empresa_id' => $empresa->id,
            'titulo' => $this->faker->unique()->name,
            'preco' => 12.9,
            'descricao' => $this->faker->sentence,
            'image' => "pizza.png"
        ];
    }
}
