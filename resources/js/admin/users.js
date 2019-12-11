/*
 * Copyright (c) 11.12.2019.
 * File - users.js
 * Author - tor
 */

window.$ = window.JQuery = require('jquery');

//window.$.DataTable = require('datatables/media/js/jquery.dataTables.min');
//import dataTables from 'datatables/media/js/jquery.dataTables';

//require('./datatables-demo');

window.Vue = require('vue');


Vue.component('users-list', require('./components/UsersListComponents').default);

const userList = new Vue({
    el: '#UsersTable',
});
