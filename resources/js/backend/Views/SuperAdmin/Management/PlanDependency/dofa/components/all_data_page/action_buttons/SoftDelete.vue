<template>
    <a v-if="!is_trashed_data" @click.prevent="softDelete(item)" href="" class="border-danger">
        <i class="fa fa-ban text-warning"></i>
        Soft Delete
    </a>

</template>
<script>
import { mapActions } from 'pinia';
import { store } from '../../../setup/store';

export default {
    props: {
        item: {
            slug: "",
        }
    },
    data: () => ({
        is_trashed_data: false,
    }),
    methods: {
        ...mapActions(store, [
            `restore`,
            `destroy`,
            `get_all`,
            `set_only_latest_data`,
            `set_item`,
        ]),
        destroy_data: async function () {
            let con = await window.s_confirm('Permanently delete');
            if (con) {
                this.set_item(this.item);
                this.set_only_latest_data(true);

                let res = await this.destroy();
                await this.get_all();
                if (res.data.status == "success") {
                    window.s_alert('Permanently deleted.');
                }

                this.set_only_latest_data(false);
            }
        },
    }

}


</script>
<style lang="">

</style>
