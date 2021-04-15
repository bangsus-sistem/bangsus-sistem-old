import page from '../page'
import middleware from '../middleware'

const appMiddleware = ['authenticated', 'versionCheck']

export default [
    {
        path: 'package',
        name: 'system.package',
        component: page('System/Package/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'package/read/:id',
        name: 'system.package.read',
        component: page('System/Package/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'module',
        name: 'system.module',
        component: page('System/Module/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role',
        name: 'system.role',
        component: page('System/Role/Index'),
        beforeEnter: middleware(appMiddleware),
    },
];
