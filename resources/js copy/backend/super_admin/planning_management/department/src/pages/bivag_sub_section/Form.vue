<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ param_id ? 'Update' : 'Create' }} new {{ prefix }}</h5>
                    <div>
                        <router-link v-if="item.slug" class="btn btn-outline-info mr-2 btn-sm"
                            :to="{ name: `Details${route_prefix}`, params: {id: item.slug} }">
                            Details {{ prefix }}
                        </router-link>
                        <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${route_prefix}` }">
                            All {{ prefix }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body card_body_fixed_height">
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="role">বিভাগ সেকশন</label>
                            <select name="bivag_section" id="role" class="form-control">
                                <option value="">--- select role ---</option>
                                <option :value="bivag_section.id" v-for="(bivag_section,index) in bivag_sections" :key="index">{{ bivag_section.title }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
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
        prefix: '',
        route_prefix: '',
        form_fields,
        param_id: null,

        bivag_sections: [
            { id: '1', title: 'শিক্ষা বিভাগ' },
            { id: '2', title: 'অর্থ বিভাগ' },
            { id: '3', title: 'প্রশাসন বিভাগ' },
            { id: '4', title: 'অভ্যন্তরীণ নিরীক্ষা বিভাগ' },
            { id: '5', title: 'মানবসম্পদ বিভাগ' },
        ],
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;
        this.route_prefix = setup.route_prefix;
        this.prefix = setup.prefix;

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
