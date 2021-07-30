import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'account_type',
        name: 'accounting.account_type',
        component: page('Accounting/AccountType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'account_type/read/:id',
        name: 'accounting.account_type.read',
        component: page('Accounting/AccountType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]