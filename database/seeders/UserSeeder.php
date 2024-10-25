<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // use seeder table
        DB::table('users')->insert(
            // [
            //     'name' => 'Admin Atresna',
            //     'email' => 'admin@atresna.com',
            //     'profile' => '',
            //     'password' => Hash::make('killingme12'),
            // ],
            [
                'name' => 'Adnan',
                'email' => 'adnan@ciptaanekaair.co.id',
                'profile' => '',
                'password' => Hash::make('Ciptawatertech2024##'),
            ]
        );
    }
}
