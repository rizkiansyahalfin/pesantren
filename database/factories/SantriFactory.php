<?php

namespace Database\Factories;

use App\Models\Santri;
use App\Models\Kamar;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Santri::class;
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name,
            // 'nis' => $this->faker->unique()->numerify('NIS########'),
            // 'nis' => $this->faker->unique()->bothify('2025####??'), // 10.000 x 676 kombinasi
            'nis' => 'SN' . uniqid(), // jika tidak perlu predictable
            'tanggal_lahir' => $this->faker->date,
            'alamat_asal' => $this->faker->address,
            'kamar_id' => Kamar::factory(),
            'kelas_id' => Kelas::factory(),
        ];
    }
}
