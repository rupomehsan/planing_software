<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ param_id ? 'Update' : 'Create' }} new {{ route_prefix }}</h5>
                    <div>
                        <router-link v-if="item.slug" class="btn btn-outline-info mr-2 btn-sm"
                            :to="{ name: `Details${route_prefix}`, params: {id: item.slug} }">
                            Details {{ route_prefix }}
                        </router-link>
                        <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${route_prefix}` }">
                            All {{ route_prefix }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="mb-3 form-group">
                        <label for="bivag">
                            বিভাগ
                        </label>
                        <input type="text" name="bivag" class="form-control input_padding" id="bivag" >
                    </div>
                    <multi-select
                        :items="months"
                        label="বাস্তবায়নের মাস"
                        labelFor="implementing_month"
                        placeholder="--- select month ---"
                    />
                    <!-- <div class="mb-3 form-group">
                        <label for="section">
                            সেকশন
                        </label>
                        <select name="section" id="section" class="form-control input_padding" v-model="section">
                            <option value="">--- সেকশন বাছাই করুন ---</option>
                            <option v-for="section in sections" :value="section.id" :key="section">
                                {{ section.title }}
                            </option>
                        </select>
                    </div> -->
                    <div class="card mb-3">
                        <div class="card-header">
                            কার্যকরী পরুকল্পনা যুক্ত করুন
                        </div>
                        <div class="card-body overflow-x-auto">
                            <table class="table table-responsive karjokori_porikolpona_input_table">
                                <thead>
                                    <tr >
                                        <th>Action</th>
                                        <th>ক্রম</th>
                                        <th>কার্যকরী পরুকল্পনার বিবরণ</th>
                                        <th>সময়সীমার ধরন</th>
                                        <th>সময়কাল</th>
                                        <th>বাস্তবায়নকারী</th>
                                        <th>বাস্তবায়নের সহযোগী</th>
                                        <th>রেটিং</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row,index) in row_data" :key="index">
                                        <td>
                                            <a class="btn btn-sm btn-outline-danger" @click.prevent="deleteRow(index)">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        <td scope="row">{{ index + 1 }}</td>
                                        <td>
                                            <textarea class="form-control " name="porikolponar_biboron" id="porikolponar_biboron" rows="2" v-model="row.porikolponar_biboron"></textarea>
                                        </td>
                                        <td>
                                            <select name="time_limit_type[]" id="time_limit_type" class="form-control input_padding" v-model="row.time_limit_type">
                                                <option value="">-- select --</option>
                                                <option value="">-- select --</option>
                                                <option v-for="time_limit_type in time_limit_types" :value="time_limit_type.id" :key="time_limit_type">
                                                    {{ time_limit_type.title }}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="time_limit[]" id="time_limit" class="form-control input_padding" v-model="row.time_limit">
                                                <option value="">-- select --</option>
                                                <option v-for="time_limit in time_limits" :value="time_limit.id" :key="time_limit">
                                                    {{ time_limit.title }}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="bastobayonkari[]" id="bastobayonkari" class="form-control input_padding" v-model="row.bastobayonkari">
                                                <option value="">-- select --</option>
                                                <option v-for="user in users" :value="user.id" :key="user">
                                                    {{ user.title }}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="bastobayoner_shohojogi[]" id="bastobayoner_shohojogi" class="form-control input_padding" v-model="row.bastobayoner_shohojogi">
                                                <option value="">-- select --</option>
                                                <option v-for="user in users" :value="user.id" :key="user">
                                                    {{ user.title }}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="rating[]" id="rating" class="form-control input_padding" v-model="row.rating">
                                                <option value="">-- select --</option>
                                                <option v-for="item in 365" :value="item.id" :key="item">
                                                    {{ item }}
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-end">
                            <a class="btn btn-sm btn-outline-primary" @click.prevent="add_row"> Add New Row</a>
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
import MultiSelect from "../../components/MultiSelect.vue";

export default {

    data: () => ({
        route_prefix: '',
        form_fields,
        param_id: null,

        is_umbrella:'',
        section:'',
        months: [
            { id: '1', title: 'জানুয়ারি' },
            { id: '2', title: 'ফেব্রুয়ারি' },
            { id: '3', title: 'মার্চ' },
            { id: '4', title: 'এপ্রিল' },
            { id: '5', title: 'মে' },
            { id: '6', title: 'জুন' },
            { id: '7', title: 'জুলাই' },
            { id: '8', title: 'আগস্ট' },
            { id: '9', title: 'সেপ্টেম্বর' },
            { id: '10', title: 'অক্টোবর' },
            { id: '11', title: 'নভেম্বর' },
            { id: '12', title: 'ডিসেম্বর' },
        ],
        sections: [
            {id: 1, title: 'Infrastructure Management'},
            {id: 2, title: 'Software Development'},
            {id: 3, title: 'Cybersecurity'},
        ],
        time_limit_types: [
            { id: 1, title: 'দৈনিক' },
            { id: 2, title: 'সাপ্তাহিক' },
            { id: 3, title: 'দশক' },
            { id: 4, title: 'পাক্ষিক' },
            { id: 5, title: 'মাসিক' },
            { id: 6, title: 'দ্বিমাসিক' },
            { id: 7, title: 'ত্রৈমাসিক' },
            { id: 8, title: 'ষাণ্মাসিক' },
            { id: 9, title: 'বার্ষিক' },
        ],
        time_limits: [
            { id: 1, title: '১ দিন' },
            { id: 2, title: '২ দিন' },
            { id: 3, title: '৩ দিন' },
            { id: 4, title: '৪ দিন' },
            { id: 5, title: '৫ দিন' },
            { id: 6, title: '৬ দিন' },
        ],
        users: [
            { id: 1, title: 'আহমেদ' },
            { id: 2, title: 'মাহমুদ' },
            { id: 3, title: 'রহমান' },
            { id: 4, title: 'করিম' },
            { id: 5, title: 'হোসেন' },
            { id: 6, title: 'উদ্দিন' },
        ],
        ratings: [1,2,3,4,5,6,7,8,9,10],
        submitted: false,
        row_data_object:{
            'porikolponar_biboron': '',
            'time_limit_type': '',
            'time_limit': '',
            'bastobayonkari': '',
            'bastobayoner_shohojogi': '',
            'rating': '',
        },
        row_data:[]

    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;
        this.route_prefix = setup.route_prefix;

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

        add_row:function(){
            this.row_data.push({...this.row_data_object})
        },
        deleteRow(index) {
            this.row_data.splice(index, 1);
        }
    },

    computed: {
        ...mapState(user_store, {
            item: "item",
        }),
    },
}
</script>
