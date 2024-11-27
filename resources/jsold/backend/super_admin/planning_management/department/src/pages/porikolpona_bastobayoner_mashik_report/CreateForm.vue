<template>
    <div class="vue_main_container pb-5 mt-3">
        <div class="table_topbar">
            <h2 class="pages_title">{{ setup.create_page_title }}</h2>
            <router-link :to="{ name: 'Createporikolpona_bastobayoner_mashik_report' }"  class="btn btn-outline-warning btn-sm">Go Back</router-link>
        </div>
        <form @submit.prevent="submit_form" class="form_border">
            <multi-select
                :items="barshik_porikolpona"
                :label="'বার্ষিক পরিকল্পনা'"
                :labelFor="barshik_porikolpona"
                :placeholder="'--- বার্ষিক পরিকল্পনা বাছাই করুন ---'"
            />
            <multi-select
                :items="abastobaito_barshik_porikolpona"
                :label="'অবাস্তবায়িত বার্ষিক পরিকল্পনা'"
                :labelFor="abastobaito_barshik_porikolpona"
                :placeholder="'--- অবাস্তবায়িত বার্ষিক পরিকল্পনা বাছাই করুন ---'"
            />

            <div class="card mb-3">
                <div class="card-header">
                    কার্যকরী পরুকল্পনা যুক্ত করুন
                </div>
                <div class="card-body">
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

            <button type="submit" class="btn btn-primary submit_button">Submit</button>
        </form>
    </div>
</template>
<script>
// import setup from '../config/setup';
import { mapActions, mapState, storeToRefs } from "pinia";
import { store } from "./custom_store/store";
import MultiSelect from "../../components/MultiSelect.vue";
export default {
    components:{
        MultiSelect,
    },
    data:() => ({
        barshik_porikolpona: [
            { id: '1', title: 'বিজ্ঞান - বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '2', title: 'আইটি - বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '3', title: 'ছাত্র কল্যাণ - বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '4', title: 'দপ্তর - বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '5', title: 'প্রকাশনা - বার্ষিক পরিকল্পনা ও কার্যক্রম' },
        ],
        abastobaito_barshik_porikolpona: [
            { id: '1', title: 'অবাস্তবায়িত -১- বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '2', title: 'অবাস্তবায়িত -২- বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '3', title: 'অবাস্তবায়িত -৩- বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '4', title: 'অবাস্তবায়িত -৪- বার্ষিক পরিকল্পনা ও কার্যক্রম' },
            { id: '5', title: 'অবাস্তবায়িত -৫- বার্ষিক পরিকল্পনা ও কার্যক্রম' },
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
        row_data_object:{
            'porikolponar_biboron': '',
            'time_limit_type': '',
            'time_limit': '',
            'bastobayonkari': '',
            'bastobayoner_shohojogi': '',
            'rating': '',
        },
        row_data:[],


        submitted: false,
    }),
    computed:{
        ...mapState(store,{
            setup: 'setup',
        }),

    },
    methods:{
        ...mapActions(store, {
            submit_form_store: 'submit_create_form'
        }),
        submit_form:async function(event){
            // console.log("submitted");
            let formData = new FormData(event.target);
            // for (let [key, value] of formData.entries()) {
            //     console.log(`${key}: ${value}`);
            // }

            await this.submit_form_store({
                form_data:formData,
                department:this.selectedDepartments,
            })
            event.target.reset();
            this.$router.push(`/mashik-porikolponas/create`);
        },
        add_row:function(){
            this.row_data.push({...this.row_data_object})
        },
        deleteRow(index) {
            this.row_data.splice(index, 1);
        }

    },

}
</script>
<style>

</style>
