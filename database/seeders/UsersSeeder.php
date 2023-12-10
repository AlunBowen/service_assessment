<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new \App\Models\User();
        $user->name = 'Alun';
        $user->email = 'alun@alun.com';
        $user->password = bcrypt('password');
        $user->save();

    }
}
