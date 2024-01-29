<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Plan::create([
            'name' => 'Basic Pack',
            'monthly_price' => 10.00,
            'yearly_price' => 7.00,
            'description' => 'Save 2 months subscription fees on annual billing',
        ]);
        \App\Models\Plan::create([
            'name' => 'Professional Pack',
            'monthly_price' => 300.00,
            'yearly_price' => 3000.00,
            'description' => 'Save 2 months subscription fees on annual billing',
        ]);
        \App\Models\Plan::create([
            'name' => 'Enterprise Pack',
            'monthly_price' => 600.00,
            'yearly_price' => 6000.00,
            'description' => 'Save 2 months subscription fees on annual billing',
        ]);
    }
}
