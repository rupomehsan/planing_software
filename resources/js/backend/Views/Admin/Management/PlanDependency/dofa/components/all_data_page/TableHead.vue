<template>
    <tr>

        <th class="w-10 text-center">
            <span class="icon"></span>
        </th>
        <th class="w-10 text-center">
            <select-all />
        </th>
        <template v-for="(item, index) in setup.table_header_data" :key="index">

            <th :class="index == 0 ? 'w-10' : ''"> {{ item }} </th>
        </template>
    </tr>
</template>

<script>
import setup from '../../setup';
import SelectAll from './select_data/SelectAll.vue';
export default {
    data: () => ({
        setup,
    }),
    components: {
        SelectAll,
    },
}
</script>

 
