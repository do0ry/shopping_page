<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'handle'=>'image',
            'mediable_type'=>'App\Models\Product',
            'mediable_id'=>Product::factory()->create()->id,
            'path'=>$this->faker->image(storage_path('app/public')),
        ];
    }
}
