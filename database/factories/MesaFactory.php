<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Mesa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mesa::class;

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
