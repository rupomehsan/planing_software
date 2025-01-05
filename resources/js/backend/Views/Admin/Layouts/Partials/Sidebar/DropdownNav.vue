<template>
    <li class="side_nave_list_item " :class="{ 'nav-active': isShow }" :id="name">
        <div class="list_container nav_option ">
            <div class="list_identity_icon">
                <i :class="icon"></i>
            </div>

            <div class="list_name" v-if="name">
                <router-link :to="{ name: name }">
                    <span>{{ label }}</span>
                </router-link>
            </div>

            <div v-else class="list_name  justify-content-between" style="cursor: pointer;" @click="toggleShow">
                <span>{{ label }}</span>
                <span v-if="isShow">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <span v-if="!isShow">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
            </div>
        </div>
        <div class="dropdown" v-if="menus?.length">
            <ul v-if="isShow">
                <dropdown-single-item :menus="menus"></dropdown-single-item>
            </ul>
        </div>
    </li>
</template>

<script>
import DropdownSingleItem from './DropdownSingleItem.vue';

export default {
    props: ['icon', 'menus', 'name', 'label'],
    components: { DropdownSingleItem },
    data: () => ({
        isShow: false,
    }),

    created() {
       
    },

    methods: {
        toggleShow() {
            this.isShow = !this.isShow;
        },
    },
};
</script>

<style scoped>
a {
    text-decoration: none !important;
}

.nav-active {
    background: var(--color2);
}

.nav-active span {
    color: rgb(95, 85, 238) !important;
}
</style>
