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
                                    <tr 
                                    v-for="(item,index) in form_data" :key="index"
                                    class="table_rows table_row_4">
                                        <td class="text-wrap max-w-120" >
                                            <span @click="editItemHandler(index)">
                                                <i class="fa fa-pencil cursor-pointer" ></i>
                                            </span>
                                            <span @click="deleteItemHandler(index)"> 
                                                <i class="fa fa-trash mx-2 cursor-pointer"  ></i>
                                            </span>
                                        </td>
                                        <td class="text-wrap max-w-120">{{ index+1 }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_dofa?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_orjitobbo_target?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.user_department?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.previous_incomplete }}</td>
                                        <td class="text-wrap max-w-120">{{ item.rating }}</td>

                                    </tr>
                                   
                                </tbody>
                            </table>
                            <div  class="text-center">
                                <button type="button" class="btn btn-primary" @click="submitHandler">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

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
                                            <option :value="item.id" v-for="item in dofas" :selected="item.id == form_item.plan_dep_dofa.id" :key="item">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Orjitobbo Target</label>
                                        <select  @change="updateSelectText('plan_dep_orjitobbo_target', $event)" class="form-select" id="" required>
                                           <option value="">Select Orjitobbo Target</option>
                                            <option v-for="item in orgitobbo_target" :selected="item.id == form_item.plan_dep_orjitobbo_target.id" :value="item.id" :key="item">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Executive Department</label>
                                        <select  @change="updateSelectText('user_department', $event)" class="form-select" id="" required>
                                            <option value="">Select Executive Department</option>
                                            <option v-for="item in user_departments" :selected="item.id == form_item.user_department.id" :value="item.id" :key="item">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Previous incomplete (%)</label>
                                        <input v-model="form_item.previous_incomplete" type="text" required class="form-control" placeholder="">
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
import { mapActions, mapState } from 'pinia'
import { store as user_store } from '../store';
import setup from "../setup";
import form_fields from "../setup/form_fields";
import DofaDropDownEl from '../../../PlanDependency/dofa/components/dropdown/DropDownEl.vue';

export default {
    components: { DofaDropDownEl },
    data: () => ({
        setup,
        route_prefix: '',
        prefix: '',
        form_fields,
        param_id: null,
        is_show_modal: false,

        dofas : [],
        orgitobbo_target: [],
        user_departments: [],
        form_data: [],
        form_item: {
            plan_dep_dofa: { id: null, title: null },
            plan_dep_orjitobbo_target: { id: null, title: null },
            user_department: { id: null, title: null },
            previous_incomplete: '',
            rating: '',
            description: ''
        },
        edit_item: null
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;

        this.reset_fields();

        if (id) {
            this.set_fields(id);
        }

        await this.get_all_dofas()
        await this.get_all_orgitobbo_target()
        await this.get_all_user_departments()

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

        

        SingleItemSubmitHandler: async function ($event) {
            if (this.edit_item !== null) {
                
                this.form_data[this.edit_item] = this.form_item
                this.is_show_modal = false

            } else {


                this.form_data.push(this.form_item)
                this.form_item = {
                    plan_dep_dofa: { id: null, title: null },
                    plan_dep_orjitobbo_target: { id: null, title: null },
                    user_department: { id: null, title: null },
                    previous_incomplete: '',
                    rating: '',
                    description: ''
                }
            }
        
        },

        submitHandler: async function ($event) {
            $event.preventDefault();
            if (this.form_data.length == 0) {
                s_warning('No item found');
                return false;
            }
            let contirmation = s_confirm('Are you sure want to submit?');
            if (!contirmation) {
                return false;
            }
            if (this.param_id) {
                await this.update(this.form_data);
            } else {
                await this.create(this.form_data);
            }
        },

         updateSelectText(field, event) {
            const selectedIndex = event.target.selectedIndex;
            const selectedText = event.target.options[selectedIndex].text;
            const selectedValue = event.target.value;

            // Ensure the field is an object and update id and title
            this.form_item[field] = {
                id: selectedValue,
                title: selectedText
            };
        },

        editItemHandler(index) {
            this.is_show_modal = true;
            this.edit_item = index
            this.form_item = {}
            this.form_item = this.form_data[index]
        },

        deleteItemHandler(index) {
            this.form_data.splice(index, 1)
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
        ...mapState(user_store, {
            item: "item",
        }),
    },
    
}
</script>

<style scoped></style>
