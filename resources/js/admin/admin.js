/*
 * Copyright (c) 13.12.2019.
 * File - admin.js
 * Author - tor
 */

require('../app');
window.$ = window.JQuery = require('jquery');

import Vue from 'vue';

import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'

Vue.use(VueSidebarMenu);


Vue.component('users-list', require('./components/UsersListComponents').default);
Vue.component('left-menu', require('./components/LeftMenuComponents').default);

const leftMenu = new Vue({
    mode: history,
    el: '#leftMenu',
});

const main_content = new Vue({
    mode: history,
    el: '#main-content',
});
