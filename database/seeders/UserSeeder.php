<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//model for user
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        user::factory()->create([
            'name' => 'Tresna Rani',
            'email' => 'tresna312@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
