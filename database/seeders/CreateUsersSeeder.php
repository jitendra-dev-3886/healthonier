<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'staff',
                'email' => 'staff@techsolutionstuff.com',
                'type' => 0,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'super-admin@techsolutionstuff.com',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'doctor',
                'email' => 'doctor@techsolutionstuff.com',
                'type' => 2,
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
    //

}