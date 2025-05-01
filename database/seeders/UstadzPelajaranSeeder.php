<?php

namespace Database\Seeders;

use App\Models\UstadzPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UstadzPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UstadzPelajaran::factory()->count(30)->create();
    }
}
