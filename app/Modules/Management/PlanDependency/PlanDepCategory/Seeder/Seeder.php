<?php

namespace App\Modules\Management\PlanDependency\PlanDepCategory\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepCategory\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepCategory\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        $data = [
            ['title' => "niyomito kaj", 'serial_no' => 1],
            ['title' => "dealine vittik kaj", 'serial_no' => 2],
            ['title' => "lokhomatra vittik kaj", 'serial_no' => 3],
            ['title' => "motivation", 'serial_no' => 4],
            ['title' => "schedule vittik kaj", 'serial_no' => 5],
        ];


        foreach ($data as $item) {
            self::$model::create($item);
        }

    }
}
