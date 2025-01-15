import app_config from "../../../../../../Config/app_config";
import setup_type from "./setup_type";

const prefix: string = "সেশন";
const setup: setup_type = {
    prefix,
    permission: [`admin`, `super_admin`],

    api_host: app_config.api_host,
    api_version: app_config.api_version,
    api_end_point: "plan-dep-sessions",

    module_name: "session",
    route_prefix: `session`,
    store_prefix: "session",
    route_path: "session",

    select_fields: ["id", "title", "slug", "created_at", "status", "serial"],
    sort_by_cols: ["id", "title", "slug", "created_at", "status", "serial"],
    table_header_data: ["ক্রম", "শিরোনাম", "স্ট্যাটাস"],
    table_row_data: ["serial", "title", "status"],

    layout_title: prefix + " Management",
    page_title: `${prefix} Management`,
    all_page_title: "সকল " + prefix,
    details_page_title: "বিস্তারিত " + prefix,
    create_page_title: "তৈরি " + prefix,
    edit_page_title: "সম্পাদন " + prefix,
};

export default setup;
