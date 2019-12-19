/*
 * Copyright (c) 19.12.2019.
 * File - route.js
 * Author - snigerev
 */

import users from './components/UsersListComponents';
import useradd from './components/UserAddComponent';

export default [
    {
        path: '/admin/users',
        component: users,
        name: 'usersList'
    },
    {
        path: '/admin/',
        component: users,
        name: 'dashboard'
    },
    {
        path: '/admin/useradd',
        component: useradd,
        name: 'userAdd'
    }
]
