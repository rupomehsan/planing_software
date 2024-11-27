<template>
    <div class="vue_main_container pb-5 mt-3">
        <div class="table_topbar">
            <h2 class="pages_title">{{ setup.create_page_title }}</h2>
            <router-link :to="{ name: `Create${setup.route_prefix}` }"  class="btn btn-outline-warning btn-sm">Go Back</router-link>
        </div>
        <form @submit.prevent="submit_form" class="form_border">

            <div class="mb-3 form-group">
                <label for="montobbo">
                    চিন্তা/আইডিয়া/মন্তব্য
                </label>
                <textarea name="montobbo" id="montobbo" class="form-control input_padding" cols="30" rows="10"></textarea>
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
            })
            event.target.reset();
            this.$router.push(`/barshik-porikolponas/create`);
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
