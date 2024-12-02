import app_config from '../../../../../../Config/app_config';
import setup_type from './setup_type';

const prefix: string = 'বার্ষিক পরিকল্পনা';
const setup: setup_type = {
    prefix,
    permission: [`admin`, `super_admin`],

    api_host: app_config.api_host,
    api_version: app_config.api_version,
    api_end_point: 'department-yearly-plans',

    module_name: 'department_yearly_plans',
    route_prefix: `department_yearly_plans`,
    store_prefix: 'department_yearly_plans',
    route_path: 'department-yearly-plans',

    select_fields: ['id', 'slug', 'created_at', 'status'],
    sort_by_cols: ['id', 'slug', 'created_at', 'status'],
    table_header_data: ['id', 'status'],
    table_row_data: ['id', 'status'],


    layout_title: prefix + ' Management',
    page_title: `${prefix} Management`,
    all_page_title: 'সকল ' + prefix,
    details_page_title: 'বিস্তারিত ' + prefix,
    create_page_title: 'তৈরি ' + prefix,
    edit_page_title: 'সম্পাদন ' + prefix,
};

export default setup;
