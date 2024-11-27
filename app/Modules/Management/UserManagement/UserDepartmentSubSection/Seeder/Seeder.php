<?php

namespace App\Modules\Management\UserManagement\UserDepartmentSubSection\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\UserManagement\UserDepartmentSubSection\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\UserManagement\UserDepartmentSubSection\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();
        $serial_no = 1;

        $departmentIds = [
            'it' => 2,
            'prokasona' => 4,
        ];

        $departmentSectionIds = [
            'development' => 1,
            'graphics' => 2,
        ];

        $dataSets = [
            $departmentIds['it'] => [
                $departmentSectionIds['development'] => ["web", "app"],
                $departmentSectionIds['graphics'] => ["content", "sercular"],
            ],
        ];

        foreach ($dataSets as $departmentId => $sections) {
            foreach ($sections as $sectionId => $titles) {
                foreach ($titles as $title) {
                    self::$model::create([
                        'user_department_id' => $departmentId,
                        'user_department_section_id' => $sectionId,
                        'title' => $title,
                        'serial_no' => $serial_no++,
                    ]);
                }
            }
        }
    }
}
