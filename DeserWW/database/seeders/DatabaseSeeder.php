<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SegurosTableSeeder::class,
            SponsorsTableSeeder::class,
            CorredorsTableSeeder::class,
            CarrerasTableSeeder::class,
            DorsalsTableSeeder::class,
            DwwsTableSeeder::class,
            PatrocinansTableSeeder::class,
        ]);
    }
}
