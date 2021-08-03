import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'ref': '',
                'name': '',
                'can_monitor_stock': '*',
                'must_monitor_stock': '*',
            },
            meta: {
                sortOrders: [
                    { index: 'ref', title: 'Referensi' },
                    { index: 'name', title: 'Nama' },
                    { index: 'can_monitor_stock', title: 'Bisa Monitor Stok' },
                    { index: 'must_monitor_stock', title: 'Harus Monitor Stok' },
                ],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.setQuery({
                'ref': [''],
                'name': [''],
                'can_monitor_stock': ['*', ['*', true, false, 'true', 'false']],
                'must_monitor_stock': ['*', ['*', true, false, 'true', 'false']],
            })
            this.getAndSetResult()
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/master/product_type', { params: this.query })
        },
    }
}