<template>
    <div class="container py-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="text-capitalize">Details {{ setup.prefix }}</h5>
                    <div>
                        <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${setup.route_prefix}` }">
                            All {{ setup.prefix }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body card_body_fixed_height">
                    <div class="row">
                        <div class="col-lg-8">
                            <table class="table quick_modal_table">
                                <tbody>
                                    <tr>
                                        <th>Section</th>
                                        <th>:</th>
                                        <th>
                                            {{ item.title }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <th>:</th>
                                        <th>
                                            {{ item.title }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <th>:</th>
                                        <th>
                                            {{ item.description }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Slug</th>
                                        <th>:</th>
                                        <th>
                                            {{ item.slug }}
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <router-link class="btn btn-outline-warning btn-sm"
                        :to="{
                            name: `Edit${setup.route_prefix}`,
                            params: { id: item.slug}
                        }">
                        Edit {{ setup.prefix }}
                    </router-link>

                    <a href="" v-if="item.prev_slug" @click.prevent="get_data(item.prev_slug)" class="btn btn-secondary btn-sm ml-2">
                        <i class="fa fa-angle-left"></i>
                        Previous {{ setup.prefix }} ({{ item.prev_count }})
                    </a>

                    <a href="" v-if="item.next_slug" @click.prevent="get_data(item.next_slug)" class="btn btn-secondary btn-sm ml-2">
                        Next {{ setup.prefix }} ({{ item.next_count }})
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
    </div>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { store } from './setup/store';
import setup from "./setup";

export default {
    data: () => ({
        setup,
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;
        await this.get_data(id);
    },
    methods: {
        ...mapActions(store, {
            details: 'details',
        }),
        get_data: async function(slug){
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
