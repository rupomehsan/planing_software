<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div
                    class="card-header d-flex justify-content-between align-items-center"
                >
                    <!-- <h5 class="text-capitalize">{{ setup.prefix }} {{ param_id ? 'আপডেট করুন' : 'নতুন তৈরি করুন' }} -->
                    <h5 class="text-capitalize">
                        কেন্দ্রিও বার্ষিক পরিকল্পনা তৈরি করুন
                    </h5>
                    <div>
                        <button
                            type="button"
                            class="btn btn-outline-warning btn-sm mx-2"
                            @click="is_show_modal = true"
                        >
                            Import From Excel
                        </button>
                        <button
                            type="button"
                            class="btn btn-outline-warning btn-sm mx-2"
                            @click="is_show_modal = true"
                        >
                            Import previous incompleted
                        </button>
                        <button
                            type="button"
                            class="btn btn-outline-warning btn-sm mx-2"
                            @click="is_show_modal = true"
                        >
                            Add Iitem
                        </button>
                        <router-link
                            v-if="item.slug"
                            class="btn btn-outline-info mx-2 btn-sm"
                            :to="{
                                name: `Details${setup.route_prefix}`,
                                params: { id: item.slug },
                            }"
                        >
                            {{ setup.details_page_title }}
                        </router-link>
                        <router-link
                            class="btn btn-outline-warning btn-sm mx-2"
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
                                        <th class="">Executive Department</th>
                                        <th class="">Previous incomplete(%)</th>
                                        <th class="">Rating (1-100)</th>
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
                                            {{ item.user_department?.title }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{
                                                item.previous_unfinished_parcent
                                            }}
                                        </td>
                                        <td class="text-wrap max-w-120">
                                            {{ item.rating }}
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
        >
            <div class="modal-dialog modal-lg">
                <form @submit.prevent="SingleItemSubmitHandler">
                    <div class="modal-content border-primary">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">
                                {{ setup.prefix }} তৈরি করুন
                            </h5>
                            <button
                                @click="is_show_modal = false"
                                type="button"
                                class="btn btn-light"
                                data-dismiss="modal"
                            >
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "> Title</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="form_item.title"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="title "> Session</label>
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="show_session_list = true"
                                    >
                                        <div class="selected_list">
                                            <template
                                                v-if="
                                                    form_item.plan_dep_session
                                                        .title
                                                "
                                            >
                                                <div class="selected_item">
                                                    <label class="label" for="">
                                                        {{
                                                            form_item
                                                                .plan_dep_session
                                                                .title
                                                        }}
                                                    </label>

                                                    <div
                                                        @click.prevent=""
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
                                                        .title
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
                                </div>

                                <div class="col-md-12">
                                    <label for="title "> Dofa</label>
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="show_dofa_list = true"
                                    >
                                        <div class="selected_list">
                                            <template
                                                v-if="
                                                    form_item.plan_dep_dofa
                                                        .title
                                                "
                                            >
                                                <div class="selected_item">
                                                    <label class="label" for="">
                                                        {{
                                                            form_item
                                                                .plan_dep_dofa
                                                                .title
                                                        }}
                                                    </label>

                                                    <div
                                                        @click.prevent=""
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
                                                        .title
                                                "
                                                class="selected_item"
                                            >
                                                <div class="label">
                                                    Select session
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
                                </div>

                                <div class="col-md-12">
                                    <label for="title ">
                                        Orjitobbo target</label
                                    >
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="
                                            show_orgitobbo_target_list = true
                                        "
                                    >
                                        <div class="selected_list">
                                            <template
                                                v-if="
                                                    form_item
                                                        .plan_dep_orjitobbo_target
                                                        .title
                                                "
                                            >
                                                <div class="selected_item">
                                                    <label class="label" for="">
                                                        {{
                                                            form_item
                                                                .plan_dep_orjitobbo_target
                                                                .title
                                                        }}
                                                    </label>

                                                    <div
                                                        @click.prevent=""
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
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="title ">
                                        Execution Department</label
                                    >
                                    <div
                                        class="custom_drop_down cursor-pointer"
                                        @click="
                                            show_executive_department_list = true
                                        "
                                    >
                                        <div class="selected_list">
                                            <template
                                                v-if="
                                                    form_item
                                                        .executive_departments
                                                        .length
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
                                                        @click.prevent=""
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
                                                        .length
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
                                                                'executive_department'
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
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >Previous incomplete (%)</label
                                        >
                                        <input
                                            v-model="
                                                form_item.previous_unfinished_parcent
                                            "
                                            type="number"
                                            required
                                            class="form-control"
                                            placeholder=""
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title "
                                            >Rating (1-100)
                                        </label>
                                        <table
                                            class="table table-hover text-center table-bordered"
                                        >
                                            <thead>
                                                <tr>
                                                    <th class="w-50">
                                                        Department
                                                    </th>
                                                    <th class="w-50">Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(
                                                        item, index
                                                    ) in form_item.execution"
                                                    :key="index"
                                                >
                                                    <td
                                                        class="text-wrap max-w-120"
                                                    >
                                                        {{
                                                            item.department_name
                                                        }}
                                                    </td>
                                                    <td
                                                        class="text-wrap max-w-120"
                                                    >
                                                        <input
                                                            type="hidden"
                                                            :value="
                                                                item.department_id
                                                            "
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

                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label for="title ">Description</label>
                                        <textarea
                                            class="form-control"
                                            v-model="form_item.description"
                                            name=""
                                            id=""
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
    }),
    created: async function () {
        let id = (this.param_id = this.$route.params.id);

        this.reset_fields();

        if (id) {
            this.set_fields(id);
        }

        await this.get_all_sessions();
        await this.get_all_dofas();
        await this.get_all_orgitobbo_target();
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

        SingleItemSubmitHandler: async function ($event) {
            if (this.edit_item !== null) {
                this.form_data[this.edit_item] = this.form_item;
                this.is_show_modal = false;
            } else {
                this.form_data.push(this.form_item);
                this.form_item = {
                    title: "",
                    plan_dep_dofa: { id: null, title: null },
                    plan_dep_orjitobbo_target: { id: null, title: null },
                    user_department: { id: null, title: null },
                    previous_unfinished_parcent: "",
                    rating: "",
                    description: "",
                };
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
                await this.update(this.form_data);
            } else {
                await this.create(this.form_data);
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

        get_all_orgitobbo_target: async function () {
            let response = await axios.get(
                `plan-dep-orjitobbo-targets?get_all=1&search=${this.search_data}`
            );
            if (response.data.status == "success") {
                this.orgitobbo_targets = response.data.data;
            }
        },
        get_all_user_departments: async function () {
            let response = await axios.get("user-departments?get_all=1");
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
        search_item: async function (event, name) {
            const value = event.target.value.trim().toLowerCase();
            this.search_data = value;
            if (name == "session") {
                this.get_all_sessions();
            }

            if (name == "dofa") {
                this.get_all_dofas();
            }
            if (name == "dofa") {
                this.get_all_dofas();
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
