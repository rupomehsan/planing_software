<template>
    <aside>
        <nav>
            <div class="side_nave">
                <div class="side_nave_topbar">
                    <h5>Super Admin</h5>
                    <div class="sidebar_toggle">
                        <a href="javascript:void(0)"
                            ><i class="fa-solid fa-indent"></i
                        ></a>
                    </div>
                </div>
                <ul class="side_nave_lists">
                    <li>
                        <div class="profile_heading">
                            <div class="">
                                <img
                                    :src="auth_info.image ?? 'avatar.png'"
                                    alt=""
                                    height="50"
                                    width="50"
                                    class="border-radius rounded-circle"
                                />
                            </div>
                            <div class="profile_name_container text-center">
                                <div class="name">{{ auth_info.name }}</div>
                            </div>
                        </div>
                    </li>

                    <dropdown-nav
                        :label="`ড্যাশবোর্ড`"
                        :name="`SuperAdminDashboard`"
                        :icon="`fa fa-list`"
                    ></dropdown-nav>
                    <dropdown-nav
                        :label="`পরিকল্পনা ব্যবস্থাপনা`"
                        :icon="`fa fa-list`"
                        :menus="[
                            { name: `AllDofa`, label: `দফা` },
                            {
                                name: `Allorjitobbo_target`,
                                label: `অর্জিতব্য টার্গেট`,
                            },
                            { name: `Allcategories`, label: `কেটেগরি` },
                            {
                                name: `Allsonkha_tattik_totthos`,
                                label: `সংখ্যাতাত্ত্বিক তথ্য`,
                            },
                            { name: `AllPlanTypes`, label: `পরিকল্পনার ধরন ` },
                            {
                                name: `Allschedule_types`,
                                label: `সময়সীমার ধরন`,
                            },
                            { name: `Allschedules`, label: `সময়কাল` },
                            {
                                name: `Allsession`,
                                label: `সেশন`,
                            },
                        ]"
                    >
                    </dropdown-nav>

                    <dropdown-nav
                        :label="`কেন্দ্রিও পরিকল্পনা`"
                        :icon="`fa fa-list`"
                        :menus="[
                            {
                                name: `Allcentral_yearly_plans`,
                                label: `বার্ষিক পরিকল্পনা`,
                            },
                            // {
                            //     name: `Allcentral_yearly_exicutive_plans`,
                            //     label: ` কার্যকরী পরিকল্পনা`,
                            // },
                            // { name: `Allorjitobbo_target`, label: `বিভাগীয় সেকশন` },
                        ]"
                    >
                    </dropdown-nav>

                    <dropdown-nav
                        :label="`বিভাগীয় পরিকল্পনা`"
                        :icon="`fa fa-list`"
                        :menus="[
                            {
                                name: `Alldepartment_yearly_plans`,
                                label: `বার্ষিক পরিকল্পনা`,
                            },
                            {
                                name: `Alldepartment_yearly_exicutive_plans`,
                                label: `বার্ষিক কার্যকরী পরিকল্পনা`,
                            },
                            {
                                name: `Allorjitobbo_target`,
                                label: `কার্যকরী পরিকল্পনা`,
                            },
                        ]"
                    >
                    </dropdown-nav>

                    <dropdown-nav
                        :label="`বিভাগ ব্যবস্থাপনা`"
                        :icon="`fa fa-list`"
                        :menus="[
                            {
                                name: `AllDepartmentSection`,
                                label: `বিভাগীয় সেকশন`,
                            },
                            {
                                name: `AllDepartmentSubSection`,
                                label: `বিভাগীয় সাবসেকশন`,
                            },
                            { name: `AllDepartmentDivision`, label: `বিভাগ` },
                            { name: `AllDepartmentRole`, label: `বিভাগ রোল ` },
                            {
                                name: `AllDepartmentMember`,
                                label: `বিভাগ সদস্য`,
                            },
                        ]"
                    >
                    </dropdown-nav>

                    <dropdown-nav
                        :label="` বিভাগীয় বাজেট`"
                        :icon="`fa fa-list`"
                        :menus="[
                            { name: `Allincome`, label: `বাজেট আয়` },
                            { name: `Allexpense`, label: `বাজেট ব্যয়` },
                        ]"
                    >
                    </dropdown-nav>

                    <dropdown-nav
                        :label="`রিপোর্ট`"
                        :icon="`fa fa-list`"
                        :menus="[
                            { label: `পরিকল্পনা বাস্তবায়নের মাসিক রিপোর্ট` },
                            {
                                label: `কার্যকরী পরিকল্পনা বাস্তবায়নের মাসিক রিপোর্ট`,
                            },
                            {
                                label: `পরিকল্পনা বাস্তবায়নের ত্রৈমাসিক/ষাণ্মাসিক/বার্ষিক রিপোর্ট`,
                            },
                            {
                                label: `পরিকল্পনা বাস্তবায়নের ত্রৈমাসিক/ষাণ্মাসিক/বার্ষিক রিপোর্ট`,
                            },
                            {
                                label: `কেন্দ্রিও পরিকল্পনা বাস্তবায়নের রিপোর্ট`,
                            },
                            { label: `বিভাগের পরিকল্পনা বাস্তবায়নের রিপোর্ট` },
                            { label: `শাখা থেকে প্রাপ্ত/সংগৃহীত রিপোর্ট` },
                        ]"
                    >
                    </dropdown-nav>

                    <dropdown-nav
                        :label="`আর্কাইভ (পর্যালোচনা)`"
                        :icon="`fa fa-list`"
                    >
                    </dropdown-nav>
                    <dropdown-nav :label="`বার্ষিক বাজেট`" :icon="`fa fa-list`">
                    </dropdown-nav>
                    <dropdown-nav :label="`ব্যবহারবিধি`" :icon="`fa fa-list`">
                    </dropdown-nav>
                    <dropdown-nav :label="`বিবিধ`" :icon="`fa fa-list`">
                    </dropdown-nav>
                    <dropdown-nav
                        :label="`ব্যবহারকারী`"
                        :icon="`fa fa-list`"
                    ></dropdown-nav>
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
import DropdownNav from "./DropdownNav.vue";
import DropdownSingleItem from "./DropdownSingleItem.vue";
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
