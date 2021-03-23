export default {
    data() {
        return {
            state: {
                widget: {
                    loading: true,
                }
            }
        }
    },
    methods: {
        startWidgetLoading() {
            this.state.widget.loading = true
        },
        stopWidgetLoading() {
            this.state.widget.loading = false
        },
        fetchData() {
            this.startWidgetLoading()
            axios.get(this.meta.source)
                .then(res => {
                    this.data = res.data
                    this.stopWidgetLoading()
                })
        },
    },
    created() {
        this.fetchData()
    }
}