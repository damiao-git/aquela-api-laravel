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
        User::create(['name'=>'damiao', 'email'=> 'damiao@gmail.com', 'password' => bcrypt('senha123')]);
        User::create(['name'=>'maria', 'email'=> 'maria@gmail.com', 'password' => bcrypt('senha123')]);
        User::create(['name'=>'geyson', 'email'=> 'geyson@gmail.com', 'password' => bcrypt('senha123')]);
    }
}
