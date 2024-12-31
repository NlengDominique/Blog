<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'prix' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'categorie_id' => Categorie::all()->random()->id,
        ];
    }
}
