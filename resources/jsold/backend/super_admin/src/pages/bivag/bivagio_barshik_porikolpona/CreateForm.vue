<template>
    <div class="vue_main_container pb-5 mt-3">
        <div class="table_topbar">
            <h2 class="pages_title">{{ setup.create_page_title }}</h2>
            <router-link :to="{ name:`Create${setup.route_prefix}` }"  class="btn btn-outline-warning btn-sm">Go Back</router-link>
        </div>
        <form @submit.prevent="submit_form" class="form_border">
            <div class="mb-3 form-group">
                <label for="section">
                    সেকশন
                </label>
                <select name="section" id="section" class="form-control input_padding" v-model="section">
                    <option value="">--- সেকশন বাছাই করুন ---</option>
                    <option v-for="section in sections" :value="section.id" :key="section">
                        {{ section.title }}
                    </option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="scheme">
                    সাব সেকশন
                </label>
                <select name="sub_section" id="sub_section" class="form-control input_padding">
                    <option value="">--- সাব সেকশন বাছাই করুন ---</option>
                    <option v-for="sub_section in sub_sections" :value="sub_section.id" :key="sub_section">
                        {{ sub_section.title }}
                    </option>
                </select>
            </div>
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
                <label for="scheme">
                    পরিকল্পনার ধরন
                </label>
                <select name="scheme" id="scheme" class="form-control input_padding">
                    <option value="">--- প্ল্যানের ক্যাটাগরি বাছাই করুন ---</option>
                    <option v-for="plan_category in plan_categories" :value="plan_category.id" :key="plan_category">
                        {{ plan_category.title }}
                    </option>
                </select>
            </div>
            <!-- <div class="mb-3 form-group">
                <label for="target_expectation">
                    সেকশন
                </label>
                <input type="text" name="target_expectation" class="form-control input_padding" id="target_expectation" >
            </div> -->
            <!-- <div class="mb-3 form-group">
                <label for="action_plan" class="form-label  text-dark">
                    কর্ম পরিকল্পনা
                </label>
                <input type="text" name="action_plan" class="form-control input_padding" id="action_plan" >
            </div> -->

            <div class="mb-3 form-group">
                <label for="porikolponar_biboron" class="form-label  text-dark">
                    পরিকল্পনার বিবরন
                </label>
                <!-- <input type="text" name="action_plan" class="form-control input_padding" id="action_plan" > -->
                 <textarea class="form-control " name="porikolponar_biboron" id="porikolponar_biboron" rows="2"></textarea>
            </div>

            <div class="mb-3 form-group">
                <label for="scheme">
                    সংখ্যাতাত্ত্বিক তথ্য
                </label>
                <select name="scheme" id="scheme" class="form-control input_padding">
                    <option value="">--- প্ল্যানের ক্যাটাগরি বাছাই করুন ---</option>
                    <option v-for="item in 10" :value="item" :key="item">
                        {{ item }}
                    </option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="scheme">
                    ডেডলাইন
                </label>
                <input type="date" name="action_plan" class="form-control input_padding" id="action_plan" >
            </div>
            <div class="mb-3 form-group">
                <label for="action_plan" class="form-label  text-dark">
                    বাস্তবায়নের মাস
                </label>
                <input type="text" name="action_plan" class="form-control input_padding" id="action_plan" value="আগস্ট" disabled>
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
                    মন্তব্য
                </label>
                <input type="text" name="action_plan" class="form-control input_padding" id="action_plan" >
            </div>
            <div class="mb-3 form-group">
                <div>
                    <label for="scheme">
                        বাজেট
                    </label>
                    <a href="#" class="btn btn-sm btn-outline-info ms-2">বাজেট দেখুন</a>
                </div>
                <select name="scheme" id="scheme" class="form-control input_padding" >
                    <option value="">--- প্ল্যানের ক্যাটাগরি বাছাই করুন ---</option>
                    <option v-for="scheme in schemes" :value="scheme.id" :key="scheme">
                        {{ scheme.title }}
                    </option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="action_plan" class="form-label  text-dark">
                    রেটিং
                </label>
                <input type="text" name="action_plan" class="form-control input_padding" id="action_plan" >
            </div>
            <div class="mb-3 d-flex justify-content-start align-items-center gap-2 ps-3">
                <label for="is_umbrella" class="form-label text-dark">
                    ইস-আম্ব্রেলা?
                </label>
                <div>
                    <input type="checkbox" id="is_umbrella" name="is_umbrella" v-model="is_umbrella">
                </div>
            </div>
            <div class="mb-3 form-group" v-if="is_umbrella == true">
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
            <!-- <template v-if="selectedDepartmentsData.length > 0">
                <div v-for="(data,index) in selectedDepartmentsData" class="mb-3 form-group" :key="index">
                    <label :for="`rating_dep_${data.id}`">Rating of {{ data.title }}</label>
                    <select :name="`rating_dep_${data.id}`" :id="`rating_dep_${data.id}`" class="form-control input_padding">
                        <option value="">--- select rating ---</option>
                        <option v-for="rating in ratings" :value="rating" :key="rating">{{ rating }}</option>
                    </select>
                </div>
            </template> -->
            <button type="submit" class="btn btn-primary submit_button">Submit</button>
        </form>
    </div>
