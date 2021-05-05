import commonMixin from '../mixin/common-mixin'

export default {
    mixins: [commonMixin],
    data() {
        return {
            query: {
                user: {
                    'username': '',
                    'full_name': '',
                    'active': '',
                    'all_branches': '',
                },
            },
            meta: {
                user: {
                    sortOrders: [
                        { index: 'username', title: 'Username' },
                        { index: 'full_name', title: 'Nama' },
                        { index: 'active', title: 'Status' },
                        { index: 'all_branches', title: 'Cabang' },
                    ],
                    counts: [10, 25, 50, 100],
                    show: false,
                },
            },
            result: {
                user: {
                    items: [],
                    meta: {}
                },
            },
            state: {
                result: {
                    user: { loading: false },
                }
            }
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/auth/role/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources(
                    {
                        'packages': '/ajax/auth/package/all',
                        'modules': '/ajax/auth/module/all',
                        'actions': '/ajax/auth/action/all',
                        'widgets': '/ajax/auth/widget/all',
                        'reports': '/ajax/auth/report/all',
                        'features': '/ajax/auth/feature/all',
                    },
                    { resolve: true, reject: false },
                    { startLoading: false, stopLoading: true },
                )
                    .then(res => {
                        this.prepare()
                    })
            })
    },
    methods: {
        prepare() {
            this.prepareUser()
        },
        prepareUser() {
            this.setQuery({
                'username': [''],
                'full_name': [''],
                'active': [true, ['*', true, false, 'true', 'false']],
                'all_branches': ['*', ['*', true, false, 'true', 'false']],
            }, 'user')
            this.getAndSetResult(true, 'page', 'user')
        },
        fetchResult(index) {
            return axios.get('/ajax/auth/' + index, {
                params: {
                    'role_id': this.$route.params.id,
                    ...this.query[index],
                }
            })
        },

        featureIsChecked(featureId) {
            return lodash.includes(this.form.data['feature_ids'], featureId)
        },
        widgetIsChecked(widgetId) {
            return lodash.includes(this.form.data['widget_ids'], widgetId)
        },
        reportIsChecked(reportId) {
            return lodash.includes(this.form.data['report_ids'], reportId)
        },
    }
}