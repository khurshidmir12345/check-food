<?php

namespace Database\Seeders;

use App\Constants\Plan\PlanTypeEnum;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plan_monthly = Plan::create([
            'id' => 1,
            'name' => 'Pro Monthly',
            'price' => 6000,
            'type' => PlanTypeEnum::MONTHLY->value
        ]);

        $plan_yearly = Plan::create([
            'id' => 2,
            'name' => 'Pro Yearly',
            'price' => 60000,
            'type' => PlanTypeEnum::YEARLY->value
        ]);
    }
}
