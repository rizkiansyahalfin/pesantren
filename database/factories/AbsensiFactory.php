<?php

namespace Database\Factories;

use App\Models\Absensi;
use App\Models\Santri;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absensi>
 */
class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Absensi::class;

     public function definition(): array
    {
        return [
            'santri_id' => Santri::factory(),
            'jadwal_id' => Jadwal::factory(),
            'status' => $this->faker->randomElement(['Hadir', 'Izin', 'Sakit', 'Alfa']),
            'keterangan' => $this->faker->sentence,
        ];
    }
}
