<template>
    <div class="vue_main_container">
        <div class="table_topbar mb-3">
            <h2 class="pages_title">{{ setup.details_page_title }}</h2>
            <router-link :to="{ name: 'all-user' }"  class="btn btn-sm btn-primary">All User</router-link>
        </div>
        <table class="table table-responsive">
            <thead class="table-success">
                <tr>
                    <th>Title</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{user.full_name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{user.email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import { mapActions,mapState } from 'pinia';
import { user_store } from "./config/store/store";
import { computed } from 'vue';
export default {
    data: ()=>({
    }),
    methods:{
        ...mapActions(user_store, {
            user_details: 'show_user_details',
        }),
    },
    computed:{
        ...mapState(user_store, {
            user:'user_details',
            setup: 'setup',
        }),
    },
    created: async function(){
        this.user_details(this.$route.params.id);
    }
}
</script>
<style lang="">

</style>
