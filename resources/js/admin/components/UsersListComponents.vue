<!--
  - Copyright (c) 19.12.2019.
  - File - UsersListComponents.vue
  - Author - snigerev
  -->

<template>
    <div class="content-wrapper ">
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
                            <td>{{user.role_name}}</td>
                            <td>
                                <a @click="openEdit(user)">
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

        <modal name="edit" transition="pop-out" :width="modalWidth" height="auto">
            <div class="box">
                <div class="card">
                    <div class="card-header">Редактирование аккаунта
                        <button type="button" class="close" data-dismiss="modal" @click="$modal.hide('edit')"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body ">
                        <form>
                            <div class="form-group d-flex">
                                <div class="col-4 form-row align-content-center">
                                    <label for="name" class="col-form-label mb-2">Имя пользователя: </label>
                                    <input type="text" id="name" v-model="userEdit.name" class="form-control"
                                           :placeholder="userData.name">
                                </div>
                                <div class="col-4 form-row align-content-center">
                                    <label for="nickname" class="col-form-label mb-2">Ник пользователя: </label>
                                    <input type="text" id="nickname" v-model="userEdit.nickname" class="form-control"
                                           :placeholder="userData.nickname">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-4 form-row align-content-center">
                                    <label for="email" class="col-form-label mb-2">Почта пользователя: </label>
                                    <input type="text" id="email" v-model="userEdit.email" class="form-control"
                                           :placeholder="userData.email">
                                </div>
                                <div class="col-4 form-row align-content-center">
                                    <label for="password" class="col-form-label mb-2">Пароль пользователя: </label>
                                    <input type="password" id="password" v-model="userEdit.paswword"
                                           class="form-control">
                                </div>
                            </div>
                        </form>

                        <div style="margin-top: 42px">
                        </div>

                        <div class="button-set">
                            <button class="btn btn-primary" @click="saveUser(userEdit)">Сохранить</button>
                            <button class="btn btn-dark" @click="$modal.hide('edit')">Отменить</button>
                        </div>

                    </div>
                </div>
            </div>
        </modal>

    </div>
</template>

<script>
    const MODAL_WIDTH = 656;
    export default {
        name: "UsersListComponents",
        data() {
            return {
                usersList: [],
                loading: true,
                modalWidth: MODAL_WIDTH,
                userData: [],
                userEdit: []
            }
        },
        created() {
            this.userList();
        },
        methods: {
            openEdit(data) {
                this.modalWidth = window.innerWidth < MODAL_WIDTH
                    ? MODAL_WIDTH / 2
                    : MODAL_WIDTH;
                this.userData = data;
                this.$modal.show('edit')
            },
            saveUser(data) {
                console.log(data.name);
                $('#loading').attr('style', 'display:');
            },
            userList() {
                axios.get('/api/getUsersList')
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
