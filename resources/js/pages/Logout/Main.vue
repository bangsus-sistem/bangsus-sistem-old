<template></template>

<script>
export default {
    created() {
        axios.post('/ajax/log/authentication_log/logout')
            .then(res => {
                this.$router.push({ name: 'login' })
            })
            .catch(err => {})
            .finally(() => {
                
            })
    }
}
</script>