import page from './page'
import middleware from './middleware'

import system from './modules/system'
import master from './modules/master'

const appMiddleware = ['authenticated', 'versionCheck']

export default [
    {
        path: '/login',
        name: 'login',
        component: page('Login'),
        beforeEnter: middleware(['unauthenticated']),
    },
    {
        path: '/logout',
        name: 'logout',
        component: page('Logout'),
        beforeEnter: middleware(['authenticated']),
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: page('Dashboard'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: '/system',
        component: { template: '<router-view></router-view>' },
        children: system
    },
    {
        path: '/master',
        component: { template: '<router-view></router-view>' },
        children: master
    },
]