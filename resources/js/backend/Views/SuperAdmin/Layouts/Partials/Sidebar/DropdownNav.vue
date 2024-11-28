<template>
    <li class="side_nave_list_item" name="user">
        <div class="list_container nav_option ">
            <div class="list_identity_icon">
                <i :class="icon"></i>
            </div>
            <div class="list_name" v-if="name">
                <router-link :to="{ name: name }">
                    <span>{{ label }}</span>

                </router-link>
            </div>
            <div v-else class="list_name" style="cursor: pointer;" @click="toggleShow">
                <span>{{ label }}</span>
                <div class="list_right_icons">
                    <i class="fa-solid" :class="isShow ? 'fa-angle-down' : 'fa-angle-right'"></i>
                </div>
            </div>
        </div>
        <div class="dropdown" style="" v-if="menus?.length">
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
    methods: {
        toggleShow() {
            this.isShow = !this.isShow;
            console.log('isShow:', this.isShow); // Debugging output
        },
    }
}
</script>

<style lang="scss" scoped></style>
