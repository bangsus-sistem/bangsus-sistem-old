import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/system/branch_type/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: true },
            this.getFormDataCallback()
        )
            .then(res => { console.log(res)
                if (res.data.hidden) this.$router.push({ name: 'system.branchType' })
            })
    },
}