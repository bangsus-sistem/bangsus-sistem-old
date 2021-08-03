import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/accounting/account/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                if (res.data.locked) {
                    this.addErrorFlasher('Data tidak bisa diubah.')
                    this.$router.push({ name: 'accounting.account' })
                }

                this.fetchAndSetMultipleResources(
                    {
                        'accounts': '/ajax/accounting/account/all',
                        'account_types': '/ajax/accounting/account_type/all',
                        'trial_balance_account_groups': '/ajax/accounting/trial_balance_account_group/all',
                        'profit_loss_account_groups': '/ajax/accounting/profit_loss_account_group/all',
                    },
                    { resolve: true, reject: false },
                    { startLoading: false, stopLoading: true }
                )
                    .then(res => {
                        let parentAccount = lodash.find(
                            this.resources['accounts'],
                            (account) => account['id'] == this.form.data['parent_account_id']
                        )

                        this.state.form.codePrefix = parentAccount == undefined
                            ? ''
                            : parentAccount['code']

                        this.form.data['code'] = lodash.replace(this.form.data['code'], this.state.form.codePrefix, '')
                    })
            })
                
    },
}