<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ setup.prefix }} {{ param_id ? 'আপডেট করুন' : 'নতুন তৈরি করুন' }}
                    </h5>
                    <div>
                        <button type="button" class="btn btn-outline-warning btn-sm " @click="is_show_modal = true">
                            Add Iitem
                        </button>
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
                    <div class="row  justify-content-center">
                        <div class="col-md-12">
                            <table class="table table-hover text-center table-bordered">
                                <thead>
                                    <tr>
                                        <th class="w-10">
                                            <span class="icon"></span>
                                        </th>
                                        <th class="w-10">id</th>
                                        <th>Title</th>
                                        <th>Session</th>
                                        <th>Central Plan</th>
                                        <th>Department</th>
                                        <th>Dofa</th>
                                        <th>Rating (1-100)</th>
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
                                        <td class="text-wrap max-w-120">{{ item.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.session }}</td>
                                        <td class="text-wrap max-w-120">{{ item.central_yearly_plan?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.user_department?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.plan_dep_dofa?.title }}</td>
                                        <td class="text-wrap max-w-120">{{ item.rating }}</td>

                                    </tr>
                                </tbody>
                            </table>
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
                                  <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title">Title</label>
                                       <input type="text" class="form-control" name="" id="" v-model="form_item.title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Session</label>
                                        <select name="" class="form-select" id="" v-model="form_item.session">
                                            <option v-for="(item, index) in sessions" :value="item" :key="index">{{ item }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Central Yearly plan</label>
                                        <select name="" class="form-select" id="" @change="updateSelectText('central_yearly_plan', $event)">
                                            <option v-for="(item, index) in central_yearly_plans" :value="item.id" :key="index">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Select department</label>
                                        <select name="" class="form-select" id="" @change="get_department_section_by_department_id($event),updateSelectText('user_department', $event)">
                                            <option v-for="(item, index) in user_departments" :value="item.id" :key="index">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Section </label>
                                        <select name="" class="form-select" id="" @change="get_user_department_section_sub_section_by_section_id($event),updateSelectText('user_department_section', $event)">
                                            <option v-for="(item, index) in user_department_sections" :value="item.id" :key="index">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title"> Section sub section </label>
                                        <select name="" class="form-select" id="" @click="updateSelectText('user_department_sub_section', $event)">
                                            <option v-for=" (item, index) in user_department_sub_sections" :value="item.id" :key="index" >{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Dofa</label>
                                        <select name="" class="form-select" id="" @click="updateSelectText('plan_dep_dofa', $event)">
                                            <option v-for=" (item, index) in dofas" :value="item.id" :key="index" >{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>

                               
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Plan Category </label>
                                        <select name="" class="form-select" id="" @click="updateSelectText('plan_dep_category', $event)">
                                            <option v-for=" (item, index) in plan_categories" :value="item.id" :key="index" >{{ item.title }}</option>
                                     
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Sonkhatattik Tottho </label>
                                        <select name="" class="form-select" id="" @click="updateSelectText('plan_dep_sonkhatattik_tottho', $event)">
                                            <option v-for=" (item, index) in sonkhatattik_totthos" :value="item.id" :key="index" >{{ item.title }}</option>
                                     
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title "> Execution type </label>
                                        <select name="" class="form-select" id="" v-model="form_item.execution_type">
                                            <option value="schedule">Schedule</option>
                                            <option value="deadline">deadline</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Bastobayoner mash</label>
                                        <select name="" class="form-select" id="" v-model="form_item.bastobayoner_mash">
                                            <option v-for=" (item, index) in bastobayoner_mash" :value="item" :key="index" >{{ item }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Obastobnyeot Ongsho (%) </label>
                                        <input type="number" class="form-control" placeholder="Previous incomplete" v-model="form_item.obastobayeto_ongsho">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Rating (1-100) </label>
                                        <input type="number" class="form-control" placeholder="Previous incomplete" v-model="form_item.rating">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Comment and review </label>
                                        <input type="text" class="form-control" placeholder="Previous incomplete" v-model="form_item.comments">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Is archived </label>
                                        <select name="" class="form-select" id="" v-model="form_item.is_archived">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Is Umbrella </label>
                                        <select name="" class="form-select" id="" v-model="form_item.is_umbrella">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="title ">Umbrella Departments</label>
                                        <select name="" class="form-select" id="" v-model="form_item.umbrella_departments">
                                            <option v-for=" (item, index) in user_departments" :value="item.id" :key="index">{{ item.title }}</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Plan Details</label>
                                        <textarea name="" class="form-control" id="" v-model="form_item.plan_details"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer mt-2">
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
        user_department_sections: [],
        user_department_sub_sections: [],
        plan_categories: [],
        sonkhatattik_totthos: [],
        bastobayoner_mash: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ],

        sessions: [
            "nov-25-nov-26",  
            "nov-26-nov-27",
            "nov-27-nov-28",  
        ],
        central_yearly_plans: [],


        form_data: [],
        form_item: {
            title: '',
            session: '',
            central_yearly_plan: {
                id: null,
                title: null
            },
            user_department: { id: null, title: null },
            user_department_section: { id: null, title: null },
            user_department_sub_section: { id: null, title: null },
            plan_dep_dofa: { id: null, title: null },
            plan_dep_category: { id: null, title: null },
            plan_dep_sonkhatattik_tottho: { id: null, title: null },
            execution_type: 'schedule',
            bastobayoner_mash: '',
            obastobayeto_ongsho: '',
            rating: '',
            comments: '',
            is_archived: 'yes',
            is_umbrella: 'no',
            umbrella_departments: [],
            plan_details: ''
        },
        edit_item: null
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;

        this.reset_fields();

        if (id) {
            this.set_fields(id);
        }

        await this.get_all_central_plans()
        await this.get_plan_categories()
        await this.get_all_dofas()
        await this.get_all_sonkhatattik_totthos()
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
                   title: '',
                    session: '',
                    central_yearly_plan: {
                        id: null,
                        title: null
                    },
                    user_department: { id: null, title: null },
                    user_department_section: { id: null, title: null },
                    user_department_sub_section: { id: null, title: null },
                    plan_dep_dofa: { id: null, title: null },
                    plan_dep_category: { id: null, title: null },
                    plan_dep_sonkhatattik_tottho: { id: null, title: null },
                    execution_type: 'schedule',
                    bastobayoner_mash: '',
                    obastobayeto_ongsho: '',
                    rating: '',
                    comments: '',
                    is_archived: 'yes',
                    is_umbrella: 'no',
                    umbrella_departments: [],
                    plan_details: ''
                }
            }
        
        },

        submitHandler: async function ($event) {
            $event.preventDefault();
            if (this.form_data.length == 0) {
                s_warning('No item found');
                return false;
            }
            let contirmation = await s_confirm('Are you sure want to submit?');
            
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
        get_all_sonkhatattik_totthos: async function () {
            let response = await axios.get('plan-dep-sonkha-tattik-totthos?get_all=1');
            if (response.data.status == "success") {
                this.sonkhatattik_totthos = response.data.data
            }
        },

        get_plan_categories: async function () {
            let response = await axios.get('plan-dep-categories?get_all=1');
            if (response.data.status == "success") {
                this.plan_categories = response.data.data
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
        },
        get_all_central_plans: async function () {
            let response = await axios.get('central-yearly-plans?get_all=1');
            if (response.data.status == "success") {
                this.central_yearly_plans = response.data.data
            }
        },
        get_department_section_by_department_id: async function (event) {
            let id = event.target.value;
            let response = await axios.get(`user-department-sections?get_all=1&user_department_id=${id}`);
            if (response.data.status == "success") {
                this.user_department_sections    = response.data.data
            }
        },

        get_user_department_section_sub_section_by_section_id: async function (event) {
            let id = event.target.value;
            let response = await axios.get(`user-department-sub-sections?get_all=1&user_department_section_id=${id}`);
            if (response.data.status == "success") {
                this.user_department_sub_sections    = response.data.data
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

 
