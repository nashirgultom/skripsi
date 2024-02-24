<?php

namespace Database\Seeders;

use App\Models\EvaluasiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'Evaluasi Materi Minggu 1',
                'kode_mk' => 'TI-001',
                'deskripsi' => '<p>silahkan dikerjakan sesuai dengan instruksi.</p>',
                'status' => '0',
                'durasi' => 60,
            ],
            [
                'name' => 'Evaluasi Materi Minggu 2',
                'kode_mk' => 'TI-001',
                'deskripsi' => '<p>silahkan dikerjakan sesuai dengan instruksi.</p>',
                'status' => '0',
                'durasi' => 60,
            ],
            [
                'name' => 'Evaluasi Materi Minggu 3',
                'kode_mk' => 'TI-001',
                'deskripsi' => '<p>silahkan dikerjakan sesuai dengan instruksi.</p>',
                'status' => '0',
                'durasi' => 60,
            ],
        ];

        foreach ($data as $d) {
            EvaluasiModel::create($d);
        }
    }
}
