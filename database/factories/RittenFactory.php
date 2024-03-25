<?php

namespace Database\Factories;

use App\Models\Ritten;
use Illuminate\Database\Eloquent\Factories\Factory;

class RittenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ritten::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naam_verzender' => $this->faker->name,
            'adres_verzender' => $this->faker->address,
            'postcode_verzender' => $this->faker->postcode,
            'plaats_verzender' => $this->faker->city,
            'naam_ontvanger' => $this->faker->name,
            'adres_ontvanger' => $this->faker->address,
            'postcode_ontvanger' => $this->faker->postcode,
            'plaats_ontvanger' => $this->faker->city,
            'kosten' => $this->faker->randomFloat(2, 0, 1000),
            'aantal_km' => $this->faker->numberBetween(1, 1000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
