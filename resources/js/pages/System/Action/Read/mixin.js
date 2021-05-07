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
                feature: {},
            },
            meta: {
                feature: {
                    sortOrders: [
                        { index: 'module_id', title: 'Modul' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
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
            '/ajax/auth/action/' + this.$route.params.id,
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
                    'action_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },
    }
}