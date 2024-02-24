<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'kode_mk' => 'TI-001',
                'name' => 'Pemrograman Dasar',
                'id_users' => 2,
            ],
            [
                'kode_mk' => 'TI-002',
                'name' => 'Pemrograman Menengah',
                'id_users' => 2,
            ],
            [
                'kode_mk' => 'TI-003',
                'name' => 'Pemrograman Lanjut',
                'id_users' => 2,
            ],
        ];

        foreach ($data as $d) {
            \App\Models\MataKuliah::create($d);
        }
    }
}
