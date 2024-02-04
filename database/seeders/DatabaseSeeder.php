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
        //jalankan semua seeder 
        $this->call([
            AkunSeeder::class,
            BarangSeeder::class,
            ProviderSeeder::class,
        ]);


    }
}
