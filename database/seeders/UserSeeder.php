<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::truncate();
      User::create([
        'name' => 'tofa',
        'email' => 'tofa@gmail.com',
        'password' => bcrypt('12345'),
        'remember_token' => str::random(60),

      ]);
    }
}
