<template>
    <div class="vue_main_container pb-5 mt-3">
        <div class="table_topbar">
            <h2 class="pages_title">{{ setup.create_page_title }}</h2>
            <router-link :to="{ name: `All${setup.route_prefix}` }"  class="btn btn-outline-warning btn-sm">Go Back</router-link>
        </div>
        <form @submit.prevent="submit_form" class="form_border">
            <div class="mb-3 form-group">
                <label for="clause">দফা</label>
                <select name="clause" id="clause" class="form-control input_padding">
                    <option value="">--- select clause ---</option>
                    <option value="দফা ১ঃ দাওয়াত">দফা ১ঃ দাওয়াত</option>
                    <option value="দফা ২ঃ সংগঠন">দফা ২ঃ সংগঠন</option>
                    <option value="দফা ৩ঃ প্রশিক্ষণ">দফা ৩ঃ প্রশিক্ষণ</option>
                    <option value="দফা ৪ঃ ইসলামী শিক্ষা আন্দোলন ও ছাত্র সমস্যার সমাধান">দফা ৪ঃ ইসলামী শিক্ষা আন্দোলন ও ছাত্র সমস্যার সমাধান</option>
                    <option value="দফা ৫ঃ ইসলামী সমাজ বিনির্মাণ">দফা ৫ঃ ইসলামী সমাজ বিনির্মাণ</option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="target_expectation" class="text-nowrap">
                    অর্জিতব্য টার্গেট
                </label>
                <select name="orgitobbo_target" id="orgitobbo_target" class="form-control input_padding">
                    <option value="">--- টার্গেট বাছাই করুন ---</option>
                    <option v-for="orgitobbo_target in orgitobbo_targets" :value="orgitobbo_target.id" :key="orgitobbo_target">
                        {{ orgitobbo_target.title }}
                    </option>
                </select>
            </div>
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

            <button type="submit" class="btn btn-primary submit_button">Submit</button>
        </form>
    </div>
</template>
<script>
// import setup from '../config/setup';
import { mapActions, mapState, storeToRefs } from "pinia";
import { store as data_store } from "./custom_store/store";
import MultiSelect from "../../components/MultiSelect.vue";
export default {

    data:() => ({
        is_umbrella:'',
        section:'',
        orgitobbo_targets: [
            { id: '1', title: 'জনে জনে দাওয়াত' },
            { id: '2', title: 'চলো গ্রামে যাই কর্মসূচী' },
            { id: '3', title: 'বৃক্ষ রোপণ কর্মসূচী' },
            { id: '4', title: 'দাওয়াতি দশক কর্মসূচী' },
            { id: '5', title: 'প্রকাশনা সপ্তাহ' },
        ],
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
        row_data:[],


    }),
    computed:{
        ...mapState(data_store,{
            setup: 'setup',
        }),
    },
    methods:{
        ...mapActions(data_store, {
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
            this.$router.push(`/bivagio-barshik-porikolpona/all`);
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
.karjokori_porikolpona_input_table th,td{
    border: 1px solid rgba(0,0,0,0.17);
    vertical-align: middle;
    text-align: center;
}
.karjokori_porikolpona_input_table th{
    text-align: center;
    font-weight: 600;
}
</style>
