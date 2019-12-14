<!--
  - Copyright (c) 14.12.2019.
  - File - LeftMenuComponents.vue
  - Author - tor
  -->

<template>
    <sidebar-menu :menu="menu"/>
</template>

<script>

    export default {
        name: "LeftMenuComponents",
        data() {
            return {
                theme: {
                    type: 'Default',
                },
                menu: [
                    {
                        header: true,
                        title: 'Меню',
                        hiddenOnCollapse: true
                    },
                    {
                        href: {path: '/'},
                        title: 'Dashboard',
                        icon: 'fas fa-fw fa-tachometer-alt'
                    },
                    {
                        href: {name: 'usersList'},
                        title: 'Пользователи',
                        icon: 'fas fa-user-alt'
                    },
                ]
            }
        },
        created() {

        },
        methods: {}
    }
</script>
<style scoped>
    .v-sidebar-menu.vsm_expanded {
        position: relative;
        margin: 0 50px 0 0;
    }

    .v-sidebar-menu.vsm_collapsed {
        position: relative;
        margin: 0;
    }
</style>
