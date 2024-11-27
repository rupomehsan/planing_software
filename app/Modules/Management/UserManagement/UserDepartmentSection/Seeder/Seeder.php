<?php

namespace App\Modules\Management\UserManagement\UserDepartmentSection\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\UserManagement\UserDepartmentSection\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\UserManagement\UserDepartmentSection\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        $serial_no = 1;
        self::$model::truncate();
        $departmentIds = [
            'it' => 2,
            'prokasona' => 4,
        ];

        $dataSets = [
            $departmentIds['it'] => ["development", "graphics", "digital-marketing"],
            $departmentIds['prokasona'] => ["sales", "account", "production"],
        ];

        foreach ($dataSets as $departmentId => $titles) {
            foreach ($titles as $title) {
                self::$model::create([
                    'user_department_id' => $departmentId,
                    'title' => $title,
                    'serial_no' => $serial_no++,
                ]);
            }
        }
    }
}
