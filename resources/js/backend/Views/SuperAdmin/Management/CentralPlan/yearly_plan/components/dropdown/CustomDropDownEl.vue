<template lang="">
    <div
        class="custom_drop_down cursor-pointer border"
        @click="show_list = true"
    >
        <input
            type="hidden"
            :id="name"
            :name="name"
            :value="multiple ? `[${selected_ids}]` : `${selected_ids}`"
        />
        <div class="selected_list">
            <div
                v-for="item in selected"
                :key="item.id"
                :id="item.id"
                class="selected_item"
            >
                <div class="label">
                    {{ item.title }}
                </div>
                <div
                    @click.prevent="remove_item(item), onchange_actions($event)"
                    class="remove"
                >
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div v-if="!selected?.length" class="selected_item">
                <div class="label">
                    Select {{ multiple ? "Items" : "Item" }}
                </div>
            </div>
        </div>
        <template v-if="show_list">
            <div class="drop_down_items">
                <div class="drop_down_data_search">
                    <input
                        @keyup="search_item($event)"
                        class="form-control"
                        placeholder="search.."
                        id="table_search_box"
                        type="search"
                    />

                    <button
                        type="button"
                        @click.prevent.stop="show_list = false"
                        class="btn btn-danger"
                    >
                        <i class="fa fa-close"></i>
                    </button>
                </div>

                <ul class="option_list custom_scroll p-0">
                    <li
                        class="option_item border my-1 mx-2 text-capitalize"
                        v-for="item in data_list?.slice(0, 10)"
                        :key="item.id"
                    >
                        <label
                            :for="`drop_item_${item.id}`"
                            class="cursor-pointer"
                        >
                            <div class="check_box">
                                <input
                                    @change="
                                        set_selected(item, $event),
                                            onchange_actions($event)
                                    "
                                    :checked="is_selected(item)"
                                    type="checkbox"
                                    :id="`drop_item_${item.id}`"
                                    class="form-check-input ml-0"
                                    :value="item.id"
                                />
                            </div>
                            <div class="label">{{ item.title }}</div>
                        </label>
                    </li>
                </ul>
            </div>
        </template>
    </div>
</template>
<script>
export default {
    props: {
        multiple: {
            type: Boolean,
            default: false,
        },
        name: {
            type: String,
            default: "users_" + parseInt(Math.random() * 1000),
        },
        value: {
            type: Array,
            default: [],
        },
        all_data: {
            type: Array,
            default: [],
        },
        edit_item: {
            type: Object,
            default: null,
        },
        onchange: {
            type: Function,
            default: () => {},
        },
    },
    data() {
        return {
            selected: [],
            show_list: false,
            data_list: [],
            target_ids: null,
        };
    },
    created: function () {
        this.data_list = [...this.all_data];
        this.$watch("value", function (v) {
            v.forEach((i) => {
                this.set_selected(i);
            });
        });

        if (this.edit_item) {
            console.log(this.edit_item);
        }
    },

    methods: {
        search_item: async function (event) {
            const value = event.target.value.trim().toLowerCase();

            // Filter data based on the search value
            if (value) {
                this.data_list = this.all_data.filter((item) => {
                    const searchField = (
                        item.title ||
                        item.name ||
                        ""
                    ).toLowerCase();
                    return searchField.includes(value);
                });
            } else {
                // Reset to original data if the search input is cleared
                this.data_list = this.all_data;
            }
        },
        set_selected: function (item, event) {
            if (!this.multiple) {
                if (event.target.checked) {
                    this.selected = [item];
                    return;
                } else {
                    this.selected = [];
                    return;
                }
            } else {
                if (event.target.checked) {
                    this.selected.push(item);
                } else {
                    this.selected = this.selected.filter(
                        (i) => i.id != item.id
                    );
                }
            }
        },
        is_selected: function (item) {
            return this.selected.find((i) => i.id == item.id);
        },
        remove_item: function (item) {
            this.selected = this.selected.filter((i) => i.id != item.id);
        },

        onchange_actions: function (event) {
            let currentElement = event.target;
            let nextElement = currentElement.nextElementSibling;
            if (nextElement) {
                currentElement.classList.remove("border-warning");
                nextElement.remove();
            }

            if (this.onchange) {
                this.onchange(this.selected_ids, event);
            }
        },
    },
    computed: {
        selected_ids: function () {
            return this.selected.map((i) => i.id).join(",");
        },
    },
    watch: {
        // Watch for changes in `all_data` and update `data_list`
        all_data(newData) {
            this.data_list = [...newData];
        },
    },
};
</script>
<style scoped>
.custom_drop_down {
    position: relative;
}

