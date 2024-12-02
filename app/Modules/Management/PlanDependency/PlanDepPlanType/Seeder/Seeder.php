<?php
namespace App\Modules\Management\PlanDependency\PlanDepPlanType\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepPlanType\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepPlanType\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'serial_no' => $faker->randomNumber,
                'start_date' => $faker->dateTime,
                'end_date' => $faker->dateTime,
            ]);
        }
    }
}