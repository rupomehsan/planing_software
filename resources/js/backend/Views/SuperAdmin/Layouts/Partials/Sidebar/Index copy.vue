<template>
    <aside>
        <nav>
            <div class="side_nave">
                <div class="side_nave_topbar">
                    <div class="profile_heading">
                        <div class="profile_image_container">
                            <img src="https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg="
                                alt="">
                        </div>
                        <div class="profile_name_container">
                            <div class="name">
                                Tasnimul Hasan
                            </div>
                            <div class="setting_icon">
                                <a href=""><i class="fa-solid fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_toggle">
                        <a href=""><i class="fa-solid fa-indent"></i></a>
                    </div>
                </div>

                <ul class="side_nave_lists">

                    <dropdown-nav :label="`User`" :name="`Alluser`" :icon="`fa-solid fa-users`"></dropdown-nav>
                    <dropdown-nav :label="`রিপোর্ট সেটআপ`" :icon="`fa-solid fa-users`" :menus="
                    [
                        { name: `Alldofa`, label: `দফা` },
                        { name: `Allorjitobbo_target`, label: `অরজিতব্য টার্গেট` },
                        { name: `Allorjitobbo_target`, label: `কেটেগরি` },
                        { name: `Allorjitobbo_target`, label: `সংখ্যাতাত্ত্বিক তথ্য` },
                        { name: `Allorjitobbo_target`, label: `পরিকল্পনার ধরন ` },
                        { name: `Allorjitobbo_target`, label: `সময়সীমার ধরন` },
                        { name: `Allorjitobbo_target`, label: `সময়কাল` },
                        { name: `Allorjitobbo_target`, label: `মাস ব্যবস্থাপনা` },
                    ]">
                    </dropdown-nav>

                    <!-- <dropdown-nav :label="`User_management`" :icon="`fa-solid fa-users`">
                        <dropdown-single-item :to="{ name: `Alluser` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createuser` }" :label="`create`" />
                    </dropdown-nav>

                    <div class="nav_option">
                        রিপোর্ট সেটআপ
                    </div>
                    <dropdown-nav :label="`দফা`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Alldofa` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createdofa` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`অরজিতব্য টার্গেট`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allorjitobbo_target` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createorjitobbo_target` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`কেটেগরি`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Alldofa` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createdofa` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`সংখ্যাতাত্ত্বিক তথ্য`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Alldofa` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createdofa` }" :label="`create`" />
                    </dropdown-nav>


                    <dropdown-nav :label="`পরিকল্পনার ধরন `" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allporikolponar_dhoron` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createporikolponar_dhoron` }" :label="`create`" />
                    </dropdown-nav>



                    <dropdown-nav :label="`সময়সীমার ধরন`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Alltime_frame_type` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createtime_frame_type` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`সময়কাল`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Alltime_duration` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createtime_duration` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`মাস ব্যবস্থাপনা`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allmonth_management` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createmonth_management` }" :label="`create`" />
                    </dropdown-nav>

                    <div class="nav_option">
                        বিভাগ ব্যবস্থাপনা
                    </div>

                    <dropdown-nav :label="`বিভাগীয় সেকশন `" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivag_section` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivag_section` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`বিভাগীয় সাবসেকশন `" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivag_sub_section` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivag_sub_section` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`বিভাগ `" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivag` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivag` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`বিভাগ রোল`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivag_role` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivag_role` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`বিভাগ সদস্য`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivag_member` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivag_member` }" :label="`create`" />
                    </dropdown-nav>

                    <div class="nav_option">
                        কেন্দ্রিও
                    </div>

                    <dropdown-nav :label="`বার্ষিক পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `AllBarshikPorikolpona` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `CreateBarshikPorikolpona` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`বার্ষিক কার্যকরী পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbarshik_karjokori_porikolpona` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbarshik_karjokori_porikolpona` }" :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`Barsik Porikolpona`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`AllBarshikPorikolpona`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`CreateBarshikPorikolpona`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`Task`" :icon="`fa-solid fa-users`">
                        <dropdown-single-item
                            :to="{name:`AllTask`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`CreateTask`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`কেন্দ্রিও বার্ষিক পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`AllKendrioBarshikPorikolpona`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`CreateKendrioBarshikPorikolpona`}"
                            :label="`create`" />
                    </dropdown-nav> -->


                    <!-- <div class="nav_option">
                        বিভাগীয়
                    </div>

                    <dropdown-nav :label="`বার্ষিক পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivagio_barshik_porikolpona` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivagio_barshik_porikolpona` }" :label="`create`" />
                    </dropdown-nav>


                    <dropdown-nav :label="`বার্ষিক কার্যকরী পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivagio_barshik_karjokori_porikolpona` }"
                            :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivagio_barshik_karjokori_porikolpona` }"
                            :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`কার্যকরী পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbivagio_karjokori_porikolpona` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbivagio_karjokori_porikolpona` }" :label="`create`" />
                    </dropdown-nav>

                    <div class="nav_option">
                        বিভাগীয় বাজেট
                    </div>
                    <dropdown-nav :label="`বাজেট আয়`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbudget` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbudget` }" :label="`create`" />
                    </dropdown-nav>

                    <dropdown-nav :label="`বাজেট ব্যয়`" :icon="`fa fa-list`">
                        <dropdown-single-item :to="{ name: `Allbudget` }" :label="`all`" />
                        <dropdown-single-item :to="{ name: `Createbudget` }" :label="`create`" />
                    </dropdown-nav> -->




                    <!-- <dropdown-nav :label="`মাসিক পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allmashik_porikolpona`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createmashik_porikolpona`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`মাসিক কার্যকরী পরিকল্পনা`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allmashik_karjokori_porikolpona`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createmashik_karjokori_porikolpona`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`পরিকল্পনা বাস্তবায়নের মাসিক রিপোর্ট`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allporikolpona_bastobayoner_mashik_report`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createporikolpona_bastobayoner_mashik_report`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`কার্যকরী পরিকল্পনা বাস্তবায়নের মাসিক রিপোর্ট`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allkarjokori_porikolpona_bastobayoner_mashik_report`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createkarjokori_porikolpona_bastobayoner_mashik_report`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`পরিকল্পনা বাস্তবায়নের ত্রৈমাসিক/ষাণ্মাসিক/বার্ষিক রিপোর্ট`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allporikolpona_bastobayoner_troimashik_shanmashik_barshik_report`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createporikolpona_bastobayoner_troimashik_shanmashik_barshik_report`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`কেন্দ্রিও পরিকল্পনা বাস্তবায়নের রিপোর্ট`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allkendrer_porikolpona_bastobayoner_report`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createkendrer_porikolpona_bastobayoner_report`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`বিভাগের পরিকল্পনা বাস্তবায়নের রিপোর্ট`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allbivager_porikolpona_bastobayoner_report`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createbivager_porikolpona_bastobayoner_report`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`আর্কাইভ (পর্যালোচনা)`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`Allarchive`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`Createarchive`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`বার্ষিক বাজেট`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`AllTask`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`CreateTask`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`শাখা থেকে প্রাপ্ত/সংগৃহীত রিপোর্ট`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`AllTask`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`CreateTask`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`ব্যবহারবিধি`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`AllTask`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`CreateTask`}"
                            :label="`create`" />
                    </dropdown-nav> -->

                    <!-- <dropdown-nav :label="`বিবিধ`" :icon="`fa fa-list`">
                        <dropdown-single-item
                            :to="{name:`AllTask`}"
                            :label="`all`" />
                        <dropdown-single-item
                            :to="{name:`CreateTask`}"
                            :label="`create`" />
                    </dropdown-nav> -->
                </ul>

                <div class="line_divider"></div>
            </div>
        </nav>
    </aside>
</template>

<script>
//auth_store
import { auth_store } from "../../../../../GlobalStore/auth_store";
import { site_settings_store } from "../../../../../GlobalStore/site_settings_store";
import { mapState, mapActions } from "pinia";
//components
import DropdownNav from './DropdownNav.vue';
import DropdownSingleItem from './DropdownSingleItem.vue';
export default {
    components: { DropdownNav, DropdownSingleItem },

    methods: {
        ...mapActions(site_settings_store, {
            get_setting_value: "get_setting_value",
        }),

        logout_submit: function () {
            let confirm = window.confirm("logout");
            if (confirm) {
                this.log_out();
            }
        },
        toggle_menu: function () {
            document.getElementById("wrapper").classList.toggle("toggled");
        },
    },
    computed: {
        ...mapState(auth_store, {
            auth_info: "auth_info",
        }),
    },
};
</script>

<style></style>
<!-- <side-bar-drop-down-menus :icon="`fa fa-plus`" :icon_image="`https://files.etek.com.bd/images/icon_sales.png`"
    :menu_title="`title Management`" :menus="[
                {
                    route_name: `AllUser`,
                    title: `title`,
                    icon: `zmdi zmdi-dot-circle-alt`,
                },
            ]" /> -->
