import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'code': '',
                'name': '',
                'branch_id': '',
                'active': '',
            },
            meta: {
                sortOrders: [
                    { index: 'code', title: 'Kode' },
                    { index: 'name', title: 'Nama' },
                    { index: 'warehouse', title: 'Cabang' },
                    { index: 'active', title: 'Status' },
                ],
            },
            resources: {
                'branches': [],
            }
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'branches': '/ajax/system/branch/all'
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
                .then(res => {
                    this.setQuery({
                        'code': [''],
                        'name': [''],
                        'branch_id': ['*', ['*', ...lodash.map(this.resources['branches'], (val) => val.id)]],
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
            return axios.get('/ajax/master/warehouse', { params: this.query })
        },
    }
}