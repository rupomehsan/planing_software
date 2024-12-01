<template lang="">
    <li v-for="(menu, index) in menus" :key="index">
        <span>
            <i class="fa-solid fa-circle-chevron-right"></i>
        </span>
        <router-link :to="{name:menu.name}">
            {{menu.label}}
        </router-link>
    </li>
</template>
<script>
export default {
    props: ['menus'],
    methods: {
        navigate() {
            this.$refs.link.click();
        }
    }
}
</script>

