<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categoria::class;

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
            'nome' => $this->faker->unique()->name,
            'descricao' => $this->faker->sentence,
        ];
    }
}
