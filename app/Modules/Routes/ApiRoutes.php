<?php

use Illuminate\Support\Facades\Route;




    /*
|--------------------------------------------------------------------------
| Auth Management Module
|--------------------------------------------------------------------------
*/
    include_once base_path("app/Modules/Management/Auth/Routes/Route.php");
    /*
|--------------------------------------------------------------------------
| User Management Module
|--------------------------------------------------------------------------
*/

    include_once base_path("app/Modules/Management/UserManagement/Role/Routes/Route.php");
    include_once base_path("app/Modules/Management/UserManagement/User/Routes/Route.php");


    include_once base_path("app/Modules/Management/SettingManagement/WebsiteSettings/Routes/Route.php");
    include_once base_path("app/Modules/Management/UserManagement/UserDepartment/Routes/Route.php");
    include_once base_path("app/Modules/Management/UserManagement/UserDepartmentSection/Routes/Route.php");
    include_once base_path("app/Modules/Management/UserManagement/UserDepartmentSubSection/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanDependency/PlanDepDofas/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanDependency/PlanDepOrjitobboTarget/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanDependency/PlanDepCategory/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanDependency/PlanDepSonkhaTattikTottho/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanDependency/PlanDepScheduleType/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanDependency/PlanDepSchedule/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanDependency/PlanDepPlanType/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanManagement/CentralPlan/CentralYearlyPlan/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanManagement/CentralPlan/CentralYearlyExicutivePlan/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanManagement/CentralPlan/CentralMonthlyPlan/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanManagement/DepartmentPlan/DepartmentYearlyPlan/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanManagement/DepartmentPlan/DepartmentYearlyExicutivePlan/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanManagement/DepartmentPlan/DepartmentMonthlyPlan/Routes/Route.php");
    include_once base_path("app/Modules/Management/CustomFormManagement/CustomForm/Routes/Route.php");
    include_once base_path("app/Modules/Management/CustomFormManagement/CustomFormFields/Routes/Route.php");
    include_once base_path("app/Modules/Management/CustomFormManagement/CustomFormFieldSubmition/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanBudgetManagement/PlanBudgetSubCategory/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanBudgetManagement/PlanBudget/Routes/Route.php");
    include_once base_path("app/Modules/Management/PlanBudgetManagement/PlanBudgetCategory/Routes/Route.php");
include_once base_path("app/Modules/Management/PlanDependency/PlanDepSession/Routes/Route.php");
