<?php

namespace App\Modules\Management\PlanDependency\PlanDepSession\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepSession\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepSession\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        $data = [
            'nov-25-nov-26',
            'nov-26-nov-27',
            'nov-27-nov-28',
        ];

        foreach ($data as $key => $item) {
            self::$model::create([
                'title' => $item,
                'serial' => $key + 1,
            ]);
        }
    }
}
