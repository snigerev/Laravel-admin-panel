/*
 * Copyright (c) 12.12.2019.
 * File - users.js
 * Author - tor
 */

window.$ = window.JQuery = require('jquery');

//window.Vue = require('vue');
import Vue from 'vue';


Vue.component('users-list', require('./components/UsersListComponents').default);

const userList = new Vue({
    el: '#UsersTable',
});
