import commonMixin from '../mixin/common-mixin'

export default {
    mixins: [commonMixin],
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
                    { resolve: false, reject: false },
                    { startLoading: false, stopLoading: true },
                )
            })
    },
    methods: {
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