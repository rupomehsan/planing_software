<template lang="">
    <div class="off_canvas quick_view" :class="{ active: show_details_canvas }">
        <div class="off_canvas_body">
            <div class="header">
                <h3 class="heading_text">Quick View</h3>
                <button
                    @click.prevent="set_show_details_canvas(false)"
                    class="btn btn-sm btn-outline-danger"
                >
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <hr />
            <div class="data_content">
                {{ item }}
                <table class="table quick_modal_table">
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="off_canvas_overlay"></div>
    </div>
</template>
<script>
import { mapActions, mapWritableState } from "pinia";
import { store } from "../../store";

export default {
    methods: {
        ...mapActions(store, ["set_show_details_canvas"]),
    },
    computed: {
        ...mapWritableState(store, ["show_details_canvas", "item"]),
    },
};
</script>
<style>
.off_canvas.active {
    box-shadow: 0px 0px 0px 100000px rgba(0, 0, 0, 0.5);
}
</style>
