import app_config from '../../../../../../Config/app_config';
import setup_type from './setup_type';

const prefix: string = 'বিভাগ সদস্য';
const setup: setup_type = {
    prefix,
    permission: [`admin`, `super_admin`],

    api_host: app_config.api_host,
    api_version: app_config.api_version,
    api_end_point: 'plan-dep-plan-types',

    module_name: 'members',
    route_prefix: `DepartmentMember`,
    store_prefix: 'members',
    route_path: "members",

    select_fields: ['id', 'title', 'description', 'start_date', 'end_date', 'slug', 'created_at', 'status'],
    sort_by_cols: ['id', 'title', 'slug', 'created_at', 'status'],
    table_header_data: ['id', 'title', 'start_date', 'end_date', 'description', 'status'],
    table_row_data: ['id', 'title', 'start_date', 'end_date', 'description', 'status'],


    layout_title: prefix + ' Management',
    page_title: `${prefix} Management`,
    all_page_title: 'সকল ' + prefix,
    details_page_title: 'বিস্তারিত ' + prefix,
    create_page_title: 'তৈরি ' + prefix,
    edit_page_title: 'সম্পাদন ' + prefix,
};

export default setup;
