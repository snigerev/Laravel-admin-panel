<!--
  - Copyright (c) 14.12.2019.
  - File - LeftMenuComponents.vue
  - Author - tor
  -->

<template>
    <sidebar-menu @toggle-collapse="onToggleCollapse" :menu="menu"/>
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
                        href: {name: 'dashboard'},
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
        methods: {
            onToggleCollapse(collapse) {
                if (collapse) {
                    $('#main-content').addClass('collapsed').html();
                } else {
                    $('#main-content').removeClass('collapsed').html();
                }
            }
        }
    }
</script>
<style scoped>

</style>
