/*
|--------------------------------------------------------------------------
| App  Layout
|--------------------------------------------------------------------------
*/
import Layout from "../Layouts/Layout.vue";
import Dashboard from "../Management/Dashboard/Dashboard.vue";
/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
*/
// import SettingsRoutes from "../Management/Settings/setup/routes.js";
/*
|--------------------------------------------------------------------------
| User Management Routes
|--------------------------------------------------------------------------
*/
// import UserRoutes from '../Management/user_management/setup/routes.js';
/*
|--------------------------------------------------------------------------
| Plan Dependency Routes
|--------------------------------------------------------------------------
*/
import dofa_routes from '../Management/PlanDependency/dofa/setup/routes.js';
import orjitobbo_target_routes from '../Management/PlanDependency/orjitobbo_target/setup/routes.js';
import category_routes from '../Management/PlanDependency/category/setup/routes.js';
import mash_bebosthapona_routes from '../Management/PlanDependency/mash_bebosthapona/setup/routes.js';
import porikolponar_dhoron_routes from '../Management/PlanDependency/porikolponar_dhoron/setup/routes.js';
import somoykal_routes from '../Management/PlanDependency/somoykal/setup/routes.js';
import somoysimar_dhoron_routes from '../Management/PlanDependency/somoysimar_dhoron/setup/routes.js';
import sonkha_tattik_tottho_routes from '../Management/PlanDependency/sonkha_tattik_tottho/setup/routes.js';
import plan_type_routes from '../Management/PlanDependency/plan_type/setup/routes.js';
/*
|--------------------------------------------------------------------------
| Central(kendro) Plan Management Routes
|--------------------------------------------------------------------------
*/
import central_yearly_plan from '../Management/CentralPlan/yearly_plan/setup/routes.js';
import central_yearly_exicutive_plan from '../Management/CentralPlan/yearly_exicutive_plan/setup/routes.js';
/*
|--------------------------------------------------------------------------
| Department Plan Management Routes
|--------------------------------------------------------------------------
*/
import department_yearly_plan from '../Management/DepartmentPlan/yearly_plan/setup/routes.js';
import department_yearly_exicutive_plan from '../Management/DepartmentPlan/yearly_exicutive_plan/setup/routes.js';

/*
|--------------------------------------------------------------------------
| Department Plan Management Routes
|--------------------------------------------------------------------------
*/
import department_budget_income from '../Management/DepartmentBudget/BudgetIncome/setup/routes.js';
import department_budget_expense from '../Management/DepartmentBudget/BudgetExpense/setup/routes.js';


/*
|--------------------------------------------------------------------------
| Department  Management Routes
|--------------------------------------------------------------------------
*/
import division_routes from '../Management/DepartmentManagement/division/setup/routes.js';
import division_memeber_routes from '../Management/DepartmentManagement/division_member/setup/routes.js';
import division_role_routes from '../Management/DepartmentManagement/division_role/setup/routes.js';
import section_routes from '../Management/DepartmentManagement/section/setup/routes.js';
import sub_section_routes from '../Management/DepartmentManagement/sub_section/setup/routes.js';




const routes = {
    path: '',
    component: Layout,
    children: [
        {
            path: 'dashboard',
            component: Dashboard,
            name: 'SuperAdminDashboard',
        },

        /*
        |--------------------------------------------------------------------------
        | Plan Dependency Routes
        |--------------------------------------------------------------------------
        */
        {

            path: 'plan-management',
            children: [
                dofa_routes,
                orjitobbo_target_routes,
                sonkha_tattik_tottho_routes,
                category_routes,
                mash_bebosthapona_routes,
                porikolponar_dhoron_routes,
                somoykal_routes,
                somoysimar_dhoron_routes,
                plan_type_routes,
            ],
        },
        /*
        |--------------------------------------------------------------------------
        | Central(kendro) Plan Management Routes
        |--------------------------------------------------------------------------
        */
        central_yearly_plan,
        central_yearly_exicutive_plan,
        /*
        |--------------------------------------------------------------------------
        | Department(vivag) Plan Management Routes
        |--------------------------------------------------------------------------
        */
        department_yearly_plan,
        department_yearly_exicutive_plan,
        /*
        |--------------------------------------------------------------------------
        | Department Budget  Management Routes
        |--------------------------------------------------------------------------
        */
        {
            path: 'department-management',
            children: [
                division_routes,
                division_memeber_routes,
                division_role_routes,
                section_routes,
                sub_section_routes,
            ],
        },
        /*
        |--------------------------------------------------------------------------
        | Department Budget  Management Routes
        |--------------------------------------------------------------------------
        */
        {
            path: 'department-budget',
            children: [
                department_budget_income,
                department_budget_expense,
            ],
        },

        /*
        |--------------------------------------------------------------------------
        | User Management Routes
        |--------------------------------------------------------------------------
        */
        // UserRoutes,
    ],
};

export default routes;

