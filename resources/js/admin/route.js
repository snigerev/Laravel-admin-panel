/*
 * Copyright (c) 14.12.2019.
 * File - route.js
 * Author - tor
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
        path: '/admin',
        name: 'dashboard'
    },
    {
        path: '/admin/useradd',
        component: useradd,
        name: 'userAdd'
    }
]
