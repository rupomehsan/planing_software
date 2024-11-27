<template>
    <div>
        <h2 class="module_layout_title">{{ setup.prefix }} Management</h2>
        <router-view></router-view>
    </div>
</template>
<script>
import setup from './config/setup';
export default {
    data: () => ({
        setup,
    })
}
</script>
<style >

</style>
