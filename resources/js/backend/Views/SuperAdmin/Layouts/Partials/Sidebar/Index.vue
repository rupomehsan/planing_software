<template>
    <aside>
        <nav>
            <div class="side_nave">
                <div class="side_nave_topbar">
                    <h5>Super Admin</h5>
                    <div class="sidebar_toggle">
                        <a href="javascript:void(0)"><i class="fa-solid fa-indent"></i></a>
                    </div>
                </div>

                <ul class="side_nave_lists">
                    <li>
                        <div class="profile_heading">
                            <div class="profile_image_container">
                                <img src="https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg="
                                    alt="">
                            </div>
                            <div class="profile_name_container">
                                <div class="name">
                                    Tasnimul Hasan
                                </div>

                            </div>
                        </div>
                    </li>

                    <dropdown-nav :label="`ড্যাশবোর্ড`" :name="`SuperAdminDashboard`"
                        :icon="`fa fa-list`"></dropdown-nav>
                    <dropdown-nav :label="`পরিকল্পনা ব্যবস্থাপনা`" :icon="`fa fa-list`" :menus="[
                        { name: `Alldofa`, label: `দফা` },
                        { name: `Allorjitobbo_target`, label: `অরজিতব্য টার্গেট` },
                        { name: `Allcategories`, label: `কেটেগরি` },
                        { name: `Allorjitobbo_target`, label: `সংখ্যাতাত্ত্বিক তথ্য` },
                        { name: `Allorjitobbo_target`, label: `পরিকল্পনার ধরন ` },
                        { name: `Allorjitobbo_target`, label: `সময়সীমার ধরন` },
                        { name: `Allorjitobbo_target`, label: `সময়কাল` },
                        { name: `Allorjitobbo_target`, label: `মাস ব্যবস্থাপনা` },
                    ]">
                    </dropdown-nav>



                    <dropdown-nav :label="`বিভাগ ব্যবস্থাপনা`" :icon="`fa fa-list`" :menus="[
                        { name: `Alldofa`, label: `দফা` },
                        { name: `Allorjitobbo_target`, label: `বিভাগীয় সেকশন` },
                        { name: `Allorjitobbo_target`, label: `বিভাগীয় সাবসেকশন` },
                        { name: `Allorjitobbo_target`, label: `বিভাগ` },
                        { name: `Allorjitobbo_target`, label: `বিভাগ রোল ` },
                        { name: `Allorjitobbo_target`, label: `বিভাগ সদস্য` },
                    ]">
                    </dropdown-nav>

                    <dropdown-nav :label="`কেন্দ্রিও পরিকল্পনা`" :icon="`fa fa-list`" :menus="[
                        { name: `Alldofa`, label: `বার্ষিক পরিকল্পনা` },
                        { name: `Allorjitobbo_target`, label: `বিভাগীয় সেকশন` },
                        { name: `Allorjitobbo_target`, label: `বার্ষিক কার্যকরী পরিকল্পনা` },
                    ]">
                    </dropdown-nav>

                    <dropdown-nav :label="`বিভাগীয় পরিকল্পনা`" :icon="`fa fa-list`" :menus="[
                        { name: `Alldofa`, label: `বার্ষিক পরিকল্পনা` },
                        { name: `Allorjitobbo_target`, label: `বার্ষিক কার্যকরী পরিকল্পনা` },
                        { name: `Allorjitobbo_target`, label: `কার্যকরী পরিকল্পনা` },
                    ]">
                    </dropdown-nav>

                    <dropdown-nav :label="` বিভাগীয় বাজেট`" :icon="`fa fa-list`" :menus="[
                        { name: `Alldofa`, label: `বাজেট আয়` },
                        { name: `Allorjitobbo_target`, label: `বাজেট ব্যয়` },
                    ]">
                    </dropdown-nav>

                    <dropdown-nav :label="`রিপোর্ট`" :icon="`fa fa-list`" :menus="[
                        { name: `Alldofa`, label: `পরিকল্পনা বাস্তবায়নের মাসিক রিপোর্ট` },
                        { name: `Allorjitobbo_target`, label: `কার্যকরী পরিকল্পনা বাস্তবায়নের মাসিক রিপোর্ট` },
                        { name: `Allorjitobbo_target`, label: `পরিকল্পনা বাস্তবায়নের ত্রৈমাসিক/ষাণ্মাসিক/বার্ষিক রিপোর্ট` },
                        { name: `Allorjitobbo_target`, label: `পরিকল্পনা বাস্তবায়নের ত্রৈমাসিক/ষাণ্মাসিক/বার্ষিক রিপোর্ট` },
                        { name: `Allorjitobbo_target`, label: `কেন্দ্রিও পরিকল্পনা বাস্তবায়নের রিপোর্ট` },
                        { name: `Allorjitobbo_target`, label: `বিভাগের পরিকল্পনা বাস্তবায়নের রিপোর্ট` },
                        { name: `Allorjitobbo_target`, label: `শাখা থেকে প্রাপ্ত/সংগৃহীত রিপোর্ট` },
                    ]">
                    </dropdown-nav>

                    <dropdown-nav :label="`আর্কাইভ (পর্যালোচনা)`" :name="`Alluser`" :icon="`fa fa-list`">
                    </dropdown-nav>
                    <dropdown-nav :label="`বার্ষিক বাজেট`" :name="`Alluser`" :icon="`fa fa-list`"> </dropdown-nav>
                    <dropdown-nav :label="`ব্যবহারবিধি`" :name="`Alluser`" :icon="`fa fa-list`"> </dropdown-nav>
                    <dropdown-nav :label="`বিবিধ`" :name="`Alluser`" :icon="`fa fa-list`"> </dropdown-nav>
                    <dropdown-nav :label="`ব্যবহারকারী`" :name="`Alluser`" :icon="`fa fa-list`"></dropdown-nav>

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

<style scoped>
.profile_heading {
    display: grid;
    justify-items: center;
    align-items: center;
    padding: 15px 0px;
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 10px;
}
</style>
