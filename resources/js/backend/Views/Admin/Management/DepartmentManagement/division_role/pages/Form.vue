<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ setup.prefix }} {{ param_id ? 'আপডেট করুন' : 'নতুন তৈরি করুন' }}
                    </h5>
                    <div>
                        <router-link v-if="item.slug" class="btn btn-outline-info mr-2 btn-sm"
                            :to="{ name: `Details${setup.route_prefix}`, params: { id: item.slug } }">
                            {{ setup.details_page_title }}
                        </router-link>
                        <router-link class="btn btn-outline-warning btn-sm mx-2"
                            :to="{ name: `All${setup.route_prefix}` }">
                            {{ setup.all_page_title }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body card_body_fixed_height">
                    <div class="row d-grid">
                        <template v-for="(form_field, index) in form_fields" v-bind:key="index">
                            <template v-if="form_field.type === 'select'">
                                <div :class="form_field.row_col_class">
                                    <div class="form-group ">
                                        <label for="">Select Category</label>
                                        <div class="mt-1 mb-3">
                                            <drop-down-el :name="'plan_dep_dofa_id'"
                                                :value="item && item.plan_dep_dofa_id ? [this.item.dofa] : []"
                                                :multiple="false"></drop-down-el>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template v-else>
                                <common-input :label="form_field.label" :type="form_field.type" :name="form_field.name"
                                    :multiple="form_field.multiple" :value="form_field.value"
                                    :data_list="form_field.data_list" :is_visible="form_field.is_visible"
                                    :row_col_class="form_field.row_col_class" />
                            </template>
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
import { store as user_store } from '../store';
import setup from "../setup";
import form_fields from "../setup/form_fields";
import DropDownEl from '../../../PlanDependency/dofa/components/dropdown/DropDownEl.vue';

export default {
    components: { DropDownEl },
    data: () => ({
        route_prefix: '',
        prefix: '',
        form_fields,
        param_id: null,
        setup,
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
                    window.s_alert(response.data?.message);
                    this.$router.push({ name: `Details${this.route_prefix}` });
                }
            } else {
                let response = await this.create($event);
                if ([200, 201].includes(response.status)) {
                    window.s_alert(response.data?.message);
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
