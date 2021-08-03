import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'ref': '',
                    'name': '',
                    'can_monitor_stock': '',
                    'must_monitor_stock': '',
                },
            },
        }
    },
    created() {
        this.fetchAndSetFormData(
            '/ajax/master/product_type/' + this.$route.params.id,
            { resolve: false, reject: false },
        )
    },
}