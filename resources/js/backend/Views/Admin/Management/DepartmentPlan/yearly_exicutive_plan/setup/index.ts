import app_config from "../../../../../../Config/app_config";
import setup_type from "./setup_type";

const prefix: string = "বার্ষিক পরিকল্পনা বাস্তবায়ন";
const setup: setup_type = {
    prefix,
    permission: [`admin`, `super_admin`],

    api_host: app_config.api_host,
    api_version: app_config.api_version,
    api_end_point: "department-yearly-exicutive-plans",

    module_name: "department_yearly_exicutive_plans",
    route_prefix: `department_yearly_exicutive_plans`,
    store_prefix: "department_yearly_exicutive_plans",
    route_path: "department-yearly-exicutive-plans",

    select_fields: [
        "id",
        "title",
        "session_id",
        "department_yearly_plan_id",
        "department_id",
        "department_section_id",
        "department_sub_section_id",
        "helper_department_id",
        "helper_department_user_id",
        "plan_dep_schedule_type_id",
        "plan_dep_schedule_id",
        "bastobayoner_mash",
        "description",
        "rating",
        "slug",
        "created_at",
        "status",
    ],

    sort_by_cols: ["id", "title", "slug", "created_at", "status"],
    table_header_data: ["id", "title", "description", "status"],
    table_row_data: ["id", "title", "description", "status"],

    layout_title: prefix + " Management",
    page_title: `${prefix} Management`,
    all_page_title: "সকল " + prefix,
    details_page_title: "বিস্তারিত " + prefix,
    create_page_title: "তৈরি " + prefix,
    edit_page_title: "সম্পাদন " + prefix,
};

export default setup;
