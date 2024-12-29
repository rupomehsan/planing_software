<?php

namespace App\Modules\Management\PlanDependency\PlanDepSchedule\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanDependency\PlanDepSchedule\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanDependency\PlanDepSchedule\Models\Model::class;
    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();
        $data = [
            "robibar,mongol,brihospity(12pm-5pm)",
            "robibar,mongol,brihospity(8pm-11pm),",
        ];
        foreach ($data as $key => $item) {
            self::$model::create([
                'plan_dep_schedule_type_id' => rand(1, 3),
                'title' => $item,
                'start_date' => $faker->dateTime,
                'end_date' => $faker->dateTime,
            ]);
        }
    }
}
