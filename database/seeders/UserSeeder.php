<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i=0; $i < 10; $i++) { 
        //     User::create([
        //         'name'=>fake()->name(),
        //         'email'=>fake()->unique()->safeEmail(),
        //         'password'=>fake()->password()
        //     ]);
        // }
        User::create([
            'username' => 'Alejandro',
            'email' => "admin@admin.com",
            'password' => Hash::make('12345678'),
        ]);        
            
    }
}
