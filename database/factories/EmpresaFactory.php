<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Plano;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cnpj = uniqid() . (int) mt_rand ( (int) 5 , (int) 7 );

        $plano = Plano::factory()->create();

        return [
            'cnpj' => $cnpj,
            'nome' => $this->faker->unique()->name,
            'email' =>  $this->faker->unique()->safeEmail,
            'plano_id' => $plano->id,
        ];
    }
}
