import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'ref': '',
                'name': '',
                'default_reverse_value': '*',
                'trial_balance_account_group_id': '*',
                'profit_loss_account_group_id': '*',
            },
            meta: {
                sortOrders: [
                    { index: 'ref', title: 'Referensi' },
                    { index: 'name', title: 'Nama' },
                    { index: 'default_reverse_value', title: 'Jenis Akun Default' },
                    { index: 'trial_balance_account_group_id', title: 'Grup Akun Neraca' },
                    { index: 'profit_loss_account_group_id', title: 'Grup Akun Laba Rugi' },
                ],
            },
            resources: {
                'trial_balance_account_groups': [],
                'profit_loss_account_groups': [],
            }
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'trial_balance_account_groups': '/ajax/accounting/trial_balance_account_group/all',
                'profit_loss_account_groups': '/ajax/accounting/profit_loss_account_group/all',
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
                .then(res => {
                    this.setQuery({
                        'ref': [''],
                        'name': [''],
                        'default_reverse_value': [true, ['*', true, false, 'true', 'false']],
                        'trial_balance_account_group_id': ['*', ['*', null, ...lodash.map(this.resources['trial_balance_account_groups'], (val) => val.id)]],
                        'profit_loss_account_group_id': ['*', ['*', null, ...lodash.map(this.resources['profit_loss_account_groups'], (val) => val.id)]],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/accounting/account_type', { params: this.query })
        },
    }
}