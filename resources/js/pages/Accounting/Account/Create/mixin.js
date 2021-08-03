import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'accounts': '/ajax/accounting/account/all',
            'account_types': '/ajax/accounting/account_type/all',
            'trial_balance_account_groups': '/ajax/accounting/trial_balance_account_group/all',
            'profit_loss_account_groups': '/ajax/accounting/profit_loss_account_group/all',
        }, { resolve: false, reject: false })
    },
}