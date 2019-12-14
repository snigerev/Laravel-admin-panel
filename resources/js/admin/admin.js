/*
 * Copyright (c) 14.12.2019.
 * File - admin.js
 * Author - tor
 */

require('../app');
window.$ = window.JQuery = require('jquery');

import Vue from 'vue';
import VueRouter from "vue-router";

import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import rout from './rout';

Vue.use(VueSidebarMenu);
Vue.use(VueRouter);

//Vue.component('users-list', require('./components/UsersListComponents').default);
Vue.component('left-menu', require('./components/LeftMenuComponents').default);

const routers = new VueRouter({
    mode: 'history',
    routes: rout
});

const main_content = new Vue({
    el: '#wrapper',
    router: routers
});
