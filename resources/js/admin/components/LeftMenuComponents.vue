<!--
  - Copyright (c) 12.12.2019.
  - File - LeftMenuComponents.vue
  - Author - tor
  -->

<template>
    <sidebar-menu :menu="menu"/>
</template>

<script>
    import router from "../../route";

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
                        href: '/admin',
                        title: 'Dashboard',
                        icon: 'fas fa-fw fa-tachometer-alt'
                    },
                    {
                        href: '/admin/users',
                        title: 'Пользователи',
                        icon: 'fas fa-user-alt'
                    },
                ]
            }
        },
        created() {

        },
        methods: {
            route: function (route, parameters = '') {
                if (parameters !== '') {
                    window.location.replace(router(route, parameters))
                } else {
                    window.location.replace(router(route))
                }
            }
        }
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
