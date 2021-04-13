import page from './page'
import middleware from './middleware'

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
        path: '/system/package',
        name: 'system.package',
        component: page('System/Package/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: '/system/role',
        name: 'system.role',
        component: page('System/Role/Index'),
        beforeEnter: middleware(appMiddleware),
    },
]