import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    data() {
        return {
            query: {
                branch: {
                    'code': '',
                    'name': '',
                    'active': '',
                    'order': '',
                    'sort': '',
                },
            },
            meta: {
                branch: {
                    sortOrders: [
                        { index: 'code', title: 'Kode' },
                        { index: 'name', title: 'Nama' },
                        { index: 'active', title: 'Status' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
                },
            },
            result: {
                branch: {
                    items: [],
                    meta: {}
                },
            },
            state: {
                result: {
                    branch: { loading: false },
                }
            }
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/system/branch_type/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.prepare()
            })
    },
    methods: {
        prepare() {
            this.prepareBranch()
        },
        prepareBranch() {
            this.setQuery({
                'code': [''],
                'name': [''],
                'active': [true, ['*', true, false, 'true', 'false']],
            }, 'branch')
            this.getAndSetResult(true, 'page', 'branch')
        },
        fetchResult(index) {
            return axios.get('/ajax/system/' + index, {
                params: {
                    'branch_type_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },
    }
}