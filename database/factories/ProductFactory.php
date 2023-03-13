<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text(70),
            'description'=>$this->faker->realTextBetween(100,250),
            'price'=>$this->faker->randomDigit(),
            'stock'=>$this->faker->randomDigit(),
            'status'=>'available',
        ];
    }
}
