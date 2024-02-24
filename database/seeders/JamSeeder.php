<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jam' => '07.10-08.50'],
            ['jam' => '07.10-10.20'],
            ['jam' => '08.50-10.20'],
            ['jam' => '08.50-12.00'],
            ['jam' => '13.00-14.20'],
            ['jam' => '13.00-16.20'],
        ];

        foreach ($data as $hariData) {
            \App\Models\Jam::create($hariData);
        }
    }
}
