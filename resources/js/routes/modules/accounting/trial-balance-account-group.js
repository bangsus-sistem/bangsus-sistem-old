import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'trial_balance_account_group',
        name: 'accounting.trial_balance_account_group',
        component: page('Accounting/TrialBalanceAccountGroup/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'trial_balance_account_group/read/:id',
        name: 'accounting.trial_balance_account_group.read',
        component: page('Accounting/TrialBalanceAccountGroup/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]