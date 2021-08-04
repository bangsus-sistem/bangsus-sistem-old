import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/master/warehouse/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                if (res.data.hidden) this.$router.push({ name: 'system.warehouse' })
                
                this.fetchAndSetMultipleResources(
                    {
                        'branches': '/ajax/system/branch/all',
                    },
                    { resolve: true, reject: false },
                    { startLoading: false, stopLoading: true },
                )
                    .then(res => {
                        let branch = lodash.find(
                            this.resources['branches'],
                            (branch) => branch['id'] == this.form.data['branch_id']
                        )

                        this.state.form.codePrefix = branch == undefined
                            ? ''
                            : branch['code']

                        this.form.data['code'] = lodash.replace(this.form.data['code'], this.state.form.codePrefix, '')
                    })
            })
    },
}