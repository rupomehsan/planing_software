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
                                        <th>Title</th>
                                        <th class="">Dofa</th>
                                        <th class="">Orjitobbo Target</th>
                                        <th class=""> Executive Department</th>
                                        <th class="">Previous incomplete(%)</th>
                                        <th class="">Rating (1-100)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr 
                                    v-for="(item,index) in all?.data" :key="index"
                                    class="table_rows table_row_4">
                                        <td class="max-w-120 mx-2">
                                            <span class="mx-2 cursor-pointer" @click="editItem(item.slug)">

                                                <i class="fa fa-pencil" ></i>
                                            </span>
                                            <span class="cursor-pointer" @click="deleteItem(item)">

                                                <i class="fa fa-trash mx-2" ></i>
                                            </span>
                                        </td>
                                        <td class="text-wrap max-w-120">{{ item.id }}</td>
                                        <td class="text-wrap max-w-120">{{ item.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_dofa?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_orjitobbo_target?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.user_department?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.previous_unfinished_parcent }}</td>
                                        <td class="text-wrap max-w-120">{{ item.rating }}</td>

                                    </tr>
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

        <div class="modal fade " :class="`${is_show_modal ? 'show d-block' : 'd-none'}`" id="primarymodal"
            aria-modal="true">
            <div class="modal-dialog modal-lg ">
                <form @submit.prevent="SingleItemSubmitHandler">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white"> {{ setup.prefix }} তৈরি করুন </h5>
                            <button @click="is_show_modal = false" type="button" class="btn btn-light"
                                data-dismiss="modal"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Dofa</label>
                                        <select  @change="updateSelectText('plan_dep_dofa', $event)" class="form-select" id="" required>
                                            <option value="">Select Dofa</option>
                                            <option :value="item.id" v-for="item in dofas" :selected="item.id == form_item.plan_dep_dofas_id" :key="item">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Orjitobbo Target</label>
                                        <select  @change="updateSelectText('plan_dep_orjitobbo_target', $event)" class="form-select" id="" required>
                                           <option value="">Select Orjitobbo Target</option>
                                            <option v-for="item in orgitobbo_target" :selected="item.id == form_item.plan_dep_orjitobbo_target_id" :value="item.id" :key="item">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Executive Department</label>
                                        <select  @change="updateSelectText('user_department', $event)" class="form-select" id="" required>
                                            <option value="">Select Executive Department</option>
                                            <option v-for="item in user_departments" :selected="item.id == form_item.user_depertment_id" :value="item.id" :key="item">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Previous incomplete (%)</label>
                                        <input v-model="form_item.previous_unfinished_parcent" type="number" required class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Rating (1-100) </label>
                                        <input v-model="form_item.rating" type="number" class="form-control" required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Description</label>
                                        <textarea class="form-control" v-model="form_item.description" name="" id=""></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i>
                                    Submit</button>
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
        is_show_modal: false,
        dofas : [],
        orgitobbo_target: [],
        user_departments: [],
        form_item: {
            plan_dep_dofas_id: null,
            plan_dep_orjitobbo_target_id: null,
            user_depertment_id: null,
            previous_unfinished_parcent: '',
            rating: '',
            description: ''
        },

    }),
    created: async function () {
        await this.get_all_data();
        await this.get_all_dofas()
        await this.get_all_orgitobbo_target()
        await this.get_all_user_departments()
    },
    methods: {
        ...mapActions(data_store, [
            'set_page',
            'set_paginate',
            'details',
            'destroy',
            'set_item',
            'set_only_latest_data',
            'get_all',
        ]),
        get_all_data,

        editItem:async function(id) {
            await this.details(id);
            if (this.item) {
                this.form_item = this.item
                this.is_show_modal = true
            }
        },
        deleteItem: async function (item) {
           let con = await window.s_confirm('Permanently delete');
            if(con){
                this.set_item(item);
                this.set_only_latest_data(true);

                let res = await this.destroy();
                await this.get_all();
                if(res.data.status == "success"){
                    window.s_alert('Permanently deleted.');
                }

                this.set_only_latest_data(false);
            }
        },
        get_all_dofas: async function () {
            let response = await axios.get('plan-dep-dofas?get_all=1');
            if (response.data.status == "success") {
                this.dofas = response.data.data
            }
        },

        get_all_orgitobbo_target: async function () {
            let response = await axios.get('plan-dep-orjitobbo-targets?get_all=1');
            if (response.data.status == "success") {
                this.orgitobbo_target = response.data.data
            }
        },
        get_all_user_departments: async function () {
            let response = await axios.get('user-departments?get_all=1');
            if (response.data.status == "success") {
                this.user_departments = response.data.data
            }
        }
    },
    computed: {
        ...mapWritableState(data_store, {
            all: 'all',
             item: "item",
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
