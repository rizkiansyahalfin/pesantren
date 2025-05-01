<?php

namespace Database\Factories;

use App\Models\Ustadz;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ustadz>
 */
class UstadzFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ustadz::class;
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'nip' => $this->faker->unique()->numerify('NIP########'),
            'spesialisasi' => $this->faker->randomElement(
                ['Fiqih', 'Hadits', 'Tafsir', 'Nahwu', 'Bahasa Arab']),
        ];
    }
}
