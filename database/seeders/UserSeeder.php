<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'first_name' => 'administrator',
                'last_name' => 'lms',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('darmajaya123'),
                'role' => 1,
            ],
            [
                'first_name' => 'Suci',
                'last_name' => 'Mutiara, S.Kom., M.T.I.',
                'username' => 'suci',
                'email' => 'suci@gmail.com',
                'password' => bcrypt('darmajaya123'),
                'role' => 2,
            ],
            [
                'first_name' => 'Muhammad',
                'last_name' => 'Fauzan Azima, S.Kom., M.T.I.',
                'username' => 'fauzan',
                'email' => 'fauzan@gmail.com',
                'password' => bcrypt('darmajaya123'),
                'role' => 2,
            ],
            [
                'first_name' => 'siswa',
                'last_name' => 'pertama',
                'username' => 'siswa1',
                'email' => 'siswa1@gmail.com',
                'password' => bcrypt('darmajaya123'),
                'role' => 3,
            ],
            [
                'first_name' => 'siswa',
                'last_name' => 'kedua',
                'username' => 'siswa2',
                'email' => 'siswa2@gmail.com',
                'password' => bcrypt('darmajaya123'),
                'role' => 3,
            ],
            [
                'first_name' => 'siswa',
                'last_name' => 'ketiga',
                'username' => 'siswa3',
                'email' => 'siswa3@gmail.com',
                'password' => bcrypt('darmajaya123'),
                'role' => 3,
            ],
        ];

        // DB::table('users')->insert($data);
        foreach ($data as $d) {
            User::create($d);
        }
    }
}
