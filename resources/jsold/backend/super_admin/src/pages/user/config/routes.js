import Layout from '../Layout.vue'
import All from '../All.vue'
import Create from '../Create.vue'
import Details from '../Details.vue'
import Edit from '../Edit.vue'
import Import from '../Import.vue'
import setup from './setup'
import CreateForm from '../pages/CreateForm.vue'

let routes = {
    path: '/' + setup.route_prefix,
    component: Layout,
    children: [
        {
            path: '',
            name: 'all-' + setup.route_prefix,
            component: All,
        },
        {
            path: 'create',
            name: 'create-' + setup.route_prefix,
            component: Create,
        },
        {
            path: 'details/:id',
            name: 'details-' + setup.route_prefix,
            component: Details,
        },
        {
            path: 'edit/:id',
            name: 'edit-' + setup.route_prefix,
            component: Edit,
            props: true,
        },
        {
            path: 'import',
            name: 'import-' + setup.route_prefix,
            component: Import,
        }
    ]
}

export default routes;
