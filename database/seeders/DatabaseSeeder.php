<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Admin\HariSeeder;
use Database\Seeders\Admin\JamSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(HariSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(MataKuliahSeeder::class);
        // $this->call(EvaluasiSeeder::class);
        // $this->call(BankSoalSeeder::class);
        // $this->call(GroupSeeder::class);
        // $this->call(AuthGroupUserSeeder::class);
        // $this->call(JamSeeder::class);
    }
}
