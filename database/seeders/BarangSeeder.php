<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       Barang::insert(
            [
                'nama_barang' => 'Voucer 50gb',
                'kategori' => 'voucer',
                'harga' => '50000',
                'provider_id' => '1'
            ]
            
        );

        // foreach ($barang as $key => $value) {
        //     \App\Models\Barang::create($value);
        // }

    }
}
