<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ param_id ? 'Assign' : 'Create' }} new {{ route_prefix }}</h5>
                    <div>
                        <router-link v-if="item.slug" class="btn btn-outline-info mr-2 btn-sm me-2"
                            :to="{ name: `Details${route_prefix}`, params: {id: item.slug} }">
                            Details {{ route_prefix }}
                        </router-link>
                        <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${route_prefix}` }">
                            All {{ route_prefix }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body card_body_fixed_height">
                    <div class="row">
                        <div>
                            <h3 class="fs-5 ps-2 mb-3">Task title: <span class="fw-bold">{{ item.title }}</span></h3>
                        </div>
                        <input type="hidden" name="task_id" :value="item.id">
                        <!-- <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input  type="text" class="form-control"
                                    name="title" id="title"
                                    :value="item.title"
                                    required="">
                        </div> -->
                        <div class="form-group mb-2">
                            <label for="assign_id">Assign user</label>
                            <select name="assign_id" id="assign_id" class="form-control" >
                                <option value="">--- Select User ---</option>
                                <option v-for="(user,index) in users" :value="user.id" :key="index">{{ user.full_name }}</option>
                                <option value="2">Admin</option>
                                <option value="3">Department</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="is_completed">Is Completed</label>
                            <select name="is_completed" id="is_completed" class="form-control" >
                                <option value="0">pending</option>
                                <option value="1">completed</option>
                            </select>
                        </div>
                        <!-- <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input  type="email" class="form-control"
                                    name="email" id="email"
                                    :value="user.email"
                                    required="">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input  type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input  type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div> -->
                        <!-- <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" v-model="selected_role">
                                <option value="">--- select role ---</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">Department</option>
                            </select>
                        </div> -->
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
import { store as data_store } from './setup/store';
import setup from "./setup";
import form_fields from "./setup/form_fields";
import axios from 'axios';

export default {
    data: () => ({
        route_prefix: '',
        param_id: null,
        users:'',
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;
        this.route_prefix = setup.route_prefix;

        if (id) {
            this.details(id);
        }
        this.all_user();

    },
    methods: {
        ...mapActions(data_store, {
            details: 'details',
            update: 'update',
        }),
        submitHandler: async function ($event) {
            let formData = new FormData($event.target);

            const formDataObj = {};
            for (let [key, value] of formData.entries()) {
                formDataObj[key] = value;
            }
            try {
                let res = await axios.post('/task-assigns/store',formDataObj)
                console.log(res);
                if(res.data.status == "success"){
                    window.s_alert("data created");
                }
            } catch (error) {
                console.log("error from assign" , error);
            }
        },

        all_user: async function(){
            let res = await axios.get('/user',{
                params: {
                    get_all: 1,
                    fields: '*',
                    sort_by_col: 'id',
                    sort_type: 'asc',
                    status: 1,
                }
            });
            if(res.data.status == "success"){
                this.users = res.data.data
            }
        }

    },

    computed: {
        ...mapState(data_store, {
            item:'item',
        }),
    },
    // watch:{
    //     user:function(){
    //         this.selected_role = this.user.role;
    //     }
    // }
}
</script>
