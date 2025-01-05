import app_config from '../../../../../../Config/app_config';
import setup_type from './setup_type';

const prefix: string = 'বাজেট ব্যয়';
const setup: setup_type = {
    prefix,
    permission: [`admin`, `super_admin`],

    api_host: app_config.api_host,
    api_version: app_config.api_version,
    api_end_point: 'plan-dep-dofas',

    module_name: 'expense',
    route_prefix: `expense`,
    store_prefix: 'expense',
    route_path: "expense",

    select_fields: ['id', 'title', 'description', 'slug', 'created_at', 'status'],
    sort_by_cols: ['id', 'title', 'slug', 'created_at', 'status'],
    table_header_data: ['id', 'title', 'description', 'status'],
    table_row_data: ['id', 'title', 'description', 'status'],


    layout_title: prefix + ' Management',
    page_title: `${prefix} Management`,
    all_page_title: 'সকল ' + prefix,
    details_page_title: 'বিস্তারিত ' + prefix,
    create_page_title: 'তৈরি ' + prefix,
    edit_page_title: 'সম্পাদন ' + prefix,
};

export default setup;
