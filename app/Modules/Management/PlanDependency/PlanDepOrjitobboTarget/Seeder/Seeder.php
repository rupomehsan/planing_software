<?php

namespace App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();
        $dofa = [
            "dawat" => 1,
            "songothon" => 2,
            "prosikkhon" => 3,
            "islamic somajbinirman" => 4,
        ];

        $data = [
            ['plan_dep_dofa_id' => $dofa['dawat'], 'title' => "Target One", 'serial_no' => 1],
            ['plan_dep_dofa_id' => $dofa['songothon'], 'title' => "Target Two", 'serial_no' => 2],
            ['plan_dep_dofa_id' => $dofa['prosikkhon'], 'title' => "Target Three", 'serial_no' => 3],
            ['plan_dep_dofa_id' => $dofa['islamic somajbinirman'], 'title' => "Target Four", 'serial_no' => 4],
        ];

        foreach ($data as $item) {
            self::$model::create($item);
        }
    }
}
