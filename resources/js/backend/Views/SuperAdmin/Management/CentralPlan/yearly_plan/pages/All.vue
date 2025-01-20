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
                                        <th>Title</th>
                                        <th class="">Dofa</th>
                                        <th class="">Orjitobbo Target</th>
                                        <th class="">Previous incomplete(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in all?.data"
                                        :key="index"
                                        class="table_rows table_row_4"
                                    >
                                        <td class="max-w-120 mx-2">
                                            <router-link
                                                :to="{
                                                    name: 'CentralPlanUpdate',
                                                    params: { slug: item.slug },
                                                }"
                                            >
                                                <span
                                                    class="mx-2 cursor-pointer"
                                                >
                                                    <i class="fa fa-pencil"></i>
                                                </span>
                                            </router-link>

                                            <span
                                                class="cursor-pointer"
                                                @click="deleteItem(item)"
                                            >
                                                <i class="fa fa-trash mx-2"></i>
                                            </span>
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{ item.id }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{ item.title }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{ item.plan_dep_dofa?.title }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{
                                                item.plan_dep_orjitobbo_target
                                                    ?.title
                                            }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{
                                                item.previous_unfinished_parcent
                                            }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div v-if="typeof all == `object`">
                        <pagination
                            :data="all"
                            :get_data="get_all_data"
                            :set_paginate="set_paginate"
                            :set_page="set_page"
                        />
                    </div>
                    <div class="card-footer py-2">
                        <all-page-footer-actions></all-page-footer-actions>
                    </div>
                </div>
            </div>
        </div>

        <export-all-loader />
        <quick-view />
        <filter-data />
        <import-modal></import-modal>
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
    }),
    created: async function () {
        await this.get_all_data();
    },
    methods: {
        ...mapActions(data_store, [
            "set_page",
            "set_paginate",
            "details",
            "destroy",
            "set_item",
            "set_only_latest_data",
            "get_all",
        ]),
        get_all_data,

        editItem: async function (id) {
            await this.details(id);
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

<style></style>
