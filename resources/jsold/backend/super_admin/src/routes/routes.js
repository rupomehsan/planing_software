import { createRouter, createWebHashHistory } from 'vue-router'

import MainLayout from '../layout/MainLayout.vue';
import Dashboard from '../pages/Dashboard.vue';


import user from '../pages/user/config/routes';
import user_management from "../pages/user_management/setup/routes";
//report_setup
import porikolponar_dhoron from '../pages/report_setup/porikolponar_dhoron/setup/routes';
import orjitobbo_target from '../pages/report_setup/orjitobbo_target/setup/routes';
import dofa from '../pages/report_setup/dofa/setup/routes';
import time_frame_type from '../pages/report_setup/time_frame_type/setup/routes';
import time_duration from '../pages/report_setup/time_duration/setup/routes';
import month_management from '../pages/report_setup/month_management/setup/routes';

//kendro
import barsik_porikolpona from '../pages/kendro/barshik_porikolpona/setup/routes';
import barshik_karjokori_porikolpona from '../pages/kendro/barshik_karjokori_porikolpona/setup/routes';

//bivag_management
import bivag_section from '../pages/bivag_management/bivag_section/setup/routes';
import bivag_sub_section from '../pages/bivag_management/bivag_sub_section/setup/routes';
import bivag from '../pages/bivag_management/bivag/setup/routes';
import bivag_role from '../pages/bivag_management/bivag_role/setup/routes';
import bivag_member from '../pages/bivag_management/bivag_member/setup/routes';

//bivag
import bivagio_barshik_porikolpona from '../pages/bivag/bivagio_barshik_porikolpona/setup/routes';
import bivagio_barshik_karjokori_porikolpona from '../pages/bivag/bivagio_barshik_karjokori_porikolpona/setup/routes';
import bivagio_karjokori_porikolpona from '../pages/bivag/bivagio_karjokori_porikolpona/setup/routes';


import task from "../pages/task/setup/routes";
// import kendrio_barshik_porikolpona from '../pages/kendrio_barshik_porikolpona/setup/routes';

// import mashik_porikolpona from '../pages/mashik_porikolpona/setup/routes';
import mashik_karjokori_porikolpona from '../pages/mashik_karjokori_porikolpona/setup/routes';
import porikolpona_bastobayoner_mashik_report from '../pages/porikolpona_bastobayoner_mashik_report/setup/routes';
import karjokori_porikolpona_bastobayoner_mashik_report from '../pages/karjokori_porikolpona_bastobayoner_mashik_report/setup/routes';
import porikolpona_bastobayoner_troimashik_shanmashik_barshik_report from '../pages/porikolpona_bastobayoner_troimashik_shanmashik_barshik_report/setup/routes';
import kendrer_porikolpona_bastobayoner_report from '../pages/kendrer_porikolpona_bastobayoner_report/setup/routes';
import bivager_porikolpona_bastobayoner_report from '../pages/bivager_porikolpona_bastobayoner_report/setup/routes';
import archive from '../pages/archive/setup/routes';
import budget_management from '../pages/budget_management/setup/routes';
// import karjokori_porikolpona from '../pages/karjokori_porikolpona/setup/routes';

// console.log(barsik_porikolpona);
const routes = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            component: MainLayout,
            children: [
                {
                    name: "dashboard",
                    path: '/dashboard',
                    component: Dashboard,
                },
                user,
                user_management,

                //report_setup
                porikolponar_dhoron,
                orjitobbo_target,
                dofa,
                time_frame_type,
                time_duration,
                month_management,

                //kendro
                barsik_porikolpona,
                barshik_karjokori_porikolpona,

                //bivag_management
                bivag_section,
                bivag_sub_section,
                bivag,
                bivag_role,
                bivag_member,

                // bivag
                bivagio_barshik_porikolpona,
                bivagio_barshik_karjokori_porikolpona,
                bivagio_karjokori_porikolpona,

                //settings
                task,


                // mashik_porikolpona,
                mashik_karjokori_porikolpona,
                porikolpona_bastobayoner_mashik_report,
                karjokori_porikolpona_bastobayoner_mashik_report,
                porikolpona_bastobayoner_troimashik_shanmashik_barshik_report,
                kendrer_porikolpona_bastobayoner_report,
                bivager_porikolpona_bastobayoner_report,
                archive,

                budget_management,
                // karjokori_porikolpona,


            ]
        },
    ]
});


export default routes;
