<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ param_id ? 'Update' : 'Create' }} new {{ setup.prefix }}</h5>
                    <div>
                        <router-link v-if="item.slug" class="btn btn-outline-info mr-2 btn-sm"
                            :to="{ name: `Details${setup.route_prefix}`, params: {id: item.slug} }">
                            Details {{ setup.prefix }}
                        </router-link>
                        <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${setup.route_prefix}` }">
                            All {{ setup.prefix }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body card_body_fixed_height">
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">--- select user ---</option>
                                <option :value="user.id" v-for="(user,index) in users" :key="index">{{ user.name }}</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="bivag_id">বিভাগ</label>
                            <select name="bivag_id" id="bivag_id" class="form-control">
                                <option value="">--- select bivag ---</option>
                                <option :value="bivag.id" v-for="(bivag,index) in bivags" :key="index">{{ bivag.title }}</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">--- select role ---</option>
                                <option :value="role.id" v-for="(role,index) in roles" :key="index">{{ role.title }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <template v-for="(form_field, index) in form_fields" v-bind:key="index">
                            <div :class="form_field.row_col_class ? form_field.row_col_class :`col-md-12 mb-2`" >
                                <div class="form-group">
                                    <label :for="form_field.name">{{ form_field.label }}</label>
                                    <input  :type="form_field.type" class="form-control"
                                            :name="form_field.name" :id="form_field.name"
                                            :placeholder="`Enter ` + form_field.label"
                                            :value="param_id ? user[form_field.name] : ''"
                                            required="">
                                </div>
                            </div>
                        </template>
                    </div> -->

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
        form_fields,
        param_id: null,
        setup,
        users: [
            { id: 1, name: 'Ali Hasan' },
            { id: 2, name: 'Fatima Khan' },
            { id: 3, name: 'Rafiq Ahmed' },
            { id: 4, name: 'Nadia Rahman' },
            { id: 5, name: 'Samiya Akter' },
            { id: 6, name: 'Kamal Hossain' },
            { id: 7, name: 'Tahmina Chowdhury' },
            { id: 8, name: 'Jahidul Islam' },
            { id: 9, name: 'Salma Begum' },
            { id: 10, name: 'Asif Rahman' },
        ],
        bivags: [
            { id: '1', title: 'শিক্ষা বিভাগ' },
            { id: '2', title: 'অর্থ বিভাগ' },
            { id: '3', title: 'প্রশাসন বিভাগ' },
            { id: '4', title: 'অভ্যন্তরীণ নিরীক্ষা বিভাগ' },
            { id: '5', title: 'মানবসম্পদ বিভাগ' },
            { id: '6', title: 'তথ্য প্রযুক্তি বিভাগ' },
            { id: '7', title: 'বিপণন বিভাগ' },
            { id: '8', title: 'বিজ্ঞান ও প্রযুক্তি বিভাগ' },
            { id: '9', title: 'বৈদেশিক সম্পর্ক বিভাগ' },
            { id: '10', title: 'জনসংযোগ বিভাগ' },
        ],
        roles: [
            { id: '1', title: 'সভাপতি' },
            { id: '2', title: 'সেক্রেটারি' },
            { id: '3', title: 'সহ-সেক্রেটারি' },
            { id: '4', title: 'অফিস' },
            { id: '5', title: 'বায়তুলমাল' },
            { id: '6', title: 'প্রচার' },
        ],
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;

        this.reset_fields();

        if (id) {
            this.set_fields(id);
        }
    },
    methods: {
        ...mapActions(user_store, {
            create: 'create',
            update: 'update',
            details: 'details',
        }),
        reset_fields: function () {
            this.form_fields.forEach((item) => {
                item.value = "";
            });
        },
        set_fields: async function (id) {
            this.param_id = id;
            await this.details(id);
            if (this.item) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.item).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                    });
                });
            }
        },

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.update($event);
                if ([200, 201].includes(response.status)) {
                    window.s_alert("data updated");
                    this.$router.push({ name: `Details${this.route_prefix}` });
                }
            } else {
                let response = await this.create($event);
                if ([200, 201].includes(response.status)) {
                    window.s_alert("data created");
                    this.$router.push({ name: `All${this.route_prefix}` });
                }
            }
        },
    },

    computed: {
        ...mapState(user_store, {
            item: "item",
        }),
    },
}
</script>
