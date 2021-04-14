import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'package_id': '*',
                'ref': '',
                'name': '',
            },
            meta: {
                sortOrders: [
                    { index: 'package_id', title: 'Package' },
                    { index: 'ref', title: 'Referensi' },
                    { index: 'name', title: 'Nama' },
                ],
            },
            resources: {
                'packages': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'packages': '/ajax/auth/package/all'
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
            .then(res => {
                this.setQuery({
                    'package_id': ['*', ['*', ...lodash.map(this.resources['packages'], (val) => val.id)]],
                    'ref': [''],
                    'name': [''],
                })
                this.getAndSetResult()
            })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/auth/module', { params: this.query })
        },
    }
}