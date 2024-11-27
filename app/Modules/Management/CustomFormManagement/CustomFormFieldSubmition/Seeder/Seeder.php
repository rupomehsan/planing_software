<?php
namespace App\Modules\Management\CustomFormManagement\CustomFormFieldSubmition\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\CustomFormManagement\CustomFormFieldSubmition\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\CustomFormManagement\CustomFormFieldSubmition\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'custom_form_id' => null,
                'custom_form_field_id' => null,
                'value' => $faker->sentence,
                'field_ttile' => $faker->sentence,
            ]);
        }
    }
}