import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            query: {
                'module_id': '*',
                'action_id': '*',
            },
            meta: {
                sortOrders: [
                    { index: 'module_id', title: 'Modul' },
                    { index: 'action_id', title: 'Aksi' },
                ],
            },
            resources: {
                'modules': [],
                'action': [],
            },
        }
    },
    created() {
        this.prepare()
    },
    methods: {
        prepare() {
            this.fetchAndSetMultipleResources({
                'modules': '/ajax/auth/module/all',
                'actions': '/ajax/auth/action/all',
            }, { resolve: true, reject: false }, { startLoading: true, stopLoading: false })
                .then(res => {
                    this.setQuery({
                        'module_id': ['*', ['*', ...lodash.map(this.resources['modules'], (val) => val.id)]],
                        'action_id': ['*', ['*', ...lodash.map(this.resources['actions'], (val) => val.id)]],
                    })
                    this.getAndSetResult()
                })
        },
        search() {
            this.startResultLoading()
            this.getAndSetResult(true, 'result')
        },
        fetchResult() {
            return axios.get('/ajax/auth/feature', { params: this.query })
        },
    }
}