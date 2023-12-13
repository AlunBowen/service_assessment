<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organisation;

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
        
        $user->organisation()->associate(Organisation::find(1));
        $user->save();

        
        $user = new \App\Models\User();
        $user->name = 'Bowen';
        $user->email = 'bowen@bowen';
        $user->password = bcrypt('password');
       
        $user->organisation()->associate(Organisation::find(2));
        $user->save();
    }
}
