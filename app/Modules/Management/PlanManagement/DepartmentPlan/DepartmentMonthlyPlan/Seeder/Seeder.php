<?php
namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentMonthlyPlan\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'department_id' => null,
                'central_yearly_plan_id' => null,
                'central_yearly_executive_plan_id' => null,
                'department_yearly_plan_id' => null,
                'department_yearly_executive_plan_id' => null,
                'description' => $faker->paragraph,
                'plan_dep_monthly_schedule_type_id' => null,
                'plan_dep_schedule_id' => null,
                'month_year' => $faker->dateTime,
                'serial_no' => null,
                'rating' => $faker->randomNumber,
                'is_published' => $faker->boolean,
                'is_approved' => $faker->boolean,
                'deadline_type' => $faker->sentence,
            ]);
        }
    }
}