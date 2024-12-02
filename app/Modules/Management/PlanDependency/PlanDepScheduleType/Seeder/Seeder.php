<?php

namespace App\Modules\Management\PlanDependency\PlanDepScheduleType\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepScheduleType\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepScheduleType\Models\Model::class;

    public function run(): void
    {

        $faker = Faker::create();
        self::$model::truncate();

        $data = [
            "sector vittik",
            "prikolporna vittik",
            "niyomito",
        ];

        foreach ($data as $key => $item) {
            self::$model::create([
                'title' => $item,
                'description' => $faker->paragraph,
                'serial_no' => $faker->randomNumber,
            ]);
        }
    }
}
