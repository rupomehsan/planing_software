const prefix = 'User';
const setup = {
    prefix,
    module_name: 'user',

    route_prefix: 'user',

    api_host: location.origin,
    api_prefix: 'user',

    store_prefix: 'user',
    layout_title: prefix + ' Management',

    all_page_title: 'All ' + prefix,
    details_page_title: 'Details ' + prefix,
    create_page_title: 'Create ' + prefix,
    edit_page_title: 'Edit ' + prefix,
};

export default setup;
