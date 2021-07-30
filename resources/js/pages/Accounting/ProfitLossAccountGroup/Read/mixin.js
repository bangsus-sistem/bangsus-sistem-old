import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'ref':'',
                    'name':'',
                },
            },
            query: {
                'account_type': {
                    'ref': '',
                    'name': '',
                    'default_reverse_value': '*',
                    'trial_balance_account_group_id': '*',
                },
            },
            meta: {
                'account_type': {
                    sortOrders: [
                        { index: 'ref', title: 'Referensi' },
                        { index: 'name', title: 'Nama' },
                        { index: 'default_reverse_value', title: 'Jenis Akun Default' },
                        { index: 'trial_balance_account_group_id', title: 'Grup Akun Neraca' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
                },
            },
            result: {
                'account_type': {
                    items: [],
                    meta: {}
                },
            },
            state: {
                result: {
                    'account_type': { loading: false },
                }
            },
            resources: {
                'trial_balance_account_groups': [],
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/accounting/profit_loss_account_group/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
        )
            .then(res => {
                this.fetchAndSetMultipleResources({
                    'trial_balance_account_groups': '/ajax/accounting/trial_balance_account_group/all'
                }, { resolve: true, reject: false }, { startLoading: false, stopLoading: false })
                    .then(res => {
                        this.prepare()
                    })
            })
    },
    methods: {
        prepare() {
            this.prepareAccountType()
        },
        prepareAccountType() {
            this.setQuery({
                'ref': [''],
                'name': [''],
                'default_reverse_value': ['*', ['*', true, false, 'true', 'false']],
                'trial_balance_account_group_id': ['*', ['*', null, ...lodash.map(this.resources['trial_balance_account_groups'], (val) => val.id)]],
            }, 'account_type')
            this.getAndSetResult(true, 'page', 'account_type')
        },
        fetchResult(index) {
            return axios.get('/ajax/accounting/' + index, {
                params: {
                    'profit_loss_account_group_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },
    }
}