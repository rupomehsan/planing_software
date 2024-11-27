<template>
    <div class="vue_main_container ">
        <div class="table_topbar mb-3">
            <h2 class="pages_title">{{ setup.create_page_title }}</h2>
            <router-link :to="{ name: 'create-user' }"  class="btn btn-sm btn-primary">পিছনে যানে</router-link>
        </div>
        <form @submit.prevent="submit_form">
            <div class="mb-3 form-group">
                <label for="full_name" class="form-label  text-dark">Full Name</label>
                <input type="text" name="full_name" class="form-control" id="title" >
            </div>
            <div class="mb-3 form-group">
                <label for="email" class="form-label  text-dark">Email</label>
                <input type="email" name="email" class="form-control" id="title" >
            </div>
            <div class="mb-3 form-group">
                <label for="password" class="form-label  text-dark">Password</label>
                <input type="password" name="password" class="form-control" id="title" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>
// import setup from '../config/setup';
import { mapActions, mapState } from "pinia";
import { user_store } from "../config/store/store";
export default {
    data:() => ({

    }),
    computed:{
        ...mapState(user_store,{
            setup: 'setup',
        })
    },
    methods:{
        ...mapActions(user_store, {
            submit_form_store: 'submit_create_form'
        }),
        submit_form:async function(event){
            console.log("submitted");
            let formData = new FormData(event.target);
            await this.submit_form_store({
                form_data:formData,
            })
            event.target.reset();
        }
    }


}
</script>
<style></style>
