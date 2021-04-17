import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'module': {},
                    'action': {},
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/auth/feature/' + this.$route.params.id,
        )
    },
}