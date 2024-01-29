<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class WeekdaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weekdays')->insert([
            ['days' => 'Monday', 'status' => 1],
            ['days' => 'Tuesday', 'status' => 1],
            ['days' => 'Wednesday', 'status' => 1],
            ['days' => 'Thursday', 'status' => 1],
            ['days' => 'Friday', 'status' => 1],
            ['days' => 'Saturday', 'status' => 1],
            ['days' => 'Sunday', 'status' => 1],
        ]);
    }
}
