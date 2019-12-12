<!--
  - Copyright (c) 12.12.2019.
  - File - UsersListComponents.vue
  - Author - tor
  -->

<template>
    <div class="container">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 col-10 font-weight-bold text-primary">Table</h6>
            <!--            {{ trans('admin/users.user_table') }}-->
            <a href="#" @click="route('admin.users.create')"
               class="btn col-2 m-auto btn-primary">ADD</a>
            <!--            {{ trans('admin/users.add_user') }}-->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <!--                    <thead>-->
                    <!--                    <tr>-->
                    <!--                        <th>#</th>-->
                    <!--                        <th>{{ trans('admin/users.username') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.nickname') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.email') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.group') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.actions') }}</th>-->
                    <!--                    </tr>-->
                    <!--                    </thead>-->
                    <!--                    <tfoot>-->
                    <!--                    <tr>-->
                    <!--                        <th>#</th>-->
                    <!--                        <th>{{ trans('admin/users.username') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.nickname') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.email') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.group') }}</th>-->
                    <!--                        <th>{{ trans('admin/users.actions') }}</th>-->
                    <!--                    </tr>-->
                    <!--                    </tfoot>-->
                    <tbody>

                    <tr v-for="user in usersList">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.nickname }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <!--                                    {{  trans('admin/users.' . $user->role_id) }}-->
                        </td>
                        <td>
                            <a href="#" @click="route('admin.users.edit', user.id)">
                                <i class="fas fa-edit"/>
                            </a>
                            <a href="#" @click="route('admin.users.show', user.id)">
                                <i class="fas fa-times-circle"/>
                            </a>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import router from '../../route';

    export default {
        name: "UsersListComponents",
        data() {
            return {
                usersList: []
            }
        },
        created() {
            this.userList();
            console.log('created')
        },
        methods: {
            userList() {
                axios.get(router('getUsersList'))
                    .then((response) => {
                        this.usersList = response.data;
                    })

            },
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
    a {
        cursor: pointer;
    }
</style>
