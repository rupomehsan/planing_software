<?php
namespace App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanManagement\DepartmentPlan\DepartmentYearlyPlan\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'central_yearly_plan_id' => $faker->randomNumber,
                'plan_dep_dofas_id' => null,
                'plan_dep_orjitobbo_target_id' => null,
                'title' => $faker->sentence,
                'serial_no' => null,
                'description' => $faker->paragraph,
                'previous_unfinished_parcent' => $faker->randomNumber,
                'rating' => $faker->randomNumber,
                'is_published' => $faker->boolean,
                'is_approved' => $faker->boolean,
            ]);
        }
    }
}