<template lang="">
    <div class="off_canvas quick_view" :class="{ active: show_details_canvas }">
        <div class="off_canvas_body">
            <div class="header border-bottom">
                <h3 class="heading_text">Quick View</h3>
                <button
                    @click.prevent="set_show_details_canvas(false)"
                    class="btn btn-sm btn-outline-danger"
                >
                    <i class="fa fa-close"></i>
                </button>
            </div>

            <div class="data_content">
                <table
                    class="table quick_modal_table table-bordered table-striped table-hover"
                >
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>:</th>
                            <th>
                                {{ item.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Session</th>
                            <th>:</th>
                            <th>
                                {{ item.session?.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <th>:</th>
                            <th>
                                {{ item.rating }}
                            </th>
                        </tr>
                        <tr>
                            <th>Executive Month</th>
                            <th>:</th>
                            <th>
                                {{ item.bastobayoner_mash }}
                            </th>
                        </tr>
                        <tr>
                            <th>Department Section</th>
                            <th>:</th>
                            <th>
                                {{ item.department_section?.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Department Sub Section</th>
                            <th>:</th>
                            <th>
                                {{ item.department_sub_section?.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Department Sub Section User</th>
                            <th>:</th>
                            <th>
                                {{ item.department_sub_section_user?.name }}
                            </th>
                        </tr>
                        <tr>
                            <th>Executive Month</th>
                            <th>:</th>
                            <th>
                                {{ item.bastobayoner_mash }}
                            </th>
                        </tr>
                        <tr>
                            <th>department yearly plan</th>
                            <th>:</th>
                            <th>
                                {{ item.department_yearly_plan?.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Schedule type</th>
                            <th>:</th>
                            <th>
                                {{ item.schedule_type?.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Schedule</th>
                            <th>:</th>
                            <th>
                                {{ item.schedule?.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Executive Month</th>
                            <th>:</th>
                            <th>
                                {{ item.bastobayoner_mash }}
                            </th>
                        </tr>
                        <tr>
                            <th>Helper department</th>
                            <th>:</th>
                            <th>
                                {{ item.helper_department?.title }}
                            </th>
                        </tr>
                        <tr>
                            <th>Helper department name</th>
                            <th>:</th>
                            <th>
                                {{ item.helper_department_user?.name }}
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <label for="">Comments</label>
                                <textarea class="form-control"> </textarea>
                                <button
                                    class="btn btn-sm btn-outline-primary my-3 mx-auto d-block"
                                >
                                    Add comment
                                </button>
                            </th>
                        </tr>
                    </tbody>
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
