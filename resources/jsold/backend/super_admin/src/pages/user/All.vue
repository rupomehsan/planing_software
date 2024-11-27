<template>
    <div class="vue_main_container">
        <div class="row">
            <div class="col-sm-12" style="">
                <div class="management_root no_border">
                    <div class="management_heading page-header pb-0">
                        <h3 class="layout_heading">user Management</h3>
                    </div>
                    <div class="management_content_root">
                        <div class="page_content">
                            <div class="explore_window fixed_size">
                                <div class="action_bar">
                                    <div class="navigation">
                                        <ul>
                                            <li class="search_li">
                                                <input class="search" placeholder="search.." id="table_search_box"
                                                    type="search">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="title no_move" id="users_drag">
                                        <h5>staff user</h5>
                                    </div>
                                    <div class="control">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <span class="material-symbols-outlined fill"><i
                                                            class="fa-solid fa-list"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content_body">
                                    <div class="data_list">
                                        <div class="table_responsive custom_scroll">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th><input class=" form-check-input m-0" type="checkbox"></th>
                                                        <th class="col_id">
                                                            <div class="table_heading_label sort">
                                                                <span>ID</span>
                                                                <span class="material-symbols-outlined fill icon"><i
                                                                        class="fa-solid fa-arrow-up-z-a"></i></span>
                                                                <!-- <span class="material-symbols-outlined fill icon"><i class="fa-solid fa-arrow-down-z-a"></i></span> -->
                                                            </div>
                                                        </th>
                                                        <th class="col_uid">
                                                            <div class="table_heading_label sort"><span>User ID</span>
                                                            </div>
                                                        </th>
                                                        <th>Image</th>
                                                        <th class="col_name">
                                                            <div class="table_heading_label sort"><span>Name</span>
                                                            </div>
                                                        </th>
                                                        <th class="col_email">
                                                            <div class="table_heading_label sort"><span>Email</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="all_list">

                                                    <tr class="table_rows table_row_14" v-for="(user,index) in users.data" :key="index">
                                                        <td><span class="icon" @click.prevent="toggle_tr"><i
                                                                    class="fa-solid fa-plus"></i></span>
                                                            <div class="table_action_btns">
                                                                <ul>
                                                                    <li><router-link :to="{name:`details-user`,params: { id: user.id } }">Show</router-link></li>
                                                                    <li><router-link :to="{name:`edit-user`,params: { id: user.id } }">Edit</router-link></li>
                                                                    <!-- <li><a href="#/users/edit/14">Edit</a></li> -->
                                                                    <li><a href="" @click.prevent="delete_user({ id: user.id })">Delete</a></li>
                                                                    <li><a href="" @click.prevent="destroy_user({ id: user.id })">Destroy</a></li>
                                                                    <li></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td><input class="form-check-input  m-0" type="checkbox"></td>
                                                        <td>14</td>
                                                        <td>1002</td>
                                                        <td><img src="/uploads/users/20240630092945.jpg" alt=""
                                                                style="height: 30px;"></td>
                                                        <td><span class="quick_view_trigger">{{user.full_name}}</span></td>
                                                        <td>{{user?.email}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pagination_part">
                                            <ul class="pagination">
                                                <li><a class=""><span class="material-symbols-outlined fill"><i
                                                                class="fa-solid fa-angle-left"></i></span></a>
                                                </li>
                                                <li><a class=""><span class="material-symbols-outlined fill"><i
                                                                class="fa-solid fa-angle-right"></i></span></a>
                                                </li>
                                            </ul>
                                            <div class="showing">1 - 0 of 0</div>
                                            <div class="limit"><select>
                                                    <option value="13">13</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="200">200</option>
                                                </select></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="action_btns">
                                        <ul>
                                            <li><a href="#/users/create"><span class="material-symbols-outlined fill"><i
                                                            class="fa-solid fa-plus"></i></span>
                                                    <div class="text">create new</div>
                                                </a></li>
                                            <li></li>
                                            <li><a href="#"><span class="material-symbols-outlined fill"><i
                                                            class="fa-solid fa-trash"></i></span>
                                                    <div class="text">Recycle bin</div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed } from 'vue';
import { mapActions,mapState } from 'pinia';
import { user_store } from "./config/store/store";
export default {
    methods: {
        toggle_tr() {
            console.log('clicked');
            // document.addEventListener("DOMContentLoaded", function () {
                const icons = document.querySelectorAll(".icon");
                // console.log("icon click inside",icons );
                icons.forEach(function (icon) {
                    icon.addEventListener("click", function () {
                        const row = icon.closest("tr");
                        row.classList.toggle("active");
                    });
                });
            // });
        },
        ...mapActions(user_store, {
            submit_form_store: 'submit_create_form',
            all_user: 'all_user',
            delete_user: 'delete_user',
            destroy_user: 'destroy_user',
        }),

    },
    computed:{
        ...mapState(user_store, {
            users:'users'
        }),
    },
    created: async function(){
        this.all_user();
    }


}
</script>

<style lang="scss" scoped></style>
