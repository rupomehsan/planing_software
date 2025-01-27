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
                        <div
                            class="table-responsive table_responsive card_body_fixed_height"
                        >
                            <table
                                class="table table-hover text-center table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th class="w-10">
                                            <span class="icon"></span>
                                        </th>
                                        <th class="w-10">id</th>
                                        <th class="w-10"></th>
                                        <th class="">Title</th>
                                        <th class="">Dofa</th>
                                        <th class="">Orjitobbo Target</th>
                                        <th class="">Previous incomplete(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template
                                        v-for="(item, index) in all"
                                        :key="index"
                                    >
                                        <tr
                                            v-if="!item.central_yearly_plan_id"
                                            class="table_rows table_row_4"
                                        >
                                            <td class="max-w-120 mx-2">
                                                <router-link
                                                    :to="{
                                                        name: 'DepartmentPlanUpdate',
                                                        params: {
                                                            slug: item.slug,
                                                        },
                                                    }"
                                                >
                                                    <span
                                                        class="mx-2 cursor-pointer text-dark"
                                                    >
                                                        <i
                                                            class="fa fa-pencil"
                                                        ></i>
                                                    </span>
                                                </router-link>
                                                <span
                                                    class="cursor-pointer"
                                                    @click="deleteItem(item)"
                                                >
                                                    <i
                                                        class="fa fa-trash mx-2"
                                                    ></i>
                                                </span>
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{ item.id }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                <button
                                                    class="btn btn-sm btn-primary"
                                                >
                                                    Set budget
                                                </button>
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{ item.title }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{ item.plan_dep_dofa?.title }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{
                                                    item
                                                        .plan_dep_orjitobbo_target
                                                        ?.title
                                                }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{
                                                    item.previous_unfinished_parcent
                                                }}
                                            </td>
                                        </tr>
                                        <tr
                                            v-else
                                            class="table_rows table_row_4 bg-secondary"
                                        >
                                            <td class="text-wrap max-w-120">
                                                <button
                                                    class="btn btn-sm btn-primary m-1"
                                                >
                                                    Comment
                                                </button>
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{ item.id }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                central
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{ item.title }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{ item.plan_dep_dofa?.title }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{
                                                    item
                                                        .plan_dep_orjitobbo_target
                                                        ?.title
                                                }}
                                            </td>
                                            <td class="text-wrap max-w-120">
                                                {{
                                                    item.previous_unfinished_parcent
                                                }}
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <export-all-loader />
        <quick-view />
        <filter-data />
        <import-modal></import-modal>

        <div
            class="modal fade"
            :class="`${is_show_modal ? 'show d-block' : 'd-none'}`"
            id="primarymodal"
            aria-modal="true"
        >
            <div class="modal-dialog modal-lg">
                <form @submit.prevent="SubmitHandler" v-if="item">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">
                                {{ setup.prefix }} তৈরি করুন
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
                                <div
                                    class="col-md-12"
                                    v-if="form_item.central_yearly_plan?.id"
                                >
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Cnetral yearly Plan</label
                                        >
                                        <select
                                            @change="
                                                updateSelectText(
                                                    'central_yearly_plan',
                                                    $event
                                                )
                                            "
                                            class="form-select"
                                            id=""
                                            required
                                        >
                                            <option value="">
                                                Select central plan
                                            </option>
                                            <option
                                                :value="item.id"
                                                v-for="item in central_yearly_plans"
                                                :selected="
                                                    item.id ==
                                                    form_item
                                                        .central_yearly_plan.id
                                                "
                                                :key="item"
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Title</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="form_item.title"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Dofa</label>
                                        <select
                                            @change="
                                                updateSelectText(
                                                    'plan_dep_dofa',
                                                    $event
                                                )
                                            "
                                            class="form-select"
                                            id=""
                                            required
                                        >
                                            <option value="">
                                                Select Dofa
                                            </option>
                                            <option
                                                :value="item.id"
                                                v-for="item in dofas"
                                                :selected="
                                                    item.id ==
                                                    form_item.plan_dep_dofa.id
                                                "
                                                :key="item"
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Orjitobbo Target</label
                                        >
                                        <select
                                            @change="
                                                updateSelectText(
                                                    'plan_dep_orjitobbo_target',
                                                    $event
                                                )
                                            "
                                            class="form-select"
                                            id=""
                                            required
                                        >
                                            <option value="">
                                                Select Orjitobbo Target
                                            </option>
                                            <option
                                                v-for="item in orgitobbo_target"
                                                :selected="
                                                    item.id ==
                                                    form_item
                                                        .plan_dep_orjitobbo_target
                                                        .id
                                                "
                                                :value="item.id"
                                                :key="item"
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">
                                            Executive Department</label
                                        >
                                        <select
                                            @change="
                                                updateSelectText(
                                                    'user_department',
                                                    $event
                                                )
                                            "
                                            class="form-select"
                                            id=""
                                            required
                                        >
                                            <option value="">
                                                Select Executive Department
                                            </option>
                                            <option
                                                v-for="item in user_departments"
                                                :selected="
                                                    item.id ==
                                                    form_item.user_department.id
                                                "
                                                :value="item.id"
                                                :key="item"
                                            >
                                                {{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >Previous incomplete (%)</label
                                        >
                                        <input
                                            v-model="
                                                form_item.previous_unfinished_parcent
                                            "
                                            type="number"
                                            required
                                            class="form-control"
                                            placeholder=""
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >Rating (1-100)
                                        </label>
                                        <input
                                            v-model="form_item.rating"
                                            type="number"
                                            class="form-control"
                                            required
                                            placeholder=""
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Description</label>
                                        <textarea
                                            class="form-control"
                                            v-model="form_item.description"
                                            name=""
                                            id=""
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
    <div class="card-footer py-2">
        <all-page-footer-actions></all-page-footer-actions>
    </div>
</template>

<script>
/** plugins */
import { mapActions, mapWritableState } from "pinia";
import { store as data_store } from "../store/index";
import setup from "../setup";

/** helper and actions */
import get_all_data from "../store/async_actions/all";

/** components */
// import TableRowAction from './components/all_data_page/TableRowAction.vue';
// import SelectSingle from './components/all_data_page/select_data/SelectSingle.vue';
// import SelectAll from './components/all_data_page/select_data/SelectAll.vue';
import AllPageHeader from "../components/all_data_page/AllPageHeader.vue";
import AllPageFooterActions from "../components/all_data_page/AllPageFooterActions.vue";
import ExportAllLoader from "../components/all_data_page/ExportAllLoader.vue";
import QuickView from "../components/canvas/QuickView.vue";
import ImportModal from "../components/canvas/ImportModal.vue";
import QuickViewColumn from "../components/all_data_page/QuickViewColumn.vue";
import FilterData from "../components/canvas/FilterData.vue";
import DropDownEl from "../components/dropdown/DropDownEl.vue";
import TableHead from "../components/all_data_page/TableHead.vue";
import TableBody from "../components/all_data_page/TableBody.vue";

export default {
    data: () => ({
        setup,
        is_show_modal: false,

        central_yearly_plans: [],
        dofas: [],
        orgitobbo_target: [],
        user_departments: [],
        form_data: [],

        form_item: {
            title: "",
            plan_dep_dofa: { id: null, title: null },
            central_yearly_plan: { id: null, title: null },
            plan_dep_orjitobbo_target: { id: null, title: null },
            user_department: { id: null, title: null },
            previous_unfinished_parcent: "",
            rating: "",
            description: "",
        },
    }),
    created: async function () {
        await this.get_all_data();

        await this.get_all_central_yearly_plans();
        await this.get_all_dofas();
        await this.get_all_orgitobbo_target();
        await this.get_all_user_departments();
    },
    methods: {
        ...mapActions(data_store, [
            "set_page", // needs in pagination props
            "set_paginate", // needs in pagination props
            "details", // needs in pagination props
            "update",
        ]),
        get_all_data,

        editItem: async function (id) {
            await this.details(id);
            console.log(this.item);

            if (this.item) {
                this.form_item = this.item;
                this.is_show_modal = true;
            }
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
        get_all_dofas: async function () {
            let response = await axios.get("plan-dep-dofas?get_all=1");
            if (response.data.status == "success") {
                this.dofas = response.data.data;
            }
        },
        get_all_central_yearly_plans: async function () {
            let response = await axios.get("central-yearly-plans?get_all=1");
            if (response.data.status == "success") {
                this.central_yearly_plans = response.data.data;
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

        SubmitHandler: async function ($event) {
            await this.update(this.form_item);
        },
    },
    computed: {
        ...mapWritableState(data_store, {
            all: "all",
            item: "item",
        }),
    },
    components: {
        // TableRowAction,
        // SelectSingle,
        // SelectAll,
        TableHead,
        TableBody,
        AllPageHeader,
        AllPageFooterActions,
        ExportAllLoader,
        QuickView,
        QuickViewColumn,
        FilterData,
        DropDownEl,
        ImportModal,
    },
};
</script>

<style>
.bg-secondary {
    background-color: #2223242d !important;
}
</style>
