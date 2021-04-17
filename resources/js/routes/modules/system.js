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
        path: 'module/read/:id',
        name: 'system.module.read',
        component: page('System/Module/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'action',
        name: 'system.action',
        component: page('System/Action/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'action/read/:id',
        name: 'system.action.read',
        component: page('System/Action/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'feature',
        name: 'system.feature',
        component: page('System/Feature/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'feature/read/:id',
        name: 'system.feature.read',
        component: page('System/Feature/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'widget',
        name: 'system.widget',
        component: page('System/Widget/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'widget/read/:id',
        name: 'system.widget.read',
        component: page('System/Widget/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'report',
        name: 'system.report',
        component: page('System/Report/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'report/read/:id',
        name: 'system.report.read',
        component: page('System/Report/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'role',
        name: 'system.role',
        component: page('System/Role/Index'),
        beforeEnter: middleware(appMiddleware),
    },
];
