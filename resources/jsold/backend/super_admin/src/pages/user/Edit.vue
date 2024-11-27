<template>
    <div class="vue_main_container">
        <div class="table_topbar mb-3">
            <h2 class="pages_title">{{ setup.edit_page_title }}</h2>
        </div>
        <form @submit.prevent="update_data">
            <input type="text" name="id" :value="user.id" class="d-none">
            <div class="mb-3 form-group">
                <label for="full_name" class="form-label  text-dark">Name</label>
                <input type="text" :value="user.full_name"
                    name="full_name" class="form-control" id="full_name">
            </div>
            <div class="mb-3 form-group">
                <label for="email" class="form-label  text-dark">Email</label>
                <input type="email" :value="user.email"
                    name="email" class="form-control" id="email">
            </div>
            <div class="mb-3 form-group">
                <label for="password" class="form-label  text-dark">Password</label>
                <input type="password"
                    name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>
import { mapActions, mapState } from 'pinia';
import { user_store } from './config/store/store';

export default {
    // props: {
    //     id: {
    //         type: String,
    //         required: true,
    //     },
    // },
    // data: ()=>({
    //     form_data: {
    //         full_name: user.full_name,
    //         email: '',
    //         password: '',
    //     }
    // }),
    computed:{
        ...mapState(user_store,{
            setup: 'setup',
            user:'user_details',
        }),
    },
    created:async function(){
        this.user_details(this.$route.params.id);
    },
    methods:{
        ...mapActions(user_store, {
            user_details: 'show_user_details',
            update_user: 'update_user',
        }),

        update_data:async function(event){
            console.log("submitted submit_form update_data");
            let formData = new FormData(event.target);
            await this.update_user({
                form_data:formData,
            })

        }
    }
}
</script>
<style lang="">

</style>
