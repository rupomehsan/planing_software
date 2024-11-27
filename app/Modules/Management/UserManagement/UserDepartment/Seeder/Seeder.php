<?php

namespace App\Modules\Management\UserManagement\UserDepartment\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\UserManagement\UserDepartment\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\UserManagement\UserDepartment\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();
        $data = [
            ['title' => "planing", 'serial_no' => 1],
            ['title' => "it", 'serial_no' => 2],
            ['title' => "sahitto", 'serial_no' => 3],
            ['title' => "prokasona", 'serial_no' => 4],
            ['title' => "bm", 'serial_no' => 5],
        ];

        foreach ($data as $item) {
            self::$model::create($item);
        }
    }
}
