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
import dofa_routes from '../Management/plan_dep/dofa/setup/routes.js';
import orjitobbo_target_routes from '../Management/plan_dep/orjitobbo_target/setup/routes';
import category_routes from '../Management/plan_dep/category/setup/routes';
import mash_bebosthapona_routes from '../Management/plan_dep/mash_bebosthapona/setup/routes';
import porikolponar_dhoron_routes from '../Management/plan_dep/porikolponar_dhoron/setup/routes';
import somoykal_routes from '../Management/plan_dep/somoykal/setup/routes';
import somoysimar_dhoron_routes from '../Management/plan_dep/somoysimar_dhoron/setup/routes';
import sonkha_tattik_tottho_routes from '../Management/plan_dep/sonkha_tattik_tottho/setup/routes';
/*
|--------------------------------------------------------------------------
| Central(kendro) Plan Management Routes
|--------------------------------------------------------------------------
*/
// import barsik_porikolpona from '../Management/kendro/barshik_porikolpona/setup/routes';
// import barshik_karjokori_porikolpona from '../Management/kendro/barshik_karjokori_porikolpona/setup/routes';

// //bivag_management
// import bivag_section from '../Management/bivag_management/bivag_section/setup/routes';
// import bivag_sub_section from '../Management/bivag_management/bivag_sub_section/setup/routes';
// import bivag from '../Management/bivag_management/bivag/setup/routes';
// import bivag_role from '../Management/bivag_management/bivag_role/setup/routes';
// import bivag_member from '../Management/bivag_management/bivag_member/setup/routes';

// //bivag
// import bivagio_barshik_porikolpona from '../Management/bivag/bivagio_barshik_porikolpona/setup/routes';
// import bivagio_barshik_karjokori_porikolpona from '../Management/bivag/bivagio_barshik_karjokori_porikolpona/setup/routes';
// import bivagio_karjokori_porikolpona from '../Management/bivag/bivagio_karjokori_porikolpona/setup/routes';


// import task from "../Management/task/setup/routes";
// // import kendrio_barshik_porikolpona from '../Management/kendrio_barshik_porikolpona/setup/routes';

// // import mashik_porikolpona from '../Management/mashik_porikolpona/setup/routes';
// import mashik_karjokori_porikolpona from '../Management/mashik_karjokori_porikolpona/setup/routes';
// import porikolpona_bastobayoner_mashik_report from '../Management/porikolpona_bastobayoner_mashik_report/setup/routes';
// import karjokori_porikolpona_bastobayoner_mashik_report from '../Management/karjokori_porikolpona_bastobayoner_mashik_report/setup/routes';
// import porikolpona_bastobayoner_troimashik_shanmashik_barshik_report from '../Management/porikolpona_bastobayoner_troimashik_shanmashik_barshik_report/setup/routes';
// import kendrer_porikolpona_bastobayoner_report from '../Management/kendrer_porikolpona_bastobayoner_report/setup/routes';
// import bivager_porikolpona_bastobayoner_report from '../Management/bivager_porikolpona_bastobayoner_report/setup/routes';
// import archive from '../Management/archive/setup/routes';
// import budget_management from '../Management/budget_management/setup/routes';
// import karjokori_porikolpona from '../Management/karjokori_porikolpona/setup/routes';



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
        UserRoutes,
        dofa_routes,
        orjitobbo_target_routes,
        sonkha_tattik_tottho_routes,
        category_routes,
        mash_bebosthapona_routes,
        porikolponar_dhoron_routes,
        somoykal_routes,
        somoysimar_dhoron_routes,
        /*
        |--------------------------------------------------------------------------
        | Settings Routes
        |--------------------------------------------------------------------------
        */
        //settings
        // SettingsRoutes,
        /*
        |--------------------------------------------------------------------------
        | Central(kendro) Plan Management Routes
        |--------------------------------------------------------------------------
        */
        // barsik_porikolpona,
        // barshik_karjokori_porikolpona,

        // //bivag_management
        // bivag_section,
        // bivag_sub_section,
        // bivag,
        // bivag_role,
        // bivag_member,

        // // bivag
        // bivagio_barshik_porikolpona,
        // bivagio_barshik_karjokori_porikolpona,
        // bivagio_karjokori_porikolpona,

        // //settings
        // task,


        // // mashik_porikolpona,
        // mashik_karjokori_porikolpona,
        // porikolpona_bastobayoner_mashik_report,
        // karjokori_porikolpona_bastobayoner_mashik_report,
        // porikolpona_bastobayoner_troimashik_shanmashik_barshik_report,
        // kendrer_porikolpona_bastobayoner_report,
        // bivager_porikolpona_bastobayoner_report,
        // archive,

        // budget_management,
        // karjokori_porikolpona,
    ],
};

export default routes;

