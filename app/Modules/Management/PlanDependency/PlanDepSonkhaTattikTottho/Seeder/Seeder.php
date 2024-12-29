<?php

namespace App\Modules\Management\PlanDependency\PlanDepSonkhaTattikTottho\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepSonkhaTattikTottho\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepSonkhaTattikTottho\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();
        $data = [
            "3",
            "2",
            "1",
        ];

        foreach ($data as $key => $item) {
            self::$model::create([
                'title' => $item,
            ]);
        }
    }
}
