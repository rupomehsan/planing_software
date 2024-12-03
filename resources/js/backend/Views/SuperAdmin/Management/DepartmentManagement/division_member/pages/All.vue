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
                                    <table-head />
                                </thead>
                                <tbody v-if="all?.data?.length">
                                    <table-body :data="all?.data" />
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div v-if="typeof all == `object`">
                        <pagination :data="all" :get_data="get_all_data" :set_paginate="set_paginate"
                            :set_page="set_page" />
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
