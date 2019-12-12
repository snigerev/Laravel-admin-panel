/*
 * Copyright (c) 12.12.2019.
 * File - admin.js
 * Author - tor
 */

require('../app');
//require('perfect-scrollbar/dist/perfect-scrollbar');

// require('./sb-admin-2.min');
// //require('chart.js/dist/Chart');
// require('bootstrap-notify/bootstrap-notify');
import Vue from 'vue';


import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'

Vue.use(VueSidebarMenu);

Vue.component('left-menu', require('./components/LeftMenuComponents').default);

const leftMenu = new Vue({
    el: '#leftMenu',
});
