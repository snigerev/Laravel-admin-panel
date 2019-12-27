<!--
  - Copyright (c) 14.12.2019.
  - File - UserAddComponent.vue
  - Author - tor
  -->

<template>
    <div class="content-wrapper d-flex flex-column">
        <div v-if="loading" class="d-flex align-items-center h-auto justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div v-if="!loading" class="card shadow mb-4 ml-2 container">
            <div class="card-header py-3  d-flex">
                <h6 class="m-0 col-12 font-weight-bold text-primary align-self-center">Создание пользователя</h6>
            </div>
            <div class="card-body col-4">
                <form action="#" method="post">
                    <input type="hidden" name="_token" :value="csrf">
                    <div class="form-group d-flex">
                        <div class="col-6 form-row align-content-center">
                            <label for="name" class="col-form-label mb-2">Имя пользователя : </label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="col-6 form-row align-content-center">
                            <label for="email" class="col-form-label mb-2">email : </label>
                            <input type="email" id="email" name="email"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="col-6 form-row align-content-center">
                            <label for="password" class="col-form-label mb-2">Пароль : </label>
                            <input type="password" id="password" name="password"
                                   class="form-control">
                        </div>
                        <div class="col-6 form-row align-content-center">
                            <label for="password-confirm"
                                   class="col-form-label mb-2">повторите пароль
                                : </label>
                            <input type="password" id="password-confirm" name="password_confirmation"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-auto form-row align-content-center">
                        <label for="roles">Группа</label>
                        <select class="form-control" name="role_id" id="roles">
                            <option selected disabled>Выберите группу</option>
                            <option value="0">1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                        </select>
                    </div>
                    <div class="form-row col-auto d-flex">
                        <button class="btn btn-primary mt-3" type="submit">добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserAddComponent",
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                loading: true,
            }
        },
        created() {
            this.loading = false
        },
        methods: {}

    }
</script>

<style scoped>

</style>
