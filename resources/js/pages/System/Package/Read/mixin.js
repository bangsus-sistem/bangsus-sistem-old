import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'ref':'',
                    'name':'',
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/auth/package/' + this.$route.params.id,
        )
    },
}