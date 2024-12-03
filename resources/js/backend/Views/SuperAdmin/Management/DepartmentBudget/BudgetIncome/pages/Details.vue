<template>
    <div class="container py-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-capitalize"> ২৪ আইট  প্রশিক্ষণ বাজেট</h5>
                <div>
                    <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${setup.route_prefix}` }">
                        {{ setup.all_page_title }}
                    </router-link>
                </div>
            </div>
            <div class="card-body card_body_fixed_height">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-hover text-center table-bordered">
                            <thead>
                                <tr>

                                    <th class="w-10">id</th>
                                    <th class="">Sub plan title</th>
                                    <th class="">Khat </th>
                                    <th class=""> amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table_rows table_row_4">

                                    <td class="text-wrap max-w-120">1</td>
                                    <td class="text-wrap max-w-120">islamic somajbinirman</td>
                                    <td class="text-wrap max-w-120">somajbinirman</td>
                                    <td class="text-wrap max-w-120">40</td>

                                </tr>
                                <tr class="table_rows table_row_4">

                                    <td class="text-wrap max-w-120">1</td>
                                    <td class="text-wrap max-w-120">islamic somajbinirman</td>
                                    <td class="text-wrap max-w-120">somajbinirman</td>
                                    <td class="text-wrap max-w-120">40</td>

                                </tr>
                                <tr class="table_rows table_row_4">

                                    <td class="text-wrap max-w-120">1</td>
                                    <td class="text-wrap max-w-120">islamic somajbinirman</td>
                                    <td class="text-wrap max-w-120">somajbinirman</td>
                                    <td class="text-wrap max-w-120">40</td>

                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end ">Total </td>
                                    <td> 50000</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <router-link class="btn btn-outline-warning btn-sm" :to="{
                    name: `Edit${setup.route_prefix}`,
                    params: { id: item.slug }
                }">
                    Edit {{ setup.route_prefix }}
                </router-link>

                <a href="" v-if="item.prev_slug" @click.prevent="get_data(item.prev_slug)"
                    class="btn btn-secondary btn-sm ml-2">
                    <i class="fa fa-angle-left"></i>
                    Previous {{ setup.route_prefix }} ({{ item.prev_count }})
                </a>

                <a href="" v-if="item.next_slug" @click.prevent="get_data(item.next_slug)"
                    class="btn btn-secondary btn-sm ml-2">
                    Next {{ setup.route_prefix }} ({{ item.next_count }})
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { store } from '../store';
import setup from "../setup";
import DataDetialsTableBody from '../components/all_data_page/DataDetialsTableBody.vue';

export default {

    components: {
        DataDetialsTableBody,
    },

    data: () => ({
        setup,
    }),
    created: async function () {
        // let id = this.param_id = this.$route.params.id;
        // await this.get_data(id);
    },
    methods: {
        ...mapActions(store, {
            details: 'details',
        }),
        get_data: async function (slug) {
            this.item = {};
            await this.details(slug)
        },
    },
    computed: {
        ...mapWritableState(store, {
            item: "item",
        }),
    },
}
</script>
