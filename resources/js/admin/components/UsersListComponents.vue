<!--
  - Copyright (c) 14.1.2020.
  - File - UsersListComponents.vue
  - Author - admin
  -->

<template>
    <div class="content-wrapper ">
        <div v-if="!loading" class="card shadow mb-4 ml-2 container">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 col-10 font-weight-bold text-primary">Таблица ползователей</h6>
                <button class="btn btn-primary" @click="$refs.userAdd.openAdd">Добавить</button>
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
                            <td>{{ user.role_name }}</td>
                            <td>
                                <a @click="$refs.userEdit.openEdit(user)">
                                    <i class="fas fa-edit"/>
                                </a>
                                <a>
                                    <i class="fas fa-times-circle"/>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <UserEditComponent ref="userEdit"/>
        <UserAddComponent ref="userAdd"/>
    </div>
</template>

<script>
    import UserEditComponent from './UserEditComponent';
    import UserAddComponent from "./UserAddComponent";
    export default {
        name: "UsersListComponents",
        components: {UserEditComponent, UserAddComponent},
        data() {
            return {
                usersList: [],
                loading: true,
                showEditModal: false
            }
        },
        created() {
            this.userList();
        },
        methods: {
            userList() {
                axios.get('/api/users')
                    .then((response) => {
                        this.loading = false;
                        $('#loading').attr('style', 'display:none !important');
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

    a:not([href]) {
        color: #3490dc;
    }

    a:not([href]):hover {
        color: #1d68a7;
    }
</style>
