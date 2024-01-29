<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = [
            'Available for Scheduled Consultancy',
            'Available for Online Review Only',
            'Not Available for Consultancy',
            'Available but Busy in Emergency Treatment'
        ];

        foreach ($statuses as $status) {
            DB::table('doctor_status_indicators')->insert(['status' => $status]);
        }
    }
}