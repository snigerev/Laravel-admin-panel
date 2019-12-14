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
import route from './route';

Vue.use(VueSidebarMenu);
Vue.use(VueRouter);

Vue.component('left-menu', require('./components/LeftMenuComponents').default);

const router = new VueRouter({
    mode: 'history',
    routes: route
});

const main_content = new Vue({
    el: '#wrapper',
    router: router
});
