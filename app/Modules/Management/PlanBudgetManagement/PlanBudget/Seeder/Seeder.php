<?php
namespace App\Modules\Management\PlanBudgetManagement\PlanBudget\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\PlanBudgetManagement\PlanBudget\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\PlanBudgetManagement\PlanBudget\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        for ($i = 1; $i <= 100; $i++) {
            self::$model::create([                'central_yearly_plan_id' => null,
                'central_yearly_executive_plan_id' => null,
                'department_yearly_plan_id' => null,
                'department_yearly_executive_plan_id' => null,
                'department_id' => null,
                'department_section_id' => null,
                'department_sub_section_id' => null,
                'date' => $faker->dateTime,
                'rating' => null,
                'amount' => $faker->randomFloat(2, 0, 1000),
                'type' => $faker->sentence,
                'plan_budget_category_id' => null,
                'plan_budget_sub_category_id' => null,
            ]);
        }
    }
}