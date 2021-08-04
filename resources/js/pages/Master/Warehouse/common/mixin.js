import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'name': '',
                    'branch_id': '',
                    'address': '',
                    'description': '',
                    'note': '',
                },
                errors: {
                    'code': [],
                    'name': [],
                    'branch_id': [],
                    'address': [],
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
                'branches': [],
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
                    'branch_id': data['branch']['id'],
                    'address': data['address'],
                    'active': data['active'],
                    'description': data['description'],
                    'note': data['note'],
                    
                    'branch': data['branch'],
                }
            }
        }
    },
    watch: {
        'form.data.branch_id': function (val) {
            let branch = lodash.find(
                this.resources['branches'],
                (branch) => branch['id'] == this.form.data['branch_id']
            )

            this.state.form.codePrefix = branch == undefined
                ? ''
                : branch['code']
        },
    },
}