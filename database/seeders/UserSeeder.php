<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jenner Acosta Díaz',
            'phone' => '967037995',
            'email' => 'dev@jenner.pe',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);

        User::factory(4)->create();
    }
}
