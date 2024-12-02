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
import UserRoutes from '../Management/user_management/setup/routes.js';
/*
|--------------------------------------------------------------------------
| Plan Dependency Routes
|--------------------------------------------------------------------------
*/
import dofa_routes from '../Management/PlanDependency/dofa/setup/routes.js';
import orjitobbo_target_routes from '../Management/PlanDependency/orjitobbo_target/setup/routes';
import category_routes from '../Management/PlanDependency/category/setup/routes';
import mash_bebosthapona_routes from '../Management/PlanDependency/mash_bebosthapona/setup/routes';
import porikolponar_dhoron_routes from '../Management/PlanDependency/porikolponar_dhoron/setup/routes';
import somoykal_routes from '../Management/PlanDependency/somoykal/setup/routes';
import somoysimar_dhoron_routes from '../Management/PlanDependency/somoysimar_dhoron/setup/routes';
import sonkha_tattik_tottho_routes from '../Management/PlanDependency/sonkha_tattik_tottho/setup/routes';
import plan_type_routes from '../Management/PlanDependency/plan_type/setup/routes';
/*
|--------------------------------------------------------------------------
| Central(kendro) Plan Management Routes
|--------------------------------------------------------------------------
*/
import central_yearly_plan from '../Management/CentralPlan/yearly_plan/setup/routes';
import central_yearly_exicutive_plan from '../Management/CentralPlan/yearly_exicutive_plan/setup/routes';
/*
|--------------------------------------------------------------------------
| Department Plan Management Routes
|--------------------------------------------------------------------------
*/
import department_yearly_plan from '../Management/DepartmentPlan/yearly_plan/setup/routes';
import department_yearly_exicutive_plan from '../Management/DepartmentPlan/yearly_exicutive_plan/setup/routes';




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
        dofa_routes,
        orjitobbo_target_routes,
        sonkha_tattik_tottho_routes,
        category_routes,
        mash_bebosthapona_routes,
        porikolponar_dhoron_routes,
        somoykal_routes,
        somoysimar_dhoron_routes,
        plan_type_routes,
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
        | User Management Routes
        |--------------------------------------------------------------------------
        */
        UserRoutes,
    ],
};

export default routes;

