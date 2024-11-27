import { createRouter, createWebHashHistory } from 'vue-router'

import MainLayout from '../layout/MainLayout.vue';
import Dashboard from '../pages/Dashboard.vue';


import user from '../pages/user/config/routes';
import user_management from "../pages/user_management/setup/routes";
import task from "../pages/task/setup/routes";
import barsik_porikolpona from '../pages/barshik_porikolpona/setup/routes';
import kendrio_barshik_porikolpona from '../pages/kendrio_barshik_porikolpona/setup/routes';
import bivagio_barshik_porikolpona from '../pages/bivagio_barshik_porikolpona/setup/routes';
import barshik_karjokori_porikolpona from '../pages/barshik_karjokori_porikolpona/setup/routes';
import mashik_porikolpona from '../pages/mashik_porikolpona/setup/routes';
import mashik_karjokori_porikolpona from '../pages/mashik_karjokori_porikolpona/setup/routes';
import porikolpona_bastobayoner_mashik_report from '../pages/porikolpona_bastobayoner_mashik_report/setup/routes';
import karjokori_porikolpona_bastobayoner_mashik_report from '../pages/karjokori_porikolpona_bastobayoner_mashik_report/setup/routes';
import porikolpona_bastobayoner_troimashik_shanmashik_barshik_report from '../pages/porikolpona_bastobayoner_troimashik_shanmashik_barshik_report/setup/routes';
import kendrer_porikolpona_bastobayoner_report from '../pages/kendrer_porikolpona_bastobayoner_report/setup/routes';
import bivager_porikolpona_bastobayoner_report from '../pages/bivager_porikolpona_bastobayoner_report/setup/routes';
import archive from '../pages/archive/setup/routes';
import bivag_section from '../pages/bivag_section/setup/routes';
import bivag_sub_section from '../pages/bivag_sub_section/setup/routes';
import porikolponar_dhoron from '../pages/porikolponar_dhoron/setup/routes';
import budget_management from '../pages/budget_management/setup/routes';
import karjokori_porikolpona from '../pages/karjokori_porikolpona/setup/routes';

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
                task,
                barsik_porikolpona,
                kendrio_barshik_porikolpona,
                bivagio_barshik_porikolpona,
                barshik_karjokori_porikolpona,
                mashik_porikolpona,
                mashik_karjokori_porikolpona,
                porikolpona_bastobayoner_mashik_report,
                karjokori_porikolpona_bastobayoner_mashik_report,
                porikolpona_bastobayoner_troimashik_shanmashik_barshik_report,
                kendrer_porikolpona_bastobayoner_report,
                bivager_porikolpona_bastobayoner_report,
                archive,
                bivag_section,
                bivag_sub_section,
                porikolponar_dhoron,
                budget_management,
                karjokori_porikolpona,
            ]
        },
    ]
});


export default routes;
