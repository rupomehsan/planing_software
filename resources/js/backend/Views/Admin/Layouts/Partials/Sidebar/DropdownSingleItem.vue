<template>
    <li
        v-for="(menu, index) in menus"
        :key="index"
        @click="setActive(index)"
    >
        <span>
            <i class="fa-solid fa-circle-chevron-right"></i>
        </span>
        <router-link
            :to="{ name: menu.name }"
            :class="{ 'dropdown-item-active': activeIndex === index }"
        >
            {{ menu.label }}
        </router-link>
    </li>
</template>

<script>
export default {
    props: ['menus'],
    data() {
        return {
            activeIndex: null, // Tracks the active menu index
        };
    },
    created() {
       this.setActive(this.menus.findIndex(menu => menu.name === this.$route.name));
    },
    methods: {
        setActive(index) {
            this.activeIndex = index;
        },
    },
};
</script>

<style>
.dropdown-item-active {
    color: rgb(95, 85, 238) !important;
}
</style>
