import app_config from '../../../app_config';
import setup_type from './setup_type';

const prefix: string = 'Porikolpona Bastobayoner Troimashik/Shanmashik/Barshik Report';
const setup: setup_type = {
    prefix,
    permission: [`admin`,`super_admin`],

    api_host: app_config.api_host,
    api_version: app_config.api_version,
    api_end_point: 'porikolpona-bastobayoner-troimashik-shanmashik-barshik-reports',

    module_name: 'porikolpona_bastobayoner_troimashik_shanmashik_barshik_report',
    route_prefix: `porikolpona_bastobayoner_troimashik_shanmashik_barshik_report`,
    store_prefix: 'porikolpona_bastobayoner_troimashik_shanmashik_barshik_report',

    select_fields: ['id', 'slug','created_at', 'status'],
    sort_by_cols: ['id', 'slug','created_at', 'status'],

    layout_title: prefix + ' Management',
    page_title: `${prefix} Management`,
    all_page_title: 'All ' + prefix,
    details_page_title: 'Details ' + prefix,
    create_page_title: 'Create ' + prefix,
    edit_page_title: 'Edit ' + prefix,
};

export default setup;
