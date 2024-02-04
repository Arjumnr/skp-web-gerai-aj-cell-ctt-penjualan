<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::insert([
            
                'nama_provider' => 'XL',
        ]);

            // foreach ($providers as $provider) {
            //     \App\Models\Provider::create($provider);
            // }
    }
}
