<?php

namespace App\Modules\Management\UserManagement\User\Seeder;

use Illuminate\Database\Seeder as SeederClass;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\Management\UserManagement\User\Seeder\Seeder"
     */
    static $model = \App\Modules\Management\UserManagement\User\Models\Model::class;

    public function run(): void
    {
        $faker = Faker::create();
        self::$model::truncate();
        $userrole = [
            "super_admin" => 1,
            "department_admin" => 2,
            "department_admin_member" => 3,
            "visitor" => 4,
            "branch" => 5,
            "cp" => 6,
            "sg" => 7,
        ];

        $users = [
            [
                'name' => "super admin",
                'email' => "superadmin@gmail.com",
                'user_role_id' => $userrole["super_admin"],
            ],
            [
                'name' => "department_admin",
                'email' => "department_admin@gmail.com",
                'user_role_id' => $userrole["department_admin"],
            ],
            [
                'name' => "department_member",
                'email' => "department_member@gmail.com",
                'user_role_id' => $userrole["department_admin_member"],
            ],
            [
                'name' => "visitor",
                'email' => "visitor@gmail.com",
                'user_role_id' => $userrole["visitor"],
            ],
            [
                'name' => "branch",
                'email' => "branch@gmail.com",
                'user_role_id' => $userrole["branch"],
            ],
            [
                'name' => "cp",
                'email' => "cp@gmail.com",
                'user_role_id' => $userrole["cp"],
            ],
            [
                'name' => "sg",
                'email' => "sg@gmail.com",
                'user_role_id' => $userrole["sg"],
            ],
        ];


        foreach ($users as $user) {
            self::$model::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'user_role_id' => $user['user_role_id'],
                'password' => Hash::make('@12345678'),
                'image' => 'avatar.png',
            ]);
        }
    }
}
