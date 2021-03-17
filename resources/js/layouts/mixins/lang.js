import axios from "axios"

export default {
    created() {
        axios.get('/ajax/utils/language_resources')
            .then(res => {
                this.$store.dispatch('utils/lang/setSrc', res.data)
            })
    }
}
