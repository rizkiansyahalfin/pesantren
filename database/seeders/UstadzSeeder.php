<?php

namespace Database\Seeders;

use App\Models\Ustadz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UstadzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ustadz::factory()->count(15)->create();
    }
}
