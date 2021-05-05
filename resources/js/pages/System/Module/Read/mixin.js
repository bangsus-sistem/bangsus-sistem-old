import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'ref':'',
                    'name':'',
                    'package': {},
                },
            },
            query: {
                feature: {},
            },
            meta: {
                feature: {
                    sortOrders: [
                        { index: 'action_id', title: 'Aksi' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: false,
                },
            },
            result: {
                feature: {
                    items: [],
                    meta: {}
                },
            },
            state: {
                result: {
                    feature: { loading: false },
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/auth/module/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
        )
            .then(res => {
                this.prepare()
            })
    },
    methods: {
        prepare() {
            this.prepareFeature()
        },
        prepareFeature() {
            this.setQuery({}, 'feature')
            this.getAndSetResult(true, 'page', 'feature')
        },
        fetchResult(index) {
            return axios.get('/ajax/auth/' + index, {
                params: {
                    'module_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },
    }
}