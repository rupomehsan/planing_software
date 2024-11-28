<template lang="">

<div class="">
            <a href="" @click.prevent="change_status(`inactive`)"
                class="btn action_btn btn-sm btn-warning d-flex align-items-center">
                <i class="fa fa fa-eye-slash mr-2"></i> Inactive
                ({{ inactive_data_count }})
            </a>
        </div>

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
    methods: {
        ...mapActions(store, [
            `restore`,
            `deactive`,
            `get_all`,
            `set_only_latest_data`,
            `set_item`,
        ]),
        deactive_data: async function () {
            let con = await window.s_confirm('deactive');
            if (con) {
                this.set_item(this.item);
                this.set_only_latest_data(true);

                let res = await this.deactive();
                await this.get_all();
                if (res.data.status == "success") {
                    window.s_alert('Deactivated');
                }

                this.set_only_latest_data(false);
            }
        },
        restore_data: async function () {
            let con = await window.s_confirm('Restore');
            if (con) {
                this.set_item(this.item);
                this.set_only_latest_data(true);

                await this.restore();
                await this.get_all();
                window.s_alert('Restored');

                this.set_only_latest_data(false);
            }
        },
    }
}
</script>
<style lang="">

</style>
