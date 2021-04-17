import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'ref':'',
                    'name':'',
                    'package': {},
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/auth/widget/' + this.$route.params.id,
        )
    },
}