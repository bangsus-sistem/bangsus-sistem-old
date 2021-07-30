import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'ref': '',
                    'name': '',
                    'default_reverse_value': '',
                    'trial_balance_account_group': {},
                    'profit_loss_account_group': {},
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/accounting/account_type/' + this.$route.params.id,
            { resolve: false, reject: false },
        )
    },
    computed: {
        trialBalanceAccountGroup() {
            let trialBalanceAccountGroup = this.form.data['trial_balance_account_group']

            return trialBalanceAccountGroup == null ? '-' : trialBalanceAccountGroup['ref'] + ' ' + trialBalanceAccountGroup['name']
        },
        profitLossAccountGroup() {
            let profitLossAccountGroup = this.form.data['profit_loss_account_group']

            return profitLossAccountGroup == null ? '-' : profitLossAccountGroup['ref'] + ' ' + profitLossAccountGroup['name']
        },
    }
}