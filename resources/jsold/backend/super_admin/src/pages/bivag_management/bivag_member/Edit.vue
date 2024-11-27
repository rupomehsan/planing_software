<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ param_id ? 'Update' : 'Create' }} new {{ setup.prefix }}</h5>
                    <div>
                        <!-- <router-link v-if="item.slug" class="btn btn-outline-info mr-2 btn-sm"
                            :to="{ name: `Details${route_prefix}`, params: {id: item.slug} }">
                            Details {{ route_prefix }}
                        </router-link> -->
                        <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${setup.route_prefix}` }">
                            All {{ setup.prefix }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body card_body_fixed_height">
                    <div class="row">
                        <input type="hidden" name="id" :value="user.id">
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input  type="text" class="form-control"
                                    name="title" id="title"
                                    :value="user.title"
                                    required="">
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Description</label>
                            <input  type="email" class="form-control"
                                    name="description" id="description"
                                    :value="user.description"
                                    required="">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-square px-5">
                        <i class="icon-lock"></i>
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { store as user_store } from './setup/store';
import setup from "./setup";
import form_fields from "./setup/form_fields";

export default {
    data: () => ({
        route_prefix: '',
        param_id: null,
        selected_role: '',
        setup,
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;
        // this.route_prefix = setup.route_prefix;
        // this.selected_role = this.user.role;

        // console.log(this.form_fields);
        // this.reset_fields();

        // if (id) {
        //     this.set_fields(id);
        // }

        if (id) {
            this.details(id);
        }
    },
    methods: {
        ...mapActions(user_store, {
            details: 'details',
            update: 'update',
        }),
        submitHandler: async function ($event) {
            let res = await this.update($event)
            console.log(res);
            if(res.data.status){
                window.s_alert("data updated");
            }else{

            }
        },
    },

    computed: {
        ...mapState(user_store, {
            user:'item',
        }),
    },
    watch:{
        user:function(){
            this.selected_role = this.user.role;
        }
    }
}
</script>
