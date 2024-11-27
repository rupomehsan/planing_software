<?php

namespace App\Modules\Management\UserManagement\Role\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\UserManagement\Role\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\UserManagement\Role\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();

        $data = [
            ['title' => "super_admin", 'serial_no' => 1],
            ['title' => "department_admin", 'serial_no' => 2],
            ['title' => "department_admin_member", 'serial_no' => 3],
            ['title' => "visitor", 'serial_no' => 4],
            ['title' => "branch", 'serial_no' => 5],
            ['title' => "cp", 'serial_no' => 6],
            ['title' => "sg", 'serial_no' => 7],
        ];


        foreach ($data as $key => $item) {
            self::$model::create($item);
        }
        
    }
}
