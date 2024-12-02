<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- <h5 class="text-capitalize">{{ setup.prefix }} {{ param_id ? 'আপডেট করুন' : 'নতুন তৈরি করুন' }} -->
                    <h5 class="text-capitalize">কেন্দ্রিও বার্ষিক পরিকল্পনা তৈরি করুন
                    </h5>
                    <div>
                        <button type="button" class="btn btn-outline-warning btn-sm mx-2" @click="is_show_modal = true">
                           Import From Excel
                        </button>
                        <button type="button" class="btn btn-outline-warning btn-sm mx-2" @click="is_show_modal = true">
                           Import  previous  incompleted
                        </button>
                        <button type="button" class="btn btn-outline-warning btn-sm mx-2" @click="is_show_modal = true">
                            Add Iitem
                        </button>
                        <router-link v-if="item.slug" class="btn btn-outline-info mx-2  btn-sm"
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
                    <div class="row  justify-content-center">
                        <div class="col-md-12">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                    <tr>
                                        <th class="w-10">
                                            <span class="icon"></span>
                                        </th>
                                        <th class="w-10">id</th>
                                        <th class="">Dofa</th>
                                        <th class="">Orjitobbo Target</th>
                                        <th class=""> Executive Department</th>
                                        <th class="">Previous incomplete(%)</th>
                                        <th class="">Rating (1-100)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table_rows table_row_4">
                                        <td class="text-wrap max-w-120">
                                            <i class="fa fa-pencil"></i>
                                            <i class="fa fa-trash mx-2"></i>
                                        </td>
                                        <td class="text-wrap max-w-120">1</td>
                                        <td class="text-wrap max-w-120">islamic somajbinirman</td>
                                        <td class="text-wrap max-w-120">Target One</td>
                                        <td class="text-wrap max-w-120">IT</td>
                                        <td class="text-wrap max-w-120">50</td>
                                        <td class="text-wrap max-w-120">40</td>

                                    </tr>
                                    <tr class="table_rows table_row_4">
                                        <td class="text-wrap max-w-120">
                                            <i class="fa fa-pencil"></i>
                                            <i class="fa fa-trash mx-2"></i>
                                        </td>
                                        <td class="text-wrap max-w-120">1</td>
                                        <td class="text-wrap max-w-120">islamic somajbinirman</td>
                                        <td class="text-wrap max-w-120">Target One</td>
                                        <td class="text-wrap max-w-120">IT,sahitto</td>
                                        <td class="text-wrap max-w-120">50</td>
                                        <td class="text-wrap max-w-120">40</td>

                                    </tr>
                                </tbody>
                            </table>
                            <div  class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <div class="modal fade " :class="`${is_show_modal ? 'show d-block' : 'd-none'}`" id="primarymodal"
            aria-modal="true">
            <div class="modal-dialog modal-lg ">
                <form @submit.prevent="submitHandler">
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
                                        <select name="" class="form-select" id="">
                                            <option value="">One</option>
                                            <option value="">two</option>
                                            <option value="">three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Orjitobbo Target</label>
                                        <select name="" class="form-select" id="">
                                            <option value="">One</option>
                                            <option value="">two</option>
                                            <option value="">three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Executive Department</label>
                                        <select name="" class="form-select" id="">
                                            <option value="">One</option>
                                            <option value="">two</option>
                                            <option value="">three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Previous incomplete (%)</label>
                                        <input type="text" class="form-control" placeholder="Previous incomplete">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Rating (1-100) </label>
                                        <input type="number" class="form-control" placeholder="Previous incomplete">
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
import { mapActions, mapState } from 'pinia'
import { store as user_store } from '../store';
import setup from "../setup";
import form_fields from "../setup/form_fields";
import DofaDropDownEl from '../../../PlanDependency/dofa/components/dropdown/DropDownEl.vue';

export default {
    components: { DofaDropDownEl },
    data: () => ({
        route_prefix: '',
        prefix: '',
        form_fields,
        param_id: null,
        setup,
        is_show_modal: false
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

<style scoped></style>
