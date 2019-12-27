<!--
  - Copyright (c) 24.12.2019.
  - File - UserEditComponent.vue
  - Author - snigerev
  -->

<template>
    <modal name="edit" transition="pop-out" height="auto">
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
                                <input type="password" id="password" v-model="userEdit.password"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-4 form-row align-content-center">
                                <label for="role_name" class="col-form-label mb-2">Группа пользователя: </label>
                                <select class="form-control" id="role_name" :name="userEdit.role_id" @change="RoleId">
                                    <option
                                        v-for="role in roles"
                                        :value="role.id"
                                        :selected="role.id === userData.role_id"
                                    >{{role.name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-top: 42px">
                        </div>

                        <div class="button-set">
                            <button class="btn btn-success" @click="saveUser()">Сохранить</button>
                            <button class="btn btn-dark" @click="$modal.hide('edit')">Отменить</button>
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
                userData: [],
                roles: [],
                userid: null,
                userEdit: {},
            }
        },
        methods: {
            openEdit(data) {
                this.userData = data;
                this.userId = data.id;
                this.$modal.show('edit');
                axios.get('/api/getRoles').then((resp) => {
                    this.roles = resp.data;
                })
            },
            RoleId(e) {
                this.userEdit.role_id = e.target.value;
            },
            saveUser() {
                $('#loading').attr('style', 'display:');
                console.log(this.userEdit);
                if (!$.isEmptyObject(this.userEdit)) {
                    axios({
                        method: 'post',
                        url: '/api/editUser/' + this.userId,
                        data: this.userEdit
                    }).then((resp) => {
                        if (resp.data === 'ok') {
                            console.log(resp.data);
                            alert('Данные успешно обновлены!');
                            $('#loading').attr('style', 'display:none !important');
                        }
                    })
                        .catch(function (resp) {
                            console.log(resp);
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
