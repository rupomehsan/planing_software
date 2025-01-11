<template>
    <div>
        <div class="row m-0 mt-3">
            <div class="col-sm-12">
                <div class="card w-100">
                    <div
                        class="card-header py-2 d-flex align-items-center justify-content-between gap-2"
                    >
                        <all-page-header />
                    </div>
                    <div class="card-body">
                        <template v-for="item in all?.data" :key="item">
                            <CardItem :data="item"></CardItem>
                        </template>
                    </div>

                    <div class="card-footer py-2">
                        <all-page-footer-actions></all-page-footer-actions>
                    </div>
                </div>
            </div>
        </div>
        <quick-view />
        <filter-data />
        <div
            class="modal fade"
            :class="`${is_show_modal ? 'show d-block' : 'd-none'}`"
            id="primarymodal"
            aria-modal="true"
        >
            <div class="modal-dialog modal-lg">
                <form @submit.prevent="SingleItemSubmitHandler">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">
                                বিভাগীয় বার্ষিক কার্যকরী পরিকল্পনা বাস্তবায়ন
                                তৈরি করুন
                            </h5>
                            <button
                                @click="is_show_modal = false"
                                type="button"
                                class="btn btn-light"
                                data-dismiss="modal"
                            >
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title">Title</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name=""
                                            id=""
                                            v-model="form_item.title"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Session</label>
                                        <select
                                            name=""
                                            class="form-select"
                                            id=""
                                            @change="
                                                updateSelectText(
                                                    'session',
                                                    $event
                                                )
                                            "
                                        >
                                            <option value="">
                                                Select session
                                            </option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in sessions"
                                                :value="item.id"
                                                :key="index"
                                                :selected="
                                                    item.id ==
                                                    form_item.session?.id
                                                "
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Select department</label>
                                        <select name="" class="form-select" id="" @change="get_department_section_by_department_id($event),updateSelectText('user_department', $event)">
                                            <option v-for="(item, index) in user_departments" :value="item.id" :key="index">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >Department Yearly plan</label
                                        >
                                        <select
                                            name=""
                                            class="form-select"
                                            id=""
                                            @change="
                                                updateSelectText(
                                                    'department_yearly_plan',
                                                    $event
                                                )
                                            "
                                        >
                                            <option value="">
                                                Select yearly Plan
                                            </option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in department_yearly_plans"
                                                :value="item.id"
                                                :key="index"
                                                :selected="
                                                    item.id ==
                                                    form_item
                                                        .department_yearly_plan
                                                        ?.id
                                                "
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >Bastobayoner mash</label
                                        >
                                        <select
                                            name=""
                                            class="form-select"
                                            id=""
                                            v-model="
                                                form_item.bastobayoner_mash
                                            "
                                        >
                                            <option value="">
                                                Select bastobayoner mash
                                            </option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in bastobayoner_mash"
                                                :value="item"
                                                :key="index"
                                            >
                                                {{ item }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Somoysimar dhoron
                                        </label>
                                        <select
                                            name=""
                                            class="form-select"
                                            id=""
                                        >
                                            <option value="">
                                                Select somoysimar dhoron
                                            </option>
                                            <option
                                                v-for="item in somoysimar_dhoron"
                                                :value="item.id"
                                                :key="item.id"
                                                :selected="
                                                    item.id ==
                                                    form_item.schedule_type?.id
                                                "
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Somoykal </label>
                                        <select
                                            name=""
                                            class="form-select"
                                            id=""
                                        >
                                            <option value="">
                                                Select somoykal
                                            </option>
                                            <option
                                                v-for="item in somoykal"
                                                :value="item.id"
                                                :key="item.id"
                                                :selected="
                                                    item.id ==
                                                    form_item.schedule?.id
                                                "
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Rating(1-10)
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name=""
                                            id=""
                                            v-model="form_item.rating"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <h4 class="border p-2">Bastobayon kari</h4>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title ">
                                            Department section
                                        </label>
                                        <select
                                            name=""
                                            class="form-select"
                                            @change="
                                                get_user_department_section_sub_section_by_section_id(
                                                    $event.target.value
                                                ),
                                                    updateSelectText(
                                                        'user_department_section',
                                                        $event
                                                    )
                                            "
                                        >
                                            <option value="">
                                                Select department section
                                            </option>
                                            <option
                                                v-for="item in user_department_sections"
                                                :value="item.id"
                                                :key="item.id"
                                                :selected="
                                                    item.id ==
                                                    form_item.department_section
                                                        ?.id
                                                "
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Department sub section
                                        </label>
                                        <select
                                            name=""
                                            class="form-select"
                                            @change="
                                                get_user_department_section_sub_section_users(
                                                    $event.target.id
                                                ),
                                                    updateSelectText(
                                                        'user_department_sub_section',
                                                        $event
                                                    )
                                            "
                                        >
                                            <option value="">
                                                Select department sub section
                                            </option>
                                            <option
                                                v-for="item in user_department_sub_sections"
                                                :value="item.id"
                                                :key="item.id"
                                                :selected="
                                                    item.id ==
                                                    form_item
                                                        .department_sub_section
                                                        ?.id
                                                "
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Department users
                                        </label>
                                        <select
                                            name=""
                                            class="form-select"
                                            @change="
                                                updateSelectText(
                                                    'user_department_sub_section_user',
                                                    $event
                                                )
                                            "
                                        >
                                            <option value="">
                                                Select department users
                                            </option>
                                            <option
                                                v-for="item in department_sub_section_users"
                                                :value="item.id"
                                                :key="item.id"
                                                :selected="
                                                    item.id ==
                                                    form_item
                                                        .department_sub_section_user
                                                        ?.id
                                                "
                                            >
                                                {{ item.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 my-2">
                                    <h4 class="mt-2 border p-2">
                                        External helper
                                    </h4>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title ">
                                            Others Departments</label
                                        >
                                        <select
                                            name=""
                                            class="form-select"
                                            @click="
                                                get_user_department_users(
                                                    $event.target.value
                                                ),
                                                    updateSelectText(
                                                        'helper_department',
                                                        $event
                                                    )
                                            "
                                        >
                                            <option value="">
                                                Select department
                                            </option>
                                            <option
                                                v-for="item in user_departments"
                                                :value="item.id"
                                                :key="item.id"
                                                :selected="
                                                    item.id ==
                                                    form_item.helper_department
                                                        ?.id
                                                "
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Others Department users</label
                                        >
                                        <select
                                            name=""
                                            class="form-select"
                                            id=""
                                            @change="
                                                updateSelectText(
                                                    'helper_department_user',
                                                    $event
                                                )
                                            "
                                        >
                                            <option value="">
                                                Select department users
                                            </option>
                                            <option
                                                v-for="item in department_users"
                                                :value="item.id"
                                                :key="item.id"
                                                :selected="
                                                    item.id ==
                                                    form_item
                                                        .helper_department_user
                                                        ?.id
                                                "
                                            >
                                                {{ item.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Plan Details</label>
                                        <textarea
                                            name=""
                                            class="form-control"
                                            id=""
                                            v-model="form_item.description"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-download"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
/** plugins */
import { mapActions, mapWritableState } from "pinia";
import { store as data_store } from "../store/index";
import { auth_store } from "../../../../../../GlobalStore/auth_store";
import setup from "../setup";
/** helper and actions */
import get_all_data from "../store/async_actions/all";
/** components */
import AllPageHeader from "../components/all_data_page/AllPageHeader.vue";
import AllPageFooterActions from "../components/all_data_page/AllPageFooterActions.vue";
import CardItem from "../components/todo_list/CardItem.vue";
import QuickView from "../components/canvas/QuickView.vue";
import FilterData from "../components/canvas/FilterData.vue";
/** end */
export default {
    data: () => ({
        setup,

        is_show_modal: false,

        department_yearly_plans: [],
        sessions: [],

        user_departments: [],
        user_department_sections: [],
        user_department_sub_sections: [],
        department_sub_section_users: [],
        department_users: [],

        plan_categories: [],
        somoysimar_dhoron: [],
        somoykal: [],

        bastobayoner_mash: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ],

        central_yearly_plans: [],

        form_data: [],
        form_item: {
            title: "",
            session: { id: null, title: null },
            department_yearly_plan: { id: null, title: null },

            bastobayoner_mash: "",
            schedule_type: { id: null, title: null },
            schedule: { id: null, title: null },
            rating: "",

            department_section: { id: null, title: null },
            department_sub_section: { id: null, title: null },
            department_sub_section_user: { id: null, title: null },

            helper_department: { id: null, title: null },
            helper_department_user: { id: null, title: null },

            plan_details: "",
        },
        edit_item: null,
        user_department_section_id: null,
    }),
    created: async function () {
        await this.get_all_data();

        await this.get_all_department_yearly_plans();
        await this.get_all_sessions();
        await this.get_all_somoysimar_dhoron();
        await this.get_all_somoykal();
        await this.get_all_user_departments();
        await this.get_all_department_section_by_department_id(
            this.auth_info.id
        );
    },
    methods: {
        ...mapActions(data_store, [
            "set_page", // needs in pagination props
            "set_paginate", // needs in pagination props
            "set_item", // needs in pagination props
            "set_only_latest_data", // needs in pagination props
            "details", // needs in pagination props
            "destroy", // needs in pagination props
            "update",
            "get_all",
        ]),

        get_all_data,

        editItem: async function (id) {
            await this.details(id);

            if (this.item) {
                this.form_item = this.item;
                this.get_user_department_section_sub_section_by_section_id(
                    this.form_item.department_section.id
                );

                this.get_user_department_section_sub_section_users(
                    this.form_item.department_sub_section.id
                );

                this.get_user_department_users(
                    this.form_item.helper_department.id
                );

                this.is_show_modal = true;
            }

            console.log(this.form_item);
        },
        deleteItem: async function (item) {
            let con = await window.s_confirm("Permanently delete");
            if (con) {
                this.set_item(item);
                this.set_only_latest_data(true);

                let res = await this.destroy();
                await this.get_all();
                if (res.data.status == "success") {
                    window.s_alert("Permanently deleted.");
                }

                this.set_only_latest_data(false);
            }
        },

        get_all_sessions: async function () {
            let response = await axios.get("plan-dep-sessions?get_all=1");
            if (response.data.status == "success") {
                this.sessions = response.data.data;
            }
        },
        get_all_department_yearly_plans: async function () {
            let response = await axios.get("department-yearly-plans?get_all=1");
            if (response.data.status == "success") {
                this.department_yearly_plans = response.data.data;
            }
        },
        get_all_somoysimar_dhoron: async function () {
            let response = await axios.get("plan-dep-schedule-types?get_all=1");
            if (response.data.status == "success") {
                this.somoysimar_dhoron = response.data.data;
            }
        },
        get_all_somoykal: async function () {
            let response = await axios.get("plan-dep-schedules?get_all=1");
            if (response.data.status == "success") {
                this.somoykal = response.data.data;
            }
        },
        get_all_sonkhatattik_totthos: async function () {
            let response = await axios.get(
                "plan-dep-sonkha-tattik-totthos?get_all=1"
            );
            if (response.data.status == "success") {
                this.sonkhatattik_totthos = response.data.data;
            }
        },

        get_plan_categories: async function () {
            let response = await axios.get("plan-dep-categories?get_all=1");
            if (response.data.status == "success") {
                this.plan_categories = response.data.data;
            }
        },

        get_all_orgitobbo_target: async function () {
            let response = await axios.get(
                "plan-dep-orjitobbo-targets?get_all=1"
            );
            if (response.data.status == "success") {
                this.orgitobbo_target = response.data.data;
            }
        },

        get_all_user_departments: async function () {
            let response = await axios.get("user-departments?get_all=1");
            if (response.data.status == "success") {
                this.user_departments = response.data.data;
            }
        },
        get_all_central_plans: async function () {
            let response = await axios.get("central-yearly-plans?get_all=1");
            if (response.data.status == "success") {
                this.central_yearly_plans = response.data.data;
            }
        },
        get_all_department_section_by_department_id: async function (
            user_department_id
        ) {
            let response = await axios.get(
                `user-department-sections?get_all=1&user_department_id=${user_department_id}`
            );
            if (response.data.status == "success") {
                this.user_department_sections = response.data.data;
            }
        },

        get_user_department_section_sub_section_by_section_id: async function (
            id
        ) {
            this.user_department_section_id = id;
            let response = await axios.get(
                `user-department-sub-sections?get_all=1&user_department_section_id=${id}`
            );
            if (response.data.status == "success") {
                this.user_department_sub_sections = response.data.data;
            }
        },

        get_user_department_section_sub_section_users: async function (id) {
            let response = await axios.get(
                `users?get_all=1&user_department_id=${this.auth_info.id}&user_department_section_id=${this.user_department_section_id}&user_department_sub_section_id=${id}`
            );
            if (response.data.status == "success") {
                this.department_sub_section_users = response.data.data;
            }
        },

        get_user_department_users: async function (id) {
            let response = await axios.get(
                `users?get_all=1&user_department_id=${id}`
            );
            if (response.data.status == "success") {
                this.department_users = response.data.data;
            }
        },
    },
    computed: {
        ...mapWritableState(data_store, {
            all: "all",
            item: "item",
        }),

        ...mapWritableState(auth_store, {
            auth_info: "auth_info",
        }),
    },
    components: {
        AllPageHeader,
        AllPageFooterActions,
        CardItem,
        QuickView,
        FilterData,
    },
};
</script>
