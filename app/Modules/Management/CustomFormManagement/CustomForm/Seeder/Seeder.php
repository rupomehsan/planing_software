<?php
namespace App\Modules\Management\CustomFormManagement\CustomForm\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\CustomFormManagement\CustomForm\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\CustomFormManagement\CustomForm\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'title' => $faker->text(50),
                'url' => $faker->sentence,
                'start_date' => $faker->dateTime,
                'end_date' => $faker->dateTime,
            ]);
        }
    }
}