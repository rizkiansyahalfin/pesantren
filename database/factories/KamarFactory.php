<?php

namespace Database\Factories;
use App\Models\Kamar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kamar::class;
    public function definition(): array
    {
        return [
            'nama_kamar' => $this->faker->word,
        ];
    }
}
