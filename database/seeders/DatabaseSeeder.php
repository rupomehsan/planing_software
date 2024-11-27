<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Modules\Management\UserManagement\Role\Seeder\Seeder as UserRoleSeeder;
use App\Modules\Management\UserManagement\UserDepartment\Seeder\Seeder as UserDepartmentSeeder;
use App\Modules\Management\UserManagement\UserDepartmentSection\Seeder\Seeder as UserDepartmentSectionSeeder;
use App\Modules\Management\UserManagement\UserDepartmentSubSection\Seeder\Seeder as UserDepartmentSubSectionSeeder;
use App\Modules\Management\UserManagement\User\Seeder\Seeder as UserSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
          UserRoleSeeder::class,
          UserDepartmentSeeder::class,
          UserDepartmentSectionSeeder::class,
          UserDepartmentSubSectionSeeder::class,
          UserSeeder::class,
        ]);

    }
}
