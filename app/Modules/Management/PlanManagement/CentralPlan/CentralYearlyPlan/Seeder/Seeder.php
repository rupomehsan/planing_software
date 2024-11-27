<?php
namespace App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanManagement\CentralPlan\CentralYearlyPlan\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'plan_dep_dofas_id' => null,
                'plan_dep_orjitobbo_target_id' => null,
                'serial_no' => null,
                'previous_unfinished_parcent' => $faker->randomNumber,
                'rating' => $faker->randomNumber,
                'is_published' => $faker->boolean,
                'is_approved' => $faker->boolean,
            ]);
        }
    }
}