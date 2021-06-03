import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/system/branch/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources(
                    {
                        'branch_types': '/ajax/system/branch_type/all',
                    },
                    { resolve: true, reject: false },
                    { startLoading: false, stopLoading: true },
                )
                    .then(res => {
                        let branchType = lodash.find(
                            this.resources['branch_types'],
                            (branchType) => branchType['id'] == this.form.data['branch_type_id']
                        )

                        this.state.form.codePrefix = branchType == undefined
                            ? ''
                            : branchType['code']

                        this.form.data['code'] = lodash.replace(this.form.data['code'], this.state.form.codePrefix, '')
                    })
            })
    },
}