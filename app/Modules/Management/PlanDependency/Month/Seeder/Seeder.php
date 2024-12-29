<?php

namespace App\Modules\Management\PlanDependency\Month\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\Month\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\Month\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        $data = [
            "january",
            "february",
            "march",
            "april",
            "may",
            "june",
            "july",
            "august",
            "september",
            "october",
            "november",
            "december",
        ];

        foreach ($data as $key => $item) {
            self::$model::create([
                'title' => $item,
            ]);
        }
    }
}
