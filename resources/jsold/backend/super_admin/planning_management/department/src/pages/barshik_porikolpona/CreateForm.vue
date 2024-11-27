<template>
    <div class="vue_main_container pb-5 mt-3">
        <div class="table_topbar">
            <h2 class="pages_title">{{ setup.create_page_title }}</h2>
            <router-link :to="{ name: 'CreateKendrioBarshikPorikolpona' }"  class="btn btn-outline-warning btn-sm">Go Back</router-link>
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
                <label for="action_plan" class="form-label  text-dark">
                    কর্ম পরিকল্পনা
                </label>
                <input type="text" name="action_plan" class="form-control input_padding" id="action_plan" >
            </div>
            <div class="mb-3 form-group">
                <label for="scheme">
                    ছক
                </label>
                <select name="scheme" id="scheme" class="form-control input_padding">
                    <option value="">--- ছক বাছাই করুন ---</option>
                    <option v-for="scheme in schemes" :value="scheme.id" :key="scheme">
                        {{ scheme.title }}
                    </option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="implementing_departments">
                    বাস্তবায়নকারী বিভাগ
                </label>
                <div class="custom_select">
                    <div class="select_selected form-control input_padding" @click="toggleDropdown">{{ selectedDepartments.length ? "" : '--- select departments ---' }}
                        <template v-if="selectedDepartments.length > 0">
                            <span class="selected_text" v-for="(item,index) in selectedDepartmentsData" :key="index">{{ item.title }}</span>
                        </template>
                    </div>
                    <div class="select_items" v-show="isDropdownOpen">
                        <label class="px-2" v-for="department in departments" :key="department.id">
                            <input type="checkbox" :value="department.title" v-model="selectedDepartments" /> {{ department.title }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3 form-group" v-for="(department,index) in selectedDepartmentsData" :key="index">
                <label for="">{{ department.title }} বিভাগের রেটিং</label>
                <input type="text" :name="'rating_' + department.id" :id="'rating_' + department.id" class="form-control input_padding" >
            </div>

            <div class="mb-3 form-group">
                <label for="implementing_departments">
                    বাস্তবায়নের মাস
                </label>
                <div class="custom_select">
                    <div class="select_selected form-control input_padding" @click="toggle_month_dropdown">{{ selected_months_data.length ? "" : '--- select ---' }}
                        <template v-if="selected_months_data.length > 0">
                            <span class="selected_text" v-for="(item,index) in selected_months_data" :key="index">{{ item.title }}</span>
                        </template>
                    </div>
                    <div class="select_items" v-show="is_month_dropdown_open">
                        <label class="px-2" v-for="month in months" :key="month.id">
                            <input type="checkbox" :value="month.title" v-model="selected_months" /> {{ month.title }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3 form-group">
                <label for="unimplemented_plan" class="form-label  text-dark">
                    পরিকল্পনার অবাস্তবায়িত অংশ
                </label>
                <div class="input-group">
                    <input type="number" name="unimplemented_plan" class="form-control input_padding" id="unimplemented_plan" min="0" max="100" step="0.01" aria-describedby="percentage-addon">
                    <span class="input-group-text" id="percentage-addon">%</span>
                </div>
            </div>
            <div class="mb-3 form-group">
                <label for="action_plan" class="form-label  text-dark">
                    Suggestion
                </label>
                <textarea name="suggestion" class="form-control input_padding" id="suggestion" placeholder="Write your suggestion here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary submit_button">Submit</button>
        </form>
    </div>
</template>
<script>
// import setup from '../config/setup';
import { mapActions, mapState, storeToRefs } from "pinia";
import { store } from "./custom_store/store";
export default {

    data:() => ({
        departments: [
            { id: '1', title: 'বিজ্ঞান' },
            { id: '2', title: 'আইটি' },
            { id: '3', title: 'ছাত্র কল্যাণ' },
            { id: '4', title: 'দপ্তর' },
            { id: '5', title: 'প্রকাশনা' },
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
            { id: '12', title: 'ডিসেম্বর' }
        ],
        ratings: [1,2,3,4,5,6,7,8,9,10],
        schemes: [
            {id: 1, title: 'ছক ১'},
            {id: 1, title: 'ছক ২'},
            {id: 1, title: 'ছক ৩'},
            {id: 1, title: 'ছক ৪'},
        ],
        selectedDepartments: [],
        selectedDepartmentsData: [],
        isDropdownOpen: false,
        selected_months: [],
        selected_months_data: [],
        is_month_dropdown_open: false,
        submitted: false,

    }),
    computed:{
        ...mapState(store,{
            setup: 'setup',
        }),

        // selectedDepartmentsTitle:function() {
        //     return this.selectedDepartments.map((selectedId) => {
        //         const option = this.departments.find((dep) => dep.id === selectedId);
        //         return option ? { id: option.id, title: option.title } : null;
        //     }).filter(item => item !== null);;
        // },
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
                month:this.selected_months,
            })
            event.target.reset();
            this.$router.push(`/kendrio-barshik-porikolponas/create`);
        },
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
            if(this.isDropdownOpen == true){
                this.is_month_dropdown_open = false
            }
        },
        toggle_month_dropdown() {
            this.is_month_dropdown_open = !this.is_month_dropdown_open;
            if(this.is_month_dropdown_open == true){
                this.isDropdownOpen = false
            }
        },

        updateSelectedDepartmentsData() {
            this.selectedDepartmentsData = this.selectedDepartments.map((selectedId) => {
                const option = this.departments.find((dep) => dep.title === selectedId);
                return option ? { id: option.id, title: option.title } : null;
            }).filter(item => item !== null);
        },

        update_selected_months_data() {
            this.selected_months_data = this.selected_months.map((selectedId) => {
                const option = this.months.find((month) => month.title === selectedId);
                return option ? { id: option.id, title: option.title } : null;
            }).filter(item => item !== null);
        },

    },
    watch: {
        // Close dropdown if the user clicks outside
        selectedDepartments(newValue) {
            if (newValue.length === 0) {
                this.isDropdownOpen = false;
            }
            this.updateSelectedDepartmentsData();
        },
        selected_months(newValue) {
            if (newValue.length === 0) {
                this.is_month_dropdown_open = false;
            }
            this.update_selected_months_data();
        },

    }
}
</script>
<style>
.custom_select{
    position: relative;
}
.select_items {
    display: flex;
    flex-direction: column;
    position: absolute;
    max-height: 90px;
    overflow-y: scroll;
    scrollbar-width: none;
    box-shadow: 0px 2px 5px 0px rgb(49 49 71 / 65%);
    padding: 5px;
    z-index: 999;
    background-color: white;
}
.selected_text {
    font-size: 12px;
    line-height: 12px;
    padding: 2px 5px;
    box-shadow: 0px 0px 5px 1px rgba(0, 0, 255, .2);
    margin-right: 5px;
    top: calc(100% + 5px);
}
</style>
