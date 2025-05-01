<?php

namespace Database\Factories;

use App\Models\Pelajaran;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Factory as FakerFactory;
// use Faker\Generator as FakerGenerator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelajaran>
 */
class PelajaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pelajaran::class;

    public function definition(): array
    {
        return [
            'nama_pelajaran' => $this->faker->word,
            // Increase the range of possible unique values
            'kode_pelajaran' => $this->faker->unique()->numerify('PLJ########'),
        ];
    }
}
