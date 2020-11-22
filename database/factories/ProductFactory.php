<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            // 'category_id' => random_int(1,3),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
            'created_at' => now(),
            'updated_at' => now(),
            
        ];
    }
}
