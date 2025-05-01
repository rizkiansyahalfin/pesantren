<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            KamarSeeder::class,
            SantriSeeder::class,
            UstadzSeeder::class,
            PelajaranSeeder::class,
            KelasSeeder::class,
            JadwalSeeder::class,
            AbsensiSeeder::class,
            UstadzPelajaranSeeder::class,
        ]);
    }
}
