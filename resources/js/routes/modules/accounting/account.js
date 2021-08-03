import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'account',
        name: 'accounting.account',
        component: page('Accounting/Account/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'account/create',
        name: 'accounting.account.create',
        component: page('Accounting/Account/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'account/read/:id',
        name: 'accounting.account.read',
        component: page('Accounting/Account/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'account/update/:id',
        name: 'accounting.account.update',
        component: page('Accounting/Account/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]