import setup from ".";
import All from "../pages/All.vue";
import Form from "../pages/Form.vue";
import Details from "../pages/Details.vue";
import Layout from "../pages/Layout.vue";

let route_prefix = setup.route_prefix;

const routes =
{
    path: '/categories',
    component: Layout,
    children: [
        {
            path: '',
            name: "All" + route_prefix,
            component: All,
        },
        {
            path: "create",
            name: "Create" + route_prefix,
            component: Form,
        },
        {
            path: ":id",
            name: "Details" + route_prefix,
            component: Details,
        },
        {
            path: "edit/:id",
            name: "Edit" + route_prefix,
            component: Form,
        },

    ]
};


export default routes;
