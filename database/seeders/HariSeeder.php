<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'senin'],
            ['name' => 'selasa'],
            ['name' => 'rabu'],
            ['name' => 'kamis'],
            ['name' => 'jumat'],
        ];

        foreach ($data as $hariData) {
            \App\Models\Hari::create($hariData);
        }
    }
}
