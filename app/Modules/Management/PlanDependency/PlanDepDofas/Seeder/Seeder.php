<?php

namespace App\Modules\Management\PlanDependency\PlanDepDofas\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepDofas\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepDofas\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        $data = [
            "dawat",
            "songothon",
            "prosikkhon",
            "islamic somajbinirman",
        ];

        for ($i = 0; $i < 4; $i++) {
            foreach ($data as $key => $item) {
                self::$model::create([
                    'title' => $item,
                    'description' => $faker->paragraph,
                    'serial_no' => $key + 1,
                ]);
            }
        }
    }
}
