import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'name': '',
                    'branch_type_id': null,
                    'description': '',
                    'note': '',
                },
                errors: {
                    'code': [],
                    'name': [],
                    'branch_type_id': [],
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
                form: {
                    loading: false,
                    codePrefix: '',
                },
            },
            resources: {
                'branch_types': [],
            },
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'code': data['code'],
                    'name': data['name'],
                    'branch_type_id': data['branch_type']['id'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],
                }
            }
        }
    },
    watch: {
        'form.data.branch_type_id': function (val) {
            let branchType = lodash.find(
                this.resources['branch_types'],
                (branchType) => branchType['id'] == this.form.data['branch_type_id']
            )

            this.state.form.codePrefix = branchType == undefined
                ? ''
                : branchType['code']
        },
    },
}