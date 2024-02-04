<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username'=>'admin',
                'name'=>'AkunAdmin',
                'level'=>'admin',
                'password'=>Hash::make('123')
            ]
        ];

        
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
