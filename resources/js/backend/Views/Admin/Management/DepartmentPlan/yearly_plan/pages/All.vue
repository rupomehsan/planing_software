<template>
    <div>
        <div class="row m-0 mt-3">
            <div class="col-sm-12">
                <div class="card w-100">
                    <div class="card-header py-2 d-flex align-items-center justify-content-between gap-2">
                        <all-page-header />
                    </div>
                   
                    <div class="card-body">
                        <div class="table-responsive table_responsive card_body_fixed_height">
                            <table class="table table-hover text-center table-bordered">
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
                                        <th class="">Rating (1-100)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(item, index) in all" :key="index">
                                    <tr
                                        v-if="item.central_yearly_plan_id"
                                        class="table_rows table_row_4">
                                        <td class="text-wrap max-w-120">
                                            <i class="fa fa-pencil"></i>
                                            <i class="fa fa-trash mx-2"></i>
                                        </td>
                                        <td class="text-wrap max-w-120">{{ item.id }}</td>
                                        <td class="text-wrap max-w-120">
                                            <button class="btn btn-sm btn-primary">Set budget</button>
                                        </td>
                                        <td class="text-wrap max-w-120">{{ item.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_dofa?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_orjitobbo_target?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.previous_unfinished_parcent }}</td>
                                        <td class="text-wrap max-w-120">{{ item.rating }}</td>

                                    </tr>
                                    <tr
                                        v-else
                                        class="table_rows table_row_4 bg-secondary" >
                                        <td class="text-wrap max-w-120">
                                            <button class="btn btn-sm btn-primary m-1">Comment</button>
                                        </td>
                                        <td class="text-wrap max-w-120">{{ item.id }}</td>
                                        <td class="text-wrap max-w-120">
                                            central
                                        </td>
                                        <td class="text-wrap max-w-120">{{ item.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_dofa?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_orjitobbo_target?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.previous_unfinished_parcent }}</td>
                                        <td class="text-wrap max-w-120">{{ item.rating }}</td>

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
    </div>
</template>

<script>
/** plugins */
import { mapActions, mapWritableState } from 'pinia'
import { store as data_store } from '../store/index';
import setup from "../setup";

/** helper and actions */
import get_all_data from "../store/async_actions/all";

/** components */
// import TableRowAction from './components/all_data_page/TableRowAction.vue';
// import SelectSingle from './components/all_data_page/select_data/SelectSingle.vue';
// import SelectAll from './components/all_data_page/select_data/SelectAll.vue';
import AllPageHeader from '../components/all_data_page/AllPageHeader.vue';
import AllPageFooterActions from '../components/all_data_page/AllPageFooterActions.vue';
import ExportAllLoader from '../components/all_data_page/ExportAllLoader.vue';
import QuickView from '../components/canvas/QuickView.vue';
import ImportModal from '../components/canvas/ImportModal.vue';
import QuickViewColumn from '../components/all_data_page/QuickViewColumn.vue';
import FilterData from '../components/canvas/FilterData.vue';
import DropDownEl from '../components/dropdown/DropDownEl.vue';
import TableHead from '../components/all_data_page/TableHead.vue';
import TableBody from '../components/all_data_page/TableBody.vue';

export default {

    data: () => ({
        setup,
    }),
    created: async function () {
        await this.get_all_data();
    },
    methods: {
        ...mapActions(data_store, [
            'set_page', // needs in pagination props
            'set_paginate', // needs in pagination props
        ]),
        get_all_data,
    },
    computed: {
        ...mapWritableState(data_store, {
            all: 'all',
        })


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
}
</script>

<style></style>