.custom_drop_down .selected_list {
    border: 1px solid var(--gray);
    border-radius: 5px;
    padding: 10px;
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    min-height: 45px;
}

.custom_drop_down .selected_list .no_item_selected_text {
    color: var(--gray);
}

.custom_drop_down .selected_list .selected_item {
    display: inline-flex;
    background: rgba(33, 150, 243, 0.368627451);
    color: var(--brand_white);
    width: unset;
    border-radius: 3px;
    padding: 3px;
    font-size: 13px;
    align-items: center;
}

.custom_drop_down .selected_list .selected_item .label {
    white-space: nowrap;
}

.custom_drop_down .selected_list .selected_item .remove * {
    font-size: 15px;
    padding-left: 8px;
    cursor: pointer;
}

.custom_drop_down .selected_list .selected_item .remove *:hover {
    color: #ff5722;
}

.custom_drop_down .drop_down_items {
    border: 1px solid rgb(121 85 72 / 8%);
    border-radius: 5px;
    padding: 10px;
    position: absolute;
    backdrop-filter: blur(8px);
    background: rgba(54, 64, 74, 0.452);
    top: calc(100% + 5px);
    width: 100%;
    z-index: 9999;
    box-shadow: 4px 3px 10px 0px #80808061;
}

.custom_drop_down .drop_down_items .drop_down_data_search {
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

.custom_drop_down .drop_down_items .drop_down_data_search .search {
    flex: 1;
    width: 100%;
}

.custom_drop_down .drop_down_items .drop_down_data_search button {
    padding: 5px;
}

.custom_drop_down .drop_down_items .option_list {
    margin-top: 5px;
    min-height: 170px;
    max-height: 226px;
    overflow-y: auto;
}

.custom_drop_down .drop_down_items .option_list .option_item {
    cursor: pointer;
    position: relative;
}

.custom_drop_down .drop_down_items .option_list .option_item label {
    display: flex;
    gap: 10px;
    align-items: center;
    margin: 0;
    padding: 5px 5px;
    user-select: none;
    position: relative;
    z-index: 9;
}

.custom_drop_down .drop_down_items .option_list .option_item .form_checkbox,
.custom_drop_down .drop_down_items .option_list .option_item .label {
    position: relative;
    z-index: 9;
}

.custom_drop_down .drop_down_items .option_list .option_item .form_checkbox {
    top: 4px;
}

.custom_drop_down .drop_down_items .option_list .option_item .label {
    flex: 1;
    line-height: 22px;
}

.custom_drop_down .drop_down_items .option_list .option_item:hover::after {
    width: 100%;
}

.custom_drop_down .drop_down_items .option_list .option_item::after {
    transition-duration: 0.3s;
    content: "";
    width: 0%;
    height: 100%;
    background-color: rgba(38, 83, 124, 0.5607843137);
    position: absolute;
    left: 0;
    top: 0;
    z-index: 1;
}

.custom_drop_down .drop_down_items .drop_down_footer {
    margin-top: 10px;
}

.no_pagination .drop_down_footer ul li {
    display: none;
}

.no_pagination .drop_down_footer ul li:first-child,
.no_pagination .drop_down_footer ul li:last-child {
    display: block;
}
</style>
