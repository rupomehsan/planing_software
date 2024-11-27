<?php
namespace App\Modules\Management\CustomFormManagement\CustomFormFields\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\CustomFormManagement\CustomFormFields\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\CustomFormManagement\CustomFormFields\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'custom_form_id' => null,
                'title' => $faker->text(50),
                'type' => $faker->randomElement(array (
  0 => 'text',
  1 => 'textarea',
  2 => 'file',
)),
                'select_options' => json_encode([$faker->word, $faker->word]),
            ]);
        }
    }
}