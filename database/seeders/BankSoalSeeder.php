<?php

namespace Database\Seeders;

use App\Models\BankSoalModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'id_evaluasi' => 1,
                'soal' => 'sebelum membuat program langkah awal apa yang akan kita lakukan sebagai developer  ?`',
                'opsi_a' => 'menyusun algoritma',
                'opsi_b' => 'langsung memulai tanpa rencana',
                'opsi_c' => 'merancang database',
                'opsi_d' => 'melakukan pengkodean mendasar',
                'opsi_e' => 'melakuakan testing',
                'kunci' => 'menyusun algoritma',
            ],
            [
                'id_evaluasi' => 1,
                'soal' => 'sebelum membuat program langkah awal apa yang akan kita lakukan sebagai developer 02 ?`',
                'opsi_a' => 'menyusun algoritma',
                'opsi_b' => 'langsung memulai tanpa rencana',
                'opsi_c' => 'merancang database',
                'opsi_d' => 'melakukan pengkodean mendasar',
                'opsi_e' => 'melakuakan testing',
                'kunci' => 'menyusun algoritma',
            ],
            [
                'id_evaluasi' => 1,
                'soal' => 'sebelum membuat program langkah awal apa yang akan kita lakukan sebagai developer 03 ?`',
                'opsi_a' => 'menyusun algoritma',
                'opsi_b' => 'langsung memulai tanpa rencana',
                'opsi_c' => 'merancang database',
                'opsi_d' => 'melakukan pengkodean mendasar',
                'opsi_e' => 'melakuakan testing',
                'kunci' => 'menyusun algoritma',
            ],
            [
                'id_evaluasi' => 1,
                'soal' => 'sebelum membuat program langkah awal apa yang akan kita lakukan sebagai developer 04 ?`',
                'opsi_a' => 'menyusun algoritma',
                'opsi_b' => 'langsung memulai tanpa rencana',
                'opsi_c' => 'merancang database',
                'opsi_d' => 'melakukan pengkodean mendasar',
                'opsi_e' => 'melakuakan testing',
                'kunci' => 'menyusun algoritma',
            ],
            [
                'id_evaluasi' => 1,
                'soal' => 'sebelum membuat program langkah awal apa yang akan kita lakukan sebagai developer 05 ?`',
                'opsi_a' => 'menyusun algoritma',
                'opsi_b' => 'langsung memulai tanpa rencana',
                'opsi_c' => 'merancang database',
                'opsi_d' => 'melakukan pengkodean mendasar',
                'opsi_e' => 'melakuakan testing',
                'kunci' => 'menyusun algoritma',
            ],
        ];

        foreach ($data as $d) {
            BankSoalModel::create($d);
        }
    }
}
