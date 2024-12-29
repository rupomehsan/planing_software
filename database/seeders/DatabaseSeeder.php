<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Modules\Management\PlanDependency\PlanDepCategory\Seeder\Seeder as PlanDepCategory;
use App\Modules\Management\PlanDependency\PlanDepDofas\Seeder\Seeder as PlanDepDofas;
use App\Modules\Management\PlanDependency\PlanDepOrjitobboTarget\Seeder\Seeder as PlanDepOrjitobboTarget;
use App\Modules\Management\PlanDependency\PlanDepPlanType\Seeder\Seeder as PlanDepPlanType;
use App\Modules\Management\PlanDependency\PlanDepSchedule\Seeder\Seeder as PlanDepSchedule;
use App\Modules\Management\PlanDependency\PlanDepScheduleType\Seeder\Seeder as PlanDepScheduleType;
use App\Modules\Management\PlanDependency\PlanDepSonkhaTattikTottho\Seeder\Seeder as PlanDepSonkhaTattikTottho;
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
      /**
       * User Management .
       */
      UserRoleSeeder::class,
      UserDepartmentSeeder::class,
      UserDepartmentSectionSeeder::class,
      UserDepartmentSubSectionSeeder::class,
      UserSeeder::class,
      /**
       * Plan Dependency.
       */
      PlanDepCategory::class,
      PlanDepDofas::class,
      PlanDepPlanType::class,
      PlanDepSchedule::class,
      PlanDepScheduleType::class,
      /**
     * Plan Dependency.
     */
    ]);
  }
}
