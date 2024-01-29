<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        
            [
                'name' => 'Admin',
                'email' => 'shibli@xoniertechnologies.com',
                'password' => '$2y$10$IvDApnUJWxWHkcL/dHZAYuD5cImtY1ZTT9g99m.eOoATWlE79yS7m',
                'type' => 0,
                'created_at' => '2023-07-05 01:47:46',
                'updated_at' => '2023-07-05 01:47:46',
                'status' => 1
            ],
            
        ]);
    }
}
