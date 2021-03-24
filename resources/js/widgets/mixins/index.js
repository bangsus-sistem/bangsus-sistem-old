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
            this.requestData().then(res => {
                this.setData(res)
                this.stopWidgetLoading()
            })
        },
        reloadData() {
            this.requestData().then(res => this.setData(res))
        },
        requestData() {
            return axios.get(this.meta.source, { params: this.query })
        },
        setData(res) {
            this.data = res.data
        }
    },
    created() {
        this.fetchData()
    }
}