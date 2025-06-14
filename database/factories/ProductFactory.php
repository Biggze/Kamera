<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->sentence(3),
            'slug' => fn (array $attributes) => Str::slug($attributes['name']),
            'sku' => 'PROD-' . Str::upper(Str::random(8)),
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'discount_price' => $this->faker->boolean(30) 
                ? $this->faker->numberBetween(5000, 500000) 
                : null,
            'stock' => $this->faker->numberBetween(0, 100),
            'category' => $this->faker->randomElement([
                'Elektronik', 
                'Fashion', 
                'Makanan', 
                'Kesehatan', 
                'Rumah Tangga'
            ]),
            'image' => 'products/' . $this->faker->image(
                'storage/app/public/products', 
                400, 
                400, 
                'products', 
                false
            ),
            'gallery' => [
                'products/gallery/' . $this->faker->image(
                    'storage/app/public/products/gallery', 
                    400, 
                    400, 
                    'products', 
                    false
                ),
                'products/gallery/' . $this->faker->image(
                    'storage/app/public/products/gallery', 
                    400, 
                    400, 
                    'products', 
                    false
                )
            ],
            'status' => $this->faker->randomElement([
                'draft', 
                'published', 
                'archived'
            ]),
            'featured' => $this->faker->boolean(20)
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Product $product) {
            // 
        })->afterCreating(function (Product $product) {
            // 
        });
    }
}