<template lang="">
     <a href="" @click.prevent="import_csv_modal_show = true"
                class="btn action_btn btn-sm btn-secondary d-flex align-items-center">
                <i class="fa fa-download mr-2"></i> Import
            </a>
</template>
<script>
import export_all_csv from "../../../helpersold/export_all_csv"
export default {
    methods: {
        export_all_csv,
    }
}
</script>
<style lang="">

</style>
