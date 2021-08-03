import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'name': '',
                    'account_type_id': null,
                    'reverse_value': null,
                    'parent_account_id': null,
                    'transaction': false,
                    'description': '',
                    'note': '',
                },
                errors: {
                    'code': [],
                    'name': [],
                    'account_type_id': [],
                    'reverse_value': [],
                    'parent_account_id': [],
                    'transaction': [],
                    'description': [],
                    'note': [],
                },
            },
            state: {
                page: {
                    loading: false,
                    error: false,
                    message: null,
                },
                result: { loading: false },
                form: {
                    loading: false,
                    codePrefix: '',
                    lockedAccountType: false,
                    lockedTrialBalanceAccountGroup: false,
                    lockedProfitLossAccountGroup: false,
                    dataLoaded: false,
                },
            },
            resources: {
                'accounts': [],
                'account_types': [],
                'trial_balance_account_groups': [],
                'profit_loss_account_groups': [],
            },
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'code': data['code'],
                    'name': data['name'],
                    'account_type_id': this._objNullsafe(data['account_type'], 'id'),
                    'trial_balance_account_group_id': this._objNullsafe(data['trial_balance_account_group'], 'id'),
                    'profit_loss_account_group_id': this._objNullsafe(data['profit_loss_account_group'], 'id'),
                    'parent_account_id': this._objNullsafe(data['parent_account'], 'id'),
                    'reverse_value': data['reverse_value'],
                    'transaction': data['transaction'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],

                    'account_type': data['account_type'],
                    'trial_balance_account_group': data['trial_balance_account_group'],
                    'profit_loss_account_group': data['profit_loss_account_group'],
                    'parent_account': data['parent_account'],
                }
            }
        },
        getAccountType(id = 'current') {
            return lodash.find(
                this.resources['account_types'],
                (accountType) => accountType['id'] == (id == 'current' ? this.form.data['account_type_id'] : id)
            )
        },
        getParentAccount() {
            return lodash.find(
                this.resources['accounts'],
                (parentAccount) => parentAccount['id'] == this.form.data['parent_account_id']
            )
        },
    },
    watch: {
        'form.data.account_type_id': function (val) {
            let accountType = this.getAccountType()

            if (accountType != undefined) {
                this.form.data['trial_balance_account_group_id'] = accountType['trial_balance_account_group_id']
                this.form.data['profit_loss_account_group_id'] = accountType['profit_loss_account_group_id']
                this.form.data['reverse_value'] = accountType['default_reverse_value']
                this.state.form.lockedTrialBalanceAccountGroup = true
                this.state.form.lockedProfitLossAccountGroup = true
            } else {
                this.form.data['trial_balance_account_group_id'] = null
                this.form.data['profit_loss_account_group_id'] = null
                this.state.form.lockedTrialBalanceAccountGroup = false
                this.state.form.lockedProfitLossAccountGroup = false
            }
        },
        'form.data.parent_account_id': function (val) {
            let parentAccount = this.getParentAccount()

            this.state.form.codePrefix = parentAccount == undefined
                ? ''
                : parentAccount['code']

            if ( ! this.state.form.dataLoaded) {
                this.state.form.dataLoaded = true
            } else {
                if (parentAccount != null) {
                    let accountType = this.getAccountType(parentAccount['account_type_id'])
                    if (accountType != null) {
                        this.form.data['account_type_id'] = accountType['id']
                        this.state.form.lockedAccountType = true
                    } else {
                        this.form.data['account_type_id'] = null
                        this.state.form.lockedAccountType = false
                    }
                } else {
                    this.form.data['account_type_id'] = null
                    this.state.form.lockedAccountType = false
                }
            }
        },
    },
    computed: {
        parentAccount() {
            let parentAccount = this.form.data['parent_account']
            return parentAccount == null ? 'Tidak ada' : parentAccount['code'] + ' - ' + parentAccount['name']
        },
        accountType() {
            let accountType = this.form.data['account_type']
            return accountType == null ? 'Tidak ada' : accountType['code'] + ' - ' + accountType['name']
        },
        trialBalanceAccountGroup() {
            let accountType = this.getAccountType()
            if (accountType == null) return 'Tidak ada'

            let trialBalanceAccountGroup = lodash.find(
                this.resources['trial_balance_account_groups'],
                (val) => val['id'] == accountType['trial_balance_account_group_id']
            )

            return trialBalanceAccountGroup == null ? 'Tidak ada' : trialBalanceAccountGroup['name']
        },
        profitLossAccountGroup() {
            let accountType = this.getAccountType()
            if (accountType == null) return 'Tidak ada'
            
            let profitLossAccountGroup = lodash.find(
                this.resources['profit_loss_account_groups'],
                (val) => val['id'] == accountType['profit_loss_account_group_id']
            )

            return profitLossAccountGroup == null ? 'Tidak ada' : profitLossAccountGroup['name']
        },
    },
}