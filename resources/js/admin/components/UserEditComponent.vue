<!--
  - Copyright (c) 20.12.2019.
  - File - UserEditComponent.vue
  - Author - tor
  -->

<template>
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
</template>

<script>
    const MODAL_WIDTH = 656;
    export default {
        name: "UserEditComponent",
        data() {
            return {
                modalWidth: MODAL_WIDTH,
                userData: [],
                userEdit: []
            }
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
        }
    }
</script>

<style scoped>

</style>
