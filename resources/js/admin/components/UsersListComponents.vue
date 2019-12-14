<!--
  - Copyright (c) 14.12.2019.
  - File - UsersListComponents.vue
  - Author - tor
  -->

<template>
    <div class="content-wrapper ">
        <div id="loading" v-if="loading" class="d-flex align-items-center h-auto justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div v-if="!loading" class="card shadow mb-4 ml-2 container">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 col-10 font-weight-bold text-primary">Таблица ползователей</h6>
                <router-link :to="{name: 'userAdd'}"
                             class="btn col-2 m-auto btn-primary">Добавить
                </router-link>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя пользователя</th>
                            <th>Ник</th>
                            <th>Почта</th>
                            <th>Группа</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
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
                                <a href="#">
                                    <i class="fas fa-edit"/>
                                </a>
                                <a href="#">
                                    <i class="fas fa-times-circle"/>
                                </a>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UsersListComponents",
        data() {
            return {
                usersList: [],
                loading: true
            }
        },
        created() {
            this.userList();
        },
        methods: {
            userList() {
                axios.get('/api/getUsersList')
                    .then((response) => {
                        this.loading = false;
                        this.usersList = response.data;
                    })

            },
        }
    }
</script>

<style scoped>
    a {
        cursor: pointer;
    }
</style>
