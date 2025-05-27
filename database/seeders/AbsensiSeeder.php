<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Absensi::factory()->count(1000)->create(); // LAMA PROSES SEEDINGNYA
        Absensi::factory()->count(30)->create();
    }
}
