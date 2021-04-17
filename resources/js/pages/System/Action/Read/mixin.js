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
            query: {
                'action_id': this.$route.params.id,
                'ref': '',
                'name': '',
            },
            meta: {
                sortOrders: [
                    { index: 'ref', title: 'Referensi' },
                    { index: 'name', title: 'Nama' },
                ],
            },
        }
    },
    created() {
        this.fetchAndSetFormData('/ajax/auth/action/' + this.$route.params.id)
    },
}