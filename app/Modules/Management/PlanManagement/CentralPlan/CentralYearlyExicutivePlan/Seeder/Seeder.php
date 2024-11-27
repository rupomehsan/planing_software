<?php
namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyExicutivePlan\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyExicutivePlan\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyExicutivePlan\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'central_yearly_plan_id' => null,
                'description' => $faker->paragraph,
                'plan_dep_monthly_schedule_type_id' => null,
                'plan_dep_schedule_id' => null,
                'serial_no' => null,
                'rating' => $faker->randomNumber,
                'is_published' => $faker->boolean,
                'is_approved' => $faker->boolean,
            ]);
        }
    }
}