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
                module: {
                    'ref': '',
                    'name': '',
                },
                widget: {
                    'ref': '',
                    'name': '',
                },
                report: {
                    'ref': '',
                    'name': '',
                },
            },
            meta: {
                module: {
                    sortOrders: [
                        { index: 'ref', title: 'Referensi' },
                        { index: 'name', title: 'Nama' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
                },
                widget: {
                    sortOrders: [
                        { index: 'ref', title: 'Referensi' },
                        { index: 'name', title: 'Nama' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
                },
                report: {
                    sortOrders: [
                        { index: 'ref', title: 'Referensi' },
                        { index: 'name', title: 'Nama' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: true,
                },
            },
            result: {
                module: {
                    items: [],
                    meta: {}
                },
                widget: {
                    items: [],
                    meta: {}
                },
                report: {
                    items: [],
                    meta: {}
                },
            },
            state: {
                result: {
                    module: { loading: false },
                    widget: { loading: false },
                    report: { loading: false },
                }
            }
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
            this.prepareModule()
            this.prepareWidget()
            this.prepareReport()
        },
        prepareModule() {
            this.setQuery({
                'ref': [''],
                'name': [''],
            }, 'module')
            this.getAndSetResult(true, 'page', 'module')
        },
        prepareWidget() {
            this.setQuery({
                'ref': [''],
                'name': [''],
            }, 'widget')
            this.getAndSetResult(true, 'page', 'widget')
        },
        prepareReport() {
            this.setQuery({
                'ref': [''],
                'name': [''],
            }, 'report')
            this.getAndSetResult(true, 'page', 'report')
        },
        fetchResult(index) {
            return axios.get('/ajax/auth/' + index, {
                params: {
                    'package_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },
    }
}