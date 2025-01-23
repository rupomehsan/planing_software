<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div
                    class="card-header d-flex justify-content-between align-items-center gap-2"
                >
                    <!-- <h5 class="text-capitalize">{{ setup.prefix }} {{ param_id ? 'আপডেট করুন' : 'নতুন তৈরি করুন' }} -->
                    <h5 class="text-capitalize w-50">
                        কেন্দ্রিও বার্ষিক পরিকল্পনা তৈরি করুন
                    </h5>
                    <div class="w-50">
                        <button
                            type="button"
                            class="btn btn-outline-success btn-sm m-1"
                            @click="addNewItem"
                        >
                            Add Iitem
                        </button>
                        <button
                            type="button"
                            class="btn btn-outline-secondary btn-sm m-1"
                            @click="is_show_modal = true"
                        >
                            Import From Excel
                        </button>
                        <button
                            type="button"
                            class="btn btn-outline-dark btn-sm m-1"
                            @click="is_show_modal = true"
                        >
                            Import previous incompleted
                        </button>

                        <router-link
                            v-if="item.slug"
                            class="btn btn-outline-info m-1 btn-sm"
                            :to="{
                                name: `Details${setup.route_prefix}`,
                                params: { id: item.slug },
                            }"
                        >
                            {{ setup.details_page_title }}
                        </router-link>
                        <router-link
                            class="btn btn-outline-warning btn-sm m-1"
                            :to="{ name: `All${setup.route_prefix}` }"
                        >
                            {{ setup.all_page_title }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body card_body_fixed_height">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <table
                                class="table table-hover text-center table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th class="w-10">
                                            <span class="icon"></span>
                                        </th>
                                        <th class="w-10">id</th>
                                        <th>Title</th>
                                        <th class="">Dofa</th>
                                        <th class="">Orjitobbo Target</th>
                                        <th class="">Previous incomplete(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in form_data"
                                        :key="index"
                                        class="table_rows table_row_4"
                                    >
                                        <td class="text-wrap max-w-120">
                                            <span
                                                @click="editItemHandler(index)"
                                            >
                                                <i
                                                    class="fa fa-pencil cursor-pointer"
                                                ></i>
                                            </span>
                                            <span
                                                @click="
                                                    deleteItemHandler(index)
                                                "
                                            >
                                                <i
                                                    class="fa fa-trash mx-2 cursor-pointer"
                                                ></i>
                                            </span>
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{ index + 1 }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{ item.title }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{ item.plan_dep_dofa?.title }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{
                                                item.plan_dep_orjitobbo_target
                                                    ?.title
                                            }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{
                                                item.previous_unfinished_parcent
                                            }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    @click="submitHandler"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div
            class="modal fade"
            :class="`${is_show_modal ? 'show d-block' : 'd-none'}`"
            id="primarymodal"
            aria-modal="true"
            ref="modal"
            @click="closeModal"
        >
            <div class="modal-dialog modal-lg">
                <form @submit.prevent="SingleItemSubmitHandler">
                    <div class="modal-content border-primary" @click.stop>
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">
                                {{ setup.prefix }} তৈরি করুন
                            </h5>
                            <button
                                @click="closeModal"
                                type="button"
                                class="btn btn-light"
                                data-dismiss="modal"
                            >
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 my-1">
                                    <div class="form-group mt-2">
                                        <label for="title "> ক্রম</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="serial_no"
                                            v-model="form_item.serial_no"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <label for="title "> সেশন</label>
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="show_session_list = true"
                                    >
                                        <div
                                            class="selected_list"
                                            :class="
                                                session_error
                                                    ? 'border-warning'
                                                    : ''
                                            "
                                        >
                                            <template
                                                v-if="
                                                    form_item.plan_dep_session
                                                        ?.title
                                                "
                                            >
                                                <div class="selected_item">
                                                    <label class="label" for="">
                                                        {{
                                                            form_item
                                                                .plan_dep_session
                                                                ?.title
                                                        }}
                                                    </label>

                                                    <div
                                                        @click.prevent="
                                                            remove_item(
                                                                form_item.plan_dep_session,
                                                                'session'
                                                            )
                                                        "
                                                        class="remove"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </template>

                                            <div
                                                v-if="
                                                    !form_item.plan_dep_session
                                                        ?.title
                                                "
                                                class="selected_item"
                                            >
                                                <div class="label">
                                                    Select session
                                                </div>
                                            </div>
                                        </div>
                                        <template v-if="show_session_list">
                                            <div class="drop_down_items">
                                                <div
                                                    class="drop_down_data_search"
                                                >
                                                    <input
                                                        @keyup="
                                                            search_item(
                                                                $event,
                                                                'sessions'
                                                            )
                                                        "
                                                        class="form-control"
                                                        placeholder="search.."
                                                        id="table_search_box"
                                                        type="search"
                                                    />

                                                    <button
                                                        type="button"
                                                        @click.prevent.stop="
                                                            show_session_list = false
                                                        "
                                                        class="btn btn-danger"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </button>
                                                </div>

                                                <ul
                                                    class="option_list custom_scroll p-0"
                                                >
                                                    <li
                                                        class="option_item border my-1 mx-2 text-capitalize"
                                                        v-for="item in sessions"
                                                        :key="item.id"
                                                    >
                                                        <label
                                                            :for="`drop_item_${item.id}`"
                                                            class="cursor-pointer"
                                                        >
                                                            <div
                                                                class="check_box"
                                                            >
                                                                <input
                                                                    @change="
                                                                        set_session(
                                                                            item,
                                                                            $event
                                                                        )
                                                                    "
                                                                    type="checkbox"
                                                                    :id="`drop_item_${item.id}`"
                                                                    class="form-check-input ml-0"
                                                                    :value="
                                                                        item.id
                                                                    "
                                                                    :checked="
                                                                        form_item
                                                                            .plan_dep_session
                                                                            .id ===
                                                                        item.id
                                                                    "
                                                                />
                                                            </div>
                                                            <div class="label">
                                                                {{ item.title }}
                                                            </div>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </template>
                                    </div>
                                    <div v-if="session_error">
                                        <p class="text-warning">
                                            {{ session_error }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <label for="title "> দফা</label>
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="show_dofa_list = true"
                                    >
                                        <div
                                            class="selected_list"
                                            :class="
                                                dofa_error
                                                    ? 'border-warning'
                                                    : ''
                                            "
                                        >
                                            <template
                                                v-if="
                                                    form_item.plan_dep_dofa
                                                        ?.title
                                                "
                                            >
                                                <div class="selected_item">
                                                    <label class="label" for="">
                                                        {{
                                                            form_item
                                                                .plan_dep_dofa
                                                                ?.title
                                                        }}
                                                    </label>

                                                    <div
                                                        @click.prevent="
                                                            remove_item(
                                                                form_item.plan_dep_dofa,
                                                                'dofa'
                                                            )
                                                        "
                                                        class="remove"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </template>

                                            <div
                                                v-if="
                                                    !form_item.plan_dep_dofa
                                                        ?.title
                                                "
                                                class="selected_item"
                                            >
                                                <div class="label">
                                                    Select dofa
                                                </div>
                                            </div>
                                        </div>
                                        <template v-if="show_dofa_list">
                                            <div class="drop_down_items">
                                                <div
                                                    class="drop_down_data_search"
                                                >
                                                    <input
                                                        @keyup="
                                                            search_item(
                                                                $event,
                                                                'dofa'
                                                            )
                                                        "
                                                        class="form-control"
                                                        placeholder="search.."
                                                        id="table_search_box"
                                                        type="search"
                                                    />

                                                    <button
                                                        type="button"
                                                        @click.prevent.stop="
                                                            show_dofa_list = false
                                                        "
                                                        class="btn btn-danger"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </button>
                                                </div>

                                                <ul
                                                    class="option_list custom_scroll p-0"
                                                >
                                                    <li
                                                        class="option_item border my-1 mx-2 text-capitalize"
                                                        v-for="item in dofas"
                                                        :key="item.id"
                                                    >
                                                        <label
                                                            :for="`drop_item_${item.id}`"
                                                            class="cursor-pointer"
                                                        >
                                                            <div
                                                                class="check_box"
                                                            >
                                                                <input
                                                                    @change="
                                                                        set_dofa(
                                                                            item,
                                                                            $event
                                                                        ),
                                                                            get_all_orgitobbo_target(
                                                                                $event
                                                                                    .target
                                                                                    .value
                                                                            )
                                                                    "
                                                                    type="checkbox"
                                                                    :id="`drop_item_${item.id}`"
                                                                    class="form-check-input ml-0"
                                                                    :value="
                                                                        item.id
                                                                    "
                                                                    :checked="
                                                                        form_item
                                                                            .plan_dep_dofa
                                                                            .id ===
                                                                        item.id
                                                                    "
                                                                />
                                                            </div>
                                                            <div class="label">
                                                                {{ item.title }}
                                                            </div>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </template>
                                    </div>
                                    <div v-if="dofa_error">
                                        <p class="text-warning">
                                            {{ dofa_error }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <label for="title ">
                                        অর্জিতব্য টার্গেট
                                    </label>
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="
                                            show_orgitobbo_target_list = true
                                        "
                                    >
                                        <div
                                            class="selected_list"
                                            :class="
                                                orgitobbo_target_error
                                                    ? 'border-warning'
                                                    : ''
                                            "
                                        >
                                            <template
                                                v-if="
                                                    form_item
                                                        .plan_dep_orjitobbo_target
                                                        ?.title
                                                "
                                            >
                                                <div class="selected_item">
                                                    <label class="label" for="">
                                                        {{
                                                            form_item
                                                                .plan_dep_orjitobbo_target
                                                                ?.title
                                                        }}
                                                    </label>

                                                    <div
                                                        @click.prevent="
                                                            remove_item(
                                                                form_item.plan_dep_orjitobbo_target,
                                                                'orjitobbo_target'
                                                            )
                                                        "
                                                        class="remove"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </template>

                                            <div
                                                v-if="
                                                    !form_item
                                                        .plan_dep_orjitobbo_target
                                                        .title
                                                "
                                                class="selected_item"
                                            >
                                                <div class="label">
                                                    Select orjitobbo target
                                                </div>
                                            </div>
                                        </div>
                                        <template
                                            v-if="show_orgitobbo_target_list"
                                        >
                                            <div class="drop_down_items">
                                                <div
                                                    class="drop_down_data_search"
                                                >
                                                    <input
                                                        @keyup="
                                                            search_item(
                                                                $event,
                                                                'orjitobbo_target'
                                                            )
                                                        "
                                                        class="form-control"
                                                        placeholder="search.."
                                                        id="table_search_box"
                                                        type="search"
                                                    />

                                                    <button
                                                        type="button"
                                                        @click.prevent.stop="
                                                            show_orgitobbo_target_list = false
                                                        "
                                                        class="btn btn-danger"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </button>
                                                </div>

                                                <ul
                                                    v-if="
                                                        orgitobbo_targets.length
                                                    "
                                                    class="option_list custom_scroll p-0"
                                                >
                                                    <li
                                                        class="option_item border my-1 mx-2 text-capitalize"
                                                        v-for="item in orgitobbo_targets"
                                                        :key="item.id"
                                                    >
                                                        <label
                                                            :for="`drop_item_${item.id}`"
                                                            class="cursor-pointer"
                                                        >
                                                            <div
                                                                class="check_box"
                                                            >
                                                                <input
                                                                    @change="
                                                                        set_orjitobbo_target(
                                                                            item,
                                                                            $event
                                                                        )
                                                                    "
                                                                    type="checkbox"
                                                                    :id="`drop_item_${item.id}`"
                                                                    class="form-check-input ml-0"
                                                                    :value="
                                                                        item.id
                                                                    "
                                                                    :checked="
                                                                        form_item
                                                                            .plan_dep_orjitobbo_target
                                                                            .id ===
                                                                        item.id
                                                                    "
                                                                />
                                                            </div>
                                                            <div class="label">
                                                                {{ item.title }}
                                                            </div>
                                                        </label>
                                                    </li>
                                                </ul>
                                                <p
                                                    v-else
                                                    class="text-center p-2 alert alert-danger my-3"
                                                >
                                                    No Data Found
                                                </p>
                                            </div>
                                        </template>
                                    </div>
                                    <div v-if="orgitobbo_target_error">
                                        <p class="text-warning">
                                            {{ orgitobbo_target_error }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <label for="title ">
                                        বাস্তবায়নকারী বিভাগ</label
                                    >
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="
                                            show_executive_department_list = true
                                        "
                                    >
                                        <div
                                            class="selected_list"
                                            :class="
                                                user_department_error
                                                    ? 'border border-warning'
                                                    : ''
                                            "
                                        >
                                            <template
                                                v-if="
                                                    form_item
                                                        .executive_departments
                                                        ?.length
                                                "
                                            >
                                                <div
                                                    class="selected_item"
                                                    v-for="item in form_item.executive_departments"
                                                    :key="item"
                                                >
                                                    <label class="label" for="">
                                                        {{ item.title }}
                                                    </label>

                                                    <div
                                                        @click.prevent="
                                                            remove_item(
                                                                item,
                                                                'user_department'
                                                            )
                                                        "
                                                        class="remove"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </template>

                                            <div
                                                v-if="
                                                    !form_item
                                                        .executive_departments
                                                        ?.length
                                                "
                                                class="selected_item"
                                            >
                                                <div class="label">
                                                    Select departments
                                                </div>
                                            </div>
                                        </div>
                                        <template
                                            v-if="
                                                show_executive_department_list
                                            "
                                        >
                                            <div class="drop_down_items">
                                                <div
                                                    class="drop_down_data_search"
                                                >
                                                    <input
                                                        @keyup="
                                                            search_item(
                                                                $event,
                                                                'user_department'
                                                            )
                                                        "
                                                        class="form-control"
                                                        placeholder="search.."
                                                        id="table_search_box"
                                                        type="search"
                                                    />

                                                    <button
                                                        type="button"
                                                        @click.prevent.stop="
                                                            show_executive_department_list = false
                                                        "
                                                        class="btn btn-danger"
                                                    >
                                                        <i
                                                            class="fa fa-close"
                                                        ></i>
                                                    </button>
                                                </div>

                                                <ul
                                                    class="option_list custom_scroll p-0"
                                                >
                                                    <li
                                                        class="option_item border my-1 mx-2 text-capitalize"
                                                        v-for="item in user_departments"
                                                        :key="item.id"
                                                    >
                                                        <label
                                                            :for="`drop_item_${item.id}`"
                                                            class="cursor-pointer"
                                                        >
                                                            <div
                                                                class="check_box"
                                                            >
                                                                <input
                                                                    @change="
                                                                        set_executive_department(
                                                                            item,
                                                                            $event
                                                                        )
                                                                    "
                                                                    type="checkbox"
                                                                    :id="`drop_item_${item.id}`"
                                                                    class="form-check-input ml-0"
                                                                    :value="
                                                                        item.id
                                                                    "
                                                                    :checked="
                                                                        is_selected(
                                                                            item
                                                                        )
                                                                    "
                                                                />
                                                            </div>
                                                            <div class="label">
                                                                {{ item.title }}
                                                            </div>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </template>
                                    </div>
                                    <div v-if="user_department_error">
                                        <p class="text-warning">
                                            {{ user_department_error }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >রেটিং (1-100)
                                        </label>
                                        <table
                                            class="table table-hover text-center table-bordered"
                                        >
                                            <thead>
                                                <tr>
                                                    <th class="w-50">
                                                        বাস্তবায়নকারী বিভাগ
                                                    </th>
                                                    <th class="w-50">রেটিং</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(
                                                        item, index
                                                    ) in form_item.executive_departments"
                                                    :key="index"
                                                >
                                                    <td
                                                        class="text-wrap max-w-120"
                                                    >
                                                        {{ item.title }}
                                                    </td>
                                                    <td
                                                        class="text-wrap max-w-120"
                                                    >
                                                        <input
                                                            type="hidden"
                                                            v-model="item.id"
                                                        />
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            required
                                                            placeholder=""
                                                            v-model="
                                                                item.rating
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >পরিকল্পনা অবাস্তবায়িত অংশ
                                            (%)</label
                                        >
                                        <input
                                            v-model="
                                                form_item.previous_unfinished_parcent
                                            "
                                            type="number"
                                            class="form-control"
                                            placeholder=""
                                            id="previous_unfinished_parcent"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <div class="form-group mt-2">
                                        <label for="title "> টাইটেল</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="form_item.title"
                                            id="title"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >কর্মপরিকল্পনা</label
                                        >
                                        <textarea
                                            class="form-control"
                                            v-model="form_item.description"
                                            id="description"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-download"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { store as user_store } from "../store";
import setup from "../setup";
import form_fields from "../setup/form_fields";
import DofaDropDownEl from "../../../PlanDependency/dofa/components/dropdown/DropDownEl.vue";
import axios from "axios";

export default {
    components: { DofaDropDownEl },
    data: () => ({
        setup,
        route_prefix: "",
        prefix: "",
        form_fields,
        param_id: null,
        is_show_modal: false,

        sessions: [],
        dofas: [],
        orgitobbo_targets: [],
        user_departments: [],
        form_data: [],
        form_item: {
            serial_no: "",
            title: "",
            plan_dep_session: { id: null, title: null },
            plan_dep_dofa: { id: null, title: null },
            plan_dep_orjitobbo_target: { id: null, title: null },
            executive_departments: [],
            previous_unfinished_parcent: "100",
            rating: "",
            description: "",
        },
        edit_item: null,

        //setup
        show_session_list: false,
        show_dofa_list: false,
        show_orgitobbo_target_list: false,
        show_executive_department_list: false,
        search_data: "",
        //error message
        session_error: null,
        dofa_error: null,
        orgitobbo_target_error: null,
        user_department_error: null,
    }),
    created: async function () {
        let id = (this.param_id = this.$route.params.id);

        this.reset_fields();

        if (id) {
            this.set_fields(id);
        }

        await this.get_all_sessions();
        await this.get_all_dofas();
        await this.get_all_user_departments();
    },
    methods: {
        ...mapActions(user_store, {
            create: "create",
            update: "update",
            details: "details",
        }),
        reset_fields: function () {
            this.form_fields.forEach((item) => {
                item.value = "";
            });
        },
        set_fields: async function (id) {
            this.param_id = id;
            await this.details(id);
            if (this.item) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.item).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                    });
                });
            }
        },

        addNewItem: function () {
            this.is_show_modal = true;
            this.edit_item = null;
            this.form_item = {
                serial_no: "",
                title: "",
                plan_dep_session: { id: null, title: null },
                plan_dep_dofa: { id: null, title: null },
                plan_dep_orjitobbo_target: { id: null, title: null },
                executive_departments: [],
                previous_unfinished_parcent: "100",
                rating: "",
                description: "",
            };
        },

        SingleItemSubmitHandler: async function ($event) {
            let res = await this.validation();
            if (!res) {
                return false;
            }

            if (this.edit_item !== null) {
                this.form_data[this.edit_item] = this.form_item;
                this.is_show_modal = false;
            } else {
                this.form_data.push(this.form_item);
                this.form_item = {
                    serial_no: "",
                    title: "",
                    plan_dep_dofa: { id: null, title: null },
                    plan_dep_orjitobbo_target: { id: null, title: null },
                    user_department: { id: null, title: null },
                    previous_unfinished_parcent: "",
                    rating: "",
                    description: "",
                };
                this.is_show_modal = false;
            }
        },

        validation: async function () {
            try {
                let validation = await axios.post(
                    "central-yearly-plan-validation",
                    this.form_item
                );
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    const errors = error.response.data.errors;

                    // Map nested errors
                    this.session_error = errors["plan_dep_session.id"]
                        ? errors["plan_dep_session.id"][0]
                        : null;
                    this.dofa_error = errors["plan_dep_dofa.id"]
                        ? errors["plan_dep_dofa.id"][0]
                        : null;
                    this.orgitobbo_target_error = errors[
                        "plan_dep_orjitobbo_target.id"
                    ]
                        ? errors["plan_dep_orjitobbo_target.id"][0]
                        : null;
                    this.user_department_error = errors["executive_departments"]
                        ? errors["executive_departments"][0]
                        : null;
                }

                return false;
            }
        },
        submitHandler: async function ($event) {
            $event.preventDefault();
            if (this.form_data.length == 0) {
                s_warning("No item found");
                return false;
            }
            let contirmation = await s_confirm("Are you sure want to submit?");

            if (!contirmation) {
                return false;
            }

            if (this.param_id) {
                let response = await this.update(this.form_data);
                if (response.data.status === "success") {
                    s_alert(response.data?.message);
                }
            } else {
                let response = await this.create(this.form_data);
                if (response.data.status === "success") {
                    s_alert(response.data?.message);
                }
            }
        },

        updateSelectText(field, event) {
            const selectedIndex = event.target.selectedIndex;
            const selectedText = event.target.options[selectedIndex].text;
            const selectedValue = event.target.value;

            // Ensure the field is an object and update id and title
            this.form_item[field] = {
                id: selectedValue,
                title: selectedText,
            };
        },

        editItemHandler(index) {
            this.is_show_modal = true;
            this.edit_item = index;
            this.form_item = {};

            this.form_item = this.form_data[index];
            this.get_all_orgitobbo_target(
                this.form_item.plan_dep_orjitobbo_target.id
            );
        },

        deleteItemHandler(index) {
            this.form_data.splice(index, 1);
        },

        get_all_sessions: async function () {
            let response = await axios.get(
                `plan-dep-sessions?get_all=1&search=${this.search_data}`
            );
            if (response.data.status == "success") {
                this.sessions = response.data.data;
            }

            this.search_data = "";
        },

        get_all_dofas: async function () {
            let response = await axios.get(
                `plan-dep-dofas?get_all=1&search=${this.search_data}`
            );
            if (response.data.status == "success") {
                this.dofas = response.data.data;
            }
        },

        get_all_orgitobbo_target: async function (plan_dep_dofa_id) {
            let response = await axios.get(
                `plan-dep-orjitobbo-targets?get_all=1&plan_dep_dofa_id=${plan_dep_dofa_id}`
            );
            if (response.data.status == "success") {
                this.orgitobbo_targets = response.data.data;
            }
        },
        get_all_user_departments: async function () {
            let response = await axios.get(
                `user-departments?get_all=1&search=${this.search_data}`
            );
            if (response.data.status == "success") {
                this.user_departments = response.data.data;
            }
        },
        //session
        set_session: function (item, event) {
            // Ensure the field is an object and update id and title
            if (event.target.checked) {
                this.form_item.plan_dep_session = {
                    id: item.id,
                    title: item.title,
                };
            } else {
                this.form_item.plan_dep_session = {
                    id: null,
                    title: null,
                };
            }
        },
        set_dofa: function (item, event) {
            // Ensure the field is an object and update id and title
            if (event.target.checked) {
                this.form_item.plan_dep_dofa = {
                    id: item.id,
                    title: item.title,
                };
            } else {
                this.form_item.plan_dep_dofa = {
                    id: null,
                    title: null,
                };
            }
        },
        set_orjitobbo_target: function (item, event) {
            // Ensure the field is an object and update id and title
            if (event.target.checked) {
                this.form_item.plan_dep_orjitobbo_target = {
                    id: item.id,
                    title: item.title,
                };
            } else {
                this.form_item.plan_dep_orjitobbo_target = {
                    id: null,
                    title: null,
                };
            }
        },
        set_executive_department: function (item, event) {
            // Ensure the field is an object and update id and title
            if (event.target.checked) {
                this.form_item.executive_departments.push(item);
            } else {
                this.form_item.executive_departments =
                    this.form_item.executive_departments.filter(
                        (i) => i.id != item.id
                    );
            }
        },
        is_selected: function (item) {
            return this.form_item.executive_departments.find(
                (i) => i.id == item.id
            );
        },

        remove_item: function (item, name) {
            if (name == "session") {
                this.form_item.plan_dep_session = {
                    id: null,
                    title: null,
                };
            }
            if (name == "dofa") {
                this.form_item.plan_dep_dofa = {
                    id: null,
                    title: null,
                };
            }
            if (name == "orjitobbo_target") {
                this.form_item.plan_dep_orjitobbo_target = {
                    id: null,
                    title: null,
                };
            }

            if (name == "user_department") {
                this.form_item.executive_departments =
                    this.form_item.executive_departments.filter(
                        (i) => i.id != item.id
                    );

                console.log(this.form_item.executive_departments);
            }
        },
        search_item: async function (event, name) {
            const value = event.target.value.trim().toLowerCase();
            this.search_data = value;
            if (name == "sessions") {
                this.get_all_sessions();
            }

            if (name == "dofa") {
                this.get_all_dofas();
            }
            if (name == "dofa") {
                this.get_all_dofas();
            }
            if (name == "user_department") {
                this.get_all_user_departments();
            }
        },

        closeModal(event) {
            const modal = this.$refs.modal;
            if (
                !event ||
                modal === event.target ||
                event.target.closest(".btn-light")
            ) {
                this.is_show_modal = false;
            }
        },
    },

    computed: {
        ...mapState(user_store, {
            item: "item",
        }),
    },
};
</script>

<style scoped></style>
