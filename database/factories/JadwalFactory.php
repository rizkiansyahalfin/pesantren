<?php

namespace Database\Factories;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Ustadz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Jadwal::class;
    public function definition(): array
    {
        return [
            'kelas_id' => Kelas::factory(),
            'pelajaran_id' => Pelajaran::factory(),
            'ustadz_id' => Ustadz::factory(),
            'waktu' => $this->faker->dateTime,
        ];
    }
}
