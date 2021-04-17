import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'ref': '',
                'name': '',
            },
            meta: {
                sortOrders: [
                    { index: 'ref', title: 'Referensi' },
                    { index: 'name', title: 'Nama' },
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
            })
            this.getAndSetResult()
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/auth/action', { params: this.query })
        },
    }
}