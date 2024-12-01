<template>
    <div class="custom_drop_down"><input type="hidden" id="product_brand_id" name="product_brand_id">
        <div class="selected_list"></div>
        <div class="drop_down_items">
            <div class="drop_down_data_search"><input class="form-control" placeholder="search.." id="table_search_box"
                    type="search"><button type="button" class="btn btn-danger"><i class="fa fa-close"></i></button>
            </div>
            <ul class="option_list custom_scroll">
                <li class="option_item"><label for="drop_item_65">
                        <div class="check_box"><input type="checkbox" id="drop_item_65" class="form-check-input ml-0">
                        </div>
                        <div class="label">Ralph lauren</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_64">
                        <div class="check_box"><input type="checkbox" id="drop_item_64" class="form-check-input ml-0">
                        </div>
                        <div class="label">U.s polo</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_63">
                        <div class="check_box"><input type="checkbox" id="drop_item_63" class="form-check-input ml-0">
                        </div>
                        <div class="label">Banana</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_62">
                        <div class="check_box"><input type="checkbox" id="drop_item_62" class="form-check-input ml-0">
                        </div>
                        <div class="label">American eagle</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_61">
                        <div class="check_box"><input type="checkbox" id="drop_item_61" class="form-check-input ml-0">
                        </div>
                        <div class="label">Porsche</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_60">
                        <div class="check_box"><input type="checkbox" id="drop_item_60" class="form-check-input ml-0">
                        </div>
                        <div class="label">Hyundai</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_59">
                        <div class="check_box"><input type="checkbox" id="drop_item_59" class="form-check-input ml-0">
                        </div>
                        <div class="label">Volswagen</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_58">
                        <div class="check_box"><input type="checkbox" id="drop_item_58" class="form-check-input ml-0">
                        </div>
                        <div class="label">BMW</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_57">
                        <div class="check_box"><input type="checkbox" id="drop_item_57" class="form-check-input ml-0">
                        </div>
                        <div class="label">Dolce &amp; gabbana</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_56">
                        <div class="check_box"><input type="checkbox" id="drop_item_56" class="form-check-input ml-0">
                        </div>
                        <div class="label">Primark / penney's</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_55">
                        <div class="check_box"><input type="checkbox" id="drop_item_55" class="form-check-input ml-0">
                        </div>
                        <div class="label">Next</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_54">
                        <div class="check_box"><input type="checkbox" id="drop_item_54" class="form-check-input ml-0">
                        </div>
                        <div class="label">Bosideng portfolio</div>
                    </label></li>
                <li class="option_item"><label for="drop_item_53">
                        <div class="check_box"><input type="checkbox" id="drop_item_53" class="form-check-input ml-0">
                        </div>
                        <div class="label">Bottega veneta</div>
                    </label></li>
            </ul>
            <div class="drop_down_footer data_list">
                <nav aria-label="" class="d-flex gap-2 align-items-center" style="gap: 10px;">
                    <ul class="pagination my-2" style="font-size: 11px;">
                        <li class="page-item"><a class="page-link"><span>« Previous</span></a></li>
                        <li class="page-item active"><a class="page-link"
                                href="https://app.etek.com.bd/api/v1/product-brands?page=1"><span>1</span></a></li>
                        <li class="page-item"><a class="page-link"
                                href="https://app.etek.com.bd/api/v1/product-brands?page=2"><span>2</span></a></li>
                        <li class="page-item"><a class="page-link"
                                href="https://app.etek.com.bd/api/v1/product-brands?page=3"><span>3</span></a></li>
                        <li class="page-item"><a class="page-link"
                                href="https://app.etek.com.bd/api/v1/product-brands?page=4"><span>4</span></a></li>
                        <li class="page-item"><a class="page-link"
                                href="https://app.etek.com.bd/api/v1/product-brands?page=5"><span>5</span></a></li>
                        <li class="page-item"><a class="page-link"
                                href="https://app.etek.com.bd/api/v1/product-brands?page=2"><span>Next »</span></a></li>
                    </ul>
                    <div class="d-flex" style="gap: 5px;">
                        <span></span><span>1</span><span>-</span><span>13</span><span>of</span><span>62</span>
                    </div>
                    <div class="d-flex" style="gap: 5px;"><span></span><span> Limit </span><select
                            class="bg-transparent text-white rounded-1">
                            <option value="10">10</option>
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select></div>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapState, mapWritableState } from 'pinia';



export default {
    props: {
        multiple: {
            type: Boolean,
            default: false,
        },
        name: {
            type: String,
            default: 'users_' + (parseInt(Math.random() * 1000)),
        },
        value: {
            type: Array,
            default: [],
        }
    },
    created: function () {

    },
    data: () => ({
        selected: [],
        show_list: false,
    }),
    methods: {

    },
    computed: {

    }
}
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
    color: #FF5722;
}

.custom_drop_down .drop_down_items {
    border: 1px solid rgba(121, 85, 72, 0.6588235294);
    border-radius: 5px;
    padding: 10px;
    position: absolute;
    backdrop-filter: blur(8px);
    background: rgba(54, 64, 74, 0.92);
    top: calc(100% + 5px);
    width: 100%;
    z-index: 9999;
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
    margin-top: 25px;
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
