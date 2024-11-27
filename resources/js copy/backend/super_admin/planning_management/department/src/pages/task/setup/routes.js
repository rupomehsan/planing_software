import setup from ".";
import All from "../All.vue";
import Form from "../Form.vue";
import Details from "../Details.vue";
import Edit from "../Edit.vue";
import Assign from "../Assign.vue";
import Layout from "../Layout.vue";

let route_prefix = setup.route_prefix;

const routes =
{
    path: '/tasks',
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
            component: Edit,
        },
        {
            path: "assign/:id",
            name: "Assign" + route_prefix,
            component: Assign,
        },

    ]
};


export default routes;
