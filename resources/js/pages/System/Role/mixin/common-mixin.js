import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'name': '',
                    'all_features': false,
                    'feature_ids': [],
                    'all_widgets': false,
                    'widget_ids': [],
                    'all_reports': false,
                    'report_ids': [],
                    'description': '',
                    'note': '',
                },
                errors: {
                    'code': [],
                    'name': [],
                    'feature_ids': [],
                    'widget_ids': [],
                    'report_ids': [],
                    'description': [],
                    'note': [],
                },
            },
            state: {
                page: {
                    loading: false,
                    error: false,
                    message: null,
                },
                result: { loading: false },
                form: { loading: false },
            },
            resources: {
                'packages': [],
                'modules': [],
                'actions': [],
                'widgets': [],
                'reports': [],
                'features': [],
            },
        }
    },
    computed: {
        packageTitleColspan() {
            const additionalColumn = 2
            return additionalColumn + this.resources.actions.length
        },
    },
    methods: {
        getFeature(moduleId, actionId) {
            return lodash.find(this.resources['features'], {
                'module_id': moduleId,
                'action_id': actionId,
            })
        },
        featureExists(moduleId, actionId) {
            return this.getFeature(moduleId, actionId) != undefined
        },
        getModulesByPackageId(packageId) {
            return lodash.filter(this.resources['modules'], (module) => module['package_id'] == packageId)
        },
        getWidgetsByPackageId(packageId) {
            return lodash.filter(this.resources['widgets'], (widget) => widget['package_id'] == packageId)
        },
        getReportsByPackageId(packageId) {
            return lodash.filter(this.resources['reports'], (report) => report['package_id'] == packageId)
        },
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'code': data['code'],
                    'name': data['name'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],
                    'all_features': data['all_features'],
                    'all_widgets': data['all_widgets'],
                    'all_reports': data['all_reports'],
                    'feature_ids': ! data['all_features']
                        ?   lodash.chain(data['features'])
                                .map(feature => feature['id'])
                                .value()
                        :   [],
                    'widget_ids': ! data['all_widgets']
                    ?   lodash.chain(data['widgets'])
                            .map(widget => widget['id'])
                            .value()
                    :   [],
                    'report_ids': ! data['all_reports']
                    ?   lodash.chain(data['reports'])
                            .map(report => report['id'])
                            .value()
                    :   [],
                }
            }
        }
    },
}