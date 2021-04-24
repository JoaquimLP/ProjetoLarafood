<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
            'identify' => uniqid() . Str::random(10),
            'total' => 80.80,
            'status' => 'open',
            'comentario' => $this->faker->sentence,
        ];
    }
}
