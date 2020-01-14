<!--
  - Copyright (c) 14.1.2020.
  - File - UserAddComponent.vue
  - Author - admin
  -->

<template>
    <modal name="add" transition="pop-out" height="auto">
        <div class="box">
            <div class="card">
                <div class="card-header">Добавление аккаунта
                    <button type="button" class="close" data-dismiss="modal" @click="$modal.hide('add')"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body ">
                    <form>
                        <div class="form-group d-flex">
                            <div class="col-6 form-row align-content-center">
                                <label for="name" class="col-form-label mb-2">Имя пользователя: </label>
                                <input type="text" id="name" v-model="userAdd.name" class="form-control">
                            </div>
                            <div class="col-6 form-row align-content-center">
                                <label for="nickname" class="col-form-label mb-2">Ник пользователя: </label>
                                <input type="text" id="nickname" v-model="userAdd.nickname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-6 form-row align-content-center">
                                <label for="email" class="col-form-label mb-2">Почта пользователя: </label>
                                <input type="text" id="email" v-model="userAdd.email" class="form-control">
                            </div>
                            <div class="col-6 form-row align-content-center">
                                <label for="role_name" class="col-form-label mb-2">Группа пользователя: </label>
                                <select class="form-control" id="role_name" :name="userAdd.role_id">
                                    <option
                                        v-for="role in roles"
                                        :value="role.id"
                                    >{{role.name}}
                                    </option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group d-flex">
                            <div class="col-6 form-row align-content-center">
                                <label for="password" class="col-form-label mb-2">Пароль пользователя: </label>
                                <input type="password" id="password" v-model="userAdd.password"
                                       class="form-control">
                            </div>
                            <div class="col-6 form-row align-content-center">
                                <label for="password-confirm" class="col-form-label mb-2">Пароль пользователя: </label>
                                <input type="password" id="password-confirm" v-model="userAdd.password_confirmation"
                                       class="form-control">
                            </div>
                        </div>
                        <div style="margin-top: 42px">
                        </div>

                        <div class="button-set">
                            <button class="btn btn-success" @click="addUser()">Сохранить</button>
                            <input type="button" class="btn btn-dark" @click="$modal.hide('add')" value="Отменить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
    const MODAL_WIDTH = 656;
    export default {
        name: "UserEditComponent",
        data() {
            return {
                roles: [],
                userAdd: {},
            }
        },
        beforeCreate() {
            axios.get('/api/roles').then((resp) => {
                this.roles = resp.data;
            })
        },
        methods: {
            openAdd() {
                this.$modal.show('add');
            },
            addUser() {
                $('#loading').attr('style', 'display:');
                if (!$.isEmptyObject(this.userAdd)) {
                    axios({
                        method: 'post',
                        url: '/api/users',
                        data: this.userAdd
                    }).then((resp) => {
                        if (resp.data === 'ok') {
                            alert('Данные успешно обновлены!');
                            $('#loading').attr('style', 'display:none !important');
                        }
                    })
                        .catch(function (resp) {
                            alert("Обновление не удалось.");
                        });
                } else {
                    alert('Данные не заполнены');
                }
            },
        }
    }
</script>

<style scoped>

</style>
