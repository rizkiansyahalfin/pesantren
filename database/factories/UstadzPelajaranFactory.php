<?php

namespace Database\Factories;

use App\Models\Ustadz;
use App\Models\Pelajaran;
use App\Models\UstadzPelajaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UstadzPelajaran>
 */
class UstadzPelajaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\UstadzPelajaran::class;
     public function definition(): array
    {
        return [
            'ustadz_id' => \App\Models\Ustadz::factory(),
            'pelajaran_id' => \App\Models\Pelajaran::factory(),
        ];
    }
}