</template>
<script>
// import setup from '../config/setup';
import { mapActions, mapState, storeToRefs } from "pinia";
import { store as data_store } from "./custom_store/store";
export default {
    data:() => ({
        is_umbrella:'',
        section:'',
        sub_section:'',
        departments: [
            { id: '1', title: 'বিজ্ঞান' },
            { id: '2', title: 'আইটি' },
            { id: '3', title: 'ছাত্র কল্যাণ' },
            { id: '4', title: 'দপ্তর' },
            { id: '5', title: 'প্রকাশনা' },
        ],
        ratings: [1,2,3,4,5,6,7,8,9,10],
        sections: [
            {id: 1, title: 'Infrastructure Management'},
            {id: 2, title: 'Software Development'},
            {id: 3, title: 'Cybersecurity'},
        ],
        sub_sections: [
            {id: 1, section_id:1, title: 'Network Administration'},
            {id: 2, section_id:1, title: 'Server Management'},
            {id: 3, section_id:1, title: 'Hardware Maintenance'},

            {id: 4, section_id:2, title: 'Application Development'},
            {id: 5, section_id:2, title: 'Software Maintenance'},
            {id: 6, section_id:2, title: 'Quality Assurance'},

            {id: 7, section_id:2, title: 'Security Policy Development'},
            {id: 8, section_id:2, title: 'Threat Monitoring and Response'},
            {id: 9, section_id:2, title: 'Data Protection'},
        ],
        plan_categories: [
            {id: 1, title: 'নিয়মিত কাজ'},
            {id: 2, title: 'ডেডলাইনভিত্তিক কাজ'},
            {id: 3, title: 'লক্ষ্যমাত্রাভিত্তিক কাজ'},
            {id: 4, title: 'মোটিভেশনমূলক কাজ'},
            {id: 5, title: 'শিডিউলভিত্তিক কাজ'},
        ],
        schemes: [
            {id: 1, title: 'ছক ১'},
            {id: 1, title: 'ছক ২'},
            {id: 1, title: 'ছক ৩'},
            {id: 1, title: 'ছক ৪'},
        ],
        selectedDepartments: [],
        selectedDepartmentsData: [],
        isDropdownOpen: false,
        submitted: false,
    }),
    computed:{
        ...mapState(data_store,{
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
            this.$router.push(`/bivagio-barshik-porikolpona/create`);
        },
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },

        updateSelectedDepartmentsData() {
            this.selectedDepartmentsData = this.selectedDepartments.map((selectedId) => {
                const option = this.departments.find((dep) => dep.title === selectedId);
                return option ? { id: option.id, title: option.title } : null;
            }).filter(item => item !== null);
        }
    },
    watch: {
        // Close dropdown if the user clicks outside
        selectedDepartments(newValue) {
            if (newValue.length === 0) {
                this.isDropdownOpen = false;
            }
            this.updateSelectedDepartmentsData();
        },

        section(newSectionId) {
            this.filteredSubSections = this.sub_sections.filter(sub => sub.section_id === parseInt(newSectionId));
        }


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
