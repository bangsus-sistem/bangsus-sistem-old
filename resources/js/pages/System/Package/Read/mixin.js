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
                'package_id': this.$route.params.id,
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
        this.fetchAndSetFormData(
            '/ajax/auth/package/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
        )
            .then(res => {
                this.prepare()
            })
    },
    methods: {
        prepare() {
            this.setQuery({
                'package_id': [this.$route.params.id],
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
            return axios.get('/ajax/auth/module', { params: this.query })
        },
    }
}