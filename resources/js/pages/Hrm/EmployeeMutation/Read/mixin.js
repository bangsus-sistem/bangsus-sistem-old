import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/hrm/employee_mutation/' + this.$route.params.id,
            { resolve: false, reject: false },
            { startLoading: true, stopLoading: true },
            this.getFormDataCallback()
        )
    },
}