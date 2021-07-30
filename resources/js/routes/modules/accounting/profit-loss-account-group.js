import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'profit_loss_account_group',
        name: 'accounting.profit_loss_account_group',
        component: page('Accounting/ProfitLossAccountGroup/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'profit_loss_account_group/read/:id',
        name: 'accounting.profit_loss_account_group.read',
        component: page('Accounting/ProfitLossAccountGroup/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]