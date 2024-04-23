<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('role_user')->insert([
                'role_id' => fake()->numberBetween(1,4),                
                'user_id' => fake()->numberBetween(1,10)
            ]);
        }          
    }
}
