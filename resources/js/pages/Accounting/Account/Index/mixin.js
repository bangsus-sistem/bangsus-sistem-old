import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'name': '',
                'account_type_id': '',
                'reverse_value': '',
                'parent_account_id': '',
                'active': '',
            },
            result: {
                items: [],
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'name', title: 'Nama' },
                    { index: 'account_type_id', title: 'Tipe Akun' },
                    { index: 'reverse_value', title: 'Jenis Akun' },
                    { index: 'parent_account_id', title: 'Akun Induk' },
                    { index: 'active', title: 'Status' },
                ],
            },
            resources: {
                'account_types': [],
                'accounts': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'account_types': '/ajax/accounting/account_type/all',
                'accounts': ['/ajax/accounting/account/all', (account) => account['child_accounts'] == null],
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
                .then(res => {
                    this.setQuery({
                        'code': [''],
                        'name': [''],
                        'account_type_id': ['*', ['*', ...lodash.map(this.resources['account_types'], (val) => val.id)]],
                        'reverse_value': ['*', ['*', true, false, 'true', 'false']],
                        'parent_account_id': ['*', ['*', ...lodash.map(this.resources['accounts'], (val) => val.id && val.child_accounts != null)]],
                        'active': [true, ['*', true, false, 'true', 'false']],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/accounting/account', { params: this.query })
        },
    },
}