import page from './page'
import middleware from './middleware'

import system from './modules/system'
import accounting from './modules/accounting'
import master from './modules/master'
import hrm from './modules/hrm'

const appMiddleware = ['authenticated', 'versionCheck']
const blankComponent = { template: '<router-view></router-view>' }

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
        component: blankComponent,
        children: system
    },
    {
        path: '/accounting',
        component: blankComponent,
        children: accounting
    },
    {
        path: '/master',
        component: blankComponent,
        children: master
    },
    {
        path: '/hrm',
        component: blankComponent,
        children: hrm
    },
]