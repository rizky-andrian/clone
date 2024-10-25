<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make company info
        DB::table('company_info')->insert([
            'company_name' => 'Admin Atresna Creative Indonesia',
            'company_slogan' => 'Total Solution For Your Digital Company',
            'company_address' => 'Jl. Maju No.1 Tidak Mundur, Kec. Sukses, Kab. Berhasil, 12201',
            'company_logo' => 'logo.png',
            'company_phone' => '08557456858',
            'company_phone1' => '08557456858',
            'company_email' => 'support@atresna.com',
            'company_npwp' => '27.2312.34123.131',
        ]);
    }
}
